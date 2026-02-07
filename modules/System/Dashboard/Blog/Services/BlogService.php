<?php

namespace Modules\System\Dashboard\Blog\Services;

use Modules\Base\Service;
use Modules\System\Dashboard\Blog\Repositories\BlogRepository;
use Modules\System\Dashboard\Blog\Services\BlogDetailService;
use Modules\System\Dashboard\Blog\Services\BlogImagesService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Users\Services\UserService;
use Illuminate\Support\Facades\Hash;
use Modules\Base\Library;
use DB;
use Illuminate\Support\Facades\Http;
use Str;

class BlogService extends Service
{
    private $baseDis;
    private $basePath;
    public function __construct(
        private UserService $userService,
        private CategoryService $categoryService,
        private BlogImagesService $blogImagesService,
        private BlogDetailService $blogDetailService,
        private BlogRepository $blogRepository
    ) {
        parent::__construct();
        $this->baseDis = public_path("file-image-client/blogs") . "/";
        $this->basePath = url("file-image-client/blogs") . "/";
    }


    public function repository()
    {
        return BlogRepository::class;
    }
    /**
     * cập nhật bài viết
     */
    public function store($input, $file)
    {
        DB::beginTransaction();
        try {
            $codeBlog = date("Y") . '_' . date("m") . '_' . date("d") . "_" . date("H") . date("i") . date("u") . Library::_get_randon_number();
            if (!empty($input['id'])) {
                $blog = $this->blogRepository->where('id', $input['id'])->first();
                $codeBlog = $blog->code_blog;
                $created_at = $blog->created_at;
                $updated_at = now();
            }
            $params = [
                'id'            => $input['id'] ?? (string) Str::uuid(),
                'user_id'       => $_SESSION['id'],
                'code_blog'     => $codeBlog,
                'code_category' => $input['code_category'] ?? null,
                'title'         => $input['title'] ?? null,
                'title_en'         => $input['title_en'] ?? null,
                'decision'      => $input['decision'] ?? null,
                'decision_en'      => $input['decision_en'] ?? null,
                'rate'          => 5,
                'year'          => $input['year'] ?? null,
                'status'        => isset($input['status']) ? 1 : 0,
            ];
            $params['created_at'] = empty($input['id']) ? now() : ($created_at ?? null);
            $params['updated_at'] = $updated_at ?? null;
            $this->blogRepository->updateOrCreate(['id' => $input['id']], $params);
            $this->blogDetailService->updateOrCreate(['code_blog' => $codeBlog], $params);
            $this->updateOrCreateImages($codeBlog, $file, $input['old_image'] ?? []);
            $this->updateOrCreateVideos($codeBlog, $input['video'], $input['videoId']);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return array('success' => false, 'message' => (string) $e->getMessage());
        }
    }

    public function updateOrCreateImages($codeBlog, $arrFiles, $imageOldIds = [])
    {
        if ($imageOldIds !== []) {
            $oldImages = $this->blogImagesService
                ->where('code_blog', $codeBlog)
                ->whereNotIn('id', $imageOldIds)
                ->where(function ($query) {
                    $query->where('type', 'file')
                        ->orWhereNull('type');
                });
            foreach ($oldImages->get() as $image) {
                $old_path = $this->baseDis . $image['name_image'];
                if (file_exists($old_path)) {
                    @unlink($old_path);
                }
            }
            $oldImages->delete();
        }
        if (empty($arrFiles)) {
            return;
        }
        $files = $this->formatMultipleFile($arrFiles['files'] ?? []);
        if (!empty($files)) {
            foreach ($files as $key => $file) {
                $upload = $this->uploadFile($file);
                $paramsImage = [
                    'id'            => (string) Str::uuid(),
                    'code_blog'     => $codeBlog,
                    'name'          => $file['name'],
                    'name_image'    => $upload ?? null,
                    'type'          => 'file',
                    'order_image'   => $key + 1,
                ];
                $this->blogImagesService->create($paramsImage);
            }
        }
    }

    public function updateOrCreateVideos($codeBlog, $linkVideo, $videoId)
    {
        if ($linkVideo) {
            $this->blogImagesService
                ->where('code_blog', $codeBlog)
                ->where('type', 'video')->delete();
            $infoYoutube = $this->getInfo($videoId);
            $paramsImage = [
                'id'            => (string) Str::uuid(),
                'code_blog'     => $codeBlog,
                'name'          => $infoYoutube['title'] ?? '',
                'name_image'    => $linkVideo,
                'type'          => 'video',
                'order_image'   => 1,
            ];
            $this->blogImagesService->create($paramsImage);
        }
    }

    public function getInfo($videoId = '')
    {
        $apiKey = env("YOUTUBE_API_KEY", "");
        $url = "https://www.googleapis.com/youtube/v3/videos";

        $response = Http::get($url, [
            'part' => 'snippet',
            'id'   => $videoId,
            'key'  => $apiKey
        ]);

        $data = $response->json();

        $snippet = $data['items'][0]['snippet'] ?? [];
        return [
            'title'       => $snippet['title'] ?? '',
            'description' => $snippet['description'] ?? '',
            'thumbnail'   => $snippet['thumbnails']['high']['url'] ?? '',
            'channel'     => $snippet['channelTitle'] ?? '',
        ];
    }


    // /**
    //  * Tải ảnh vào thư mục
    //  */
    public function uploadFile($file)
    {
        $path = $this->baseDis;
        $fileName = $file['name'];
        $random = Library::_get_randon_number();
        $fileName = Library::_replaceBadChar($fileName);
        $fileName = Library::_convertVNtoEN($fileName);
        $sFullFileName = date("Y") . '_' . date("m") . '_' . date("d") . "_" . date("H") . date("i") . date("u") . $random . "!~!" . $fileName;
        move_uploaded_file($file['tmp_name'], $path . $sFullFileName);
        return $sFullFileName;
    }
    public function editBlog($arrInput)
    {
        $getBlogInfor = $this->repository->where('id', $arrInput['chk_item_id'])->first();
        $arrBlog = [];
        if (isset($getBlogInfor)) {
            $blogDetail = $this->blogDetailService->where('code_blog', $getBlogInfor['code_blog'])->first();
            $blogImage = $this->blogImagesService->where('code_blog', $getBlogInfor['code_blog'])->get()?->toArray();
            foreach ($blogImage as $key => $image) {
                $blogImage[$key]['url_path'] = $this->basePath . $image['name_image'];
            }
            $video = $this->blogImagesService->where('code_blog', $getBlogInfor['code_blog'])->where('type', 'video')->get()?->toArray();
            // $video = array_filter($blogImage, fn($i) => $i['type'] === 'video');
            if (isset($video[0])) {
                // $videoId = !empty($video[0])
                //     ? $this->getYoutubeId($video[0]['name_image'])
                //     : null;
                //     dd($video);
                // $linkIframe = "https://www.youtube.com/embed/$videoId";
                $linkIframe = $video[0]['name_image'];
            }
            $arrBlog = [
                'id'            => $getBlogInfor->id,
                'code_blog'     => $getBlogInfor->code_blog,
                'code_category' => isset($getBlogInfor->code_category) ? $getBlogInfor->code_category : null,
                'year'   => isset($blogDetail->year) ? $blogDetail->year : null,
                'status'   => $getBlogInfor->status,
                'title'    => isset($blogDetail->title) ? $blogDetail->title : null,
                'title_en'    => isset($blogDetail->title_en) ? $blogDetail->title_en : null,
                'decision' => isset($blogDetail->decision) ? $blogDetail->decision : null,
                'decision_en' => isset($blogDetail->decision_en) ? $blogDetail->decision_en : null,
                'rate'     => isset($blogDetail->rate) ? $blogDetail->rate : 5,
                'images'   => !empty($blogImage) ? array_values(array_filter($blogImage, fn($i) => $i['type'] === 'file' || $i === null)) : null,
                // 'video'   => !empty($video) ? $video[0] : null,
                'linkIframe' => $linkIframe ?? '',
            ];
        }
        return $arrBlog;
    }
    private function getYoutubeId($url)
    {
        preg_match(
            '/(youtu\.be\/|v=|\/v\/|embed\/|shorts\/)([a-zA-Z0-9_-]{11})/',
            $url,
            $matches
        );
        return $matches[2] ?? null;
    }
    /**
     * Màn hình thông tin bài viết
     *
     * @param Request $request
     *
     * @return view
     */
    public function infor($input)
    {
        $dataInfor  = $this->where('id', $input['id'])->first();
        $category   = $this->categoryService->where('code_category', $dataInfor->code_category)->first();
        $blogDetail = $this->blogDetailService->where('code_blog', $dataInfor['code_blog'])->first();
        $blogImage  = $this->blogImagesService->where('code_blog', $dataInfor['code_blog'])->get()->toArray();
        $users      = $this->userService->where('id', $dataInfor['user_id'])->first();
        $data       = [
            'users_name'    => !empty($users->name) ? $users->name : null,
            'code_blog'     => $dataInfor->code_blog,
            'name_category' => isset($category->name_category) ? $category->name_category : null,
            'status'        => !empty($dataInfor->status == '1') ? 'Hoạt động' : 'Không hoạt động',
            'title'         => isset($blogDetail->title) ? $blogDetail->title : null,
            'title_en'         => isset($blogDetail->title_en) ? $blogDetail->title_en : null,
            'year'         => isset($blogDetail->year) ? $blogDetail->year : null,
            'decision'      => isset($blogDetail->decision) ? $blogDetail->decision : null,
            'decision_en'      => isset($blogDetail->decision_en) ? $blogDetail->decision_en : null,
            'rate'          => isset($blogDetail->rate) ? $blogDetail->rate : 5,
            'image'         => !empty($blogImage) ? $blogImage : null,
            'created_at'    => !empty($blogDetail->created_at) ? $blogDetail->created_at : null
        ];
        return $data;
    }
    /**
     * xóa bài viết
     *
     * @param Request $request
     *
     * @return view
     */
    public function delete($input)
    {
        $listids = trim($input['listitem'], ",");
        $ids = explode(",", $listids);
        foreach ($ids as $id) {
            if ($id) {
                $getBlogInfor = $this->repository->where('id', $id)->first();
                $this->repository->where('id', $id)->delete();
                $this->blogDetailService->where('code_blog', $getBlogInfor->code_blog)->delete();
                $blogImages = $this->blogImagesService
                    ->where('code_blog', $getBlogInfor->code_blog)->get();
                foreach ($blogImages as $image) {
                    $old_path = $this->baseDis . $image['name_image'];
                    if (file_exists($old_path)) {
                        @unlink($old_path);
                    }
                }
                $this->blogImagesService->where('code_blog', $getBlogInfor->code_blog)->delete();
            }
        }
    }

    public function formatMultipleFile($files)
    {
        $arrFiles = [];
        if ($files) {
            foreach ($files['name'] as $key => $name) {
                $arrFiles[] = [
                    'name' => $name,
                    'type' => $files['type'][$key],
                    'tmp_name' => $files['tmp_name'][$key],
                    'error' => $files['error'][$key],
                    'size' => $files['size'][$key],
                ];
            }
        }
        return $arrFiles;
    }
}

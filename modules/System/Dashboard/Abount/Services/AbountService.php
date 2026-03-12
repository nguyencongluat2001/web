<?php

namespace Modules\System\Dashboard\Abount\Services;

use Modules\Base\Service;
use Modules\System\Dashboard\Abount\Repositories\AbountRepository;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Users\Services\UserService;
use Illuminate\Support\Facades\Hash;
use Modules\Base\Library;
use DB;
use Illuminate\Support\Facades\Http;
use Str;

class AbountService extends Service
{
    private $baseDis;
    private $basePath;
    public function __construct(
        private UserService $userService,
        private CategoryService $categoryService,
        private AbountRepository $AbountRepository
    ) {
        parent::__construct();
        // $this->baseDis = public_path("file-image-client/Abounts") . "/";
        // $this->basePath = url("file-image-client/Abounts") . "/";
    }


    public function repository()
    {
        return AbountRepository::class;
    }
    /**
     * cập nhật bài viết
     */
    public function store($input, $file)
    {
        DB::beginTransaction();
        try {
            if (!empty($input['id'])) {
                $Abount = $this->AbountRepository->where('id', $input['id'])->first();
            }
            dd($input);
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
                'order'         => $input['order'] ?? null,
            ];
            $params['created_at'] = empty($input['id']) ? now() : ($created_at ?? null);
            $params['updated_at'] = $updated_at ?? null;
            $this->blogRepository->updateOrCreate(['id' => $input['id']], $params);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return array('success' => false, 'message' => (string) $e->getMessage());
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


    public function editBlog($arrInput)
    {
        $getBlogInfor = $this->repository->where('id', $arrInput['chk_item_id'])->first();
        return $getBlogInfor;
    }
    /**
     * Màn hình thông tin abount
     *
     * @param Request $request
     *
     * @return view
     */
    public function infor($input)
    {
        $data =  $this->where('id', $input['id'])->first();
        return $data;
    }
    /**
     * xóa bài abount
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
            }
        }
    }
}

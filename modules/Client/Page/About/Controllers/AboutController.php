<?php

namespace Modules\Client\Page\About\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\System\Dashboard\Blog\Services\BlogDetailService;
use Modules\System\Dashboard\Blog\Services\BlogImagesService;
use Modules\System\Dashboard\Blog\Services\BlogService;
use Modules\System\Dashboard\Category\Services\CategoryService;

/**
 * cẩm nang
 *
 * @author Luatnc
 */
class AboutController extends Controller
{

    public function __construct(
        private CategoryService $categoryService,
        private BlogService $blogService,
        private BlogDetailService $blogDetailService,
        private BlogImagesService $blogImagesService
    ) {}

    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function index(Request $request)
    {
        $data['categories'] = [];
        $data['blogs'] = $this->blogService->select('*')->where('status', 1)->with(['detailBlog', 'fileBlog'])->get();
        return view('client.about.home', $data);
    }
    /**
     * Danh sách Tổng hợp thị trường
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListTHTT(Request $request)
    {
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        $param['sort'] = 'created_at';
        $objResult = $this->blogService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return view("client.about.loadlistTHTT", $data)->render();
    }
    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function session(Request $request)
    {
        return view('client.about.session');
    }
    /**
     * Danh sách Tổng kết phiên
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListTKP(Request $request)
    {
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        $param['sort'] = 'created_at';
        $objResult = $this->blogService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return view("client.about.loadlistTKP", $data)->render();
    }
    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function industry(Request $request)
    {
        return view('client.about.industry');
    }
    /**
     * Danh sách Tổng kết phiên
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListPTN(Request $request)
    {
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        $param['sort'] = 'created_at';
        $objResult = $this->blogService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return view("client.about.loadListPTN", $data)->render();
    }
    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function stock(Request $request)
    {
        return view('client.about.stock');
    }
    /**
     * Danh sách Tổng kết phiên
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListPTCP(Request $request)
    {
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        $param['sort'] = 'created_at';
        $objResult = $this->blogService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        $data['pagination'] = $data['datas']->links('pagination.default');
        return view("client.about.loadlistPTCP", $data)->render();
    }
    /**
     * Đọc bài viết
     */
    public function reader(Request $request, $id)
    {
        $blogs = $this->blogService->where('id', $id)->with(['detailBlog', 'imageBlog'])->first();
        $data['datas'] = $blogs;
        $relates = $this->blogService->select('*')
            ->where('id', '!=', $id)
            ->with(['fileBlog'])
            ->get();
        foreach ($relates as $key => $value) {
            if(!isset($value->fileBlog[0])) {
                continue;
            }
            $value->url_path = url("file-image-client/blogs") . "/" . ($value->fileBlog[0]?->name_image ?? '');
        }
        $data['relates'] = $relates;
        return view("client.about.reader", $data)->render();
    }
}

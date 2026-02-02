<?php

namespace Modules\System\Dashboard\UrlSearch\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\System\Dashboard\UrlSearch\Services\UrlSearchService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use DB;
use Illuminate\Support\Facades\Http;
use Str;
use Modules\System\Dashboard\UrlSearch\Models\UnitsModel;

/**
 * cẩm nang
 *
 * @author Luatnc
 */
class UrlSearchController extends Controller
{

    public function __construct(
        UrlSearchService $UrlSearchService,
        CategoryService $categoryService
    ){
        $this->UrlSearchService = $UrlSearchService;
        $this->categoryService = $categoryService;
    }

    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function index(Request $request)
    {
        $getCategory = $this->UrlSearchService->where('current_status',1)->get()->toArray();
        $data['category'] = $getCategory;
        return view('dashboard.UrlSearch.index',compact('data'));
    }
    /**
     * load màn hình danh sách
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadList(Request $request)
    { 
        $arrInput = $request->input();
        // if($arrInput['cate'] == null || $arrInput['cate'] == ''){
        //     unset($arrInput['cate']);
        // }
        $data = array();
        $param = $arrInput;
        $objResult = $this->UrlSearchService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        // $data['pagination'] = $data['datas']->links('pagination.default');
        return view("dashboard.UrlSearch.loadlist", $data)->render();
    }
     /**
     * Load màn hình them thông tin
     *
     * @param Request $request
     *
     * @return view
     */
    public function createForm(Request $request)
    {
        $input = $request->all();
        return view('dashboard.UrlSearch.edit');
    }
    /**
     * them thông tin
     *
     * @param Request $request
     *
     * @return view
     */
    public function create (Request $request)
    {
        $input = $request->input();
        $file = isset($_FILES)?$_FILES:'';
        $create = $this->UrlSearchService->store($input,$file); 
        return array('success' => true, 'message' => 'Cập nhật thành công');
    }
     /**
     * Load màn hình chỉnh sửa thông tin thể loại
     *
     * @param Request $request
     *
     * @return view
     */
    public function edit(Request $request)
    {
        $input = $request->all();
        $data['detail'] = $this->UrlSearchService->edit($input);
        return view('dashboard.UrlSearch.edit',compact('data'));
    }

     /**
     * Xóa
     *
     * @param Request $request
     *
     * @return Array
     */
    public function delete(Request $request)
    {
        $input = $request->all();
        $listids = trim($input['listitem'], ",");
        $ids = explode(",", $listids);
        foreach ($ids as $id) {
            if ($id) {
                $this->UrlSearchService->where('id',$id)->delete();
            }
        }
        return array('success' => true, 'message' => 'Xóa thành công');
    }
     /**
     * Load màn hình xem video trực tuyến
     *
     * @param Request $request
     *
     * @return view
     */
    public function seeVideo(Request $request)
    {
        $input = $request->all();
        $data = $this->UrlSearchService->where('id',$input['id'])->first();
        return view('dashboard.UrlSearch.video',compact('data'));
    }
}

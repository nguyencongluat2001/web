<?php

namespace Modules\System\Dashboard\Permision\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\System\Dashboard\Permision\Services\PermisionService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use DB;

/**
 * cẩm nang
 *
 * @author Luatnc
 */
class PermisionController extends Controller
{

    public function __construct(
        PermisionService $PermisionService,
        CategoryService $categoryService
    ){
        $this->PermisionService = $PermisionService;
        $this->categoryService = $categoryService;
    }

    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function index(Request $request)
    {
        $getCategory = $this->categoryService->where('cate','CNK_001')->get()->toArray();
        $data['category'] = $getCategory;
        return view('dashboard.permision.index',compact('data'));
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
        // $objResult = $this->PermisionService->filter($param);
        // $data['datas'] = $objResult;
        // $data['param'] = $param;
        // $catePermision = $this->PermisionService->filter($param);
        $catePermision = $this->categoryService->where('cate','DM_PHAN_QUYEN')->orderBy('created_at','asc')->get();
        foreach ($catePermision as $value) {
            $data[] = [
                'id' => $value['id'],
                'name_cate' => $value['name_category'],
                'code_category' => $value['code_category'],
                'Editor_Tong' => 1,
                'Editor_Pro' => 1,
                'Editor' => 1,
                'Sales_Admin' => 1,
                'Sales' => 1,
            ];
        }
        // dd($data);
        // $data['pagination'] = $data['datas']->links('pagination.default');
        return view("dashboard.permision.loadlist", compact('data'))->render();
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
        $getCategory = $this->categoryService->where('cate','DM_PHAN_QUYEN')->get()->toArray();
        $data['category'] = $getCategory;
        return view('dashboard.permision.edit',compact('data'));
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
        $create = $this->PermisionService->store($input); 
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
        $data['detail'] = $this->PermisionService->edit($input);
        return view('dashboard.permision.edit',compact('data'));
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
                $this->PermisionService->where('id',$id)->delete();
            }
        }
        return array('success' => true, 'message' => 'Xóa thành công');
    }
}
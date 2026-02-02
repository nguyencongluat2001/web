<?php

namespace Modules\System\Dashboard\BloodTest\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\System\Dashboard\BloodTest\Services\PriceTestService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Specialty\Services\SpecialtyService;
use Modules\System\Dashboard\BloodTest\Services\BloodTestService;
use DB;

/**
 * cẩm nang
 *
 * @author Luatnc
 */
class PriceTestController extends Controller
{

    public function __construct(
        BloodTestService $BloodTestService,
        SpecialtyService $SpecialtyService,
        PriceTestService $PriceTestService,
        CategoryService $categoryService
    ){
        $this->BloodTestService = $BloodTestService;
        $this->SpecialtyService = $SpecialtyService;
        $this->PriceTestService = $PriceTestService;
        $this->categoryService = $categoryService;
    }

    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function index(Request $request)
    {
        $getCategory = $this->BloodTestService->whereIn('code',['PACK1','PACK2','PACK3','PACK4','PACK5','PACK6','PACK7','PACK8','PACK9','PACK10','PACK11','PACK12','PACK13','PACK14','PACK15','PACK16','PACK17','PACK18','PACK19','PACK20','PACK21','PACK22'])->get()->toArray();
        $data['category'] = $getCategory;
        return view('dashboard.BloodTest.PriceTest.index',compact('data'));
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
        $data = array();
        if($arrInput['cate'] == ''){
            unset($arrInput['cate']);
        }
        $arrInput['limit'] = 300;
        $param = $arrInput;
        $objResult = $this->PriceTestService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        // $data['pagination'] = $data['datas']->links('pagination.default');
        return view("dashboard.BloodTest.PriceTest.loadlist", $data)->render();
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
        $data_blood = $this->BloodTestService->where('sex',1)->orWhere('sex',2)->get()->toArray();
        $data['arr_list'] = $data_blood;
        return view('dashboard.BloodTest.PriceTest.edit',$data);
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
        $create = $this->PriceTestService->store($input); 
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
        $data['detail'] = $this->PriceTestService->edit($input);
        $data_blood = $this->BloodTestService->where('sex',1)->orWhere('sex',2)->get()->toArray();
        $data['arr_list'] = $data_blood;
        return view('dashboard.BloodTest.PriceTest.edit',$data);
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
                $this->PriceTestService->where('id',$id)->delete();
            }
        }
        return array('success' => true, 'message' => 'Xóa thành công');
    }
}

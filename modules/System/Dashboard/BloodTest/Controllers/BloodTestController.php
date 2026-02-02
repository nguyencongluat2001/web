<?php

namespace Modules\System\Dashboard\BloodTest\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\System\Dashboard\BloodTest\Services\BloodTestService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Specialty\Services\SpecialtyService;
use DB;

/**
 * cẩm nang
 *
 * @author Luatnc
 */
class BloodTestController extends Controller
{

    public function __construct(
        SpecialtyService $SpecialtyService,
        BloodTestService $BloodTestService,
        CategoryService $categoryService
    ){
        $this->SpecialtyService = $SpecialtyService;
        $this->BloodTestService = $BloodTestService;
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
        return view('dashboard.BloodTest.index',compact('data'));
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
        $arrInput['limit'] = 300;
        $data = array();
        $param = $arrInput;
        $param['sort'] = 'created_at';
        $objResult = $this->BloodTestService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        // $data['pagination'] = $data['datas']->links('pagination.default');
        return view("dashboard.BloodTest.loadlist", $data)->render();
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
        $Specialty = $this->SpecialtyService->where('current_status',1)->get();
        foreach($Specialty as $value){
            $arrSpecialty[] = [
                'code' =>  $value['code'],
                'name' =>  $value['name_specialty'],
                'status' =>  0
            ];
        }
        $data['arrSpecialty_list'] = $arrSpecialty;
        return view('dashboard.BloodTest.edit',compact('data'));
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
        $create = $this->BloodTestService->store($input); 
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
        $data['detail'] = $this->BloodTestService->edit($input);
        return view('dashboard.BloodTest.edit',compact('data'));
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
                $this->BloodTestService->where('id',$id)->delete();
            }
        }
        return array('success' => true, 'message' => 'Xóa thành công');
    }
}

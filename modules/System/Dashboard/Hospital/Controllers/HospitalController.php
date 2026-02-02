<?php

namespace Modules\System\Dashboard\Hospital\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\System\Dashboard\Hospital\Services\HospitalService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Specialty\Services\SpecialtyService;
use Modules\System\Dashboard\Hospital\Services\MoneySpecialtyService;
use Modules\System\Dashboard\Hospital\Services\SystemClinicsService;
use DB;

/**
 * cẩm nang
 *
 * @author Luatnc
 */
class HospitalController extends Controller
{

    public function __construct(
        SystemClinicsService $SystemClinicsService,
        MoneySpecialtyService $moneySpecialtyService,
        SpecialtyService $SpecialtyService,
        HospitalService $HospitalService,
        CategoryService $categoryService
    ){
        $this->SystemClinicsService  = $SystemClinicsService;
        $this->moneySpecialtyService = $moneySpecialtyService;
        $this->SpecialtyService = $SpecialtyService;
        $this->HospitalService = $HospitalService;
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
        return view('dashboard.hospital.index',compact('data'));
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
        $objResult = $this->HospitalService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        // $data['pagination'] = $data['datas']->links('pagination.default');
        return view("dashboard.hospital.loadlist", $data)->render();
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
        return view('dashboard.hospital.edit',compact('data'));
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
        $create = $this->HospitalService->store($input,$file); 
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
        $data['detail'] = $this->HospitalService->edit($input);
        $Specialty = $this->SpecialtyService->where('current_status',1)->get();
        foreach($Specialty as $value){
            if(in_array($value['code'],$data['detail']['arrSpecialty'])){
                $arrSpecialty[] = [
                    'code' =>  $value['code'],
                    'name' =>  $value['name_specialty'],
                    'status' =>  1
                ];
            }else{
                $arrSpecialty[] = [
                    'code' =>  $value['code'],
                    'name' =>  $value['name_specialty'],
                    'status' =>  0
                ];
            }
        }
        $data['arrSpecialty_list'] = $arrSpecialty;
        return view('dashboard.hospital.edit',compact('data'));
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
                $this->HospitalService->where('id',$id)->delete();
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
        $data = $this->HospitalService->where('id',$input['id'])->first();
        return view('dashboard.hospital.video',compact('data'));
    }
     /**
     * Load màn hình cấu hình giá các khoa khám 
     *
     * @param Request $request
     *
     * @return view
     */
    public function editMoneyPackage(Request $request)
    {
        $input = $request->all();
        $data['detail'] = $this->HospitalService->edit($input);
        foreach($data['detail']['arrSpecialty'] as $value){
            $Specialty = $this->SpecialtyService->where('code',$value)->first();
            $moneySpecialty = $this->moneySpecialtyService->where('code_hospital',$data['detail']['code'])->where('code_specialty',$value)->first();
            $arrSpecialty[] = [
                'code' =>  $Specialty->code,
                'name' =>  $Specialty->name_specialty,
                'money' => !empty($moneySpecialty->money)?$moneySpecialty->money:''
            ];
        }
        $data['arrSpecialty_list'] = $arrSpecialty;
        return view('dashboard.hospital.editMoneyPackage',compact('data'));
    }
    /**
     * Thêm giá các khoa khám 
     *
     * @param Request $request
     *
     * @return view
     */
    public function createMoneyPackage (Request $request)
    {
        $input = $request->input();
        $result = $this->HospitalService->createMoneyPackage($input); 
        return $result;
    }











    // cấu hình phòng khám
    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function indexStage($id)
    {
        $dataArr = $this->HospitalService->find($id);
        $data = $dataArr;
        return view('dashboard.hospital.SystemClinics.index',compact('data'));
    }
     /**
     * load màn hình danh sách
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListStage(Request $request)
    { 
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        $objResult = $this->SystemClinicsService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        // $data['pagination'] = $data['datas']->links('pagination.default');
        return view("dashboard.hospital.SystemClinics.loadlist", $data)->render();
    }
         /**
     * Load màn hình them thông tin
     *
     * @param Request $request
     *
     * @return view
     */
    public function createFormStage(Request $request)
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
        return view('dashboard.hospital.SystemClinics.edit',compact('data'));
    }
     /**
     * them thông tin
     *
     * @param Request $request
     *
     * @return view
     */
    public function createStage (Request $request)
    {
        $input = $request->input();
        $file = isset($_FILES)?$_FILES:'';
        $create = $this->HospitalService->storeStage($input,$file); 
        return array('success' => true, 'message' => 'Cập nhật thành công');
    }
         /**
     * Load màn hình chỉnh sửa thông tin thể loại
     *
     * @param Request $request
     *
     * @return view
     */
    public function editStage(Request $request)
    {
        $input = $request->all();
        $data['detail'] = $this->HospitalService->editStage($input);
        return view('dashboard.hospital.SystemClinics.edit',compact('data'));
    }
      /**
     * Xóa
     *
     * @param Request $request
     *
     * @return Array
     */
    public function deleteStage(Request $request)
    {
        $input = $request->all();
        $listids = trim($input['listitem'], ",");
        $ids = explode(",", $listids);
        foreach ($ids as $id) {
            if ($id) {
                $this->SystemClinicsService->where('id',$id)->delete();
            }
        }
        return array('success' => true, 'message' => 'Xóa thành công');
    }
}

<?php

namespace Modules\System\Dashboard\Specialty\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\System\Dashboard\Specialty\Services\SpecialtyService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use DB;
use Illuminate\Support\Facades\Http;
use Str;
use Modules\System\Dashboard\Specialty\Models\UnitsModel;

/**
 * cẩm nang
 *
 * @author Luatnc
 */
class SpecialtyController extends Controller
{

    public function __construct(
        SpecialtyService $SpecialtyService,
        CategoryService $categoryService
    ){
        $this->SpecialtyService = $SpecialtyService;
        $this->categoryService = $categoryService;
    }

    /**
     * khởi tạo dữ liệu
     *
     * @return view
     */
    public function index(Request $request)
    {
        // $response = Http::get('https://provinces.open-api.vn/api/?depth=3');
        // $response = $response->getBody()->getContents();
        // $response = json_decode($response,true);
        // foreach($response as $value){
        //     // dd($value);
        //     // tỉnh
        //     $codeTinh = $value['code'];
        //     if($codeTinh < 150){
        //         $check = UnitsModel::where('code_tinh',$codeTinh)->first();
        //         if(!isset($check)){
        //             if(isset($value['districts'])){
        //                 $dataTinh = [
        //                     'id'=> (string)Str::uuid(),
        //                     'code_tinh'=> $codeTinh,
        //                     'code_huyen'=> null,
        //                     'code_xa'=> null,
        //                     'name'=> $value['name'],
        //                     'name_type' => $value['division_type']
        //                 ];
        //                 $createTinh = UnitsModel::insert($dataTinh);
        //             }
        //             // huuyeen
        //             if(isset($value['districts'])){
        //                 foreach($value['districts'] as $valueHuyen){
        //                     $dataHuyen = [
        //                         'id'=> (string)Str::uuid(),
        //                         'code_tinh'=> $codeTinh,
        //                         'code_huyen'=> $valueHuyen['code'],
        //                         'code_xa'=> null,
        //                         'name'=> $valueHuyen['name'],
        //                         'name_type' => $valueHuyen['division_type']
        //                     ];
        //                     $createHuyen = UnitsModel::insert($dataHuyen);
        //                     // xa
        //                         foreach($valueHuyen['wards'] as $valueXa){
        //                             $dataXa = [
        //                                 'id'=> (string)Str::uuid(),
        //                                 'code_tinh'=> $codeTinh,
        //                                 'code_huyen'=> $valueHuyen['code'],
        //                                 'code_xa'=> $valueXa['code'],
        //                                 'name'=> $valueXa['name'],
        //                                 'name_type' => $valueXa['division_type']
        //                             ];
        //                             $createXa = UnitsModel::insert($dataXa);
        //                         }
        //                 }
        //             }
        //         }
        //     }
           
        // }
        // dd('ok');
        $getCategory = $this->categoryService->where('cate','CNK_001')->get()->toArray();
        $data['category'] = $getCategory;
        return view('dashboard.specialty.index',compact('data'));
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
        $objResult = $this->SpecialtyService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        // $data['pagination'] = $data['datas']->links('pagination.default');
        return view("dashboard.specialty.loadlist", $data)->render();
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
        return view('dashboard.specialty.edit');
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
        $create = $this->SpecialtyService->store($input,$file); 
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
        $data['detail'] = $this->SpecialtyService->edit($input);
        return view('dashboard.specialty.edit',compact('data'));
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
                $this->SpecialtyService->where('id',$id)->delete();
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
        $data = $this->SpecialtyService->where('id',$input['id'])->first();
        return view('dashboard.specialty.video',compact('data'));
    }
}

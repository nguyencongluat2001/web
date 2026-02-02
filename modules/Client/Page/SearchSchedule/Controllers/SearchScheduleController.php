<?php

namespace Modules\Client\Page\SearchSchedule\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\Client\Page\SearchSchedule\Models\SearchScheduleModel;
use Modules\Client\Page\AppointmentAtHome\Models\AppointmentAtHomeModel;
use Illuminate\Support\Facades\Http;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Hospital\Services\HospitalService;
use Modules\System\Dashboard\Specialty\Services\SpecialtyService;
use Modules\System\Dashboard\BloodTest\Services\BloodTestService;
use DB;
/** 
 *
 * @author Luatnc
 */
class SearchScheduleController extends Controller
{

    public function __construct(
        BloodTestService $BloodTestService,
        SpecialtyService $specialtyService,
        HospitalService $hospitalService,
        CategoryService $categoryService
    ){
        $this->BloodTestService = $BloodTestService;
        $this->specialtyService = $specialtyService;
        $this->hospitalService = $hospitalService;
        $this->categoryService = $categoryService;
    }

    /**
     * khởi tạo dữ liệu, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index(Request $request)
    {
        return view('client.SearchSchedule.home');
    }
     /**
     * load màn hình danh sách lấy chỉ số thị trường
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadList(Request $request)
    { 
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        $param['search'] = isset($param['search'])?$param['search']:'';
        $objResult = SearchScheduleModel::where('code_schedule',$param['search'])->orWhere('phone',$param['search'])->get()->toArray();
        $param_a = [];
        $param_s = [];
        foreach($objResult as $value){
           $getHospital = $this->hospitalService->where('code',$value['code_hospital'])->first();
           $getSpecialty = $this->specialtyService->where('code',$value['code_specialty'])->first();
            $param_a[] = [
                'id' => $value['id'],
                'code_schedule' => $value['code_schedule'],
                'code_hospital' =>  !empty($getHospital->name_hospital)?$getHospital->name_hospital:'',
                'code_specialty' => !empty($getSpecialty->name_specialty)?$getSpecialty->name_specialty:'',
                'type_payment' => $value['type_payment'],
                'money' => $value['money'],
                'name' => $value['name'],
                'phone' => $value['phone'],
                'code_insurance' => $value['code_insurance'],
                'sex' => $value['sex'],
                'email' => $value['email'],
                'date_of_brith' => date('d-m-Y',strtotime($value['date_of_brith'])),
                'code_tinh' => $value['code_tinh'],
                'code_huyen' => $value['code_huyen'],
                'code_xa' => $value['code_xa'],
                'address' => $value['address'],
                'reason' => $value['reason'],
                'name_image' => $value['name_image'],
                'status' => $value['status'],
                'created_at' => date('d-m-Y',strtotime($value['created_at']))

            ];
        }
        $data['datas'] = $param_a;

        $dataAtHome = AppointmentAtHomeModel::where('code',$param['search'])->orWhere('phone',$param['search'])->get()->toArray();
        foreach($dataAtHome as $value){
            $cate = $this->BloodTestService->where('code',$value['type'])->first();
            // dd($cate);
            if($value['money'] > 0){
                $money = number_format($value['money'],0, '', ',');
            }else{
                $money = 0;
            }
            $param_s[] = [
                'id' => $value['id'],
                'code' => $value['code'],
                'name' => $value['name'],
                'phone' => $value['phone'],
                'money' => $money,
                'type' => !empty($cate->name)?$cate->name:'',
                'sex' => $value['sex'],
                'date_sampling' => date('d-m-Y',strtotime($value['date_sampling'])),
                'hour_sampling' => $value['hour_sampling'],
                'address' => $value['address'],
                'reason' => $value['reason'],
                'status' => $value['status'],
                'created_at' => date('d-m-Y',strtotime($value['created_at']))
            ];
        }
        $data['datas_athome'] = $param_s;
        return view("client.SearchSchedule.loadlist", $data)->render();
    }
    
     /**
     * lấy file kết quả
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function getFile(Request $request)
    { 
        $arrInput = $request->input();
        $check = AppointmentAtHomeModel::where('code_patient',$arrInput['sid'])->first();
        if($arrInput['sid'] == ''){
            $message = 'Mã tra cứu không được để trống!';
            $data['result'] = [
                'status' => false,
                'message' => $message
               ];
            return response()->json($data);
        }
        if(!empty($check) && $check->code_patient != $arrInput['sid']){
            $message = 'Mã tra cứu không chính xác!';
            $data['result'] = [
                'status' => false,
                'message' => $message
               ];
            return response()->json($data);
        }
        if($arrInput['phone'] == ''){
            $message = 'Số điện thoại không được để trống!';
            $data['result'] = [
                'status' => false,
                'message' => $message
               ];
            return response()->json($data);
        }
        
        if(!empty($check) && $check->phone != $arrInput['phone']){
            $message = 'Số điện thoại không chính xác!';
            $data['result'] = [
                'status' => false,
                'message' => $message
               ];
            return response()->json($data);
        }
        $param = [
            'sid'=> $arrInput['sid'],
            'pwd'=> $arrInput['phone']
        ];
        $response = Http::withBody(json_encode($param),'application/json')->post('ketqua.ghtruelab.vn:7979/api/LIS/PdfDownload');
        $response = $response->getBody()->getContents();
        $response = json_decode($response,true);
        return response()->json($response);

    }
        /**
     * login  file kết quả
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function login(Request $request)
    { 
        $arrInput = $request->input();
            $param = [
                'username'=> $arrInput['username'],
                // 'pwd'=> $arrInput['pwd']
            ];
            $response = Http::withBody(json_encode($param),'application/json')->post('118.70.182.89:89/api/PACS/login');
            $response = $response->getBody()->getContents();
            $response = json_decode($response,true);
            return response()->json($response);

    } 
     /**
     * lấy file kết quả
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function getTKQ(Request $request)
    { 
            $arrInput = $request->input();
            $mabn = 'mabn='.$arrInput['mabn'];
            $response = Http::withBody('','application/json')->get('118.70.182.89:89/api/PACS/ViewChiDinh?'.$mabn.'');
            $response = $response->getBody()->getContents();
            $response = json_decode($response,true);
            return response()->json($response);

    }
             /**
     * lấy ketquaxetnghiem
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function ketquaxetnghiem(Request $request)
    { 
        $arrInput = $request->input();
            $param = [
                'sid'=> $arrInput['sid'],
                // 'pwd'=> $arrInput['pwd']
                'pwd'=> 123
            ];
            $response = Http::withBody(json_encode($param),'application/json')->post('ketqua.ghtruelab.vn:7979/api/LIS/PdfDownload');
            $response = $response->getBody()->getContents();
            $response = json_decode($response,true);
            if($response['status'] == true){
                $file = $response['result']['Filepdf'];
                // $file = 'https://medhanoi.com/export/202406251554578882165.Xls';
                return redirect($file);
            }else{
                return view("ketquaxetnghiem");
            }
    }
}

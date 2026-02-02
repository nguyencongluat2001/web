<?php

namespace Modules\Client\Page\Facilities\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\Client\Page\Facilities\Services\FacilitiesService;
use Modules\System\Dashboard\Blog\Services\BlogService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Category\Services\CateService;
use Illuminate\Support\Facades\Http;
use DB;
use Modules\System\Dashboard\Hospital\Services\HospitalService;
use Modules\System\Dashboard\Specialty\Models\UnitsModel;
use Modules\System\Dashboard\Specialty\Services\SpecialtyService;
use Modules\Client\Page\Facilities\Services\ScheduleService;
use Modules\System\Dashboard\Users\Services\UserService;
use Modules\System\Dashboard\Hospital\Services\SystemClinicsService;
use Modules\System\Dashboard\Hospital\Models\MoneySpecialtyModel;
use Modules\System\Dashboard\Hospital\Models\HospitalModel;
/**
 *
 * @author Luatnc
 */
class FacilitiesController extends Controller
{

    public function __construct(
        SystemClinicsService $SystemClinicsService,
        ScheduleService $scheduleService,
        SpecialtyService $SpecialtyService,
        CateService $cateService,
        CategoryService $categoryService,
        FacilitiesService $FacilitiesService,
        BlogService $blogService,
        HospitalService $hospitalService,
        UserService $userService
    ){
        $this->SystemClinicsService  = $SystemClinicsService;
        $this->scheduleService = $scheduleService;
        $this->SpecialtyService = $SpecialtyService;
        $this->cateService = $cateService;
        $this->categoryService = $categoryService;
        $this->blogService = $blogService;
        $this->FacilitiesService = $FacilitiesService;
        $this->hospitalService = $hospitalService;
        $this->userService = $userService;
    }

    /**
     * khởi tạo dữ liệu, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index(Request $request)
    {
        $objResult = $this->hospitalService->where('current_status','1')->get();
        $data['datas'] = $objResult;
        return view('client.Facilities.home',$data)->render();
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
        $objResult = $this->hospitalService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        // dd($arrInput,$data);
        return view("client.Facilities.loadlist", $data)->render();
    }





    /// chi tiết cơ sơ bệnh viện 
     /**
     *
     * @param Request $request
     *
     * @return view
     */
    public function detailIndex(Request $request ,$code)
    {
        $input = $request->all();
        $datas['datas'] = $this->hospitalService->where('code',$code)->first();
        $datas['SystemClinics'] = $this->SystemClinicsService->where('code_hospital',$code)->orderBy('order','ASC')->get();
        return view('client.Facilities.Detail.home',$datas);
    }
     /// đặt lịch khám
     /**
     *
     * @param Request $request
     *
     * @return view
     */
    public function schedule(Request $request ,$code, $idstaff = '')
    {
        $input = $request->all();
        $arrEx = explode(',',$code);
        if(isset($arrEx[1])){
            $datas['datas'] = $this->hospitalService->where('code',$arrEx[1])->first();
        }else{
            $datas['datas'] = $this->hospitalService->where('code',$code)->first();

        }
        if(isset($datas['datas'] )){
            $Specialty = $this->SpecialtyService->where('current_status',1)->get();
            $data_arr['arrSpecialty'] = explode(',',$datas['datas']['code_specialty']);
            foreach($Specialty as $value){
                if(in_array($value['code'],$data_arr['arrSpecialty'])){
                    if(!empty($arrEx[1]) && $value['code'] == $arrEx[0]){
                        $arrSpecialty[] = [
                            'code' =>  $value['code'],
                            'name' =>  $value['name_specialty'],
                            'status' =>  2
                        ];
                    $moneys =  MoneySpecialtyModel::where('code_hospital',$arrEx[1])
                            ->where('code_specialty',$value['code'])
                            ->select('money')
                            ->first();
                    $datas['money'] = !empty($moneys->money)?$moneys->money:'';
                    $datas['moneyConvert'] = !empty($moneys->money)?number_format($moneys->money, 0, '', ','):'Chưa cấu hình';
                    }else{
                        $arrSpecialty[] = [
                            'code' =>  $value['code'],
                            'name' =>  $value['name_specialty'],
                            'status' =>  1
                        ];
                    }
                    
                }
            }
            $datas['khoa'] = $arrSpecialty;
        }
        $datas['tinh'] =  UnitsModel::whereNull('code_huyen')->get();
        if(!empty($idstaff)){
            $user = $this->userService->where('id_personnel', $idstaff)->first();
            $datas['user_introduce_id'] = $idstaff;
            $datas['user_introduce_name'] = $user->name ?? '';
        }
        // dd($datas);
        return view('client.Facilities.Schedule.home',$datas);
    }
     /// đặt lịch phongf khasm co bac si chi dinh
     /**
     *
     * @param Request $request
     *
     * @return view
     */
    public function scheduleStage(Request $request ,$code, $physician = '')
    {
        $input = $request->all();
        $arrEx = explode(',',$code);
        if(isset($arrEx[1])){
            $datas['datas'] = $this->hospitalService->where('code',$arrEx[1])->first();
        }else{
            $datas['datas'] = $this->hospitalService->where('code',$code)->first();

        }
        if(isset($datas['datas'] )){
            $Specialty = $this->SpecialtyService->where('current_status',1)->get();
            $data_arr['arrSpecialty'] = explode(',',$datas['datas']['code_specialty']);
            foreach($Specialty as $value){
                if(in_array($value['code'],$data_arr['arrSpecialty'])){
                    if(!empty($arrEx[1]) && $value['code'] == $arrEx[0]){
                        $arrSpecialty[] = [
                            'code' =>  $value['code'],
                            'name' =>  $value['name_specialty'],
                            'status' =>  2
                        ];
                    $moneys =  MoneySpecialtyModel::where('code_hospital',$arrEx[1])
                            ->where('code_specialty',$value['code'])
                            ->select('money')
                            ->first();
                    $datas['money'] = !empty($moneys->money)?$moneys->money:'';
                    $datas['moneyConvert'] = !empty($moneys->money)?number_format($moneys->money, 0, '', ','):'Chưa cấu hình';
                    }else{
                        $arrSpecialty[] = [
                            'code' =>  $value['code'],
                            'name' =>  $value['name_specialty'],
                            'status' =>  1
                        ];
                    }
                    
                }
            }
            $datas['khoa'] = $arrSpecialty;
        }
        $datas['tinh'] =  UnitsModel::whereNull('code_huyen')->get();
        if(!empty($physician)){
            $user = $this->SystemClinicsService->where('code', $physician)->first();
            $datas['physician'] = $user;
        }
        // dd($datas);
        return view('client.Facilities.Schedule.home',$datas);
    }
     /// Danh sách huyện
     /**
     *
     * @param Request $request
     *
     * @return view
     */
    public function getHuyen(Request $request)
    {
        $input = $request->all();
        $datas['huyen'] =  UnitsModel::where('code_tinh',$input['codeTinh'])->whereNull('code_xa')->select('code_huyen','name')->get()->toArray();
        
        return response()->json([
            'data' => $datas,
            'status' => true
        ]);
    }
     /// Danh sách phường xã
     /**
     *
     * @param Request $request
     *
     * @return view
     */
    public function getXa(Request $request)
    {
        $input = $request->all();
        $datas['xa'] =  UnitsModel::where('code_huyen',$input['codeHuyen'])->select('code_xa','name')->get()->toArray();
        
        return response()->json([
            'data' => $datas,
            'status' => true
        ]);
    }
     /**
     * modal giao dich thanh toan
     *
     * @param Request $request
     *
     * @return view
     */
    public function createForm(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $data['datas'] = $input;
        return view('client.Facilities.Schedule.edit',$data);
    }
     /**
     * dat lich
     *
     * @param Request $request
     *
     * @return view
     */
    public function sendPayment(Request $request)
    {
        $input = $request->all();
        $file = $_FILES;
        $sendPayment =  $this->scheduleService->sendPayment($input,$file);
        return response()->json([
            'status' => $sendPayment
        ]);
    }
    /**
   * lấy thông tin nhân viên giới thiệu
   */
   public function getUser(Request $request)
   {
       $input = $request->all();
       $selectUser = $this->userService->where('id_personnel',$input['code_introduce'])->first();
       if($input['code_introduce'] == ''){
           return '';
       }
       if(isset($selectUser)){
           return array('success' => true,'data' => $selectUser, 'message' => 'Nhân viên giới thiệu: '.$selectUser->name);
       }else{
           return array('success' => false, 'message' => 'Mã nhân viên không chính xác , vui lòng thử lại!!!!');
       }
   }
     /// Lấy số tiền của chuyên khoa
     /**
     *
     * @param Request $request
     *
     * @return view
     */
    public function getMoney(Request $request)
    {
        $input = $request->all();
        $moneys =  MoneySpecialtyModel::where('code_hospital',$input['code_hospital'])
                                       ->where('code_specialty',$input['codeSpecialty'])
                                       ->select('money')
                                       ->first();
        $arr = [
            'money' => !empty($moneys->money)?$moneys->money:'',
            'moneyConvert' => !empty($moneys->money)?number_format($moneys->money, 0, '', ','):'Chưa cấu hình'
        ];
        return response()->json([
            'data' => $arr,
            'status' => true
        ]);
    }
}

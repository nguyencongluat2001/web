<?php

namespace Modules\Client\Page\AppointmentAtHome\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\Client\Page\AppointmentAtHome\Services\AppointmentAtHomeService;
use Modules\System\Dashboard\Blog\Services\BlogService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Category\Services\CateService;
use Illuminate\Support\Facades\Http;
use DB;
use Modules\System\Dashboard\Hospital\Services\HospitalService;
use Modules\System\Dashboard\Specialty\Models\UnitsModel;
use Modules\System\Dashboard\Specialty\Services\SpecialtyService;
use Modules\System\Dashboard\BloodTest\Services\BloodTestService;
use Modules\System\Dashboard\BloodTest\Models\PriceTestModel;
use Modules\Client\Page\AppointmentAtHome\Models\KqGhModel;
use PDF;
use Str;
/**
 * dịch vụ lấy mẫu xet nghiệm , truyền dịch tại nhà
 *
 * @author Luatnc
 */
class AppointmentAtHomeController extends Controller
{

    public function __construct(
        BloodTestService $BloodTestService,
        SpecialtyService $SpecialtyService,
        CateService $cateService,
        CategoryService $categoryService,
        AppointmentAtHomeService $AppointmentAtHomeService,
        BlogService $blogService,
        HospitalService $hospitalService
    ){
        $this->BloodTestService = $BloodTestService;
        $this->SpecialtyService = $SpecialtyService;
        $this->cateService = $cateService;
        $this->categoryService = $categoryService;
        $this->blogService = $blogService;
        $this->AppointmentAtHomeService = $AppointmentAtHomeService;
        $this->hospitalService = $hospitalService;
    }
    /**
     * dat lich
     *
     * @param Request $request
     *
     * @return view
     */
    public function indexApointment(Request $request)
    {
        $input = $request->all();
        $getBloodTest['datas'] = $this->BloodTestService->whereIn('code',['PACK1','PACK2','PACK3','PACK4','PACK5','PACK6','PACK7','PACK8','PACK9','PACK10','PACK11','PACK12','PACK13','PACK14','PACK15','PACK16','PACK17','PACK18','PACK19','PACK20','PACK21','PACK22'])->get()->toArray();
        return view('client.AppointmentAtHome.homeAppointement',$getBloodTest);
    }
     // dịch vụ xét nghiệm, truyền dịch tại nhà
     /**
     *
     * @param Request $request
     *
     * @return view
     */
    public function index(Request $request ,$code)
    {
        $input = $request->all();
        // $data['datas'] = $this->BloodTestService->where('code',$code)->get()->toArray();
        $price = PriceTestModel::where('code_blood',$code)->get()->toArray();

        $total = 0;
        foreach($price as $item){
            $total = $total+= $item['price'];
        }
        $datas['total'] = !empty($total)?number_format($total,0, '', ','):0;
        $datas['money'] = $total;
        $datas['code'] = $code;
        $datas['count'] = count($price);
        $datas['code_blood'] = $code;
        $datas['type_xetnghiem'] =  $this->BloodTestService->whereIn('code',['PACK1','PACK2','PACK3','PACK4','PACK5','PACK6','PACK7','PACK8','PACK9','PACK10','PACK11','PACK12','PACK13','PACK14','PACK15','PACK16','PACK17','PACK18','PACK19','PACK20','PACK21','PACK22'])->orderby('created_at','DESC')->get()->toArray();
        $BloodTest =  $this->BloodTestService->where('sex',1)->orWhere('sex',2)->orderby('created_at','DESC')->get()->toArray();
        // dd($price,$BloodTest,$total);
        $i = 1;
        foreach($BloodTest as $val){
            $price = PriceTestModel::where('code',$val['code'])->first();
            if(empty($price) || $price == null ){
                $price = PriceTestModel::where('code_blood',$val['code'])->get()->toArray();
                $total = 0;
                foreach($price as $item){
                    $total = $total+= $item['price'];
                }
            }
            $arr[] = [
                'code'=> $val['code'],
                'name'=> $val['name'],
                'price'=> !empty($price->price)?number_format($price->price): number_format($total)
            ];
        }
        $datas['type_chidinh'] = $arr;
        return view('client.AppointmentAtHome.home',$datas);
    }
      // dịch vụ xét nghiệm, truyền dịch tại nhà
     /**
     *
     * @param Request $request
     *
     * @return view
     */
    public function index_edit(Request $request ,$code)
    {
        $input = $request->all();
        $getInfo = $this->AppointmentAtHomeService->find($code);
        // dd($getInfo);
        // $data['datas'] = $this->BloodTestService->where('code',$code)->get()->toArray();
        $price = PriceTestModel::where('code_blood',$code)->get()->toArray();

        $total = 0;
        foreach($price as $item){
            $total = $total+= $item['price'];
        }
        $datas['total'] = !empty($total)?number_format($total,0, '', ','):0;
        $datas['money'] = $total;
        $datas['code'] = $code;
        $datas['count'] = count($price);
        $datas['code_blood'] = $code;
        $datas['type_xetnghiem'] =  $this->BloodTestService->whereIn('code',['PACK1','PACK2','PACK3','PACK4','PACK5','PACK6','PACK7','PACK8','PACK9','PACK10','PACK11','PACK12','PACK13','PACK14','PACK15','PACK16','PACK17','PACK18','PACK19','PACK20','PACK21','PACK22'])->orderby('created_at','DESC')->get()->toArray();
        $BloodTest =  $this->BloodTestService->where('sex',1)->orWhere('sex',2)->orderby('created_at','DESC')->get()->toArray();
        // dd($price,$BloodTest,$total);
        $i = 1;
        foreach($BloodTest as $val){
            $price = PriceTestModel::where('code',$val['code'])->first();
            if(empty($price) || $price == null ){
                $price = PriceTestModel::where('code_blood',$val['code'])->get()->toArray();
                $total = 0;
                foreach($price as $item){
                    $total = $total+= $item['price'];
                }
            }
            $arr[] = [
                'code'=> $val['code'],
                'name'=> $val['name'],
                'checker'=> 1,
                'price'=> !empty($price->price)?number_format($price->price): number_format($total)
            ];
        }
        foreach($arr as $child_val){
            $arr_code_indications = explode(',',$getInfo->code_indications);
            $result = array_search($child_val['code'], $arr_code_indications);
            
            if ($result !== false) {
                $checker = 1;
            } else {
                $checker = 2;
            }
            $arrData[] = [
                'code'=> $child_val['code'],
                'name'=> $child_val['name'],
                'checker'=> $checker,
                'price'=> $child_val['price'],
            ];
        }
        $datas['type_chidinh'] = $arrData;
        $datas['getInfo'] = $getInfo;
        // dd($datas);
        return view('client.AppointmentAtHome.home',$datas);
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
        $sendPayment =  $this->AppointmentAtHomeService->sendPayment($input);
        return response()->json([
            'status' => $sendPayment
        ]);
    }
     /**
     * dat lich
     *
     * @param Request $request
     *
     * @return view
     */
    public function tab1(Request $request,$code)
    {
        $input = $request->all();
        $data['datas'] = $this->BloodTestService->where('code',$code)->get()->toArray();
        $price = PriceTestModel::where('code_blood',$code)->get()->toArray();
        $total = 0;
        foreach($price as $item){
            $arr[] = [
                'id'=> $item['id'],
                'code'=> $item['code'],
                'name'=> $item['name'],
                'price'=> number_format($item['price'],0, '', ','),
            ];
            $total = $total+= $item['price'];
        }
        $data['arr_price'] = $arr;
        $data['total'] = number_format($total,0, '', ',');
        return view('client.AppointmentAtHome.tab1',$data);
    }
       /**
     * dat lich
     *
     * @param Request $request
     *
     * @return view
     */
    public function getPrice(Request $request)
    {
        $input = $request->all();
        $price = PriceTestModel::where('code_blood',$input['code_blood'])->get()->toArray();
        $total = 0;
        foreach($price as $item){
            $total = $total+= $item['price'];
        }
        $datas['total'] = number_format($total,0, '', ',');
        $datas['money'] = $total;
        $datas['count'] = count($price);
        $datas['code_blood'] = $input['code_blood'];
        return response()->json([
            'data' => $datas,
            'status' => true
        ]);
    }
       /**
     * lay thong tin benh nhan
     *
     * @param Request $request
     *
     * @return view
     */
    public function getInfioPatient(Request $request)
    {
        $input = $request->all();
        $datas = $this->AppointmentAtHomeService->getInfioPatient($input);
        return response()->json([
            'data' => $datas,
            'status' => true
        ]);
    }
         /**
     * dat lich
     *
     * @param Request $request
     *
     * @return view
     */
    public function showInfor(Request $request)
    {
        $input = $request->all();
        $price = PriceTestModel::where('code_blood',$input['code_blood'])->get()->toArray();
        $total = 0;
        foreach($price as $item){
            $arr[] = [
                'id'=> $item['id'],
                'code'=> $item['code'],
                'name'=> $item['name'],
                'price'=> number_format($item['price'],0, '', ','),
            ];
            $total = $total+= $item['price'];
        }
        $data['arr_price'] = $arr;
        $data['total'] = number_format($total,0, '', ',');
        return view('client.AppointmentAtHome.infor',$data);
    }


           /**
     * dat lich
     *
     * @param Request $request
     *
     * @return view
     */
    public function flow(Request $request)
    {
        $input = $request->all();
        if($input['code'] == 'TONG_QUAT'){
            $data = [
                '1' => [
                    'code' => 'PACK8',
                    'name' => 'Xét nghiệm vi chất trẻ nhỏ'
                ],
                '2' => [
                    'code' => 'PACK4',
                    'name' => 'Xét nghiệm ung thư nam giới'
                ],
                '3' => [
                    'code' => 'PACK5',
                    'name' => 'Xét nghiệm ung thư nữ giới'
                ]
                ];
        }
        if($input['code'] == 'SINH_HOA'){
            $data = [
                '1' => [
                    'code' => 'PACK12',
                    'name' => 'Xét nghiệm sinh hóa cơ bản'
                ]
                ];
        }
        if($input['code'] == 'UNG_THU'){
            $data = [
                '1' => [
                    'code' => 'PACK4',
                    'name' => 'Xét nghiệm ung thư nam giới'
                ],
                '2' => [
                    'code' => 'PACK5',
                    'name' => 'Xét nghiệm ung thư nữ giới'
                ]
                ];
        }
        if($input['code'] == 'SOT_XH'){
            $data = [
                '1' => [
                    'code' => 'PACK6',
                    'name' => 'Xét nghiệm sốt XH'
                ]
                ];
        }
        if($input['code'] == 'CUM'){
            $data = [
                '1' => [
                    'code' => 'PACK7',
                    'name' => 'Xét nghiệm cúm'
                ]
                ];
        }
        if($input['code'] == 'VI_CHAT_TRE_NHO'){
            $data = [
                '1' => [
                    'code' => 'PACK8',
                    'name' => 'Xét nghiệm vi chất trẻ nhỏ'
                ]
                ];
        }
        if($input['code'] == 'GAN'){
            $data = [
                '1' => [
                    'code' => 'PACK9',
                    'name' => 'Xét nghiệm gan'
                ]
                ];
        }
        if($input['code'] == 'TRUYEN_NHIEM'){
            $data = [
                '1' => [
                    'code' => 'PACK10',
                    'name' => 'Xét nghiệm truyền nhiễm'
                ]
                ];
        }
        if($input['code'] == 'NOI_TIET'){
            $data = [
                '1' => [
                    'code' => 'PACK11',
                    'name' => 'Xét nghiệm nội tiết'
                ]
                ];
        }
        if($input['code'] == 'THUONG'){
            $data = [
                '1' => [
                    'code' => 'PACK13',
                    'name' => 'Đặt lịch tại nhà'
                ]
                ];
        }
        return view('client.AppointmentAtHome.flow',compact('data'));
    }



     /**
     * tổng giá các chỉ số
     *
     * @param Request $request
     *
     * @return view
     */
    public function showPack(Request $request)
    {
        $input = $request->all();
        $arr = [];
        $total = 10000;
        if($input['code_indications'] == null){
            $total = 0;
        }else{
            $expl = explode(',',$input['code_indications']);
            foreach($expl as $val){
                $price = PriceTestModel::where('code',$val)->first();
                if(empty($price) || $price == null ){
                    $price = PriceTestModel::where('code_blood',$val)->get()->toArray();
                    foreach($price as $item){
                        $total = $total+= $item['price'];
                    }
                }
                $arr[] = [
                    'code'=> $val,
                    'price'=> !empty($price->price)?number_format($price->price): number_format($total)
                ];
                if(!empty($price->price)){
                    $total = $total+= $price->price;
                }
            }
        }
        $data['chiso'] = $arr;
        if(!empty($input['code_sale']) && $input['code_sale'] == 'GHT6L8'){
            $total_sale = $total/10;
            $total = $total_sale*9;
        }
        $data['total'] = number_format($total,0, '', ',');
        $data['total_number'] = $total;
        return response()->json([
            'data' => $data,
            'status' => true
        ]);
    }



    /// Danh sách lịch chỉ định 
    /**
     * dat lich
     *
     * @param Request $request
     *
     * @return view
     */
    public function list_Indications(Request $request)
    {
        $input = $request->all();
        $getBloodTest['datas'] = $this->BloodTestService->where('sex',1)->orWhere('sex',2)->get()->toArray();
        return view('client.AppointmentAtHome.Indications.index',$getBloodTest);
    }
     /**
     * dat lich truyền dịch
     *
     * @param Request $request
     *
     * @return view
     */
    public function loadList_Indications(Request $request)
    {
        $arrInput = $request->input();
        $data = array();
        $arrInput['sort'] = 'created_at';
        $turnover = 0;
        $objResult = [];
        if(!empty($arrInput['type']) && $arrInput['type'] == 'TAT_CA'){
            $objResult = $this->AppointmentAtHomeService->filter($arrInput);
            $date = date('Y-m-d');
            $turnover = $this->AppointmentAtHomeService
                             ->where('type_at_home','XET_NGHIEM')
                             ->whereDate('created_at', '>=', $arrInput['fromDate'])
                             ->whereDate('created_at', '<=', $arrInput['toDate'])
                             ->sum('money');
        }elseif(!empty($_SESSION['code']) && $_SESSION['code'] != '' && $arrInput['type'] == 'CA_NHAN'){
            $arrInput['code'] = !empty($_SESSION['code'])?$_SESSION['code']:'';
            if(empty($_SESSION['code'])){
                $objResult = [];
            }else{
                $objResult = $this->AppointmentAtHomeService->filter($arrInput);
            }
            $date = date('Y-m-d');
            $turnover = $this->AppointmentAtHomeService
                            ->where('code_ctv',$_SESSION['code'])
                            ->whereDate('created_at', '>=', $arrInput['fromDate'])
                            ->whereDate('created_at', '<=', $arrInput['toDate'])
                            ->sum('money');

        }elseif($arrInput['type'] == 'BAC_SI'){
            $arrInput['code'] = !empty($_SESSION['code'])?$_SESSION['code']:'';
            if(empty($_SESSION['code'])){
                $objResult = [];
            }else{
                $arrInput['code_doctor'] = 1;
                $objResult = $this->AppointmentAtHomeService->filter($arrInput);
            }
            $date = date('Y-m-d');
            $turnover = $this->AppointmentAtHomeService
                            ->where('code_ctv',$_SESSION['code'])
                            ->whereNotNull('code_doctor')
                            ->whereDate('created_at', '>=', $arrInput['fromDate'])
                            ->whereDate('created_at', '<=', $arrInput['toDate'])
                            ->sum('money');
        }
        foreach($objResult as $val){
            try{
                $check = KqGhModel::where('code',$val['code_patient'])->first();
                if(!empty($check)){
                    $val->status_gh = 1;
                    $val->url = $check['url'];
                    $val->filename = $check['namefile'];
                }else{
                    $param = [
                        'sid'=> $val['code_patient'],
                        // 'pwd'=> $arrInput['pwd']
                        'pwd'=> 123
                    ];
                    // $response = Http::withBody(json_encode($param),'application/json')->post('ketqua.ghtruelab.vn:7979/api/LIS/PdfDownload');
                    // $response = $response->getBody()->getContents();
                    // $response = json_decode($response,true);
                    // if($response['status'] == true){
                    //     $file = $response['result']['Filepdf'];
                    //     $check = KqGhModel::where('code',$val['code_patient'])->first();
                    //     $arr = [
                    //         'id'=> (string)Str::uuid(),
                    //         'code'=> $val['code_patient'],
                    //         'namefile'=> $response['result']['filename'],
                    //         'url'=> $response['result']['Filepdf'],
                    //         'status'=> 1,
                    //         'created_at' => date("Y/m/d H:i:s"),
                    //         'updated_at' => date("Y/m/d H:i:s")
                    //     ];
                    //     if(empty($check)){
                    //         KqGhModel::create($arr);
                    //     }
                    //     $val->status_gh = 1;
                    //     $val->url = $response['result']['Filepdf'];
                    //     $val->filename = $response['result']['filename'];
                    // }else{
                        $val->status_gh = 2;
                    // }
                }
            } catch (\Exception $e) {
                $check = KqGhModel::where('code',$val['code_patient'])->first();
                if(!empty($check)){
                    $val->status_gh = 1;
                    $val->url = $check['url'];
                    $val->filename = $check['namefile'];
                }else{
                    $val->status_gh = 2;
                }
            }
        }
        $turnover_convert = number_format($turnover,0, '', ',');
        $data['datas'] = $objResult;
        $data['turnover_convert'] = $turnover_convert;
        return view("client.AppointmentAtHome.Indications.loadlist", $data)->render();
    }
    /**
     * Form sửa
     */
    public function showDetail(Request $request)
    {
        $input = $request->all();
        $data = $this->AppointmentAtHomeService->showDetail($input); 
        // dd($data);
        return view('client.AppointmentAtHome.Indications.showDetail', $data);
    }


    ///lịch hẹn
    /**
     * dat lich
     *
     * @param Request $request
     *
     * @return view
     */
    public function lichhen(Request $request)
    {
        $input = $request->all();
        $day = date("Y-m-d");
        if($_SESSION['code'] == 'YE08'){
            $data = $this->AppointmentAtHomeService->where('type_at_home','XET_NGHIEM')->where('appointment','LIKE','%'.$day.'%')->get(); 
        }else{
            $data = $this->AppointmentAtHomeService->where('type_at_home','XET_NGHIEM')->where('appointment','LIKE','%'.$day.'%')->where('code_ctv',$_SESSION['code'])->get(); 
        }
        foreach($data as $val){
            $check = KqGhModel::where('code',$val['code_patient'])->first();
            if(!empty($check)){
                $val->status_gh = 1;
                $val->url = $check['url'];
                $val->filename = $check['namefile'];
            }else{
                $val->status_gh = 2;
            }
        }
        $datas['datas'] = $data;
        
        return view('client.AppointmentAtHome.Indications.indexLichhen',$datas);
    }





    /// Truyền dịch tại nhà
    /**
     * dat lich
     *
     * @param Request $request
     *
     * @return view
     */
    public function indexInfusion(Request $request)
    {
        $input = $request->all();
        $getBloodTest['datas'] = $this->BloodTestService->where('sex',1)->orWhere('sex',2)->get()->toArray();
        return view('client.AppointmentAtHome.Infusion.InfusionAppointement',$getBloodTest);
    }
     /**
     * dat lich truyền dịch
     *
     * @param Request $request
     *
     * @return view
     */
    public function indexInfusion_form(Request $request ,$code)
    {
        $input = $request->all();
        // $data['datas'] = $this->BloodTestService->where('code',$code)->get()->toArray();
        $price = PriceTestModel::where('code_blood',$code)->get()->toArray();
        $total = 0;
        foreach($price as $item){
            $total = $total+= $item['price'];
        }
        $datas['total'] = !empty($total)?number_format($total,0, '', ','):0;
        $datas['money'] = $total;
        $datas['code'] = $code;
        $datas['count'] = count($price);
        $datas['code_blood'] = $code;
        $datas['type_xetnghiem'] =  $this->BloodTestService->where('sex',1)->orWhere('sex',2)->get()->toArray();
        // dd($datas);
        return view('client.AppointmentAtHome.Infusion.home',$datas);
    }

    /**
     * Xuất lịch PDF
     *
     * @param Request $request
     *
     * @return view
     */
    public function pdf(Request $request)
    {
        $input = $request->all();
        $input['id'] = '047632ee-2010-4091-af35-29e59f92b0d2';
        // $data = ['name' => 'tienduong'];
        $data = $this->AppointmentAtHomeService->showDetail($input); 	
    	$pdf = PDF::loadView('client.AppointmentAtHome.invoice',  compact('data')) ->setPaper('a4', 'landscape')
              ->setWarnings(false)->setOptions(['isFontSubsettingEnabled' => true]);
    		return $pdf->download('invoice.pdf');
    }
        /**
     * Xuất lịch Excel
     *
     * @param Request $request
     *
     * @return view
     */
    public function exportExcel(Request $request)
    {
        $input = $request->all();
        $data = $this->AppointmentAtHomeService->showDetail($input); 
        $urls = $this->AppointmentAtHomeService->exportExcel($data); 
        $url = ['url' => url('export/'.$urls),'success' => true];
        return response()->json($url);
    }
        /**
     * delete
     *
     * @param Request $request
     *
     * @return view
     */
    public function delete(Request $request)
    {
        $input = $request->all();
        $data = $this->AppointmentAtHomeService->where('id', $input['id'])->delete(); 
        return response()->json(['success'=>true]);
    }
            /**
     * delete
     *
     * @param Request $request
     *
     * @return view
     */
    public function nhapngayhen(Request $request)
    {
        $input = $request->all();
        $arr = [
            'appointment' => $input['appointment'],
        ];
        $data = $this->AppointmentAtHomeService->where('id', $input['id'])->update($arr); 
        return response()->json(['success'=>true]);
    }


     // Biểu đồ thống kê doanh thu
     /**
     *
     * @param Request $request
     *
     * @return view
     */
    public function chart(Request $request)
    {
        $input = $request->all();
        $data = $this->AppointmentAtHomeService->chart($input); 
        return view('client.AppointmentAtHome.chart',$data);
    }
    // Biểu đồ thống kê doanh thu
     /**
     *
     * @param Request $request
     *
     * @return view
     */
    public function report(Request $request)
    {
        $input = $request->all();
        $data = $this->AppointmentAtHomeService->report($input); 
        return response()->json($data);
    }
}

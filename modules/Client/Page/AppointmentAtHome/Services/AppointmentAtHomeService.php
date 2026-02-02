<?php

namespace Modules\Client\Page\AppointmentAtHome\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\Client\Page\AppointmentAtHome\Repositories\AppointmentAtHomeRepository;
use Illuminate\Support\Facades\Http;
use Modules\Base\Library;
use Modules\System\Dashboard\BloodTest\Models\PriceTestModel;
use DB;
use Str;
use Modules\Client\Page\AppointmentAtHome\Models\PatientModel;
use Modules\Base\Helpers\ForgetPassWordMailHelper;



class AppointmentAtHomeService extends Service
{
    public function __construct(
    ){
        parent::__construct();
        $this->baseDis = public_path("export/") . "/";
    }
    public function repository()
    {
        return AppointmentAtHomeRepository::class;
    }
     /**
     * Đặt lịch khám
     *
     * @param Request $request
     *
     * @return view
     */
    public function sendPayment($input)
    {
        DB::beginTransaction();
        try{
            $random = Library::_get_randon_number();
            // $code_schedule = $random.'_'.date("d").'_'.date("m").'_'.date("Y");
            $code = $random.date("d").date("m").date("Y");
            $param = [
                'code'=> $code,
                'code_patient'=> !empty($input['code_patient'])?$input['code_patient']:'',
                'code_indications'=> !empty($input['code_indications'])?$input['code_indications']:'',
                'code_doctor'=> !empty($input['code_doctor'])?$input['code_doctor']:'',
                'money'=> !empty($input['money'])?$input['money']:'',
                'name'=> $input['name'],
                'phone'=> !empty($input['phone'])?$input['phone']:'',
                'money'=> !empty($input['money'])?$input['money']:'',
                'type'=> !empty($input['code'])?$input['code']:'',
                'type_at_home'=> !empty($input['type_at_home'])?$input['type_at_home']:'',
                'sex'=> !empty($input['sex'])?$input['sex']:'',
                'date_sampling'=> !empty($input['date_sampling'])?$input['date_sampling']:'',
                'hour_sampling'=> !empty($input['hour_sampling'])?$input['hour_sampling']:'',
                'address'=> !empty($input['address'])?$input['address']:'',
                'reason'=> !empty($input['reason'])?$input['reason']:'',
                'type_payment'=> !empty($input['type_payment'])?$input['type_payment']:'',
                'status'=> 0,
                'date_birthday'=> !empty($input['date_birthday'])?$input['date_birthday']:'',
            ];
            if(!empty($_SESSION['role'])){
                $param['code_ctv'] = $_SESSION['code'];
            }
            if(!empty($input['id'] && $input['id'] != null)){
                $param['updated_at'] = date("Y/m/d H:i:s");
                $create = $this->where('id',$input['id'])->update($param);
            }else{
                $param['id'] = (string)Str::uuid();
                $param['created_at'] = date("Y/m/d H:i:s");
                $param['updated_at'] = date("Y/m/d H:i:s");
                $create = $this->create($param);

            }
            // thoong tin benh nhan
            $paramPatient = [
                'code'=> $code,
                'name'=> $input['name'],
                'phone'=> !empty($input['phone'])?$input['phone']:'',
                'sex'=> !empty($input['sex'])?$input['sex']:'',
                'address'=> !empty($input['address'])?$input['address']:'',
                'date_of_birth'=> !empty($input['date_birthday'])?$input['date_birthday']:'',
                'created_at' => date("Y/m/d H:i:s"),
                'updated_at' => date("Y/m/d H:i:s")
            ];
            $check = PatientModel::where('phone',$input['phone'])->first();
            if(!empty($check)){
                $createPatient = PatientModel::where('phone',$input['phone'])->update($paramPatient);
            }else{
                $paramPatient['id'] = (string)Str::uuid();
                $createPatient = PatientModel::create($paramPatient);
            }
            if(empty($_SESSION['role'])){
                $sebdMailToCTV = $this->sendMail($input);
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
           return array('success' => false, 'message' => (string) $e->getMessage());
        }
    }
      /**
     * Form show chi tiết lịch khám
     */
    public function showDetail($input)
    {
        $AppointmentAtHome = $this->repository->where('id', $input['id'])->first();
        // dd($AppointmentAtHome);
        $expl = explode(',',$AppointmentAtHome['code_indications']);
        // dd($expl);

        // $type = $this->BloodTestService->where('code',$AppointmentAtHome['type'])->first();
       
        $total = 0;
        $price = PriceTestModel::whereIn('code_blood',$expl)->orWhereIn('code',$expl)->get()->toArray();
        $totals = number_format($AppointmentAtHome->money,0, '', ',');
        $param = [
            'id' => isset($AppointmentAtHome['id'])?$AppointmentAtHome['id']:'', 
            'code' => isset($AppointmentAtHome['code'])?$AppointmentAtHome['code']:'', 
            'type' => isset($type['name'])?$type['name']:'', 
            'type_at_home' => isset($AppointmentAtHome['type_at_home'])?$AppointmentAtHome['type_at_home']:'',
            'code_doctor' => isset($AppointmentAtHome['code_doctor'])?$AppointmentAtHome['code_doctor']:'',  
            'code_patient'=> isset($AppointmentAtHome['code_patient'])?$AppointmentAtHome['code_patient']:'', 
            'name' => isset($AppointmentAtHome['name'])?$AppointmentAtHome['name']:'', 
            'phone' => isset($AppointmentAtHome['phone'])?$AppointmentAtHome['phone']:'', 
            'sex' => isset($AppointmentAtHome['sex'])?$AppointmentAtHome['sex']:'', 
            'address' => isset($AppointmentAtHome['address'])?$AppointmentAtHome['address']:'', 
            'money' => $totals, 
            'reason' => isset($AppointmentAtHome['reason'])?$AppointmentAtHome['reason']:'', 
            'date_birthday' => isset($AppointmentAtHome['date_birthday'])?($AppointmentAtHome['date_birthday']):'', 
            'date_sampling' => isset($AppointmentAtHome['date_sampling'])?date('d-m-Y',strtotime($AppointmentAtHome['date_sampling'])):'', 
            'hour_sampling' => isset($AppointmentAtHome['hour_sampling'])?$AppointmentAtHome['hour_sampling']:'', 
        ];
        $data['datas'] = $param;
        $data['price'] = $price;
    
        return $data;
    }
     /**
     * Xuất excel
     */
    public function exportExcel($input)
    {
        $path = $this->baseDis;
        $fromDate = date('H:i:s d-m-Y');
        $objPHPExcel = \PhpOffice\PhpSpreadsheet\IOFactory::load(base_path() . "/resources/public/template/TemCXLog.xlsx");
        $objWorksheet_template = $objPHPExcel->getActiveSheet();
        $provinceSheet = $objPHPExcel->setActiveSheetIndex(0);
        $namefile = date('Y').date('m').date('d').date('H').date('i').date('s').$input['datas']['code_patient'].'.Xls';

        if($input['datas']['sex'] == 1){
            $gioitinh = 'Nam';
        }elseif($input['datas']['sex'] == 2){
            $gioitinh = 'Nữ';
        }else{
            $gioitinh = 'Khác';
        }
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue("A4", '(Thông tin được xuất lúc '.$fromDate.')');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue("C5", $input['datas']['name']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue("C6", $input['datas']['phone']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue("C7", $input['datas']['date_birthday']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue("C8", $gioitinh);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue("C9", $input['datas']['code_patient']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue("C10", $input['datas']['code_doctor']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue("C11", 'Lúc '.$input['datas']['hour_sampling'].' ngày '.$input['datas']['date_sampling'].' - Tại '.$input['datas']['address']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue("A13", 'Tổng tiền');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue("C13", $input['datas']['money'].' VND');
        $j = 1;
        $i = 15;
        // dd($input['price']);
        foreach ($input['price'] as $value) {
            $price = number_format($value['price'],0, '', ',');
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue("A$i", $j)
                ->setCellValue("B$i", $value['code'])
                ->setCellValue("C$i", $value['name']. ' - ('.$price.' VND)');
            $i++;
            $j++;
        }
        

        // $objPHPExcel->setActiveSheetIndex(0)->setCellValue("D12", 'Tổng: '.$i.' chỉ số');
        $objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($objPHPExcel, 'Xls');
        $objWriter->save($path . $namefile);
        $create = $this->repository->where('id', $input['datas']['id'])->update(['link_excel' => url('export/'.$namefile)]);
        return $namefile;
    }
     /**
     * biểu đồ thống kê
     */
    public function chart($input)
    {
        // dd($input);
        return $input;
    }
       /**
     * biểu đồ thống kê
     */
    public function report($input)
    {
        $input['year'] = 2024;
        $input['month'] = '';
        $data = array();
        $monthArr = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        $total = 0;
        foreach($monthArr as $month){
            if(checkdate($month,31,date('Y')) == true){
                $toDayEnd = 31;
            }elseif(checkdate($month,30,date('Y')) == true){
                $toDayEnd = 30;
            }elseif(checkdate($month,29,date('Y')) == true){
                $toDayEnd = 29;
            }else{
                $toDayEnd = 28;
            }
            $fromDate = $input['year'].'-'.$month.'-01';
            $toDate = $input['year'].'-'.$month.'-'.$toDayEnd;
            $money = DB::table('service_at_home')->whereDate('created_at','>=' ,$fromDate)->whereDate('created_at','<=' ,$toDate)->where('code_ctv',$_SESSION['code'])->sum('money');
            if($input['month'] == '' || $input['month'] == $month){
                $datacc['dataMoney'][] = $money;
                $total += $money;

            }
        }
        $data['datas'] = $datacc;
        $data['total'] =  number_format($total,0, '', ',');
        return $data;
    }
      /**
     * lay thong tin benh nhan
     *
     * @param Request $request
     *
     * @return view
     */
    public function getInfioPatient($input)
    {
        $datas = PatientModel::where('phone',$input['phone'])->first();
        if(!empty($datas)){
            $data = [
                'code' => $datas['code'],
                'name' => $datas['name'],
                'phone' => $datas['phone'],
                'date_of_birth' => $datas['date_of_birth'],
                'sex' => $datas['sex'],
                'address' => $datas['address'],
            ];
        }else{
            $data = [
                'code' => '',
                'name' => '',
                'phone' => '',
                'date_of_birth' => '',
                'sex' => '',
                'address' => '',
            ];
        }
        return $data;
    }
    // gửi thông báo đến cộng tác viên khi có tin nhắn mới
    public function sendMail($input)
    {
        $phone = $input['phone'];
        // $stringHtml = file_get_contents(base_path() . '\storage\templates\chat\tem_forget.html');
        // Lấy dữ liệu
        $data['date'] = 'Ngày ' . date('d') . ' tháng ' . date('m') . ' năm ' . date('Y');
        $data['email'] = 'nguyennganchibi92@gmail.com';
        // $data['phone'] = $phone;
        $data['mailto'] = 'nguyennganchibi92@gmail.com';
        $data['message'] = "Có lịch đặt xét nghiệm mới! liên hệ khách hàng qua số điện thoại" . " " . $phone;
        $data['subject'] = 'Phần mềm đặt lịch xét nghiệm , truyền dịch tại nhà';
        // Gửi mail
        (new ForgetPassWordMailHelper($data['email'], $data['email'], '', $data))->send($data);
    }
}

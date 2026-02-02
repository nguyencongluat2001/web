<?php

namespace Modules\Client\Page\Facilities\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\Client\Page\Facilities\Repositories\ScheduleRepository;
use Illuminate\Support\Facades\Http;
use Modules\Base\Library;
use DB;
use Str;

class ScheduleService extends Service
{
    private $baseDis;
    public function __construct(

    ){
        parent::__construct();
        $this->baseDis = public_path("file-image-client/schedule") . "/";

    }
    public function repository()
    {
        return ScheduleRepository::class;
    }
     /**
     * Đặt lịch khám
     *
     * @param Request $request
     *
     * @return view
     */
    public function sendPayment($input,$file)
    {
        DB::beginTransaction();
        try{
            if(isset($file) && $file != []){
                $arrFile = $this->uploadFile($input,$file);
            }
            $random = Library::_get_randon_number();
            // $code_schedule = $random.'_'.date("d").'_'.date("m").'_'.date("Y");
            $code_schedule = $random.date("d").date("m").date("Y");
            $param = [
                'id' => (string)Str::uuid(),
                'code_schedule' => $code_schedule, 
                'code_hospital' => isset($input['code_hospital'])?$input['code_hospital']:'', 
                'code_physician' => isset($input['code_physician'])?$input['code_physician']:'', 
                'code_specialty' => isset($input['code_specialty'])?$input['code_specialty']:'', 
                'type_payment' => isset($input['type_payment'])?$input['type_payment']:'', 
                'money' => isset($input['money'])?$input['money']:'', 
                'name' => isset($input['name'])?$input['name']:'', 
                'phone' => isset($input['phone'])?$input['phone']:'', 
                'code_insurance' => isset($input['code_insurance'])?$input['code_insurance']:'', 
                'sex' => isset($input['sex'])?$input['sex']:'', 
                'email' => isset($input['email'])?$input['email']:'', 
                'date_of_brith' => isset($input['date_of_brith'])?$input['date_of_brith']:'', 
                'code_tinh' => isset($input['code_tinh'])?$input['code_tinh']:'', 
                'code_huyen' => isset($input['code_huyen'])?$input['code_huyen']:'', 
                'code_xa' => isset($input['code_xa'])?$input['code_xa']:'', 
                'address' => isset($input['address'])?$input['address']:'', 
                'date_sampling' => isset($input['date_sampling'])?$input['date_sampling']:'', 
                'hour_sampling' => isset($input['hour_sampling'])?$input['hour_sampling']:'', 
                'code_introduce' => isset($input['code_introduce'])?$input['code_introduce']:'', 
                'reason' => isset($input['reason'])?$input['reason']:'', 
                'name_image' => isset($arrFile[0])?$arrFile[0]:'Chưa gửi ảnh thanh toán!', 
                'created_at' => date("Y/m/d H:i:s"),
                'update_at' => date("Y/m/d H:i:s")
            ];
            $create = $this->create($param);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
           return array('success' => false, 'message' => (string) $e->getMessage());
        }
    }
    // /**
    //  * Tải ảnh vào thư mục
    //  */
    public function uploadFile($input,$file)
    {
            $path = $this->baseDis;
            foreach($file as $attValue){
                $fileName = $attValue['name'];
                $random = Library::_get_randon_number();
                $fileName = Library::_replaceBadChar($fileName);
                $fileName = Library::_convertVNtoEN($fileName);
                $sFullFileName = date("Y") . '_' . date("m") . '_' . date("d") . "_" . date("H") . date("i") . date("u") . $random . "!~!" . $fileName;
                move_uploaded_file($attValue['tmp_name'], $path . $sFullFileName);
                $arrImage[] =  $sFullFileName;
            }
            return $arrImage;
    }
   
}

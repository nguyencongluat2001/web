<?php

namespace Modules\System\Dashboard\Hospital\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\Hospital\Repositories\HospitalRepository;
use Modules\System\Dashboard\Hospital\Services\MoneySpecialtyService;
use Modules\System\Dashboard\Hospital\Services\SystemClinicsService;
use Str;
use Modules\Base\Library;


class HospitalService extends Service
{

    public function __construct(
        SystemClinicsService $SystemClinicsService,
        MoneySpecialtyService $moneySpecialtyService,
        HospitalRepository $HospitalRepository
        )
    {
        $this->SystemClinicsService  = $SystemClinicsService;
        $this->moneySpecialtyService = $moneySpecialtyService;
        $this->HospitalRepository = $HospitalRepository;
        $this->baseDis = public_path("file-image-client/avatar-hospital") . "/";
        parent::__construct();
    }

    public function repository()
    {
        return HospitalRepository::class;
    }

    public function store($input,$file){
        //lấy mã bài viết
        $random = Library::_get_randon_number();
        $image_old = null;
        if($input['id'] != ''){
            $hospital = $this->HospitalRepository->where('id',$input['id'])->first();
            $image_old = !empty($hospital->avatar)?$hospital->avatar:'';
        }
        if(isset($file) && $file != []){
            $arrFile = $this->uploadFile($input,$file,$image_old);
        }
        $arrData = [
            'name_hospital'=>$input['name_hospital'],
            'code'=>$input['code'],
            'decision'=>$input['decision'],
            'type'=>$input['type'],
            'address'=>$input['address'],
            'code_specialty' => $input['code_specialty'],
            'current_status'=> !empty($input['is_checkbox_status'])?$input['is_checkbox_status']:0,
        ];
        if(isset($arrFile[0])){
            $arrData['avatar'] = $arrFile[0];
        }
        if($input['id'] != ''){
            $create = $this->HospitalRepository->where('id',$input['id'])->update($arrData);
        }else{
            $arrData['id'] = (string)Str::uuid();
            $create = $this->HospitalRepository->create($arrData);
        }
        
        return $create;
    }
    public function edit($arrInput){
        $data = $this->repository->where('id',$arrInput['chk_item_id'])->first()->toArray();
        $data['arrSpecialty'] = explode(',',$data['code_specialty']);
        return $data;
    }
      // /**
    //  * Tải ảnh vào thư mục
    //  */
    public function uploadFile($input,$file,$image_old)
    {
            $path = $this->baseDis;
            $old_path = $path.$image_old;
            if (file_exists($old_path)) {
                @unlink($old_path);
            }
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
    //Cấu hình giá tiền
    public function createMoneyPackage($input){
        $hospital = $this->HospitalRepository->where('id',$input['id'])->first();
        foreach($input as $key=>$value){
            if($key != '_token' &&  $key != 'id'){
                if($value == '' && $value == null){
                    return array('success' => false, 'message' => 'Giá khám các khoa không được để trống!');
                }
                
            }
        }
        $delete = $this->moneySpecialtyService->where('code_hospital',$hospital->code)->delete();
        foreach($input as $key=>$value){
            if($key != '_token' &&  $key != 'id'){
                if(isset($hospital)){
                    $arrData = [
                        'code_hospital' => $hospital->code,
                        'code_specialty' => $key,
                        'money' => $value,
                        'created_at' => date("Y/m/d H:i:s"),
                        'updated_at' => date("Y/m/d H:i:s")
                    ];
                    $arrData['id'] = (string)Str::uuid();
                    $create = $this->moneySpecialtyService->create($arrData);
                }else{
                    return array('success' => false, 'message' => 'Không tồn tại bệnh viện!');
                }
            }
        }
        return array('success' => true, 'message' => 'Cập nhật thành công!');
    }
    //
    public function storeStage($input,$file){
        //lấy mã bài viết
        $random = Library::_get_randon_number();
        $image_old = null;
        if($input['id'] != ''){
            $hospital = $this->SystemClinicsService->where('id',$input['id'])->first();
            $image_old = !empty($hospital->avatar)?$hospital->avatar:'';
        }
        if(isset($file) && $file != []){
            $arrFile = $this->uploadFile($input,$file,$image_old);
        }
        $arrData = [
            'code_hospital'=> $input['code_hospital'], // mã bệnh viện phòng khám
            'code'=> $input['code'],
            'name'=> $input['name'],
            'time'=> $input['time'],
            'specialtys'=> $input['specialtys'], //chuyên khoa
            'money'=> $input['money'], //phí khám
            'profile'=> $input['profile'], //tiểu sử
            'order'=> $input['order'],
        ];
        if(isset($arrFile[0])){
            $arrData['image'] = $arrFile[0];
        }
        if($input['id'] != ''){
            $create = $this->SystemClinicsService->where('id',$input['id'])->update($arrData);
        }else{
            $arrData['id'] = (string)Str::uuid();
            $create = $this->SystemClinicsService->create($arrData);
        }
        
        return $create;
    }
    // cập nhật bác sĩ phòng khám
    public function editStage($arrInput){
        $data = $this->SystemClinicsService->where('id',$arrInput['chk_item_id'])->first();
        return $data;
    }
}

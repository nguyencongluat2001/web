<?php

namespace Modules\System\Dashboard\Hospital\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\Hospital\Repositories\HospitalRepository;
use Modules\System\Dashboard\Hospital\Services\MoneySpecialtyService;
use Modules\System\Dashboard\Hospital\Services\SystemClinicsService;
use Modules\System\Dashboard\Abount\Services\AbountService;
use Str;
use Modules\Base\Library;


class HospitalService extends Service
{

    public function __construct(
        SystemClinicsService $SystemClinicsService,
        MoneySpecialtyService $moneySpecialtyService,
        HospitalRepository $HospitalRepository,
        AbountService $AbountService
        )
    {
        $this->SystemClinicsService  = $SystemClinicsService;
        $this->moneySpecialtyService = $moneySpecialtyService;
        $this->HospitalRepository = $HospitalRepository;
        $this->AbountService = $AbountService;
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
            $hospital = $this->AbountService->where('id',$input['id'])->first();
            $image_old = !empty($hospital->avatar)?$hospital->avatar:'';
        }
        if(isset($file) && $file != []){
            $arrFile = $this->uploadFile($input,$file,$image_old);
        }
        $arrData = [
            'code'=>$input['code'],
            'decision'=>$input['decision'],
            'decision_en'=>$input['decision_en'],
            'status' => !empty($input['status'])?$input['status']:1,
        ];
        if(isset($arrFile[0])){
            $arrData['avatar'] = $arrFile[0];
        }
        if($input['id'] != ''){
            $create = $this->AbountService->where('id',$input['id'])->update($arrData);
        }else{
            $arrData['id'] = (string)Str::uuid();
            $create = $this->AbountService->create($arrData);
        }
        
        return $create;
    }
    public function edit($arrInput){
        $data = $this->AbountService->where('id',$arrInput['chk_item_id'])->first()->toArray();
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
}

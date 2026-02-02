<?php

namespace Modules\System\Dashboard\Specialty\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\Specialty\Repositories\SpecialtyRepository;
use Str;
use Modules\Base\Library;


class SpecialtyService extends Service
{

    public function __construct(
        SpecialtyRepository $SpecialtyRepository
        )
    {
        $this->SpecialtyRepository = $SpecialtyRepository;
        $this->baseDis = public_path("file-image-client/avatar-specialty") . "/";
        parent::__construct();
    }

    public function repository()
    {
        return SpecialtyRepository::class;
    }

    public function store($input,$file){
        //lấy mã khoa
        $random = Library::_get_randon_number();
        $image_old = null;
        if($input['id'] != ''){
            $hospital = $this->SpecialtyRepository->where('id',$input['id'])->first();
            $image_old = !empty($hospital->avatar)?$hospital->avatar:'';
        }
        if(isset($file) && $file != []){
            $arrFile = $this->uploadFile($input,$file,$image_old);
        }

        $arrData = [
            'name_specialty'=>$input['name_specialty'],
            'code'=>$input['code'],
            'decision'=>$input['decision'],
            'order'=>$input['order'],
            'current_status'=> !empty($input['is_checkbox_status'])?$input['is_checkbox_status']:0,
        ];
        if(isset($arrFile[0])){
            $arrData['avatar'] = $arrFile[0];
        }
        if($input['id'] != ''){
            $create = $this->SpecialtyRepository->where('id',$input['id'])->update($arrData);
        }else{
            $arrData['id'] = (string)Str::uuid();
            $create = $this->SpecialtyRepository->create($arrData);
        }
        
        return $create;
    }
    public function edit($arrInput){
        $getUserInfor = $this->repository->where('id',$arrInput['chk_item_id'])->first()->toArray();
        return $getUserInfor;
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

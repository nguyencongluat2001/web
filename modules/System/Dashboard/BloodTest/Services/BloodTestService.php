<?php

namespace Modules\System\Dashboard\BloodTest\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\BloodTest\Repositories\BloodTestRepository;
use Str;
use Modules\Base\Library;


class BloodTestService extends Service
{

    public function __construct(
        BloodTestRepository $BloodTestRepository
        )
    {
        $this->BloodTestRepository = $BloodTestRepository;
        parent::__construct();
    }

    public function repository()
    {
        return BloodTestRepository::class;
    }

    public function store($input){
        //lấy mã bài viết
        $arrData = [
            'code' => !empty($input['code'])?$input['code']:'',
            'name' => !empty($input['name'])?$input['name']:'',
            'form' => !empty($input['form'])?$input['form']:'',
            'sex' => !empty($input['sex'])?$input['sex']:'',
            'age' => !empty($input['age'])?$input['age']:'',
            'date_created' => !empty($input['date_created'])?$input['date_created']:'',
            'date_end' => !empty($input['date_end'])?$input['date_end']:'', 
            'address' => !empty($input['address'])?$input['address']:'',
            'promotion' => !empty($input['promotion'])?$input['promotion']:'', 
            'decision' => !empty($input['decision'])?$input['decision']:'',
            'created_at' => date("Y/m/d H:i:s"),
            'updated_at' => date("Y/m/d H:i:s"),
        ];
        if($input['id'] != ''){
            $create = $this->BloodTestRepository->where('id',$input['id'])->update($arrData);
        }else{
            $arrData['id'] = (string)Str::uuid();
            $create = $this->BloodTestRepository->create($arrData);
        }
        
        return $create;
    }
    public function edit($arrInput){
        $data = $this->repository->where('id',$arrInput['chk_item_id'])->first()->toArray();
        return $data;
    }
}

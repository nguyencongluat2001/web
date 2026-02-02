<?php

namespace Modules\System\Dashboard\BloodTest\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\BloodTest\Repositories\PriceTestRepository;
use Str;
use Modules\Base\Library;


class PriceTestService extends Service
{

    public function __construct(
        PriceTestRepository $PriceTestRepository
        )
    {
        $this->PriceTestRepository = $PriceTestRepository;
        parent::__construct();
    }

    public function repository()
    {
        return PriceTestRepository::class;
    }

    public function store($input){
        $arrData = [
            'code_blood' => !empty($input['code_blood'])?$input['code_blood']:'',
            'code' => !empty($input['code'])?$input['code']:'',
            'name' => !empty($input['name'])?$input['name']:'',
            'price' => !empty($input['price'])?$input['price']:'',
            'created_at' => date("Y/m/d H:i:s"),
            'updated_at' => date("Y/m/d H:i:s"),
        ];
        if($input['id'] != ''){
            $create = $this->PriceTestRepository->where('id',$input['id'])->update($arrData);
        }else{
            $arrData['id'] = (string)Str::uuid();
            $create = $this->PriceTestRepository->create($arrData);
        }
        
        return $create;
    }
    public function edit($arrInput){
        $data = $this->repository->where('id',$arrInput['chk_item_id'])->first()->toArray();
        return $data;
    }
}

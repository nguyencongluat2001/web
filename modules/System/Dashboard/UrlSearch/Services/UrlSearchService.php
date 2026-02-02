<?php

namespace Modules\System\Dashboard\UrlSearch\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\UrlSearch\Repositories\UrlSearchRepository;
use Str;
use Modules\Base\Library;


class UrlSearchService extends Service
{

    public function __construct(
        UrlSearchRepository $UrlSearchRepository
        )
    {
        $this->UrlSearchRepository = $UrlSearchRepository;
        // $this->baseDis = public_path("file-image-client/avatar-UrlSearch") . "/";
        parent::__construct();
    }

    public function repository()
    {
        return UrlSearchRepository::class;
    }

    public function store($input,$file){
        $arrData = [
            'name'=>$input['name'],
            'url'=>$input['url'],
            // 'decision'=>$input['decision'],
            'order'=>$input['order'],
            'current_status'=> !empty($input['is_checkbox_status'])?$input['is_checkbox_status']:0,
        ];
        if($input['id'] != ''){
            $create = $this->UrlSearchRepository->where('id',$input['id'])->update($arrData);
        }else{
            $arrData['id'] = (string)Str::uuid();
            $create = $this->UrlSearchRepository->create($arrData);
        }
        
        return $create;
    }
    public function edit($arrInput){
        $getUserInfor = $this->repository->where('id',$arrInput['chk_item_id'])->first()->toArray();
        return $getUserInfor;
    }

}

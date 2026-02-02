<?php

namespace Modules\System\Dashboard\Permision\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Service;
use Modules\System\Dashboard\Permision\Repositories\PermisionRepository;
use Str;

class PermisionService extends Service
{

    public function __construct(
        PermisionRepository $PermisionRepository
        )
    {
        $this->PermisionRepository = $PermisionRepository;
        parent::__construct();
    }

    public function repository()
    {
        return PermisionRepository::class;
    }

    public function store($input){
        dd($input);
        return $create;
    }
    public function edit($input){
        $data = $this->find('id',$input['id']);
        dd($data);
        return $data;
    }

}

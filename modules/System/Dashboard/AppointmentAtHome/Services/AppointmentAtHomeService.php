<?php

namespace Modules\System\Dashboard\AppointmentAtHome\Services;

use Modules\Base\Service;
use Modules\System\Dashboard\AppointmentAtHome\Repositories\AppointmentAtHomeRepository;
use Modules\System\Dashboard\Specialty\Services\SpecialtyService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\BloodTest\Models\PriceTestModel;
use Modules\System\Dashboard\BloodTest\Services\BloodTestService;

class AppointmentAtHomeService extends Service
{
    public function __construct(
        BloodTestService $BloodTestService,
        CategoryService $categoryService,
        SpecialtyService $specialtyService
    ){
        parent::__construct();
        $this->BloodTestService = $BloodTestService;
        $this->categoryService = $categoryService;
        $this->specialtyService = $specialtyService;
    }
    public function repository()
    {
        return AppointmentAtHomeRepository::class;
    }
    /**
     * Cập nhật thứ tự
     */
    public function updateOrder($input)
    {
        $query = $this->repository->select('*')->where('order', '>=', $input['order'])->orderBy('order');
        if(isset($input['id'])){
            $query = $query->where('id', '<>', $input['id']);
        }
        $order = $query->get();
        if(!empty($order)){
            $i = $input['order'];
            foreach($order as $value){
                $i++;
                $this->repository->where('id', $value->id)->update(['order' => $i]);
            }

        }
    }
      /**
     * Form show chi tiết lịch khám
     */
    public function edit($input)
    {
        $AppointmentAtHome = $this->repository->where('id', $input['id'])->first();
        // dd($AppointmentAtHome);
        if($AppointmentAtHome['code_indications'] == '' || $AppointmentAtHome['code_indications'] == null){
            $expl = explode(',',$AppointmentAtHome['type']);
        }else{
            $expl = explode(',',$AppointmentAtHome['code_indications']);
        }
        // $type = $this->BloodTestService->where('code',$AppointmentAtHome['type'])->first();
        $total = 0;
        $price = PriceTestModel::whereIn('code_blood',$expl)->get()->toArray();
        if($AppointmentAtHome['money'] >= 0){
            $totals = number_format($AppointmentAtHome['money'],0, '', ',');
        }
        $param = [
            'code' => isset($AppointmentAtHome['code'])?$AppointmentAtHome['code']:'', 
            'type' => isset($type['name'])?$type['name']:'', 
            'type_at_home' => isset($AppointmentAtHome['type_at_home'])?$AppointmentAtHome['type_at_home']:'', 
            'code_patient'=> isset($AppointmentAtHome['code_patient'])?$AppointmentAtHome['code_patient']:'', 
            'name' => isset($AppointmentAtHome['name'])?$AppointmentAtHome['name']:'', 
            'phone' => isset($AppointmentAtHome['phone'])?$AppointmentAtHome['phone']:'', 
            'sex' => isset($AppointmentAtHome['sex'])?$AppointmentAtHome['sex']:'', 
            'address' => isset($AppointmentAtHome['address'])?$AppointmentAtHome['address']:'', 
            'money' => isset($totals)?$totals:'', 
            'reason' => isset($AppointmentAtHome['reason'])?$AppointmentAtHome['reason']:'', 
            'date_sampling' => isset($AppointmentAtHome['date_sampling'])?date('d-m-Y',strtotime($AppointmentAtHome['date_sampling'])):'', 
            'hour_sampling' => isset($AppointmentAtHome['hour_sampling'])?$AppointmentAtHome['hour_sampling']:'', 
            'date_birthday' => isset($AppointmentAtHome['date_birthday'])?$AppointmentAtHome['date_birthday']:'', 
        ];
        $data['datas'] = $param;
        $price_convert=[];
        foreach( $price as $val){
            $price_convert[]= [
                'name' => isset($val['name'])?$val['name']:'', 
                'code' => isset($val['code'])?$val['code']:'', 
                'price' => isset($val['price'])?number_format($val['price'],0, '', ','):'', 
            ];
        }
        $data['price'] =  $price_convert;
        return $data;
    }
}
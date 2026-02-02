<?php

namespace Modules\System\Dashboard\ApprovePayment\Services;

use Modules\Base\Service;
use Modules\System\Dashboard\ApprovePayment\Repositories\ApprovePaymentRepository;
use Modules\System\Dashboard\Specialty\Services\SpecialtyService;
use Modules\System\Dashboard\Users\Services\UserService;

class ApprovePaymentService extends Service
{
    public function __construct(
        SpecialtyService $specialtyService,
        UserService $userService
    ){
        parent::__construct();
        $this->specialtyService = $specialtyService;
        $this->userService = $userService;
    }
    public function repository()
    {
        return ApprovePaymentRepository::class;
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
        $approvePayment = $this->repository->where('id', $input['id'])->first();
        $code_specialty = $this->specialtyService->where('code',$approvePayment['code_specialty'])->first();
        if(empty($code_specialty->name_specialty)){
            $tt = $approvePayment['code_specialty'];
        }else{
            $tt = $code_specialty->name_specialty;
        }
        $user = $this->userService->where('id_personnel',$approvePayment['code_introduce'])->first();
        $data = [
            'code_schedule' => isset($approvePayment['code_schedule'])?$approvePayment['code_schedule']:'', 
            'code_hospital' => isset($approvePayment['code_hospital'])?$approvePayment['code_hospital']:'', 
            'code_specialty' => $tt, 
            'type_payment' => isset($approvePayment['type_payment'])?$approvePayment['type_payment']: $tt, 
            'money' => !empty($approvePayment['money'])?number_format($approvePayment['money'],0, '', ','):0, 
            'name' => isset($approvePayment['name'])?$approvePayment['name']:'', 
            'phone' => isset($approvePayment['phone'])?$approvePayment['phone']:'', 
            'code_insurance' => isset($approvePayment['code_insurance'])?$approvePayment['code_insurance']:'', 
            'name_insurance' => isset($user['name'])?$user['name']:'', 
            'sex' => isset($approvePayment['sex'])?$approvePayment['sex']:'', 
            'email' => isset($approvePayment['email'])?$approvePayment['email']:'', 
            'date_of_brith' => isset($approvePayment['date_of_brith'])?$approvePayment['date_of_brith']:'', 
            'code_tinh' => isset($approvePayment['code_tinh'])?$approvePayment['code_tinh']:'', 
            'code_huyen' => isset($approvePayment['code_huyen'])?$approvePayment['code_huyen']:'', 
            'code_xa' => isset($approvePayment['code_xa'])?$approvePayment['code_xa']:'', 
            'address' => isset($approvePayment['address'])?$approvePayment['address']:'', 
            'code_introduce' => isset($approvePayment['code_introduce'])?$approvePayment['code_introduce']:'', 
            'reason' => isset($approvePayment['reason'])?$approvePayment['reason']:'', 
            'name_image' => isset($approvePayment['name_image'])?$approvePayment['name_image']:'', 
            // 'created_at' => isset($approvePayment['created_at'])?$approvePayment['created_at']:'', 
            // 'update_at' => isset($approvePayment['update_at'])?$approvePayment['update_at']:'', 
        ];
        $data['datas'] = $data;
        return $data;
    }
}
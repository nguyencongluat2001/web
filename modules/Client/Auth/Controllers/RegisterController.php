<?php

namespace Modules\Client\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Client\Auth\Models\RegisterModel;
use Modules\System\Dashboard\Users\Models\AuthenticationOTPModel;
use Modules\System\Dashboard\Users\Services\UserInfoService;
use Modules\System\Dashboard\Users\Services\UserService;
use Modules\Base\Library;

class RegisterController extends Controller
{
    public function __construct(
        UserService $userService,
        UserInfoService $userInfoService
    ){
        $this->userService = $userService;
        $this->userInfoService = $userInfoService;
    }
    public function index()
    {
        return view('auth.register.index');
    }
    public function tab1()
    {
        return view('auth.register.tab1');
    }
    public function tab2(Request $request)
    {
        $arrInput = $request->all();
        if(!empty($arrInput['email'])){
            $user = $this->userService->where('email', $arrInput['email'])->orWhere('phone', $arrInput['phone'])->first();
            if(!empty($user)){
                return array('success' => false, 'message' => 'Email hoặc Số điện thoại đã tồn tại!');
            }
        }
        return view('auth.register.tab2');
    }
    public function tab3(Request $request)
    {
        $arrInput = $request->all();
        // dd($arrInput);
        $params = [
            'id' => (string)\Str::uuid(),
            'name' => $arrInput['name'],
            'address' => $arrInput['address'],
            'phone' => $arrInput['phone'],
            'dateBirth' => $arrInput['dateBirth'],
            'company' => '',
            'position' => '',
            'date_join' => '',
            'email' => $arrInput['email'],
            'password' => Hash::make($arrInput['repass']),
            'user_introduce' => $arrInput['name'],
            'id_personnel' => $arrInput['code_introduce'],
        ];
        $register = RegisterModel::where('email', $params['email'])->first();
        if(!empty($register)){
            $params['updated_at'] = date('Y-m-d H:i:s');
            $register->update($params);
        }else{
            $params['created_at'] = date('Y-m-d H:i:s');
            RegisterModel::insert($params);
        }
        // $otp = $this->userService->sent_OTP($params);
        //gui otp mail ca nhan
        return view('auth.register.tab3');
    }
    public function tab4(Request $request)
    {
        $arrInput = $request->all();
        $random = Library::_get_randon_number();
        // $AuthenticationOTP = AuthenticationOTPModel::where('phone', $arrInput['phone'])->where('otp', $arrInput['otp'])->first();
        // if(!empty($AuthenticationOTP)){
            $arrData = [
                'name'=> $arrInput['name'],
                'address'=> $arrInput['address'],
                'phone'=> $arrInput['phone'],
                'email'=> $arrInput['email'],
                'password'=> Hash::make($arrInput['repass']),
                'dateBirth'=> $arrInput['dateBirth'],
                'id_personnel'=> isset($arrInput['id_personnel'])?$arrInput['id_personnel']: $random,
                'user_introduce'=> $arrInput['name_personnel'],
                "status" => isset($arrInput['status']) ? 1 : 0,
                "role" => 'CTV',
            ];
            $arrInfo = [
                'company'=> '', 
                'position'=> '', 
                'date_join'=> '', 
                'color_view'=> 1,
                'created_at'=> date("Y-m-d H:i:s")
            ];
            $register = $this->userService->where('email', $arrInput['email'])->first();
            if(!empty($register)){
                $arrData['updated_at'] = date('Y-m-d H:i:s');
                $register->update($arrData);
                $this->userInfoService->where('user_id', $register->id)->update($arrInfo);
            }else{
                $arrData['id'] = (string)\Str::uuid();
                $arrData['created_at'] = date('Y-m-d H:i:s');
                $arrInfo['id'] = (string)\Str::uuid();
                $arrInfo['user_id'] = $arrData['id'];
                $this->userService->insert($arrData);
                $this->userInfoService->insert($arrInfo);
            }
            return view('auth.register.tab4');
        // }else{
        //     return array('success' => false, 'message' => 'Mã xác nhận không chính xác!');
        // }
    }
}
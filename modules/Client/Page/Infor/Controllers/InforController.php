<?php

namespace Modules\Client\Page\infor\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;
use Modules\System\Dashboard\Users\Services\UserInfoService;
use Modules\System\Dashboard\Users\Services\UserService;
use Illuminate\Support\Facades\Auth;

/**
 * thông tinnguowif dùng
 *
 * @author Luatnc
 */
class InforController extends Controller
{

    public function __construct(
        UserService $userService,
        UserInfoService $userInfoService
    ){
        $this->userService = $userService;
        $this->userInfoService = $userInfoService;
    }

    /**
     * khởi tạo dữ liệu, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index(Request $request)
    {
        $users = $this->userService->where('id', $_SESSION['id'])->first();
        $user_infor = $this->userInfoService->where('user_id', $_SESSION['id'])->first();
        $users['user_infor'] = $user_infor;
        $data['datas'] = $users;
        return view('client.infor.index', $data);
    }

     /**
     * load màn hình thông tin người dùng
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadList(Request $request)
    { 
        $users = $this->userService->where('id', $_SESSION['id'])->first();
        $user_infor = $this->userInfoService->where('user_id', $_SESSION['id'])->first();
        $users['user_infor'] = $user_infor;
        $data['datas'] = $users;
        return view('client.infor.index', $data);
    }
    
     /**
     * Cập nhật thông tin
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function update(Request $request)
    {
        $arrInput = $request->input();
        $data = $this->userInfoService->_update($arrInput);
        return back();
    }
    /**
     * Cập nhật client
     */
    public function updateCustomer(Request $request)
    {
        $arrInput = $request->all();
        $data = $this->userService->store($arrInput, []);
        return $data;
    }
    
}

<?php

namespace Modules\System\Dashboard\UserLog\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\System\Dashboard\UserLog\Services\UserLogService;
use Modules\System\Dashboard\Users\Services\UserInfoService;
use Modules\System\Dashboard\Users\Services\UserService;

class UserLogController extends Controller
{
    private $userLogService;
    private $userService;

    public function __construct(
        UserLogService $userLogService,
        UserService $userService
    ){
        $this->userLogService = $userLogService;
        $this->userService = $userService;
    }
    public function index()
    {
        return view('dashboard.userLog.index');
    }
    public function loadList(Request $request)
    {
        $input = $request->all();
        $data['datas'] = $this->userLogService->filter($input);
        return view('dashboard.userLog.loadList', $data)->render();
    }
    /**
     * View
     */
    public function view(Request $request)
    {
        $input = $request->all();
        $column = ['users.*', 'user_info.company', 'user_info.position', 'user_info.date_join', 'user_info.color_view', 'user_log.ip', 'user_log.created_at as login_date'];
        $data['datas'] = $this->userService->select($column)
                        ->leftJoin('user_info', 'users.id', '=', 'user_info.user_id')
                        ->leftJoin('user_log', 'users.id', '=', 'user_log.user_id')
                        ->where('user_log.user_id', $input['user_id'])->first();
        return view('dashboard.userLog.view', $data)->render();
    }
}

<?php

namespace Modules\System\Dashboard\Dashboards\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\Api\Services\Admin\PositionService;
// use Modules\System\Users\Services\UnitService;
use Modules\System\Dashboard\Users\Services\UserService;
use DB;

/**
 * Lớp xử lý quản trị, phân quyền người sử dụng
 *
 * @author Toanph <skype: toanph155>
 */
class DashboardController extends Controller
{

    public function __construct(
        // UserService $userService
        // UnitService $unitService,
        // PositionService $positionService
    ){
        // $this->userService = $userService;
        // $this->unitService = $unitService;
        // $this->positionService = $positionService;
    }

    /**
     * khởi tạo dữ liệu mẫu, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index()
    {
        // $objLibrary = new Library();
        // $arrResult = array();
        // $arrResult = $objLibrary->_getAllFileJavaScriptCssArray('js', 'dist\js\backend\pages\JS_User.js', ',', $arrResult);
        // $strJsCss = json_encode($arrResult);
        // dd($strJsCss);
        // return view('dashboard.users.index',compact('strJsCss'));
        return view('dashboard.home.index');
    }
    public function fileManager(){
        return view('dashboard.file-manager');
    }

    /**
     * Load màn hình thêm mới người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    public function add(Request $request)
    {
        $input = $request->all();
        $data = $this->userService->addUserDisplay($input);
        return view('Users::User.add', $data);
    }

    /**
     * Load màn hình chỉnh sửa thông tin người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    public function edit(Request $request)
    {
        $input = $request->all();
        $data = $this->userService->editUserDisplay($input);
        return view('Users::User.add', $data);
    }

    /**
     * Chỉnh sửa thông tin người dùng
     *
     * @param Request $request
     *
     * @return Array $respone
     */
    public function update(Request $request)
    {
        $input = $request->input();
        $respone = $this->userService->updateOrCreateUser($input);
        return $respone;
    }

     /**
     * Xóa người dùng
     *
     * @param Request $request
     *
     * @return Array
     */
    public function delete(Request $request)
    {
        $user = $this->userService->find($request->id);
        $user->delete();
        return array('success' => true, 'message' => 'Xóa thành công', 'parent_id' => $user->units_id);
    }
     /**
     * load màn hình danh sách
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadList(Request $request)
    { 
        $arrInput = $request->input();
        // $data = $this->userService->loadList($arrInput);
        $data = array();
        $param = $arrInput;
        $objResult = $this->userService->filter($param);
        $data['datas'] = $objResult;
        // dd($data);
        $data['param'] = $param;
        // $data['pagination'] = $data['datas']->links('pagination.default');
        return view("dashboard.users.index", $data);
    }
}

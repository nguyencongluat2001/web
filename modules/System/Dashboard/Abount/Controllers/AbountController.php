<?php

namespace Modules\System\Dashboard\Abount\Controllers;

use App\Http\Controllers\Controller;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Users\Services\UserService;
use Modules\System\Dashboard\Category\Services\CateService;
use Modules\System\Dashboard\Abount\Services\AbountService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;
use str;

/**
 * Phân quyền người dùng
 *
 * @author Luatnc
 */
class AbountController extends Controller
{
    public function __construct(
        private UserService $userService,
        private CateService $cateService,
        private CategoryService $categoryService,
        private AbountService $AbountService
    ){
    }

    /**
     * màn hình danh sách người dùng
     *
     * @return view
     */
    public function index(Request $request)
    {
        // $cate = $this->cateService->where('code_cate','product')->first();
        $data = [];
        return view('dashboard.abount.index',compact('data'));
    }
    /**
     * user_info
     *
     * @return view
     */
    // public function indexUserInfo(Request $request)
    // {
    //     $data = $this->userService->where('id',$_SESSION["id"])->first();
    //     $userInfo = $this->userInfoService->where('user_id',$_SESSION['id'])->first();
    //     $data['company'] = !empty($userInfo->company)?$userInfo->company:null;
    //     $data['position'] = !empty($userInfo->position)?$userInfo->position:null;
    //     $data['date_join'] = !empty($userInfo->date_join)?$userInfo->date_join:null;
    //     return view('dashboard.users.userInfor.index',compact('data'));
    // }
    /**
     * Load màn hình thêm mới người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    // public function add(Request $request)
    // {
    //     $input = $request->all();
    //     $data = $this->userService->addUserDisplay($input);
    //     return view('Users::User.add', $data);
    // }
     /**
     * Load màn hình thêm bài viết
     *
     * @param Request $request
     *
     * @return view
     */
    public function createForm(Request $request)
    {
        $input = $request->all();
        $category = $this->categoryService->where('cate','product')->orderBy('order')->get()->toArray();
        $data['category'] = $category;
        $data['code'] = $input['category'];
        return view('dashboard.abount.edit',compact('data'));
    }
    /**
     * Thêm thông tin người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    public function create (Request $request)
    {
        $input = $request->input();
        // dd($input,$_FILES);
        $create = $this->AbountService->store($input,$_FILES);
        return array('success' => true, 'message' => 'Cập nhật thành công');
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
        $category = $this->categoryService->where('cate','product')->get()->toArray();
        $data = $this->AbountService->editAbount($input);
        $data['category'] = $category;
        return view('dashboard.abount.edit',compact('data'));
    }

     /**
     * Xóa bài viết
     *
     * @param Request $request
     *
     * @return Array
     */
    public function delete(Request $request)
    {
        $input = $request->all();
        $this->AbountService->delete($input);

        return array('success' => true, 'message' => 'Xóa thành công');
    }
     /**
     * Màn hình thông tin bài viết
     *
     * @param Request $request
     *
     * @return view
     */
    public function infor(Request $request)
    {
        $input = $request->all();
        $dataInfor = $this->AbountService->infor($input);
        // dd($dataInfor);
        return view('dashboard.abount.infor',compact('dataInfor'));
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
        $data = array();
        $param = $arrInput;
        $objResult = $this->AbountService->filter($param);
        $data['datas']= $objResult;
        return view("dashboard.abount.loadlist", $data)->render();
    }
}

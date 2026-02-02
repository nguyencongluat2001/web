<?php

namespace Modules\System\Dashboard\ApprovePayment\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\System\Dashboard\ApprovePayment\Services\ApprovePaymentService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Users\Services\UserService;
use Illuminate\Support\Facades\Auth;

class ApprovePaymentController extends Controller
{
    public function __construct(
        ApprovePaymentService $approvePaymentService,
        CategoryService $categoryService,
        UserService $userService
    ){
        $this->approvePaymentService = $approvePaymentService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
    }
    /**
     * Trang đích
     */
    public function index(Request $request)
    {
        return view('dashboard.approvePayment.index');
    }
    /**
     * Danh sách
     */
    public function loadList(Request $request)
    {
        $input = $request->input();
        $data = array();
        $input['sort'] = 'created_at';
        $objResult = $this->approvePaymentService->filter($input);
        $data['datas'] = $objResult;
        return view('dashboard.approvePayment.loadList', $data)->render();
    }
    /**
     * Form thêm
     */
    public function create(Request $request)
    {
        $data['roles'] = $this->categoryService->where('cate', 'DM_VIP')->orderBy('order')->get();
        $data['order'] = $this->approvePaymentService->select('id')->count() + 1;
        return view('dashboard.approvePayment.add', $data);
    }
    /**
     * Form sửa
     */
    public function edit(Request $request)
    {
        $input = $request->all();
        $data = $this->approvePaymentService->edit($input); 
        return view('dashboard.approvePayment.add', $data);
    }
    /**
     * Thêm hoặc Cập nhật
     */
    public function update(Request $request)
    {
        $input = $request->input();
        $create = $this->approvePaymentService->store($input); 
        return $create;
    }
    /**
     * Xoá
     */
    public function delete(Request $request)
    {
        $input = $request->input();
        $arrId = explode(',', $input['listitem']);
        foreach($arrId as $id){
            $this->approvePaymentService->where('id', $id)->delete();
        }
        return array('success' => true, 'message' => 'Xóa thành công!');
    }
    /**
     * Cập nhật thông tin màn hình index
     */
    public function updateApprovePayment(Request $request)
    {
        $input = $request->all();
        $data = $this->approvePaymentService->_updateApprovePayment($input, $input['id']);
        return $data;
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatusApprovePayment(Request $request)
    {
        $input = $request->all();
        $list = $this->approvePaymentService->where('id', $input['id']);
        if(!empty($list->first())){ 
            $list->update(['status' => $input['status']]);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        }else{
            return array('success' => false, 'message' => 'Không tìm thấy dữ liệu!');
        }
    }
}
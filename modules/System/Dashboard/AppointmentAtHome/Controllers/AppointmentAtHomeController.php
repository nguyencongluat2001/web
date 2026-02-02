<?php

namespace Modules\System\Dashboard\AppointmentAtHome\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\System\Dashboard\AppointmentAtHome\Services\AppointmentAtHomeService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Users\Services\UserService;
use Str;
use Illuminate\Support\Facades\Http;
use Modules\Client\Page\AppointmentAtHome\Models\KqGhModel;

class AppointmentAtHomeController extends Controller
{
    public function __construct(
        AppointmentAtHomeService $AppointmentAtHomeService,
        CategoryService $categoryService,
        UserService $userService
    ){
        $this->AppointmentAtHomeService = $AppointmentAtHomeService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
    }
    /**
     * Trang đích
     */
    public function index(Request $request)
    {
        return view('dashboard.AppointmentAtHome.index');
    }
    /**
     * Danh sách
     */
    public function loadList(Request $request)
    {
        // $update = $this->AppointmentAtHomeService->where('code','20721217082023')->update(['money'=> 735000]);
        $input = $request->input();
        $data = array();
        // $input['status'] = 1;
        $input['sort'] = 'created_at';
        if($input['status'] == null || $input['status'] == ''){
            unset($input['status']);
        }
        $objResult = $this->AppointmentAtHomeService->filter($input);
        // $turnover = $objResult->sum('money');
        $this->value = $input['search'];

        $turnover = $this->AppointmentAtHomeService
                ->where('type_at_home','XET_NGHIEM')
                ->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->value . '%')
                    ->orWhere('code', 'like', '%' . $this->value . '%')
                    ->orWhere('phone', 'like', '%' . $this->value . '%')
                    ->orWhere('code_ctv', 'like', '%' . $this->value . '%');
                })
                ->whereDate('created_at', '>=', $input['fromdate'])
                ->whereDate('created_at', '<=', $input['todate'])
                ->sum('money');
        foreach($objResult as $val){
            $check = KqGhModel::where('code',$val['code_patient'])->first();
            if(!empty($check)){
                $val->status_gh = 1;
                $val->url = $check['url'];
                $val->filename = $check['namefile'];
            }else{
                $val->status_gh = 2;
            }
        }
        if($turnover >= 0){
            $sumMoney = number_format($turnover,0, '', ',');
        }else{
            $sumMoney = 0;
        }
        $data['sumMoney'] = $sumMoney;
        $data['datas'] = $objResult;
        return view('dashboard.AppointmentAtHome.loadList', $data)->render();
    }
    /**
     * Form thêm
     */
    public function create(Request $request)
    {
        $data['roles'] = $this->categoryService->where('cate', 'DM_VIP')->orderBy('order')->get();
        $data['order'] = $this->AppointmentAtHomeService->select('id')->count() + 1;
        return view('dashboard.AppointmentAtHome.add', $data);
    }
    /**
     * Form sửa
     */
    public function edit(Request $request)
    {
        $input = $request->all();
        $data = $this->AppointmentAtHomeService->edit($input); 
        return view('dashboard.AppointmentAtHome.add', $data);
    }
    /**
     * Thêm hoặc Cập nhật
     */
    public function update(Request $request)
    {
        $input = $request->input();
        $create = $this->AppointmentAtHomeService->store($input); 
        return $create;
    }
    /**
     * Xoá
     */
    public function delete(Request $request)
    {
        if($_SESSION['role'] != 'ADMIN'){
            return array('success' => false, 'message' => 'Bạn không có quyền xóa!');
        }
        $input = $request->input();
        $arrId = explode(',', $input['listitem']);
        foreach($arrId as $id){
            $this->AppointmentAtHomeService->where('id', $id)->delete();
        }
        return array('success' => true, 'message' => 'Xóa thành công!');
    }
    /**
     * Cập nhật thông tin màn hình index
     */
    public function updateAppointmentAtHome(Request $request)
    {
        $input = $request->all();
        $data = $this->AppointmentAtHomeService->_updateAppointmentAtHome($input, $input['id']);
        return $data;
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatusAppointmentAtHome(Request $request)
    {
        $input = $request->all();
        $list = $this->AppointmentAtHomeService->where('id', $input['id']);
        if(!empty($list->first())){ 
            $list->update(['status' => $input['status']]);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        }else{
            return array('success' => false, 'message' => 'Không tìm thấy dữ liệu!');
        }
    }
}
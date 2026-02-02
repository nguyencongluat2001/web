<?php

namespace Modules\System\Dashboard\CustomerCare\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\System\Dashboard\CustomerCare\Services\CustomerCareService;

/**
 * Quản trị danh mục
 *
 * @author Luatnc
 */
class CustomerCareController extends Controller
{
    private $customerCareService;

    public function __construct(
        CustomerCareService $customerCareService
    ){
        $this->customerCareService = $customerCareService;
    }

    /**
     * khởi tạo dữ, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index(Request $request)
    {
        return view('dashboard.customerCare.index');
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
        $customerCare = $this->customerCareService->select('phone', \DB::raw('max(created_at) as created_at'))->groupBy('phone')->orderBy('created_at', 'desc')->get();
        foreach($customerCare as $key => $value){
            $customerCare[$key] = $this->customerCareService->select('*')->where('phone', $value->phone)->orderBy('created_at', 'desc')->first();
        }
        $data['datas'] = $customerCare;
        return view("dashboard.customerCare.loadList", $data)->render();
    }
    /**
     * Show message
     */
    public function message(Request $request)
    {
        $arrInput = $request->all();
        $customerCare = $this->customerCareService->select('*')->where('phone', $arrInput['phone'])->get();
        $data['message'] = $customerCare;
        $this->customerCareService->where('phone', $arrInput['phone'])->update(['view' => 1]);
        return view("dashboard.customerCare.message", $data);
    }

    /**
     * Xóa cuộc trò chuyện
     */
    public function delete(Request $request)
    {
        $phone = $request->phone;
        $this->customerCareService->where('phone', $phone)->delete();
    }
}

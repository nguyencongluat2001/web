<?php

namespace Modules\Client\Page\Introduce\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;

/**
 * Giới thiệu FinTop 
 *
 * @author Luatnc
 */
class IntroduceController extends Controller
{

    public function __construct(){
    }

    /**
     * khởi tạo dữ liệu, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index(Request $request)
    {
        return view('client.Introduce.index');
    }

     /**
     * load màn hình danh sách lấy chỉ số thị trường
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadList(Request $request)
    { 
        $arrInput = $request->input();
        $data = $this->homeService->loadList($arrInput);
        return view("client.Introduce.loadlist", $data);
    }
}

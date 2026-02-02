<?php

namespace Modules\System\Dashboard\Home\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\Api\Services\Admin\PositionService;
use Modules\System\Dashboard\Home\Services\HomeService;
use DB;

/**
 * Phân quyền người dùng 
 *
 * @author Luatnc
 */
class HomeController extends Controller
{

    public function __construct(
        HomeService $homeService
    ){
        $this->homeService = $homeService;
    }

    /**
     * khởi tạo dữ liệu, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index(Request $request)
    {
        return view('dashboard.home.index');
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
        $input = $request->all();
        $input['month'] = '';
        $data = array();
        $monthArr = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        $total = 0;
        foreach($monthArr as $month){
            if(checkdate($month,31,date('Y')) == true){
                $toDayEnd = 31;
            }elseif(checkdate($month,30,date('Y')) == true){
                $toDayEnd = 30;
            }elseif(checkdate($month,29,date('Y')) == true){
                $toDayEnd = 29;
            }else{
                $toDayEnd = 28;
            }
            $fromDate = $input['year'].'-'.$month.'-01';
            $toDate = $input['year'].'-'.$month.'-'.$toDayEnd;
            $money = DB::table('service_at_home')->whereDate('created_at','>=' ,$fromDate)->whereDate('created_at','<=' ,$toDate)->sum('money');
            if($input['month'] == '' || $input['month'] == $month){
                $datacc['dataMoney'][] = $money;
                $total += $money;

            }
        }
        $data['datas'] = $datacc;
        $data['total'] =  number_format($total,0, '', ',');
        return response()->json($data);
    }
         /**
     * load màn hình danh sách
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadMoney(Request $request)
    {
        $input = $request->all();
        $input['month'] = '';
        $data = array();
        $monthArr = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        $total = 0;
        $i=1;
        foreach($monthArr as $month){
            if(checkdate($month,31,date('Y')) == true){
                $toDayEnd = 31;
            }elseif(checkdate($month,30,date('Y')) == true){
                $toDayEnd = 30;
            }elseif(checkdate($month,29,date('Y')) == true){
                $toDayEnd = 29;
            }else{
                $toDayEnd = 28;
            }
            $fromDate = $input['year'].'-'.$month.'-01';
            $toDate = $input['year'].'-'.$month.'-'.$toDayEnd;
            $money = DB::table('service_at_home')->whereDate('created_at','>=' ,$fromDate)->whereDate('created_at','<=' ,$toDate)->where('code_ctv',$input['search'])->sum('money');
            if($input['month'] == '' || $input['month'] == $month){
                $datacc['dataMoney'][] = 'Tháng '.$i++.': '.number_format($money,0, '', ',');;
                $total += $money;

            }
        }
        $data['datas'] = $datacc;
        $data['total'] =  number_format($total,0, '', ',');
        return response()->json($data);
    }
}

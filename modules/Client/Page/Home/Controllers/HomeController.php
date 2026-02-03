<?php

namespace Modules\Client\Page\Home\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\Client\Page\Home\Services\HomeService;
use Modules\System\Dashboard\Blog\Services\BlogService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Category\Services\CateService;
use Illuminate\Support\Facades\Http;
use DB;
use Modules\System\Dashboard\Hospital\Services\HospitalService;
use Modules\System\Dashboard\Specialty\Services\SpecialtyService;
use Modules\System\Dashboard\UrlSearch\Services\UrlSearchService;
/**
 * Phân quyền người dùng 
 *
 * @author Luatnc
 */
class HomeController extends Controller
{

    public function __construct(
        UrlSearchService $UrlSearchService,
        SpecialtyService $specialtyService,
        CateService $cateService,
        CategoryService $categoryService,
        HomeService $homeService,
        BlogService $blogService,
        HospitalService $hospitalService
    ){
        $this->UrlSearchService = $UrlSearchService;
        $this->specialtyService = $specialtyService;
        $this->cateService = $cateService;
        $this->categoryService = $categoryService;
        $this->blogService = $blogService;
        $this->homeService = $homeService;
        $this->hospitalService = $hospitalService;
    }

    /**
     * khởi tạo dữ liệu, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index(Request $request)
    {
        $dataSearch = '';
        $objResult = DB::table('users')->where('status',1)->get()->take(3);
        $datas['datas']= [];
        $datas['Specialty']= [];
        return view('client.home.home-start',$datas);
    }
    /**
     * khởi tạo dữ liệu, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function about(Request $request)
    {
        $dataSearch = '';
        $objResult = DB::table('users')->where('status',1)->get()->take(3);
        $datas['datas']= $objResult;
        $datas['Specialty']= [];
        return view('client.home.about',$datas);
    }
    
     /**
     * load màn hình biểu đồ nến
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListChartNen(Request $request)
    { 
        $arrInput = $request->input();
        $data = $this->homeService->loadListChartNen($arrInput);
        return view("client.chart.index", $data);
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
        return view("client.home.loadlist", $data);
    }
     /**
     * load màn hình danh sách lấy top chỉ số thị trường
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListTop(Request $request)
    { 
        $arrInput = $request->input();
        $data = $this->homeService->loadListTop($arrInput);
        return view("client.home.loadlistTop", $data);
    }
    /**
     * load màn hình danh sách
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListBlog(Request $request)
    { 
        $arrInput = $request->input();
        $data = array();
        $param = $arrInput;
        // if($param['category'] == '' || $param['category'] == null){
        //     unset($param['category']);
        // }
        $objResult = $this->blogService->where('status',1)->get()->take(4);
        foreach($objResult as $key => $value){
            $category = $this->categoryService->where('code_category', $value->code_category)->first();
            if(!empty($category)){
                $objResult[$key]->cate_name = $category->name_category;
            }
        }
        $data['datas']= $objResult;
        return view("client.home.loadlist-blog", $data);
    }
    /**
     * load màn hình danh sách
     *
     * @param Request $request
     *
     * @return json $return
     */
    public function loadListTap1(Request $request)
    { 
        $arrInput = $request->input();
        $data = $this->homeService->loadList($arrInput);
        return view("client.home.loadlist-tap1", $data);
    }
}

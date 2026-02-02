<?php

namespace Modules\Client\Page\Contact\Controllers;

use App\Http\Controllers\Controller;
use Modules\Base\Library;
use Illuminate\Http\Request;
use Modules\Client\Page\Contact\Services\ContactService;
use Modules\System\Dashboard\Blog\Services\BlogService;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Category\Services\CateService;
use Illuminate\Support\Facades\Http;
use DB;
use Modules\System\Dashboard\Hospital\Services\HospitalService;
use Modules\System\Dashboard\Specialty\Models\UnitsModel;
use Modules\System\Dashboard\Specialty\Services\SpecialtyService;
/**
 * contact
 *
 * @author Luatnc
 */
class ContactController extends Controller
{

    public function __construct(
        SpecialtyService $SpecialtyService,
        CateService $cateService,
        CategoryService $categoryService,
        ContactService $ContactService,
        BlogService $blogService,
        HospitalService $hospitalService
    ){
        $this->SpecialtyService = $SpecialtyService;
        $this->cateService = $cateService;
        $this->categoryService = $categoryService;
        $this->blogService = $blogService;
        $this->ContactService = $ContactService;
        $this->hospitalService = $hospitalService;
    }

    /**
     * khởi tạo dữ liệu, Load các file js, css của đối tượng
     *
     * @return view
     */
    public function index(Request $request)
    {
        $objResult = $this->hospitalService->where('current_status','1')->get();
        $data['datas'] = $objResult;
        return view('client.Contact.home',$data)->render();
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
        $data = array();
        $param = $arrInput;
        $objResult = $this->hospitalService->filter($param);
        $data['datas'] = $objResult;
        $data['param'] = $param;
        // dd($arrInput,$data);
        return view("client.Contact.loadlist", $data)->render();
    }





    /// chi tiết cơ sơ bệnh viện 
     /**
     *
     * @param Request $request
     *
     * @return view
     */
    public function detailIndex(Request $request ,$code)
    {
        $input = $request->all();
        $datas['datas'] = $this->hospitalService->where('code',$code)->first();
        return view('client.Contact.Detail.home',$datas);
    }
     /// chi tiết cơ sơ bệnh viện 
     /**
     *
     * @param Request $request
     *
     * @return view
     */
    public function schedule(Request $request ,$code)
    {
        $input = $request->all();
        $datas['datas'] = $this->hospitalService->where('code',$code)->first();
        $datas['khoa'] =  $this->SpecialtyService->where('current_status',1)->get();
        $datas['tinh'] =  UnitsModel::whereNull('code_huyen')->get();
        return view('client.Contact.Schedule.home',$datas);
    }
     /// Danh sách huyện
     /**
     *
     * @param Request $request
     *
     * @return view
     */
    public function getHuyen(Request $request)
    {
        $input = $request->all();
        $datas['huyen'] =  UnitsModel::where('code_tinh',$input['codeTinh'])->whereNull('code_xa')->select('code_huyen','name')->get()->toArray();
        
        return response()->json([
            'data' => $datas,
            'status' => true
        ]);
    }
     /// Danh sách phường xã
     /**
     *
     * @param Request $request
     *
     * @return view
     */
    public function getXa(Request $request)
    {
        $input = $request->all();
        $datas['xa'] =  UnitsModel::where('code_huyen',$input['codeHuyen'])->select('code_xa','name')->get()->toArray();
        
        return response()->json([
            'data' => $datas,
            'status' => true
        ]);
    }
     /**
     * Load màn hình them thông tin người dùng
     *
     * @param Request $request
     *
     * @return view
     */
    public function createForm(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $data['datas'] = $input;
        return view('client.Contact.Schedule.edit',$data);
    }

    public function lien_he(Request $request)
    {
        return view('client.Contact.lien-he');
    }

    
    
}

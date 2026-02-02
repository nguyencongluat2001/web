<?php

namespace Modules\System\Dashboard\Faq\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Faq\Services\FaqService;

class FaqController extends Controller
{
    public $faqService;
    public $categoryService;
    public function __construct(FaqService $faqService, CategoryService $categoryService)
    {
        $this->faqService = $faqService;
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $data['categories'] = $this->categoryService->where('cate', 'DM_FAQ')->orderBy('order', 'desc')->get();
        return view('dashboard.Faq.index', $data);
    }
    public function loadList(Request $request)
    {
        $arrInput = $request->all();
        $arrInput['sort'] = 'order';
        $arrInput['sortType'] = 1;
        $data['datas'] = $this->faqService->filter($arrInput);
        return view('dashboard.Faq.loadList', $data);
    }
    /**
     * Thêm/Sửa
     */
    public function add(Request $request)
    {
        $arrInput = $request->all();
        if(isset($arrInput['id']) && !empty($arrInput['id'])){
            $data['datas'] = $this->faqService->where('id', $arrInput['id'])->first();
            $data['_id'] = $arrInput['id'];
        }else{
            $data['parent_id'] = $arrInput['parent_id'];
        }
        $data['order'] = $this->faqService->select('id')->count() + 1;
        $data['categories'] = $this->categoryService->where('cate', 'DM_FAQ')->orderBy('order', 'desc')->get();
        return view('dashboard.Faq.add', $data);
    }
    /**
     * Cập nhật
     */
    public function update(Request $request)
    {
        $arrInput = $request->all();
        $data = $this->faqService->_update($arrInput);
        return $data;
    }
    /**
     * Cập nhật
     */
    public function delete(Request $request)
    {
        $input = $request->all();
        $listids = trim($input['listitem'], ",");
        $ids = explode(",", $listids);
        foreach ($ids as $id) {
            if ($id) {
                $this->faqService->where('id',$id)->delete();
            }
        }
        return array('success' => true, 'message' => 'Xóa thành công');
    }
}
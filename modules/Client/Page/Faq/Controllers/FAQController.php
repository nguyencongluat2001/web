<?php

namespace Modules\Client\Page\Faq\Controllers;

use App\Http\Controllers\Controller;
use Modules\System\Dashboard\Category\Services\CategoryService;
use Modules\System\Dashboard\Faq\Services\FaqService;
use Modules\System\Helpers\PaginationHelper;

class FAQController extends Controller
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
        $categories = $this->categoryService->where('cate', 'DM_FAQ')->orderBy('order')->get();
        $arrCategory = [];
        foreach($categories as $category){
            $arrCategory[$category->id] = $category->name_category;
        }
        $faqs = $this->faqService->select('*')->orderBy('parent_id')->orderBy('order')->get();
        $results = [];
        $k = 0;
        foreach($faqs as $key => $value){
            if(array_key_exists($value->parent_id, $arrCategory)){
                $results[$arrCategory[$value->parent_id]][$k++] = $value;
            }
        }
        $data['datas'] = $results;
        return view('client.Faq.index', $data);
    }
    public function mergeData($data)
    {

    }
}
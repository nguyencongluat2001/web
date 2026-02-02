<?php
namespace Modules\Client\Page;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

/**
 *Phiếu sipas
 *

 */
class MapController
{
    protected $lat;
    public function __construct(
    ) {
        $this->lat;
    }
     /**
     * Thông tin map
     * 
     * @param array $input
     * @return object
     */
    public function mapReport(Request $request){
        $data['data'] = $request->all();
        return view('mapReport',$data);
    }
}

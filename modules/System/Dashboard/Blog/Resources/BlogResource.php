<?php

namespace Modules\System\Dashboard\Blog\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    // public function toArray($request)
    // {
    //     dd($this->id);
    //     return [
    //         'C_CATE' => $this->cate_name ? $this->cate_name : '',
    //         'C_NAME' => $this->name,
    //         'C_OWNER_NAME' => RecordTypeHelper::getCoQuanThucHien($this->data_json),
    //         'C_RECORD_TYPE' => $this->record_type,
    //         'C_PROCESS_DATE' => $this->process_number_date,
    //         'C_TYPE_PROCESS' => $typeProcess,
    //         'IS_NOT_APOINTED_DATE' => $this->is_not_apointed_date,
    //         'C_FEE' => $this->cost_new ?? 0,
    //         'C_TOTAL_RECORD' => $this->total,
    //         'PK_RECORDTYPE' => $this->id
    //     ];
    // }
}

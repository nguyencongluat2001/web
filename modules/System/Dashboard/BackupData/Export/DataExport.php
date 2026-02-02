<?php 
namespace Modules\System\Dashboard\BackupData\Export;
 
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
 
class dataExport implements FromArray 
{
    function __construct($arrData)
    {
        $this->arrData = $arrData;
    }
    public function array(): array
    {
        // dd($this->arrData);
        return $this->arrData;
    }
}

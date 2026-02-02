<?php

namespace Modules\System\Dashboard\BackupData\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Base\Library;
use Excel;
use Modules\System\Dashboard\BackupData\Export\dataExport;

class BackupDataController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        return view('dashboard.backupData.index');
    }
    public function loadList(Request $request)
    {
        $dbName = env('DB_DATABASE', 'fitness');
        $table_name = \DB::select("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA='" . $dbName . "'");
        $data['datas'] = $table_name;
        return view('dashboard.backupData.loadList', $data);
    }
    /**
     * Xuất file SQL
     */
    public function exportSQL(Request $request)
    {
        $input = $request->all();
        $table_name = explode(',', $input['table_name']);
        $mysqlHostName      = env('DB_HOST', '127.0.0.1');
        $mysqlUserName      = env('DB_USERNAME', 'root');
        $mysqlPassword      = env('DB_PASSWORD', '');
        $DbName             = env('DB_DATABASE', 'fitness');
        $backup_name        = "mybackup.sql";
        $tables             = $table_name; //here your tables...

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword", array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();


        $output = '';
        foreach ($tables as $table) {
            $show_table_query = "SHOW CREATE TABLE " . $table . "";
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();

            foreach ($show_table_result as $show_table_row) {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();

            for ($count = 0; $count < $total_row; $count++) {
                $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $output .= "\nINSERT INTO $table (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                $output .= "'" . implode("','", $table_value_array) . "');\n";
            }
        }
        $sDir = public_path('exports/sql') . chr(92);
        $filepath = Library::_createFolder($sDir, date('Y'), date('m'), date('d'));
        $file_name = '/database_'.implode('_', $table_name).'_' . date('Y_m_d') . '.sql';
        $fullname = $filepath . $file_name;
        $file_handle = fopen($fullname, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        return url('exports/sql') . '/' . date('Y/m/d') . '/' . $file_name;
    }
    /**
     * Xuất file EXCEL
     */
    public function exportEXCEL(Request $request)
    {
        $input = $request->all();
        $table_name = explode(',', $input['table_name']);
        $arrData = [];
        $i = 0;
        foreach ($table_name as $key => $value) {
            $columns = \DB::select("SHOW COLUMNS FROM " . $value);
            foreach ($columns as $column) {
                $arrData[$i][$column->Field] = $column->Field;
            }
            $i++;
            $tables = \DB::table($value)->select('*')->get();
            foreach (json_decode($tables, true) as $keyTB => $valueTB) {
                $arrData[$i] = $valueTB;
                $i++;
            }
            if (count($table_name) == 1) {
                Excel::store(new dataExport($arrData), date('Y/m/d') . '/dulieubang_' . $value . '.xlsx', 'backup-excel');
                $url = url('exports/excel') . '/' . date('Y/m/d') . '/dulieubang_' . $value . '.xlsx';
                return $url;
            }
        }
        $fileName = 'dulieubang_fitness_'.date('Y_m_d_').uniqid().'.xlsx';
        Excel::store(new dataExport($arrData), date('Y/m/d') . '/' . $fileName, 'backup-excel');
        $url = url('exports/excel') . '/' . date('Y/m/d') . '/' . $fileName;
        return $url;
    }
}

<?php

namespace App\Http\Controllers;

use App\Helpers\Dashboard\MigrationHelper;
use App\Helpers\Dashboard\PrepareModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TranslationHandlerController extends Controller
{
    public function index()
    {
        $tables = DB::select('SHOW TABLES');
        $result = [];
        $response = [];

        foreach ($tables as $table) {
            foreach ((array) $table as $key => $tableName) {
                if (!\Illuminate\Support\Str::endsWith($tableName, '_translations')) {
                    $result[] = $tableName;
                }
            }
        }
        foreach ($result as $table) {
            $tableName = $table; // Replace 'your_table_name' with the actual table name
            $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ?";
            $dbName = env('DB_DATABASE'); // Get the database name from your .env file

            $columns = DB::select($query, [$dbName, $tableName]);

            $columnNames = [];
            foreach ($columns as $column) {

                if (!\Illuminate\Support\Str::contains($column->COLUMN_NAME, 'date') && $column->COLUMN_NAME != 'id' && $column->COLUMN_NAME != 'updated_at' && $column->COLUMN_NAME != 'deleted_at' && $column->COLUMN_NAME != 'created_at' && !\Illuminate\Support\Str::endsWith($column->COLUMN_NAME, '_id')) {
                    $columnNames[] = $column->COLUMN_NAME;
                }
            }
            $response[$table] = $columnNames;
        }
        $database_columns_types = json_decode(File::get(public_path('dashboard/database_columns_types.json')));
        //dd($database_columns_types);
        return view('translation_handler', compact('response', 'database_columns_types'));
    }

    function extractTableData(array $requestData): array
    {
        $result = [];
        foreach ($requestData as $tableName => $columns) {
            if ($tableName !== '_token' /* && isset($columns['table']) && $columns['table'] === 'true' */) {
                $result[$tableName] = $columns;
            }
        }
        return $result;


    }

    function processColumns(array $columns): array
    {
        $translatedAttributes = [];
        $columnsAttributes = [];
        $searchableAttributes = [];
        $fullData = [];

        foreach ($columns as $column => $value) {
            if ($column != 'table') {


                if (isset($value['translatable'])) {
                    $translatedAttributes[] = $column;
                }
                if (isset($value['searchable'])) {
                    $searchableAttributes[] = $column;
                }
                if (isset($value['column'])) {
                    $columnsAttributes[] = $column;
                }
                $fullData[$column] = $value;
            }
        }
        return [
            'translatedAttributes' => $translatedAttributes,
            'columnsAttributes' => $columnsAttributes,
            'searchableAttributes' => $searchableAttributes,
            'fullData' => $fullData,
        ];
    }

    function main(array $requestData)
    {
        $result = $this->extractTableData($requestData);
        $data = [];
        foreach ($result as $tableName => $columns) {
            $data[$tableName] = $this->processColumns($columns);
        }
        return $data;
    }



    public function store(Request $request)
    {


        $requestData = $request->all();
        $requestAfterProcessing = $this->main($requestData);
        foreach ($requestAfterProcessing as $tableName => $columns) {
            
            $tableName = ucfirst(Str::singular($tableName));
            
            $translationModeName = $tableName.'Translation'; 

            $prepareModel = new PrepareModel(); 
            
            $prepareModel->prepareModel($tableName, $columns);
            
        }
        dd(true);

    }
}

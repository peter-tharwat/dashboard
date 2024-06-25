<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
        return view('translation_handler', compact('response'));
    }
    public function store(Request $request)
    {
        $result = [];
        foreach ($request->all() as $tableName => $columns) {
            if ($tableName != '_token') {
                if (isset($columns['table']) && $columns['table'] == 'true') {
                    $result[$tableName] = $columns;
                }
            }
        }
        foreach ($result as $tableName => $columns) {

            // Define the attributes you want to include in $translatedAttributes
            $attributes = [];
            $myTranslatedAttributes = [];
            $columnsAttributes = [];
            $myColumnsAttributes = [];
            foreach ($columns as $column => $value) {
                if (isset($value['translatble'])) {
                    $attributes[] = $column;
                    $myTranslatedAttributes[$column] = $value['type'];
                } else {
                    if ($column != 'table' && $value != 'true') {
                       // dd($column, $value);
                        $columnsAttributes[] = $column;
                    $myColumnsAttributes[$column] = $value['type'];
                    
                    }
                    
                }
            }
            // dd($attributes, $myTranslatedAttributes,$columnsAttributes,$myColumnsAttributes);
            // Make table name singular and capitalize the first letter
            $modelName = ucfirst(\Illuminate\Support\Str::singular($tableName));
            $filePath = app_path() . '/Models/' . $modelName . '.php';
            $this->add_contract_and_trait($filePath, $modelName);
            $this->add_use_to_file($filePath);
            $this->translatedAttributes($filePath, $attributes);
            $this->columnsAttributes($filePath, $columnsAttributes);
            $this->myColumnsAttributes($filePath, $myColumnsAttributes);
            $this->myTranslatedAttributes($filePath, $myTranslatedAttributes);
            dd(true);
            
            
            /*if (!File::exists($filePath)) {
                Artisan::call('make:model', ['name' => $modelName]);
            }
            Artisan::call('make:model', [
                'name' => $modelName . 'Translation',
                '--migration' => 'true'
            ]);




            $fileContents = file_get_contents($filePath);
        /* // Add `use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;` if not present
        if (!str_contains($fileContents, 'use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;')) {
            $namespaceEndPos = strpos($fileContents, ';', strpos($fileContents, 'namespace')) + 1;
            $fileContents = substr_replace($fileContents, "\nuse Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;", $namespaceEndPos, 0);
        }

        // Add `use Astrotomic\Translatable\Translatable;` if not present
        if (!str_contains($fileContents, 'use Astrotomic\Translatable\Translatable;')) {
            // Find the position right after the previously added use statement or the namespace
            $lastUsePos = strpos($fileContents, 'use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;') + strlen('use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;');
            $fileContents = substr_replace($fileContents, "\nuse Astrotomic\Translatable\Translatable;", $lastUsePos, 0);
        }


        // Check if TranslatableContract is already implemented
        if (!str_contains($fileContents, 'TranslatableContract')) {
            // Find the class definition and modify it to implement TranslatableContract
            $pattern = '/class ' . $modelName . ' extends Model( implements ([^{]+))?/';
            $replacement = function ($matches) use ($modelName) {
                $implements = 'implements TranslatableContract';
                if (isset($matches[2])) { // If there are already interfaces being implemented
                    $implements = 'implements ' . $matches[2] . ', TranslatableContract';
                }
                return "class " . $modelName . " extends Model " . $implements;
            };
            $fileContents = preg_replace_callback($pattern, $replacement, $fileContents);
        }

        // Add `use Translatable;` if not present
        if (!str_contains($fileContents, 'use Translatable;')) {
            // Insert after the last use statement or namespace declaration
            $lastUsePos = strrpos($fileContents, 'use ');
            if ($lastUsePos !== false) {
                $useStatementEndPos = strpos($fileContents, ';', $lastUsePos) + 1;
                $fileContents = substr_replace($fileContents, "\nuse Translatable;", $useStatementEndPos, 0);
            } else {
                // If no use statements, insert after namespace declaration
                $namespaceEndPos = strpos($fileContents, ';', strpos($fileContents, 'namespace')) + 1;
                $fileContents = substr_replace($fileContents, "\n\nuse Translatable;", $namespaceEndPos, 0);
            }
        }

            // Generate the property string from the attributes array
       $propertyString = "public \$translatedAttributes = ['" . implode("', '", $attributes) . "'];";
       // Check if $translatedAttributes is already present
       if (!str_contains($fileContents, 'public $translatedAttributes = [')) {
           // Find the position after the class name or the use traits to insert the property
           $insertPos = strpos($fileContents, '{') + 1; // Position after the first opening brace of the class

           // Insert the property string into the file contents
           $fileContents = substr_replace($fileContents, "\n    " . $propertyString . "\n", $insertPos, 0);
       } else {
           // If $translatedAttributes already exists, update it
           $pattern = '/public \$translatedAttributes = \[.*?\];/';
           $fileContents = preg_replace($pattern, $propertyString, $fileContents);
       }

            // Generate the property string from the attributes array
       $propertyString = "public \$my_translatedAttributes = ['" . implode("', '", $attributes) . "'];";
       // Check if $translatedAttributes is already present
       if (!str_contains($fileContents, 'public $my_translatedAttributes = [')) {
           // Find the position after the class name or the use traits to insert the property
           $insertPos = strpos($fileContents, '{') + 1; // Position after the first opening brace of the class

           // Insert the property string into the file contents
           $fileContents = substr_replace($fileContents, "\n    " . $propertyString . "\n", $insertPos, 0);
       } else {
           // If $translatedAttributes already exists, update it
           $pattern = '/public \$my_translatedAttributes = \[.*?\];/';
           $fileContents = preg_replace($pattern, $propertyString, $fileContents);
       }

            $propertyString = "public \$columns = ['" . implode("', '", $attributes) . "'];";
            // Check if $translatedAttributes is already present
            if (!str_contains($fileContents, 'public $columns = [')) {
            // Find the position after the class name or the use traits to insert the property
            $insertPos = strpos($fileContents, '{') + 1; // Position after the first opening brace of the class
    
            // Insert the property string into the file contents
            $fileContents = substr_replace($fileContents, "\n    " . $propertyString . "\n", $insertPos, 0);
            } else {
            // If $translatedAttributes already exists, update it
            $pattern = '/public \$columns = \[.*?\];/';
            $fileContents = preg_replace($pattern, $propertyString, $fileContents);
            }
    
        // Generate the property string from the attributes array
        $propertyString = "public \$my_columns = ['" . implode("', '", $attributes) . "'];";
        // Check if $translatedAttributes is already present
        if (!str_contains($fileContents, 'public $my_columns = [')) {
            // Find the position after the class name or the use traits to insert the property
            $insertPos = strpos($fileContents, '{') + 1; // Position after the first opening brace of the class
 
            // Insert the property string into the file contents
            $fileContents = substr_replace($fileContents, "\n    " . $propertyString . "\n", $insertPos, 0);
        } else {
            // If $translatedAttributes already exists, update it
            $pattern = '/public \$my_columns = \[.*?\];/';
            $fileContents = preg_replace($pattern, $propertyString, $fileContents);
        }
        file_put_contents($filePath, $fileContents);
 
            // Generate the property string from the attributes array
            $propertyString = "public \$indexWith = [];";
            // Check if $translatedAttributes is already present
            if (!str_contains($fileContents, 'public $indexWith = [')) {
            // Find the position after the class name or the use traits to insert the property
            $insertPos = strpos($fileContents, '{') + 1; // Position after the first opening brace of the class

            // Insert the property string into the file contents
            $fileContents = substr_replace($fileContents, "\n    " . $propertyString . "\n", $insertPos, 0);
            } else {
            // If $translatedAttributes already exists, update it
            $pattern = '/public \$indexWith = \[.*?\];/';
            $fileContents = preg_replace($pattern, $propertyString, $fileContents);
            }
            ////////////////////////////////////////////
            // Generate the property string from the attributes array
            $propertyString = "public \$indexWithCount = [];";
            // Check if $translatedAttributes is already present
            if (!str_contains($fileContents, 'public $indexWithCount = [')) {
            // Find the position after the class name or the use traits to insert the property
            $insertPos = strpos($fileContents, '{') + 1; // Position after the first opening brace of the class

            // Insert the property string into the file contents
            $fileContents = substr_replace($fileContents, "\n    " . $propertyString . "\n", $insertPos, 0);
            } else {
            // If $translatedAttributes already exists, update it
            $pattern = '/public \$indexWithCount = \[.*?\];/';
            $fileContents = preg_replace($pattern, $propertyString, $fileContents);
            }
            file_put_contents($filePath, $fileContents);
 */            dd(true);
        }



        foreach ($request->all() as $tableName => $columns) {
            if ($tableName != '_token') {
                if (isset($columns['table']) && $columns['table'] == 'true') {

                }
            }
        }
    }
    
    public function columnsAttributes($filePath, $attributes) {
        $fileContents = file_get_contents($filePath);

        
        // Generate the property string from the attributes array
        $propertyString = "public \$columns = ['" . implode("', '", $attributes) . "'];";
        
        // Check if $columns is already present
        if (!str_contains($fileContents, 'public $columns = [')) {
            // Find the position after the class name or the use traits to insert the property
            $insertPos = strpos($fileContents, '{') + 1; // Position after the first opening brace of the class
        
            // Insert the property string into the file contents
            $fileContents = substr_replace($fileContents, "\n    " . $propertyString . "\n", $insertPos, 0);
        } else {
            // If $columns already exists, update it
            $pattern = '/public \$columns = \[.*?\];/';
            $fileContents = preg_replace($pattern, $propertyString, $fileContents);
        }
        
        // Write the modified contents back to the file
        file_put_contents($filePath, $fileContents);    

    }
    public function myColumnsAttributes($filePath, $attributes) {
        $fileContents = file_get_contents($filePath);
    
        // Generate the property string from the associative attributes array
        $propertyString = "public \$my_columns = [\n";
        foreach ($attributes as $key => $value) {
            $propertyString .= "        '$key' => '$value',\n";
        }
        $propertyString .= "    ];";
    
        // Check if $my_columns is already present
        if (!str_contains($fileContents, 'public $my_columns = [')) {
            // Find the position after the class name or the use traits to insert the property
            $insertPos = strpos($fileContents, '{') + 1; // Position after the first opening brace of the class
        
            // Insert the property string into the file contents
            $fileContents = substr_replace($fileContents, "\n    " . $propertyString . "\n", $insertPos, 0);
        } else {
            // If $my_columns already exists, update it
            $pattern = '/public \$my_columns = \[.*?\];/s';
            $fileContents = preg_replace($pattern, $propertyString, $fileContents);
        }
    
        // Write the modified contents back to the file
        file_put_contents($filePath, $fileContents);    
    }


    public function myTranslatedAttributes($filePath, $attributes)
    {
        $fileContents = file_get_contents($filePath);
    
        // Generate the property string from the associative attributes array
        $propertyString = "public \$my_translatedAttributes = [\n";
        foreach ($attributes as $key => $value) {
            $propertyString .= "        '$key' => '$value',\n";
        }
        $propertyString .= "    ];";
    
        // Check if $my_translatedAttributes is already present
        if (!str_contains($fileContents, 'public $my_translatedAttributes = [')) {
            // Find the position after the class name or the use traits to insert the property
            $insertPos = strpos($fileContents, '{') + 1; // Position after the first opening brace of the class
        
            // Insert the property string into the file contents
            $fileContents = substr_replace($fileContents, "\n    " . $propertyString . "\n", $insertPos, 0);
        } else {
            // If $my_translatedAttributes already exists, update it
            $pattern = '/public \$my_translatedAttributes = \[.*?\];/s';
            $fileContents = preg_replace($pattern, $propertyString, $fileContents);
        }
    
        // Write the modified contents back to the file
        file_put_contents($filePath, $fileContents);    

        
    }

    public function translatedAttributes($filePath, $attributes)
    {
        $fileContents = file_get_contents($filePath);

        
        // Generate the property string from the attributes array
        $propertyString = "public \$translatedAttributes = ['" . implode("', '", $attributes) . "'];";
        
        // Check if $translatedAttributes is already present
        if (!str_contains($fileContents, 'public $translatedAttributes = [')) {
            // Find the position after the class name or the use traits to insert the property
            $insertPos = strpos($fileContents, '{') + 1; // Position after the first opening brace of the class
        
            // Insert the property string into the file contents
            $fileContents = substr_replace($fileContents, "\n    " . $propertyString . "\n", $insertPos, 0);
        } else {
            // If $translatedAttributes already exists, update it
            $pattern = '/public \$translatedAttributes = \[.*?\];/';
            $fileContents = preg_replace($pattern, $propertyString, $fileContents);
        }
        
        // Write the modified contents back to the file
        file_put_contents($filePath, $fileContents);    
    }
    public function add_use_to_file($filePath) {
        $fileContents = file_get_contents($filePath);

// Add `use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;` if not present
if (!str_contains($fileContents, 'use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;')) {
    $namespaceEndPos = strpos($fileContents, ';', strpos($fileContents, 'namespace')) + 1;
    $fileContents = substr_replace($fileContents, "\nuse Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;", $namespaceEndPos, 0);
}

// Add `use Astrotomic\Translatable\Translatable;` if not present
if (!str_contains($fileContents, 'use Astrotomic\Translatable\Translatable;')) {
    // Find the position right after the previously added use statement or the namespace
    $lastUsePos = strpos($fileContents, 'use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;') + strlen('use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;');
    $fileContents = substr_replace($fileContents, "\nuse Astrotomic\Translatable\Translatable;", $lastUsePos, 0);
}

// Write the modified contents back to the file
file_put_contents($filePath, $fileContents);
    }
    public function add_contract_and_trait($filePath, $modelName)
    {
        $fileContents = file_get_contents($filePath);
        
        // Check if TranslatableContract is already implemented
        if (!str_contains($fileContents, 'TranslatableContract')) {
            // Find the class definition and modify it to implement TranslatableContract
            $pattern = '/class '.$modelName.' extends Model( implements ([^{]+))?/';
            $replacement = function ($matches) use ($modelName) {
                $implements = 'implements TranslatableContract';
                if (isset($matches[2])) { // If there are already interfaces being implemented
                    $implements = 'implements ' . $matches[2] . ', TranslatableContract';
                }
                return "class ".$modelName." extends Model " . $implements;
            };
            $fileContents = preg_replace_callback($pattern, $replacement, $fileContents);
        }
        
        // Add `use Translatable;` if not present
        if (!str_contains($fileContents, 'use Translatable;')) {
            // Insert after the last use statement or namespace declaration
            $lastUsePos = strrpos($fileContents, 'use ');
            if ($lastUsePos !== false) {
                $useStatementEndPos = strpos($fileContents, ';', $lastUsePos) + 1;
                $fileContents = substr_replace($fileContents, "\nuse Translatable;", $useStatementEndPos, 0);
            } else {
                // If no use statements, insert after namespace declaration
                $namespaceEndPos = strpos($fileContents, ';', strpos($fileContents, 'namespace')) + 1;
                $fileContents = substr_replace($fileContents, "\n\nuse Translatable;", $namespaceEndPos, 0);
            }
        }
        
        // Write the modified contents back to the file
        file_put_contents($filePath, $fileContents);
        
    }
}

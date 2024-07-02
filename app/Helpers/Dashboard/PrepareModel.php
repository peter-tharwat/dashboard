<?php

namespace App\Helpers\Dashboard;

use DirectoryIterator;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class PrepareModel
{
    public function prepareModel($tableName, $columns)
    {
        // Make table name singular and capitalize first letter
        $tableName = ucfirst(Str::singular($tableName));
        // Specify the path to the model file
        $modelPath = app_path('Models/' . $tableName . '.php');

        // Add translatable attributes and contracts if specified
        if (!empty($columns['translatedAttributes'])) {

            $this->addTranslatableContract($modelPath, $tableName);
            $this->addUseTranslatableToModel($modelPath);
            $this->updateModelProperty($modelPath, 'translatedAttributes', $columns['translatedAttributes']);
            // call atrisan command to generate translation model & migration
            $translationModeName = $tableName . 'Translation';
            if (!file_exists(app_path('Models/' . $translationModeName . '.php'))) {
                Artisan::call('make:model', ['name' => $translationModeName]);
            }
            $translationModelPath = app_path('Models/' . $translationModeName . '.php');

            $this->updateModelProperty($translationModelPath, 'fillable', $columns['translatedAttributes']);

            $migData = $this->createMigrationForTranslation($translationModeName, $tableName);
            $translatedAttributes = [];
            foreach ($columns['fullData'] as $name => $array) {
                if (isset($array['translatable']) && $array['translatable'] == 'on') {
                    $translatedAttributes[$name] = [
                        'column_type' => $array['column_type'],
                        'column_type_value' => $array['column_type_value'],
                    ];
                }
            }
            if ($migData['hasMigration']) {

                $migrationHelper = new MigrationHelper();
                $migrationHelper->addNewColumns($migData['hasFile'], $translatedAttributes, $translationModeName);

            }
        }

        // Add column attributes if specified
        if (!empty($columns['columnsAttributes'])) {
            $this->updateModelProperty($modelPath, 'columns', $columns['columnsAttributes']);
        }

        // Add searchable attributes if specified
        if (!empty($columns['searchableAttributes'])) {
            $this->updateModelProperty($modelPath, 'searchable', $columns['searchableAttributes']);
        }
    }
    public function createMigrationForTranslation($translationModeName, $tableName)
    {
        $translationModeName = $tableName . 'Translation';
        $mTableName = 'create_' . Str::plural(Str::snake($translationModeName)) . '_table';
        $checkMigration = $this->checkIfMigrationExists($translationModeName);
        if (!$checkMigration['hasMigration']) {
            Artisan::call('make:migration', [
                'name' => $mTableName, // Replace 'your_table_name' with the actual table name
            ]);
            $checkMigration = $this->checkIfMigrationExists($translationModeName);
        }
        return [
            'hasMigration' => $checkMigration['hasMigration'],
            'hasFile' => $checkMigration['hasFile']
        ];









        /*   
          
           */
    }
    private function updateModelProperty($filePath, $propertyName, $attributes)
    {
        $fileContents = file_get_contents($filePath);
        $propertyString = "public \$$propertyName = ['" . implode("', '", $attributes) . "'];";

        if (!str_contains($fileContents, "public \$$propertyName = ['")) {
            $insertPos = strpos($fileContents, '{') + 1;
            $fileContents = substr_replace($fileContents, "\n    " . $propertyString . "\n", $insertPos, 0);
        } else {
            $pattern = "/public \$$propertyName = \[.*?\];/";
            $fileContents = preg_replace($pattern, $propertyString, $fileContents);
        }

        file_put_contents($filePath, $fileContents);
    }

    public function addUseTranslatableToModel($filePath)
    {
        $fileContents = file_get_contents($filePath);

        if (!str_contains($fileContents, 'use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;')) {
            $namespaceEndPos = strpos($fileContents, ';', strpos($fileContents, 'namespace')) + 1;
            $fileContents = substr_replace($fileContents, "\nuse Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;", $namespaceEndPos, 0);
        }

        if (!str_contains($fileContents, 'use Astrotomic\Translatable\Translatable;')) {
            $lastUsePos = strpos($fileContents, 'use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;') + strlen('use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;');
            $fileContents = substr_replace($fileContents, "\nuse Astrotomic\Translatable\Translatable;", $lastUsePos, 0);
        }

        file_put_contents($filePath, $fileContents);
    }

    public function addTranslatableContract($filePath, $modelName, )
    {
        $fileContents = file_get_contents($filePath);

        if (!str_contains($fileContents, 'TranslatableContract')) {
            $pattern = '/class ' . $modelName . ' extends Model( implements ([^{]+))?/';
            $replacement = function ($matches) use ($modelName) {
                $implements = 'implements TranslatableContract';
                if (isset($matches[2])) {
                    $implements = 'implements ' . $matches[2] . ', TranslatableContract';
                }
                return "class " . $modelName . " extends Model " . $implements;
            };
            $fileContents = preg_replace_callback($pattern, $replacement, $fileContents);
        }

        if (!str_contains($fileContents, 'use Translatable;')) {
            $lastUsePos = strrpos($fileContents, 'use ');
            if ($lastUsePos !== false) {
                $useStatementEndPos = strpos($fileContents, ';', $lastUsePos) + 1;
                $fileContents = substr_replace($fileContents, "\nuse Translatable;", $useStatementEndPos, 0);
            } else {
                $namespaceEndPos = strpos($fileContents, ';', strpos($fileContents, 'namespace')) + 1;
                $fileContents = substr_replace($fileContents, "\n\nuse Translatable;", $namespaceEndPos, 0);
            }
        }

        file_put_contents($filePath, $fileContents);
    }
    public function checkIfMigrationExists($mTableName)
    {

        $migrationsPath = database_path('migrations');
        $migrationFiles = scandir($migrationsPath);
        $hasMigration = false;
        $hasFile = '';
        foreach ($migrationFiles as $file) {
            
            if (strpos($file, Str::plural(Str::snake($mTableName))) !== false) {
                $hasMigration = true;
                $hasFile = $file;
            }
        }
        return [
            'hasMigration' => $hasMigration,
            'hasFile' => $hasFile
        ];
    }
}

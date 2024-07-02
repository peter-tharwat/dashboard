<?php

namespace App\Helpers\Dashboard;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MigrationHelper
{
    

    private function getMigrationFileName($tableName)
    {
        // Get the latest migration file for the given table name
        $files = glob(database_path('migrations/*.php'));
        $migrationFile = null;

        foreach ($files as $file) {
            if (str_contains($file, $tableName)) {
                $migrationFile = $file;
            }
        }

        if (!$migrationFile) {
            throw new \Exception("Migration file for table $tableName not found.");
        }

        return basename($migrationFile);
    }

    public function addNewColumns($filePath, $columns, $translationModeName)
    {
        // Create the repository file from the stub
        $stub = File::get(base_path('stubs/custom/migration.stub'));
        $tableName = Str::plural(Str::snake($translationModeName));
        $columnsString = $this->generateColumnString($columns, $translationModeName);
        //dd($columnsString);
        $stub = str_replace(
            ['{{tableName}}', '{{columns}}'],
            [$tableName, $columnsString],
            $stub
        );
        File::put(database_path('migrations/'.$filePath), $stub);        
    }

    private function updateExistingColumns($filePath, $updateColumns)
    {
        $fileContents = file_get_contents($filePath);
        foreach ($updateColumns as $column => $definition) {
            $pattern = "/\$table->[^;]*\$column[^;]*;/";
            $replacement = "\$table->$definition('$column');";
            $fileContents = preg_replace($pattern, $replacement, $fileContents);
        }

        file_put_contents($filePath, $fileContents);
    }

    public function generateColumnString($columns, $translationModeName)
    {
        $columnStrings = [];
        foreach ($columns as $columnName => $options) {
            $method = $options['column_type'];
            if (!empty($options['column_type_value']) && $options['column_type_value'] !== null) {
                $columnStrings[] = "\$table->$method('$columnName', {$options['column_type_value']});";
            } else {
                $columnStrings[] = "\$table->$method('$columnName');";
            }
        }
        $table = str_replace('Translation', '', $translationModeName);
        $table = strtolower($table);

        $columnStrings[] = "\$table->foreignId('$table"."_id"."');";
        $columnStrings[] = "\$table->foreign('$table"."_id"."')->references('id')->on('".Str::plural($table)."')->cascadeOnUpdate()->cascadeOnDelete();";
        $columnStrings[] = "\$table->string('locale')->index();";
        $columnStrings[] = "\$table->unique(['$table"."_id"."', 'locale']);";
        return implode("\n\t\t\t", $columnStrings);
    }
    public function checkIfMigrationExists($tableName)
    {
        $translationModeName = $tableName.'Translation'; 
        $mTableName = 'create_'.Str::plural(Str::snake($translationModeName)).'_table';
        $migrationsPath = database_path('migrations');
        $migrationFiles = scandir($migrationsPath);
        $hasMigration = false;
        $hasFile = '';

        foreach ($migrationFiles as $file) {
            if (strpos($file, $mTableName) !== false) {
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

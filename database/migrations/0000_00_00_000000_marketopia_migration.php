<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Path to the SQL file
        $path = public_path('all_data.sql');

        // Check if the file exists
        if (File::exists($path)) {
            // Read the SQL file
            $sql = File::get($path);

            // Execute the SQL statements
            DB::unprepared($sql);

            $this->createModelsAndControllers();
        } else {
            throw new \Exception("SQL file does not exist: $path");
        }

    }

        private function createModelsAndControllers()
    {
        $items = config('marketopia');
        foreach ($items as $model => $controller) {
            $modelPath = app_path("Models/{$model}.php");
            $modelTranslationPath = app_path("Models/{$model}Translation.php");
            $controllerPath = app_path("Http/Controllers/{$controller}.php");

            if (!File::exists($modelPath)) {
                Artisan::call('make:model', ['name' => $model]);
            }
            if (!File::exists($modelTranslationPath)) {
                Artisan::call('make:model', [
                    'name' => $model.'Translation',
                    // '--migration' => true
                ]);
            }
            if (!File::exists($controllerPath)) {
                Artisan::call('make:controller', [
                    'name' => $controller,
                    '--model' => $model
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

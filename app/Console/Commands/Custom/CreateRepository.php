<?php

namespace App\Console\Commands\Custom;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:custom-repository {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate A Repository Class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $model = $this->argument('model');
        $modelNamespace = 'App\\Models';
        $namespace = 'App\\Repositories';
        $className = $model . 'Repository';

        // Check if the model exists, if not, create it
        $modelPath = app_path("Models/{$model}.php");
        if (!File::exists($modelPath)) {
            $this->call('make:model', ['name' => "Models/{$model}"]);
        }

        // Create the repository file from the stub
        $stub = File::get(base_path('stubs/custom/repository.stub'));

        $stub = str_replace(
            ['{{ namespace }}', '{{ modelNamespace }}', '{{ model }}', '{{ class }}'],
            [$namespace, $modelNamespace, $model, $className],
            $stub
        );

        $repositoryPath = app_path("Repositories/{$className}.php");
        File::put($repositoryPath, $stub);

        $this->info("Repository created successfully.");
    }
}

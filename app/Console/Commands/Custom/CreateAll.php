<?php

namespace App\Console\Commands\Custom;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:custom-all {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate A Service & Repository Classes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        $model = $this->argument('model');
        $modelNamespace = 'App\\Models';
        $RepositoryNamespace = 'App\\Repositories';
        $RepositoryClassName = $model . 'Repository';


        $serviceNamespace = 'App\\Services';
        $serviceClassName = $model . 'Service';


        // Check if the model exists, if not, create it
        $modelPath = app_path("Models/{$model}.php");
        if (!File::exists($modelPath)) {
            $this->call('make:model', ['name' => "Models/{$model}"]);
            $this->info("Model created successfully.");    

        }
        $this->createRepository($RepositoryNamespace, $modelNamespace, $model, $RepositoryClassName);
        $this->createService($serviceNamespace, $RepositoryNamespace, $model, $serviceClassName);
    }

    public function createRepository($RepositoryNamespace, $modelNamespace, $model, $RepositoryClassName)
    {
        $RepositoryStub = File::get(base_path('stubs/custom/repository.stub'));
        $RepositoryStub = str_replace(
            ['{{ namespace }}', '{{ modelNamespace }}', '{{ model }}', '{{ class }}'],
            [$RepositoryNamespace, $modelNamespace, $model, $RepositoryClassName],
            $RepositoryStub
        );

        $repositoryPath = app_path("Repositories/{$RepositoryClassName}.php");
        File::put($repositoryPath, $RepositoryStub);

        $this->info("Repository created successfully.");    
    }

    public function createService($serviceNamespace, $RepositoryNamespace, $model, $serviceClassName)
    {
        $stub = File::get(base_path('stubs/custom/service.stub'));

        $stub = str_replace(
            ['{{ namespace }}', '{{ repositoryNamespace }}', '{{ model }}', '{{ class }}'],
            [$serviceNamespace, $RepositoryNamespace, $model, $serviceClassName],
            $stub
        );

        $servicePath = app_path("Services/{$serviceClassName}.php");
        File::put($servicePath, $stub);

        $this->info("Service created successfully.");    
    }
}

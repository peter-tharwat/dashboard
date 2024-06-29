<?php

namespace App\Console\Commands\Custom;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:custom-service {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate A Service Class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $model = $this->argument('model');
        $repositoryNamespace = 'App\\Repositories';
        $namespace = 'App\\Services';
        $className = $model . 'Service';
        // Create the repository file from the stub
        $stub = File::get(base_path('stubs/custom/service.stub'));

        $stub = str_replace(
            ['{{ namespace }}', '{{ repositoryNamespace }}', '{{ model }}', '{{ class }}'],
            [$namespace, $repositoryNamespace, $model, $className],
            $stub
        );

        $servicePath = app_path("Services/{$className}.php");
        File::put($servicePath, $stub);

        $this->info("Repository created successfully.");

    }
}

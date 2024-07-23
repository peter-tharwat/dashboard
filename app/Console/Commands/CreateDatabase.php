<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create database if not exists';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \DB::connection()->statement('CREATE DATABASE '.env('DB_DATABASE'));

    }

    /*protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the database'],
        ];
    }*/

}

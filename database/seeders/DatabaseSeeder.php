<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
    	\App\Models\User::create([
    		'name'=>"ADMIN",
    		'power'=>"ADMIN",
    		'email'=>"admin@admin.com",
    		'email_verified_at'=>date("Y-m-d h:i:s"), 
    		'password'=>bcrypt('password')
    	]);
    }
}

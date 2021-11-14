<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::where('power',"ADMIN")->count();
        if($users==0)
            \App\Models\User::create([
                'name'=>"ADMIN",
                'power'=>"ADMIN",
                'email'=>env('DEFAULT_EMAIL'),
                'email_verified_at'=>date("Y-m-d h:i:s"), 
                'password'=>bcrypt(env('DEFAULT_PASSWORD'))
            ]);
    }
}

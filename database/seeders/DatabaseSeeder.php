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
        $this->call([
            //TagSeeder::class,
            UsersSeeder::class,
            SettingsSeeder::class,
            PagesSeeder::class,
            MenusSeeder::class,
            PermissionsSeeder::class,
            //ContentSeeder::class,
            AttachSuperAdminPermissions::class
        ]);
    }
}


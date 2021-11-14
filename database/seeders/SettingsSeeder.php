<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = \App\Models\Setting::count();
        if($settings==0)
            \App\Models\Setting::create([
            ]);
    }
}

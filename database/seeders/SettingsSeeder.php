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
                'website_name'=>"اسم الموقع هنا",
                'website_bio'=>"هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق",
                'main_color'=>"#2196f3",
                'hover_color'=>"#2196f3",
                'contact_email'=>"admin@admin.com",
                'robots_txt'=>"User-agent: *\nSitemap: ".env('APP_URL')."/sitemap.xml\nAllow: /",
            ]);
    }
}

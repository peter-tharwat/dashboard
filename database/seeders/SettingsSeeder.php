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


        # General
        \App\Models\Setting::create(['key'=>'website_name','value'=>"اسم الموقع هنا"]);
        \App\Models\Setting::create(['key'=>'website_bio','value'=>"هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق"]);
        \App\Models\Setting::create(['key'=>'website_logo','value'=>""]);
        \App\Models\Setting::create(['key'=>'website_wide_logo','value'=>""]);
        \App\Models\Setting::create(['key'=>'website_icon','value'=>""]);
        \App\Models\Setting::create(['key'=>'website_icon_base64','value'=>""]);
        \App\Models\Setting::create(['key'=>'website_cover','value'=>""]);
        \App\Models\Setting::create(['key'=>'address','value'=>""]);

        # Appearance
        \App\Models\Setting::create(['key'=>'main_color','value'=>"#0194fe"]);
        \App\Models\Setting::create(['key'=>'hover_color','value'=>"#2196f3"]);
        \App\Models\Setting::create(['key'=>'dashboard_dark_mode','value'=>0]);

        # Links
        \App\Models\Setting::create(['key'=>'contact_email','value'=>""]);
        \App\Models\Setting::create(['key'=>'phone','value'=>""]);
        \App\Models\Setting::create(['key'=>'phone2','value'=>""]);
        \App\Models\Setting::create(['key'=>'whatsapp_phone','value'=>""]);
        \App\Models\Setting::create(['key'=>'facebook_link','value'=>""]);
        \App\Models\Setting::create(['key'=>'telegram_link','value'=>""]);
        \App\Models\Setting::create(['key'=>'whatsapp_link','value'=>""]);
        \App\Models\Setting::create(['key'=>'twitter_link','value'=>""]);
        \App\Models\Setting::create(['key'=>'instagram_link','value'=>""]);
        \App\Models\Setting::create(['key'=>'youtube_link','value'=>""]);
        \App\Models\Setting::create(['key'=>'tiktok_link','value'=>""]);
        \App\Models\Setting::create(['key'=>'upwork_link','value'=>""]);
        \App\Models\Setting::create(['key'=>'nafezly_link','value'=>""]);
        \App\Models\Setting::create(['key'=>'linkedin_link','value'=>""]);
        \App\Models\Setting::create(['key'=>'github_link','value'=>""]);
        \App\Models\Setting::create(['key'=>'another_link1','value'=>""]);
        \App\Models\Setting::create(['key'=>'another_link2','value'=>""]);
        \App\Models\Setting::create(['key'=>'another_link3','value'=>""]);

        # Pages
        \App\Models\Setting::create(['key'=>'contact_page','value'=>""]);
        

        # Code
        \App\Models\Setting::create(['key'=>'header_code','value'=>""]);
        \App\Models\Setting::create(['key'=>'footer_code','value'=>""]);
        \App\Models\Setting::create(['key'=>'robots_txt','value'=>"User-agent: *\nSitemap: ".env('APP_URL')."/sitemap.xml\nAllow: /"]);























 




        /*$settings = \App\Models\Setting::count();
        if($settings==0)
            \App\Models\Setting::create([
                'website_name'=>"اسم الموقع هنا",
                'website_bio'=>"هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق",
                'main_color'=>"#2196f3",
                'hover_color'=>"#2196f3",
                'contact_email'=>"admin@admin.com",
                'robots_txt'=>"User-agent: *\nSitemap: ".env('APP_URL')."/sitemap.xml\nAllow: /",
            ]);*/
    }
}

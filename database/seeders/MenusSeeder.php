<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\MenuLink;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $menu = Menu::create([
            'title'=>"القائمة العلوية",
            'location'=>"NAVBAR"
        ]);

        //NAVBAR links
        MenuLink::insert([
            [
                'menu_id'=>$menu->id,
                'type'=>"CUSTOM_LINK",
                'type_id'=>null,
                'title'=>"الرئيسية",
                'url'=>env("APP_URL"),
                'icon'=>"fal fa-home",
                'order'=>0
            ],
            [
                'menu_id'=>$menu->id,
                'type'=>"CUSTOM_LINK",
                'type_id'=>null,
                'title'=>"المدونة",
                'url'=>route('blog'),
                'icon'=>"fal fa-pen-alt",
                'order'=>1,
            ],
            [
                'menu_id'=>$menu->id,
                'type'=>"PAGE",
                'type_id'=>\App\Models\Page::where('slug','terms')->first()->id,
                'title'=>"شروط الاستخدام",
                'url'=>route('page.show',\App\Models\Page::where('slug','terms')->first()),
                'icon'=>"fal fa-lock",
                'order'=>2,
            ],
            [
                'menu_id'=>$menu->id,
                'type'=>"CUSTOM_LINK",
                'type_id'=>null,
                'title'=>"تواصل معنا",
                'url'=>route('contact'),
                'icon'=>"fal fa-phone",
                'order'=>3,
            ]
        ]);




        $menu = Menu::create([
            'title'=>"القائمة الجانبية",
            'location'=>"ASIDE_BAR"
        ]);

         //home link
        MenuLink::insert([
            [
                'menu_id'=>$menu->id,
                'type'=>"CUSTOM_LINK",
                'type_id'=>null,
                'title'=>"الرئيسية",
                'url'=>env("APP_URL"),
                'icon'=>"fal fa-home",
                'order'=>0,
            ],
            [
                'menu_id'=>$menu->id,
                'type'=>"CUSTOM_LINK",
                'type_id'=>null,
                'title'=>"المدونة",
                'url'=>route('blog'),
                'icon'=>"fal fa-pen-alt",
                'order'=>1,
            ],
            [
                'menu_id'=>$menu->id,
                'type'=>"PAGE",
                'type_id'=>\App\Models\Page::where('slug','about')->first()->id,
                'title'=>"معلومات عنا",
                'url'=>route('page.show',\App\Models\Page::where('slug','about')->first()),
                'icon'=>"fal fa-info",
                'order'=>1,
            ],
            [
                'menu_id'=>$menu->id,
                'type'=>"PAGE",
                'type_id'=>\App\Models\Page::where('slug','terms')->first()->id,
                'title'=>"شروط الاستخدام",
                'url'=>route('page.show',\App\Models\Page::where('slug','terms')->first()),
                'icon'=>"fal fa-lock",
                'order'=>2,
            ],
            [
                'menu_id'=>$menu->id,
                'type'=>"PAGE",
                'type_id'=>\App\Models\Page::where('slug','privacy')->first()->id,
                'title'=>"سياسة الخصوصية",
                'url'=>route('page.show',\App\Models\Page::where('slug','privacy')->first()),
                'icon'=>"fal fa-info",
                'order'=>3,
            ],
            [
                'menu_id'=>$menu->id,
                'type'=>"CUSTOM_LINK",
                'type_id'=>null,
                'title'=>"تواصل معنا",
                'url'=>route('contact'),
                'icon'=>"fal fa-phone",
                'order'=>3,
            ]
        ]);


        $menu = Menu::create([
            'title'=>"قائمة الفوتر",
            'location'=>"FOOTER"
        ]);

        MenuLink::insert([
            [
                'menu_id'=>$menu->id,
                'type'=>"CUSTOM_LINK",
                'type_id'=>null,
                'title'=>"الرئيسية",
                'url'=>env("APP_URL"),
                'icon'=>"fal fa-home",
                'order'=>0
            ],
            [
                'menu_id'=>$menu->id,
                'type'=>"CUSTOM_LINK",
                'type_id'=>null,
                'title'=>"المدونة",
                'url'=>route('blog'),
                'icon'=>"fal fa-pen-alt",
                'order'=>1,
            ],
            [
                'menu_id'=>$menu->id,
                'type'=>"PAGE",
                'type_id'=>\App\Models\Page::where('slug','terms')->first()->id,
                'title'=>"شروط الاستخدام",
                'url'=>route('page.show',\App\Models\Page::where('slug','terms')->first()),
                'icon'=>"fal fa-lock",
                'order'=>2,
            ],
            [
                'menu_id'=>$menu->id,
                'type'=>"CUSTOM_LINK",
                'type_id'=>null,
                'title'=>"تواصل معنا",
                'url'=>route('contact'),
                'icon'=>"fal fa-phone",
                'order'=>3,
            ]
        ]);






    }
}

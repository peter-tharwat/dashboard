<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \Faker\Factory;
class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

 
        $articles_count = 10;

        $categories_titles=[
            'مشاريعنا',
            'أعمالنا',
            'الأخبار',
            'تدوينات',
            'آراء',
            'تحليلات',
            'تصميم',
            'برمجة',
            'تطبيقات',
            'ألعاب'
        ];


        $faker = Factory::create('ar_SA');
        foreach($categories_titles as $category_title){
            $this->command->info("creating category ".$category_title);
            $category = \App\Models\Category::create([
                'user_id'=>\App\Models\User::firstOrFail()->id,
                "slug"=>"test".uniqid(),
                "title"=>$category_title,
                "description"=>$faker->realText(100),
                "meta_description"=>"",
            ]);
            $image = $category->addMediaFromUrl("https://loremflickr.com/700/500/nature")->toMediaCollection('image');
            $category->update(['image'=>$image->id.'/'.$image->file_name]);
        }

        $this->command->info("Sleeping For 5 Seconds!");
        sleep(5);

        for($i =0 ; $i<$articles_count ;$i++){
            $this->command->info("creating article with title ".$faker->realText(50));
            $article = \App\Models\Article::create([
                'user_id'=>\App\Models\User::firstOrFail()->id,
                'slug'=>uniqid().rand(1,10000),
                'title'=>$faker->realText(50),
                'description'=>$faker->realText(10000)
            ]);
            $main_image = $article->addMediaFromUrl("https://loremflickr.com/700/500/nature")->toMediaCollection('main_image');
            $article->update(['main_image'=>$main_image->id.'/'.$main_image->file_name]);
            $article->categories()->sync(\App\Models\Category::inRandomOrder()->first()->id);
        } 
    }
}

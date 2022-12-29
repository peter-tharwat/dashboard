<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \Faker\Factory;
class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 10;
        $category = \App\Models\Category::firstOrFail();

        $faker = Factory::create('ar_SA');
        for($i =0 ; $i<$count ;$i++){
            $this->command->info("creating ".$i);
            $article = \App\Models\Article::create([
                'user_id'=>\App\Models\User::firstOrFail()->id,
                'slug'=>uniqid().rand(1,10000),
                'title'=>$faker->realText(50),
                'description'=>$faker->realText(10000)
            ]);

            $article->categories()->sync($category->id);
            $main_image = $article->addMediaFromUrl("https://loremflickr.com/700/500/nature")->toMediaCollection('image');
            $article->update(['main_image'=>$main_image->id.'/'.$main_image->file_name]);
        } 
    }
}

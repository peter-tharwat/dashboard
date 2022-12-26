<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $category = \App\Models\Category::create([
            'user_id'=>\App\Models\User::firstOrFail()->id,
            "slug"=>"test".uniqid(),
            "title"=>"تجريبي",
            "description"=>"هذا نص عشوائي يمكن أن يتم استبداله لاحقاً",
            "meta_description"=>"",
        ]);
        $article = \App\Models\Article::create([
            'user_id'=>\App\Models\User::firstOrFail()->id,
            "slug"=>"test".uniqid(),
            "is_featured"=>1,
            "title"=>"هذا نص عشوائي يمكن أن يتم استبداله لاحقاً",
            "description"=>"هذا نص عشوائي يمكن أن يتم استبداله لاحقاً",
            "meta_description"=>"",
        ]);
        $article->categories()->sync($category->id);
    }
}

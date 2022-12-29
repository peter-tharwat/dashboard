<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{


    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>\App\Models\User::firstOrFail()->id,
            'slug'=>uniqid().rand(1,10000),
            'title'=>$this->faker->text(150),
            'description'=>$this->faker->paragraphs(5)
        ];
    }
}

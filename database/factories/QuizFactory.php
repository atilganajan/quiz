<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuizFactory extends Factory
{
    /** 
     * @var string
     */
    protected $model = Quiz::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title=$this->faker->sentence(rand(3,7));
        return [
            "title"=>$title,
            "slug"=>Str::slug($title),
            "description"=>$this->faker->text(200),
        ];
    }
}

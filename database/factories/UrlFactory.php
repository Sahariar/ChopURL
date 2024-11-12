<?php

namespace Database\Factories;

use App\Models\Url;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Url>
 */
class UrlFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Url::class;

    public function definition(): array
    {
        return [
            'long_url' => $this->faker->url,
            'short_url' => Str::random(6),
            'user_id' => User::inRamdomOrder()->first()->id ?? User::factory(),
            'visit_count' => $this->faker->numberBetween(0,100),
        ];
    }
}

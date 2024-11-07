<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Watch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;
    public function definition(): array
    {        
        $array = ['Đồng hồ đẹp', 'Sản phẩm chất lượng', 'Number 1', "Đồng hồ xịn xò", 'Không một vết xước'];
        return [
            //
            'user_id' => User::all()->random()->id,
            'watch_id' => Watch::all()->random()->id,
            'star' => rand(3,5),
            'message' => $array[rand(0, 4)],
        ];
    }
}

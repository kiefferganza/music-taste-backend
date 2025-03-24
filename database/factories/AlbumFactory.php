<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AlbumFactory extends Factory
{
    protected $model = Album::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'artist' => $this->faker->word(),
            'cover' => 'https://picsum.photos/seed/picsum/200/300',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

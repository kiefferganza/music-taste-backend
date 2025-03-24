<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i<=10; $i++)
        {
            Album::factory()->create();
        }
    }
}

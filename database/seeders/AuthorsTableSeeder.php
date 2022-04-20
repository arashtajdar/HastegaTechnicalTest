<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<50;$i++){
            Author::create(Author::factory()->make()->attributesToArray());
        }
        $this->command->info('Authors table seeded!');

    }
}

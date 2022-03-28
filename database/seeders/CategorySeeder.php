<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = Category::factory();
        $factory->createMany([
            [
            'name' => 'Lawn and Garden',
            'code' => 'LNG',
            ],
            [
            'name' => 'Workshop',
            'code' => 'WRK',
            ],
            [
            'name' => 'Household',
            'code' => 'HOU',
             ],
             [
            'name' => 'Automotive',
            'code' => 'CAR',
            ],
        ]);
    }
}

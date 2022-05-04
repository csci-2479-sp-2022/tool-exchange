<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tool;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = Tool::factory();
        $factory->createMany([
            [
            'name' => 'Hammer',
            'type' => 'Hardware Tool',
            'category_id' => 1,
            'user_id' =>1,
            'condition_id'=>1
            ],
            [
            'name' => 'Screwdriver',
            'type' => 'Hardware Tool',
            'category_id' => 1,
            'user_id' =>1,
            'condition_id'=>1
            ],
            [
            'name' => 'Lawn Mower',
            'type' => 'garden tool',
            'category_id' => 1,
            'user_id' =>1,
            'condition_id'=>1
            ]
        ]);
    }
}

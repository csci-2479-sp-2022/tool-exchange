<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Condition;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $factory = Condition::factory();
            $factory->createMany([
                [
                'name' => 'Brand new',
                'code' => 'NIB',
                ],
                [
                'name' => 'Lightly used',
                'code' => 'GOOD',
                ],
                [
                'name' => 'Normal wear and tear',
                'code' => 'FAIR',
                 ],
                 [
                'name' => 'Needs work',
                'code' => 'BAD',
                ],
            ]);
        }
    }
}

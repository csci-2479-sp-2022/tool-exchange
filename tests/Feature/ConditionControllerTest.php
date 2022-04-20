<?php

namespace Tests\Feature;

use App\Services\ConditionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Condition;
use Tests\TestCase;
use Mockery\MockInterface;


class ConditionControllerTest extends TestCase {
    private $condition = [];
    private MockInterface $conditionServiceSpy;

    public static function getConditions(){
        return [
            Condition::make(['name' => 'Lawn and Garden','code' => 'LNG','id'=>'1']),
            Condition::make(['name' => 'Workshop','code' => 'WRK','id'=>'2']),
            Condition::make(['name' => 'Household','code' => 'HOU','id'=>'3']),
            Condition::make(['name' => 'Automotive','code' => 'CAR','id'=>'4']),
        ];
    }

    public function setUp(): void {
        parent::setUp();
        $this->conditions = self::getConditions();
        $this->conditionServiceSpy = $this->spy(ConditionService::class);
    }
}

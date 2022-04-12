<?php
namespace App\Services;

use App\Contracts\ConditionInterface;
use App\Models\Condition;

class ConditionService implements ConditionInterface
{
    public function getConditionById(int $id): ?Condition
    {
        foreach ($this->getConditions() as $condition) {
            if ($condition->id === $id) {
                return $condition;
            }
        }
        return null;
    }
    public function getConditions(): array
    {
        return [
            Condition::make(['name' => 'Lawn and Garden','code' => 'LNG','id'=>'1']),
            Condition::make(['name' => 'Workshop','code' => 'WRK','id'=>'2']),
            Condition::make(['name' => 'Household','code' => 'HOU','id'=>'3']),
            Condition::make(['name' => 'Automotive','code' => 'CAR','id'=>'4']),
        ];
    }
}

<?php
namespace App\Services;

use App\Contracts\AccountInterface;
use App\Models\UserTool;

class AccountService implements AccountInterface
{
    public function getToolById(int $id): ?UserTool
    {
        foreach ($this->getTools() as $tool) {
            if ($tool->id === $id) {
                return $tool;
            }
        }
        return null;
    }

    public function getTools(): array
    {
        return [
            UserTool::make(['name' => 'Hammer','type' => 'hardware tool','id'=>'1', 'user_id'=> '1']),
            UserTool::make(['name' => 'Screwdriver','type' => 'hardware tool','id'=>'2', 'user_id'=> '1']),
            UserTool::make(['name' => 'Lawn Mower','type' => 'garden tool','id'=>'3', 'user_id'=> '1'])
        ];
    }

    public function getToollistByUserId(int $id): ?UserTool
    {
        foreach (self::getTools() as $tool) {

            if ($tool->user_id === $id) {
                return $tool;
            }
        }
        return null;
    }
}

<?php
namespace App\Services;

use App\Contracts\AccountInterface;
use App\Models\Tool;

class AccountService implements AccountInterface
{
    public function getToolById(int $id): ?Tool
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
            Tool::make(['name' => 'Hammer','type' => 'hardware tool','id'=>'1', 'user_id'=> '1']),
            Tool::make(['name' => 'Screwdriver','type' => 'hardware tool','id'=>'2', 'user_id'=> '1']),
            Tool::make(['name' => 'Lawn Mower','type' => 'garden tool','id'=>'3', 'user_id'=> '1'])
        ];
    }

    public function getToollistByUserId(int $id): ?Tool
    {
        foreach (self::getTools() as $tool) {

            if ($tool->user_id === $id) {
                return $tool;
            }
        }
        return null;
    }
}

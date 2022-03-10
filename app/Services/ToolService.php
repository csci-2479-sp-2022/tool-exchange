<?php
namespace App\Services;

use App\Contracts\ToolInterface;
use App\Models\Tool;

class ToolService implements ToolInterface
{
    public function getToolById(int $id): ?Tool
    {
        foreach (self::getTools() as $tool) {
            if ($tool->id === $id) {
                return $tool;
            }
        }
        return null;
    }

    public function getTools(): array
    {
        return [
            Tool::make(['name' => 'Hammer','type' => 'hardware tool','id'=>'1']),
            Tool::make(['name' => 'Screwdriver','type' => 'hardware tool','id'=>'2']),
            Tool::make(['name' => 'Lawn Mower','type' => 'garden tool','id'=>'3'])
        ];
    }

}

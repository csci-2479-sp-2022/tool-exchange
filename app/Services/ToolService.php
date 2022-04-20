<?php
namespace App\Services;

use App\Contracts\ToolInterface;
use App\Models\Tool;
use Illuminate\Database\Eloquent\Collection;

class ToolService implements ToolInterface
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

    public function getTools(): Collection
    {
        /*
        return [
            Tool::make(['name' => 'Hammer','type' => 'hardware tool','id'=>'1']),
            Tool::make(['name' => 'Screwdriver','type' => 'hardware tool','id'=>'2']),
            Tool::make(['name' => 'Lawn Mower','type' => 'garden tool','id'=>'3'])
        ];
        */
        return Tool::all();
    }
}

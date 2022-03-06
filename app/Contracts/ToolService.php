<?php

namespace App\Contracts;

use App\Models\Tool;

interface ToolService
{
    public function getTools(): array;

    public function getToolById(int $id): ?Tool;
}

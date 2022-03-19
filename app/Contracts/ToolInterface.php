<?php

namespace App\Contracts;

use App\Models\Tool;

interface ToolInterface
{

    function getToolById(int $id): ?Tool;

    function getTools(): array;

}

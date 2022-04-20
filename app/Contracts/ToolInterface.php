<?php

namespace App\Contracts;

use App\Models\Tool;
use Illuminate\Database\Eloquent\Collection;

interface ToolInterface
{

    function getToolById(int $id): ?Tool;

    function getTools(): Collection;

}

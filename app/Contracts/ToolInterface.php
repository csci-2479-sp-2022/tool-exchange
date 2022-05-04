<?php

namespace App\Contracts;

use App\Models\Tool;
use Illuminate\Support\Collection;


interface ToolInterface
{

    function getToolById(int $id): ?Tool;

    function getTools(): Collection;

}

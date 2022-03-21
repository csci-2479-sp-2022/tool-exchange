<?php

namespace App\Contracts;

use App\Models\Tool;

interface AccountInterface
{
    function getTools(): array;

    function getToollistByUserId(int $id): ?Tool;

}

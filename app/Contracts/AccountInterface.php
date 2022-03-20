<?php

namespace App\Contracts;

use App\Models\UserTool;

interface AccountInterface
{

    function getToolById(int $id): ?UserTool;

    function getTools(): array;

    function getToollistByUserId(int $id): ?UserTool;

}

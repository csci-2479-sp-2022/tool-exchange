<?php
namespace App\Contracts;

use App\Models\User;

interface AccountService
{
    function getGameById(int $id): User;

    function getGames(): array;
}
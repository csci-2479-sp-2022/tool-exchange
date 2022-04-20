<?php

namespace App\Contracts;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryInterface
{

    function getCategoryById(int $id): ?Category;

    function getCategories(): Collection;

}

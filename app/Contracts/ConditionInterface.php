<?php

namespace App\Contracts;

use App\Models\Category;

interface CategoryInterface
{

    function getCategoryById(int $id): ?Category;

    function getCategories(): array;

}

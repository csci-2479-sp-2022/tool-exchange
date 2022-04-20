<?php
namespace App\Services;

use App\Contracts\CategoryInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService implements CategoryInterface
{
    public function getCategoryById(int $id): ?Category
    {
        foreach ($this->getCategories() as $category) {
            if ($category->id === $id) {
                return $category;
            }
        }
        return null;
    }

    public function getCategories(): Collection
    {
        return Category::all();
    }

}

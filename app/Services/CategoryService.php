<?php
namespace App\Services;

use App\Contracts\CategoryInterface;
use App\Models\Category;

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

    public function getCategories(): array
    {
        return [
            Category::make(['name' => 'Lawn and Garden','code' => 'LNG','id'=>'1']),
            Category::make(['name' => 'Workshop','code' => 'WRK','id'=>'2']),
            Category::make(['name' => 'Household','code' => 'HOU','id'=>'3']),
            Category::make(['name' => 'Automotive','code' => 'CAR','id'=>'4']),
        ];
    }

}

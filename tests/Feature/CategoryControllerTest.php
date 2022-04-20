<?php

namespace Tests\Feature;

use App\Services\CategoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Category;
use Tests\TestCase;
use Mockery\MockInterface;


class CategoryControllerTest extends TestCase {
    private $categories = [];
    private MockInterface $categoryServiceSpy;

    public static function getCategories(){
        return [
            Category::make(['name' => 'Lawn and Garden','code' => 'LNG','id'=>'1']),
            Category::make(['name' => 'Workshop','code' => 'WRK','id'=>'2']),
            Category::make(['name' => 'Household','code' => 'HOU','id'=>'3']),
            Category::make(['name' => 'Automotive','code' => 'CAR','id'=>'4']),
        ];
    }

    public function setUp(): void {
        parent::setUp();
        $this->categories = self::getCategories();
        $this->categoryServiceSpy = $this->spy(CategoryService::class);
    }

}

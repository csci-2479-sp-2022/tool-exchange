<?php

namespace Tests\Feature;

use App\Models\Pet;
use App\Contracts\SearchResultInterface;
use App\Services\ToolService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery\MockInterface;


class SearchControllerTest extends TestCase
{
    private $searchResults = [];
    private MockInterface $ToolServiceSpy;

    protected function setUp(): void
    {
        parent::setUp();
        $this->searchResult = self::getSearchResult();
        $this->toolServiceSpy = $this->spy(ToolService::class);
}

private static function getSearchResult(){
    return [
        Tool::make([
            'id' => 1,
            'name' => 'Hammer']),
    ];
}
public function test_search_result() 
{
    //arrange 
    $this -> toolServiceSpy -> shouldReceive('getTools')
    ->once()
    ->andReturn([
        Tool::make([
            'id' => 1,
            'name' => 'Hammer',
        ]),
    
    ]);
    //act
    $response = $this->get('/search-results');
    //assert 
    $response -> assertStatus(200);
    $response -> assertViewHas('tools',
    [   Tool::make([
            'id' => 1,
            'name' => 'Hammer',]),
    ]);
}


}

    


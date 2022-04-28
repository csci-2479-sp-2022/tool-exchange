<?php

namespace Tests\Feature;

use App\Models\Tool;
use App\Contracts\SearchResultInterface;
use App\Contracts\ToolInterface;
use App\Services\ToolService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;
use Mockery\MockInterface;


class SearchControllerTest extends TestCase
{
    private Collection $searchResults;
    private MockInterface $ToolServiceSpy;

    protected function setUp(): void
    {
        parent::setUp();
        $this->searchResults = self::getSearchResult();
        $this->toolServiceSpy = $this->spy(ToolInterface::class);
}

    private static function getSearchResult(){
        return collect([
            Tool::make([
                'id' => 1,
                'name' => 'Hammer']),
        ]);
    }
    public function test_search_result()
    {
        // $tool = Tool::make([
        //     'id' => 1,
        //     'name' => 'Hammer',
        // ]);

        //arrange
        $this->toolServiceSpy->shouldReceive('getTools')
        ->once()
        // ->andReturn(collect());
        ->andReturn($this->searchResults);
        //act
        $response = $this->get('/search-results');
        //assert
        $response -> assertStatus(200);
        $response -> assertViewHas('tools', $this->searchResults);
    }


}




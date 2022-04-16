<?php

namespace Tests\Feature;

use App\Services\ToolService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Tool;
use Tests\TestCase;
use Mockery\MockInterface;


class ToolControllerTest extends TestCase {
    private $tools = [];
    private MockInterface $toolServiceSpy;

    public static function getTools(){
        return 
        Tool::hydrate([
            Tool::make(['name' => 'Hammer','type' => 'Hardware Tool','category_id'=>'1','user_id'=>1,'condition_id'=>1]),
            Tool::make(['name' => 'Screwdriver','type' => 'Hardware Tool','category_id'=>'1','user_id'=>1,'condition_id'=>1]),
            Tool::make(['name' => 'Lawn Mower','type' => 'Garden Tool','category_id'=>'1','user_id'=>1,'condition_id'=>1])
        ]);
    }

    public function setUp(): void {
        parent::setUp();
        $this->tools = self::getTools();
        $this->toolServiceSpy = $this->spy(ToolService::class);
    }

    public function test_get_tool_list(){
        //arrange
        $this->toolServiceSpy->shouldReceive('getTools')
            ->once()
            ->andReturn(
                Tool::hydrate([
                    Tool::make(['name' => 'Hammer','type' => 'Hardware Tool','category_id'=>'1','user_id'=>1,'condition_id'=>1]),
                    Tool::make(['name' => 'Screwdriver','type' => 'Hardware Tool','category_id'=>'1','user_id'=>1,'condition_id'=>1]),
                    Tool::make(['name' => 'Lawn Mower','type' => 'Garden Tool','category_id'=>'1','user_id'=>1,'condition_id'=>1])
                ])
            );

        // act
        $response = $this->get('/tools');

        // assert
        $response->assertStatus(200);
        $response->assertViewHas('tools', 
        Tool::hydrate([
            Tool::make(['name' => 'Hammer','type' => 'Hardware Tool','category_id'=>'1','user_id'=>1,'condition_id'=>1]),
            Tool::make(['name' => 'Screwdriver','type' => 'Hardware Tool','category_id'=>'1','user_id'=>1,'condition_id'=>1]),
            Tool::make(['name' => 'Lawn Mower','type' => 'Garden Tool','category_id'=>'1','user_id'=>1,'condition_id'=>1])
        ])
        );
    }

    public function test_get_tool_by_id() {
       // arrange
       $this->toolServiceSpy->shouldReceive('getToolById')
        ->once()
        ->andReturn(
            Tool::make(['name' => 'Hammer','type' => 'Hardware Tool','category_id'=>'1','user_id'=>1,'condition_id'=>1])
        );

        // act
        $response = $this->get('/tools/1');

        // assert
        $response->assertStatus(200);
        $response->assertViewHas('tool',
        Tool::make(['name' => 'Hammer','type' => 'Hardware Tool','category_id'=>'1','user_id'=>1,'condition_id'=>1])
        );
    }

    public function test_invalid_id() {
        $response = $this->get('/tools/4');
        $response->assertStatus(404);
    }
}

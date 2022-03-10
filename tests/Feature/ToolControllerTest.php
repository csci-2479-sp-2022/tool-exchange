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
        return [
            Tool::make(['name' => 'Hammer','type' => 'hardware tool','id'=>'1']),
            Tool::make(['name' => 'Screwdriver','type' => 'hardware tool','id'=>'2']),
            Tool::make(['name' => 'Lawn Mower','type' => 'garden tool','id'=>'3'])
        ];
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
            ->andReturn([
                Tool::make(['name' => 'Hammer','type' => 'hardware tool','id'=>'1']),
                Tool::make(['name' => 'Screwdriver','type' => 'hardware tool','id'=>'2']),
                Tool::make(['name' => 'Lawn Mower','type' => 'garden tool','id'=>'3'])
            ]);

        // act
        $response = $this->get('/tools');

        // assert
        $response->assertStatus(200);
        $response->assertViewHas('tools', [
            Tool::make(['name' => 'Hammer','type' => 'hardware tool','id'=>'1']),
            Tool::make(['name' => 'Screwdriver','type' => 'hardware tool','id'=>'2']),
            Tool::make(['name' => 'Lawn Mower','type' => 'garden tool','id'=>'3'])
        ]);
    }

    public function test_get_tool_by_id() {
       // arrange
       $this->toolServiceSpy->shouldReceive('getToolById')
        ->once()
        ->andReturn(
            Tool::make(['name' => 'Lawn Mower','type' => 'garden tool','id'=>'3'])
        );

        // act
        $response = $this->get('/tools');

        // assert
        $response->assertStatus(200);
        $response->assertViewHas('tool',
        Tool::make([
            'name' => 'Screwdriver','type' => 'hardware tool','id'=>'2'
        ])
    );
    }

    public function test_invalid_id() {
        $response = $this->get('/tools/4');
        $response->assertStatus(404);
    }
}

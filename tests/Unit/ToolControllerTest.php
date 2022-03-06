<?php

namespace Tests\Feature;

use App\Contracts\ToolService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Tool;
use Tests\TestCase;
use Mockery\MockInterface;




class ToolControllerTest extends TestCase {
    private $tools = [];
    private MockInterface $toolServiceSpy;

    private static function getTools() {
        return [
            Tool::make([
                'id' => 1,
                'name' => 'Hammer',
                'type' => Tool::TOOL_TYPE_HARDWARE,
            ]),
            Tool::make([
                'id' => 2,
                'name' => 'Lawn Mower',
                'type' => Tool::TOOL_TYPE_GARDEN,
            ]),
        ];

    }

    public function setUp(): void {
        parent::setUp();
        $this->tools = self::getTools();
        $this->ToolServiceSpy = $this->spy(ToolService::class);
    }

    public function test_get_list_of_tools() {
        // arrange
        $this->ToolServiceSpy->shouldReceive('getTools')
            ->once()
            ->andReturn([
                Tool::make([
                    'id' => 1,
                    'name' => 'Hammer',
                    'type' => Tool::TOOL_TYPE_HARDWARE,
                ]),
                Tool::make([
                    'id' => 2,
                    'name' => 'Lawn Mower',
                    'type' => Tool::TOOL_TYPE_GARDEN,
                ]),
            ]);

        // act
        $response = $this->get('/tools');

        // assert
        $response->assertStatus(200);
        $response->assertViewHas('tools', [
            Tool::make([
                'id' => 1,
                'name' => 'Hammer',
                'type' => Tool::TOOL_TYPE_HARDWARE,
            ]),
            Tool::make([
                'id' => 2,
                'name' => 'Lawn Mower',
                'type' => Tool::TOOL_TYPE_GARDEN,
            ]),
        ]);
    }

    public function test_get_single_tool() {
        // arrange
        $this->ToolServiceSpy->shouldReceive('getToolById')
            ->once()
            ->andReturn(
                Tool::make([
                    'id' => 2,
                    'name' => 'Lawn Mower',
                    'type' => Tool::TOOL_TYPE_GARDEN,
                ]),
            );

        // act
        $response = $this->get('/tools/2');

        // assert
        $response->assertStatus(200);
        $response->assertViewHas('tool',
            Tool::make([
                'id' => 2,
                'name' => 'Lawn Mower',
                'type' => Tool::TOOL_TYPE_GARDEN,
            ]),
        );
    }

    public function test_get_invalid_id_tools() {
        $response = $this->get('/tools/4');
        $response->assertStatus(404);
    }
}

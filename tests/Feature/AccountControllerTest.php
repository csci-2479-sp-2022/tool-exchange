<?php

namespace Tests\Feature;

use App\Services\AccountService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Tool;
use Tests\TestCase;
use Mockery\MockInterface;


class AccountControllerTest extends TestCase {
    private $tools = [];
    private MockInterface $accountServiceSpy;

    public static function getTools(){
        return [
            Tool::make(['name' => 'Hammer','type' => 'hardware tool','id'=>'1','user_id'=> '1']),
            Tool::make(['name' => 'Screwdriver','type' => 'hardware tool','id'=>'2','user_id'=> '1']),
            Tool::make(['name' => 'Lawn Mower','type' => 'garden tool','id'=>'3','user_id'=> '1'])
        ];
    }

    public function setUp(): void {
        parent::setUp();
        $this->tools = self::getTools();
        $this->accountServiceSpy = $this->spy(AccountService::class);
    }

    public function test_get_user_tool_list(){
        //arrange
        $this->accountServiceSpy->shouldReceive('getTools')
            ->once()
            ->andReturn([
                Tool::make(['name' => 'Hammer','type' => 'hardware tool','id'=>'1','user_id'=> '1']),
                Tool::make(['name' => 'Screwdriver','type' => 'hardware tool','id'=>'2','user_id'=> '1']),
                Tool::make(['name' => 'Lawn Mower','type' => 'garden tool','id'=>'3','user_id'=> '1'])
            ]);

        // act
        $response = $this->get('/usertools');

        // assert
        $response->assertStatus(200);
        $response->assertViewHas('usertools', [
            Tool::make(['name' => 'Hammer','type' => 'hardware tool','id'=>'1','user_id'=> '1']),
            Tool::make(['name' => 'Screwdriver','type' => 'hardware tool','id'=>'2','user_id'=> '1']),
            Tool::make(['name' => 'Lawn Mower','type' => 'garden tool','id'=>'3','user_id'=> '1'])
        ]);
    }
}

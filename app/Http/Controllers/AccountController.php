<?php

namespace App\Http\Controllers;
use App\Contracts\AccountInterface;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use function PHPSTORM_META\type;

class AccountController extends Controller
{
    public function __construct(private AccountInterface $accountService)
    {

    }
    //this is controlle raction for the /games url of app
    public function show(){
        //controller action typically returns view
        return view('user-tool-list', ['usertools'=> $this->accountService->getTools()]);
    }

    private static function getTools(): array{
       return [
            Tool::make(['name' => 'Hammer','type' => 'hardware tool','id'=>'1','user_id'=> '1']),
            Tool::make(['name' => 'Screwdriver','type' => 'hardware tool','id'=>'2','user_id'=> '1']),
            Tool::make(['name' => 'Lawn Mower','type' => 'garden tool','id'=>'3','user_id'=> '1'])
        ];
    }
}

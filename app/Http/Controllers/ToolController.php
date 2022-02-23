<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ToolController extends Controller
{
    //this is controlle raction for the /games url of app
    public function show(){
        //controller action typically returns view
        return view('tool-list', ['tools'=> self::getTools()]);
    }

    public function view(int $id){
        //controller action typically returns view
        //return view('game-list', ['games'=> self::getGames()]);
        return view('tool-view', ['tool'=>self::getToolById($id)]);
    }

    private static function getToolById(int $id):Tool
     {
        foreach(self::getTools() as $tool){
            if($tool->id===$id){
                return $tool;
            }
        }
        return null;
    }


    private static function getTools(): array{
        return [
            Tool::make(['type' => 'hammer', 'price' => 8, 'id' => 1]),
            Tool::make(['type' => 'saw', 'price' => 3.30, 'id' => 2]),
            
        ];
    }
}

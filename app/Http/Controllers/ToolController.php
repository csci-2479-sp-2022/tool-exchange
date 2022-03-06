<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;
use App\Contracts\ToolService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class ToolController extends Controller {

    // create action method to return tools view
    public function show(){
        return view (
            'tool',
            [
                'tool' => self::getTool(),
            ]);
            return null;
    }

    // method to return an array of tools
    public static function getTool() {
        return [
            Tool::make(['name' => 'Hammer','type' => 'hardware tool']),
            Tool::make(['name' => 'Screwdriver','type' => 'hardware tool']),
            Tool::make(['name' => 'Lawn Mower','type' => 'garden tool'])
        ];
    }
}

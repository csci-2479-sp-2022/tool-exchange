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


    }

}

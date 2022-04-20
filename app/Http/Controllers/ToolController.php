<?php

namespace App\Http\Controllers;
use App\Contracts\ToolInterface;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use function PHPSTORM_META\type;

class ToolController extends Controller
{
    public function __construct(private ToolInterface $toolService)
    {

    }
    //this is controlle raction for the /games url of app
    public function show(){
        //controller action typically returns view
        return view('tool-list', ['tools'=> $this->toolService->getTools()]);
    }

    public function view(int $id){
        //controller action typically returns view
        $tool = $this->toolService->getToolById($id);
        if ($tool == null) {
            throw new NotFoundHttpException();
        }
        return view('tool-view', ['tool'=> $tool]);
    }

    private function getToolById(int $id)
    {
        $tool = $this->toolService->getToolById($id);

        if ($tool == null) {
            throw new NotFoundHttpException();
        }

        return view('tool-details', [
            'tool' => $tool,
        ]);
    }


}

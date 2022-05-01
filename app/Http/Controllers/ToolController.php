<?php

namespace App\Http\Controllers;
use App\Contracts\ToolInterface;
use App\Http\Requests\ToolRequest;
use App\Models\Tool;
use App\Services\ToolService;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use function PHPSTORM_META\type;

class ToolController extends Controller
{
    //this is controlle raction for the /games url of app
    public function show(){
        //controller action typically returns view
        return view('tool-list', ['tools'=> $this->toolService->getTools()]);
    }

    public function index()
    {
        return view('tool-form', [
            'tools' => self::getTools(),
        ]);
    }

    public function create(ToolRequest $request)
    {

        self::saveTool($request);


        // redirect to tool list page
        return response()->redirectToRoute('tool-list');
    }

    private static function saveTool(ToolRequest $request): void {
        $tool = Tool::find($request->getToolById());

        $tool = Tool::make([
            'name' => $request->getName(),
            'category' => $request->getCategory(),
            'listForRent' => $request->getListForRent(),
        ]);

        $tool->tool()->associate($tool);

        $tool->save();
    }

    private static function getTools()
    {
        return Tool::orderBy('name')->get();
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

<?php

namespace App\Http\Controllers;
use App\Contracts\ToolInterface;
use App\Http\Requests\ToolRequest;
use App\Models\Tool;
use App\Models\Category;
use App\Models\Condition;
use App\Services\ToolService;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

use function PHPSTORM_META\type;

class ToolController extends Controller
{
    public function __construct(private ToolInterface $toolService)
    {

    }
    //this is controller action for the /games url of app
    public function show()
    {
        //controller action typically returns view
        return view('tool-list', ['tools'=> $this->toolService->getTools()]);
    }

    public function index()
    {
        return view('tool-form', [
            'tools' => self::getTools(), 'categories' => self::getCategories(), 'conditions' => self::getConditions()
        ]);
    }

    public function create(ToolRequest $request)
    {

        self::saveTool($request);


        // redirect to tool list page
        return response()->redirectToRoute('tools');
    }

    private static function saveTool(ToolRequest $request): void
    {
        $category = $request->getCategoryName();
        //$condition = Condition::find($request->getConditionId());

        $tool = Tool::make([
            'name' => $request->getName(),
            'type' => $request->getCategoryName(),
            'category_id' => $request->getCategoryID(),
            'user_id' => '',
            'condition_id'=>$request->getCondition()
         ]);

        /*
        $tool->category()->associate($category);
        $tool->condition()->associate($condition);
        */

        $tool->save();

        Cache::forget('gamelist');
        Log::debug('gamelist cache cleared');
    }

    private static function getTools()
    {
        return Tool::orderBy('name')->get();
    }

    private static function getConditions()
    {
        return Condition::orderBy('name')->get();
    }
    private static function getCategories()
    {
        return Category::orderBy('name')->get();
    }



    public function view(int $id)
    {
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

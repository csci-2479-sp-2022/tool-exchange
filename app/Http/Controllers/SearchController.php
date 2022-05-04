<?php

namespace App\Http\Controllers;

use App\Contracts\ToolInterface;
use App\Models\Tool;
use App\Services\ToolService;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class SearchController extends Controller{
    public function __construct(
        private ToolInterface $toolService
    ) {
    }

    public function searchResults()
    {
        return view('search-results', [
            'tools' => $this->toolService->getTools(),
        ]);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ICategoryService;
use App\Services\IElectionService;
use App\Services\IResultService;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    private $categorySrevice;
    private $resultSrevice;
    public function __construct(ICategoryService $iCategoryService, IResultService $iResultService)
    {
        $this->categorySrevice = $iCategoryService;
        $this->resultSrevice = $iResultService;
    }
    
    public function getElections()
    {
        $categories = $this->categorySrevice->getAllCategories();
        return view('voterpanel',[
            'categories' => $categories
        ]);
    }

    public function insertVote(Request $request)
    {
        $this->resultSrevice->storeVote($request);
        return redirect()->route('voterhome');
    }
}

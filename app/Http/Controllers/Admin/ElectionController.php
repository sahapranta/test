<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ElectionCreateRequest;
use App\Services\IElectionService;
use App\Utils\ElectionHelper;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    use ElectionHelper;
    private $electionService;
    public function __construct(IElectionService $iElectionService)
    {
        $this->electionService = $iElectionService;
    }

    public function index()
    {
        $endElections = $this->electionService->getEndElections();
        $startElections = $this->electionService->getStartElections();
        return view('admin.election',[
            'elections' => $endElections,
            'startElections' => $startElections,
        ]);
    }

    public function startElection(ElectionCreateRequest $request)
    {
        $this->electionService->startElection($request);
        return redirect()->back();
    }

    public function stopElection(Request $request)
    {
        $id = ElectionHelper::getCurrentElection();
        $this->electionService->endElection($request);
        return redirect()->back();
    }
}

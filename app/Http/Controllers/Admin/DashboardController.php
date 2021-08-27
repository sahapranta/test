<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Result;
use App\Services\IElectionService;
use App\Services\IResultService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $electionService;
    private $resultService;


    public function __construct(IElectionService $iElectionService, IResultService $iResultService)
    {
        $this->electionService = $iElectionService;
        $this->resultService = $iResultService;
    }
    public function showDashboard()
    {
        $endElections = $this->electionService->getEndElections();
        $electionId = Election::where('end', '!=', null)->get();
        foreach ($electionId as $id) {
            $election = Election::find($id->id);
        }
        $candidates = Candidate::where('election_id', $election->id)->get();
        foreach($candidates as $candidate){
            $votes = Result::where('candidate_id', $candidate)->get()->count();
        }
        $this->resultService->finalResult();
        return view('admin.dashboard',[
            'endElections' => $endElections,
            'candidates' => $candidates,
            'votes' => $votes,
        ]);
    }
}

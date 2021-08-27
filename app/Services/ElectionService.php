<?php

namespace App\Services;

use App\Models\Candidate;
use App\Models\Election;
use App\Repositories\ICandidateRepository;
use App\Repositories\IElectionRepository;
use App\Utils\ElectionHelper;

class ElectionService implements IElectionService{

    use ElectionHelper;
    private $electionRepository;
    private $candidateRepository;

    public function __construct(IElectionRepository $iElectionRepository, ICandidateRepository $iCandidateRepository)
    {
        $this->electionRepository = $iElectionRepository;
        $this->candidateRepository = $iCandidateRepository;
    }

    public function startElection($request)
    {
        if($this->hasNoCandidate())
        {
            notify()->error('No candidate exists');
            return redirect()->back();
        }
        $id = ElectionHelper::getCurrentElection();
        try {
            Election::find($id)->update([
                "status" => 1,
                "start" => date('Y-m-d H:i:s'),
                "name" => $request->name,
            ]);
            notify()->error('Elecetion started');
        } catch (\Throwable $th) {
            notify()->error('Election was not started');
        }
        
    }

    public function getStartElections()
    {
        return Election::whereNull('end')->get();
    }
    
    public function getEndElections()
    {
        return Election::whereNotNull('end')->get();
    }

    public function getElections()
    {
        return Election::whereNull('end')->with('candidates')->get();
    }

    public function endElection($request)
    {
        $id = ElectionHelper::getCurrentElection();
        try {
            Election::find($id)->update([
                "status" => 2,
                "end" => date('Y-m-d H:i:s'),
                "name" => $request->name,
            ]);
            Election::create();
            notify()->error('Elecetion started');
        } catch (\Throwable $th) {
            notify()->error('Election was not started');
        }
    }

    public function hasNoCandidate()
    {
        return Candidate::where('election_id', ElectionHelper::getCurrentElection())->count() < 1;
    }
}
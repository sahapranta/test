<?php

namespace App\Services;

use App\Models\Candidate;
use App\Models\Election;
use App\Models\Result;
use App\Repositories\IResultRepository;
use App\Utils\ElectionHelper;

class ResultService implements IResultService
{
    use ElectionHelper;
    private $resultRepository;
    private $candidateService;

    public function __construct(IResultRepository $iResultRepository, ICandidateService $iCandidateService)
    {
        $this->resultRepository = $iResultRepository;
        $this->candidateService = $iCandidateService;
    }
    public function storeVote($request)
    {
        $electionId = ElectionHelper::getCurrentElection();
        $candidateIds = $request->candidate_id;
        foreach($candidateIds as $candidateId){
            $candidate = Candidate::find($candidateId);
            $category = $candidate->category;
            return $this->resultRepository->create([
                'candidate_id' => $candidateId,
                'voter_id' => auth()->guard('voter')->user()->id,
                'election_id' => $electionId,
                'category_id' => $category->id,
            ]);
        }
    }

    public function finalResult()
    {
        $electionId = Election::where('end', '!=', null)->get();
        foreach ($electionId as $id) {
            $election = Election::find($id->id);
        }
        $candidates = Candidate::where('election_id', $election->id)->get();
        foreach($candidates as $candidate){
            $votes = Result::where('candidate_id', $candidate->id)->get()->count();
        }
    }
}
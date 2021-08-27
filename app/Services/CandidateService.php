<?php

namespace App\Services;

use App\Http\Requests\CandidateCreateRequest;
use App\Repositories\ICandidateRepository;
use App\Utils\ImageUplaodTrait;

class CandidateService implements ICandidateService
{
    use ImageUplaodTrait;
    private $candidateRepository;

    public function __construct(ICandidateRepository $iCandidateRepository)
    {
        $this->candidateRepository = $iCandidateRepository;
    }

    public function addCandidate($request)
    {
        try {
            $candidate = $this->candidateRepository->create([
                "name" => $request->name,
                "candidate_id" => $request->candidate_id,
                "slogan" => $request->slogan,
                "category_id" => $request->category_id,
                "election_id" => 1
            ]);
            if($request->hasFile('image')){
                $filePath = $this->imageUpload($request->image);
                $candidate->image = $filePath;
                $candidate->save();
            }
            notify()->success('Candidate added successfuly');
            return $candidate;
        } catch (\Throwable $th) {
            notify()->error('Candidate was not created');
        }
        
    }

    public function getAllCandidate()
    {
        return $this->candidateRepository->all();
    }

    public function updateCandidate($request, $id)
    {
        try {
            $candidate = $this->candidateRepository->find($id);
            $candidate->name = $request->name;
            $candidate->candidate_id = $request->candidate_id;
            $candidate->slogan = $request->slogan;
            $candidate->category_id = $request->category_id;
            if($request->hasFile('image')){
                $filePath = $this->imageUpload($request->image);
                $candidate->image = $filePath;
            }
            $candidate->save();
            notify()->success('Candidate updated successfuly');
            return $candidate;
        } catch (\Throwable $th) {
            notify()->error('Candidate was not updated');
        }
        
    }

    public function deleteCandidate($id)
    {
        return $this->candidateRepository->deleteById($id);
    }
}
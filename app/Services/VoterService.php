<?php

namespace App\Services;

use App\Repositories\IVoterRepository;
use Illuminate\Support\Facades\Hash;

class VoterService implements IVoterService{

    private $voterRepository;

    public function __construct(IVoterRepository $iVoterRepository)
    {
        $this->voterRepository = $iVoterRepository;
    }


    public function addVoter($request)
    {
        try {
            $this->voterRepository->create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
            notify()->success('Voter created successfuly');
        } catch (\Throwable $th) {
            notify()->error('Voter was not created');
        }
        
    }

    public function getAllVoters()
    {
        return $this->voterRepository->all();
    }

    public function updateVoter($request, $id)
    {
        try {
            $voter = $this->voterRepository->find($id);
            $voter->username = $request->username;
            $voter->password = Hash::make($request->password);
            $voter->save();
            notify()->success('Voter updated successfuly');
            return $voter;
        } catch (\Throwable $th) {
            notify()->error('Voter was not updated');
        }
        
    }

    public function deleteVoter($id)
    {
        try {
            $this->voterRepository->deleteById($id);
            notify()->success('Voter deleted successfuly');
        } catch (\Throwable $th) {
            notify()->error('Voter was not deleted');
        }
        
    }
}
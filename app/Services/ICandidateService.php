<?php

namespace App\Services;

use App\Http\Requests\CandidateCreateRequest;

interface ICandidateService
{
    public function addCandidate($request);
    public function getAllCandidate();
    public function updateCandidate($request, $id);
    public function deleteCandidate($id);
}
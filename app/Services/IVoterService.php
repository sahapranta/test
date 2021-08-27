<?php

namespace App\Services;

interface IVoterService
{
    public function addVoter($request);
    public function getAllVoters();
    public function updateVoter($request, $id);
    public function deleteVoter($id);
}
<?php

namespace App\Services;

interface IElectionService
{
    public function startElection($request);
    public function getStartElections();
    public function getEndElections();
    public function getElections();
    public function endElection($request);
}
<?php

namespace App\Services;

interface IResultService
{
    public function storeVote($request);
    public function finalResult();
}
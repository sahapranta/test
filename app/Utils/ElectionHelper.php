<?php

namespace App\Utils;

use App\Models\Election;
use App\Repositories\IElectionRepository;
use Opis\Closure\SelfReference;

trait ElectionHelper{

    public static function getCurrentElection()
    {
        return Election::where('id','>', 0)->orderBy('id', 'desc')->first()->id;
    }

    public static function getElectionStatus($id) 
    {
        return Election::find($id)->status;
    }
}
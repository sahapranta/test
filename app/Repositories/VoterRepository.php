<?php

namespace App\Repositories;

use App\Models\Voter;

class VoterRepository extends BaseRepository implements IVoterRepository{

    public function __construct(Voter $model)
    {
        parent::__construct($model);
    }
}
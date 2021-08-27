<?php 

namespace App\Repositories;

use App\Models\Election;

class ElectionRepository extends BaseRepository implements IElectionRepository{

    public function __construct(Election $model)
    {
        parent::__construct($model);
    }
}
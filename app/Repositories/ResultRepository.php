<?php

namespace App\Repositories;

use App\Models\Result;

class ResultRepository extends BaseRepository implements IResultRepository{

    public function __construct(Result $model)
    {
        parent::__construct($model);        
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'voter_id',
        'election_id',
        'category_id'
    ];


public function candidate()
{
return $this->belongsTo(Candidate::class);
}

public function election()
{
return $this->belongsTo(Election::class);
}




}

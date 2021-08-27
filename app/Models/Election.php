<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'start',
        'end',
        'name'
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
   
    public function results()
    {
	return $this->hasMany(Result::class);
    }
}

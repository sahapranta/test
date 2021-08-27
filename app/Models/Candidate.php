<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'candidate_id',
        'slogan',
        'image',
        'category_id',
        'election_id',
    ];

    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voting_result extends Model
{
    use HasFactory;

    protected $fillable = ['candidate_id', 'number_of_votes'];

}

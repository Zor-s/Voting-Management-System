<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ballot extends Model
{
    use HasFactory;
    protected $fillable = ['candidate_id', 'voter_id'];

}

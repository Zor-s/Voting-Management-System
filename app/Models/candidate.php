<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidate extends Model
{
    use HasFactory;

    protected $fillable = ['position_id', 'department_id', 'candidate_party_id', 'candidate_full_name'];

}

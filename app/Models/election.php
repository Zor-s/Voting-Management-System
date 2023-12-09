<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class election extends Model
{
    use HasFactory;
    protected $fillable = ['department_id', 'election_start', 'election_end'];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voter extends Model
{
    use HasFactory;
    protected $fillable = ['department_id', 'voter_username', 'voter_password', 'voter_email', 'voter_gender', 'voter_age'];

}

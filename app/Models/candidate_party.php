<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidate_party extends Model
{
    use HasFactory;
    protected $fillable = ['candidate_party_name'];

    public function candidate()
    {
        return $this->hasMany(candidate::class);
    }
}

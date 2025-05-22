<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['profile_id', 'answer'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
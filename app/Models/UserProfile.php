<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = ['name', 'slug', 'default_question'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}

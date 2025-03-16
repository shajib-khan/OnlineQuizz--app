<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuizAttempt extends Model
{
    protected $fillable=[
        'score',
        'user_id',
        'quiz_id',
    ];
}

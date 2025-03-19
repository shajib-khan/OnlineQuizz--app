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
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

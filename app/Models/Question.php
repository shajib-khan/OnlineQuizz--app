<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
   protected $fillable=[
    'question_text',
    'quiz_id',
   ];
   public function answers()
{
    return $this->hasMany(Answer::class,'question_id');
}

}

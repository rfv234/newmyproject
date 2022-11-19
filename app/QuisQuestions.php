<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class QuisQuestions extends Model
{
    public function answers()
    {
        return $this->hasMany(QuisAnswers::class);
    }
}
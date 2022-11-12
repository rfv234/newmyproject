<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Quis extends Model
{
    protected $table = 'quises';

    public function questions()
    {
        return $this->hasMany(QuisQuestions::class);
    }
}
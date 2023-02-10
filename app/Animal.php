<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animals';
    public function kind()
    {
        return $this->belongsTo(Kind::class);
    }
}
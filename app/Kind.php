<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    protected $table = 'kinds';
    public function animal()
    {
        return $this->hasMany(Animal::class);
    }
}
<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    protected $table = 'kinds';
    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
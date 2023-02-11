<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    public function city()
    {
        return $this->hasOne(City::class);
    }
}
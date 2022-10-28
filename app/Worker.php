<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    public function profession()
    {
        return $this->hasOne(Age::class, 'id', 'profession_id');
    }
}
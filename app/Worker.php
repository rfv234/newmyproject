<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    public function profession()
    {
        return $this->hasOne(Profession::class, 'id', 'profession_id');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    public function divisiperacara()
    {
        return $this->hasMany('App\Divisiperacara');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function acara()
    {
        return $this->hasMany('App\Acara');
    }
    protected $guarded = [];
}

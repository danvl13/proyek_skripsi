<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'kategori_id');
    }
    public function jadwal()
    {
        return $this->hasMany('App\Jadwal');
    }
    public function divisiperacara()
    {
        return $this->hasMany('App\Divisiperacara');
    }
    protected $guarded = [];
}

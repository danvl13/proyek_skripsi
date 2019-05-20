<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisiperacara extends Model
{
    protected $fillable=['kuota','acara_id','divisi_id'];
    public function acara()
    {
        return $this->belongsTo('App\Acara', 'acara_id');
    }
    public function divisi()
    {
        return $this->belongsTo('App\Divisi', 'divisi_id');
    }
}

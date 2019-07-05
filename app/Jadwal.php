<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable=['tgl_wawan','jam_wawan','tmpt_wawan','pewawancara','acara_id'];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function acara()
    {
        return $this->belongsTo('App\Acara', 'acara_id');
    }
    public function divisiperacara()
    {
        return $this->belongsTo('App\Divisiperacara', 'divisi_diterima');
    }
    public function divisipilihan1()
    {
        return $this->belongsTo('App\Divisiperacara', 'divisi_id1');
    }
    public function divisipilihan2()
    {
        return $this->belongsTo('App\Divisiperacara', 'divisi_id2');
    }
}

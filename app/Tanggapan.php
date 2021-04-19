<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapan';
    protected $fillable = ['id_aduan', 'tanggal', 'isi', 'id_petugas'];
    protected $primary_key = 'id';
    public $incrementing = false;

    public function aduan() 
    {
        return $this->belongsTo('App\Aduan', 'id_aduan','id');
    }

    public function petugas() 
    {
        return $this->belongsTo('App\Petugas', 'id_petugas','id');
    }
}


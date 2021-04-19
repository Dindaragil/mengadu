<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    protected $table = 'aduan';
    protected $fillable = ['tanggal', 'nik', 'isi', 'foto', 'status'];
    protected $primary_key = 'id';
    public $incrementing = false;

    public function nik()
    {
        return $this->belongsTo('App\User', 'nik', 'nik');
    }
}

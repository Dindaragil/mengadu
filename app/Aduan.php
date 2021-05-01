<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    protected $table = 'aduan';
    protected $fillable = ['tanggal', 'id_user', 'isi', 'foto', 'status'];
    protected $primary_key = 'id';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
    public function tanggapan() {
        return $this->hasMany('App\Tanggapan', 'id_aduan', 'id');
    }

}

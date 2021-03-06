<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'users';
    protected $fillable = ['email', 'password', 'nama', 'telp', 'type'];
    protected $primary_key = 'id';
    public $incrementing = false;
}

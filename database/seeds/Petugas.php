<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Petugas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Petugas::create([
                'id' => '1',
                'email' => 'inielon@musk.com',
                'password' => Hash::make('010203'),
                'nama' => 'Elon Musk',
                'telp' => '089876543210',
                'type' => 'petugas'
        ]);
    }
}

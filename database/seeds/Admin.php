<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Petugas::create([
            'id' => '2',
            'email' => 'inibill@gates.com',
            'password' => Hash::make('010203'),
            'nama' => 'Bill Gates',
            'telp' => '081234567890',
            'type' => 'admin'
    ]);
    }
}

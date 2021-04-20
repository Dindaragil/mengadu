<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aduan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            $table->char('nik', 16);
            $table->string('subjek');
            $table->longText('isi');
            $table->string('foto');
            $table->enum('status',['menunggu','diproses','diterima','ditolak']);
            $table->timestamps();
            
            $table->foreign('nik')->references('nik')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aduan');
    }
}

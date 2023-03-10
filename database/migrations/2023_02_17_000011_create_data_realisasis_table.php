<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataRealisasisTable extends Migration
{
    public function up()
    {
        Schema::create('data_realisasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kdsatker');
            $table->string('ba')->nullable();
            $table->string('baes_1')->nullable();
            $table->string('akun')->nullable();
            $table->string('program')->nullable();
            $table->string('kegiatan')->nullable();
            $table->string('output')->nullable();
            $table->string('kewenangan')->nullable();
            $table->string('sumber_dana')->nullable();
            $table->string('cara_tarik')->nullable();
            $table->string('kdregister')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('budget_type')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('amount')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

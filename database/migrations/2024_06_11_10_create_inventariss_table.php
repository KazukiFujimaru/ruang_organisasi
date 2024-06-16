<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarissTable extends Migration
{
    public function up()
    {
        Schema::create('inventariss', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('sebelum');
            $table->integer('ditambah');
            $table->integer('digunakan');
            $table->integer('sisa');
            $table->text('keterangan')->nullable();
            $table->binary('bukti')->nullable();
            $table->foreignId('organisasi_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inventariss');
    }
}

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('description')->nullable();
            $table->enum('type', ['program kerja','kegiatan']);
            $table->enum('jenis', ['harian', 'mingguan', 'bulanan', 'tahunan']);
            $table->enum('status', ['terlaksana', 'tidak terlaksana']);
            $table->date('tanggal');
            $table->string('dokumen')->nullable();
            $table->foreignId('organisasi_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('programs');
    }
}

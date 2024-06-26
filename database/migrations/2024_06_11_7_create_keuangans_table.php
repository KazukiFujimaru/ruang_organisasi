<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuangansTable extends Migration
{
    public function up()
    {
        Schema::create('keuangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis', ['pemasukan', 'pengeluaran']);
            $table->date('tanggal');
            $table->text('keterangan')->nullable();
            $table->decimal('jumlah', 10, 2);
            $table->decimal('saldo', 10, 2);
            $table->string('bukti')->nullable();
            $table->foreignId('organisasi_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('keuangans');
    }
}

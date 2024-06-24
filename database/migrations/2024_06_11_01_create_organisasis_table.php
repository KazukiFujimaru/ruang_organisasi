<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisasisTable extends Migration
{
    public function up()
    {
        Schema::create('organisasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nama_instansi');
            $table->string('nama_pembina');
            $table->text('deskripsi')->nullable();
            $table->text('sejarah')->nullable();
            $table->date('tanggal_disahkan')->nullable();
            $table->string('logo_organisasi')->nullable(); // Changed from binary to string
            $table->string('logo_instansi')->nullable(); // Changed from binary to string
            $table->string('ADART')->nullable(); // Changed from binary to string
            $table->string('KODE')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('organisasis');
    }
}

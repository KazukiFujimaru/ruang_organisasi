<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLogoAndAdartColumnsInOrganisasisTable extends Migration
{
    public function up()
    {
        Schema::table('organisasis', function (Blueprint $table) {
            // Mengubah kolom dari binary menjadi string
            $table->string('logo_organisasi')->nullable()->change();
            $table->string('logo_instansi')->nullable()->change();
            $table->string('ADART')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('organisasis', function (Blueprint $table) {
            // Mengubah kembali kolom dari string menjadi binary
            $table->binary('logo_organisasi')->nullable()->change();
            $table->binary('logo_instansi')->nullable()->change();
            $table->binary('ADART')->nullable()->change();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSaldoDefaultValueInKeuanganTable extends Migration
{
    public function up()
    {
        Schema::table('keuangans', function (Blueprint $table) {
            $table->decimal('saldo')->default(0)->change();
        });
    }

    public function down()
    {
        Schema::table('keuangans', function (Blueprint $table) {
            $table->decimal('saldo')->change();
        });
    }
}

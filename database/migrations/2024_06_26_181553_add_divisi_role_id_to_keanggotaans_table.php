<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDivisiRoleIdToKeanggotaansTable extends Migration
{
    public function up()
    {
        Schema::table('keanggotaans', function (Blueprint $table) {
            if (!Schema::hasColumn('keanggotaans', 'divisi_role_id')) {
                $table->bigInteger('divisi_role_id')->unsigned()->nullable()->after('role_id');
            }
        });

        // Isi nilai default atau yang sesuai di kolom baru
        DB::table('keanggotaans')->update(['divisi_role_id' => 1]); // Sesuaikan dengan nilai yang ada di tabel divisi_roles

        Schema::table('keanggotaans', function (Blueprint $table) {
            // Tambahkan constraint setelah data diperbarui
            $table->foreign('divisi_role_id')->references('id')->on('divisi_roles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('keanggotaans', function (Blueprint $table) {
            $table->dropForeign(['divisi_role_id']);
            $table->dropColumn('divisi_role_id');
        });
    }
}

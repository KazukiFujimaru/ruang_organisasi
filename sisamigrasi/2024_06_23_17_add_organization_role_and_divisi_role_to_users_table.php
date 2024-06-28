<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrganizationRoleAndDivisiRoleToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('organization_id')->nullable()->constrained('organisasis');
            $table->foreignId('role_id')->nullable()->constrained('roles');
            $table->foreignId('divisi_role_id')->nullable()->constrained('divisi_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
            $table->dropColumn('organization_id');

            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');

            $table->dropForeign(['divisi_role_id']);
            $table->dropColumn('divisi_role_id');
        });
    }
}

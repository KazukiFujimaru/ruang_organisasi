<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrganizationRoleAndDivisiRoleToUsersTable extends Migration
{

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

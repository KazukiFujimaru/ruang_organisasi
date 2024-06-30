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
            if (!Schema::hasColumn('users', 'organization_id')) {
                $table->bigInteger('organization_id')->unsigned()->nullable();
            }
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
        
            if (!Schema::hasColumn('users', 'role_id')) {
                $table->bigInteger('role_id')->unsigned()->nullable();
            }
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        
            if (!Schema::hasColumn('users', 'divisi_role_id')) {
                $table->bigInteger('divisi_role_id')->unsigned()->nullable();
            }
            $table->foreign('divisi_role_id')->references('id')->on('divisi_roles')->onDelete('cascade');
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
            if (Schema::hasColumn('users', 'organization_id')) {
                $table->dropForeign(['organization_id']);
                $table->dropColumn('organization_id');
            }
            if (Schema::hasColumn('users', 'role_id')) {
                $table->dropForeign(['role_id']);
                $table->dropColumn('role_id');
            }
            if (Schema::hasColumn('users', 'divisi_role_id')) {
                $table->dropForeign(['divisi_role_id']);
                $table->dropColumn('divisi_role_id');
            }
        });
        
    }
}

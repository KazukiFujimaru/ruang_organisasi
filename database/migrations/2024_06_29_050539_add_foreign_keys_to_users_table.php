<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'organization_id')) {
                $table->bigInteger('organization_id')->unsigned()->nullable();
            }
            $table->foreign('organization_id')->references('id')->on('organisasis')->onDelete('cascade');
        
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
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};

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
        Schema::table('tenant_invitations', function (Blueprint $table) {
            $table->dropColumn('id');
        });
        
        Schema::table('tenant_invitations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('email')->after('tenant_uuid');
            $table->string('role')->after('email');
            $table->string('token')->unique()->after('role');
            $table->timestamp('expires_at')->after('token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenant_invitations', function (Blueprint $table) {
            $table->dropColumn(['id', 'email', 'role', 'token', 'expires_at']);
        });
        
        Schema::table('tenant_invitations', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
        });
    }
};

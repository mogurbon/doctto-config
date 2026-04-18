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
            $table->string('email')->nullable()->change();
            $table->string('role')->nullable()->change();
            $table->string('token')->nullable()->change();
            $table->timestamp('expires_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenant_invitations', function (Blueprint $table) {
            $table->string('email')->nullable(false)->change();
            $table->string('role')->nullable(false)->change();
            $table->string('token')->nullable(false)->change();
            $table->timestamp('expires_at')->nullable(false)->change();
        });
    }
};

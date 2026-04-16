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
        Schema::create('workspace_settings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_uuid')->unique();
            $table->jsonb('agenda_rules')->default(json_encode([
                'min_notice_hours' => 24,
                'max_ahead_days' => 30,
                'cancel_limit_hours' => 12,
                'arrival_grace_minutes' => 15,
            ]));
            $table->jsonb('billing_info')->nullable();
            $table->boolean('onboarding_completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspace_settings');
    }
};

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MigrateTenantsToUuid extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-tenants-to-uuid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate existing tenant_id strings to tenant_uuid UUIDs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting migration of tenants to UUID...');

        DB::transaction(function () {
            // Get all unique tenant_ids from both tables
            $tenantIds = DB::table('users')
                ->select('tenant_id')
                ->whereNotNull('tenant_id')
                ->pluck('tenant_id')
                ->merge(
                    DB::table('tenant_invitations')
                        ->select('tenant_id')
                        ->whereNotNull('tenant_id')
                        ->pluck('tenant_id')
                )
                ->unique();

            foreach ($tenantIds as $tenantId) {
                $uuid = (string) Str::uuid();
                $this->line("Mapping tenant_id: {$tenantId} to UUID: {$uuid}");

                // Create Tenant record
                DB::table('tenants')->insert([
                    'id' => $uuid,
                    'name' => 'Tenant ' . $tenantId, // Placeholder name
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('users')
                    ->where('tenant_id', $tenantId)
                    ->update(['tenant_uuid' => $uuid]);

                DB::table('tenant_invitations')
                    ->where('tenant_id', $tenantId)
                    ->update(['tenant_uuid' => $uuid]);

                // Also initialize workspace settings for this tenant
                DB::table('workspace_settings')->insert([
                    'id' => (string) Str::uuid(),
                    'tenant_uuid' => $uuid,
                    'agenda_rules' => json_encode([
                        'min_notice_hours' => 24,
                        'max_ahead_days' => 30,
                        'cancel_limit_hours' => 12,
                        'arrival_grace_minutes' => 15,
                    ]),
                    'onboarding_completed' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });

        $this->info('Migration completed successfully.');
    }
}

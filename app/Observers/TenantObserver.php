<?php

namespace App\Observers;

use App\Models\Tenant;
use App\Models\WorkspaceSetting;

class TenantObserver
{
    /**
     * Handle the Tenant "created" event.
     */
    public function created(Tenant $tenant): void
    {
        WorkspaceSetting::create([
            'tenant_uuid' => $tenant->id,
            'agenda_rules' => [
                'min_notice_hours' => 24,
                'max_ahead_days' => 30,
                'cancel_limit_hours' => 12,
                'arrival_grace_minutes' => 15,
            ],
            'onboarding_completed' => false,
        ]);
    }
}

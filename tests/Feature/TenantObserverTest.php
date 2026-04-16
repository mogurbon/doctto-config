<?php

use App\Models\Tenant;
use App\Models\WorkspaceSetting;

test('it creates workspace settings when a new tenant is created', function () {
    $tenant = Tenant::create(['name' => 'New Medical Center']);

    $settings = WorkspaceSetting::where('tenant_uuid', $tenant->id)->first();

    expect($settings)->not->toBeNull();
    expect($settings->tenant_uuid)->toBe($tenant->id);
    expect($settings->agenda_rules['min_notice_hours'])->toBe(24);
});

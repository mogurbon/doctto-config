<?php

use App\Models\WorkspaceSetting;
use Illuminate\Support\Str;

test('it can persist and retrieve jsonb fields correctly', function () {
    $uuid = (string) Str::uuid();
    $agendaRules = [
        'min_notice_hours' => 48,
        'max_ahead_days' => 60,
        'cancel_limit_hours' => 24,
        'arrival_grace_minutes' => 30,
    ];
    $billingInfo = [
        'billing_email' => 'billing@example.com',
        'tax_regime_code' => '612',
        'payment_rule' => 'subscription',
        'accepted_payment_methods' => ['stripe', 'paypal'],
    ];

    $setting = WorkspaceSetting::create([
        'tenant_uuid' => $uuid,
        'agenda_rules' => $agendaRules,
        'billing_info' => $billingInfo,
        'onboarding_completed' => true,
    ]);

    $retrieved = WorkspaceSetting::find($setting->id);

    expect($retrieved->agenda_rules)->toBeArray()->toEqual($agendaRules);
    expect($retrieved->billing_info)->toBeArray()->toEqual($billingInfo);
    expect($retrieved->onboarding_completed)->toBeTrue();
    expect($retrieved->tenant_uuid)->toBe($uuid);
});

test('it has default agenda rules', function () {
    $uuid = (string) Str::uuid();
    $setting = WorkspaceSetting::create([
        'tenant_uuid' => $uuid,
        // agenda_rules not provided
    ]);

    expect($setting->agenda_rules)->toBeArray();
    expect($setting->agenda_rules['min_notice_hours'])->toBe(24);
});

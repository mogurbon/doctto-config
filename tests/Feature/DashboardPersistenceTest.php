<?php

use App\Models\Service;
use App\Models\User;
use App\Models\WorkspaceSetting;
use Illuminate\Support\Str;

test('dashboard can be saved with valid data', function () {
    $user = User::factory()->create([
        'tenant_uuid' => (string) Str::uuid(),
    ]);

    $payload = [
        'time_zone' => 'America/Mexico_City',
        'location' => [
            'name' => 'Consultorio Central',
            'address_full' => 'Av. Reforma 123, CDMX',
            'map_url' => 'https://maps.google.com',
            'parking_available' => true,
            'accessibility_wheelchair' => true,
            'accessibility_elevator' => false,
            'accessibility_ramps' => true,
            'accessibility_accessible_bathroom' => true,
        ],
        'facilities' => [
            'has_waiting_room' => true,
            'waiting_room_capacity' => 10,
            'facility_notes' => 'Café disponible',
        ],
        'doctor' => [
            'profile' => [
                'name' => 'Dr. Gregory House',
                'specialty' => 'Diagnóstico',
                'age_min' => 18,
                'age_max' => 99,
            ],
            'contact' => [
                'phone' => '5512345678',
                'email' => 'house@example.com',
                'preferred' => 'whatsapp',
            ],
            'hours' => [
                'lunes' => [['start' => '09:00', 'end' => '17:00']],
            ],
            'rules' => [
                'min_notice' => 2,
                'max_ahead' => 30,
            ],
            'policies' => [
                'cancel_notice' => 24,
                'arrival_tolerance' => 15,
            ],
            'payments' => [
                'methods' => ['cash', 'card'],
                'collection_rule' => 'at_reception',
            ],
            'billing' => [
                'email' => 'billing@example.com',
                'limit_hours' => 72,
                'regime' => 'Resico',
            ],
            'services' => [
                [
                    'name' => 'Consulta General',
                    'duration_minutes' => 30,
                    'pricing_type' => 'fixed',
                    'price' => 500,
                    'requires_fasting' => false,
                    'arrive_minutes_before' => 10,
                    'includes' => [],
                    'required_documents' => [],
                    'medications_to_suspend' => [],
                    'useful_links' => [],
                ],
            ],
        ],
    ];

    $response = $this->actingAs($user)
        ->post(route('dashboard.store'), $payload);

    $response->assertRedirect();
    $response->assertSessionHas('success');

    // Verificar nombre del usuario
    expect($user->fresh()->name)->toBe('Dr. Gregory House');

    // Verificar servicios
    expect(Service::where('tenant_uuid', $user->tenant_uuid)->count())->toBe(1);
    expect(Service::where('tenant_uuid', $user->tenant_uuid)->first()->name)->toBe('Consulta General');

    // Verificar WorkspaceSetting
    $settings = WorkspaceSetting::where('tenant_uuid', $user->tenant_uuid)->first();
    expect($settings->onboarding_completed)->toBeTrue();
    expect($settings->agenda_rules['profile_summary']['name'])->toBe('Dr. Gregory House');
    expect($settings->billing_info['regime'])->toBe('Resico');
});

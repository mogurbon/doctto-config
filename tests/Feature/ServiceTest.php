<?php

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

test('it can create a service with basic info', function () {
    $tenantUuid = (string) Str::uuid();

    $service = Service::create([
        'tenant_uuid' => $tenantUuid,
        'name' => 'Consulta General',
        'duration_minutes' => 30,
        'pricing_type' => 'fixed',
        'price' => 500.00,
    ]);

    expect($service->id)->not->toBeNull()
        ->and($service->tenant_uuid)->toBe($tenantUuid)
        ->and($service->name)->toBe('Consulta General')
        ->and($service->price)->toBe('500.00');
});

test('it can store and retrieve JSON fields correctly', function () {
    $tenantUuid = (string) Str::uuid();
    $documents = ['INE', 'CURP', 'Receta previa'];

    $service = Service::create([
        'tenant_uuid' => $tenantUuid,
        'name' => 'Estudio Especializado',
        'duration_minutes' => 60,
        'required_documents' => $documents,
        'requires_fasting' => true,
    ]);

    $foundService = Service::find($service->id);

    expect($foundService->required_documents)->toBe($documents)
        ->and($foundService->requires_fasting)->toBeTrue();
});

test('it enforces pricing exclusivity: quote clears price', function () {
    $tenantUuid = (string) Str::uuid();

    $service = Service::create([
        'tenant_uuid' => $tenantUuid,
        'name' => 'Cirugía Compleja',
        'duration_minutes' => 120,
        'pricing_type' => 'quote',
        'price' => 10000.00, // This should be cleared
        'quote_notes' => 'Depende de la evaluación inicial',
    ]);

    expect($service->price)->toBeNull()
        ->and($service->quote_notes)->toBe('Depende de la evaluación inicial');
});

test('it enforces pricing exclusivity: fixed clears quote_notes', function () {
    $tenantUuid = (string) Str::uuid();

    $service = Service::create([
        'tenant_uuid' => $tenantUuid,
        'name' => 'Consulta express',
        'duration_minutes' => 15,
        'pricing_type' => 'fixed',
        'price' => 200.00,
        'quote_notes' => 'Should be cleared',
    ]);

    expect($service->price)->toBe('200.00')
        ->and($service->quote_notes)->toBeNull();
});

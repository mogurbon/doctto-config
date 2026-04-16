<?php

use App\Models\TenantInvitation;
use Illuminate\Support\Str;
use Carbon\Carbon;

test('it creates a tenant invitation with new fields and uuid pk', function () {
    $uuid = (string) Str::uuid();
    $token = Str::random(64);
    $expiresAt = now()->addDays(7);

    $invitation = TenantInvitation::create([
        'tenant_uuid' => $uuid,
        'email' => 'test@example.com',
        'role' => 'doctor',
        'token' => $token,
        'expires_at' => $expiresAt,
        'is_used' => false,
    ]);

    expect($invitation->id)->toBeUuid();
    expect($invitation->email)->toBe('test@example.com');
    expect($invitation->role)->toBe('doctor');
    expect($invitation->token)->toBe($token);
    expect($invitation->expires_at->toDateTimeString())->toBe($expiresAt->toDateTimeString());
});

test('it correctly identifies expired invitations', function () {
    $invitation = TenantInvitation::factory()->create([
        'expires_at' => now()->subDay(),
    ]);

    expect($invitation->isExpired())->toBeTrue();
    expect($invitation->isValid())->toBeFalse();
});

test('it correctly identifies valid invitations', function () {
    $invitation = TenantInvitation::factory()->create([
        'expires_at' => now()->addDay(),
        'is_used' => false,
    ]);

    expect($invitation->isExpired())->toBeFalse();
    expect($invitation->isValid())->toBeTrue();
});

test('it identifies used invitations as invalid', function () {
    $invitation = TenantInvitation::factory()->create([
        'expires_at' => now()->addDay(),
        'is_used' => true,
    ]);

    expect($invitation->isValid())->toBeFalse();
});

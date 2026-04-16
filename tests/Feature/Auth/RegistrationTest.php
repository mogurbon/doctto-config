<?php

use App\Models\TenantInvitation;
use Illuminate\Support\Str;

test('registration screen can be rendered via setup route', function () {
    $uuid = (string) Str::uuid();
    $invitation = TenantInvitation::factory()->create([
        'tenant_uuid' => $uuid,
        'email' => 'test@example.com',
    ]);

    $response = $this->get("/setup/{$uuid}");

    $response->assertStatus(200);
});

test('new users can register with valid invitation', function () {
    $uuid = (string) Str::uuid();
    $email = 'test@example.com';
    $invitation = TenantInvitation::factory()->create([
        'tenant_uuid' => $uuid,
        'email' => $email,
    ]);

    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => $email,
        'password' => 'password',
        'password_confirmation' => 'password',
        'tenant_uuid' => $uuid,
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
    
    expect($invitation->fresh()->is_used)->toBeTrue();
});

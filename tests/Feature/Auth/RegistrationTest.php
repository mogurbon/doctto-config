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

    $this->assertDatabaseHas('users', [
        'email' => $email,
        'tenant_uuid' => $uuid,
    ]);
});

test('registration fails if email does not match invitation', function () {
    $uuid = (string) Str::uuid();
    $invitation = TenantInvitation::factory()->create([
        'tenant_uuid' => $uuid,
        'email' => 'correct@example.com',
    ]);

    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'wrong@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'tenant_uuid' => $uuid,
    ]);

    $response->assertSessionHasErrors(['tenant_uuid']);
    $this->assertGuest();
});

test('registration fails with invalid tenant_uuid', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'tenant_uuid' => 'not-a-uuid',
    ]);

    $response->assertSessionHasErrors(['tenant_uuid']);
});

test('registration fails with non-existent tenant_uuid', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'tenant_uuid' => (string) Str::uuid(),
    ]);

    $response->assertSessionHasErrors(['tenant_uuid']);
});

<?php

namespace Tests\Feature;

use App\Models\TenantInvitation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class OpenLinkInvitationTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_invitation_with_only_tenant_uuid(): void
    {
        $uuid = (string) Str::uuid();

        $response = $this->postJson(route('invitations.store'), [
            'tenant_uuid' => $uuid,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'tenant_uuid' => $uuid,
                'is_used' => false,
            ]);

        $this->assertDatabaseHas('tenant_invitations', [
            'tenant_uuid' => $uuid,
            'email' => null,
            'role' => null,
            'is_used' => false,
        ]);
    }

    public function test_tenant_uuid_must_be_required_and_uuid_format(): void
    {
        $response = $this->postJson(route('invitations.store'), [
            'tenant_uuid' => 'not-a-uuid',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['tenant_uuid']);
            
        $response = $this->postJson(route('invitations.store'), []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['tenant_uuid']);
    }

    public function test_tenant_uuid_must_be_unique_in_invitations(): void
    {
        $uuid = (string) Str::uuid();

        TenantInvitation::create([
            'tenant_uuid' => $uuid,
            'is_used' => false,
        ]);

        $response = $this->postJson(route('invitations.store'), [
            'tenant_uuid' => $uuid,
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['tenant_uuid']);
    }
}

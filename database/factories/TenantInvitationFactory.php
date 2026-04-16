<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TenantInvitation>
 */
class TenantInvitationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tenant_uuid' => (string) Str::uuid(),
            'email' => $this->faker->safeEmail(),
            'role' => $this->faker->randomElement(['admin', 'doctor', 'receptionist']),
            'token' => Str::random(64),
            'expires_at' => now()->addDays(7),
            'is_used' => false,
        ];
    }
}

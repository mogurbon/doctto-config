<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkspaceSetting>
 */
class WorkspaceSettingFactory extends Factory
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
            'agenda_rules' => [
                'min_notice_hours' => 24,
                'max_ahead_days' => 30,
                'cancel_limit_hours' => 12,
                'arrival_grace_minutes' => 15,
            ],
            'billing_info' => [
                'billing_email' => $this->faker->safeEmail(),
                'tax_regime_code' => '601',
                'payment_rule' => 'direct',
                'accepted_payment_methods' => ['card', 'cash'],
            ],
            'onboarding_completed' => false,
        ];
    }
}

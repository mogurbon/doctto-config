<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkspaceSetting extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tenant_uuid',
        'agenda_rules',
        'billing_info',
        'onboarding_completed',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'agenda_rules' => '{"min_notice_hours": 24, "max_ahead_days": 30, "cancel_limit_hours": 12, "arrival_grace_minutes": 15}',
        'onboarding_completed' => false,
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'agenda_rules' => 'array',
            'billing_info' => 'array',
            'onboarding_completed' => 'boolean',
        ];
    }
}

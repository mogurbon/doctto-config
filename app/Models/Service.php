<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tenant_uuid',
        'doctor_id',
        'name',
        'category',
        'duration_minutes',
        'is_blocked',
        'pricing_type',
        'price',
        'quote_notes',
        'limitations',
        'requires_fasting',
        'arrive_minutes_before',
        'includes',
        'required_documents',
        'medications_to_suspend',
        'useful_links',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_blocked' => 'boolean',
            'requires_fasting' => 'boolean',
            'duration_minutes' => 'integer',
            'arrive_minutes_before' => 'integer',
            'price' => 'decimal:2',
            'includes' => 'array',
            'required_documents' => 'array',
            'medications_to_suspend' => 'array',
            'useful_links' => 'array',
        ];
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::saving(function (Service $service) {
            if ($service->pricing_type === 'quote') {
                $service->price = null;
            } else {
                $service->quote_notes = null;
            }
        });
    }
}

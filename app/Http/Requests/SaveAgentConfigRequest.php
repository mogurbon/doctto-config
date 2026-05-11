<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveAgentConfigRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'time_zone' => 'required|string',

            // Location
            'location.name' => 'required|string|max:255',
            'location.address_full' => 'required|string',
            'location.map_url' => 'nullable|url',
            'location.parking_available' => 'boolean',
            'location.accessibility_wheelchair' => 'boolean',
            'location.accessibility_elevator' => 'boolean',
            'location.accessibility_ramps' => 'boolean',
            'location.accessibility_accessible_bathroom' => 'boolean',

            // Facilities
            'facilities.has_waiting_room' => 'boolean',
            'facilities.waiting_room_capacity' => 'integer|min:0',
            'facilities.facility_notes' => 'nullable|string',

            // Doctor Profile
            'doctor.profile.name' => 'required|string|max:255',
            'doctor.profile.specialty' => 'required|string|max:255',
            'doctor.profile.age_min' => 'required|integer|min:0',
            'doctor.profile.age_max' => 'required|integer|max:120',

            // Doctor Contact
            'doctor.contact.phone' => 'required|string',
            'doctor.contact.email' => 'required|email',
            'doctor.contact.preferred' => 'required|in:whatsapp,phone,email',

            // Availability (Hours)
            'doctor.hours' => 'required|array',
            'doctor.hours.*' => 'array',
            'doctor.hours.*.*' => 'array',
            'doctor.hours.*.*.start' => 'required|string|regex:/^\d{2}:\d{2}$/',
            'doctor.hours.*.*.end' => 'required|string|regex:/^\d{2}:\d{2}$/|after:doctor.hours.*.*.start',

            // Rules & Policies
            'doctor.rules.min_notice' => 'required|integer|min:1',
            'doctor.rules.max_ahead' => 'required|integer|min:1',
            'doctor.policies.cancel_notice' => 'required|integer|min:0',
            'doctor.policies.arrival_tolerance' => 'required|integer|min:0',

            // Payments
            'doctor.payments.methods' => 'required|array|min:1',
            'doctor.payments.collection_rule' => 'required|string',

            // Billing
            'doctor.billing.email' => 'nullable|email',
            'doctor.billing.limit_hours' => 'required|integer|min:0',
            'doctor.billing.regime' => 'nullable|string',

            // Services
            'doctor.services' => 'present|array',
            'doctor.services.*.name' => 'required|string|max:255',
            'doctor.services.*.category' => 'nullable|string',
            'doctor.services.*.duration_minutes' => 'required|integer|min:1',
            'doctor.services.*.pricing_type' => 'required|in:fixed,quote',
            'doctor.services.*.price' => 'required_if:doctor.services.*.pricing_type,fixed|nullable|numeric|min:0',
            'doctor.services.*.quote_notes' => 'nullable|string',
            'doctor.services.*.requires_fasting' => 'boolean',
            'doctor.services.*.arrive_minutes_before' => 'integer|min:0',
            'doctor.services.*.includes' => 'array',
            'doctor.services.*.required_documents' => 'array',
            'doctor.services.*.medications_to_suspend' => 'array',
            'doctor.services.*.useful_links' => 'array',
        ];
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveAgentConfigRequest;
use App\Models\Service;
use App\Models\WorkspaceSetting;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AgentConfigController extends Controller
{
    public function index()
    {
        // Por ahora solo retornamos la vista.
        // En el futuro, aquí recibiremos el tenant_jid para prellenar datos.
        return Inertia::render('Dashboard');
    }

    public function store(SaveAgentConfigRequest $request)
    {
        $validated = $request->validated();
        $user = $request->user();
        $tenantUuid = $user->tenant_uuid;

        DB::transaction(function () use ($validated, $user, $tenantUuid) {
            // 2.3 Actualizar el nombre del usuario
            $user->update([
                'name' => $validated['doctor']['profile']['name'],
            ]);

            // 2.4 Sincronización de servicios
            Service::where('tenant_uuid', $tenantUuid)->delete();

            foreach ($validated['doctor']['services'] as $serviceData) {
                Service::create(array_merge($serviceData, [
                    'tenant_uuid' => $tenantUuid,
                    'doctor_id' => $user->id, // Asumimos que el usuario actual es el doctor
                ]));
            }

            // 2.5 Actualizar WorkspaceSetting
            $workspaceSetting = WorkspaceSetting::firstOrCreate(
                ['tenant_uuid' => $tenantUuid],
                ['onboarding_completed' => false]
            );

            $workspaceSetting->update([
                'agenda_rules' => [
                    'time_zone' => $validated['time_zone'],
                    'location' => $validated['location'],
                    'facilities' => $validated['facilities'],
                    'availability' => $validated['doctor']['hours'],
                    'rules' => $validated['doctor']['rules'],
                    'policies' => $validated['doctor']['policies'],
                    'payments' => $validated['doctor']['payments'],
                    'contact' => $validated['doctor']['contact'],
                    'profile_summary' => $validated['doctor']['profile'],
                ],
                'billing_info' => $validated['doctor']['billing'],
                'onboarding_completed' => true,
            ]);
        });

        return back()->with('success', 'Configuración guardada correctamente.');
    }
}

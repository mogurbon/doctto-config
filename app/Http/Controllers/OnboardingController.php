<?php

namespace App\Http\Controllers;

use App\Models\TenantInvitation;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OnboardingController extends Controller
{
    public function checkTenant($tenant_id)
    {
        // 1. Busca en el modelo TenantInvitation si existe el tenant_id
        $invitation = TenantInvitation::where('tenant_id', $tenant_id)->first();

        if (!$invitation) {
            abort(404, 'Enlace inválido');
        }

        // 2. Verifica en la tabla users local si ya hay un usuario con ese tenant_id
        $userExists = User::where('tenant_id', $tenant_id)->exists();

        if ($userExists) {
            return redirect()->route('login');
        }

        // 3. Si no existe, retorna la vista Auth/Register de Inertia
        return Inertia::render('Auth/Register', [
            'tenant_id' => $tenant_id
        ]);
    }
}

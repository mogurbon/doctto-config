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
        $invitation = TenantInvitation::where('tenant_id', $tenant_id)->first();

        // Si NO existe el número en la base de datos -> Mandar al Login
        if (!$invitation) {
            return redirect()->route('login')->with('status', 'Invitación no encontrada.');
        }

        // Si la invitación YA fue usada -> Mandar al Login
        if ($invitation->is_used) {
            return redirect()->route('login')->with('status', 'Esta invitación ya fue utilizada.');
        }

        // Verifica si por alguna razón el usuario ya existe con ese tenant -> Mandar al Login
        $userExists = User::where('tenant_id', $tenant_id)->exists();
        if ($userExists) {
            return redirect()->route('login')->with('status', 'Ya tienes una cuenta activa.');
        }

        // Si todo está bien y el número es válido -> Mostrar el Formulario de Registro
        return Inertia::render('Auth/Register', [
            'tenant_id' => $tenant_id
        ]);
    }
}

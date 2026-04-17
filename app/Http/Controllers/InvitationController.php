<?php

namespace App\Http\Controllers;

use App\Models\TenantInvitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function store(Request $request)
    {
        
        $request->validate([
            'tenant_uuid' => 'required|uuid|unique:tenant_invitations,tenant_uuid',
        ]);

        // 2. Guardamos exactamente el UUID que mandó tu sistema externo
        $invitation = TenantInvitation::create([
            'tenant_uuid' => $request->tenant_uuid,
            'is_used' => false,
        ]);

        return response()->json($invitation, 201);
    }
}

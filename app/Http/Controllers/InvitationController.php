<?php

namespace App\Http\Controllers;

use App\Models\TenantInvitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tenant_id' => 'required|string|unique:tenant_invitations,tenant_id',
        ]);

        $invitation = TenantInvitation::create([
            'tenant_id' => $request->tenant_id,
            'is_used' => false,
        ]);

        return response()->json($invitation, 201);
    }
}

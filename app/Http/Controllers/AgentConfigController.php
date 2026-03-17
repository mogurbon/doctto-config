<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
class AgentConfigController extends Controller
{
    public function index()
    {
        // Por ahora solo retornamos la vista. 
        // En el futuro, aquí recibiremos el tenant_jid para prellenar datos.
        return Inertia::render('Dashboard');
    }
}

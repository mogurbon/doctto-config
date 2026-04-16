<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AgentConfigController;

use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/setup/{tenant_uuid}', [OnboardingController::class, 'checkTenant'])->name('onboarding.setup');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

// Redirige todo el tráfico de la raíz directamente a la pantalla de login
Route::redirect('/', '/login');

Route::get('/dashboard', [AgentConfigController::class, 'index'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

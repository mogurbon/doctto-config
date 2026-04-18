<?php

use App\Http\Controllers\InvitationController;
use Illuminate\Support\Facades\Route;

Route::post('/invitations', [InvitationController::class, 'store'])->name('invitations.store');

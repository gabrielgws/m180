<?php

use App\Http\Controllers\GroupController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

/* ROTAS GRUPOS */

Route::middleware(['auth'])->group(function () {
    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');

    Route::get('/groups/index', [GroupController::class, 'index'])
        ->middleware('can:create-group')
        ->name('groups.index');

    Route::get('/groups/create', [GroupController::class, 'create'])
        ->middleware('can:create-group')
        ->name('groups.create');

    Route::get('/groups/{grupo}', [GroupController::class, 'show'])
        ->middleware('can:view-group')
        ->name('groups.show');
});

/* end.rotas_grupos */

require __DIR__ . '/auth.php';

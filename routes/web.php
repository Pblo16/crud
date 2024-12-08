<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\PersonalData;
use App\Livewire\Pages\Users;

Route::get('/', Home::class)->name('home');
Route::get('/users', Users::class)->name('users.show');
Route::get('/personal-data', PersonalData::class)->name('personal-data.show');

Route::get('/api/documentation', function () {
    $documentation = 'default';
    $urlToDocs = url('/api/docs');
    $useAbsolutePath = true;
    return view('l5-swagger::index', compact('documentation', 'urlToDocs', 'useAbsolutePath'));
})->name('api.documentation');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        redirect()->route('api.documentation');
    })->name('dashboard');
});

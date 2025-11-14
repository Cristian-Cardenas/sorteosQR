<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroParticipanteController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/', '/admin');
Route::get('/qr/{slug}', [RegistroParticipanteController::class, 'create'])
    ->name('participante.form');

Route::post('/qr/{slug}', [RegistroParticipanteController::class, 'store'])
    ->name('participante.store');
<?php

use App\Http\Controllers\TesteController;
use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste/{nome}', function ($name) {
    $data = [
        'name' => $name,
        'idade' => 20
    ];
    return view('teste', $data);
});

Route::get('/calcula-idade/{nascimento}/{nome}', [TesteController::class, 'teste']);

<<<<<<< HEAD
Route::get('/contato/', [ContatoController::class, 'mostrarDataDeHoje'])->name("contato");
=======
Route::get('/contato/', [ContatoController::class, 'mostrarDataDeHoje'])->name("contato");
>>>>>>> ff8a8ab084d655de4dc946811501250188d2a0b3

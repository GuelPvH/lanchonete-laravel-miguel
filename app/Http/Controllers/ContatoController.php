<?php

namespace App\Http\Controllers;

class ContatoController extends Controller
{
    public function mostrarDataDeHoje(){
        return date('d/m/Y');
    }
}

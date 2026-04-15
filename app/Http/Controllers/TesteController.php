<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste($nascimento, $nome){
        $data =  [
            "nasc" => $nascimento,
            "nome" => $nome
        ];
        return view('calcula-idade', $data);
    }
}

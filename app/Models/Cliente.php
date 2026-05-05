<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    protected $table = 'clientes';

    protected $fillable = ['nome', 'email', 'cpf', 'numero', 'senha'];

    protected $hidden = [
        'password'
    ];
}

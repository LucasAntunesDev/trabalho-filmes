<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
    use HasFactory;

    function getAuthIdentifierName() {
        return 'id';
    }
    function getAuthIdentifier() {
        return $this->id;
    }
    function getAuthPassword() {
        return $this->senha;
    }
    function getRememberToken() {
        
    }
    function setRememberToken($value) {

    }
    function getRememberTokenName() {

    }

    protected $fillable = [
        'nome',
        'usuario',
        'senha',
        'imagem',
        'admin',
    ];

}

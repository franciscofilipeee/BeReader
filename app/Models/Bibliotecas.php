<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bibliotecas extends Model
{
    use HasFactory;

    protected $table = 'bibliotecas';

    protected $fillable = [
        'nome',
        'logradouro',
        'cidade',
        'bairro',
        'estado',
        'cep',
        'escola',
        'user_id'
    ];

    public function fotos()
    {
        return $this->hasMany(BibliotecaFotos::class, 'biblioteca_id', 'id');
    }
}

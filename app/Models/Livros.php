<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    use HasFactory;

    protected $table = 'livros';

    protected $fillable = [
        'nome',
        'autor_id',
        'capa',
        'sinopse',
        'tema_id',
        'nota_media'
    ];

    public function autor()
    {
        return $this->belongsTo(Autores::class, 'autor_id', 'id');
    }

    public function tema()
    {
        return $this->belongsTo(TemasLivros::class, 'tema_id', 'id');
    }
}

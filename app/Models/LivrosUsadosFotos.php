<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivrosUsadosFotos extends Model
{
    use HasFactory;

    protected $table = 'livros_usados';

    protected $fillable = [
        'usado_id',
        'foto'
    ];
}

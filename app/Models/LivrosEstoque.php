<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivrosEstoque extends Model
{
    use HasFactory;

    protected $table = 'livros_estoque';

    protected $fillable = [
        'estoque',
        'biblioteca_id',
        'livro_id'
    ];
}

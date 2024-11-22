<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimos extends Model
{
    use HasFactory;

    protected $table = 'emprestimos';

    protected $fillable = [
        'livro_id',
        'user_id',
        'biblioteca_id',
        'inicio',
        'final'
    ];

    public function livro()
    {
        return $this->hasOne(Livros::class, "id", "livro_id");
    }

    public function biblioteca()
    {
        return $this->hasOne(Bibliotecas::class, "user_id", "biblioteca_id");
    }
}

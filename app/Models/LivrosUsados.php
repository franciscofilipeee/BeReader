<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivrosUsados extends Model
{
    use HasFactory;

    protected $table = 'livros_usados';

    protected $fillable = [
        'user_id',
        'livro_id'
    ];

    public function livro()
    {
        return $this->hasOne(Livros::class, "id", "livro_id");
    }
}

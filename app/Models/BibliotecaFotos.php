<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BibliotecaFotos extends Model
{
    use HasFactory;

    protected $table = 'biblioteca_fotos';

    protected $fillable = [
        'foto',
        'biblioteca_id'
    ];
}

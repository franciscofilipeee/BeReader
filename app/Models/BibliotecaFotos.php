<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BibliotecaFotos extends Model
{
    use HasFactory;

    protected $table = 'biblioteca_fotos';

    protected $fillable = [
        'foto',
        'biblioteca_id'
    ];

    public function getFotoAttribute($value)
    {
        return env('APP_URL') . Storage::url($value);
    }
}

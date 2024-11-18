<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curtidos extends Model
{
    use HasFactory;

    protected $table = 'curtidos';

    protected $fillable = [
        'avaliacao_id',
        'user_id',
        'curtidos'
    ];
}

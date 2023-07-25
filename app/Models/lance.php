<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lance extends Model
{
    use HasFactory;
    protected $casts = [
        'config' => 'array',
    ];
    protected $fillable = [
        'token',
        'leilao_id',
        'author',
        'valor_lance',
        'ativo',
        'obs',
        'type',
        'config',
        'excluido',
        'reg_excluido',
        'deletado',
        'reg_deletado',
    ];
}

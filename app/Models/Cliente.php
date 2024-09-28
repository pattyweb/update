<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'sexo',
        'endereco',
        'email',
        'telefone',
        'cidade_id', // chave estrangeira
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}

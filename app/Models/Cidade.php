<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    // Relacionamento com clientes
    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'cep',
        'livro_id'
    ];


    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}

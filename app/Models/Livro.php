<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'endereco_id',
        'editora',
        'ano_de_publicacao',
        'descricao',
        'paginas',
        'isbn',
        'capa',
    ];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}

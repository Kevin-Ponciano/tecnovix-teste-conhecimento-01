<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'editora',
        'ano_de_publicacao',
        'descricao',
        'paginas',
        'isbn',
        'capa',
    ];

    public function ano_de_publicacao()
    {
        return Carbon::createFromFormat('Y-m-d', $this->ano_de_publicacao)->format('d-m-Y');
    }
}

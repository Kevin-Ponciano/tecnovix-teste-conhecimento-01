<?php

namespace App\Http\Controllers;


use App\Models\Livros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LivroController extends Controller
{
    public function searchBookAPI($isbn)
    {
        return HTTP::withOptions([
            'verify' => storage_path('app/certificados/GTS Root R1.crt'),
        ])->get("https://www.googleapis.com/books/v1/volumes?q=isbn:$isbn")['items'];
    }

    public function store(Request $request)
    {
        $livro = $this->searchBookAPI($request['isbn']);
        $editora = $livro[0]['volumeInfo']['publisher'];
        $ano_de_publicacao = $livro[0]['volumeInfo']['publishedDate'];
        $descricao = $livro[0]['volumeInfo']['description'];
        $paginas = $livro[0]['volumeInfo']['pageCount'];

        $capa = $request['capa']->getClientOriginalName();
        $request->file('capa')->storeAs('capas', $capa, 'public');

        Livros::updateOrCreate(['id' => $request['id']], [
            'titulo' => $request['titulo'],
            'autor' => $request['autor'],
            'editora' => $editora,
            'ano_de_publicacao' => $ano_de_publicacao,
            'descricao' => $descricao,
            'paginas' => $paginas,
            'isbn' => $request['isbn'],
            'capa' => $capa,
        ]);

        return redirect()->route('home');
    }

    public function edit($id)
    {
        $livro = Livros::find($id);
        return view('livro.edit', compact('livro'));
    }

    public function show()
    {
        $livros = Livros::all();
        return view('livro.show', compact('livros'));
    }
}
// Comentario do que foi feito:


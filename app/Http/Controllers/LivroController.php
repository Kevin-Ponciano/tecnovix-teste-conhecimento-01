<?php

namespace App\Http\Controllers;


use App\Models\Endereco;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LivroController extends Controller
{
    public function searchBookAPI($isbn)
    {
        $response = HTTP::withOptions([
            'verify' => storage_path('app/certificados/GTS Root R1.crt'),
        ])->get("https://www.googleapis.com/books/v1/volumes?q=isbn:$isbn");

        if ($response['totalItems'] != 1) {
            $validator = Validator::make([], []);
            $validator->errors()->add('isbn', 'O ISBN informado é inválido.');
            throw new ValidationException($validator);
        } else {
            return $response['items'][0]['volumeInfo'];
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'cep' => 'required',
            'isbn' => 'required|unique:livros,isbn',
            'capa' => 'required|image|max:2048',
        ]);

        $livro = $this->searchBookAPI($request['isbn']);
        $editora = $livro['publisher'] ?? 'Não informado';
        $ano_de_publicacao = $livro['publishedDate'] ?? 'Não informado';
        $descricao = $livro['description'] ?? 'Não informado';
        $paginas = $livro['pageCount'] ?? 'Não informado';

        $capa = $request['isbn'] . '_' . $request['capa']->getClientOriginalName();
        $request->file('capa')->storeAs('capas', $capa, 'public');

        $endereco = Endereco::create([
            'rua' => $request['rua'],
            'numero' => $request['numero'],
            'bairro' => $request['bairro'],
            'cidade' => $request['cidade'],
            'uf' => $request['uf'],
            'cep' => $request['cep'],
        ]);

        Livro::create([
            'titulo' => $request['titulo'],
            'autor' => $request['autor'],
            'endereco_id' => $endereco->id,
            'editora' => $editora,
            'ano_de_publicacao' => $ano_de_publicacao,
            'descricao' => $descricao,
            'paginas' => $paginas,
            'isbn' => $request['isbn'],
            'capa' => $capa,
        ]);

        session()->flash('success', "Livro registrado com sucesso!");
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $livro = Livro::findOrFail($id);
        return view('livro.edit', compact('livro'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'cep' => 'required',
            'capa' => 'image|max:2048',
        ]);


        Endereco::updated([
            'id' => $request['endereco_id'],
            'rua' => $request['rua'],
            'numero' => $request['numero'],
            'bairro' => $request['bairro'],
            'cidade' => $request['cidade'],
            'uf' => $request['uf'],
            'cep' => $request['cep'],
        ]);

        $livro = Livro::find($id);
        if ($request->hasFile('capa')) {
            \Storage::delete('public/capas/' . $livro->capa);
            $capa = $livro->isbn . '_' . $request['capa']->getClientOriginalName();
            $request->file('capa')->storeAs('capas', $capa, 'public');
        } else {
            $capa = $livro->capa;
        }

        $livro->update([
            'titulo' => $request['titulo'],
            'autor' => $request['autor'],
            'capa' => $capa,
        ]);

        session()->flash('success', "Livro atualizado com sucesso!");
        return redirect()->route('books');
    }

    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        \Storage::delete('public/capas/' . $livro->capa);
        $livro->delete();
        session()->flash('success', "Livro excluído com sucesso!");
        return redirect()->route('books');
    }

    public function show($id)
    {
        $livro = Livro::findOrFail($id);

        return view('livro.show', compact('livro'));
    }

    public function books()
    {
        $livros = Livro::all();
        return view('livro.list', compact('livros'));
    }
}

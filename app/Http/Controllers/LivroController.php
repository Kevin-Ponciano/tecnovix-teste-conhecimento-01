<?php

namespace App\Http\Controllers;


use App\Models\Endereco;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LivroController extends Controller
{
    // Metodo da API
    public function getBook($isbn)
    {
        $livro = Livro::where('isbn', $isbn)->first();
        if ($livro) {
            return response()->json($livro);
        } else {
            $livroApi = $this->searchBookAPI($isbn);
            $capa = 'capas/' . $isbn . '.jpeg';
            Storage::put($capa, file_get_contents($livroApi['imageLinks']['smallThumbnail']));
            $livro = Livro::create([
                'titulo' => $livroApi['title'] ?? 'Não informado',
                'autor' => $livroApi['authors'][0] ?? 'Não informado',
                'isbn' => $isbn,
                'editora' => $livroApi['publisher'] ?? 'Não informado',
                'ano_de_publicacao' => $livroApi['publishedDate'] ?? 'Não informado',
                'descricao' => $livroApi['description'] ?? 'Não informado',
                'paginas' => $livroApi['pageCount'] ?? 'Não informado',
                'capa' => $capa,
            ]);
            return response()->json($livro);
        }
    }

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
            'rua' => 'required',
            'numero' => 'numeric',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'cep' => 'required',
            'isbn' => 'required|unique:livros,isbn',
            'capa' => 'required|image|max:2048',
        ]);

        $livro = $this->searchBookAPI($request['isbn']);
        $titulo = $livro['title'] ?? 'Não informado';
        $autor = $livro['authors'][0] ?? 'Não informado';
        $editora = $livro['publisher'] ?? 'Não informado';
        $ano_de_publicacao = $livro['publishedDate'] ?? 'Não informado';
        $descricao = $livro['description'] ?? 'Não informado';
        $paginas = $livro['pageCount'] ?? 'Não informado';
        $capa = 'capas/' . $request['isbn'] . '_' . $request['capa']->getClientOriginalName();

        Livro::create([
            'titulo' => $titulo,
            'autor' => $autor,
            'editora' => $editora,
            'ano_de_publicacao' => $ano_de_publicacao,
            'descricao' => $descricao,
            'paginas' => $paginas,
            'isbn' => $request['isbn'],
            'capa' => $capa,
        ]);

        Endereco::create([
            'rua' => $request['rua'],
            'numero' => $request['numero'] ?? 'S/N',
            'bairro' => $request['bairro'],
            'cidade' => $request['cidade'],
            'uf' => $request['uf'],
            'cep' => $request['cep'],
            'livro_id' => Livro::where('isbn', $request['isbn'])->first()->id,
        ]);

        $request->file('capa')->storeAs('', $capa);

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
            'editora' => 'required',
            'ano_de_publicacao' => 'required',
            'paginas' => 'required|numeric',
            'autor' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'cep' => 'required',
            'capa' => 'image|max:2048',
        ]);

        $livro = Livro::find($id);
        if ($request->hasFile('capa')) {
            Storage::disk()->delete($livro->capa);
            $capa = 'capas/' . $livro->isbn . '_' . $request['capa']->getClientOriginalName();
            $request->file('capa')->storeAs('', $capa);
        } else {
            $capa = $livro->capa;
        }

        $livro->update([
            'titulo' => $request['titulo'],
            'editora' => $request['editora'],
            'ano_de_publicacao' => $request['ano_de_publicacao'],
            'paginas' => $request['paginas'],
            'descricao' => $request['descricao'],
            'autor' => $request['autor'],
            'capa' => $capa,
        ]);
        $livro->endereco()->updateOrCreate(['id' => $livro->endereco->id ?? null,], [
            'rua' => $request['rua'],
            'numero' => $request['numero'],
            'bairro' => $request['bairro'],
            'cidade' => $request['cidade'],
            'uf' => $request['uf'],
            'cep' => $request['cep'],
        ]);

        session()->flash('success', "Livro atualizado com sucesso!");
        return redirect()->route('books');
    }

    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        Storage::disk()->delete($livro->capa);
        if ($livro->endereco)
            $livro->endereco->delete();
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

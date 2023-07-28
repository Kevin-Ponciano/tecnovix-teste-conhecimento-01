<x-app>
    <div class="page-body">
        <div class="container-narrow">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Atualizar Livro</h3>
                </div>
                <x-post-livro
                    :action="route('update', $livro->id)"
                    method="PUT"
                    :id="$livro->id"
                    :titulo="$livro->titulo"
                    :autor="$livro->autor"
                    :isbn="$livro->isbn"
                    :capa="$livro->capa"
                    :cep="$livro->endereco->cep"
                    :rua="$livro->endereco->rua"
                    :numero="$livro->endereco->numero"
                    :bairro="$livro->endereco->bairro"
                    :cidade="$livro->endereco->cidade"
                    :uf="$livro->endereco->uf"
                />
            </div>
        </div>
    </div>
</x-app>

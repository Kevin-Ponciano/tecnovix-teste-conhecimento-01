<x-app>
    <div class="page-body">
        <div class="container-narrow">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Atualizar Livro</h3>
                </div>
                <x-post-livro
                    :id="$livro->id"
                    :titulo="$livro->titulo"
                    :autor="$livro->autor"
                    :isbn="$livro->isbn"
                    :capa="$livro->capa"
                />
            </div>
        </div>
    </div>
</x-app>

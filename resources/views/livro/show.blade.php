<x-app>
    <div class="page-body">
        <div class="container">
            <div class="card-body">
                <div class="d-grid">
                    <h2 class="mb-4">{{$livro->titulo}}</h2>
                    <div class="row">
                        <div class="col-auto">
                            <span class="avatar avatar-2xl"
                                  style="background-image: url('{{Storage::temporaryUrl($livro->capa,now())}}')">
                            </span>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <div class="form-label">Autor</div>
                                <p>{{$livro->autor}}</p>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Editora</div>
                                <p>{{$livro->editora}}</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <div class="form-label">Ano de Publicação</div>
                                <p>{{$livro->ano_de_publicacao}}</p>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Páginas</div>
                                <p>{{$livro->paginas}}</p>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">ISBN</div>
                                <p>{{$livro->isbn}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h2>Descrição</h2>
                        <p>{{$livro->descricao}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <a href="{{route('edit', $livro->id)}}" class="btn btn-primary">
                            Editar
                        </a>
                    </div>
                    <div class="col-auto">
                        <form action="{{route('destroy', $livro->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-ghost-danger">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>

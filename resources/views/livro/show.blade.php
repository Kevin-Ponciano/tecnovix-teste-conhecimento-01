<x-app>
    <div class="page-body">
        <div class="container-narrow">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Livros Cadastrados</h3>
                </div>
                <div class="list-group list-group-flush overflow-auto" style="max-height: 30rem">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                            <tr>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Ano de Publicação</th>
                                <th>ISBN</th>
                                <th class="w-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($livros as $livro)
                                <tr>
                                    <td>
                                        <div class="d-flex py-1 align-items-center">
                                            <span class="avatar me-2"
                                                  style="background-image: url(./static/avatars/006m.jpg)"></span>
                                            <div class="flex-fill">
                                                <div class="font-weight-medium">{{$livro->titulo}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>{{$livro->autor}}</div>
                                    </td>
                                    <td class="text-muted">
                                        {{$livro->ano_de_publicacao()}}
                                    </td>
                                    <td class="text-muted">
                                        {{$livro->isbn}}
                                    </td>
                                    <td>
                                        <button
                                            onclick="window.location.href = '{{route('edit', $livro->id)}}'"
                                            class="btn btn-primary">Editar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>

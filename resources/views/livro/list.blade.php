<x-app>
    <div class="page-body">
        <div class="container">
            <div class="card">
                <div class="card-header mb-1">
                    <h3 class="card-title">Livros Cadastrados</h3>
                </div>
                <div class="list-group list-group-flush overflow-auto">
                    <div class="table-responsive">
                        <table id="table" class="table table-vcenter card-table table-hover">
                            <thead>
                            <tr class="text-center">
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Editora</th>
                                <th>ISBN</th>
                                <th class="w-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($livros as $livro)
                                <tr class="text-center cursor-pointer"
                                    onclick="window.location.href='{{route('show',$livro->id)}}'">
                                    <td>
                                        <div class="d-flex py-1 align-items-center">
                                            <span class="avatar me-2 avatar-lg"
                                                  style="background-image: url('{{Storage::disk()->temporaryUrl('capas/' . $livro->capa,now())}}')"></span>
                                            <div class="flex-fill text-start">
                                                <div class="font-weight-medium">{{$livro->titulo}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>{{$livro->autor}}</div>
                                    </td>
                                    <td>
                                        <div>{{$livro->editora}}</div>
                                        <div class="text-muted">
                                            <div>Ano de Publicação</div>
                                            <span>{{$livro->ano_de_publicacao}}</span>
                                        </div>
                                    </td>
                                    <td class="text-muted">
                                        {{$livro->isbn}}
                                    </td>
                                    <td>
                                        <div class="d-grid gap-1">
                                            <a
                                                href="{{route('edit', $livro->id)}}"
                                                class="btn btn-primary btn-sm">Editar
                                            </a>
                                            <form action="{{route('destroy', $livro->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                            </form>
                                        </div>
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

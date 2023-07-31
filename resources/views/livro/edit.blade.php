<x-app>
    <div class="page-body">
        <div class="container-narrow">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Atualizar Livro</h3>
                </div>
                <form action="{{route('update',$livro->id)}}" method="POST" class="card-body"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-2">
                            <label class="form-label">ID</label>
                            <input type="text" class="form-control w-50" name="id" value="{{$livro->id}}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label">Título</label>
                            <input type="text" class="form-control @error('titulo') is-invalid @enderror"
                                   name="titulo"
                                   value="{{old('titulo')??$livro->titulo}}">
                            @error('titulo') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-6">
                            <label class="form-label">ISBN</label>
                            <input type="text" class="form-control" name="isbn" disabled
                                   value="{{$livro->isbn}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            <label class="form-label">Editora</label>
                            <input type="text" class="form-control @error('editora') is-invalid @enderror"
                                   name="editora"
                                   value="{{old('editora')??$livro->editora}}">
                            @error('editora') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-5">
                            <label class="form-label">Ano de Publicação</label>
                            <input type="date" class="form-control @error('ano_de_publicacao') is-invalid @enderror"
                                   name="ano_de_publicacao"
                                   value="{{old('ano_de_publicacao')??$livro->ano_de_publicacao}}">
                            @error('ano_de_publicacao') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-2">
                            <label class="form-label">Páginas</label>
                            <input type="text" class="form-control @error('paginas') is-invalid @enderror"
                                   name="paginas"
                                   value="{{old('paginas')??$livro->paginas}}">
                            @error('paginas') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Descrição</label>
                            <textarea name="descricao" class="form-control" cols="0"
                                      rows="2">
                                {{old('descricao')??$livro->descricao}}
                            </textarea>
                        </div>
                    </div>
                    <fieldset class="form-fieldset">
                        <h4>Informações do Autor</h4>
                        <div class="row mb-3">
                            <div class="col-8">
                                <label class="form-label">Nome do Autor</label>
                                <input type="text" class="form-control @error('autor') is-invalid @enderror"
                                       name="autor"
                                       value="{{old('autor')??$livro->autor}}">
                                @error('autor') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <h5>Endereço</h5>
                            <div class="col-3">
                                <label class="form-label">CEP</label>
                                <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror"
                                       name="cep"
                                       value="{{old('cep')??$livro->endereco->cep??""}}">
                                @error('cep') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-7">
                                <label class="form-label">Rua</label>
                                <input id="rua" type="text" class="form-control @error('rua') is-invalid @enderror"
                                       name="rua"
                                       value="{{old('rua')??$livro->endereco->rua??""}}">
                                @error('rua') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">Número</label>
                                <input id="numero" type="text"
                                       class="form-control @error('numero') is-invalid @enderror" name="numero"
                                       value="{{old('numero')??$livro->endereco->numero??""}}">
                                @error('numero') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5">
                                <label class="form-label">Bairro</label>
                                <input id="bairro" type="text"
                                       class="form-control @error('bairro') is-invalid @enderror" name="bairro"
                                       value="{{old('bairro')??$livro->endereco->bairro??""}}">
                                @error('bairro') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-5">
                                <label class="form-label">Cidade</label>
                                <input id="cidade" type="text"
                                       class="form-control @error('cidade') is-invalid @enderror" name="cidade"
                                       value="{{old('cidade')??$livro->endereco->cidade??""}}">
                                @error('cidade') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">Estado</label>
                                <input id="uf" type="text" class="form-control @error('uf') is-invalid @enderror"
                                       name="uf"
                                       value="{{old('uf')??$livro->endereco->uf??""}}">
                                @error('uf') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </fieldset>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label">Capa</label>
                            <input type="file" class="form-control @error('capa') is-invalid @enderror" name="capa"
                                   accept="image/*">
                            @error('capa') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</x-app>

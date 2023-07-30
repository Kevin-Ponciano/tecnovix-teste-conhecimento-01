<x-app>
    <div class="page-body">
        <div class="container-narrow">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cadastrar Livro</h3>
                </div>
                <form action="{{route('store')}}" method="POST" class="card-body" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label">ISBN</label>
                            <input type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn"
                                   value="{{old('isbn')}}">
                            @error('isbn') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <fieldset class="form-fieldset">
                        <h4>Informações de Endereço do Autor</h4>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="form-label">CEP</label>
                                <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror"
                                       name="cep"
                                       value="{{old('cep')}}">
                                @error('cep') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-7">
                                <label class="form-label">Rua</label>
                                <input id="rua" type="text" class="form-control @error('rua') is-invalid @enderror"
                                       name="rua"
                                       value="{{old('rua')}}">
                                @error('rua') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">Número</label>
                                <input id="numero" type="text"
                                       class="form-control @error('numero') is-invalid @enderror" name="numero"
                                       value="{{old('numero')}}">
                                @error('numero') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5">
                                <label class="form-label">Bairro</label>
                                <input id="bairro" type="text"
                                       class="form-control @error('bairro') is-invalid @enderror" name="bairro"
                                       value="{{old('bairro')}}">
                                @error('bairro') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-5">
                                <label class="form-label">Cidade</label>
                                <input id="cidade" type="text"
                                       class="form-control @error('cidade') is-invalid @enderror" name="cidade"
                                       value="{{old('cidade')}}">
                                @error('cidade') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">Estado</label>
                                <input id="uf" type="text" class="form-control @error('uf') is-invalid @enderror"
                                       name="uf"
                                       value="{{old('uf')}}">
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
                    <button type="submit" class="btn btn-primary">Registrar Livro</button>
                </form>
            </div>
        </div>
    </div>
</x-app>

<form action="{{$action}}" method="POST" class="card-body" enctype="multipart/form-data">
    @csrf
    @method($method??'POST')
    @if($id??false)
        <div class="row mb-3">
            <div class="col-2">
                <label class="form-label">ID</label>
                <input type="text" class="form-control w-50" name="id" value="{{$id}}" readonly>
                <input type="hidden" name="endereco_id" value="{{$endereco_id??""}}">
            </div>
        </div>
    @endif
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Título</label>
            <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo"
                   value="{{old('titulo')??$titulo??""}}">
            @error('titulo') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col">
            <label class="form-label">ISBN</label>
            <input type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn"
                   @if($method??false) disabled @endif
                   value="{{old('isbn')??$isbn??""}}">
            @error('isbn') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
    <fieldset class="form-fieldset">
        <h4>Informações do Autor</h4>
        <div class="row mb-3">
            <div class="col-8">
                <label class="form-label">Nome do Autor</label>
                <input type="text" class="form-control @error('autor') is-invalid @enderror" name="autor"
                       value="{{old('autor')??$autor??""}}">
                @error('autor') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row mb-3">
            <h5>Endereço</h5>
            <div class="col-3">
                <label class="form-label">CEP</label>
                <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror" name="cep"
                       value="{{old('cep')??$cep??""}}">
                @error('cep') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>
            <div class="col-7">
                <label class="form-label">Rua</label>
                <input id="rua" type="text" class="form-control @error('rua') is-invalid @enderror" name="rua"
                       value="{{old('rua')??$rua??""}}">
                @error('rua') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>
            <div class="col">
                <label class="form-label">Número</label>
                <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero"
                       value="{{old('numero')??$numero??""}}">
                @error('numero') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-5">
                <label class="form-label">Bairro</label>
                <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro"
                       value="{{old('bairro')??$bairro??""}}">
                @error('bairro') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>
            <div class="col-5">
                <label class="form-label">Cidade</label>
                <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade"
                       value="{{old('cidade')??$cidade??""}}">
                @error('cidade') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>
            <div class="col">
                <label class="form-label">Estado</label>
                <input id="uf" type="text" class="form-control @error('uf') is-invalid @enderror" name="uf"
                       value="{{old('uf')??$uf??""}}">
                @error('uf') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>
        </div>
    </fieldset>
    <div class="row mb-3">
        <div class="col-6">
            <label class="form-label">Capa</label>
            <input type="file" class="form-control @error('capa') is-invalid @enderror" name="capa" accept="image/*"
                   value="{{$capa??""}}">
            @error('capa') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

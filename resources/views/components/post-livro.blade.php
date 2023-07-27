<form action="{{ route('store') }}" method="post" class="card-body" enctype="multipart/form-data">
    @csrf
    @if($id??false)
        <div class="row mb-3">
            <div class="col-2">
                <label class="form-label">ID</label>
                <input type="text" class="form-control w-50" name="id" value="{{$id}}" readonly>
            </div>
        </div>
    @endif
    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" value="{{$titulo??""}}">
        </div>
        <div class="col">
            <label class="form-label">Autor</label>
            <input type="text" class="form-control" name="autor" value="{{$autor??""}}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label class="form-label">ISBN</label>
            <input type="text" class="form-control" name="isbn" value="{{$isbn??""}}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label class="form-label">Capa</label>
            <input type="file" class="form-control" name="capa" accept="image/*" value="{{$capa??""}}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

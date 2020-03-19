
    @include('dashboard.partials.validation-error')
    @csrf
    <div class="form-group">
        <label for="titulo">Título</label>
        <input
            type="text"
            class="form-control"
            name="titulo"
            id="titulo"
            placeholder="Escribe el título"
            value="{{old('titulo',$category->titulo)}}"
        />
        @error('titulo')
            <small class="text-danger">
                {{$message}}
            </small>
        @enderror
    </div>
    <div class="form-group">
        <label for="url_clean">Url limpia</label>
        <input
            type="text"
            class="form-control"
            name="url_clean"
            id="url_clean"
            placeholder="Escribe la url limpia"
    value="{{old('url_clean',$category->url_clean)}}"
        />
    </div>
  

<form action="{{ route('post.store') }}" method="put">
    @include('dashboard.partials.validation-error')
    @csrf
    <div class="form-group">
        <label for="title">Título</label>
        <input
            type="text"
            class="form-control"
            name="title"
            id="title"
            placeholder="Escribe el título"
            value="{{old('title')}}"
        />
        @error('title')
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
    value="{{old('url_clean')}}"
        />
    </div>
    <div class="form-group">
        <label for="content">Contenido</label>
        <textarea
            class="form-control"
            name="content"
            id="content"
            rows="3"
           
        >
        {{old('content')}}
    </textarea>
        @error('content')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>
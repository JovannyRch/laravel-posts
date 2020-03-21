
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
            value="{{old('title',$post->title)}}"
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
    value="{{old('url_clean',$post->url_clean)}}"
        />
    </div>

    <div class="form-group">
      <label for="category_id">Seleccina una categoría</label>

      <select class="form-control" name="category_id" id="category_id">
        <option value=""  disabled>Selecciona una categoría</option>
        @foreach ($categories as $titulo => $id)
            <option {{$post->category_id==$id? 'selected="selected"':''}} value="{{$id}}">{{$titulo}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="posted">Posted</label>
      <select class="form-control" name="posted" id="posted">
        @include('dashboard.partials.option-yes-not', ['val' => $post->posted])
      </select>
    </div>
    <div class="form-group">
        <label for="content">Contenido</label>
        <textarea
            class="form-control"
            name="content"
            id="editor"
        >
        {{old('content',$post->content)}}
    </textarea>
        @error('content')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>

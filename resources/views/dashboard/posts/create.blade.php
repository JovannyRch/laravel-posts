<script src="{{asset("js/app.js")}}"></script>
<form action="{{ route('post.store') }}" method="post">
<link rel="stylesheet" href="{{asset("css/app.css")}}">
<div id="app" class="container ">
    @if ($errors->any)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $e)
                {{$e}}
            @endforeach
        </div>
    @endif
    @csrf
    <div class="form-group">
        <label for="title">Título</label>
        <input
            type="text"
            class="form-control"
            name="title"
            id="title"
            placeholder="Escribe el título"
        />
    </div>
    <div class="form-group">
        <label for="ulr_clean">Url limpia</label>
        <input
            type="text"
            class="form-control"
            name="ulr_clean"
            id="ulr_clean"
            placeholder="Escribe la url limpia"
        />
    </div>
    <div class="form-group">
        <label for="content">Contenido</label>
        <textarea
            class="form-control"
            name="content"
            id="content"
            rows="3"
        ></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>

</div>
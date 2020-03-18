@extends('dashboard.master')
@section('content')
<div class="form-group">
    <label for="title">Título</label>
    <input
        type="text"
        class="form-control"
        name="title"
        id="title"
        placeholder="Escribe el título"
        value="{{$post->title}}"
        readonly
    />
 
</div>
<div class="form-group">
    <label for="url_clean">Url limpia</label>
    <input
        type="text"
        class="form-control"
        name="url_clean"
        id="url_clean"
        placeholder="Escribe la url limpia"
        readonly
value="{{$post->urlclean}}"
    />
</div>
<div class="form-group">
    <label for="content">Contenido</label>
    <textarea
        class="form-control"
        name="content"
        id="content"
        rows="3"
        readonly
       
    >
    {{$post->content}}
</textarea>
 
</div>
@endsection
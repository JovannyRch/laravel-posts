@extends('dashboard.master') @section('content')
<a
    name=""
    id=""
    class="btn btn-primary float-right"
    href="{{ route('post.create') }}"
    role="button"
    >Nuevo Post</a
>
<br>
<br />
<table class="table ">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Título</th>
            <th scope="col">Descripción</th>
            <th scope="col">Posted</th>
            <th scope="col">Creación</th>
            <th scope="col">Actualización</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>{{$post->posted}}</td>
            <td>{{$post->created_at->format('d-m-Y')}}</td>
            <td>{{$post->updated_at->format('d-m-Y')}}</td>
            <td>
            <a type="button" href="{{route('post.show',$post->id)}}" class="btn btn-outline-primary">
                    Ver
                </a>
                <a type="button" href="{{route('post.edit',$post->id)}}" class="btn btn-outline-warning">
                    Editar
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div  style="margin: 0 auto;">
    {{$posts->links()}}
</div>
@endsection

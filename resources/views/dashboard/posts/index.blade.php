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
            <th scope="col">Categoría</th>
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
            <td>{{$post->category->titulo}}</td>
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
            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#eliminarPost" data-action="{{route('post.destroy','')}}" data-id="{{$post->id}}" >Eliminar</button>

             
               
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div  style="margin: 0 auto;">
    {{$posts->links()}}
</div>


<!-- Modal -->
<div class="modal fade" id="eliminarPost" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Confirmar eliminación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    ¿Estás seguro de eliminar el registro seleccionado?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                
                <form  id="deleteForm" action="{{route('post.destroy',0)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                
            </div>
        </div>
    </div>
</div>

<script>
 window.onload(function(event){
    $('#eliminarPost').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var id = button.data('id') 
        var action = button.data('action') 
        console.log(action+"/"+id);
        $('#deleteForm').attr('action', action+"/"+id);
        var modal = $(this)
        modal.find('.modal-title').text('Estás seguro de eliminar el registro: ' + id)
        
    }) 
 })
</script>

@endsection

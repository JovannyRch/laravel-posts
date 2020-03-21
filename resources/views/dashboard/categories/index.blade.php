@extends('dashboard.master') @section('content')
<a
    name=""
    id=""
    class="btn btn-primary "
    href="{{ route('category.create') }}"
    role="button"
    >Nueva Categoría</a
>
<br><br>
<table class="table">
    <thead class="thead-dark">
        <th>Id</th>
        <th>Título</th>
        <th>URL Clean</th>
        <th>
            Acciones
        </th>
    </thead>
    @forelse ($categories as $c)
    <tr>
        <td>{{$c->id}}</td>
        <td>{{$c->titulo}}</td>
        <td>{{$c->url_clean}}</td>
        <td>
            <a href="{{route('category.edit',$c)}}" type="button" class="btn btn-outline-warning">Editar</a>
            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#eliminarForm" data-action="{{route('category.destroy','')}}" data-id="{{$c->id}}" data-titulo="{{$c->titulo}}" >Eliminar</button>

             
        </td>
    </tr>
    @empty
    <div class="alert alert-info">
        No hay registros
    </div>
    @endforelse
</table>
{{$categories->links()}}

<!-- Modal -->
<div class="modal fade" id="eliminarForm" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Confirmar eliminación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid" id="modal-mensaje">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                
                <form  id="deleteForm" action="{{route('category.destroy',0)}}" method="post">
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
        
        $('#eliminarForm').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var id = button.data('id') 
            var titulo = button.data('titulo') 
            var action = button.data('action') 
            console.log(action+"/"+id);
            $('#deleteForm').attr('action', action+"/"+id);
            var modal = $(this)
            $('#modal-mensaje').html("¿Estás seguro de eliminar la categoría '" + titulo+"'?")
        
        });
    })
  </script>
@endsection

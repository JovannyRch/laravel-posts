@extends('dashboard.master') @section('content')
<a
    name=""
    id=""
    class="btn btn-primary float-right"
    href="{{ route('user.create') }}"
    role="button"
    >Nuevo Usuario</a
>
<br>
<br />
<table class="table ">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Correo</th>
           {{--  <th scope="col">Tipo de usuario</th> --}}
            <th scope="col">Creación</th>
            <th scope="col">Actualización</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->surname}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at->format('d-m-Y')}}</td>
            <td>{{$user->updated_at->format('d-m-Y')}}</td>
            <td>
            <a type="button" href="{{route('user.show',$user->id)}}" class="btn btn-outline-primary">
                    Ver
                </a>
                <a type="button" href="{{route('user.edit',$user->id)}}" class="btn btn-outline-warning">
                    Editar
                </a>
            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#delete-user" data-action="{{route('user.destroy','')}}" data-name="{{$user->name}}"  data-id="{{$user->id}}" >Eliminar</button>

             
               
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div  style="margin: 0 auto;">
    {{$users->links()}}
</div>


<!-- Modal -->
<div class="modal fade" id="delete-user" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                
                <form  id="deleteForm" action="{{route('user.destroy',0)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                
            </div>
        </div>
    </div>
</div>

<script>
 window.onload = function(event){
     console.log("Hola");
    $('#delete-user').on('show.bs.modal', function (event) {
        console.log("hola");
        var button = $(event.relatedTarget) 
        var id = button.data('id') 
        var action = button.data('action') 
        var name = button.data('name') 
        console.log(action+"/"+id);
        $('#deleteForm').attr('action', action+"/"+id);
        var modal = $(this)
        modal.find('.container-fluid').text('Estás seguro de eliminar el usuario: ' + name )
        
    }) 
 };
</script>

@endsection

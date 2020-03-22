@extends('dashboard.master')
@section('content')
<div id="app" class=" ">
    
    <form action="{{ route('user.update',$user->id) }}" method="post">
        @method('PUT')
        @include('dashboard.users._form')
        <button type="submit" class="btn btn-success">Actualizar usuario</button>
    </form>
  

</div>
@endsection
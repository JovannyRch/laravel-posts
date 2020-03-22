@extends('dashboard.master')
@section('content')
<div id="app" class=" ">
    <form action="{{ route('user.store') }}" method="post">
        @include('dashboard.users._form')
        <button type="submit" class="btn btn-success">Crear usuario</button>
    </form>

</div>
@endsection
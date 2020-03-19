@extends('dashboard.master')
@section('content')
    <form method="POST" action="{{route('category.store')}}">
        @include('dashboard.categories._form')
        <button type="submit" class="btn btn-primary">Crear</button>

    </form>
    
@endsection
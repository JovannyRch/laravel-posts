@extends('dashboard.master')
@section('content')
<form action="{{route('category.update',$category->id)}}" method="post">
    @method('PUT')
    @include('dashboard.categories._form')
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
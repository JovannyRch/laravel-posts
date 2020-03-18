@extends('dashboard.master')
@section('content')
<div id="app" class=" ">
    <form action="{{ route('post.store') }}" method="post">
    @include('dashboard.posts._form')
    </form>

</div>
@endsection
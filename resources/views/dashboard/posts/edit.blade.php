@extends('dashboard.master')
@section('content')
<div id="app" class=" ">
    
    <form action="{{ route('post.update',$post->id) }}" method="post">
        @method('PUT')
        @include('dashboard.posts._form')
    </form>

</div>
@endsection
@extends('dashboard.master')
@section('content')
<div id="app" class=" ">
    
    <form action="{{ route('post.update',$post->id) }}" method="post">
        @method('PUT')
        @include('dashboard.posts._form')
    </form>
    <br><br>
    <form action="{{ route('post.image',$post) }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="row">
          <div class="col-8">
            <div class="form-group">
                <label for="image">Archivo</label>
                <input type="file" class="form-control-file" name="image" id="image" placeholder="Subir foto" aria-describedby="fileHelpId">
              
              </div>
          </div>
          <div class="col-4">
              <button type="submit" class="btn btn-success">Subir</button>
          </div>
      </div>
    </form>

</div>
@endsection
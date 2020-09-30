@extends('layouts.app')
@section('content')

<div class="row">
      <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                 <h2>Editar post</h2>
           </div>
     </div>
</div>   

@if ($errors->any())
  <div class="alert alert-danger">
    <strong>Ops!</strong>existem problemas com os dados recebidos <br><br>
    <ul>
      @foreach($errors->all() as $error)
      <li>
        {{$error}}
       </li>
       @endforeach
    </ul>
  </div>
@endif



<form action="{{ route('posts.update' , $post->id) }}" method="POST">

@csrf
@method( 'PUT')

<div class="col">
  <div class="col">
    <div class="form-group">
      <strong>Title: </strong>
      <input type="text" name="title" class="form-control" value="{{$post->title}}" required="" maxlength="255"/>
    </div>
  </div>
</div>

<div class="col">
  <div class="col">
    <div class="form-group">
      <strong>Body: </strong>
       <textarea  class="form-control" name="body" required="">{{$post->body}}</textarea>
    </div>
  </div>
</div>

<div class="row">
  <div class="col text-center">
    <button type="submit" class="btn col btn-primary">Cadastrar</button>
  </div>
</div>
   

</form>



@endsection
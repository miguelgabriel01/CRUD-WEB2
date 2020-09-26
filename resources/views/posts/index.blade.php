@extends('layouts.app')
@section('content')
<div class="row">
      <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                 <h2>Post criados</h2>
           </div>
     </div>
</div>   

@if(session('success'))
<div class="alert alert-success">
  {{session('success')}}
</div>
@endif

<div class="d-flex flex-row d-flex justify-content-start">
<div class="card" style="width: 18rem;">
  @foreach($posts as $post )
  <div class="card-body">
    <h5 class="card-title">{{$post->id}}</h5>
    <a href="{{url('/posts/{$pots->id}') }}" class="card-link">{{$post->title}}</a>
    <p class="card-text">{{$post->body}}</p><br>

   <form action="{{route('posts.destroy',$post->id)}}" method="POST">
   <a href="{{route('posts.show',$post->id)}}" class="btn btn-info">Exibir</a>
    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Editar</a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Deletar</button>
   </form>
  </div>
  @endforeach
</div>
</div>

@endsection
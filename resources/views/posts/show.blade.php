@extends('layouts.app')
@section('content')

<div class="row">
      <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                 <h2>Post criados</h2>
           </div>
     </div>
</div>   

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{$post->id}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{$post->title}}</h6>
    <p class="card-text">{{$post->body}}</p>
    <strong>Criado: {{$post->created_at}}</strong>
    <strong>Editado: {{$post->updated_at}}</strong><br>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>

@endsection
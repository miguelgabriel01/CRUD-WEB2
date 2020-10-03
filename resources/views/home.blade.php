@extends('layouts.app')

@section('content')

@foreach($posts as $post)

@isset($post->image)

<img src="{{ asset('storage/'.$post->image->path)}}" alt="..." class="img-thumbnail">

@endisset


<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{$post->id}}</h5>
    <small>{{$post->user->name}}</small><br>
    <h6 class="card-subtitle mb-2 text-muted">{{$post->title}}</h6>
    <p class="card-text">{{$post->body}}</p>
    <strong>Criado: {{$post->created_at}}</strong>
    <strong>Editado: {{$post->updated_at}}</strong><br>
  </div>
</div>

{{$posts -> links()}}

@endforeach

@endsection

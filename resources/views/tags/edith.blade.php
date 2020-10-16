@extends('layouts.app')
@section('content')

<div class="row">
      <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                 <h2>editar tag</h2>
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

<form action="{{ route('tags.update',$tag->id) }}" method="POST" >

@csrf
@method('PUT')

<div class="col">
  <div class="col">
    <div class="form-group">
      <strong>Name: </strong>
      <input type="text" name="name" class="form-control" value="{{ $tag->name}}" required="" maxlength="60"/>
    </div>
  </div>
</div>


<div class="row">
  <div class="col text-center">
    <button type="submit" class="btn col btn-primary">Atualizar tag</button>
  </div>
</div>


</form>

@endsection
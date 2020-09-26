@extends('layouts.app')
@section('content')

<div class="row">
      <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                 <h2>Criar novo Post</h2>
           </div>
     </div>
</div>

<form action="{{ route('posts.store') }}" method="POST">

@csrf
<div class="col">
  <div class="col">
    <div class="form-group">
      <strong>Title: </strong>
      <input type="text" name="title" class="form-control"/>
    </div>
  </div>
</div>

<div class="col">
  <div class="col">
    <div class="form-group">
      <strong>Body: </strong>
       <textarea  class="form-control" name="body"></textarea>
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
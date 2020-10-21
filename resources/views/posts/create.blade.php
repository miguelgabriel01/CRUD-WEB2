@extends('layouts.app')
@section('content')

<div class="row">
      <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                 <h2>Criar novo Post</h2>
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

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">

@csrf
<div class="col">
  <div class="col">
    <div class="form-group">
      <strong>Title: </strong>
      <input type="text" name="title" class="form-control" value="{{old('title')}}" required="" maxlength="255"/>
    </div>
  </div>
</div>

<div class="col">
  <div class="col">
    <div class="form-group">
      <strong>Body: </strong>
       <textarea  class="form-control" name="body" required="">{{old('body')}}</textarea>
    </div>
  </div>
</div>

<div class="col">
  <div class="col">
    <div class="form-group">
      <strong>Image: </strong>
      <input type="file" name="image"  id="image" class="form-control"  required="" value="{{old('image')}}"/>
    </div>
  </div>
</div>

<div class="col">
  <div class="col">
    <div class="form-group">
      <strong>Tags: </strong>
       <select name="tags_id[]" id="" class="custom-select" multiple>
          @foreach($tags as $tag)
          <option value="{{ $tag->id}}">{{ $tag->name}}</option>
          @endforeach
       </select>
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
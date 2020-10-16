@extends('layouts.app')
@section('content')
<div class="row">
      <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                 <h2>Show tags</h2>
           </div>
     </div>
</div>   

@if(session('success'))
<div class="alert alert-success">
  {{session('success')}}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
  {{session('error')}}
</div>
@endif

<div class="d-flex flex-row d-flex justify-content-start">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{$tag->id}}</h5>
    <p class="card-text">#{{$tag->name}}</p><br>
    <p class="card-text">{{$tag->created_at}}</p><br>
    <p class="card-text">{{$tag->updated_at}}</p><br>

   <form action="{{route('tags.destroy',$tag->id)}}" method="POST">
   <a href="{{route('tags.index')}}" class="btn btn-info">Voltar</a>
    <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-primary">Editar</a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Deletar</button>
   </form>
  </div>

</div>
</div>


@endsection
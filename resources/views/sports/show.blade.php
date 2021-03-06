@extends ('layout')

@section ('content')
<div class = container>
	<h1>{{$sport->name}} Divisions</h1>

  <ul class="list-group">
   
    @foreach ($sport->division as $division)
    <div class="row">
      <div class="col-sm-9">
    <li class ='list-group-item'>
      <a href='/sports/{{$sport->name}}/{{$division->id}}'>
        {{ $division->name }}</a>

    </li>
  </div>
    @can('create' , App\Division::class)
    <div class="col-sm-3">
    <a class="btn btn-primary ml-auto" href="/sports/{{$sport-> name}}/{{$division->id}}/edit" role="button">Edit</a>
    </div>
    @endcan

  </div>

    @endforeach

    </ul>
    @can('create' , App\Division::class)
    <a class="btn btn-primary" href="/sports/{{$sport->name}}/create" role="button">Create new Division</a>
    @endcan
  
</div>
@endsection


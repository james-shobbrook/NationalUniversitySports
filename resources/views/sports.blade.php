@extends ('layouts.app')


@section ('content')
<div class = container>
	<h1>Select a sport to view the league table for it</h1>
<ul class="list-group">
 
  @foreach ($sports as $sport)
  <div class="row">
  	<div class="col">
  <li class ='list-group-item'>
  	<a href='/admin/sports/{{$sport->id}}'>
  		{{ $sport->name }}</a>

  </li>
</div>
</div>

  @endforeach

  </ul>

@endsection
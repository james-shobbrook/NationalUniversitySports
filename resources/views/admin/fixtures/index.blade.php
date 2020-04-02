@extends('admin/layout')


@section('content')
<div class = container>
	<table class="table table-bordered">
		<tbody>
			@foreach($fixtures as $fixture)
			<tr>
				<td><a href="/admin/teams/{{$fixture->homeTeam->id}}"><center>{{$fixture->homeTeam->name}}</center></a></td>
				<td><center>{{$fixture->time->format('d/m/Y H:i')}}</center><br><center>{{$fixture->notes}}</center></td>
				<td><a href="/admin/teams/{{$fixture->awayTeam->id}}"><center>{{$fixture->awayTeam->name}}</center></a></td>
				<td><center><a class="btn btn-primary ml-auto" href="/admin/fixtures/{{$fixture->id}}/result" role="button">Enter Result</a></center></td>

			</tr>		
			
			


			@endforeach
		</tbody>
	</table>

</div>

@endsection
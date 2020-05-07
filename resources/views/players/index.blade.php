@extends('layout')

@section('mainContent')
	<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col"><a class="btn btn-primary" href="/teams/create" role="button">Create Team</a></th>
					<th scope="col"><a class="btn btn-primary" href="/teams" role="button">Show Teams</a></th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col"></th>

				</tr>
			</thead>
		</table>
		<hr />
		<h2>List Players of <u><i>{{$teamname}}</i></u></h2>
		<hr />
	
			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">Image</th>
			      <th scope="col">Name</th>
			      <th scope="col">Jersey Number</th>
			      <th scope="col">Country</th>
			    </tr>
			  </thead>
			   
		@foreach($players as $player)
			
<tbody>
			 
			    <tr style="text-align: left">
			      <td scope="row"><img height="100" width="100" src="{{'uploads/'.$player->img }}" class="image" alt="{{$player->img}}" /> </td>
			      <td>{{ $player->firstname.' '.$player->lastname }}</td>
			      <td>{{ $player->jersey_number }}</td>
			       <td>{{ $player->country }}</td>
			    </tr>
			
	</tbody>		 
		@endforeach
		 
			</table>
@endsection

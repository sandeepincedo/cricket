@extends('layout')

@section('mainContent')
	<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col"><a class="btn btn-primary" href="/teams/create" role="button">Create Team</a></th>
					<th scope="col"><a class="btn btn-primary" href="/matches" role="button">Match Fixture</a></th>
					<th scope="col"></th>
					
					<th scope="col"></th>
					<th scope="col"></th>

				</tr>
			</thead>
		</table>
		<hr />
		<h2>list team</h2>
		<hr />
	
			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">Logo</th>
			      <th scope="col">Team Name</th>
			      <th scope="col">Club State</th>
			     
			      <th scope="col">Create Player</th>
			      <th scope="col">Show Players</th>
			      <th scope="col">Get Points</th>
			    </tr>
			  </thead>
			   
		@foreach($teams as $team)
			
<tbody>
			 
			    <tr style="text-align: left">
			      <td scope="row"><img  src="{{'uploads/'.$team->logo }}" class="image" alt="{{$team->logo}}" /> </td>
			      <td>{{ $team->name }}</td>
			      <td>{{ $team->club_state }}</td>
			      
			       <td scope="col"><a class="btn btn-primary" href="/players/create?team_id={{$team->id}}" role="button">Add Player</a></td>
			      <td scope="col"><a class="btn btn-primary" href="/players?team_id={{$team->id}}" role="button">Show Players</a></td>
			      <td scope="col" id="teampoint_{{$team->id}}" ><a title="2 Points for Per match winner" class="btn btn-primary tool getpoint" href="javascript:void(0)" role="button" id="{{$team->id}}">Get Points</a></td>
			    </tr>
			
	</tbody>		 
		@endforeach
		 
			</table>
@endsection

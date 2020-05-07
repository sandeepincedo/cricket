@extends('layout')

@section('mainContent')

	<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col"><a class="btn btn-primary" href="/teams" role="button">Show Team</a></th>
					<th scope="col"></th>
					<th scope="col"></th>
					<th scope="col"></th>

				</tr>
			</thead>
		</table>

		
  
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container">
        	<div style="padding: 10px"><b>Select Teams to Scheduled Match</b></div>
			<form class="form-horizontal" action="#" method="post">
				@csrf
				 <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="team1">Team 1</label>
				      <select id="team1" class="form-control" name="team1_id">
				      	@foreach ($teams as $team)
				        <option value="{{$team->name.'_'.$team->id}}">{{$team->name}}</option>
				        @endforeach
				      </select>
				      
				    </div>
				    <div class="form-group col-md-6">
				      <label for="team2">Team 2</label>
				       <select id="team2" class="form-control" name="team2_id">
				        @foreach ($teams as $team)
				       	 <option value="{{$team->name.'_'.$team->id}}">
				       	 	{{$team->name}}
				       	 </option>
				        @endforeach
				      </select>
				    </div>
				  </div>

				  <button type="button" class="btn btn-primary fix_match">Fix Match</button>
				   
			</form>
		</div>
		 @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
       
        @endif	
			<div  style="padding-top: 100px; display: block">
			<hr />
				<h2>Matches History</h2>
				<hr />
			
					<table class="table table-hover">
					  <thead>
					    <tr>
					      
					      <th scope="col">Team 1</th>
					      <th scope="col">Team 2</th>
					      <th scope="col">Winner</th>
					    </tr>
					  </thead>
					   
				@foreach($matchNewList as $match)
							
				<tbody>
							 
					    <tr style="text-align: left">
					     
					      <td>{{ $match['team1'] }}</td>
					      <td>{{ $match['team2'] }}</td>
					       <td>{{ $match['winner'] }}</td>
					    </tr>
					
				</tbody>		 
				@endforeach
				 
					</table>
		</div>
		<div  style="padding-top: 100px; display: none" id="winner">
			<div style="padding: 10px"><b>Select Winner from Scheduled Match</b></div>
			<form class="form-horizontal" action="{{action('MatchController@store')}}" method="post">
				@csrf
				 <div class="form-row">
				    <div class="radio">
				    	<input type="radio" name="team" id="team1radio" value="" checked="checked"><label id="teamName1">Option 1</label>
				    </div>
				    <div style="padding-top: 10px"><b>V/S</b></div>
				    <div class="radio">
				    	<input type="radio" name="team" id="team2radio" value=""><label id="teamName2">Option 1</label>
				    	<input type="hidden" name="team1Id" id="team1Id" value="" />
				    	<input type="hidden" name="team2Id" id="team2Id" value="" />
				    </div>
				</div>
				<div style="padding-top: 30px">
				 <button type="submit" id="Winner" class="btn btn-primary">Winner</button>
			</form>
		</div>

	


@endsection

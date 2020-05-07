@extends('layout')

@section('mainContent')
	<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col"><a class="btn btn-primary" href="/teams" role="button">Show Teams</a></th>
				</tr>
			</thead>
		</table>
		<h2>Add Player for Team <u><i>{{ $teams->name }}</i></u></h2>

		 @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
       
        @endif
  
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
		<form class="form-horizontal" action="/players" enctype="multipart/form-data" method="post">
			@csrf
			<fieldset>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="firstname" >First Name:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" required="true">
			      <input type="hidden" name="team_id" value="{{ $teams->id }}">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="lastname" >Last Name:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" required="true">
			    </div>
			  </div>
			   <div class="form-group">
			    <label class="control-label col-sm-2" for="jersey_number" >Jersey Number:</label>
			    <div class="col-sm-10">
			      <input type="Number" class="form-control" id="jersey_number" name="jersey_number" placeholder="Enter Jersey Number" required="true">
			    </div>
			  </div>

			  <div class="form-group">
			    <label class="control-label col-sm-2" for="country" >Country:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" required="true">
			    </div>
			  </div>
			   <div class="form-group">
			    <label class="control-label col-sm-2" for="logo" >Player:</label>
			    <div class="col-sm-10">
			      <input type="file"  accept='image/*' class="form-control" id="logo" placeholder="Enter Club State" name="logo" required="true">
			    </div>
			  </div>
		
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default">Submit</button>
			    </div>

			  </div>
			  </fieldset>
		</form>

	</div>

		

@endsection

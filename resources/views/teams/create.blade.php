@extends('layout')

@section('mainContent')
	<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col"><a class="btn btn-primary" href="/teams" role="button">Show Teams</a></th>
				</tr>
			</thead>
		</table>
		<h2>Create team</h2	>

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
		<form class="form-horizontal" action="/teams" enctype="multipart/form-data" method="post">
			@csrf
			<fieldset>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="name" >Name:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required="true">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="state" >Club State:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="state" name="club_state" placeholder="Enter Club State" required="true">
			    </div>
			  </div>
			   <div class="form-group">
			    <label class="control-label col-sm-2" for="logo" >Logo:</label>
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

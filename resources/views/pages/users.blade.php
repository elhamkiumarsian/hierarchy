@extends('layouts.default') @section('content')
<div class="col-md-3"></div>
<div class="col-md-6 well">
	<h3 class="text-primary">Users</h3>
	<hr style="border-top: 1px solid #000;" />
	<div id="data">
		</data>
	</div>
	</body>



	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Role</th>
				<th>Role_id</th>
				<th>Subordinates</th>
			</tr>
		</thead>
		<tbody>


			@foreach($users as $user)

			<tr>

				<td>{{$user->id}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->role}}</td>
				<td>{{$user->role_id}}</td>
				<td><center>
						<a href='/users/{{$user->id}}'>
							<button class="btn btn-success">
								<span class="glyphicon glyphicon-arrow-right"></span>
							</button>
						</a>
					</center></td>



			</tr>

			@endforeach


		</tbody>
	</table>
<br><br>
 <h2>Add New User</h2>
  {{ Form::open(array('url' => 'user','method' => 'post')) }}
   <div class="form-group">
 
{{Form::label('name')}}{{ Form::text('name', null, array('class' => 'form-control'))}}
</div>
 <div class="form-group">
{{Form::label('role')}}  {{Form::select('role', $items ,array('class' => 'form-control'))}}<br>
</div>
  <button type="submit" class="btn btn-success">Submit</button>
{{ Form::close() }} 
<br>
	<script src="https://code.jquery.com/jquery-3.4.1.js"
		integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
		crossorigin="anonymous"></script>
	<script src="./js/script.js"></script>
	@stop
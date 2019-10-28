@extends('layouts.default') @section('content')
<body>


	<ul>@foreach($roles as $role) @if($role->parent == 0) @include('role',
		$role) @endif @endforeach

	</ul>

	<br>
	<br>
	<br>
	<div>
   
   
   <br><br>
 <h2>Add New Role</h2>
    {{ Form::open(array('url' => 'role','method' => 'post')) }}

   <div class="form-group">
 
{{Form::label('name')}}{{ Form::text('name', null, array('class' => 'form-control'))}}
</div>
 <div class="form-group">
{{Form::label('parent')}}  {{Form::select('parent', $items ,array('class' => 'form-control'))}}<br>
</div>
  <button type="submit" class="btn btn-success">Submit</button>
{{ Form::close() }} 
<br>

</div>	

</body>
@stop

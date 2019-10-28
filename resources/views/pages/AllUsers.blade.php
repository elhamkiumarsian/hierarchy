@extends('layouts.default')
@section('content')
  <body>
	<table>
    <thead>
        <tr>
            <th> id</th>
            <th> name</th>
            <th> role </th>
            <th> role_id </th>
            <th> created_at</th>
            <th> action </th>
        </tr>
    </thead>
    <tbody>
         @foreach($users as $user)
         	
          <tr>
          
              <td>{{$user->id}}</td>
              <td> {{$user->name}} </td>
              <td> {{$user->role}} </td>
              <td> {{$user->role_id}} </td>
              <td> {{$user->created_at}} </td> 
              <td><a href='/users/{{$user->id}}'>Sub </a></td>
           
          </tr>
       
         @endforeach
   </tbody>
	</table>
	<div>
	 <br><br><br>
  {{ Form::open(array('url' => 'user','method' => 'post')) }}
  {{Form::label('Add New User')}}<br>
{{Form::label('name')}}{{Form::text('name')}}<br>
{{Form::label('role')}}{{Form::select('role', $items )}}<br>
{{Form::submit('Add New User')}}
{{ Form::close() }} 
</div>
</body>
</html>
@stop
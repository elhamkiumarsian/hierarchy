@extends('layouts.default')
@section('content')
   	<div class = "col-md-3"></div>
	<div class = "col-md-6 well">
		<h3 class = "text-primary">Subordinates</h3>
		<hr style = "border-top:1px solid #000;" />
		<div id = "data"></data>
	</div>
</body>



<table class = "table table-bordered">
			<thead>
				<tr>
				    <th>Id</th>
					<th>Name</th>
					<th>Role</th>
					<th>Role_id</th>

				</tr>
			</thead>
			<tbody>
@if(empty($users))
   
@else
       @foreach($users as $user)
         	
          <tr>
             <td> {{$user['id']}} </td>
              <td> {{$user['name']}} </td>
              <td> {{$user['role']}} </td>
              <td> {{$user['role_id']}} </td>
       </tr>
       
         @endforeach
@endif
			
			
			
				
				</tbody>
		</table>
		
  <a  href='/users'>  <button class = "btn btn-success">
 <span class = "glyphicon glyphicon-arrow-left"></span>
   </button></a></center></td>
 <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src = "./js/script.js"></script>
@stop
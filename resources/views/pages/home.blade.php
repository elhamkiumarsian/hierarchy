@extends('layouts.default')
@section('content')
   	<div class = "col-md-3"></div>
	<div class = "col-md-6 well">
		<h3 class = "text-primary">Users</h3>
		<hr style = "border-top:1px solid #000;" />
		<div id = "data"></data>
	</div>
</body>



<table class = "table table-bordered">
			<thead>
				<tr>
					<th>name</th>
					<th>Role</th>
					<th>Role_id</th>
					<th>Subordinates</th>
				</tr>
			</thead>
			<tbody>
			<tr>
			
					<td class = "firstname" data-firstname = '.$fetch['mem_id'].' contenteditable >'.$fetch['firstname'].'</td>
					<td class = "lastname" data-lastname = '.$fetch['mem_id'].' contenteditable>'.$fetch['lastname'].'</td>
					<td class = "address" data-address = '.$fetch['mem_id'].' contenteditable>'.$fetch['address'].'</td>
					<td><center><button class = "btn btn-danger btn_delete" name = "'.$fetch['mem_id'].'"><span class = "glyphicon glyphicon-remove"></span></button></center></td>
				</tr>
				<tr>
					<td id = "firstname" contenteditable></td>
					<td id = "lastname" contenteditable></td>
					<td id = "address" contenteditable></td>
					<td><center><button class = "btn btn-success" id = "btn_add"><span class = "glyphicon glyphicon-plus"></span></button></center></td>
				</tr>
				</tbody>
		</table>

 <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src = "./js/script.js"></script>
@stop
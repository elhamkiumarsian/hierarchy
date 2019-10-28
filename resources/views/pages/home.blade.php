@extends('layouts.default')
@section('content')
 <h1>Users hierarchy</h1>

<p>In our system each user belongs to a user-group with a defined set of permissions.
We name such a group "Role". A certain role (unless it is the root) must have a parent role to whom it reports to.
</p>
<h3>click on <a href='/users'>users</a> in navbar to find list of users</h3>
<h3>click on <a href='/roles'>roles</a> in navbar to find list of roles</h3>
@stop
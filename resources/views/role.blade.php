<li>
<div >{{ $role->name }}</div>
       @if ($role->children()->count() > 0 )
           <ul>
               @foreach($role->children as $role)

                       @include('role', $role) 

               @endforeach
           </ul>

       @endif
</li>
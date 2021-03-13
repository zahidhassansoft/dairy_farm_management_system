<ul>
@foreach($childs as $child)
    <li id="child">
    	<input type="checkbox" class="menus" value="{{$child->id}}" {{ in_array($child->id, $userRole) ? 'checked' : null}}> {{$child->name}}
        <input type="number" class="form-control slno" value="0">
		@if(count($child->childs))
            @include('admin.acl.user.childs',['childs' => $child->childs])
        @endif
	</li>
@endforeach
</ul>
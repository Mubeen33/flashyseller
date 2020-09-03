<div class="auto-complete-wrapper">
	<ul>
		@if(isset($categories))
			@foreach($categories as $key=>$content)
			<li getCategoryId="{{$content->id}}" gettitle="{{$content->name}}">
				{{$content->name}}<br>
				{{ $content->getParentsNames() }}
			</li>
			@endforeach
		@endif
	</ul>
</div>
<div class="auto-complete-wrapper">
	<ul>
		@if(isset($categories))
			@foreach($categories as $key=>$content)
			<li getCategoryId="{{$content->id}}" gettitle="{{$content->name}}">
				<span><b>{{$content->name}}</b></span><br>
				<span>{{ $content->getParentsNames() }}</span>
			</li>
			@endforeach
		@endif
	</ul>
</div>
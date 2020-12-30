<div class="auto-complete-wrapper" >
	<ul >
		@if(isset($categories))
			@foreach($categories as $key=>$content)
			<li style="padding: 10px!important;    border: 0.5px solid  #dfdfdf;" getCategoryId="{{$content->id}}" gettitle="{{$content->name}}">
				<span><b>{{$content->name}}</b></span><br>
				<span>{{ $content->getParentsNames() }}</span>
			</li>
	
			@endforeach
		@endif
	</ul>
</div>
<div class="auto-complete-wrapper">
	<ul>
		@if(isset($getProducts))
			@foreach($getProducts as $key=>$content)
			<li getproductid="{{$content->id}}" gettitle="{{$content->title}}">
				{{ $content->title }}
				<p>▸ {{ $content->get_category->name }}</p>
			</li>
			@endforeach
		@endif
	</ul>
</div>
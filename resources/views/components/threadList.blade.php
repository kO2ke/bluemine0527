<div class="myContainer thread-list top">
		@if (count($threadArray) != 0)
			<h4 class="myGreen label children pl-4 py-2">{{$listTitle}}</h4>
			<div class="container-fluid">
				<div class='list-item p-2 row'>
				@foreach ($threadArray as $item)
					
						<div class="col-sm-8">
							<a class='thread-title' href="/thread/id={{$item->id}}">{{$item->title}}</a>	
						</div>
						<div class="col-sm-4 text-right">
							<span class="text-secondary">Recent Update:{{$item->updated_at}}</span>
						</div>
					
				@endforeach
				</div>
			</div>
		@endif

		@if ($isPutCreateBtn ?? false)
			@include("components.addThreadForm",["thread_id" => $thread->id ?? 0])
		@endif	
</div>
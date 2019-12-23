<div class="myContainer thread-list top">
		@if (count($threadArray) != 0)
		<h4 class="myGreen label children pl-4 py-2">{{$listTitle}}</h4>
			@foreach ($threadArray as $item)
				<div class='list-item p-2'>
					<a class='thread-title' href="/thread/id={{$item->id}}">{{$item->title}}</a>
					<span class="float-right text-secondary mr-3">Recent Update:{{$item->updated_at}}</span>
				</div>
			@endforeach
		@endif
		@if ($isPutCreateBtn ?? false)
			@include("components.addThreadForm",["thread_id" => $thread->id ?? 0])
		@endif	
</div>
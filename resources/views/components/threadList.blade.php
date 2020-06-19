
	<div class="row ml-2">
		<div class="myContainer col-lg-9 rounded container-sm thread-list top m">
			<h4 class="myGreen label children pl-4 py-2">{{$listTitle}}</h4>
			
				@if (count($threadArray) == 0)
					<span class="text-secondary">No Threads</span>
				@else
					@foreach ($threadArray as $item)
					<div class='list-item p-2 row'>
						<div class="col-sm-12">
							<a class='thread-title' href={{ route('thread.show', ['id' => $item->id]) }}>{{$item->title}}</a>
						</div>
						<div class="col-sm-12 text-right">
							<span class="text-secondary">Recent Update:{{$item->updated_at}}</span>
						</div>
					</div>
					@endforeach
				@endif
			@isset($showAllRoute)
				<div class="text-right">
					<a href={{route($showAllRoute)}}>Show All</a>
				</div>
			@endisset
			@if ($isPutCreateBtn ?? false)
			@include("components.addThreadForm",["thread_id" => $thread->id ?? 0])
			@endif
		</div>
	</div>
</div>
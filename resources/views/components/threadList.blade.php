
	<div class="row mx-2">
		<div class="myContainer shadow-sm col-lg-9 border rounded thread-list top m">
			<h4 class="myGreen label children pl-4 py-2">{{$listTitle}}</h4>
			
				@if (count($threadArray) == 0)
					<span class="text-secondary">No Threads</span>
				@else
					@foreach ($threadArray as $item)
					<div class='list-item p-2 row pointer-change'>
						<div class="col-sm-12 text-info" onclick="location.href='{{ route('thread.show', ['id' => $item->id])}}'">
							{{__($item->title)}}
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
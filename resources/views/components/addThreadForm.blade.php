@guest
<div class="text-right">
	<button class="btn btn-outline-secondary bg-light" onclick="location.href='{{ route('login') }}'">
        {{ __('+ Login To Add Child') }}
    </button> 
</div>
@else
<div class="w-100 text-right">
	<input type="button" class="create-thread opener btn btn-danger" value="+ Add Child">
</div>
	<div class="create-thread form">
		<form class="" action="/createThread" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="thread_id" value={{$thread_id}}>
			<div class="form-group">
				<div class="input-group input-group-sm mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroup-sizing-sm">Title</span> <input class="form-control" type="text" name="title" value="">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="description">Description</label>
				<textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description..."></textarea>
			</div>

			<input type="submit" name="createThread" value="Create Thread" class="btn btn-primary float-right">

		</form>
	</div>
@endguest

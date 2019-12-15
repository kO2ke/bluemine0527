@extends("layouts.main")
@section("body-content")
	@yield("head-contents")

	<div class="myContainer thread-list top">
		@if (count($children) != 0) <span class="myGreen label children">@yield("list-title")</span>
		@foreach ($children as $child)
		<div class='hoge'>
			<a class='thread-title' href="/thread/id={{$child->id}}">{{$child->title}}</a>
			<span class="float-right text-secondary mr-3">Recent Update:{{$child->updated_at}}</span>
			<form style='' class='delete' action='/' method='post'>
				<input type='hidden' name='delete' value='true'> <input type='hidden' name='id' value='<?php echo $child->id ;?>'> <input type='submit' class="btn btn-outline-danger" name='dlt-submit'
					value='delete'>
			</form>

		</div>
		@endforeach @endif
		<div class="w-100 text-right">
			<input type="button" class="create-thread opener btn btn-danger" value="+ Add Child">
		</div>
		<div class="create-thread form">
			<form class="" action="/create_thread" method="post">

				<div class="form-group">
					<div class="input-group input-group-sm mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">Title</span> <input class="form-control" type="text" name="title" value="">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" id="description" rows="3" placeholder="Enter Description..."></textarea>
				</div>

				<input type="submit" name="createThread" value="Create Thread" class="btn btn-primary float-right">

			</form>
		</div>
	</div>

	@yield("foot-contents")
@endsection
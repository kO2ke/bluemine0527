<<<<<<< HEAD
<!doctype html>

<html lang="en">
<head>
<meta charset="utf-8">
<title>Bluemine-{{$thread->title}}</title>
<link href="/css/mainStyle.css" rel='stylesheet' />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/js/main.js"></script>


<body class="bg-light not-top">
	<div class="myContainer header top bg-secondary pl-3">////B l u e m i n e////</div>
=======
@extends("layouts.main")

@section("page-name")
	- {{$thread->title}}
@endsection

@section("body-class","not-top")

@section("body-contents")
>>>>>>> 2c52662bb030f7f96aea6fc6972a8b0cab479afc
	<div class="w-100 myLightgreen" style="height:50px;">
		@if ($parent == null)
		<a class="label parents" href="/">>TOP</a>
		@else
		<a class="label parents" href="/thread/id={{$parent->id}}">>{{$parent->title}}</a>
		@endif
	</div>
<<<<<<< HEAD
	<div class="shadow-lg myGreen myContainer p-2 mx-2 mt-2">
=======

	<div class="shadow-lg myGreen myContainer p-2 mx-2 my-5">
>>>>>>> 2c52662bb030f7f96aea6fc6972a8b0cab479afc
		<div class="myContainer thread-name pl-3">
			<span>ID:{{$thread->id}} </span><span>Title: {{$thread->title}}</span>
		</div>
		<div class="bg-light p-4 mt-3 rounded">
			<div class="p-1 border rounded text-secondary">owner: {{$thread->owner_name}}</div>
			<div class="mt-3">{{$thread->description}}</div>
		</div>
	</div>

<<<<<<< HEAD

	<div class="myContainer thread-list top">
		@if (count($children) != 0) <span class="myGreen label children">child Threads</span> @foreach ($children as $child)
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

	<div class="border rounded text-center p-1 mt-3">POSTS</div>
	@foreach ($posts as $post)
	<div class="container-fluid">
=======
	@include("components.threadList",["listTitle" => "Children", "threadArray" => $children])

	<div class="border rounded text-center p-1 mt-3">POSTS</div>

	<div class="container-fluid">
		@foreach ($posts as $post)
>>>>>>> 2c52662bb030f7f96aea6fc6972a8b0cab479afc
		<div class="row p-3 mx-4 my-2 border rounded">
			<div class="text-center col-3">
				<p>{{$post->owner_name}}</p>
				<img alt="" src="http://unsplash.it/150/150/">
			</div>
			<div class="col-9">
				<div class="text-right w-100 text-secondary">{{$post->created_at}}</div>
				<div>{{$post->content}}</div>
			</div>
		</div>
<<<<<<< HEAD
	</div>
	@endforeach

</body>
</html>
=======
		@endforeach
	</div>
@endsection
>>>>>>> 2c52662bb030f7f96aea6fc6972a8b0cab479afc

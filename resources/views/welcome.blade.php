<<<<<<< HEAD
<!doctype html>

<html lang="en">
<head>
<meta charset="utf-8">
<title>Bluemine</title>
<link href="/css/mainStyle.css" rel='stylesheet' />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/js/main.js"></script>


<body>
	<div class="myContainer header top bg-secondary">////B l u e m i n e////</div>
=======
@extends("layouts.main")
@section("body-contents")
>>>>>>> 2c52662bb030f7f96aea6fc6972a8b0cab479afc
	<div class="w-100 position-relative">
		<div style="font-size: 15px;" class="position-absolute w-100 myContainer thread-name top m-0">Welcome to Bluemine!!</div>
		<img alt="" src="{{$landingImg}}" class="w-100">
	</div>
<<<<<<< HEAD
	<div class="myContainer thread-list top">
		<span class="myGreen label children">Top Threads</span>
  <?php foreach ($top_threads as $thread) : ?>
      <div class='hoge'>
			<a class='thread-title align-middle mt-1' href="/thread/id={{$thread->id}}"> {{$thread->title}} </a>
			<span class="float-right text-secondary mr-3 mt-1 align-middle">Recent Update:{{$thread->updated_at}}</span>
			<form style='' class='delete' action='/' method='post'>
				<input type='hidden' name='delete' value='true'> <input type='hidden' name='id' value='<?php echo $thread->id ;?>'> <input type='submit' class="btn btn-outline-danger" name='dlt-submit'
					value='delete'>
			</form>

		</div>
  <?php endforeach; ?>
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

</body>
</html>
=======
	`@include("components.threadList",["listTitle" => "Recently",   "threadArray" => $recentTh])
	`@include("components.threadList",["listTitle" => "TOP-Thread", "threadArray" => $children])
@endsection
@section("list-title","TOP-Thread")
>>>>>>> 2c52662bb030f7f96aea6fc6972a8b0cab479afc

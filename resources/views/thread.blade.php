@extends("layouts.main")

@section("page-name")
	- {{$thread->title}}
@endsection

@section("body-class","not-top")

@section("body-contents")
	<div class="w-100 myLightgreen" style="height:50px;">
		@if ($parent == null)
		<a class="label parents" href="/">>TOP</a>
		@else
		<a class="label parents" href="/thread/id={{$parent->id}}">>{{$parent->title}}</a>
		@endif
	</div>

	<div class="shadow-lg myGreen myContainer p-2 mx-2 my-5">
		<div class="myContainer thread-name pl-3">
			<span>ID:{{$thread->id}} </span><span>Title: {{$thread->title}}</span>
		</div>
		<div class="bg-light p-4 mt-3 rounded">
			<div class="p-1 border rounded text-secondary">owner: {{$thread->owner_name}}</div>
			<div class="mt-3">{{$thread->description}}</div>
		</div>
	</div>

	@include("components.threadList",["listTitle" => "Children", "threadArray" => $children])

	<div class="border rounded text-center p-1 mt-3">POSTS</div>

	<div class="container-fluid">
		@foreach ($posts as $post)
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
		@endforeach
	</div>
@endsection
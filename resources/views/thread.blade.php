@extends("layouts.main")

@section("body-class","not-top")

@section("body-contents")
<div class="w-100 myLightgreen text-light pl-2 pt-3" style="height:50px;">
	<span class="bg-info text-light rounded-right p-1 opacity-change pointer-change" 
		onclick="location.href='{{$parentRoute}}'">
		{{__($parentTitle)}}
	</span>
</div>

@include('components.threadDetail', ["thread" => $thread])

@include("components.threadList",["listTitle" => "Children", "thread" => $thread, "threadArray" =>
$thread->children()->latest()->get() ?? [], "isPutCreateBtn" => !($thread->isDeleted())])

@if($thread->isDeleted() == false)
<div class="container-fluid">
	<div class="row p-3 mx-2 mt-5 mb-2">
		@include('components.addPostForm', ["thread" => $thread])
	</div>
	<div class="row">
		<div class="col-md-8">
			@include('components.posts',["posts" => $thread->posts])			
		</div>
	</div>
</div>
@endif
@endsection
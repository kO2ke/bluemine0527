@extends("layouts.main")
@section("body-contents")
	<div class="w-100 " style="background:url({{$landingImg}}) center center /cover no-repeat;position-relative; padding-bottom:200px;">
		<div style="font-size: 15px;" class="position-absolute w-100 myContainer thread-name top m-0">Welcome to Bluemine!!</div>
	</div>
	<div class="p-3">
		@include("components.threadList",["listTitle" => "TOP-Thread", "threadArray" => $children ?? [], "isPutCreateBtn" => true])
	</div>
	<div class="p-3">
		@include("components.threadList",["listTitle" => "Recently",   "threadArray" => $recentTh ?? []])
	</div>
@endsection
@section("list-title","TOP-Thread")

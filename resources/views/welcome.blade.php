@extends("layouts.main")
@section("body-contents")
	<div class="w-100 position-relative">
		<div style="font-size: 15px;" class="position-absolute w-100 myContainer thread-name top m-0">Welcome to Bluemine!!</div>
		<img alt="" src="{{$landingImg}}" class="w-100">
	</div>
	`@include("components.threadList",["listTitle" => "Recently",   "threadArray" => $recentTh])
	`@include("components.threadList",["listTitle" => "TOP-Thread", "threadArray" => $children])
@endsection
@section("list-title","TOP-Thread")
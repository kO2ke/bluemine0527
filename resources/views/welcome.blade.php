@extends("layouts.main")
@section("page-name")
	""
@endsection
@section("body-contents")
	<div class="w-100 position-relative">
		<div style="font-size: 15px;" class="position-absolute w-100 myContainer thread-name top m-0">Welcome to Bluemine!!</div>
		<img alt="" src="{{$landingImg}}" class="w-100">
	</div>
	<div class="p-3">
		@include("components.threadList",["listTitle" => "TOP-Thread", "threadArray" => $children ?? [], "isPutCreateBtn" => true])
	</div>
	<div class="p-3">
		@include("components.threadList",["listTitle" => "Recently",   "threadArray" => $recentTh ?? []])
	</div>
@endsection
@section("list-title","TOP-Thread")

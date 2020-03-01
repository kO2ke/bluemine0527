@extends("layouts.main")

@section("body-class","not-top")

@section("body-contents")

<h3 class="p-4">{{$title}}</h3>

@include("components.threadList",["listTitle" => "Result", "thread" => null, "threadArray" =>
$results, "isPutCreateBtn" => false])
<div class="d-flex justify-content-center mt-4">
	@if( isset($searchText) )
		{{ $results->appends([ "searchText" => $searchText])->links() }}
	@else
		{{ $results->links() }}
	@endif
</div>

@endsection
@extends("layouts.main")

@section("body-class","not-top")

@section("body-contents")
<div class="w-100 myLightgreen text-light" style="height:50px;">
	@if ($thread->parent == null)
	<a class="label parents" href="/">>TOP</a>
	@else
	<a class="label parents" href={{route('thread.show',['id'=>$thread->parent->id])}}>>{{$thread->parent->title}}</a>
	@endif
</div>

@include('components.threadDetail', ["thread" => $thread])

@include("components.threadList",["listTitle" => "Children", "thread" => $thread, "threadArray" =>
$thread->children()->latest()->get() ?? [], "isPutCreateBtn" => !($thread->isDeleted())])

@if($thread->isDeleted() == false)
<div class="container-fluid">
	<div class="row p-3 mx-2 my-2 ">
		@guest
		Please <a class="" href="{{ route('register') }}">{{ __('Register ') }} </a>{{" or "}}<a class=""
		href="{{ route('login') }}">{{ __('Login ') }}</a> To Post
		@else
		@include('components.addPostForm', ["thread" => $thread])
		@endguest
	</div>
	
	<div class="row">
		<div class="col-md-9">
			
			@include('components.posts',["posts" => $thread->posts])
			
		</div>
	</div>
</div>
@endif
@endsection
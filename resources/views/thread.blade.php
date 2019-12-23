@extends("layouts.main")

@section("body-class","not-top")

@section("body-contents")
	<div class="w-100 myLightgreen text-light" style="height:50px;">
		@if ($thread->parent == null)
		<a class="label parents" href="/">>TOP</a>
		@else
		<a class="label parents" href="/thread/id={{$thread->parent->id}}">>{{$thread->parent->title}}</a>
		@endif
	</div>

	<div class="shadow-lg myGreen myContainer p-2 m-4">
		<div class="myContainer thread-name pl-3">
			<h4>{{$thread->title}}</h4>
		</div>
		<div class="bg-light mt-1 py-3 rounded">
		    <div class="container-fluid ">
				<div class="row text-secondary">
					<div class="col-3 text-center">
						<p>{{$thread->owner->name}}</p>
						<img alt="" src="http://placehold.jp/100x100.png?text=Owner Icon">
					</div>
					<div class="col-9">
						<div class="mt-3">{{$thread->description}}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include("components.threadList",["listTitle" => "Children", "thread" => $thread, "threadArray" => $thread->children()->latest()->get() ?? [], "isPutCreateBtn" => true])

	<h3 class="border rounded text-center p-1 mt-3">POSTS</h3>

	<div class="container-fluid">
		<div class="row p-3 mx-4 my-2 ">
			@guest
				Please <a class="" href="{{ route('register') }}">{{ __('Register') }} </a> or <a class="" href="{{ route('login') }}">{{ __('Login') }}</a> To Post
			@else
				<div class="text-center col-3">
					
					<p>{{Auth::user()->name}}</p>
					<img alt="" src="http://placehold.jp/150x150.png?text=Your Icon">
				</div>
				<div class="col-9 form">
					<p>　</p>
					<form action="/createPost" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="thread_id" value={{$thread->id}}>
		
						<div class="form-group">
							<textarea class="form-control" id="content" name="content" rows="6" placeholder="Enter Message..."></textarea>
						</div>
						<div class="form-group">
							<input type="submit" name="createPost" value="Post Message" class="btn btn-primary float-right">
						</div>
					</form>
				</div>
			@endguest
		</div>
		@foreach ($thread->posts()->latest()->get() as $post)
		{{-- make　Posting Css --}}
			@guest
				{{$formatByUser = ""}}
			@elseif( Auth::user()->id == $post->user_id )
				{{$formatByUser = "ml-5 myLightgreen"}}
			@else
				{{$formatByUser = "mr-5"}}
		{{-- make　Posting Css --}}
			@endguest
		<div class="row p-3 mx-4 my-5 {{ $formatByUser }} border rounded">
			<div class="text-center col-3">
				<p>{{$post->owner->name}}</p>
				<img alt="" src="http://placehold.jp/150x150.png?text=User Icon">
			</div>
			<div class="col-9">
				<div class="text-right w-100 text-secondary">{{$post->created_at}}</div>
				<div>{{$post->content}}</div>
			</div>
		</div>
		@endforeach
	</div>
@endsection

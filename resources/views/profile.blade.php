@extends("layouts.main")

@section("body-class","not-top")

@section("body-contents")
<div class="container-fluid">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
    <div class="col-md-12 py-4"><h1>{{$user->name}}</h1></div>
        <div class="col-md-4">
            <div class="card">
            <div class="card-header text-center">Profile</div>
                <div class="card-body text-center">
                    <img alt="" src="http://placehold.jp/200x200.png?text=Owner Icon">
                </div>
                <h4 class="card-body text-center pt-0">
                    {{$user->name}}
                </h4>
            </div>
        </div>
        <div class="col-md-8">
            @include("components.threadList",["listTitle" => ($user->name."'s Threads"), "thread" => null, "threadArray" =>
            $user->threads ?? [], "isPutCreateBtn" => false])
        </div>
    </div>
</div>
@endsection

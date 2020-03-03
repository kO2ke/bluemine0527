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
    <div class="col-md-4 text-center py-4"><h1>MyPage</h1></div><div class="col-md-8"></div>
        <div class="col-md-4">
            <div class="card">
            <div class="card-header text-center">Profile</div>
                <div class="card-body text-center">
                    <h4 class="card-body text-center pt-0">
                        {{$user->name}}
                    </h4>
                    <img alt="" src={{$user->iconPath()}}>
                </div>
                <form method="POST" action={{ route('update.icon')}} enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file"　value="select Image" class="form-control-file m-2" name="photo">
                    <input type="submit" class="btn btn-primary m-2" value="Upload Icon">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            @include("components.threadList",["listTitle" => "Your Threads", "thread" => null, "threadArray" =>
            $user->threads ?? [], "isPutCreateBtn" => false])
        </div>
    </div>
</div>
@endsection

@foreach ($posts as $post)
{{-- make　Posting Css --}}
@guest
    @php
        $formatByUser = ""
    @endphp
@elseif( Auth::user()->id == $post->user_id )
    @php
        $formatByUser = "ml-5 myLightgreen"
    @endphp
@else
    @php
        $formatByUser = "mr-5"
    @endphp
{{-- make　Posting Css --}}
@endguest

<div class="row p-3 mx-1 my-3 {{ $formatByUser }} border rounded">
    <div class="text-center col-12 d-md-none">
        <div class="row" style="">
            <div class="col-2 text-center">
                <img style="width:25px;" alt="" src={{$post->owner->iconMiniPath()}}>
            </div>
            <div class="col-4 text-left" style="font-size:11px;">
                <p class="align-middle">{{$post->owner->name}}</p>
            </div>
            <div class="col-6 align-middle" style="font-size:11px;">
                <div class="text-right w-100 text-secondary">{{$post->created_at}}</div>
            </div>
        </div>
    </div>

    <div class="mt-1 col-12">
        <div>{{$post->content}}</div>
    </div>

    <div class="col-6 mt-3 offset-6 d-none d-md-flex">
        <div class="col-2 text-center">
            <img style="width:35px;" alt="" src="{{$post->owner->iconMiniPath()}}">
        </div>
        <div class="col-4 text-left" style="font-size:10px;">
            <a class="align-middle" href={{route("profile.show",["id"=>$post->owner->id])}}>{{$post->owner->name}}</a>
        </div>
        <div class="col-6 align-middle text-right" style="font-size:10px;">
            <div class="w-100 text-secondary">{{$post->created_at}}</div>
        </div>
    </div>
</div>
@endforeach
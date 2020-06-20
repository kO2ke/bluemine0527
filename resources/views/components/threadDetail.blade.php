<div class="container-fluid">
    <div class="row">
        <div class="shadow myGreen rounded border col-lg-9 mx-3 mt-5 container-sm p-2">
            <div class="myContainer thread-name pl-3 py-3">
                <h4>{{$thread->isDeleted() ? "***DELETED THREAD***" : $thread->title}}</h4>
            </div>
            <div class="bg-light mt-1 py-3  rounded">
                <div class="container-fluid ">
                    <div class="row text-secondary">
                        <div class="col-4 row">
                            @if ( $thread->isDeleted() == false || $thread->owner->isLoginUser())
                            <div class="col-3 text-center">
                                <img alt="" src={{$thread->owner->iconMiniPath()}}>
                            </div>
                            <div class="col-9 text-left">
                                <a class="pt-1" href="{{route("profile.show",["id" => $thread->owner->id])}}" >{{$thread->owner->name}}</a>
                            </div>
                            @endif
                        </div>
                        <div class="col-8 row">
                            <div class="col-8"></div>
                            @if ($thread->owner->isLoginUser())
                                {{-- RestoreBtn --}}
                                @if ( $thread->isDeleted() )
                                    <form method="POST" action="{{route("thread.restore")}}")}}>
                                    {{ csrf_field() }}
                                    @method("put")
                                    <input type="hidden" name="thread_id" value="{{$thread->id}}">
                                    <input type="submit" value="RESTORE" class="btn btn-outline-danger">
                                </form>
                                @else
                                {{-- editBtn   --}}
                                <div class="col-2 edit">
                                    <input type="button" value="EDIT" class="btn btn-outline-success" data-toggle="modal" data-target="#editThreadModal">
                                </div>
                                <div class="col-2 delete">
                                {{-- RestoreBtn --}}
                                <form method="POST" action="{{route("thread.delete")}}">
                                    {{ csrf_field() }}
                                    @method("delete")
                                    <input type="button" value="DELETE" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteThreadModal">
                                </form>
                                @endif
                                </div>
                            @endif
                        </div>
                        @if ($thread->isDeleted() == false)
                        <div class="col-12">
                            <div class="mt-3">{{$thread->description}}</div>
                        </div>
                        <div class="col-12">
                            <p class="test-secondary text-right pt-3"> Updated At:{{$thread->updated_at}}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($thread->owner->isLoginUser()) 
<!-- スレッド編集 -->
<div class="modal" id="editThreadModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="">Edit This Thread</h4></h4>
            </div>
            <form method="POST" action="{{ route("thread.edit") }}">
                {{ csrf_field() }}
                @method("put")
                <div class="modal-body">
                    <input type="hidden" name="thread_id" value={{$thread->id}}>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend w-75">
                                <span class="input-group-text">Title</span>
                            <input class="form-control" type="text" name="title" value="{{$thread->title}}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" value="" rows="3">{{$thread->description}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn btn-default" data-dismiss="modal">CLOSE</button>
                    <input  type="submit" value="COMPLETE EDIT" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="deleteThreadModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="">Confirm</h4></h4>
            </div>
            <form method="POST" action="{{ route("thread.delete") }}">
                {{ csrf_field() }}
                @method("delete")
                <input type="hidden" name="thread_id" value={{$thread->id}}>
                <div class="modal-body">
                    <div class="p-3">Do you really want to delete this thread?</div>
                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn btn-default" data-dismiss="modal">CLOSE</button>
                    <input type="submit" value="DELETE" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>


@endif
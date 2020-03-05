<div class="text-center col-12 row">
    <div class="col-2 text-center">
        <img style="width:50px;" alt="" src="{{Auth::user()->iconMiniPath()}}">
    </div>
    <div class="col-4 text-left" style="font-size:11px;">
        <p>{{Auth::user()->name}}</p>
    </div>
</div>
<div class="col-12 form pt-2">
    <form action="/createPost" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="thread_id" value={{$thread->id}}>

        <div class="form-group">
            <textarea class="form-control" id="content" name="content" rows="6"
                placeholder="Enter Message..."></textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="createPost" value="Post Message" class="btn btn-primary float-right">
        </div>
    </form>
</div>
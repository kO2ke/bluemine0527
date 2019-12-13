<div class="myContainer thread-list top">
		@if (count($threadArray) != 0)
		<span class="myGreen label children">{{$listTitle}}</span>
		@foreach ($threadArray as $item)
		<div class='hoge'>
			<a class='thread-title' href="/thread/id={{$item->id}}">{{$item->title}}</a>
			<span class="float-right text-secondary mr-3">Recent Update:{{$item->updated_at}}</span>
			<form style='' class='delete' action='/' method='post'>
				<input type='hidden' name='delete' value='true'> <input type='hidden' name='id' value='<?php echo $item->id ;?>'> <input type='submit' class="btn btn-outline-danger" name='dlt-submit'
					value='delete'>
			</form>
		</div>
		@endforeach
		@endif
		@include("components.addThreadForm")
</div>
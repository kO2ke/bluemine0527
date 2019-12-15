
<div class="w-100 text-right">
	<input type="button" class="create-thread opener btn btn-danger" value="+ Add Child">
</div>
<div class="create-thread form">
	<form class="" action="/create_thread" method="post">

		<div class="form-group">
			<div class="input-group input-group-sm mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Title</span> <input class="form-control" type="text" name="title" value="">
				</div>
			</div>
		</div>

		<div class="form-group">
			<label for="description">Description</label>
			<textarea class="form-control" id="description" rows="3" placeholder="Enter Description..."></textarea>
		</div>

		<input type="submit" name="createThread" value="Create Thread" class="btn btn-primary float-right">

	</form>
</div>
<div id="messages">
	@if (Session::has('message'))
		<div data-alert class="{{ Session::has('class') ? 'alert-box '.Session::get('class') : 'alert-box' }}">
			<p>{{ Session::get('message') }}</p>
			<a href="#" class="close">&times;</a>
		</div>
	@endif
</div>
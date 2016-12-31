@if ($errors->any())
<div class="row">
	<div data-alert class="alert-box alert">
		<p>Hay errores en los campos de entrada</p>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	  	<a href="#" class="close">&times;</a>
	</div>
</div>
@endif
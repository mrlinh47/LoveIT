@if(Session::has('flash_mesage'))
	<div class="alert alert-success {!! Session::get('flash-level')!!}">
		{!! Session::get('flash_mesage') !!}
	</div>
@endif
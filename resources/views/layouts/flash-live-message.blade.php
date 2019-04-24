<!-- @if ($live_message = Session::get('success')) -->
<div class="alert alert-success alert-block">
	<button type="button" class="close">×</button>	
        <strong>{{ $live_message }}</strong>
</div>
<!-- @endif -->


@if ($live_message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close">×</button>	
        <strong>{{ $live_message }}</strong>
</div>
@endif


@if ($live_message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close">×</button>	
	<strong>{{ $live_message }}</strong>
</div>
@endif


@if ($live_message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close">×</button>	
	<strong>{{ $live_message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close">×</button>	
	Please All the check the Display form below for errors
</div>
@endif
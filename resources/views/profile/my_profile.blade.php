@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div id="backdrop"></div>
	<div class="container">
		<div class="col-md-12 text-center" id="avatar">
			<img src="{{asset('images/backdrop.jpeg')}}" class="rounded-circle" alt="Cinque Terre">
		</div>

		<ul class="nav nav-tabs my-3">
		  <li class="nav-item">
		    <a class="nav-link active" data-toggle="tab" href="#individual">As Individual</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#entity">As Entity</a>
		  </li>
		</ul>

		<div class="tab-content">
			@include('profile.individual')
		</div>
	</div>
</div>
@endsection

@push('scripts')
		@if(!is_null($user->spouse))
		<script>
			let spouse = @json(array_except($user->spouse, ['id','user_id']));
		</script>
		@endif
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/borrower/profile.js') }}"></script>
@endpush
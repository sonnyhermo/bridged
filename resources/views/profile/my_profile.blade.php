@extends('layouts.profile')

@section('sub-content')

<div class="card border-primary mb-3">
	<div class="card-header">
		<h4>Type of Borrower</h4>
	</div>
	<div class="card-body">
		<ul class="nav nav-tabs mb-3">
		  <li class="nav-item">
		    <a class="nav-link active" data-toggle="tab" href="#individual">As Individual</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#entity">As Entity</a>
		  </li>
		</ul>

		<div class="tab-content">
	  		<div class="tab-pane active container" id="individual">
				<div id="stepper-profile" class="bs-stepper">
					<div class="bs-stepper-header">
						<div class="step" data-target="#step-personal-info">
							<a href="#">
							<span class="bs-stepper-circle">1</span>
							<span class="bs-stepper-label">Borrower Info</span>
							</a>
						</div>
						<div class="line"></div>
						<div class="step" data-target="#step-income-source">
							<a href="#">
							<span class="bs-stepper-circle">2</span>
							<span class="bs-stepper-label">Source of Income</span>
							</a>
						</div>
						<div class="line"></div>
						<div class="step" data-target="#step-attachment">
							<a href="#">
							<span class="bs-stepper-circle">3</span>
							<span class="bs-stepper-label">Attachments</span>
							</a>
						</div>
					</div>
					<div class="bs-stepper-content">
						<div id="step-personal-info" class="content">
							@include('profile.personal')
						</div>
						<div id="step-income-source" class="content">
							@include('profile.source_of_income')
						</div>
						<div id="step-attachment" class="content">
							@include('profile.attachments')
						</div>
					</div>
				</div>
			</div>


		  	<div class="tab-pane container" id="entity">
		  		<div id="stepper-entity" class="bs-stepper">
					<div class="bs-stepper-header">
						<div class="step" data-target="#step-entity-info">
							<a href="#">
							<span class="bs-stepper-circle">1</span>
							<span class="bs-stepper-label">Entity Info</span>
							</a>
						</div>
						<div class="line"></div>
						<div class="step" data-target="#step-entity-income-source">
							<a href="#">
							<span class="bs-stepper-circle">2</span>
							<span class="bs-stepper-label">Rereferences</span>
							</a>
						</div>
						<div class="line"></div>
						<div class="step" data-target="#step-entity-attachment">
							<a href="#">
							<span class="bs-stepper-circle">3</span>
							<span class="bs-stepper-label">Attachments</span>
							</a>
						</div>
					</div>
					<div class="bs-stepper-content">
						<div id="step-entity-info" class="content">
							@include('profile.entity')
						</div>
						<div id="step-entity-income-source" class="content">
							asdad
						</div>
						<div id="step-entity-attachment" class="content">
							asdad
						</div>
					</div>
				</div>
		  	</div>
		</div>

	</div>
</div>
@endsection

@push('scripts')
	<script src="https://unpkg.com/bs-stepper/dist/js/bs-stepper.min.js"></script>
	<script src="{{ asset('js/garlic.js') }}"></script>
	<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script>
		var profileStepper = new Stepper($('#stepper-profile')[0], {linear:false});
		var entityStepper = new Stepper($('#stepper-entity')[0], {linear:false});
	</script>
	<script src="{{ asset('js/borrower/profile.js') }}"></script>
@endpush
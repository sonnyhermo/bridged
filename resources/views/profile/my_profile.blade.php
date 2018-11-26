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
		  		<div class="col-md-8">
		  			<form>
		  				<div class="form-group">
							<label>Business Type</label>
							<select class="form-control" name="ownership">
								<option value="">Select Business Type</option>
								<option value="corporation">Corporation</option>
								<option value="sole propreitorship">Sole Propreitorship</option>
								<option value="partnership">Partnership</option>
							</select>
						</div>
						<div class="form-group">
							<label>Business Name</label>
							<input type="text" class="form-control" id="txtBusiness" name="business">
						</div>
						<div class="form-group">
							<label>Business Name</label>
							<input type="text" class="form-control" id="txtBusiness" name="business">
						</div>
						<div class="form-group">
							<label>Office Address(Province)</label>
							<input type="text" class="form-control" id="txtOfficeProvince" name="office_province">
						</div>
						<div class="form-group">
							<label>Office Address(Municipality)</label>
							<input type="text" class="form-control" id="txtOfficeMunicipal" name="office_municipal">
						</div>
						<div class="form-group">
							<label>Office Address(Street)</label>
							<input type="text" class="form-control" id="txtOfficeStreet" name="office_street">
						</div>
						<div class="form-group">
							<label>Residence Ownership</label>
							<select class="form-control" name="ownership">
								<option value="">Select Ownership Type</option>
								<option value="owned">Owned</option>
								<option value="mortgaged">Mortgaged</option>
								<option value="rented">Rented</option>
								<option value="living with parents">Living with Parents</option>
								<option value="others">Others</option>
							</select>
						</div>
						<div class="form-group">
							<label>Industry</label>
							<select class="form-control" name="ownership">
								<option value="">Select Industry</option>
							</select>
						</div>
						<div class="form-group">
							<label>Date of Establishment</label>
							<input type="data" class="form-control" id="txtDateEstablished" name="establishment_date">
						</div>
						<div class="form-group">
							<label>Date of Establishment</label>
							<input type="number" class="form-control" id="txtOperationYears" name="operation_year">
						</div>
						<div class="form-group">
							<label>Company SSS</label>
							<input type="text" class="form-control" id="txtCompanySSS" name="company_sss">
						</div>
						<div class="form-group">
							<label>Company TIN</label>
							<input type="text" class="form-control" id="txtCompanyTin" name="company_tin">
						</div>
						<div class="form-group">
							<label>Company Tel No.</label>
							<input type="text" class="form-control" id="txtCompanyTelNo" name="company_tel">
						</div>
						<div class="form-group">
							<label>Company Fax No.</label>
							<input type="text" class="form-control" id="txtCompanyFaxNo" name="company_fax">
						</div>
						<div class="form-group">
							<label>Company Website</label>
							<input type="text" class="form-control" id="txtCompanyWebsite" name="company_web">
						</div>
						<div class="form-group">
							<label>Representative Name</label>
							<input type="text" class="form-control" id="txtCompanyRepresent" name="company_represent">
						</div>
						<div class="form-group">
							<label>Representative Position</label>
							<input type="text" class="form-control" id="txtCompanyRepPosition" name="company_rep_position">
						</div>
						<div class="form-group">
							<label>Representative Contact</label>
							<input type="text" class="form-control" id="txtCompanyRepContact" name="company_rep_contact">
						</div>
						<div class="form-group">
							<label>Representative Years Employed</label>
							<input type="text" class="form-control" id="txtCompanyRepYear" name="company_rep_year">
						</div>
		  			</form>
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
		var myStepper = new Stepper($('#stepper-profile')[0], {linear:false});
		var sample;
	</script>
	<script src="{{ asset('js/profile.js') }}"></script>
@endpush
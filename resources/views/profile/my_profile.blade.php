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
		  		<form data-persist="garlic">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="txtFname">First Name<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtFname" name="firstname" placeholder="Enter First Name">
							</div>
						</div>
						<div class="col-md-4">	
							<div class="form-group">
								<label for="txtMname">Middle Name<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtMname" name="middlename" placeholder="Enter Middle Name">
							</div>
						</div>
						<div class="col-md-4">	
							<div class="form-group">
								<label for="txtSname">Last Name<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtSname" name="lastname" placeholder="Enter Last Name">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
						 	<div class="form-group row">
								<div class="col-md-12">Gender<span class="text-danger">*</span></div>
								<div class="col-md-12">
								 		<div class="form-check-inline">
											<label class="form-check-label">
											<input type="radio" class="form-check-input" name="gender" value="male">Male
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
											<input type="radio" class="form-check-input">Female
											</label>
										</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">	
							<div class="form-group">
								<label>Nationality<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtNationality" name="nationality" placeholder="Enter Nationality">
							</div>
						</div>
						<div class="col-md-4">	
							<div class="form-group">
								<label>Civil Status<span class="text-danger">*</span></label>
								<select class="form-control" name="civil_status">
									<option value="">Select Civil Status</option>
									<option value="married">Married</option>
									<option value="single">Single</option>
									<option value="widow">Widow</option>
									<option value="separated">Separated</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Birth Date<span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="txtBDate" name="birth_date">
							</div>
						</div>
						<div class="col-md-4">	
							<div class="form-group">
								<label>Birth Place<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtBPlace" name="birth_place">
							</div>
						</div>
						<div class="col-md-4">	
							<div class="form-group">
								<label>Mother's Maiden Name</label>
								<input type="text" class="form-control" id="txtMotherName" name="mother_maiden">
							</div>
						</div>
					</div>

					<hr>

					<strong>Present address</strong>
					
					<div class="form-group">
						<label>Street/Subd/Brgy<span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="txtStreet" name="street">
					</div>
					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label>City/Municipality<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtMunicipal" name="municipal">
							</div>
						</div>
						<div class="col-md-5">	
							<div class="form-group">
								<label>Province<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtProvince" name="province">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Length of stay</label>
								<input type="number" class="form-control" id="txtStay" name="stay">
							</div>
						</div>
						<div class="col-md-4">	
							<div class="form-group">
								<label>Residence Ownership</label>
								<select class="form-control" id="selOwnership" name="ownership">
									<option value="">Select Ownership Type</option>
									<option value="owned">Owned</option>
									<option value="mortgaged">Mortgaged</option>
									<option value="rented">Rented</option>
									<option value="living with parents">Living with Parents</option>
									<option value="others">Others</option>
								</select>
							</div>
						</div>
					</div>

					<hr>

					<strong>Permanent Address</strong>
					<div class="form-check mb-3">
						<input class="form-check-input" type="checkbox" value="" id="checkAddress">
						<label class="form-check-label">
							Check the box if same with Present Address
						</label>
					</div>

					<div class="form-group">
						<label>Street/Subd/Brgy<span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="txtStreetPermanent" name="street">
					</div>
					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label>City/Municipality<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtMunicipalPermanent" name="permanent_municipal">
							</div>
						</div>
						<div class="col-md-5">	
							<div class="form-group">
								<label>Province<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtProvincePermanent" name="permanent_province">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Length of stay</label>
								<input type="number" class="form-control" id="txtStayPermanent" name="permanent_stay">
							</div>
						</div>
						<div class="col-md-4">	
							<div class="form-group">
								<label>Residence Ownership</label>
								<select class="form-control" id="selOwnershipPermanent" name="permanent_ownership">
									<option value="">Select Ownership Type</option>
									<option value="owned">Owned</option>
									<option value="mortgaged">Mortgaged</option>
									<option value="rented">Rented</option>
									<option value="living with parents">Living with Parents</option>
									<option value="others">Others</option>
								</select>
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-primary">Save</button>
				</form>	
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
	<script src="{{ asset('js/garlic.js') }}"></script>
@endpush
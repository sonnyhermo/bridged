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
	  			<div class="col-md-8">
			  		<form>
						<div class="form-group">
							<label for="txtFname">First Name<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtFname" name="firstname" placeholder="Enter First Name">
						</div>
						<div class="form-group">
							<label for="txtMname">Middle Name<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtMname" name="middlename" placeholder="Enter Middle Name">
						</div>
						<div class="form-group">
							<label for="txtSname">Last Name<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtSname" name="lastname" placeholder="Enter Last Name">
						</div>
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
						<div class="form-group">
							<label>Nationality<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtNationality" name="nationality" placeholder="Enter Nationality">
						</div>
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
						<div class="form-group">
							<label>Birth Date<span class="text-danger">*</span></label>
							<input type="date" class="form-control" id="txtBDate" name="birth_date">
						</div>
						<div class="form-group">
							<label>Birth Place<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtBPlace" name="birth_place">
						</div>
						<div class="form-group">
							<label>Mother's Maiden Name</label>
							<input type="text" class="form-control" id="txtMotherName" name="mother_maiden">
						</div>
						<div class="form-group">
							<label>Present Address: Province<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtProvince" name="province">
						</div>
						<div class="form-group">
							<label>Present Address: City/Municipality<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtMunicipal" name="municipal">
						</div>
						<div class="form-group">
							<label>Present Address: Street/Subdivision<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtStreet" name="street">
						</div>
						<div class="form-group">
							<label>Length of stay</label>
							<input type="number" class="form-control" id="txtStay" name="stay">
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
							<label>Permanent address<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtPermanent" name="permanent_address">
						</div>
						<div class="form-group">
							<button class="btn btn-primary form-control" type="button" data-toggle="collapse" data-target="#collapseSpouse">Add Spouse Info(If any)</button>
							<div class="collapse" id="collapseSpouse">
								<div class="card card-body">
								Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
								</div>
							</div>
						</div>
						<div class="form-group">
							<button class="btn btn-primary form-control" type="button" data-toggle="collapse" data-target="#collapseCoMaker">Add Co-Maker(If any)</button>
							<div class="collapse" id="collapseCoMaker">
								<div class="card card-body">
								Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Save</button>
					</form>
				</div>
		  	</div>


		  	<div class="tab-pane container" id="entity">
		  		<div class="col-md-8">
		  			<form>
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
		  			</form>
		  		</div>
		  	</div>
		</div>

	</div>
</div>
@endsection
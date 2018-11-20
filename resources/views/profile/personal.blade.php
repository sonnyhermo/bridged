<form data-persist="garlic" id="personal-form">
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

	<button type="submit" class="btn btn-primary" id="btn-profile-submit">Next</button>
</form>
<form data-persist="garlic" id="personal-form">
	@csrf	
	<div class="row">
		<div class="col-md-4">
		 	<div class="form-group row">
                <label>Office Address(Municipality)</label>
				<input type="text" class="form-control" id="txtOfficeMunicipal" name="office_municipal">
			</div>
		</div>
		<div class="col-md-4">	
			<div class="form-group">
			    <label>Office Address(Street)</label>
				<input type="text" class="form-control" id="txtOfficeStreet" name="office_street">
			</div>
		</div>
		<div class="col-md-4">	
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
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
		 	<div class="form-group row">
                <label>Office Address(Municipality)</label>
				<input type="text" class="form-control" id="txtOfficeMunicipal" name="office_municipal">
			</div>
		</div>
		<div class="col-md-4">	
			<div class="form-group">
			    <label>Office Address(Street)</label>
				<input type="text" class="form-control" id="txtOfficeStreet" name="office_street">
			</div>
		</div>
		<div class="col-md-4">	
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
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>Birth Date<span class="text-danger">*</span></label>
				<input type="date" class="form-control" id="txtBDate" name="birth_date" value="{{ ($user['borrower']['birth_date']) ? $user['borrower']['birth_date'] : '' }}" required>
			</div>
		</div>
		<div class="col-md-4">	
			<div class="form-group">
            <label>Industry</label>
				<select class="form-control" name="ownership">
					<option value="">Select Industry</option>
				</select>
			</div>
		</div>
		<div class="col-md-4">	
			<div class="form-group">
            <label>Date of Establishment</label>
				<input type="data" class="form-control" id="txtDateEstablished" name="establishment_date">
			</div>
		</div>
	</div>

	<hr>

	<strong>Present address</strong>

	<div class="form-group">
		<label>Street/Subd/Brgy<span class="text-danger">*</span></label>
		<input type="text" class="form-control" id="txtStreet" name="present_street" value="{{ ($user['borrower']['present_street']) ? $user['borrower']['present_street'] : '' }}">
	</div>
	<div class="row">
		<div class="col-md-7">
			<div class="form-group">
				<label>City/Municipality<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtMunicipal" name="present_city" value="{{ ($user['borrower']['present_city']) ? $user['borrower']['present_city'] : '' }}">
			</div>
		</div>
		<div class="col-md-5">	
			<div class="form-group">
				<label>Province<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtProvince" name="present_province" value="{{ ($user['borrower']['present_province']) ? $user['borrower']['present_province'] : '' }}">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>Length of stay</label>
				<input type="number" class="form-control" id="txtStay" name="present_stay_length" value="{{ ($user['borrower']['present_stay_length']) ? $user['borrower']['present_stay_length'] : '' }}">
			</div>
		</div>
		<div class="col-md-4">	
			<div class="form-group">
				<label>Residence Ownership</label>
				<select class="form-control" id="selOwnership" name="present_ownership">
					<option value="">Select Ownership Type</option>
					<option value="owned" {{ ($user['borrower']['present_ownership'] == 'owned') ? 'selected' : '' }}>Owned</option>
					<option value="mortgaged" {{ ($user['borrower']['present_ownership'] == 'mortgaged') ? 'selected' : '' }}>Mortgaged</option>
					<option value="rented" {{ ($user['borrower']['present_ownership'] == 'rented') ? 'selected' : '' }}>Rented</option>
					<option value="living with parents" {{ ($user['borrower']['present_ownership'] == 'living with parents') ? 'selected' : '' }}>Living with Parents</option>
					<option value="others" {{ ($user['borrower']['present_ownership'] == 'maried') ? 'others' : '' }}>Others</option>
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
		<input type="text" class="form-control" id="txtStreetPermanent" name="permanent_street" value="{{ ($user['borrower']['permanent_street']) ? $user['borrower']['permanent_street'] : '' }}">
	</div>
	<div class="row">
		<div class="col-md-7">
			<div class="form-group">
				<label>City/Municipality<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtMunicipalPermanent" name="permanent_city" value="{{ ($user['borrower']['permanent_city']) ? $user['borrower']['permanent_city'] : '' }}">
			</div>
		</div>
		<div class="col-md-5">	
			<div class="form-group">
				<label>Province<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtProvincePermanent" name="permanent_province" value="{{ ($user['borrower']['permanent_province']) ? $user['borrower']['permanent_province'] : '' }}">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>Length of stay</label>
				<input type="number" class="form-control" id="txtStayPermanent" name="permanent_stay_length" value="{{ ($user['borrower']['permanent_stay_length']) ? $user['borrower']['permanent_stay_length'] : '' }}">
			</div>
		</div>
		<div class="col-md-4">	
			<div class="form-group">
				<label>Residence Ownership</label>
				<select class="form-control" id="selOwnershipPermanent" name="permanent_ownership">
					<option value="">Select Ownership Type</option>
					<option value="owned" {{ ($user['borrower']['permanent_ownership'] == 'owned') ? 'selected' : '' }}>Owned</option>
					<option value="mortgaged" {{ ($user['borrower']['permanent_ownership'] == 'mortgaged') ? 'selected' : '' }}>Mortgaged</option>
					<option value="rented" {{ ($user['borrower']['permanent_ownership'] == 'rented') ? 'selected' : '' }}>Rented</option>
					<option value="living with parents" {{ ($user['borrower']['permanent_ownership'] == 'living with parents') ? 'selected' : '' }}>Living with Parents</option>
					<option value="others" {{ ($user['borrower']['permanent_ownership'] == 'maried') ? 'others' : '' }}>Others</option>
				</select>
			</div>
		</div>
	</div>

	<button type="submit" class="btn btn-primary" id="btn-profile-submit">Next</button>
</form>
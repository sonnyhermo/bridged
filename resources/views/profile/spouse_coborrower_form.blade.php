<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label>First Name<span class="text-danger">*</span></label>
			<input type="text" name="firstname" class="form-control txtSpouseCoBorrowerFname" placeholder="Enter First Name" required>
		</div>
	</div>
	<div class="col-md-4">	
		<div class="form-group">
			<label >Middle Name<span class="text-danger">*</span></label>
			<input type="text" name="middlename" class="form-control txtSpouseCoBorrowerMname" placeholder="Enter Middle Name" required>
		</div>
	</div>
	<div class="col-md-4">	
		<div class="form-group">
			<label>Last Name<span class="text-danger">*</span></label>
			<input type="text" name="lastname" class="form-control txtSpouseCoBorrowerSname" placeholder="Enter Last Name" required>
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
					<input type="radio" class="form-check-input" name="gender" value="0">Male
					</label>
				</div>
				<div class="form-check-inline">
					<label class="form-check-label">
					<input type="radio" class="form-check-input" name="gender" value="1">Female
					</label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">	
		<div class="form-group">
			<label>Nationality<span class="text-danger">*</span></label>
			<input type="text" class="form-control txtSpouseCoBorrowerNationality" name="nationality" placeholder="Enter Nationality" required>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Birth Date<span class="text-danger">*</span></label>
			<input type="date" class="form-control txtSpouseCoBorrowerBDate" name="birth_date" required>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<label>Residence Address<span class="text-danger">*</span></label>
			<input type="text" class="form-control txtSpouseCoBorrowerResidence" name="residence_address" placeholder="Enter Residence Address" required>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group">
			<label>Employer/Business Name<span class="text-danger">*</span></label>
			<input type="text" class="form-control txtSpouseCoBorrowerEmployer" name="employer" placeholder="Enter Employer Name" required>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label >Industry <span class="text-danger">*</span></label>
			<select class="form-control" name="industry" required>
				<option value="">Select Industry</option>
				@foreach($industries->industries as $industry)
				<option value="{{ $industry }}">{{ $industry }}</option>
				@endforeach
			</select>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<label>Employer/Business Address<span class="text-danger">*</span></label>
			<input type="text" class="form-control txtSpouseCoBorrowerBusinessAdd" name="employer_address" placeholder="Enter Business Address" required>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="form-group">
			<label>Job Title/Position<span class="text-danger">*</span></label>
			<input type="text" class="form-control txtSpouseCoBorrowerJob" name="position" placeholder="Enter Job Title" required>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Tenure<span class="text-danger">*</span></label>
			<input type="number" class="form-control txtSpouseCoBorrowerTenure" name="tenure" placeholder="Enter Tenure" required>
		</div>
	</div>
</div>
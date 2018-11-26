<form data-persist="garlic" id="income-form">
	<div id="divSourceFund">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="txtFname">Source of Fund <span class="text-danger">*</span></label>
					<input type="text" class="form-control" id="txtFund" name="fund[]" placeholder="Enter First Name">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="txtFname">Employer/Business Name <span class="text-danger">*</span></label>
					<input type="text" class="form-control" id="txtEmployer" name="employer[]" placeholder="Enter First Name">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="txtFname">Industry <span class="text-danger">*</span></label>
					<input type="text" class="form-control" id="txtIndustry" name="industry[]" placeholder="Enter First Name">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<div class="form-group">
					<label for="txtFname">Job/Position <span class="text-danger">*</span></label>
					<input type="text" class="form-control" id="txtJob" name="job[]" placeholder="Enter First Name">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="txtFname">Length Operation <span class="text-danger">*</span></label>
					<input type="text" class="form-control" id="txtLengthEmployed" name="length_employed[]" placeholder="Enter First Name">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="txtFname">Monthly Income <span class="text-danger">*</span></label>
					<input type="text" class="form-control" id="txtIncome" name="income[]" placeholder="Enter First Name">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">	
				<div class="form-group">
					<label for="txtFname">Employer/Business Tel No.</label>
					<input type="text" class="form-control" id="txtEmployerTel" name="employer_tel[]" placeholder="Enter First Name">
				</div>
			</div>
			<div class="col-md-6">	
				<div class="form-group">
					<label for="txtFname">Employer/Business Email Address</label>
					<input type="text" class="form-control" id="txtEmployerEmail" name="employer_email[]" placeholder="Enter First Name">
				</div>
			</div>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-md-2">
			<button class="btn btn-warning" id="btnAddIncome"><strong>Add More Income</strong></button>
		</div>
	</div>

	<div class="mb-4" id="divMoreIncome">
	</div>
	<button type="submit" class="btn btn-primary" id="btn-fund-submit">Next</button>
	<button class="btn btn-primary previous" onclick="myStepper.previous()">Previous</button>
</form>
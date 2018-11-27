

<div id="divSourceFund">
	<form data-persist="garlic" class="income-form">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="txtFname">Source of Fund <span class="text-danger">*</span></label>
					<select class="form-control" name="source">
						<option value="">Select Source of fund</option>
						<option value="ofw">OFW</option>
						<option value="employed">Employed</option>
						<option value="self-employed">Self-employed</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="txtFname">Employer/Business Name <span class="text-danger">*</span></label>
					<input type="text" class="form-control" id="txtEmployer" name="employer_name" placeholder="Enter Employer/Business">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="txtFname">Industry <span class="text-danger">*</span></label>
					<select class="form-control" name="industry">
						<option value="">Select Industry</option>
						@foreach($industries->industries as $industry)
						<option value="{{ $industry }}">{{ $industry }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<div class="form-group">
					<label for="txtFname">Job/Position <span class="text-danger">*</span></label>
					<input type="text" class="form-control" id="txtPosition" name="position" placeholder="Enter Job/Position">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="txtFname">Length Operation <span class="text-danger">*</span></label>
					<input type="text" class="form-control" id="txtLengthEmployed" name="operation_length" placeholder="Year-Month">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="txtFname">Monthly Income <span class="text-danger">*</span></label>
					<input type="text" class="form-control" id="txtIncome" name="monthly_income" placeholder="Enter Monthly Income">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">	
				<div class="form-group">
					<label for="txtFname">Employer/Business Tel No.</label>
					<input type="text" class="form-control" id="txtEmployerTel" name="employer_tel" placeholder="Enter Employer Tel#">
				</div>
			</div>
			<div class="col-md-6">	
				<div class="form-group">
					<label for="txtFname">Employer/Business Email Address</label>
					<input type="text" class="form-control" id="txtEmployerEmail" name="employer_email" placeholder="Enter Employer Email">
				</div>
			</div>
		</div>
	</form>
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
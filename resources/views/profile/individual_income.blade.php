<div class="modal fade" id="ifundModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Source of Income</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="/incomes" id="income-form">	
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="txtFname">Source of Fund <span class="text-danger">*</span></label>
								<select class="form-control" name="source" required>
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
								<input type="text" class="form-control" id="txtEmployer" name="employer_name" placeholder="Enter Employer/Business" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="txtFname">Industry <span class="text-danger">*</span></label>
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
								<label>Employer/Business Address</label>
								<input type="text" class="form-control" id="txtEmployerAddress" name="employer_address" placeholder="Enter Employer Address" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label for="txtFname">Job/Position <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtPosition" name="position" placeholder="Enter Job/Position" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="txtFname">Length Operation <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtLengthEmployed" name="operation_length" placeholder="Year-Month" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="txtFname">Monthly Income <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtIncome" name="monthly_income" placeholder="Enter Monthly Income" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">	
							<div class="form-group">
								<label for="txtFname">Employer/Business Tel No.</label>
								<input type="text" class="form-control" id="txtEmployerTel" name="employer_tel" placeholder="Enter Employer Tel#" required>
							</div>
						</div>
						<div class="col-md-6">	
							<div class="form-group">
								<label for="txtFname">Employer/Business Email Address</label>
								<input type="text" class="form-control" id="txtEmployerEmail" name="employer_email" placeholder="Enter Employer Email" required>
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
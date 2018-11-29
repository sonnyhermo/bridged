<form id="attachment-form" enctype="multipart/form-data">
	<div class="row mb-4">
		<div class="col-md-12">
			<strong><p>LOAN REQUIREMENTS FOR:</p></strong>
		</div>
	</div>
	<div class="form-group row i-requirement">
		<div class="col-md-5">
			<input type="text" class="form-control form-control-sm" name="filename" value="Two(2) Gov't Issued ID - Front & Back">
		</div>
		<div class="col-md-7">
			<input type="file" class="form-control-file" name="files" multiple>
		</div>
	</div>
	<div class="form-group row i-requirement">
		<div class="col-md-5">
			<input type="text" class="form-control form-control-sm" name="filename" value="Company ID - Front & Back">
		</div>
		<div class="col-md-7">
			<input type="file" class="form-control-file" name="files" multiple>
		</div>
	</div>
	<div class="form-group row i-requirement">
		<div class="col-md-5">
			<input type="text" class="form-control form-control-sm" name="filename" value="Latest Proof of Billing">
		</div>
		<div class="col-md-7">
			<input type="file" class="form-control-file" name="files" multiple>
		</div>
	</div>
	<div class="form-group row i-requirement">
		<div class="col-md-5">
			<input type="text" class="form-control form-control-sm" name="filename" value="Payslip (ideally 3 Months)">
		</div>
		<div class="col-md-7">
			<input type="file" class="form-control-file" name="files" multiple>
		</div>
	</div>
	<div class="form-group row i-requirement">
		<div class="col-md-5">
			<input type="text" class="form-control form-control-sm" name="filename" value="Certificate of Employment / COE">
		</div>
		<div class="col-md-7">
			<input type="file" class="form-control-file" name="files" multiple>
		</div>
	</div>
	<div class="form-group row i-requirement mb-4">
		<div class="col-md-5">
			<input type="text" class="form-control form-control-sm" name="filename" value="Latest Income Tax Return / ITR">
		</div>
		<div class="col-md-7">
			<input type="file" class="form-control-file" name="files" multiple>
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-md-12">
			<button class="btn btn-info">Add More Document</button>
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-md-12">
			<p>Too many documents? Click here</p>
			<button class="btn btn-warning">
				Request for pick up
			</button>
		</div>
	</div>

	<button class="btn btn-primary" id="btn-iattach">Save</button>
	<button class="btn btn-primary" onclick="myStepper.previous()">Previous</button>
</form>
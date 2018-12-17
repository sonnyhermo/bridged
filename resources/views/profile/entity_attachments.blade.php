<form id="attachment-form" enctype="multipart/form-data">
	<div class="row mb-4">
		<div class="col-md-12">
			<strong><p>LOAN REQUIREMENTS FOR:</p></strong>
		</div>
	</div>
	<div class="form-group row i-requirement">
		<div class="col-md-5">
			<input type="text" class="form-control form-control-sm" name="idRep" value="Two(2) Valid ID of Representative">
		</div>
		<div class="col-md-7">
			<input type="file" class="form-control-file" name="files" multiple>
		</div>
	</div>
	<div class="form-group row i-requirement">
		<div class="col-md-5">
			<input type="text" class="form-control form-control-sm" name="txtProofB" value="Proof of Billing">
		</div>
		<div class="col-md-7">
			<input type="file" class="form-control-file" name="files" multiple>
		</div>
	</div>
	<div class="form-group row i-requirement">
		<div class="col-md-5">
			<input type="text" class="form-control form-control-sm" name="txtCProfile" value="Company Profile">
		</div>
		<div class="col-md-7">
			<input type="file" class="form-control-file" name="files" multiple>
		</div>
	</div>
	<div class="form-group row i-requirement">
		<div class="col-md-5">
			<input type="text" class="form-control form-control-sm" name="txtSec" value="SEC Registration">
		</div>
		<div class="col-md-7">
			<input type="file" class="form-control-file" name="files" multiple>
		</div>
	</div>
	<div class="form-group row i-requirement">
		<div class="col-md-5">
			<input type="text" class="form-control form-control-sm" name="txtPermit" value="Business / Mayor's Permit / BIR">
		</div>
		<div class="col-md-7">
			<input type="file" class="form-control-file" name="files" multiple>
		</div>
	</div>
	<div class="form-group row i-requirement mb-4">
		<div class="col-md-5">
			<input type="text" class="form-control form-control-sm" name="txtBStatement" value="3 months Latest Bank Statement">
		</div>
		<div class="col-md-7">
			<input type="file" class="form-control-file" name="files" multiple>
		</div>
	</div>
    <div class="form-group row i-requirement mb-4">
		<div class="col-md-5">
			<input type="text" class="form-control form-control-sm" name="txtIFS" value="2-3 years In-House Financial Statement">
		</div>
		<div class="col-md-7">
			<input type="file" class="form-control-file" name="files" multiple>
		</div>
	</div>
    <div class="form-group row i-requirement mb-4">
		<div class="col-md-5">
			<input type="text" class="form-control form-control-sm" name="txtAFS" value="2-3 years Audited Financial Statement">
		</div>
		<div class="col-md-7">
			<input type="file" class="form-control-file" name="files" multiple>
		</div>
	</div>
    <div class="form-group row i-requirement mb-4">
		<div class="col-md-5">
			<input type="text" class="form-control form-control-sm" name="txtListCustSup" value="List of Customers and Suppliers">
		</div>
		<div class="col-md-7">
			<input type="file" class="form-control-file" name="files" multiple>
		</div>
	</div>
    <div class="form-group row i-requirement mb-4">
		<div class="col-md-5">
			<input type="text" class="form-control form-control-sm" name="txtRP" value="List of Receivables and Payables">
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
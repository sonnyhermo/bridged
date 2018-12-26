<div class="modal fade" id="iattachmentModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Upload File</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="individual-attachment-form" enctype="multipart/form-data">
					<div class="form-group">
						<label>Document Type</label>
						<select name="document_type" class="form-control">
							<option value="">Select Document Type</option>
							<option value="issued_id">Gov't Issued Id</option>
							<option value="company_id">Company ID</option>
							<option value="billing">Proof of Billing</option>
							<option value="payslip">Payslip </option>
							<option value="coe">Certificate of Employment (COE)</option>
							<option value="itr">Income Tax Return (ITR)</option>
							<option value="other">Other</option>
						</select>
					</div>
					<div class="form-group">
						<label>Filename</label>
						<input type="text" name="filename" class="form-control" placeholder="Enter Filename" required>
					</div>
					<div class="form-group">
						<label>Filename</label>
						<input type="file" name="file" class="form-control" required>
					</div>

					<button class="btn btn-primary" id="btn-iattach">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>

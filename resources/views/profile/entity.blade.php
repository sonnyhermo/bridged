<form data-persist="garlic" id="entity-form">
	@csrf	

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Type of Business<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtBusinessType">
			</div>
		</div>
	</div>

	<strong>Office Principal Address</strong>

	<div class="row">
		<div class="col-md-8">
			<div class="form-group">
				<label>Business Name<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtBusinessName">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Industry<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtIndustry">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>Street/Subd/Brgy<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtBusinessAddress">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
			<div class="form-group">
				<label>City/Municipality<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtBusinessCity">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Province<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtBusinessProvince">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>Years Operate<span class="text-danger">*</span></label>
				<input type="number" class="form-control" id="txtBusinessOperate">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Company SSS<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtBusinessSSS">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Company Tin<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtBusinessTin">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>Company Tel#<span class="text-danger">*</span></label>
				<input type="number" class="form-control" id="txtBusinessTel">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Company Website<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtBusinessWebsite">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Ave. Monthly Income<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtBusinessIncome">
			</div>
		</div>
	</div>

	<strong>Representative Details (usually Owner/Executive)</strong>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Name of Representative<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtBusinessRep">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Position of Representative</label>
				<input type="text" class="form-control" id="txtBusinessRepPosition">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>Contact No.<span class="text-danger">*</span></label>
				<input type="number" class="form-control" id="txtBusinessRepContact">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Email Address</label>
				<input type="text" class="form-control" id="txtBusinessRepAddress">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Years Employed</label>
				<input type="text" class="form-control" id="txtBusinessRepEmployed">
			</div>
		</div>
	</div>
	
	<button type="submit" class="btn btn-primary" id="btn-entity-submit">Next</button>
</form>
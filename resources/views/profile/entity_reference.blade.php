<form data-persist="garlic" id="entity-reference">
	@csrf	



	<strong>Trade Reference</strong>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>Name of Supplier<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtNameSupp1">
                <input type="text" class="form-control" id="txtNameSupp2">
                <input type="text" class="form-control" id="txtNameSupp3">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Contact No<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtSupContact1">
                <input type="text" class="form-control" id="txtSupContact2">
                <input type="text" class="form-control" id="txtSupContact3">
			</div>
		</div>
        <div class="col-md-4">
			<div class="form-group">
				<label>Contact Person<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtSupCPerson1">
                <input type="text" class="form-control" id="txtSupCPerson2">
                <input type="text" class="form-control" id="txtSupCPerson3">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>Name of Customer<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtCustName1">
                <input type="text" class="form-control" id="txtCustName2">
                <input type="text" class="form-control" id="txtCustName3">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Contact No<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtCustContact1">
                <input type="text" class="form-control" id="txtCustContact2">
                <input type="text" class="form-control" id="txtCustContact3">
			</div>
		</div>
        <div class="col-md-4">
			<div class="form-group">
				<label>Contact Person<span class="text-danger">*</span></label>
				<input type="text" class="form-control" id="txtCustCPerson1">
                <input type="text" class="form-control" id="txtCustCPerson2">
                <input type="text" class="form-control" id="txtCustCPerson3">
			</div>
		</div>
	</div>
    <strong>Bank Reference</strong>

<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label>Name of Bank/Branch<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="txtNameBank1">
            <input type="text" class="form-control" id="txtNameBank2">
            <input type="text" class="form-control" id="txtNameBank3">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Type of Account<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="txtTypeAccount1">
            <input type="text" class="form-control" id="txtTypeAccount2">
            <input type="text" class="form-control" id="txtTypeAccount3">
        </div>
    </div>
   </div>
   <strong>Credit Reference</strong>
   <div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label>Name of Credit Card/Creditor<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="txtNameCC1">
            <input type="text" class="form-control" id="txtNameCC2">
            <input type="text" class="form-control" id="txtNameCC3">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Credit limit/Loan Amount<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="txtCLimit1">
            <input type="text" class="form-control" id="txtCLimit2">
            <input type="text" class="form-control" id="txtCLimit3">
        </div>
    </div>
   </div>

	
	<button type="submit" class="btn btn-primary" id="btn-entity-submit">Next</button>
</form>
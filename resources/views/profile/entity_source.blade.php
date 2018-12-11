@extends('layouts.profile')

@section('sub-content')
<div class="card border-primary mb-3">
	<div class="card-header">
		<h4>Type of Borrower</h4>
	</div>
	<div class="card-body">
		<ul class="nav nav-tabs mb-3">
		  <li class="nav-item">
		    <a class="nav-link active" data-toggle="tab" href="#individual">As Individual</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" data-toggle="tab" href="#entity">As Entity</a>
		  </li>
		</ul>

		<div class="tab-content">
	  		<div class="tab-pane active container" id="individual">
	  			<div class="col-md-8">
			  		<form>
						<div class="form-group">
							<label for="txtSincome">Source of Income<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtSincome" name="sourceincome" placeholder="Enter Source of Income">
						</div>
						<div class="form-group">
							<label for="txtEBname">Employer / Business Name<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtEBname" name="EBname" placeholder="Enter Employer/Business Name">
						</div>
						<div class="form-group">
							<label for="txtEBaddress">Employer / Business Address<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtEBaddress" name="EBaddress" placeholder="Enter Employer/Business Address">
						</div>
                        <div class="form-group">
							<label for="txtEindustry">Industry<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtEindustry" name="industry" placeholder="Enter Industry">
						</div>
                        <div class="form-group">
							<label for="txtjobtitle">Job Title<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtjobtitle" name="jobtitle" placeholder="Enter your Job Title">
						</div>
                        <div class="form-group">
							<label for="txtLemployed">Lenght Employed / In Operation<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtLemployed" name="Lemployed" placeholder="Enter Lenght Employed / In Operation">
						</div> 
                        <div class="form-group">
							<label for="txtLemployed">Monthly Income<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtLemployed" name="Lemployed" placeholder="Enter Lenght Employed / In Operation">
						</div>    
                        <div class="form-group">
							<label for="txtLemployed">Annual Income<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtLemployed" name="Lemployed" placeholder="Enter Lenght Employed / In Operation">
						</div>    
                        <div class="form-group">
							<label for="txtLemployed">Employer / Business Tel No.<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtLemployed" name="Lemployed" placeholder="Enter Lenght Employed / In Operation">
						</div>    
                        <div class="form-group">
							<label for="txtLemployed">Employer / Business Email Address<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="txtLemployed" name="Lemployed" placeholder="Enter Lenght Employed / In Operation">
						</div>    
                        
						
						<button type="submit" class="btn btn-primary">Save</button>
					</form>
				</div>
		  	</div>


		  	<div class="tab-pane container" id="entity">
		  		<div class="col-md-8">
		  			<form>
		  				<div class="form-group">
							<label>Source of Income</label>
							
						</div>
		  			</form>
		  		</div>
		  	</div>
		</div>

	</div>
</div>
@endsection
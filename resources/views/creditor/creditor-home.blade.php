@extends('layouts/app_creditor')

@section('content')
<style>
  .uper {
    margin-top: 10px;
  }
</style>
<div class="card uper">
  
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
      <form method="post" action="">
     <div class="col-md-12">
			<ul class="nav nav-tabs">
      <li class="nav-item">
      <a class="nav-link active" href="">Summary</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/creditor/creditorinfo">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#menu1">Documents</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#menu1">Inquiries</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#menu1">Credit Checking</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#menu1">Existing Loan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#menu1">Messages</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#menu1">Update</a>
    </li>
   
  </ul>

  <!-- Tab panes 
  <br><button type="submit" class="btn btn-primary" >Edit</button>
          <button type="submit" class="btn btn-primary" >Save</button><br>-->

          <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
      
        <button class="btn col-md-12"  >
        Loan Details
        </button>
      </h5>
    </div>
    

    <div class="row">
      <div class="col-md-6">
			<div class="form-group">
      Barrower Type:
			</div>
		</div>
   
    <div class="col-md-6">
			<div class="form-group">
      Loan Type:
			</div>
		</div>
   
    </div>
    
    <div class="row">
    <div class="col-md-6">
			<div class="form-group">
      Availment Type
			</div>
		</div>
   
    <div class="col-md-6">
			<div class="form-group">
      Loan Classification
			</div>
		</div>
   
    </div>

    <div class="row">
    <div class="col-md-6">
			<div class="form-group">
      Date Applied
			</div>
		</div>
    <div class="col-md-6">
			<div class="form-group">
      Loan Amount
			</div>
		</div>
    </div>

    <div class="row">
    <div class="col-md-6">
			<div class="form-group">
      Loan Stage
			</div>
		</div>
  
    <div class="col-md-6">
			<div class="form-group">
      Loan Purpose
			</div>
		</div>
  
    </div>

    <div class="row">
    <div class="col-md-6">
			<div class="form-group">
      Loan Status
			</div>
		</div>
  
    <div class="col-md-6">
			<div class="form-group">
      Loan Term
			</div>
		</div>
    
    </div>

    <div class="row">
    <div class="col-md-6">
			<div class="form-group">
      Approve Amount
			</div>
		</div>
   
    <div class="col-md-6">
			<div class="form-group">
      Collateral
			</div>
		</div>
    </div>
    <div class="row">
    <div class="col-md-6">
			<div class="form-group">
      Date Approved
			</div>
		</div>
   
    <div class="col-md-6">
			<div class="form-group">
      Interest Applied
			</div>
		</div>
  </div>
    </div>

    <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
      
        <button class="btn col-md-12"  >
        Credit Checking
        </button>
      </h5>
    </div>
    

    <div class="row">
      <div class="col-md-6">
			<div class="form-group">
      Overall Credit Score
			</div>
		</div>
    <div class="col-md-6">
			<div class="form-group">
      Income Verification
			</div>
		</div>
    </div>

    <div class="row">
      <div class="col-md-6">
			<div class="form-group">
      Risk Profile
			</div>
		</div>
    <div class="col-md-6">
			<div class="form-group">
     Trade Cheking:Supplier
			</div>
		</div>
    </div>

    <div class="row">
      <div class="col-md-6">
			<div class="form-group">
      CIC/CMAP/NFIS records
			</div>
		</div>
    <div class="col-md-6">
			<div class="form-group">
      Trade Cheking:Customer
			</div>
		</div>
    </div>

    <div class="row">
      <div class="col-md-6">
			<div class="form-group">
      
			</div>
		</div>
    <div class="col-md-6">
			<div class="form-group">
      Neighborhood Cheking
			</div>
		</div>
    </div>

    <div class="row">
      <div class="col-md-6">
			<div class="form-group">
      
			</div>
		</div>
    <div class="col-md-6">
			<div class="form-group">
      Brgy. Cheking
			</div>
		</div>
    </div>
    
    <div class="row">
      <div class="col-md-6">
			<div class="form-group">
      
			</div>
		</div>
    <div class="col-md-6">
			<div class="form-group">
      Bank Relationship
			</div>
		</div>
    </div>
    </div>
    <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
      
        <button class="btn col-md-12"  >
        Notes and Comments
        </button>
      </h5>
    </div>
    </div>

    <div class="row">
      <div class="col-md-6">
			<div class="form-group">
      Frontline Coordinator
			</div>
		</div>
    </div>
    <div class="row">
    <div class="col-md-6">
			<div class="form-group">
      Approver
			</div>
		</div>
    </div>
    </div>
   
   
   
   

	  
      </form>
  </div>
</div>
@endsection

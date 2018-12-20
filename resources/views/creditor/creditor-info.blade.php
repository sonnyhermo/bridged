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
      <a class="nav-link" href="/creditor/creditorhome">Summary</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="">Profile</a>
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
          
          <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
      
        <button class="btn btn-link col-md-12" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Barrower Info
        </button>
      </h5>
    </div>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      <div class="row">
      <div class="col-md-4">
			<div class="form-group">
     
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      <strong>Main Barrower</strong>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			<strong>Barrower's Spouse</strong>
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Customer ID:</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>
  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>First Name :</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>
  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Middle Name :</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Last Name :</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Gender :</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Nationality :</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Civil Status :</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Birthdate</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>
  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Birthplace</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Mother's Maiden Name</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Present Address (Province):</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>


  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Present Address (City/Municipality):</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>
  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Present Address (Street/Subdivision):</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>


    
     
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
      
      <button class="btn col-md-12" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      Source of Income
        </button>
      </h5>
    </div>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      <div class="row">
      <div class="col-md-4">
			<div class="form-group">
     
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      <strong>Main Barrower</strong>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			<strong>Barrower's Spouse</strong>
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Source of Fund:</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Employer / Business Name :</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Employer / Business Address :</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Industry :</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Job Title :</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Lenght Employed / In Operation :</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Monthly Income :</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Annual Income :</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label> Employer / Business Tel. No:</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Employer / Business Email Address :</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
      <button class="btn col-md-12" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      Co-Maker Info
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">

      <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Relationship to the Barrower</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      <label>Source of Fund</label>
			</div>
		</div>
    <div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Fitstname</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			<label>Employer/Business Name</label>
			</div>
		</div>
    <div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Middlename:</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			<label>Employer/Business Address</label>
			</div>
		</div>
    <div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Lastname</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      <label>Industry</label>
			</div>
		</div>
    <div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Gender</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      <label>My Job Title</label>
			</div>
		</div>
    <div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Nationality</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      <label>Length Employed/in Operation</label>
			</div>
		</div>
    <div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Civil Status</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      <label>Monthly Income</label>
			</div>
		</div>
    <div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>BIthdate</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      <label>Annual Income</label>
			</div>
		</div>
    <div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Birthplace</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      <label>Mother's Maiden Name(Optional)</label>
			</div>
		</div>
    <div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

  <div class="row">
      <div class="col-md-4">
			<div class="form-group">
      <label>Source of Fund:</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
      <label>Employer/Business Email Address</label>
			</div>
		</div>
    <div class="col-md-4">
			<div class="form-group">
			
			</div>
		</div>
	</div>

      </div>
    </div>
  </div>
</div>
</div>


      </form>
  </div>
</div>
@endsection

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
  <div class="card-header">
    Loan Details
  </div>
  <div class="tab-content border mb-3">
    <div id="home" class="container tab-pane active"><br>
    
      Barrower Type: <br>
      Availment Type: <br> 
      Date Applied: <br> 
      Loan Stage : <br> 
      Loan Status : <br> <br>
      <br>
   
   
   

	  
			
	 
     <div class="card-header">
    Credit Checking
  </div><br>
      
      Overall Credit Store: <br>
      Risk Profile : <br> 
      CIC / CMAP/ NFIS records : <br> 
      <br>
      <br>  
       
     <div class="card-header">
    Notes and Comments
  </div><br> 
  Frontline Coordinator: <br>
      Approver : <br> <br>
      </div>
      </form>
  </div>
</div>
@endsection

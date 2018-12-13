@extends('layouts.app_admin')

@section('content')

	@include('layouts.messages')

	<div class="row">
		<div class="col-md-12 mb-3">
			<button type="button" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#newAdminModal">
				Add Admin <span class="fa fa-plus" aria-hidden="true"></span>
			</button>
		</div>

		<div class="col-md-12">
			<div class="card">
		        <div class="card-header">
		            <div class="clearfix">
						<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#newCreditorModal">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</button>
			            <h4 class="card-title">Creditors</h4>
					</div>
		            <p class="card-category">List of Banks Creditors</p>
		        </div>
	            <div class="card-body">
	           		<table class="table table-striped" id="creditorTable">
	           			<thead>
	           				<tr>
	           					<th>Bank</th>
	           					<th>Creditor</th>
	           					<th>Email</th>
	           					<th>Actions</th>
	           				</tr>
	           			</thead>
	           			<tbody>	

	           			</tbody>
	           		</table>
		        </div>
		    </div>
		</div>
	</div>

	<!-- Modal For Adding Creditor -->
	<div class="modal fade" id="newCreditorModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">New Creditor</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="creditorForm">
						@csrf

						<div class="form-group row">
                            <label class="col-md-4 text-right col-form-label">Bank</label>

                            <div class="col-md-8">
                                <select class="form-control" name="bank_id" id="selectBank" required>
                                	<option value="">Choose Creditor Bank</option>
                                	@foreach($banks as $bank)
                                	<option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                	@endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 text-right col-form-label">Firstname</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="firstname" id="txtFirstname" placeholder="Enter Firstname" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 text-right col-form-label">Middle Name</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="middlename" placeholder="Enter Middle Name" id="txtMiddlename" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 text-right col-form-label">Last Name</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="lastname" id="txtLastname" placeholder="Enter Last Name" required>
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label class="col-md-4 text-right col-form-label">Email Address</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="email" id="txtEmail" placeholder="Enter Email" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 text-right col-form-label">Password</label>

                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password" id="txtPassword" placeholder="Enter Password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 text-right col-form-label">Confirm Password</label>

                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password_confirmation" id="txtCofirmPass" placeholder="Re-Enter Password" required>
                            </div>
                        </div>

						<button type="submit" class="btn btn-primary btn-fill">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('script')
	<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/admin/users.js') }}"></script>
@endpush
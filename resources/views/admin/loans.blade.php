@extends('layouts.app_admin')

@section('content')

	@include('layouts.messages')
	
	<div class="row">
		<div class="col-md-12 mb-3">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newLoanModal">
				Add Loans <span class="fas fa-plus fa-sm"></span>
			</button>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loanListModal">
				Loan List <span class="fas fa-list fa-sm"></span>
			</button>
		</div>

		<div class="col-md-7">
			<div class="card">
		        <div class="card-header">
		        	<div class="clearfix">
						<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#newSpecModal">
							<i class="fas fa-plus fa-sm"></i>
						</button>
			            <h4 class="card-title">Specification</h4>
					</div>
		            <p class="card-category">List of Specification</p>
		        </div>
	            <div class="card-body">
	           		<table class="table table-striped" id="loanSpecTable">
	           			<thead>
	           				<tr>
	           					<th>Loan Type</th>
	           					<th>Specfication</th>
	           					<th>Collateral</th>
	           				</tr>
	           			</thead>

	           			<tbody>

	           			</tbody>
	           		</table>
		        </div>
		    </div>
		</div>

		<div class="col-md-5">
			<div class="card">
		        <div class="card-header">
		            <div class="clearfix">
						<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#newPurposeModal">
							<i class="fas fa-plus fa-sm"></i>
						</button>
			            <h4 class="card-title">Purpose</h4>
					</div>
		            <p class="card-category">List of Purpose</p>
		        </div>
	            <div class="card-body">
	           		<table class="table table-striped" id="loanPurposeTable">
	           			<thead>
	           				<tr>
	           					<th>Loan Type</th>
	           					<th>Purpose</th>
	           				</tr>
	           			</thead>
	           			<tbody>	

	           			</tbody>
	           		</table>
		        </div>
		    </div>
		</div>
	</div>


	<!-- Modal For New loan-->
	<div class="modal fade" id="newLoanModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">New Loan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="/admin/loans" method="POST">
						@csrf

						<div class="form-group">
							<label>Loan Type</label>
							<input class="form-control" name="loan" id="txtNewLoan" placeholder="Enter New Loan Type">
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal For Loan List-->
	<div class="modal fade" id="loanListModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">List of Loans</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<ul>
					<table class="table table-striped">
	           			<thead>
	           				<tr>
	           					<th>Loan Type</th>
	           					<th>Action</th>
	           				</tr>
	           			</thead>

	           			<tbody>
	           				@foreach($loans as $loan)
	           				<tr>
	           					<td>{{ $loan->type }}</td>
	           					<td><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></i></button></td>
	           				</tr>
	           				@endforeach
	           			</tbody>
	           		</table>
					</ul>	
				</div>
			</div>
		</div>
	</div>

	<!-- Modal For Loan Spec-->
	<div class="modal fade" id="newSpecModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="/admin/specifications" method="POST">
						@csrf

						<div class="form-group">
							<label>Loan Type</label>
							<select class="form-control" name="loan_id" id="selectLoan">
								<option value="">Select Loan Type</option>
								@foreach($loans as $loan)
								<option value="{{ $loan->id }}">{{ $loan->type }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Description</label>
							<input class="form-control" name="description" id="txtLoanDescription" placeholder="Enter New Loan Type">
						</div>
						<div class="form-group">
							<label>Collateral</label>
							<input class="form-control" name="collateral" id="txtCollateral" placeholder="Enter Loan Description">
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal For Loan Purpose-->
	<div class="modal fade" id="newPurposeModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="/admin/purposes" method="POST">
						@csrf

						<div class="form-group">
							<label>Loan Type</label>
							<select class="form-control" name="loan_id" id="selectLoan">
								<option value="">Select Loan Type</option>
								@foreach($loans as $loan)
								<option value="{{ $loan->id }}">{{ $loan->type }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Purpose</label>
							<input class="form-control" name="purpose" id="txtLoanPurpose" placeholder="Enter New Purpose">
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection


@push('script')
<script>
	$('#loanSpecTable').DataTable({
		processing: true,
        serverSide: true,
        pagingType: 'simple',
        pageLength: 1,
        searching: false,
        lengthChange: false,
        ajax: '/admin/all_loan_specifications',
        columns: [
            {data: 'loan.type', name: 'loan.type'},
            {data: 'description', name: 'description'},
            {data: 'collateral', name: 'collateral'},
        ]
	});
</script>
@endpush
@extends('layouts.app_admin')

@section('content')
	<div class="row">
		<div class="col-md-12 mb-3">
			<button type="button" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#newOfferModal">
				New Offer <span class="fa fa-plus" aria-hidden="true"></span>
			</button>
		</div>
		<div class="col-md-12">
			<div class="card">
		        <div class="card-header">
		            <div class="clearfix">
						<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#newOfferModal">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</button>
			            <h4 class="card-title">Offers</h4>
					</div>
		            <p class="card-category">List of Partners Offers</p>
		        </div>
	            <div class="card-body">
	           		<table class="table table-striped" id="banksTable">
	           			<thead>
	           				<tr>
	           					<th>Bank</th>
	           					<th>Loan Type</th>
	           					<th>Specification</th>
	           					<th>Product Name</th>
	           					<th>Minimum Loan</th>
	           					<th>Maximum Loan</th>
	           					<th>Action</th>
	           				</tr>
	           			</thead>
	           			<tbody>	

	           			</tbody>
	           		</table>
		        </div>
		    </div>
		</div>
	</div>


	<!-- Modal For New Bank-->
	<div class="modal fade" id="newOfferModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">New Offer</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="/admin/banks" method="POST" enctype="multipart/form-data" id="bankForm">
						@csrf

						<div class="form-group">
							<label>Bank Name</label>
							<select class="form-control" name="bank_id" id="selectBank">
								<option value="">Select Bank</option>
								@foreach($banks as $bank)
								<option value="{{ $bank->id }}">{{ $bank->name }}</option>
								@endforeach
							</select>
						</div>
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
							<label>Loan Classification</label>
							<select class="form-control" name="classification_id" id="selectClassification">
								<option value="">Select Loan Type</option>
							</select>
						</div>

						<div class="form-group">
							<label>Product Name</label>
							<input type="tex" name="product" class="form-control" id="txtProduct" placeholder="Product Name">
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Minimum Loan</label>
									<input type="text" class="form-control" name="minimun" id="txtMinLoan" placeholder="Min. Loan">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Maximum Loan</label>
									<input type="text" class="form-control" name="minimun" id="txtMaxLoan" placeholder="Max. Loan">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>Terms and Interest</label>
							<input type="file" name="terms_rates" class="form-control-file" id="fileIntTerm">
						</div>


						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('script')
<script src="{{ asset('js/offers.js') }}"></script>
@endpush
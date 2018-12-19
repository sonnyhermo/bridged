@extends('layouts.app_admin')

@section('content')

	@include('layouts.messages')
	
	<div class="row">
		<div class="col-md-12 mb-3">
			<button type="button" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#newBankModal">
				Add Banks <span class="fa fa-plus" aria-hidden="true"></span>
			</button>
		</div>

		<div class="col-md-12">
			<div class="card">
		        <div class="card-header">
		            <div class="clearfix">
			            <h4 class="card-title">Banks</h4>
					</div>
		            <p class="card-category">List of Banks and Coverage</p>
		        </div>
	            <div class="card-body">
	           		<table class="table table-striped" id="banksTable">
	           			<thead>
	           				<tr>
	           					<th></th>
	           					<th>Logo</th>
	           					<th>Bank</th>
	           					<th>Email</th>
	           					<th>Description</th>
	           					<th>Coverage</th>
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

	<!-- Modal For New Bank-->
	<div class="modal fade" id="newBankModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">New Bank</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="/admin/banks" method="POST" enctype="multipart/form-data" id="bankForm">
						@csrf

						<div class="form-group">
							<label>Bank Name</label>
							<input type="text" class="form-control" name="name" id="txtNewBank" placeholder="Enter New Bank Name" required>
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" id="txtBankEmail" placeholder="Enter New Bank Name" required>
						</div>

						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" id="txtBankDescription" placeholder="Enter Bank Description" required></textarea>
						</div>

						<div class="form-group">
							<label>Area of coverage</label>
							<div>
							@for($i = 0; $i <= ceil(count($regions)/3); $i++)
								<div class="row">
								@for($j = ($i*3); $j <= ($i*3)+2; $j++)
								 	@if($j > count($regions)-1)
								 		@break
								 	@endif
									<div class="col-md-3 form-check form-check-inline">
									    <label class="form-check-label">
									        <input class="form-check-input" name="coverage[]" type="checkbox" value="{{ $regions[$j] }}">
									        <span class="form-check-sign"></span>
									        {{ $regions[$j] }}
									    </label>
									</div>
								@endfor
								</div>
							@endfor
							</div>
						</div>

						<div class="form-group">
							<label>Bank Logo</label>
							<input type="file" name="logo" class="form-control-file" id="fileLogo">
						</div>

						<div class="form-group" id="bank-branches">
							<label>Bank Branches</label>
							<input type="file" name="branches" class="form-control-file" id="fileBranches" required>
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!--Modal For adding new Branches-->
	<div class="modal fade" id="newBranchModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">New Branches</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group" id="addthru">
						<label class="col-md-3">Add Thru</label>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="addOption" id="addOption1" value="excel">
							<label class="form-check-label" for="addOption1">Excel</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="addOption" id="addOption2" value="manual">
							<label class="form-check-label" for="addOption2">Manual</label>
						</div>
					</div>
					<form action="/admin/branches" method="POST" id="branchForm" enctype="multipart/form-data" class="d-none">
						@csrf
						<input type="hidden" name="bank" id="txtBank">
						<div id="inner">
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection

@push('script')
	<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/admin/banks.js') }}"></script>
@endpush
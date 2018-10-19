@extends('layouts.app_admin')

@section('content')

@include('layouts.messages')
	
	<div class="row">
		<div class="col-md-12 mb-3">
			<button type="button" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#newBankModal">
				Add Banks <span class="fas fa-plus fa-sm"></span>
			</button>
			<button type="button" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#bankListModal">
				Banks List <span class="fas fa-list fa-sm"></span>
			</button>
		</div>

		<div class="col-md-12">
			<div class="card">
		        <div class="card-header">
		            <div class="clearfix">
						<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#newPurposeModal">
							<i class="fas fa-plus fa-sm"></i>
						</button>
			            <h4 class="card-title">Offers</h4>
					</div>
		            <p class="card-category">List of Banks Offers</p>
		        </div>
	            <div class="card-body">
	           		<table class="table table-striped" id="loanPurposeTable">
	           			<thead>
	           				<tr>
	           					<th>Bank</th>
	           					<th>Loan Type</th>
	           					<th>Loan Type</th>
	           					<th>Product</th>
	           					<th>Terms</th>
	           					<th>Interest</th>
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
					<form action="/admin/banks" method="POST">
						@csrf

						<div class="form-group">
							<label>Bank Name</label>
							<input type="text" class="form-control" name="name" id="txtNewBank" placeholder="Enter New Bank Name">
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" id="txtBankEmail" placeholder="Enter New Bank Name">
						</div>

						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" id="txtBankDescription" placeholder="Enter Bank Description"></textarea>
						</div>

						<div class="form-group">
							<label>Area of coverage</label>
							<div>
								@for($i = 0; $i < count($regions)/3; $i++)
								<div class="row">
									@for($j = 0; $j < 3; $j++)
									<div class="col-md-3 form-check form-check-inline">
									    <label class="form-check-label">
									        <input class="form-check-input" type="checkbox" value="{{ $regions[$j+$i] }}">
									        <span class="form-check-sign"></span>
									        {{ $regions[($i*3)] }}
									    </label>
									</div>
									@endfor
								</div>
								@endfor
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
								<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
							</div>
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal For Bank List-->
	<div class="modal fade" id="bankListModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">List of Bank Partners</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<ul>
					<table class="table table-striped">
	           			<thead>
	           				<tr>
	           					<th>Bank Name</th>
	           					<th>Action</th>
	           				</tr>
	           			</thead>

	           			<tbody>
	           				@foreach($banks as $bank)
	           				<tr>
	           					<td>{{ $bank->name }}</td>
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
@endsection

@push('script')

@endpush
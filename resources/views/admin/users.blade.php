@extends('layouts.app_admin')

@section('content')

	@include('layouts.messages')

	<div class="row">
		<div class="col-md-12 mb-3">
			<button type="button" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#newAdminModal">
				Add Admin <span class="fa fa-plus" aria-hidden="true"></span>
			</button>
			<button type="button" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#newCreditorModal">
				Admin List <span class="fa fa-list-alt" aria-hidden="true"></span>
			</button>
		</div>

		<div class="col-md-12">
			<div class="card">
		        <div class="card-header">
		            <div class="clearfix">
						<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#newPurposeModal">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</button>
			            <h4 class="card-title">Creditors</h4>
					</div>
		            <p class="card-category">List of Banks Creditors</p>
		        </div>
	            <div class="card-body">
	           		<table class="table table-striped" id="loanPurposeTable">
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
@endsection
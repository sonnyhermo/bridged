@extends('layouts.app_creditor')

@section('content')
	<div class="row">
		<div class="col-md-4">
			<div class="row">
				<label class="col-md-4">Loan Type</label>
				<select id="loanType" class="col-md-8 dropdown-list">
					<option value="">Select Loan Type</option>
					@foreach($loans as $loan)
					<option value="{{ $loan->slug }}">{{ $loan->type }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-4 offset-md-4">
			<div class="row">
				<label class="col-md-4">Sort By</label>
				<select class="col-md-8 dropdown-list" id="sortType">
					<option value="status">Status</option>
					<option value="id-asc">Newest Applications</option>
					<option value="id-desc">Oldest Applications</option>
					<option value="name-asc">Name Ascending</option>
					<option value="name-desc">Name Descending</option>
				</select>
			</div>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col-md-12">
			<table class="table table-light text-center" id="applicationTable">
				<thead class="thead-light">
					<tr>
						<th>Date Applied</th>
						<th>Applicant</th>
						<th>Classification</th>
						<th>Desired Amount</th>
						<th>Term</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>

	<!--modal for loan comments-->
	<div class="modal fade" id="loanCommentModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content ">
				<div class="modal-header">
					<h5 class="modal-title">Loan Tracking Progress</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="loan-messages" class="mb-2">
					</div>

					<form id="loan-message-form">
						@csrf
						<input type="hidden" name="application_id" id="application" value="">
						<div class="input-group input-group-sm mb-3">
							<input type="text" class="form-control" name="comment" placeholder="Your message here" required autocomplete="off">
							<div class="input-group-append">
								<button class="btn btn-outline-secondary" type="submit">Send</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection

@push('script')
	<script src="{{ asset('js/creditor/loans.js') }}"></script>
@endpush
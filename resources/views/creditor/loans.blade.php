@extends('layouts.app_creditor')

@section('content')
	<div class="row">
		<div class="col-md-4">
			<div class="row">
				<label class="col-md-4">Loan Type</label>
				<select id="loanType" class="col-md-8">
					<option value="">Select Loan Type</option>
				</select>
			</div>
		</div>

		<div class="col-md-4 offset-md-4">
			<div class="row">
				<label class="col-md-4">Sort By</label>
				<select class="col-md-8" id="sort">
					<option value="">Select Sorting</option>
				</select>
			</div>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col-md-12">
			<table class="table table-light text-center">
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

@endsection

@push('scripts')
	<script src="{{ asset('js/creditor/loans.js') }}"
@endpush
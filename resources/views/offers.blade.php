@extends('layouts.app')

@section('content')
	<section class="container my-5" id="loan-search-section">
		<div class="col-md-12 text-center">
			<p class="font-weight-bold">Your journey to easy-access to financial products starts here!</p>
		</div>
		<div class="col-md-12 py-3 px-5" id="search-form">
			<h5>Search Loan</h5>
			<form class="form-inline">
				<input type="text" class="form-control mr-2" name="txtLoanType" placeholder="Loan Type">
				<input type="text" class="form-control mr-2" name="txtLoanClass" placeholder="Loan Classification">
				<input type="text" class="form-control mr-2" name="txtLoanAmount" placeholder="Loan Amount">
				<input type="number" class="form-control mr-2" name="txtTerms" placeholder="Terms (months)">
				<button class="btn btn-navy-blue">SEARCH</button>
			</form>
		</div>
	</section>

	<section class="container my-5" id="search-result-section">
		<div class="col-md-12">
			<p id="client-searching">Busines Loan  >  Term Loan  >  Php 1,500,00.00  >  12 months</p>
		</div>
		<div class="col-md-12">
			<h5 class="font-weight-bold">Search Results  (3 Loan Offer found)</p>
		</div>
		<div class="col-md-12">
			<button class="btn btn-navy-blue float-right"><i class="fas fa-sort"></i>&nbsp Sort</button>
		</div>
		<div class="clearfix"></div>
		<div class="my-3">
			<div class="col-md-12 result-box p-3 mb-2">
				<div class="row">
					<div class="col-md-5">
						<img src="images/bank.png">
					</div>
					<div class="col-md-3">
						<p><i class="fas fa-percent"></i>&nbsp1.12%</p>
						<p><i class="fas fa-hand-holding-usd"></i>&nbspNone</p>
						<p><i class="fas fa-calculator"></i>&nbspPhp 143,000.00</p>
					</div>
					<div class="col-md-4">
						<button class="btn btn-orange mt-3 font-weight-bold">APPLY</button>
					</div>
				</div>
			</div>
			<div class="col-md-12 result-box p-3 mb-2">
				<div class="row">
					<div class="col-md-5">
						<img src="images/bank.png">
					</div>
					<div class="col-md-3">
						<p><i class="fas fa-percent"></i>&nbsp1.12%</p>
						<p><i class="fas fa-hand-holding-usd"></i>&nbspNone</p>
						<p><i class="fas fa-calculator"></i>&nbspPhp 143,000.00</p>
					</div>
					<div class="col-md-4">
						<button class="btn btn-orange mt-3 font-weight-bold">APPLY</button>
					</div>
				</div>
			</div>
			<div class="col-md-12 result-box p-3 mb-2">
				<div class="row">
					<div class="col-md-5">
						<img src="images/bank.png">
					</div>
					<div class="col-md-3">
						<p><i class="fas fa-percent"></i>&nbsp1.12%</p>
						<p><i class="fas fa-hand-holding-usd"></i>&nbspNone</p>
						<p><i class="fas fa-calculator"></i>&nbspPhp 143,000.00</p>
					</div>
					<div class="col-md-4">
						<button class="btn btn-orange mt-3 font-weight-bold">APPLY</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 text-center">
			<p id="loan-note">Note:  You can select only up to  10 Banks at a time per Loan Classification</p>
		</div>
	</section>
@endsection
@extends('layouts.app')

@section('content')

<section class="container my-5" id="offer-detail-section">
	<div class="col-md-8">
		<div class="col-md-12">
			<button class="btn btn-orange font-weight-bold">APPLY</button>
		</div>
		<div class="col-md-12 mt-5" id="offer-general-info">
			<h5>PRODUCT SUMMARY</h5>
			<div class="row">
				<div class="col-md-6">
					<p class="float-left">Loan Type</p>
					<p class="float-right">:</p>
				</div>
				<div class="col-md-6">
					<p>{{ $offer->classification->loan->type }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p class="float-left">Loan Classification</p>
					<p class="float-right">:</p>
				</div>
				<div class="col-md-6">
					<p>{{ $offer->classification->description }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p class="float-left">Product Name</p>
					<p class="float-right">:</p>
				</div>
				<div class="col-md-6">
					<p>{{ $offer->product }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p class="float-left">Loan Amount</p>
					<p class="float-right">:</p>
				</div>
				<div class="col-md-6">
					<p>Php {{ number_format($offer->min,2,'.',',') }} to Php {{ number_format($offer->max,2,'.',',') }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p class="float-left">Interest Rate</p>
					<p class="float-right">:</p>
				</div>
				<div class="col-md-6">
					<p>1.75% per month</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p class="float-left">Term</p>
					<p class="float-right">:</p>
				</div>
				<div class="col-md-6">
					<p>6 months to 36 months</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p class="float-left">Collateral</p>
					<p class="float-right">:</p>
				</div>
				<div class="col-md-6">
					<p>{{ $offer->classification->collateral }}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p class="float-left">Other Fees</p>
					<p class="float-right">:</p>
				</div>
				<div class="col-md-6">
					<p>Documentary Stamp Tax, Processing Fee</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p class="float-left">Processing Time</p>
					<p class="float-right">:</p>
				</div>
				<div class="col-md-6">
					<p>1 to 2 months</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p class="float-left">Min Income Requirement</p>
					<p class="float-right">:</p>
				</div>
				<div class="col-md-6">
					<p>Php {{ number_format($offer->min_income,'2','.',',') }} annual income</p>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
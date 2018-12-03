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
					<p>{{ $offer->classification->classification }}</p>
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
					<p>as low as {{ $offer->terms->min('interest_rate') }}% per month</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p class="float-left">Term</p>
					<p class="float-right">:</p>
				</div>
				<div class="col-md-6">
					<p>{{ $offer->terms->min('term') }} months to {{ $offer->terms->max('term') }} months</p>
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
		<div class="col-md-12 mt-5" id="offer-product-description">
			<h5>PRODUCT DESCRIPTION</h5>
			<div class="col-md-12">
				{{ $offer->classification->description }}
			</div>
			<div class="col-md-12">
				<ul>
				@foreach($offer->classification->loan->purposes as $purpose)
					<li>{{ $purpose->purpose }}</li>
				@endforeach
				</ul>
			</div>
		</div>
		<div class="col-md-12 mt-5" id="offer-product-requirements">
			<h5>LIST OF REQUIREMENTS</h5>
			<div class="col-md-12">
				<ul>
				@foreach(explode(',',$offer->requirements) as $requirements)
					<li>{{ $requirements }}</li>
				@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>

@endsection


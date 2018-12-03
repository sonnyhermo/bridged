@extends('layouts.app')

@section('content')
{{request()->query('txtLoanAmount')}}
	<section class="container my-5" id="loan-search-section">
		<div class="col-md-12 text-center">
			<p class="font-weight-bold">Your journey to easy-access to financial products starts here!</p>
		</div>
		<div class="col-md-12 py-3 px-5" id="search-form">
			<h5>Search Loan</h5>
			<form method="GET" action="/search_offers" class="form-inline">
                @csrf
                <select class="form-control mr-2" name="loan">
                    <option value="">Select Loan Type</option>
                    @foreach($loans as $loan)
                    <option value="{{ $loan->slug }}">{{ $loan->type }}</option>
                    @endforeach
                </select>
                <select class="form-control mr-2" name="classification">
                    <option value="">Select Loan Classification</option>
                    @foreach($classifications as $classification)
                    <option value="{{ $classification->slug }}">{{ $classification->classification }}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control mr-2" name="amount" placeholder="Loan Amount">
                <input type="number" class="form-control mr-2" name="term" placeholder="Terms (months)">
                <button type="submit" class="btn btn-navy-blue">SEARCH</button>
            </form>
			
		</div>
	</section>

	<section class="container my-5" id="search-result-section">
		@if(!empty($offers))
		<div class="col-md-12">
			<p id="client-searching">Busines Loan  >  Term Loan  >  Php 1,500,00.00  >  12 months</p>
		</div>
		<div class="col-md-12">
			<h5 class="font-weight-bold">Search Results  ({{ $offers->total() }} Loan Offer found)</p>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-2 float-left">
					<select class="form-control" id="selBorrowerType">
						<option value="0">As Individual</option>
						<option value="1">As Entity</option>
					</select>
				</div>
				<button class="btn btn-navy-blue float-right"><i class="fas fa-sort"></i>&nbsp Sort</button>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="my-3">
			@foreach($offers as $offer)
			<div class="col-md-12 result-box p-3 mb-2">
				<div class="col-md-12">
					<h3>{{ $offer->bank->name }}</h3>
				</div>
				<div class="row">
					<div class="col-md-3">
						<img src="/storage/{{ $offer->bank->logo }}">
					</div>
					<div class="col-md-3">
						<p><a href="/offers/{{ $offer->slug }}">&nbsp {{ $offer->product }}</a></p>
						<p><i class="fas fa-percent"></i>&nbsp {{ $offer->terms[0]->interest_rate }}%</p>
						<p><i class="fas fa-hand-holding-usd"></i>&nbsp {{ $offer->classification->collateral }}</p>
					</div>
					<div class="col-md-3">
						<p><strong>Monthly Amortization</strong></p>
						<p><i class="fas fa-calculator"></i>&nbspPhp {{ number_format(((($offer->terms[0]->interest_rate * $offer->terms[0]->term) * $amount) + $amount) / $offer->terms[0]->term,2,'.',',') }}</p>
					</div>	
					<div class="col-md-3">
						<button class="btn btn-orange btn-apply mt-3 font-weight-bold" data-offer="{{ $offer->slug }}">APPLY</button>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="col-md-12 text-center">
			<p id="loan-note">Note:  You can select only up to  10 Banks at a time per Loan Classification</p>
		</div>

		{{ $offers->appends(request()->query())->links() }}

		@endif
	</section>
@endsection

@push('scripts')
	<script src="{{ asset('js/borrower/offer.js') }}"></script>
@endpush
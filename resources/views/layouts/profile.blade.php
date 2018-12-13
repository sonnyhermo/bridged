@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div id="accordion">
				<div class="card">
					<div class="card-header" id="headingOne">
						<h5 class="mb-0">
						<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							<strong>MY PROFILE</strong>
						</button>
						</h5>
					</div>

					<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body">
							<a class="card-link" src="sign-check-icon.png" data-toggle="collapse" ><a class="fas fa-check-circle mr-2"  href="/barrowerinfo"></a>Barrower Information</a><br>
							<a class="card-link" src="sign-check-icon.png" data-toggle="collapse"  ><a class="fas fa-check-circle mr-2" href="/barrowersource"></a>Source of Income</a><br>
							<a class="card-link" src="sign-check-icon.png" data-toggle="collapse"  ><a class="fas fa-check-circle mr-2" href="/barrowerattachments"></a>Attachements</a><br>
							<a class="card-link" src="sign-check-icon.png" data-toggle="collapse"  ><a class="fas fa-check-circle mr-2" href="/barrowerattachments"></a>Spouse & Co-Borrower</a><br>
							<a class="card-link" src="sign-check-icon.png" data-toggle="collapse"  ><a class="fas fa-check-circle mr-2" href="/barrowerattachments"></a>References</a><br>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-header" id="headingTwo">
						<h5 class="mb-0">
						<button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
							<strong>Existing Loans</strong>
						</button>
						</h5>
					</div>

					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						<div class="card-body">
							<a class="card-link" src="sign-check-icon.png" data-toggle="collapse" ><a class="fas fa-check-circle mr-2"  href="/barrowerinfo"></a>Submitted</a><br>
							<a class="card-link" src="sign-check-icon.png" data-toggle="collapse"  ><a class="fas fa-check-circle mr-2" href="/barrowersource"></a>In-Process</a><br>
							<a class="card-link" src="sign-check-icon.png" data-toggle="collapse"  ><a class="fas fa-check-circle mr-2" href="/barrowerattachments"></a>Approved</a><br>
							<a class="card-link" src="sign-check-icon.png" data-toggle="collapse"  ><a class="fas fa-check-circle mr-2" href="/barrowerattachments"></a>Declined</a><br>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			@yield('sub-content')
		</div>
	</div>
</div>
@endsection
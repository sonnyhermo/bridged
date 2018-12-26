<div class="tab-content">
	<div class="tab-pane active container" id="individual">

		<div class="card mt-3">
			<div class="card-body">
				<h5 class="card-title float-left">Borrower Info Info</h5>
				<button class="btn btn-sm float-right" data-toggle="modal" data-target="#personalModal"><i class="fas fa-pen"></i></button>
				<div class="clearfix"></div>
				<hr>
				<div id="personal">
					<div class="row">
						<div class="col-md-12">
							<p><strong>Name: {{$user->firstname.' '.$user->middlename.' '.$user->lastname}}</strong></p>
						</div>
						<div class="col-md-6">
							<p><strong>Gender: {{($user->borrower->gender == 0)?'Male':'Female'}}</strong></p>
							<p><strong>Nationality: {{$user->borrower->nationality}}</strong></p>
							<p><strong>Civil Status: {{$user->borrower->civil_status}}</strong></p>
							<p><strong>Present Address: {{$user->borrower->present_street.', '.$user->borrower->present_city}}</strong></p>
						</div>
						<div class="col-md-6">
							<p><strong>Birth Date: {{\Carbon\Carbon::createFromFormat('Y-m-d', $user->borrower->birth_date)->format('m-d-Y')}}</strong></p>
							<p><strong>Birth Place: {{$user->borrower->birth_place}}</strong></p>
							<p><strong>Mother's Maiden Name: {{$user->borrower->mother_maiden}}</strong></p>
							<p><strong>Permanent Address: {{$user->borrower->permanent_street.', '.$user->borrower->permanent_city}}</strong></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card mt-3">
			<div class="card-body">
				<h5 class="card-title float-left">Source of Income</h5>
				<button class="btn btn-sm float-right" data-toggle="modal" data-target="#fundModal"><i class="fas fa-pen"></i></button>
				<div class="clearfix"></div>
				<hr>
				<div id="funds">
					<div class="row">
						@if(count($individualIncomes) == 0)
							<div class="col-md-12">
								<p><strong>No Data to Show</strong></p>
							</div>
						@else
							@foreach($individualIncomes as $income)
								<div class="col-md-6">
									<p><strong>Source of Fund: {{$income['source']}}
								</div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>

		<div class="card mt-3">
			<div class="card-body">
				<h5 class="card-title float-left">Attachments</h5>
				<button class="btn btn-sm float-right"><i class="fas fa-pen"></i></button>
				<div class="clearfix"></div>
				<hr>
				<div id="funds">
					<div class="row">
						<div class="col-md-12">
							<p><strong>No Data to Show</strong></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('profile.personal')
@include('profile.individual_income')
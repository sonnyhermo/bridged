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
				<button class="btn btn-sm float-right" data-toggle="modal" data-target="#ifundModal"><i class="fas fa-plus"></i></button>
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
							<div class="col-md-12 mb-2">
								<button class="btn btn-sm float-right btn-edit-income" data-income="{{$income['id']}}"><i class="fas fa-pen"></i></button>
								<div class="incomes">
									<div class="row">
										<div class="col-md-6">
											<p><strong>Source of Fund: {{strtoupper($income['source'])}}</strong></p>
											<p><strong>Employer/Business Name: {{ucwords($income['employer_name'])}}</strong></p>
											<p><strong>Employer/Business Tel No.: {{$income['employer_tel']}}</strong></p>
											<p><strong>Employer/Business Email: {{$income['employer_email']}}</strong></p>
											<p><strong>Employer/Business Address: {{ucwords($income['employer_address'])}}</strong></p>
										</div>
										<div class="col-md-6">
											<p><strong>Industry: {{$income['industry']}}</strong></p>
											<p><strong>Job/Position: {{$income['position']}}</strong></p>
											<p><strong>Length of Operation: {{floor($income['operation_length'] / 12)}} Yr/s {{$income['operation_length']%12}} month/s</strong></p>
											<p><strong>Monthly Income: {{$income['monthly_income']}}</strong></p>
										</div>
									</div>
								</div>
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
				<button class="btn btn-sm float-right" data-toggle="modal" data-target="#iattachmentModal"><i class="fas fa-plus"></i></button>
				<div class="clearfix"></div>
				<hr>
				<div id="funds">
					<div class="row">
						<div class="col-md-12">
							<p><strong>Two Gov't Issued Id (Front & Back)</strong></p>
							<div class="attach-files">
								<div class="file">
									<span class="badge badge-pill badge-primary">
										Postal ID Front
										<button class="btn btn-sm">
											<i class="fas fa-trash"></i>
										</button>
										<button class="btn btn-sm">
											<i class="fas fa-pencil-alt"></i>
										</button>
									</span>
								</div>
								<div class="file">
									<span class="badge badge-pill badge-primary">
										Postal ID Back
										<button class="btn btn-sm">
											<i class="fas fa-trash"></i>
										</button>
										<button class="btn btn-sm">
											<i class="fas fa-pencil-alt"></i>
										</button>
									</span>
								</div>
							</div>
						</div>
						<!--<div class="col-md-12">
							<p><strong>Company ID - Front & Back</strong></p>
							<div class="attach-files">
								<p><strong>No files attached</strong></p>
							</div>
						</div>
						<div class="col-md-12">
							<p><strong>Latest Proof of Billing</strong></p>
							<div class="attach-files">
								<p><strong>No files attached</strong></p>
							</div>
						</div>
						<div class="col-md-12">
							<p><strong>Payslip (Ideally 3 Months)</strong></p>
							<div class="attach-files">
								<p><strong>No files attached</strong></p>
							</div>
						</div>
						<div class="col-md-12">
							<p><strong>Certificate of Employment (COE)</strong></p>
							<div class="attach-files">
								<p><strong>No files attached</strong></p>
							</div>
						</div>
						<div class="col-md-12">
							<p><strong>Latest Income Tax Return (ITR)</strong></p>
							<div class="attach-files">
								<p><strong>No files attached</strong></p>
							</div>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('profile.personal')
@include('profile.individual_income')
@include('profile.individual_attachment')
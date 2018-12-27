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
							<p><strong>Name: {{$user->getFullName()}}</strong></p>
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
				<div id="attachments">
					<div class="row">
						<div class="col-md-4 mb-3">
							<p><strong>Two Gov't Issued Id (Front & Back)</strong></p>
							@if(array_key_exists('individual', $files) && array_key_exists('issued_id', $files['individual']))
								@foreach($files['individual']['issued_id'] as $file)
								<div class="file pl-2 pt-2">
									<span class="badge badge-pill badge-primary">
										{{$file['filename']}}
										<button class="btn btn-sm">
											<i class="fas fa-trash"></i>
										</button>
										<button class="btn btn-sm">
											<i class="fas fa-pencil-alt"></i>
										</button>
									</span>
								</div>
								@endforeach
							@else
								<div class="file pl-2 pt-2">
									<span class="badge badge-pill badge-secondary">
										No Files Available
									</span>
								</div>
							@endif
						</div>
						<div class="col-md-4 mb-3">
							<p><strong>Company ID - Front & Back</strong></p>
							@if(array_key_exists('individual', $files) && array_key_exists('company_id', $files['individual']))
								@foreach($files['individual']['company_id'] as $file)
								<div class="file pl-2 pt-2">
									<span class="badge badge-pill badge-primary">
										{{$file['filename']}}
										<button class="btn btn-sm">
											<i class="fas fa-trash"></i>
										</button>
										<button class="btn btn-sm">
											<i class="fas fa-pencil-alt"></i>
										</button>
									</span>
								</div>
								@endforeach
							@else
								<div class="file pl-2 pt-2">
									<span class="badge badge-pill badge-secondary">
										No Files Available
									</span>
								</div>
							@endif
						</div>
						<div class="col-md-4 mb-3">
							<p><strong>Latest Proof of Billing</strong></p>
							@if(array_key_exists('individual', $files) && array_key_exists('billing', $files['individual']))
								@foreach($files['individual']['billing'] as $file)
								<div class="file pl-2 pt-2">
									<span class="badge badge-pill badge-primary">
										{{$file['filename']}}
										<button class="btn btn-sm">
											<i class="fas fa-trash"></i>
										</button>
										<button class="btn btn-sm">
											<i class="fas fa-pencil-alt"></i>
										</button>
									</span>
								</div>
								@endforeach
							@else
								<div class="file pl-2 pt-2">
									<span class="badge badge-pill badge-secondary">
										No Files Available
									</span>
								</div>
							@endif
						</div>
						<div class="col-md-4 mb-3">
							<p><strong>Payslip (Ideally 3 Months)</strong></p>
							@if(array_key_exists('individual', $files) && array_key_exists('payslip', $files['individual']))
								@foreach($files['individual']['payslip'] as $file)
								<div class="file pl-2 pt-2">
									<span class="badge badge-pill badge-primary">
										{{$file['filename']}}
										<button class="btn btn-sm">
											<i class="fas fa-trash"></i>
										</button>
										<button class="btn btn-sm">
											<i class="fas fa-pencil-alt"></i>
										</button>
									</span>
								</div>
								@endforeach
							@else
								<div class="file pl-2 pt-2">
									<span class="badge badge-pill badge-secondary">
										No Files Available
									</span>
								</div>
							@endif
						</div>
						<div class="col-md-4 mb-3">
							<p><strong>Certificate of Employment (COE)</strong></p>
							@if(array_key_exists('individual', $files) && array_key_exists('coe', $files['individual']))
								@foreach($files['individual']['coe'] as $file)
								<div class="file pl-2 pt-2">
									<span class="badge badge-pill badge-primary">
										{{$file['filename']}}
										<button class="btn btn-sm">
											<i class="fas fa-trash"></i>
										</button>
										<button class="btn btn-sm">
											<i class="fas fa-pencil-alt"></i>
										</button>
									</span>
								</div>
								@endforeach
							@else
								<div class="file pl-2 pt-2">
									<span class="badge badge-pill badge-secondary">
										No Files Available
									</span>
								</div>
							@endif
						</div>
						<div class="col-md-4 mb-3">
							<p><strong>Latest Income Tax Return (ITR)</strong></p>
							@if(array_key_exists('individual', $files) && array_key_exists('itr', $files['individual']))
								@foreach($files['individual']['itr'] as $file)
								<div class="file pl-2 pt-2">
									<span class="badge badge-pill badge-primary">
										{{$file['filename']}}
										<button class="btn btn-sm">
											<i class="fas fa-trash"></i>
										</button>
										<button class="btn btn-sm">
											<i class="fas fa-pencil-alt"></i>
										</button>
									</span>
								</div>
								@endforeach
							@else
								<div class="file pl-2 pt-2">
									<span class="badge badge-pill badge-secondary">
										No Files Available
									</span>
								</div>
							@endif
						</div>
						<div class="col-md-12 mb-3">
							<p><strong>Other Attachments</strong></p>
							@if(array_key_exists('individual', $files) && array_key_exists('other', $files['individual']))
								@foreach($files['individual']['other'] as $file)
								<div class="file pl-2 pt-2">
									<span class="badge badge-pill badge-primary">
										{{$file['filename']}}
										<button class="btn btn-sm">
											<i class="fas fa-trash"></i>
										</button>
										<button class="btn btn-sm">
											<i class="fas fa-pencil-alt"></i>
										</button>
									</span>
								</div>
								@endforeach
							@else
								<div class="file pl-2 pt-2">
									<span class="badge badge-pill badge-secondary">
										No Files Available
									</span>
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card mt-3">
			<div class="card-body">
				<h5 class="card-title float-left">Spouse Info</h5>
				<button class="btn btn-sm float-right" data-toggle="modal" data-target="#ispouseModal"><i class="fas fa-plus"></i></button>
				<div class="clearfix"></div>
				<hr>
				<div id="spouse-info">
					<div class="row">
						<div class="col-md-6">
							<p><strong>Name: {{(!is_null($user->spouse))?$user->spouse->getFullName():''}}</strong></p>
							<p><strong>Gender: {{(!is_null($user->spouse))?'male':''}}</strong></p>
							<p><strong>Nationality: {{(!is_null($user->spouse))?$user->spouse->nationality:''}}</strong></p>
							<p><strong>Birth Date: {{(!is_null($user->spouse))?$user->spouse->birth_date:''}}</strong></p>
							<p><strong>Residence Address: {{(!is_null($user->spouse))?$user->spouse->residence_address:''}}</strong></p>
						</div>
						<div class="col-md-6">
							<p><strong>Employer/Business Name: {{(!is_null($user->spouse))?$user->spouse->employer:''}}</strong></p>
							<p><strong>Job Title/Position: {{(!is_null($user->spouse))?$user->spouse->position:''}}</strong></p>
							<p><strong>Tenure: {{(!is_null($user->spouse))?$user->spouse->tenure:''}}</strong></p>
							<p><strong>Industry: {{(!is_null($user->spouse))?$user->spouse->industry:''}}</strong></p>
							<p><strong>Employer/Business Address: {{(!is_null($user->spouse))?$user->spouse->employer_address:''}}</strong></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card mt-3">
			<div class="card-body">
				<h5 class="card-title float-left">Co-Borrower Info</h5>
				<button class="btn btn-sm float-right" data-toggle="modal" data-target="#icoborrowerModal"><i class="fas fa-plus"></i></button>
				<div class="clearfix"></div>
				<hr>
				<div id="coborrower-info">
					<div class="row">
						<div class="col-md-6">
							<p><strong>Name: </strong></p>
							<p><strong>Gender: </strong></p>
							<p><strong>Nationality: </strong></p>
							<p><strong>Birth Date: </strong></p>
							<p><strong>Residence Address: </strong></p>
						</div>
						<div class="col-md-6">
							<p><strong>Employer/Business Name: </strong></p>
							<p><strong>Job Title/Position: </strong></p>
							<p><strong>Tenure: </strong></p>
							<p><strong>Industry: </strong></p>
							<p><strong>Employer/Business Address: </strong></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('profile.personal')
@include('profile.individual_income')
@include('profile.individual_attachment')
@include('profile.individual_spouse')
@include('profile.individual_coborrower')
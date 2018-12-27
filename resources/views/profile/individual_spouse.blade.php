<div class="modal fade" id="ispouseModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Co-Borrower Info</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ (!is_null($user->spouse))?'/my-profile/spouse/'.$user->id:'/my-profile/spouse'  }}" id="individual-spouse-form">
					@csrf
					@if(!is_null($user->spouse))
						<input type="hidden" name="_method" value="PUT">
					@endif
					
					@include('profile.spouse_coborrower_form')

					<button type="submit" class="btn btn-primary btn-spouse-submit">Next</button>
				</form>
			</div>
		</div>
	</div>
</div>
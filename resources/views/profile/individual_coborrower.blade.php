<div class="modal fade" id="icoborrowerModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Co-Borrower Info</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" id="individual-coborrower-form">
					@include('profile.spouse_coborrower_form')

					<button type="submit" class="btn btn-primary btn-coborrower-submit">Next</button>
				</form>
			</div>
		</div>
	</div>
</div>
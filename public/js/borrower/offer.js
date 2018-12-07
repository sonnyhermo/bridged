$(document).ready(function(){
	$('.btn-apply').click(function(){
		let params = new URLSearchParams(window.location.search)
		let offer = $(this).data('offer');
		let borrowerType = $('#selBorrowerType').val();
		$.ajax({
			url: '/applications',
			type: 'post',
			data: {offer: offer, borrower_type: borrowerType, amount: params.get('amount'), term: params.get('term') },
			success: function(res){
				ajaxSuccessResponse(res)
			},
			error: function(xhr){
				console.log(xhr.responseText);
			}
		});
	});
})
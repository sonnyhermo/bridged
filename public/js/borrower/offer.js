$(document).ready(function(){
	$('.btn-apply').click(function(){
		let offer = $(this).data('offer');
		let borrowerType = $('#selBorrowerType').val();
		$.ajax({
			url: '/applications',
			type: 'post',
			data: {offer: offer, borrower_type: borrowerType },
			success: function(res){
				ajaxSuccessResponse(res)
			},
			error: function(xhr){
				console.log(xhr.responseText);
			}
		});
	});
})
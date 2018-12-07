$(document).ready(function(){
	$('#creditorForm').submit(function(e){
		e.preventDefault();
	}).validate({
		submitHandler: function(){
			$.ajax({
				url: '/admin/creditor',
				type: 'post',
				data: $('#creditorForm').serialize(),
				dataType: 'json',
				success: function(res){
					ajaxSuccessResponse(res)
				},
				error: function(xhr){
					ajaxErrorDisplay(xhr.responseText);
				}
			})
		}
	});
})
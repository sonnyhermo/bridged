$(document).ready(function(){
	$('#checkAddress').click(function(e){
		if($(this).is(':checked')){
			$('#txtStreetPermanent').val($('#txtStreet').val());
			$('#txtMunicipalPermanent').val($('#txtMunicipal').val());
			$('#txtProvincePermanent').val($('#txtProvince').val());
			$('#txtStayPermanent').val($('#txtStay').val());
			$('#selOwnershipPermanent').val($('#selOwnership').val());
		}else{
			$('#txtStreetPermanent').val('');
			$('#txtMunicipalPermanent').val('');
			$('#txtProvincePermanent').val('');
			$('#txtStayPermanent').val('');
			$('#selOwnershipPermanent').val('');
		}
	});

	$('#personal-form').validate({
		submitHandler:function(form){
			$.ajax({
				url: $(form).attr('action'),
				type: 'post',
				data: $(form).serialize(),
				dataType: 'json',
				success: function(res){
					console.log(res);
					// ajaxSuccessResponse(res).then(function(value){
					// 	location.reload();
					// });
				},
				error: function(xhr){
					console.log(xhr.responseText);
					//ajaxErrorDisplay(xhr.responseText);
				}
			});

		}
	});

	$('#individual-income-form').validate({
		submitHandler:function(form){
			//console.log($(form).serialize());
			$.ajax({
				url: $(form).attr('action'),
				type: 'post',
				data: $(form).serialize(),
				dataType: 'json',
				success: function(res){
					console.log(res);
					// ajaxSuccessResponse(res).then(function(value){
					// 	location.reload();
					// });
				},
				error: function(xhr){
					console.log(xhr.responseText);
					//ajaxErrorDisplay(xhr.responseText);
				}
			});

		}
	})

	$('#individual-attachment-form').validate({
		submitHandler:function(form){
			let data = new FormData(form);
			data.append('borrower_type', 0);
			$.ajax({
				url: '/attachments',
				type: 'post',
				data: data,
				dataType: 'json',
				contentType: false,
				processData: false,
				success: function(res){
					ajaxSuccessResponse(res).then(function(value){
						location.reload();
					});
				},
				error: function(xhr){
					console.log(xhr.responseText);
				}
			})
		}
	});

	$('#individual-spouse-form').validate({
		submitHandler: function(form){
			console.log($(form).serialize());
			$.ajax({
				url: '/my-profile/spouse',
				type: 'post',
				dataType: 'json',
				data: $(form).serialize(),
				success:function(res){
					console.log(res);
				},
				error: function(xhr){
					ajaxErrorDisplay(xhr.responseText);
				}

			});
		}
	})
});
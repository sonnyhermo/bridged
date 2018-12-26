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

	$('#income-form').validate({
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

	/*s$('#btn-fund-submit').click(function(e){
		e.preventDefault();

		let data = [];
		let parse = {};
		let serialize = [];

		$('.income-form').each(function(){
			data.push($(this).serializeArray());
		});

		$.each(data, function(key, value) {

			$.each(value, function(key1, value1) {
				console.log(key);
		    	parse[this.name] = this.value;
		    });
		    serialize.push(parse);
		});
		console.log(serialize);
		$.ajax({
			url: '/incomes',
			type: 'post',
			data: {income:serialize},
			dataType: 'json',
			success: function(res){
				console.log(res);
				//profileStepper.next();
			},
			error: function(xhr){
				console.log(xhr.responseText);
				//ajaxErrorDisplay(xhr.responseText);
			}
		});
	});*/

	$('#btn-iattach').click(function(e){
		e.preventDefault();

		let arrImages = [];
		let formData = new FormData();
		
		$('.i-requirement').each(function(i, div){
			let filename = $(div).find('input[name=filename]').val();
			let images = $(div).find('input[name=files]')[0].files;
			if(images.length != 0){
				$.each(images, function(key, val){
					console.log(images[key]);
					formData.append(filename+'[]', images[key], images[key].filename );
				})
			}
		
		});


		$.ajax({
			url:'/attachments',
			type: 'post',
			data: formData,
			dataType: 'json',
			processData: false,
			contentType: false,
			success:function(res){
				console.log(res);
			},
			error:function(xhr){
				console.log(xhr.responseText);
			}
		})
	})

	$('.previous').click(function(e){
		e.preventDefault();
		profileStepper.previous();
	});
});
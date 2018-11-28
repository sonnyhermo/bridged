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

	$('#btnAddIncome').click(function(e){
		e.preventDefault();
		let incomeLayout = $("#divSourceFund").clone();

		$('#divMoreIncome').append(incomeLayout);
		$('#divMoreIncome').append('<hr>');
	});

	$('#personal-form').validate({
		submitHandler:function(){
			// $.ajax({
			// 	url: '/profile/user',
			// 	type: 'post',
			// 	data: $('#personal-form').serialize(),
			// 	dataType: 'json',
			// 	success: function(res){
			// 		console.log(res);
			// 		myStepper.next();
			// 	},
			// 	error: function(xhr){
			// 		console.log(xhr.responseText);
			// 		//ajaxErrorDisplay(xhr.responseText);
			// 	}
			// });

			myStepper.next();
		}
	});

	// $('.income-form').validate({
	// 	submitHandler:function(){
			// console.log($('.income-form').serialize());
			// $.ajax({
			// 	url: '/income',
			// 	type: 'post',
			// 	data: $('#income-form').serialize(),
			// 	dataType: 'json',
			// 	success: function(res){
			// 		console.log(res);
			// 		//myStepper.next();
			// 	},
			// 	error: function(xhr){
			// 		console.log(xhr.responseText);
			// 		//ajaxErrorDisplay(xhr.responseText);
			// 	}
			// });

	// 	}
	// })

	$('#btn-fund-submit').click(function(e){
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
			url: '/income',
			type: 'post',
			data: {income:serialize},
			dataType: 'json',
			success: function(res){
				console.log(res);
				//myStepper.next();
			},
			error: function(xhr){
				console.log(xhr.responseText);
				//ajaxErrorDisplay(xhr.responseText);
			}
		});
	})

	$('.previous').click(function(e){
		e.preventDefault();
		myStepper.previous();
	});
});
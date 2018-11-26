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
			/*$.ajax({
				url: '/profile/user',
				type: 'post',
				data: $('#personal-form').serialize(),
				dataType: 'json',
				success: function(res){
					console.log(res);
					myStepper.next();
				},
				error: function(xhr){
					console.log(xhr.responseText);
					//ajaxErrorDisplay(xhr.responseText);
				}
			});*/

			myStepper.next();
		}
	});

	$('#btn-fund-submit').click(function(e){
		e.preventDefault();
		console.log($('#income-form').serialize());

		$.ajax({
			url:'/sample_req',
			type: 'post',
			data: $('#income-form').serialize(),
			dataType: 'json',
			success:function(data){
				console.log(data);
			}
		})
		//myStepper.next();
	});

	$('.previous').click(function(e){
		e.preventDefault();
		myStepper.previous();
	});
});
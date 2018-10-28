$(document).ready(function(){
	$('#selectLoan').on('change',function(){
		$.ajax({
			url: '/admin/loans/'+$(this).val(),
			type: 'get',
			dataType: 'json',
			success: function(res){
				console.log(res);
				let options = "<option value=''>Select Loan Type</option>";
				$.each(res, function(key, val){
					$.each(val.specifications, function(skey, sval){
						options += "<option value='"+sval.id+"'>"+sval.description+"</option>"
					})
				});

				$('#selectClassification').html(options);
			},
			error: function(xhr){
				console.log(xhr.responseText);
			}
		})
	})
});
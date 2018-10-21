$(document).ready(function(){
	let swalTitle, swalType, swalText;

	$('#bankForm').submit(function(e){
		e.preventDefault();
		
		let formData = new FormData($('#bankForm')[0]);
		console.log(formData.get('_token'));
		$.ajax({
			url:'/admin/banks',
			type:'post',
			data: formData,
			dataType:'json',
			processData: false,
			contentType: false,
			success:function(res){
				console.log(res);
				if(res.hasOwnProperty('status')){
					if(res.status == 1){
						swalTitle = 'Success';
						swalType = 'success'; 
					}else{
						swalTitle = 'Error';
						swalType = 'error';
					}

					swalText = res.message
				}

				swal({
				  title: swalTitle,
				  text: swalText,
				  icon: swalType,
				}).then(function(value){
					$(this)[0].reset();
					$('#newBankModal').hide();
				});
			},
			error:function(xhr){
				let xhrResponse = JSON.parse(xhr.responseText);
				console.log(xhrResponse);
				if(xhrResponse.hasOwnProperty('errors')){
					swalTitle = 'Follow This';
					swalType = 'info';
					swalText = "";
					$.each(xhrResponse.errors, function(keys, values){
						$.each(values, function(key, value){
							swalText += value + '\n';
						});
					});
				}else{
					swalTitle = 'Error';
					swalType = 'error';
					swalText = "An Error Occured, Please contact admin.";
				}

				swal({
				  title: swalTitle,
				  text: swalText,
				  icon: swalType,
				})
			}
		});
	});
});
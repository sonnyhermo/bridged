$(document).ready(function(){
	let swalTitle, swalType, swalText;

	$('#bankForm').submit(function(e){
		e.preventDefault();
		
		let formData = new FormData($('#bankForm')[0]);
		$.ajax({
			url:'/admin/banks',
			type:'post',
			data: formData,
			dataType:'json',
			processData: false,
			contentType: false,
			success:function(res){
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
					location.reload();
				});
			},
			error:function(xhr){
				console.log(xhr.responseText);
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

	$('#banksTable').DataTable({
		processing: true,
        serverSide: true,
        pagingType: 'simple',
        pageLength: 1,
        searching: false,
        lengthChange: false,
        ajax: '/admin/all_banks',
        columns: [
            {
            	data: 'logo',
            	name: 'logo',
            	render: function ( data, type, row ) {
            		console.log(row);
			        return '<img src="/storage/'+data+'" class="logo"/>';
		    	}
            },
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'description', name: 'description'},
            {data: 'coverage', name: 'coverage'},
            {
            	data: null,
			    render: function ( data, type, row ) {
			        return '<button class="btn btn-sm btn-danger bank-delete" data-id="'+row['slug']+'"><span class="fa fa-trash"></span></button>'+
			        '<button class="btn btn-sm btn-info bank-edit" data-id="'+row['slug']+'"><span class="fa fa-pencil-square-o"></span></button>';;
		    	}
		    }
        ],
	});

	$('.bank-delete').click(function(e){
		e.preventDefault();
	});


});
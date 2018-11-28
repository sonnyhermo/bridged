$(document).ready(function(){

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
				ajaxSuccessResponse(res).then(function(value){
					$(this)[0].reset();
					$('#newBankModal').hide();
					location.reload();
				});
			},
			error:function(xhr){
				ajaxErrorDisplay(xhr.responseText);
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
$(document).ready(function(){
	let creditorModalClone = $('#newCreditorModal').clone();

	$('#creditorForm').submit(function(e){
		e.preventDefault();
	}).validate({
		submitHandler: function(){
			let url = $('#creditorForm').attr('action');
			let type;

			if($('#creditorForm').find('input[name=_method]').length > 0){
				type = "put";
			}else{
				type = "post";
			}

			$.ajax({
				url: url,
				type: type,
				data: $('#creditorForm').serialize(),
				dataType: 'json',
				success: function(res){
					console.log(res);
					ajaxSuccessResponse(res).then(function(value){
						location.reload();
					});
				},
				error: function(xhr){
					ajaxErrorDisplay(xhr.responseText);
				}
			})
		}
	});

	$('#creditorTable').DataTable({
		processing: true,
        serverSide: true,
        pagingType: 'simple',
        pageLength: 10,
        searching: false,
        lengthChange: false,
        ajax: '/admin/all_creditors',
        columns: [
			{data:'bank.name', name:'bank.name'},
			{
				data:null,
				render: function(data, type, row){
					return row['firstname']+' '+row['middlename']+' '+row['lastname'];
				}
			},
			{data:'email', name:'creditors.email'},
			{
				data:null,
				render: function(data, type, row){
					return `<button class="btn btn-sm btn-danger creditor-delete" data-id="${row.id}"><span class="fa fa-trash"></span></button>
			        <button class="btn btn-sm btn-info creditor-edit" data-id="${row.id}"><span class="fa fa-edit"></span></button>`;
		    	}
			}
		]
	});

	$('#creditorTable tbody').on('click', 'tr .creditor-delete', function(){
		let creditor = $(this).data('id');
		swal({
        	title:'Opps Wait!',
        	text:'Are you sure, you want to remove this creditor',
        	icon:'warning',
        	buttons: ["No", "Yes, I want"],
        }).then(function(value){
        	if(value){
        		$.ajax({
        			url:'/admin/creditor/'+creditor,
        			dataType:'json',
        			type:'delete',
        			success:function(res){
        				ajaxSuccessResponse(res).then(function(value){
        					location.reload();
        				});
        			},
        			error:function(xhr){
        				ajaxErrorDisplay(xhr);
        			}
        		});
        	}
        });
	});

	$('#creditorTable tbody').on('click', 'tr .creditor-edit', function(){
		let creditor = $(this).data('id');
		$.ajax({
			url: '/admin/creditor/'+creditor,
			type: 'get',
			dataType: 'json',
			success: function(res){
				$('#newCreditorModal .modal-title').html('Edit Creditor');
		        $('#newCreditorModal').find('form').prepend('<input type="hidden" name="_method" value="PUT">');
		        $('#newCreditorModal').find('form').attr('action','/admin/creditor/'+creditor);

		        $('#selectBank').val(res.bank_id);
		        $('#txtFirstname').val(res.firstname);
		        $('#txtMiddlename').val(res.middlename);
		        $('#txtLastname').val(res.lastname);
		        $('#txtEmail').val(res.email);

		        $('#newCreditorModal').modal('show');
			},
			error:function(xhr){
				console.log(xhr.responseText);
			}

		})
	});
})
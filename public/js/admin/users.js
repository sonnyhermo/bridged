$(document).ready(function(){
	let creditorModalClone = $('#newCreditorModal').clone();
	let newAdminModalClone = $('#newAdminModal').clone();

	$('#creditorForm').submit(function(e){
		e.preventDefault();
	}).validate({
		submitHandler: function(){
			let url = $('#creditorForm').attr('action');
			let type = ($('#creditorForm').find('input[name=_method]').length > 0)?'put':'post';
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

	$('#adminForm').submit(function(e){
		e.preventDefault
	}).validate({
		submitHandler: function(){
			let url = $('#adminForm').attr('action');
			let type = ($('#adminForm').find('input[name=_method]').length > 0)?'put':'post';
			$.ajax({
				url: url,
				type: type,
				data: $('#adminForm').serialize(),
				dataType: 'json',
				success: function(res){
					ajaxSuccessResponse(res).then(function(){
						location.reload();
					})
				},
				error: function(xhr){
					ajaxErrorDisplay(xhr.responseText);
				}
			})
		}
	});

	$('#adminTable').DataTable({
		processing: true,
        serverSide: true,
        pagingType: 'simple',
        pageLength: 10,
        searching: false,
        lengthChange: false,
        ajax: '/admin/all-admins',
        columns: [
        	{data: 'firstname', name: 'firstname'},
        	{data: 'middlename', name: 'middlename'},
        	{data: 'lastname', name: 'lastname'},
        	{data: 'email', name: 'email'},
        	{
        		data: null,
        		render: function(data, type, row){
        			return `<button class="btn btn-sm btn-danger admin-delete" data-id="${row.id}"><span class="fa fa-trash"></span></button>
			        <button class="btn btn-sm btn-info admin-edit" data-id="${row.id}"><span class="fa fa-edit"></span></button>`;
        		}
        	}
        ]
	});

	$('#adminTable tbody').on('click', 'tr .admin-delete', function(){
		let admin = $(this).data('id');
		swal({
			title: 'Oops Wait!',
			text: 'Do you want to remove this admin?',
			icon: 'warning',
			closeOnClickOutside: false,
			buttons: ['No', 'Yes, I want']
		}).then(function(value){
			if(value){
				$.ajax({
					url: '/admin/users/'+admin,
					type: 'delete',
					dataType: 'json',
					success:function(res){
						ajaxSuccessResponse(res).then(function(value){
							location.reload();
						});
					},
					error:function(xhr){
						ajaxErrorDisplay(xhr.responseText);
					}
				});
			}
		});
	});

	$('#adminTable tbody').on('click', 'tr .admin-edit', function(){
		let admin = $(this).data('id');

        $.ajax({
        	url: '/admin/users/'+admin,
        	type: 'get',
        	dataType: 'json',
        	success:function(res){
        		$('#adminListModal').modal('hide');

				$('#newAdminModal .modal-title').html('Edit Admin');
				$('#adminForm').prepend('<input type="hidden" name="_method" value="PUT">');
		        $('#adminForm').attr('action','/admin/users/'+admin);

        		$('#txtAdminFirstname').val(res.firstname);
        		$('#txtAdminMiddlename').val(res.middlename);
        		$('#txtAdminLastname').val(res.lastname);
        		$('#txtAdminEmail').val(res.email);
				
				$('#newAdminModal').modal('show');

        	},
        	error:function(xhr){
        		ajaxErrorDisplay(xhr.responseText);
        	}
        })

	});

	$('#newAdminModal').on('hidden.bs.modal', function () {
        $("#newAdminModal").replaceWith(newAdminModalClone);
    });
})
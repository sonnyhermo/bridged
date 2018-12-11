$(document).ready(function(){
	$('#creditorForm').submit(function(e){
		e.preventDefault();
	}).validate({
		submitHandler: function(){
			$.ajax({
				url: '/admin/creditor',
				type: 'post',
				data: $('#creditorForm').serialize(),
				dataType: 'json',
				success: function(res){
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
					return '<button class="btn btn-sm btn-danger spec-delete"><span class="fa fa-trash"></span></button>'+
			        '<button class="btn btn-sm btn-info spec-edit"><span class="fa fa-edit"></span></button>';
		    	}
			}
		]
	})
})
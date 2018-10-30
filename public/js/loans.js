$(document).ready(function(){
	var dt = $('#loanSpecTable').DataTable({
		processing: true,
        serverSide: true,
        pagingType: 'simple',
        pageLength: 1,
        searching: false,
        lengthChange: false,
        ajax: '/admin/all_loan_specifications',
        columns: [
            {data: 'loan.type', name: 'loan.type'},
            {data: 'description', name: 'description'},
            {data: 'collateral', name: 'collateral'},
            {
            	data: null,
			    render: function ( data, type, row ) {
                    return '<button class="btn btn-sm btn-danger spec-delete" onclick="removeSpec('+row['id']+')"><span class="fa fa-trash"></span></button>'+
			        '<button class="btn btn-sm btn-info spec-edit" onclick="retrieveSpec('+row['id']+')"><span class="fa fa-edit"></span></button>';;
		    	}
		    }
        ],
	});

    
	$('#purposeForm').submit(function(e){
		e.preventDefault();
	});

});


function retrieveSpec(id){
    $.ajax({
        url:'/admin/specifications/'+id,
        type:'get',
        dataType: 'json',
        success:function(response){
            console.log(response);
            $('#newSpecModal').find('h5').html('Edit Specification');
            $('#newSpecModal').find('form').prepend('<input type="hidden" name="_method" value="PUT">');
            $('#newSpecModal').find('form').attr('action','/admin/specifications/'+response.id);
            $('#newSpecModal').find('select').val(response.loan_id);
            $('#txtLoanDescription').val(response.description);
            $('#txtCollateral').val(response.collateral);
            $('#newSpecModal').modal('show');
        },
        error:function(xhr){
            console.log(xhr.responseText);
        }
    });
}

function removeSpec(id){
    $.ajax({
        url:'/admin/specifications/'+id,
        type:'delete',
        data:{_token : $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        success:function(response){
            console.log(response);
        },
        error:function(xhr){
            console.log(xhr.responseText);
        }
    });
}
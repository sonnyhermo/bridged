$(document).ready(function(){
	let dt = $('#loanSpecTable').DataTable({
		processing: true,
        serverSide: true,
        pagingType: 'simple',
        pageLength: 1,
        searching: false,
        lengthChange: false,
        ajax: '/admin/all_loan_classifications',
        columns: [
            {
                "class":          "details-control",
                "orderable":      false,
                "data":           null,
                "defaultContent": "",
            },
            {data: 'loan.type', name: 'loan.type'},
            {data: 'classification', name: 'classification'},
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

     // Array to track the ids of the details displayed rows
    var detailRows = [];
 
    $('#loanSpecTable tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );
 
        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();
 
            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();
 
            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );

    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );

    
	$('#purposeForm').submit(function(e){
		e.preventDefault();
	});

});


function retrieveSpec(id){
    $.ajax({
        url:'/admin/classifications/'+id,
        type:'get',
        dataType: 'json',
        success:function(response){
            console.log(response);
            $('#newSpecModal').find('h5').html('Edit Classification');
            $('#newSpecModal').find('form').prepend('<input type="hidden" name="_method" value="PUT">');
            $('#newSpecModal').find('form').attr('action','/admin/classifications/'+response.id);
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
        url:'/admin/classifications/'+id,
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

function format ( d ) {
    return 'Description: '+d.description+'<br>';
}
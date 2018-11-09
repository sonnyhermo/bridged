$(document).ready(function(){
    var loanModalClone = $("#newLoanModal").clone();
    var specModalClone = $("#newSpecModal").clone();
    var purposeModalClone = $("#newPurposeModal").clone();

    $.ajax({
        url:'/admin/all_loan_purposes',
        dataType:'json',
        success:function(res){
            console.log(res);
        }
    })

    /*** classification ***/
	let loan_dt = $('#loanSpecTable').DataTable({
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
                    console.log(row);
                    return '<button class="btn btn-sm btn-danger spec-delete" onclick="removeSpec(\''+row['slug']+'\')"><span class="fa fa-trash"></span></button>'+
			        '<button class="btn btn-sm btn-info spec-edit" onclick="retrieveSpec(\''+row['slug']+'\')"><span class="fa fa-edit"></span></button>';;
		    	}
		    }
        ],
	});

     // Array to track the ids of the details displayed rows
    var loan_detailRows = [];
 
    $('#loanSpecTable tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = loan_dt.row( tr );
        var idx = $.inArray( tr.attr('id'), loan_detailRows );
 
        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();
 
            // Remove from the 'open' array
            loan_detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();
 
            // Add to the 'open' array
            if ( idx === -1 ) {
                loan_detailRows.push( tr.attr('id') );
            }
        }
    } );

    loan_dt.on( 'draw', function () {
        $.each( loan_detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );


    $('#newSpecModal').on('hidden.bs.modal', function () {
        $("#newSpecModal").replaceWith(specModalClone);
    });

    /*** end classification  ***/



    /*** purpose ***/ 
    $('#loanPurposeTable').DataTable({
        processing: true,
        pagingType: 'simple',
        pageLength: 1,
        searching: false,
        lengthChange: false,
        ajax: '/admin/all_loan_purposes',
        columns: [
            {data: 'loan.type', name: 'loan.type'},
            {data: 'purpose', name: 'purpose'},
            {
                data: null,
                render: function ( data, type, row ) {
                    return '<button class="btn btn-sm btn-danger purpose-delete" data-id="'+row['slug']+'"><span class="fa fa-trash"></span></button>'+
                    '<button class="btn btn-sm btn-info purpose-edit" data-id="'+row['slug']+'"><span class="fa fa-edit"></span></button>';
                }
            }
        ],
    });

    $('#loanPurposeTable tbody').on( 'click', '.purpose-delete', function () {
        let data = $(this).data('id');
        swal({
          title: "Are you sure?",
          text: "Once deleted, it may affect other datas",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then(function(proceed){
            if(proceed){
                $.ajax({
                    url:'/admin/purposes/'+data,
                    type:'delete',
                    dataType:'json',
                    success:function(res){
                        if(res.code == 1){
                            swal('Success', res.message, 'success')
                            .then(function(val){ location.reload() });
                        }else{
                            swal('Failed', res.message, 'Error');
                        }
                    },
                    error:function(xhr){
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });

    $('#loanPurposeTable tbody').on( 'click', '.purpose-edit', function () {
        $.ajax({
            url:'/admin/purposes/'+$(this).data('id')+'/edit',
            type:'get',
            dataType:'json',
            success:function(res){
                $('#newPurposeModal .modal-title').html('Edit Loan');
                $('#newPurposeModal #selectLoan').val(res.loan_id);
                $('#newPurposeModal #txtLoanPurpose').val(res.purpose);
                $('#newPurposeModal').find('form').prepend('<input type="hidden" name="_method" value="PUT">');
                $('#newPurposeModal').find('form').attr('action','/admin/purposes/'+res.slug);
                $('#newPurposeModal').modal('show');
            },
            error:function(xhr){
                console.log(xhr.responseText);
            }
        });
    });

    $('#newPurposeModal').on('hidden.bs.modal', function () {
        $("#newPurposeModal").replaceWith(purposeModalClone);
    });

    /*** end purpose ***/


    /*** loans ***/

    $('.loan-del').click(function(e){
        e.preventDefault();
        swal({
          title: "Are you sure?",
          text: "Once deleted, all data related to this will be deleted",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then(function(proceed){
            if(proceed){
                $.ajax({
                    url:'/admin/loans/'+$(this).data('type'),
                    type:'delete',
                    dataType:'json',
                    success:function(res){
                        if(res.code == 1){
                            swal('Success', res.message, 'success')
                            .then(function(val){ location.reload() });
                        }else{
                            swal('Failed', res.message, 'Error');
                        }
                    },
                    error:function(xhr){
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });

    $('.loan-edit').click(function(e){
        e.preventDefault();
        $.ajax({
            url:'/admin/loans/'+$(this).data('type')+'/edit',
            type:'get',
            dataType:'json',
            success:function(res){
                console.log(res);
                $('#newLoanModal .modal-title').html('Edit Loan');
                $('#newLoanModal #txtNewLoan').val(res.type);
                $('#newLoanModal').find('form').prepend('<input type="hidden" name="_method" value="PUT">');
                $('#newLoanModal').find('form').attr('action','/admin/loans/'+res.slug);
                $('#loanListModal').modal('hide');
                $('#newLoanModal').modal('show');
            },
            error:function(xhr){
                console.log(xhr.responseText);
            }
        })
    });

    $('#newLoanModal').on('hidden.bs.modal', function () {
        $("#newLoanModal").replaceWith(loanModalClone);
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
            $('#txtLoanClassification').val(response.classification);
            $('#txtDescription').val(response.description);
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
        dataType: 'json',
        success:function(response){
            if(response.code == 1){
                swal('Success',response.message,'success')
                .then(function(value){ location.reload() });
            }else{
                swal('Error',response.message,'error');
            }
        },
        error:function(xhr){
            console.log(xhr.responseText);
        }
    });
}

function format ( d ) {
    return 'Description: '+d.description+'<br>';
}
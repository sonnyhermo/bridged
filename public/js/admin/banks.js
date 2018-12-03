$(document).ready(function(){
	var bankModalClone = $("#newBankModal").clone();

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
					location.reload();
				});
			},
			error:function(xhr){
				ajaxErrorDisplay(xhr.responseText);
			}
		});
	});

	let bank_dt = $('#banksTable').DataTable({
		processing: true,
        serverSide: true,
        pagingType: 'simple',
        pageLength: 10,
        searching: false,
        lengthChange: false,
        ajax: '/admin/all_banks',
        columns: [
    		{
                "class":          "details-control",
                "orderable":      false,
                "data":           null,
                "defaultContent": "",
            },
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
			        '<button class="btn btn-sm btn-info bank-edit" data-id="'+row['slug']+'"><span class="fa fa-pencil-square-o"></span></button>';
		    	}
		    }
        ],
	});

	var bank_detailRows = [];
 
    $('#banksTable tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = bank_dt.row( tr );
        var idx = $.inArray( tr.attr('id'), bank_detailRows );
 
        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();
 
            // Remove from the 'open' array
            bank_detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();
 
            // Add to the 'open' array
            if ( idx === -1 ) {
                bank_detailRows.push( tr.attr('id') );
            }
        }
    } );

    bank_dt.on( 'draw', function () {
        $.each( bank_detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );

	$('#banksTable tbody').on( 'click', 'tr .bank-delete', function() {
		let bank = $(this).data('id');
		swal({
			title:'Oopps Wait',
			text:'Remove this partner?',
			icon:'warning',
			buttons: ["Cancel", "Okay"],
		}).then(function(value){
			if(value){
				$.ajax({
					url: '/admin/banks/'+bank,
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
				})
			}
		});
	});

	$('#banksTable tbody').on( 'click', '.bank-edit', function () {
        $.ajax({
            url:'/admin/banks/'+$(this).data('id')+'/edit',
            type:'get',
            dataType:'json',
            success:function(res){
                $('#newBankModal .modal-title').html('Edit Bank');
                $('#newBankModal').find('form').prepend('<input type="hidden" name="_method" value="PUT">');
                $('#newBankModal').find('form').attr('action','/admin/banks/'+res.slug);
                $('#bank-branches').remove();
                $('#newBankModal').modal('show');
            },
            error:function(xhr){
                console.log(xhr.responseText);
            }
        });
    });

    $('#newBankModal').on('hidden.bs.modal', function () {
        $("#newBankModal").replaceWith(bankModalClone);
    });
});

function format ( d ) {
	console.log(d.branches);

	let rows = '';
	$.each(d.branches, function(key,val){
		rows += '<tr>'+
			'<td>Branch:</td>'+
            '<td>'+val.branch+'</td>'+
            '<td><button class="btn btn-sm btn-danger bank-delete" data-id="'+val.slug+'"><span class="fa fa-trash"></span></button>'+
	        '<button class="btn btn-sm btn-info bank-edit" data-id="'+val.slug+'"><span class="fa fa-pencil-square-o"></span></button></td>'
        '</tr>';
	})
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+rows+'</table>';
}
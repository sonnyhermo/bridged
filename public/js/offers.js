$(document).ready(function(){
	$('#selectLoan').on('change',function(){
		$.ajax({
			url: '/admin/loans/'+$(this).val(),
			type: 'get',
			dataType: 'json',
			success: function(res){
				console.log(res);
				let options = "<option value=''>Select Loan Type</option>";
				$.each(res, function(key, val){
					$.each(val.specifications, function(skey, sval){
						options += "<option value='"+sval.id+"'>"+sval.description+"</option>"
					})
				});

				$('#selectClassification').html(options);
			},
			error: function(xhr){
				console.log(xhr.responseText);
			}
		})
	});

	let dt = $('#offersTable').DataTable({
		processing: true,
        serverSide: true,
        pagingType: 'simple',
        pageLength: 10,
        searching: false,
        lengthChange: false,
        ajax: '/admin/all_offers',
        columns: [
            {
                "class":          "details-control",
                "orderable":      false,
                "data":           null,
                "defaultContent": "",
                "width":"8%"
            },
            {data: 'bank.name', name: 'bank.name',width:"12%"},
            {data: 'specification.description', name: 'specification.description',width:"17%"},
            {data: 'specification.loan.type', name: 'specification.loan.type',width:"18%"},
            {data: 'product', name: 'product',width:"13%"},
            {data: 'min', name: 'min',width:"12%"},
            {data: 'max', name: 'max', width:"12%"},
            {
            	data: null,
			    render: function ( data, type, row ) {
                    return '<button class="btn btn-sm btn-danger spec-delete" onclick="removeSpec('+row['id']+')"><span class="fa fa-trash"></span></button>'+
			        '<button class="btn btn-sm btn-info spec-edit" onclick="retrieveSpec('+row['id']+')"><span class="fa fa-edit"></span></button>';;
		    	},
		    	width:"8%"
		    }
        ],
	});

	 // Array to track the ids of the details displayed rows
    var detailRows = [];
 
    $('#offersTable tbody').on( 'click', 'tr td.details-control', function () {
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

});


function format ( d ) {
    return 'Set of Terms: '+d.terms+'<br>'+
        'Set of rates %: '+d.interest+'<br>'+
        'Minimum Income Required: '+d.min_income+'<br>';
}


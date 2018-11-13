$(document).ready(function(){
	$('#selectLoan').on('change',function(){
		$.ajax({
			url: '/admin/loans/'+$(this).val(),
			type: 'get',
			dataType: 'json',
			success: function(res){
				let options = "<option value=''>Select Loan Type</option>";
				$.each(res, function(key, val){
					$.each(val.classifications, function(skey, sval){
						options += "<option value='"+sval.id+"'>"+sval.classification+"</option>"
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
            {data: 'classification.classification', name: 'classification.classification',width:"17%"},
            {data: 'classification.loan.type', name: 'classification.loan.type',width:"18%"},
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
    });

    $('#offerForm').submit(function(e){
        e.preventDefault();
        let formData = new FormData($(this)[0]);
        console.log(formData);
            $.ajax({
            url:'/admin/offers',
            type:'post',
            dataType:'json',
            data:formData,
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
                let xhrResponse = JSON.parse(xhr.responseText);
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

        })
    })

});


function format ( d ) {
    let terms = '';
    let interests = '';
    $.each(d.terms,function(key, value){
        terms += value.term+', ';
        interests += value.interest_rate+', ';
    });

    return 'Set of Terms: '+terms.substring(0, terms.length - 2)+'<br>'+
        'Set of rates %: '+interests.substring(0, interests.length - 2)+'<br>'+
        'Minimum Income Required: '+d.min_income+'<br>';
}


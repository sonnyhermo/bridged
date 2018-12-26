$(document).ready(function(){
    let childTable;
    let offerModalClone = $('#newOfferModal').clone();
    let termModalClone = $('#newTermsModal').clone(false);
    let manualAddTerm = `<div class="row">
                                <div class="form-group col-md-6">
                                    <label>Term</label>
                                    <input type="number" class="form-control" name="term" id="term" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Interest</label>
                                    <input type="number" class="form-control" name="interest_rate" id="interest" required>
                                </div>
                            </div>`;

	$('#selectLoan').on('change',function(){
        getClassifications();
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
                "width":"8%",
                render: function(data, type, row){
                    return '<p class="d-none">'+row.id+'</p>';
                }
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
                    return '<button class="btn btn-sm btn-danger offer-delete" data-offer="'+row.id+'" ><span class="fa fa-trash"></span></button>'+
			        '<button class="btn btn-sm btn-info offer-edit" data-offer="'+row.id+'" ><span class="fa fa-edit"></span></button>';;
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
        let offer = $(this).find('p').html();
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

            //instantiate child table
            childTable = $('#childTable').DataTable({
                pagingType: 'simple',
                pageLength: 5,
                lengthChange: false,
                ajax:{
                    url:'/admin/offer_terms',
                    data: { offer: offer}
                },
                columns:[
                    {data: 'term', name: 'term'},
                    {
                        data: 'interest_rate', 
                        name: 'interest_rate',
                        render: function(data, type, row){
                            return data+' %';
                        }
                    },
                    {
                        data: null,
                        render: function ( data, type, row ) {
                            return `<button class="btn btn-fill btn-sm btn-danger term-delete" data-id="${row['id']}"><span class="fa fa-trash"></span></button>
                            <button class="btn btn-fill btn-sm btn-info term-edit" data-id="${row['id']}"><span class="fa fa-pencil-square-o"></span></button>`;
                        }
                    }
                ]
            });
        }
    } );

    $('#offersTable tbody').on('click','tr .offer-edit', function(){
        let offer = $(this).data('offer');

        $.ajax({
            url: '/admin/offers/'+offer+'/edit',
            type: 'get',
            dataType: 'json',
            success:function(res){
                console.log(res);

                $('#selectLoan').val(res.classification.loan_id);
                
                $.when(getClassifications()).done(function(){
                    $('#selectClassification').val(res.classification_id);
                });

                $('#newOfferModal .modal-title').html('Edit Offer');
                $('#offerForm').attr('action', '/admin/offers/'+offer);
                $('#offerForm').prepend('<input type="hidden" name="_method" value="PUT">');
                $('#selectBank').val(res.bank_id);
                $('#txtProduct').val(res.product);
                $('#txtMinIncome').val(res.min_income);
                $('#txtMinLoan').val(res.min);
                $('#txtMaxLoan').val(res.max);
                $('#txtRequirements').val(res.requirements);
                $('#divTerms').remove();

                $('#newOfferModal').modal('show');
            },
            error:function(xhr){
                ajaxErrorDisplay(xhr.responseText);
            }
        });
    });

    $('#offersTable tbody').on('click','tr .offer-delete', function(){
        let offer = $(this).data('offer');
        $.ajax({
            url: '/admin/offers/'+offer,
            type:'delete',
            dataType:'json',
            success:function(res){
                ajaxSuccessResponse(res).then(function(value){
                    location.reload();
                });
            },
            error:function(xhr){
                ajaxErrorDisplay(xhr.responseText);
            }
        })
    });

    $('#newOfferModal').on('hidden.bs.modal', function () {
        $("#newOfferModal").replaceWith(offerModalClone);
    });

    $('#offersTable tbody').on('click','tr .term-edit', function(){
        let term = $(this).data('id');
        $.ajax({
            url:'/admin/terms/'+term+'/edit',
            type:'get',
            dataType:'json',
            success:function(res){
                $('#newTermsModal .modal-title').html('Edit Branch');
                $('#addthru').remove();
                $('#txtBank').remove();
                $('#termForm').attr('action','/admin/terms/'+res.id);
                $('#termForm #inner').html(manualAddTerm);
                $('#termForm #inner').prepend('<input type="hidden" name="_method" value="PUT">');
                $('#termForm').removeClass('d-none');
                $('#termForm').find('#term').val(res.term);
                $('#termForm').find('#interest').val(res.interest_rate);
                $('#newTermsModal').modal('show');
            },
            error:function(xhr){
                ajaxErrorDisplay(xhr.responseText);
            }
        });
    });

    $('#offersTable tbody').on('click', 'tr .term-delete', function(){
        let term = $(this).data('id');
        $.ajax({
            url:'/admin/terms/'+term,
            type:'destroy',
            dataType:'json',
            success:function(res){
                ajaxSuccessResponse(res).then(function(value){
                    location.reload();
                });
            },
            error: function(xhr){
                ajaxErrorDisplay(xhr.responseText);
            }
        })
    })

    $('#newTermsModal').on('hide.bs.modal', function () {
        $("#newTermsModal").replaceWith(termModalClone);
    });

	dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    });

    $('#offerForm').submit(function(e){
        e.preventDefault();
        let formData = new FormData($(this)[0]);
        let url = $(this).attr('action');
            $.ajax({
            url:url,
            type:'post',
            dataType:'json',
            data:formData,
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

        })
    });

    $('input[name=addOption]').on('click',function(){
        let innerHtml; 
        if($(this).val() == 'excel'){
            innerHtml = `<div class="form-group">
                            <label>Terms & Interests</label>
                            <input type="file" name="terms" class="form-control-file" id="fileTerms" required>
                        </div>`;
        }else{
            innerHtml = manualAddTerm;
        }

        $('#termForm #inner').html(innerHtml);
        $('#termForm').removeClass('d-none');;
    });

    $('#termForm').validate({
        submitHandler: function(form){
            let data, contentType, processData;
            if($('#fileTerms').length){
                data = new FormData($(form)[0]);
                contentType = false;
                processData = false;
            }else{
                data = $(form).serialize();
                contentType = "application/x-www-form-urlencoded; charset=UTF-8";
                processData = true;
            }
    
            $.ajax({
                url: $(form).attr('action'),
                type: 'post',
                data: data,
                dataType: 'json',
                contentType: contentType,
                processData: processData,
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
    })

});


function format ( d ) {
    $('#txtOffer').val(d.id);
    return `<table id="childTable" class="text-center" width="100%">
        <thead>
            <tr>
                <th>Terms</th>
                <th>Interest</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>
    <div class="col-md-12 mt-5">
        <strong>Minimum Income Required: ${d.min_income}</strong><br/>
        <strong>Requirements: </strong>${d.requirements}
    </div>
    <div class="col-md-12 mt-3">
        <button class="btn btn-warning btn-sm btn-fill mt-4" data-toggle="modal" data-target="#newTermsModal">Add More Terms & Interests</button>
    </div>`;
}


function getClassifications(){
    return $.ajax({
        url: '/admin/loans/'+$('#selectLoan').val(),
        type: 'get',
        dataType: 'json',
        success: function(res){
            console.log(res);
            let options = "<option value=''>Select Loan Type</option>";
                $.each(res, function(skey, sval){
                    options += "<option value='"+sval.id+"'>"+sval.classification+"</option>"
                })

            $('#selectClassification').html(options);
        },
        error: function(xhr){
            console.log(xhr.responseText);
        }
    });
}

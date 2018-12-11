$(document).ready(function(){
	let bankModalClone = $("#newBankModal").clone();
	let branchModalClone = $("#newBranchModal").clone();
	let childTable;
	let manualAddBranch = `<div class="form-group">
							<label>Branch Name</label>
							<input type="text" class="form-control" name="branch" placeholder="Enter New Branch" required>
						</div>
						<div class="form-group">
							<label>Branch Address</label>
							<input type="text" class="form-control" name="address" placeholder="Enter Branch Address" required>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label>Branch Tel No.</label>
								<input type="text" class="form-control" name="telephone" placeholder="Enter Branch Telephone" required>
							</div>
							<div class="form-group col-md-6">
								<label>Branch Region</label>
								<input type="text" class="form-control" name="region" placeholder="Enter Branch Region" required>
							</div>
						</div>`;

	$('#bankForm').validate({
		submitHandler: function(){
			let formData = new FormData($('#bankForm')[0]);
			let method = $('#bankForm input[name=_method]').val();
			let url = $('#bankForm').attr('action');


			$.ajax({
				url: (typeof method != 'undefined')? '/admin/banks/'+res.slug:'/admin/banks',
				type: (typeof method != 'undefined')? 'put':'post',
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
		}
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
                class:          "details-control ",
                orderable:      false,
                data:           "",
                defaultContent: "",
                render: function(data, type, row){
                	return '<p class="d-none">'+row.slug+'</p>';
                }
            },
            {
            	data: 'logo',
            	name: 'logo',
            	render: function ( data, type, row ) {
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
			        return `<button class="btn btn-sm btn-danger bank-delete" data-id="${row['slug']}"><span class="fa fa-trash"></span></button>
			        <button class="btn btn-sm btn-info bank-edit" data-id="${row['slug']}"><span class="fa fa-pencil-square-o"></span></button>`;
		    	}
		    }
        ],
	});

	var bank_detailRows = [];
 
    $('#banksTable tbody').on( 'click', 'tr td.details-control', function () {
        let tr = $(this).closest('tr');
        let bank = $(this).find('p').html();
        let row = bank_dt.row( tr );
        let idx = $.inArray( tr.attr('id'), bank_detailRows );
 
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
            
            //instantiate child table
           childTable = $('#childTable').DataTable({
		        pagingType: 'simple',
		        pageLength: 5,
		        lengthChange: false,
		        ajax:{
		        	url:'/admin/bank_branches',
		        	data: { bank: bank}
		        },
		        columns:[
		        	{data: 'branch', name: 'branch'},
		        	{data: 'address', name: 'address'},
		        	{data: 'telephone', name: 'telephone'},
		        	{data: 'region', name: 'region'},
		        	{
		            	data: null,
					    render: function ( data, type, row ) {
					        return `<button class="btn btn-sm btn-danger bank-branch-delete" data-id="${row['slug']}"><span class="fa fa-trash"></span></button>
					        <button class="btn btn-sm btn-info bank-branch-edit" data-id="${row['slug']}"><span class="fa fa-pencil-square-o"></span></button>`;
				    	}
				    }
		        ]
		    });
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

                $('#txtNewBank').val(res.name);
                $('#txtBankEmail').val(res.email);
                $('#txtBankDescription').val(res.description);
                
                $.each(res.coverage.split(', '), function(key, val){
                	$("input[type=checkbox][value='"+val+"']").prop("checked",true);
                })


                $('#newBankModal').modal('show');
            },
            error:function(xhr){
                console.log(xhr.responseText);
            }
        });
    });

    $('#banksTable tbody').on( 'click', 'tr .bank-branch-delete', function() {
		let branch = $(this).data('id');
		let row = $(this).parent('tr');
		swal({
			title:'Oopps Wait',
			text:'Remove this branch partner?',
			icon:'warning',
			buttons: ["Cancel", "Okay"],
		}).then(function(value){
			if(value){
				$.ajax({
					url: '/admin/branches/'+branch,
					type: 'delete',
					dataType: 'json',
					success:function(res){
						ajaxSuccessResponse(res).then(function(value){
							childTable.ajax.reload();s
						});
					},
					error:function(xhr){
						ajaxErrorDisplay(xhr.responseText);
					}
				})
			}
		});
	});

	$('#banksTable tbody').on( 'click', 'tr .bank-branch-edit', function() {
		$('#newBranchModal .modal-title').html('Edit Branch');
		$('#addthru').remove();
		$('#txtBank').remove();
		$('#bank-branches').remove();
		$('#branchForm').prepend(manualAddBranch);
		$('#branchForm').removeClass('d-none');
		$('#branchForm').attr('data-process','edit');
		$('#newBranchModal').modal('show');

	});

    $('#newBankModal').on('hidden.bs.modal', function () {
        $("#newBankModal").replaceWith(bankModalClone);
        $('#bankForm').attr('action','/admin/banks');
	});
	
	$('input[name=addOption]').on('click',function(){
		let innerHtml; 
		if($(this).val() == 'excel'){
			innerHtml = `<div class="form-group">
							<label>Bank Branches</label>
							<input type="file" name="branches" class="form-control-file" id="fileBranches" required>
						</div>`;
		}else{
			innerHtml = manualAddBranch;
		}

		$('#branchForm #inner').html(innerHtml);
		$('#branchForm').removeClass('d-none');
		console.log(innerHtml);
	});

	$('#branchForm').validate({
		submitHandler: function(){
			let data, contentType, processData, type = 'post';
			if($('#fileBranches').length){
				data = new FormData($('#branchForm')[0]);
				contentType = false;
				processData = false;
				console.log('hey');
			}else{
				data = $('#branchForm').serialize();
				contentType = "application/x-www-form-urlencoded; charset=UTF-8";
				processData = true;
				if($('#branchForm').data('process') == 'edit'){
					type = 'put';
				}
			}
			console.log(type);
			$.ajax({
				url: '/admin/branches',
				type: type,
				data: data,
				dataType: 'json',
				contentType: contentType,
				processData: processData,
				success:function(res){
					console.log(res);
					/*ajaxSuccessResponse(res).then(function(value){
						location.reload();
					});*/
				},
				error:function(xhr){
					console.log(xhr.responseText);
					//ajaxErrorDisplay(xhr.responseText);
				}
			});
		}
	});

	
});

function format ( d ) {
	$('#txtBank').val(d.slug);
	console.log($('#txtBank').val());
	let rows = '';
	$.each(d.branches, function(key,val){
		rows += `<tr>
			<td>${val.branch}</td>
			<td>${val.address}</td>
			<td>${val.telephone}</td>
			<td>${val.region}</td>
            <td><button class="btn btn-sm btn-danger bank-branch-delete" data-id="${val.slug}"><span class="fa fa-trash"></span></button>
	        <button class="btn btn-sm btn-info bank-branch-edit" data-id="${val.slug}"><span class="fa fa-pencil-square-o"></span></button></td>
        </tr>`;
	})
	return `<table id="childTable" class="text-center" width="100%">
		<thead>
			<tr>
				<th>Branch</th>
				<th>Address</th>
				<th>Telephone</th>
				<th>Region</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			${rows}
		</tbody>
	</table>
	<div class="col-md-12 mt-5">
		<button class="btn btn-warning btn-sm btn-fill mt-4" data-toggle="modal" data-target="#newBranchModal">Add More Branches</button>
	</div>`;
}

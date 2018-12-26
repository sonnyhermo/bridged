$(document).ready(function(){
    let route = window.location.pathname.split("/").pop();

    $('.dropdown-list').on('change',function(){
    	let loanType = $('#loanType').val();
    	let sortType = $('#sortType').val();
    	console.log(sortType);
    	if(loanType != ""){
    		$('#applicationTable').DataTable({
    			destroy:true,
				processing: true,
		        serverSide: true,
		        pagingType: 'simple',
		        pageLength: 10,
		        searching: false,
		        lengthChange: false,
		        ajax: {
		        	url:'/creditor/all_unassigned',
		        	data: {loan:loanType, sort:sortType}
		        },
		        columns: [
		            {data: 'created_at'},
		            {
		            	data: 'fullname',
		            	render: function(data, type, row){
		            		return `<a href="/creditor/borrower/${row.id}/${row.type}">${data}</a>`;
		            	}
		            },
		            {data: 'classification'},
		            {data: 'amount'},
		            {data: 'term'},
		            {
		            	data: 'status',
		            	render: function(data, type, row){
		            		return `<select id="dropdown-status" data-id="${row.id}">
		            			<option value="unassigned" ${row.status == 'unassigned' ? 'selected': ''}>Unassigned</option>
		            			<option value="under review" ${row.status == 'under review' ? 'selected': ''}>Under Review</option>
		            			<option value="approved" ${row.status == 'approved' ? 'selected': ''}>Approved</option>
		            			<option value="booked" ${row.status == 'booked' ? 'selected': ''}>Booked</option>
		            			<option value="declined" ${row.status == 'declined' ? 'selected': ''}>Declined</option>
		            		</select>`;
		            	}
		            },
		            {
		            	data: null,
		            	render: function(data, type, row){
		            		return '<button class="btn btn-sm messages" data-application="'+row.id+'" data-toggle="modal" data-target="#loanCommentModal"><i class="fa fa-comment"></i></button>';
		            	}
		            }
		        ],
			});
    	}
    });

  	let previous;

 	$("#applicationTable tbody").on('focus','#dropdown-status', function () {
        previous = $(this).val();
    })

    $("#applicationTable tbody").on('change','#dropdown-status', function () {
    	let optionVal = $(this);
    	let status = $(this).val();
        swal({
        	title:'Opps Wait!',
        	text:'Are you sure, you want to change the status of this offer',
        	icon:'warning',
        	buttons: ["No", "Yes, Process"],
        }).then(function(value){
        	if(value){
        		$.ajax({
        			url:'/creditor/application/update-status/1',
        			dataType:'json',
        			data: {status: status},
        			type:'put',
        			success:function(res){
        				console.log(res);
        			}
        		});
        	}else{
        		optionVal.val(previous);
        	}
        })
    });

    $('#applicationTable tbody').on('click', '.messages', function(){
    	let application = $(this).data('application');
    	$('#loan-message-form #application').val(application);
        $.ajax({
            url:'/comments',
            type: 'get',
            dataType: 'json',
            data: {application: application},
            success:function(res){
              $.each(res, function(key, val){
                    let objDiv = $("#loan-messages");
                    let h = objDiv.get(0).scrollHeight;
                    let comment = `<p class="comments ${((val.user_type == 0)?'fromCreditor':'fromBorrower')}">${val.created_at} ${val.comment}</p>`;
                    
                    objDiv.append(comment); 
                    objDiv.animate({scrollTop: h});

              });
            },
            error:function(xhr){
                console.log(xhr.responseText);
            }
        })
    });

    $('#loan-message-form').validate({
    	submitHandler: function(form){
    		let data = new FormData($(form)[0]);
    		data.append('user_type', 0);
    		$.ajax({
    			url:'/comments',
    			type: 'post',
    			data: data,
    			dataType: 'json',
    			contentType: false,
    			processData: false,
    			success: function(res){
    				let comment = `<p class="comments fromCreditor">${res.created_at} ${res.comment}</p>
                    <hr>`;
                    console.log(comment);
    				$('#loan-messages').append(comment);
    			},
    			error:function(xhr){
    				console.log(xhr.responseText);
    			}
    		});
    	}
    });
})
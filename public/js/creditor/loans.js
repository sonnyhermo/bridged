$(document).ready(function(){
    let route = window.location.pathname.split("/").pop();

    $('#loanType').on('change',function(){
    	let loanType = $(this).val();
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
		        	data: {loan:loanType}
		        },
		        columns: [
		            {data: 'created_at'},
		            {
		            	data: 'fullname',
		            	render: function(data, type, row){
		            		return `<a href="/creditor/user/${row.id}">${data}</a>`;
		            	}
		            },
		            {data: 'classification'},
		            {data: 'amount'},
		            {data: 'term'},
		            {data: 'status'},
		            {
		            	data: null,
		            	render: function(data, type, row){
		            		return '<button class="btn btn-sm" data-toggle="modal" data-target="#loanCommentModal"><i class="fa fa-comment"></i></button>';
		            	}
		            }
		        ],
			});
    	}
    });
})
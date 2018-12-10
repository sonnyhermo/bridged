let swalTitle;
let swalText;
let swalType;

function ajaxSuccessResponse(res){
	if(res.hasOwnProperty('status')){
	    if(res.status == 1){
	        swalTitle = 'Success';
	        swalType = 'success'; 
	    }else{
	        swalTitle = 'Error';
	        swalType = 'error';
	    }

	    swalText = res.message;
	}

	return swal({
	  title: swalTitle,
	  text: swalText,
	  icon: swalType,
	});
}

function ajaxErrorDisplay(jsonString){
	let xhrResponse = JSON.parse(jsonString);
    console.log(jsonString);
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
    });
}

function sub_DataTable(table_id) {
    var subtable = $('#'+table_id).DataTable({
        
        pagingType: 'simple',
        pageLength: 1,
        lengthChange: false,
      
    });
}
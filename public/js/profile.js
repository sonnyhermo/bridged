$(document).ready(function(){
	$('#btn-profile-submit').click(function(e){
		e.preventDefault();
		myStepper.next();
	});

	$('#btn-fund-submit').click(function(e){
		e.preventDefault();
		myStepper.next();
	});

	$('.previous').click(function(e){
		e.preventDefault();
		myStepper.previous();
	});
});
function adjustOptionsNumber(){
    number++;
	$.ajax({

		url: 'user/edit_role',
		type: 'POST',
		data: { number: number},
		success: function(data){

	
		},
		fail: function(data){

		
		}

	});
}
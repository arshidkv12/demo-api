$(document).ready(function(){

	$(".create-order").submit(function(e){
	
		e.preventDefault();
		var urlTxt = $(this).find('.url').val();    
	    $.ajax({
			url: urlTxt,
			type: 'POST',
			'dataType': "json",
			context: this,
			data: $(this).serialize(),
	   
	    success: function(data, textStatus, xhr) {
        	$(this).find('.status').text(textStatus +" : " + xhr.status );
        	var data = JSON.stringify(data,null, 4);
        	$(this).find('pre').text( data );

	    },
	    complete: function(xhr, textStatus) {
	       $(this).find('.status').text(textStatus +" : " + xhr.status );
	    } 
		     
		});
	});

	$(".today-data").submit(function(e){
	
		e.preventDefault();
		var urlTxt = $(this).find('.url').val();    
	    $.ajax({
			url: urlTxt,
			type: 'GET',
			'dataType': "json",
			 context: this,
			//data: $(this).serialize(),
	   
	    success: function(data, textStatus, xhr) {
        	$(this).find('.status').text(textStatus +" : " + xhr.status );
        	var data = JSON.stringify(data,null, 4);
        	$(this).find('pre').text( data );

	    },
	    complete: function(xhr, textStatus) {
	       $(this).find('.status').text(textStatus +" : " + xhr.status );
	    } 
		     
		});
	});


	$(".order-byid").submit(function(e){
	
		e.preventDefault();
		var urlTxt = $(this).find('.url').val();    	
	    $.ajax({
			url: urlTxt,
			type: 'GET',
			'dataType': "json",
			context: this,
	    success: function(data, textStatus, xhr) {
        	$(this).find('.status').text(textStatus +" : " + xhr.status );
        	var data = JSON.stringify(data,null, 4);
        	$(this).find('pre').text( data );

	    },
	    complete: function(xhr, textStatus) {
	       $(this).find('.status').text(textStatus +" : " + xhr.status );
	    }  
		     
		});
	});



	$(".cancel-order").submit(function(e){
	
		e.preventDefault();
		var urlTxt = $(this).find('.url').val();    	
	    $.ajax({
			url: urlTxt,
			type: 'PUT',
			'dataType': "json",
			context: this,
	    success: function(data, textStatus, xhr) {
        	$(this).find('.status').text(textStatus +" : " + xhr.status );
        	var data = JSON.stringify(data,null, 4);
        	$(this).find('pre').text( data );

	    },
	    complete: function(xhr, textStatus) {
	       $(this).find('.status').text(textStatus +" : " + xhr.status );
	    }  
		     
		});
	});

});

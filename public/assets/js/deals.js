$(document).ready(function(){
	$("#searchProductInput_").on('keyup', function(){
		//get products
		let searchKey = $(this).val();
	    if (searchKey !== "") {
	    	$.ajax({
		        url:"/vendor/ajax-get-deals-product/fetch?search_key="+searchKey,
		        method:'GET',
		        cache:false,
		        success:function(response){
		            $("#render__data").html(response)
		        },
		        error: function (jqXHR, textStatus, errorThrown) {
		            if (jqXHR.status === 422) {
		                alert('Sorry\n'+ jqXHR.responseText)
		                //window.location.reload(true)
		            }else if (jqXHR.status === 401) {
		                alert('Sorry\n'+ jqXHR.responseText)
		                //window.location.reload(true)
		            }else{
		                alert('Sorry\n Something unknown problem')
		                //window.location.reload(true)
		            }

		        }
		    })
	    
	    }else{
	    	return false;
	    }


	})


	$("#render__data").on('click', "ul li", function(){
		let productID = $(this).attr('getproductid')
		let getTitle = $(this).attr('gettitle')
		
		$("#set__productID").val(productID)
		$("#searchProductInput_").val(getTitle)
		$("#render__data .auto-complete-wrapper").html('')
	})



	//if submit form
	$("#dealCreatingForm").on('submit', function(e){
		e.preventDefault()
		let form = $(this);
		let url = form.attr('action');
		let type = form.attr('method');

		let form_data = form.serialize();

			$.ajax({
				url: url,
				data: form_data,
				method: type,
				dataType: 'JSON',
				cache: false,
				beforeSend:function(){
					$("#dealCreatingForm button[type=submit]").attr('disabled', true)
				},
				success: function(response){
					$("#dealCreatingForm button[type=submit]").attr('disabled', false)
					if (response.success === true){
						alert(response.msg)
						window.location.reload(true)
					}else{
						alert('Unexpected Error Occured!!')
						window.location.reload(true)
					}
										
				},
				error: function (jqXHR, textStatus, errorThrown) {
					$("#dealCreatingForm button[type=submit]").attr('disabled', false)
					
					if (jqXHR.status === 422) {
	                  	alert('Sorry\n'+ jqXHR.responseText)
	                }else if (jqXHR.status === 500) {
	                  	alert('Sorry\n'+ jqXHR.responseText)
	                  	window.location.reload(true)
	                }else if (jqXHR.status === 404) {
	                  	alert('Sorry\n'+ jqXHR.responseText)
	                }else{
	                  	alert('Sorry\n Something unknown problem')
	                  	window.location.reload(true)
	                }

	            },
	            complete:function(){
	            	$("#dealCreatingForm button[type=submit]").attr('disabled', false)
	            }
	        });
	})
})
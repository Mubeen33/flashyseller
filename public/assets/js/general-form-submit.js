$(document).ready(function(){

	//search products
	$("#searchProductInput_").on('keyup', function(){
		//get products
		let searchKey = $(this).val();
		if (!$(this).val()) {
			$("#render__data").html('')
			return;
		}
	    if (searchKey !== "") {
	    	$.ajax({
		        url:"/vendor/ajax-get-deals-product/fetch?search_key="+searchKey,
		        method:'GET',
		        cache:false,
		        success:function(response){
		            $("#render__data").html(response)
		        },
		        error: function (jqXHR, textStatus, errorThrown) {
		            if (jqXHR.status === 404) {
		                $("#render__data").html(jqXHR.responseText)
		            }else if (jqXHR.status === 422) {
		                let string_to_obj = JSON.parse(jqXHR.responseText)
	                  	//console.log(string_to_obj.field)
                  		$("input[name="+string_to_obj.field+"]").addClass('border-danger-alert');
                  		$("input[name="+string_to_obj.field+"]").siblings('.place-error--msg').html(string_to_obj.msg);
	                  	

                  	
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



	

})



function formSubmitWithFile(formID, url, type, form_data){
		$.ajax({
			url: url,
			data: new FormData(document.getElementById(formID)),
			method: type,
			dataType: 'JSON',
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function(){
				$("#"+formID +"button[type=submit]").attr('disabled', true)
			},
			success: function(response){
				if (response.success === true) {
					alert(response.msg)
					window.location.reload(true)
				}else{
					alert("Something went wrong...")
					window.location.reload(true)
				}
									
			},
			error: function (jqXHR, textStatus, errorThrown) {
				$("#"+formID +"button[type=submit]").attr('disabled', false)
				if (jqXHR.status === 422) {
                  	let string_to_obj = JSON.parse(jqXHR.responseText)
                  	//console.log(string_to_obj.field)
                  	if (string_to_obj.field !== "id__") {
                  		$("input[name="+string_to_obj.field+"]").addClass('border-danger-alert');
                  		$("input[name="+string_to_obj.field+"]").siblings('.place-error--msg').html(string_to_obj.msg);

                  		if (string_to_obj.need_scroll === "yes") {
	                  		$('html, body').animate({
			                    scrollTop: $("input[name="+string_to_obj.field+"]").offset().top
			                }, 1000);
	                  	}
                  	}

                  	if (string_to_obj.field === "id__") {
                  		$("#"+string_to_obj.targetID).addClass('border-danger-alert');
                  		$("#"+string_to_obj.targetID).siblings('.place-error--msg').html(string_to_obj.msg);

                  		if (string_to_obj.need_scroll === "yes") {
	                  		$('html, body').animate({
			                    scrollTop: $("#"+string_to_obj.targetID).offset().top
			                }, 1000);
	                  	}
                  	}
                  	
                  	
                }else if (jqXHR.status === 500) {
                  	alert('Sorry\n'+ jqXHR.responseText)
                  	//window.location.reload(true)
                }else if (jqXHR.status === 404) {
                  	alert('Sorry\n'+ jqXHR.responseText)
                }else{
                  	alert('Sorry\n Something unknown problem')
                  	//window.location.reload(true)
                }

            },
            complete:function(){
            	$("#"+formID +"button[type=submit]").attr('disabled', false)
            }
        });
}

//remove form validation error
function removeErrorLevels(getThis, type){
	if (type === "input") {
		getThis.removeClass('border-danger-alert')
		getThis.siblings('.place-error--msg').html('')
		return;
	}

	if (type === "id__") {
		console.log('yes this is id')
		return;
	}
	console.log('yes outside')
	
}
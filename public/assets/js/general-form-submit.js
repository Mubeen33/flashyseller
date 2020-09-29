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
				$("#"+formID +" button[type=submit]").attr('disabled', true)
			},
			success: function(response){
				$("#"+formID +" button[type=submit]").attr('disabled', false)
				if (response.success === true) {
					$("#display--success--msg").removeClass('d-none')
					$("#display--success--msg .place-text").html((response.msg))
					
					if ($("#"+formID +" .preview--file").length) {
						$("#"+formID +" .preview--file").addClass('d-none')
					}
					$("#"+formID)[0].reset();
					$('html, body').animate({
	                    scrollTop: $("#display--success--msg").offset().top
	                }, 1000);

				}else{
					// console.log(response);
					//alert("Something went wrong...")
					window.location.reload(true)
				}
									
			},
			error: function (jqXHR, textStatus, errorThrown) {
				$("#"+formID +" button[type=submit]").attr('disabled', false)
				if (jqXHR.status === 422) {
                  	let string_to_obj = JSON.parse(jqXHR.responseText)
                  	//console.log(string_to_obj.field)
                  	if ($("input[name="+string_to_obj.field+"]").length) {
                  		$("input[name="+string_to_obj.field+"]").addClass('border-danger-alert');
                  		$("input[name="+string_to_obj.field+"]").siblings('.place-error--msg').html(string_to_obj.msg);

                  		if (string_to_obj.need_scroll === "yes") {
	                  		$('html, body').animate({
			                    scrollTop: $("input[name="+string_to_obj.field+"]").offset().top
			                }, 1000);
	                  	}
                  	}

                  	if ($("select[name="+string_to_obj.field+"]").length) {
                  		$("select[name="+string_to_obj.field+"]").addClass('border-danger-alert');
                  		$("select[name="+string_to_obj.field+"]").siblings('.place-error--msg').html(string_to_obj.msg);

                  		if (string_to_obj.need_scroll === "yes") {
	                  		$('html, body').animate({
			                    scrollTop: $("select[name="+string_to_obj.field+"]").offset().top
			                }, 1000);
	                  	}
                  	}


                  	if ($("textarea[name="+string_to_obj.field+"]").length) {
                  		$("textarea[name="+string_to_obj.field+"]").addClass('border-danger-alert');
	              		$("textarea[name="+string_to_obj.field+"]").siblings('.place-error--msg').html(string_to_obj.msg);

	              		if (string_to_obj.need_scroll === "yes") {
	                  		$('html, body').animate({
			                    scrollTop: $("textarea[name="+string_to_obj.field+"]").offset().top
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
            	$("#"+formID +" button[type=submit]").attr('disabled', false)
            }
        });
}



function formClientSideValidation(event, formID, needScrolling){
	let formPass = true;
	let scrollUpToFieldName = "";

	if ($("#"+formID+" [is-required]").length) {
			$("#"+formID+" [is-required]").each(function(){
				if (!$(this).val()) {
					event.preventDefault()
					formPass = false;					
					scrollUpToFieldName = $(this).attr('name')
						          		
	          		$(this).addClass('border-danger-alert');
	          		$(this).siblings('.place-error--msg').html("This field is required.");
				}
		})

		if (formPass === false) {
			if (needScrolling === "yes") {
				if ($("textarea[name="+scrollUpToFieldName+"]").length) {
					$('html, body').animate({
		                    scrollTop: $("textarea[name="+scrollUpToFieldName+"]").offset().top
		             }, 1000);
				}

				if ($("input[name="+scrollUpToFieldName+"]").length) {
					$('html, body').animate({
		                    scrollTop: $("input[name="+scrollUpToFieldName+"]").offset().top
		             }, 1000);
				}

				if ($("select[name="+scrollUpToFieldName+"]").length) {
					$('html, body').animate({
		                    scrollTop: $("select[name="+scrollUpToFieldName+"]").offset().top
		             }, 1000);
				}
	  			
	  		}
	  		return;
		}
	}
	

	//finally submit the form
	$("#"+formID).submit()
}


//remove form validation error
function removeErrorLevels(getThis, type){
	if (type === "input") {
		getThis.removeClass('border-danger-alert')
		getThis.siblings('.place-error--msg').html('')
		return;
	}

	if (type === "id__") {
		getThis.removeClass('border-danger-alert')
		getThis.siblings('.place-error--msg').html('')
		return;
	}
	console.log('yes outside')
	
}
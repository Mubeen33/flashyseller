function getVariantOption(variation_id) {

	if (variation_id !== "") {
		$.ajax({
			url:"/vendor/ajax-get-variant-options/fetch?variation_id="+variation_id,
			method:'GET',
			cache:false,
			success:function(response){

                console.log(response);
                let secondVariations = response.second_variations;
                let variationName = response.variationName;
                let variationList = response.variationList;

                var html = "<div class='col-md-4'><b class='mr-2'>" + variationName;
                html+= "</b><button class='btn btn-default'>Delete</button></div>";
                
                html += "<div class='col-md-4'>";
                html += "<select class='form-control'>";
                secondVariations.forEach(element => {
                html += "<option value="; 
                html +=  element.id + ">" + element.option_name });
                html += "</option>";
                html+="</select>";
                html+="</div><div class='col-md-4'></div>";


				$("#loadSecondVariationOptionsData").append(html);
			},
		});
	
	} else{
		return false;
	}
}
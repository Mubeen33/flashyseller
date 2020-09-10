function getVariantOption(variation_id) {

	if (variation_id !== "") {
		$.ajax({
			url:"/vendor/ajax-get-variant-options/fetch?variation_id="+variation_id,
			method:'GET',
			cache:false,
			success:function(response){

                variantcounter++;

                //console.log(response);
                let secondVariations = response.second_variations;
                let variationName = response.variationName;
                let variationList = response.variationList;

                var html = "<div class='my-2 row w-100' id='variantid" + variation_id + "'><div class='col-md-4'><b class='mr-2'>" + variationName;
                html+= "</b><button class='btn btn-default btn-remove' >Delete</button></div>";
                
                html += "<div class='col-md-4'>";
                if(secondVariations.length>0) {
                html += "<select class='form-control'>";
                
                    secondVariations.forEach(element => {
                    html += "<option value="; 
                    html +=  element.id + ">" + element.option_name });
                    html += "</option>";
                    html+="</select>";
                }
                else {
                    html += "<input type='text' class='form-control' />";
                }
                html+="</div><div class='col-md-4'></div></div>";
                II = II + 1;

                console.log("In Adding: ", variantcounter);
                if(variantcounter>=2) {
                    $("#addVariantButton").hide();
                    $("#render__variations__data").hide();
                    variantcounter = 2;
                }


                $("#loadSecondVariationOptionsData").append(html);
                
			},
		});
	
	} else{
		return false;
    }
    

    $(document).on('click', '.btn-remove', function(e){  
        e.preventDefault();

        var button_id = $(this).parent().parent().attr("id");  
        $("#"+button_id).remove();  

        variantcounter--;
        console.log("After Delete Variant: ", variantcounter);

        $("#addVariantButton").show();
        $("#render__variations__data").show();

        variantcounter++;
     });  
}
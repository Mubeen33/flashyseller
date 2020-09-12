"use sctrict";

function getVariantOption(variation_id) {

    let li_counter = 0;
    let li_counter3 = 0;

    var secondVariations;

	if (variation_id !== "") {

        variantcounter = variantcounter + 1;
        
        if(variantcounter>=2) {
            $("#addVariantButton").hide();
            $("#render__variations__data").hide();
            variantcounter = 2;
        }

		$.ajax({
			url:"/vendor/ajax-get-variant-options/fetch?variation_id="+variation_id,
			method:'GET',
			cache:false,
			success: (response) => {

                secondVariations = response.second_variations;
                let variationName = response.variationName;
                let variationList = response.variationList;

                getVariantOptions(variationName, secondVariations, variationList, variation_id);
			},
		});
	
    } 
    else
    {
		return false;
    }
}



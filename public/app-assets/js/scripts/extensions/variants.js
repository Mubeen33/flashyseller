function getVariantOption(variation_id) {

    let li_counter = 0;
    var secondVariations;

	if (variation_id !== "") {
		$.ajax({
			url:"/vendor/ajax-get-variant-options/fetch?variation_id="+variation_id,
			method:'GET',
			cache:false,
			success:function(response){

                variantcounter++;

                //console.log(response);
                secondVariations = response.second_variations;
                let variationName = response.variationName;
                let variationList = response.variationList;
                //console.log("List: ", variationList);

                let variationListTargettedValue = variationList.filter(obj => {
                    return obj.variation_name === variationName
                });

               // console.log(variationListTargettedValue);

                var html = "<div class='my-2 row w-100' id='variantid" + variation_id + "'>";
                html += "<div class='col-md-4'><b class='mr-2'>" + variationName;
                html+= "</b><button class='btn btn-default btn-remove' >Delete</button>";
                html += "<br><div><div class='form-check'><input type='checkbox' class='form-check-input d-block' style='width: auto;'/><label class='form-check-label'>Image</label></div>";
                html += "<div class='form-check'><input type='checkbox' class='form-check-input d-block' style='width: auto;'/><label class='form-check-label'>SKU</label></div>";
                html += "</div>";
                html += "</div>";
                html += "<div class='col-md-4'>";
                if(variationListTargettedValue[0].is_select === 1) {
                html += "<select class='form-control second-variant-selectbox' id='variant-select2" + variation_id + "'>";
                html += "<option value='-1'>Select An Option</option>";
                    secondVariations.forEach(element => {
                    html += "<option value="; 
                    html +=  element.id + ">" + element.option_name });
                    html += "</option>";
                    html+="</select>";
                    html += "<div><ul class='variant2List sortable' id='sortable-select" + variation_id + "'></ul></div>";
                }
                else {
                    html += "<div class='d-flex'><input type='text' class='form-control variation2value" + variation_id +"' />";
                    html += "<button class='btn btn-info variation-add-button border-rad-0 varation2add" + variation_id + "'>Add</button></div>";
                    html += "<div><ul class='variant2List sortable' id='sortable" + variation_id + "'></ul></div>";
                }

                html += "</div><div class='col-md-4'></div></div>";
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
    

    // Remove Main Variant After Adding Them

    $(document).on('click', '.btn-remove', function(e){  
        e.preventDefault();

        var button_id = $(this).parent().parent().attr("id");  
        $("#"+button_id).remove();  

        variantcounter--;
        //console.log("After Delete Variant: ", variantcounter);

        $("#addVariantButton").show();
        $("#render__variations__data").show();

        variantcounter++;
     }); 
     
     
    // Add Sub Variant which have Input Fields

    $(document).on('click', '.varation2add'+variation_id, function(e){
        e.preventDefault();
        let valv2 = $(".variation2value" + variation_id).val();
        li_counter++; 
        
        let htmlVariant = '';
        
        htmlVariant += "<li class='my-1' id='variantLi" + variation_id + li_counter + "'>";
        htmlVariant += "<div class='d-flex'><span class='px-1 py-05 border w-100'>" +  valv2 + "</span>";
        htmlVariant += "<button class='btn btn-sm border-rad-0 border remove-variant2'>X</button></div></li>";
        
        $("#sortable" + variation_id).append(htmlVariant);
        $(".variation2value" + variation_id).val('');
    });


    // Remove Sub Variant From the List 

    $(document).on('click', '.remove-variant2', function(e){
        e.preventDefault();
        let deleteLiItem = $(this).parent().parent().attr('id');
        $("#" + deleteLiItem).remove();

    });


    // Variant which has Select-Option

    $(document).on('change', "#variant-select2" + variation_id , function(){

        let value_of_select = this.value;
        var option_value_name;

        for(var m = 0; m < secondVariations.length; m++) {
            let ourSelect2Obj = secondVariations[m];
            if(ourSelect2Obj.id == value_of_select) {
                option_value_name = ourSelect2Obj.option_name;
            }
        }

        if(value_of_select>0) {
            li_counter++; 
            let htmlVariant = '';
            
            htmlVariant += "<li class='my-1' id='variantLi" + variation_id + li_counter + "'>";
            htmlVariant += "<div class='d-flex'><span class='px-1 py-05 border w-100'>" +  option_value_name + "</span>";
            htmlVariant += "<button class='btn btn-sm border-rad-0 border remove-variant2'>X</button></div></li>";
            
            $("#sortable-select" + variation_id).append(htmlVariant);
        }
    });
    
    $( "#sortable" + variation_id ).sortable();
    $( "#sortable"  + variation_id ).disableSelection();
    $( "#sortable-select"  + variation_id ).sortable();
    $( "#sortable-select"  + variation_id ).disableSelection();
}



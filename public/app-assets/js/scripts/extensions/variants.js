const { has } = require("lodash");

function getVariantOption(variation_id) {

    let li_counter = 0;
    let li_counter3 = 0;

    var secondVariations;

	if (variation_id !== "") {

        variantcounter = variantcounter + 1;

		$.ajax({
			url:"/vendor/ajax-get-variant-options/fetch?variation_id="+variation_id,
			method:'GET',
			cache:false,
			success:function(response) {

                //variantcounter++;

                secondVariations = response.second_variations;
                let variationName = response.variationName;
                let variationList = response.variationList;

                let variationListTargettedValue = variationList.filter(obj => {
                    return obj.variation_name === variationName
                });

                var html = "<div class='my-2 row w-100' id='variantid" + variation_id + "'>";
                html += "<div class='col-md-4'><b class='mr-2'>" + variationName;
                html+= "</b>";
                html+="<button class='btn btn-default text-decoration-underline btn-edit" + variation_id + "' style='display: none;'>Edit unit</button>"
                html+="<button class='btn btn-default btn-remove text-decoration-underline'>Delete</button>";

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

                html += "<br><div><div class='form-check'><input type='checkbox' class='form-check-input d-block' style='width: auto;'/><label class='form-check-label'>Image</label></div>";
                html += "<div class='form-check'><input type='checkbox' class='form-check-input d-block' style='width: auto;'/><label class='form-check-label'>SKU</label></div>";
                html += "</div>";
                html += "</div>";
                html += "<div class='col-md-4'>";
                html += "<div><ul class='variant2List sortable' id='sortable3" + variation_id + "'></ul></div>";
                html += "</div><div class='col-md-4'>";
                html += "</div></div>";

        
                if(variantcounter>=2) {
                    $("#addVariantButton").hide();
                    $("#render__variations__data").hide();
                    variantcounter = 2;
                }

                //$(".btn-edit").hide();

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

        $("#addVariantButton").show();
        $("#render__variations__data").show();

        //variantcounter++;
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


    $(document).on('click', '.btn-edit' + variation_id, function(e){
        e.preventDefault();
        $(this).hide();
        $("#variant-select2"+variation_id).show();
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
        var hasThirdVariation = [];
        $("#variant-select2"+variation_id).hide();
        $(".btn-edit" + variation_id).css('display', 'inline-block');

        $.ajax({
            url:"/vendor/ajax-get-variant-options-options/fetch?variation_id="+value_of_select,
			method:'GET',
			cache:false,
			success:function(response){
                hasThirdVariation = response.variation3;
                
                    if(hasThirdVariation.length > 0) 
                    {
                        let htmlvariant3 = '';
                        htmlvariant3 += "<select class='form-control' id='variant3FinalSelect" + value_of_select + "'>";
                        

                        htmlvariant3 += "<option value='-1'>Select An Option</option>";
                        hasThirdVariation.forEach(element => {
                        htmlvariant3 += "<option value="; 
                        htmlvariant3 +=  element.id + ">" + element.option_name });
                        htmlvariant3 += "</option>";
                        htmlvariant3+="</select>";
                        htmlvariant3 += "<ul class='sortable' id='sortableFinalUL" + value_of_select + "'>"
                        $("#sortable3"+variation_id).html(htmlvariant3);
                   }
                   else {

                        let htmlVariant3Input = '';
                        htmlVariant3Input += "<div class='d-flex'><input type='text' class='form-control placeholder-class variation3value" + variation_id + value_of_select +"' />";
                        htmlVariant3Input += "<button class='btn btn-info variation-add-button border-rad-0 varation3add" + variation_id + value_of_select + "'>Add</button></div>";
                        htmlVariant3Input += "<div><ul class='variant3List sortable' id='sortable4" + variation_id + "'></ul></div>";
                    
                        $("#sortable3"+variation_id).html(htmlVariant3Input);
                        let placeholderText;

                        for(let T = 0; T<secondVariations.length; T++) {
                            if(secondVariations[T].id == value_of_select) {
                                placeholderText = secondVariations[T].option_name;
                            }
                        }

                        $(".variation3value" + variation_id + value_of_select).attr("placeholder", placeholderText);
                    }
                }
                
            });

        $(document).on('change', '#variant3FinalSelect' + value_of_select, function(e){

            e.preventDefault();
            
            li_counter++; 
            let value_of_last_variant = this.value;
            let name_of_last_variant;

            for(var LL = 0; LL < hasThirdVariation.length; LL++)
            {
                if(hasThirdVariation[LL].id == value_of_last_variant) {
                    name_of_last_variant = hasThirdVariation[LL].option_name;
                    console.log(name_of_last_variant);
                    break;
                }
            }


            //console.log("YES: ", value_of_last_variant);
            let htmlVariant = '';
            
            htmlVariant += "<li class='my-1' id='variantLi" + value_of_select + li_counter + "'>";
            htmlVariant += "<div class='d-flex'><span class='px-1 py-05 border w-100'>" +  name_of_last_variant + "</span>";
            htmlVariant += "<button class='btn btn-sm border-rad-0 border remove-variant3'>X</button></div></li>";
            htmlVariant += "</ul>";

            $("#sortableFinalUL" + value_of_select).append(htmlVariant);
        });

        // Remove Sub Variant From the List 

        $(document).on('click', '.remove-variant3', function(e){
            e.preventDefault();
            let deleteLiItem = $(this).parent().parent().attr('id');
            $("#" + deleteLiItem).remove();

        });
        

        $(document).on('click', '.varation3add' + variation_id + value_of_select, function(e){
            e.preventDefault();

            let valv3 = $(".variation3value" + variation_id + value_of_select).val();
            li_counter3++;

            let placeholderText;

            for(let T = 0; T<secondVariations.length; T++) {
                if(secondVariations[T].id == value_of_select) {
                    placeholderText = secondVariations[T].option_name;
                    break;
                }
            }
            
            let htmlVariant = '';
            
            htmlVariant += "<li class='my-1' id='variant3Li" + variation_id + value_of_select + li_counter3 + "'>";
            htmlVariant += "<div class='d-flex'><span class='px-1 py-05 border w-100'>" +  valv3 + " "+ placeholderText + "</span>";
            htmlVariant += "<button class='btn btn-sm border-rad-0 border remove-variant4'>X</button></div></li>";
            
            $("#sortable4" + variation_id).append(htmlVariant);
            $(".variation3value" + variation_id + value_of_select).val('');
        });


        $(document).on('click', '.remove-variant4', function(e){
            e.preventDefault();
            let deleteLiItem = $(this).parent().parent().attr('id');
            $("#" + deleteLiItem).remove();

        });
    });
    
    $( "#sortable" + variation_id ).sortable();
    $( "#sortable"  + variation_id ).disableSelection();
    $( "#sortable-select"  + variation_id ).sortable();
    $( "#sortable-select"  + variation_id ).disableSelection();
    $( "#sortable4"  + variation_id ).sortable();
    $( "#sortable4"  + variation_id ).disableSelection();
}



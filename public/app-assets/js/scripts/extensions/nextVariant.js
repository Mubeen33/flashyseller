
    // Remove Main Variant After Adding Them

    $(document).on('click', '.btn-remove' + variation_id, function(e){  
        e.preventDefault();

        var button_id = $(this).parent().parent().attr("id");  
        $("#"+button_id).remove();  

        //console.log("Before Delete: ", variantcounter);
        variantcounter--;
        //console.log("After Delete: ", variantcounter);

        $("#addVariantButton").show();
        $("#render__variations__data").show();

        //variantcounter++;
     }); 
     
     
    // Add Sub Variant which have Input Fields
    //li_counter = 0;
    var ListArray = [];

    $(document).on('click', '.varation2add'+variation_id, function(e){
        e.preventDefault();
        let valv2 = $(".variation2value" + variation_id).val();
        

        //console.log(ListArray.length);


        if(valv2==='') {
            $(".variation2value" + variation_id).css('border', '1px solid red');
        }
        else 
        {
            ListArray.push(valv2);
            $(".variation2value" + variation_id).css('border', '1px solid #D9D9D9');
            li_counter++; 
            let htmlVariant = '';

            console.log(ListArray.length);
            
            htmlVariant += "<li class='my-1' id='variantLi" + variation_id + li_counter + "'>";
            htmlVariant += "<div class='d-flex'><span class='px-1 py-05 border w-100'>" +  valv2 + "</span>";
            htmlVariant += "<button class='btn btn-sm border-rad-0 border remove-variant2'>X</button></div></li>";
            
            $("#sortable" + variation_id).append(htmlVariant);
            $(".variation2value" + variation_id).val('');
        }
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

    $(document).on('change', "#variant-select2" + variation_id , function(e){

        e.preventDefault();

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
                        let placeholderText = '';

                        for(let T = 0; T<secondVariations.length; T++) {
                            if(secondVariations[T].id == value_of_select) {
                                placeholderText = secondVariations[T].option_name;
                                break;
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
                    
                    break;
                }
            }

            console.log("Last Variant: ", name_of_last_variant);


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
function getVariantOptions(variationName, secondVariations, variationList, variation_id) {
    var html = "";
    html += "<div class='my-2 row w-100' id='mainVariantID" + variation_id + "'>";
        html += "<div class='col-md-4'>";
            html += "<span><b>" + variationName + "</b></span>";
            if(secondVariations.length > 0) {
                html += "<button class='btn btn-default text-decoration-underline btn-edit-unit" + variation_id + "'>Edit Unit</button>"
            }
            html += "<button class='btn btn-default text-decoration-underline btn-delete-variant" + variation_id + "'>Delete</button>"
            if(secondVariations.length > 0) {
                html += "<select class='form-control second-variant-selectbox' id='variant-select2" + variation_id + "'>";
                html += "<option value='-1'>Select An Option</option>";

                secondVariations.forEach(element => {
                    html += "<option value="; 
                    html +=  element.id + ">" + element.option_name 
                });
                html += "</option>";
                html += "</select>";
            }
        html += "</div>";
    html += "</div>";

    $("#loadSecondVariationOptionsData").append(html);

    if(secondVariations.length > 0) {
        selectUnitFunction(variation_id);
    }
}




// Select Unit Function

function selectUnitFunction(variation_id)
{
    $(document).on('change', '#variant-select2' + variation_id, function(){
        var value = (this).value;
        console.log(value);
    });
}



/*
let variationListTargettedValue = variationList.filter(obj => {
    return obj.variation_name === variationName
});

var html = "<div class='my-2 row w-100' id='variantid" + variation_id + "'>";
html += "<div class='col-md-4'><b class='mr-2'>" + variationName;
html += "</b>";
html +="<button class='btn btn-default text-decoration-underline btn-edit" + variation_id + "' style='display: none;'>Edit unit</button>"
html +="<button class='btn btn-default text-decoration-underline btn-remove" + variation_id + "'>Delete</button>";

if(variationListTargettedValue[0].is_select === 1) 
{
    html += "<select class='form-control second-variant-selectbox' id='variant-select2" + variation_id + "'>";
    html += "<option value='-1'>Select An Option</option>";

    secondVariations.forEach(element => {
    html += "<option value="; 
    html +=  element.id + ">" + element.option_name });
    html += "</option>";
    html += "</select>";
    html += "<div><ul class='variant2List sortable' id='sortable-select" + variation_id + "'></ul></div>";
}
else 
{
    html += "<div class='d-flex'><input type='text' class='form-control variation2value" + variation_id +"' required />";
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





$("#loadSecondVariationOptionsData").append(html);
*/
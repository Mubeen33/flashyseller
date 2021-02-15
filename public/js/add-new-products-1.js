//
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
$(function() {
    $("div.dz-preview").parent().children('div.dz-message').css('display', 'none');
 });

// variant card
function openVariant(){
    $('#variant-card').css('display','');
}
//validate numaric on keypress
$(document).ready(function() {
    $("#width,#hieght,#length,#weight").on("keypress keyup blur", function(event) {

        $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
         if($(this).val().length>6){
            
            event.preventDefault();
        }
        if (((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) ) {
            event.preventDefault();
        }

    });
});

//end validate numaric on keypress

//border color set for required fields 
function bordercolor(name) {

    $("input[name=" + name + "]").addClass("b-red");

}

// function addparamsurl(parmTitle, parmVal, parmType) {
//     // if (parmType == '&') {
//     //     var refresh = window.location.protocol + "//" + window.location.host + window.location.pathname + '&' + parmTitle + '=' + parmVal;
//     //     window.history.pushState({ path: refresh }, '', refresh);
//     // }
//     // if (parmType == '?') {
//     //     var refresh = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + parmTitle + '=' + parmVal;
//     //     window.history.pushState({ path: refresh }, '', refresh);
//     // }

// }
//divs hide on next move code start
function nextShow(nextDiv) {
    $('#' + nextDiv).css('display', 'block');
}
//divs hide on next move code end



//search categories dynamic code start
function search(cat_input, cat_id) {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById(cat_input);
    filter = input.value.toUpperCase();
    ul = document.getElementById(cat_id);
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
//search categories dynamic code end

//tinny editor code start
tinymce.init({
    selector: '#editortiny',
    plugins: 'wordcount paste table wordcount  searchreplace  directionality fullscreen table hr  insertdatetime lists textcolor wordcount colorpicker textpattern',
    content_css: '//www.tiny.cloud/css/codepen.min.css',
    toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | paste pastetext | wordcount',
    toolbar2: 'fontsizeselect | fontselect',
    font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;Montserrat=Montserrat;Terminal=terminal,monaco;Times New Roman=times new roman,times;Verdana=verdana,geneva;Impact=impact,chicago;',

    height: "550",
    relative_urls: false,
    remove_script_host: false,
    convert_urls: true
});
//tiny editor code end
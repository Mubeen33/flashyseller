
//button disabled
function btnDisabled(btn,type){
    $('#'+btn).prop('disabled', type);
}
//append parameters in url without reload page
function setProductID(productID){
	var url;
	var urlSplit=( window.location.href ).split( "?" );     
    var obj = { Url: urlSplit[0] +'?productID='+ productID };      
    history.pushState(obj, obj.Title, obj.Url);  
    }
//refresh category div
$("#collapsecat,.prev,.next,.show").click(function(){
$('#resource-slider .resource-slider-item').each(function(i) {
    var $this = $(this),
    left = $this.width() * i;
    $this.css({
     left: left
     })
    });
});

//remove image button
function removeImgVer(img,inputfile,trashIcon,imgAddress){
			var urll=imgAddress;
			$('#'+img).attr("src",urll);
		    $('#'+inputfile).val(''); 
			$('#' + trashIcon).css('display', 'none');
		}
//check required fields   
$("#varientBtn").click(function(){
          
    var width=$('#width').val();
	var height=$('#weight').val();
	var length=$('#length').val();
	var weight=$('#hieght').val();
	if( width !='' && height !='' && length !='' && weight !=''){
		
		btnText=$('#varientBtn').text();
		if(btnText=='Update'){
			$('#inventoryBtn').click();
		}else{

		 $("#varientBtn").text('Update');
		 $('#invCollap').click();
	     nextShow('addvariationsdiv');
         nextShow('customer_options');

		
		}
		requiredcheck();
		
	}else{
		
		requiredcheck();
	}
	

});

//required fields check border-color change
function requiredcheck(){
	var required = document.querySelectorAll("input[required]");
           required.forEach(function(element) {
           if(element.value.trim() == "") {
           element.style.borderColor  = "rgb(228, 88, 88)";
           } else {
             element.style.borderColor  = "";
           }
          });
}
//picture step
function afterimg(){

	if (dropzon_file_1==true) {
        btnDisabled('finishProduct',true); 
      
		dropzon_file_1=false;
		$('.emptymsgs').text('');
       nextShow('inventoryDiv');
	   imgtxt=$('#finishProduct').text();
	   if(imgtxt=='Update'){
		toastr.success('', 'Product step 3 Updated!');
	    }else{
		toastr.success('', 'Product step 3 completed!');
	   }
	  $('#finishProduct').text('Update');
      $('#imgCollap').click();
      btnDisabled('finishProduct',false); 
   }else{
	$('#dropzon_file_1').text('Thumbnail is required.');
	toastr.error('', 'Please Upload Thumbnail!');
   } 
}
//changing text of dropzone	
$( document ).ready(function() {
    $("#dpz-single-file-p1 .dz-default").children("span").text("Drop Thumbnail");
	//   $("#dpz-single-file-p1 .dz-default").children("span").addClass('strong')
});
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

// $( "").change(function() {      
              
//   });         
  $("#width,#hieght,#length,#weight").bind("paste", function(e){
    // access the clipboard using the api
     var pastedData = e.originalEvent.clipboardData.getData('text');
    // alert(pastedData);
         
    if(pastedData.length>6){
           
            e.preventDefault();       
    }

    if (e.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
        e.preventDefault();
      }   
} );
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
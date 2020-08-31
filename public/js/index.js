$(document).ready(function(){
    // add variation ..
      
      var n = 0;
      $("#variationopt").change(function(){
        var v = $(this).val();
        n = n +1;
        if(n <= 2) {
              if(v == "pc") {   
                var subcolor = 0;        
                var selectcode = '<select class="form-control" id="pcolorselect"/></select>';
                var opt = '<div id="pcopt"></div>';
                $("#variationsbox").append("<div tas='vri"+n+"''><label class='mb-xs-2 strong'>Primary Colour</label> <span class='delvari' del='vari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-5 col-sm-5 col-md-6'><input type='checkbox' name='pcprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='pcqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='pcsku' /> SKU vary for each primary colour</div><div class='col-lg-7 col-md-7 col-sm-7'>"+selectcode + opt +"</div><br/><hr/></div>");
                $("#pcolorselect").html("<option value='red'>Red</option><option value='blue'>blue</option><option value='skin'>skin</option><option value='purple'>Purp</option>");  
                $("#pcopt").append("<br />");
                $("#pcolorselect").change(function(){
                 //alert("asd");
                  v = $(this).val();
                  $("#pcopt").append("<input type='text' subcoloro='"+subcolor+"' value="+v+" class='form-control' readonly='readonly'/><span id='opt1"+subcolor+"' scolorremove='"+subcolor+"' class='rmv'><font color='red'>Remove</font></span>");
                });

                 // alert("#opt1"+subcolor);
                  /*
                  $(".rmv").click(function(){
                      var o = $(this).attr('scolorremove');
                      alert("asd");

                  });
                     */ 

              } else if(v == "sc") {           
                $("#variationsbox").append("<div tas='vri"+n+"''><label class='mb-xs-2 strong'>Secondary Colour</label> <span class='delvari' del='vari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='flavourprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='scqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='scsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div><br/><hr/></div>");
             
              } else if(v == "diameter"){
                var dian = 0;
                var diaselect = '<label>Select Units</label><select class="form-control" id="diameterselect"></select>';
                var diaopt = '<div id="diaopt"></div>';
               
                $("#variationsbox").append("<div tas='vri"+n+"''><label class='mb-xs-2 strong'>Diameter</label> <span class='delvari' del='vari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><br/>"+diaselect+"<br /><input type='checkbox' name='diaprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='diaqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='diasku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'>"+diaopt+"</div><br/><hr/></div>");
               
                $("#diameterselect").html("<br/><option>Choose Unit</option><option value='Inch'>Inches</option><option value='Feet'>Feet</option><option value='Centimeters'>Centimeters</option><option value='Meters'>Meters</option><option value='Millimeters'>Millimeters</option><option value='Yards'>Yards</option>");  
                $("#diameterselect").on("change",function(){
                  var dianum = 0;
                  if(dian == 0){
                    var diameterunit = $(this).val(); // diameterunit ..
                    $("#diaopt").append("<div class='input-group'><input type='text' dia='val"+dianum+"' style='text-align:right;' id='diaunit' class='form-control' value=&nbsp; aria-label='' aria-describedby='basic-addon2'><div class='input-group-append'><span class='input-group-text rmv' id='basic-addon2' unit='uni'>"+diameterunit+"</span></div><div class='input-group-append'><span class='input-group-text rmv' id='basic-addon2' dianum='"+dianum+"' add='unit'>+ Add</span></div></div>");
                    dian = dian +1;
                  } else {
                    var diameterunit = $(this).val();
                    $("[unit='uni']").text(diameterunit);
                  }
                  // add unit ..
                  $("[add='unit']").click(function(){
                        // diametter number ..
                        var dianu = $(this).attr('dianum');
                        var vlu   = $("[dia='val"+dianu+"']").val();
                        alert(vlu+diameterunit);
                  });
                });
              } else if(v == "fabric") {     
                $("#variationsbox").append("<div tas='vri"+n+"''><label class='mb-xs-2 strong'>Fabric</label> <span class='delvari' del='vari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='fabricprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='fabricqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='fabricsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div><br/><hr/></div>");
              } else if(v == "flavour") {
                $("#variationsbox").append("<div tas='vri"+n+"''><label class='mb-xs-2 strong'>Flavour</label> <span class='delvari' del='vari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='flavourprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='flavourqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='flavoursku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div><br/><hr/></div>");
              } else if(v == "height") {
                $("#variationsbox").append("<div tas='vri"+n+"''><label class='mb-xs-2 strong'>Height</label> <span class='delvari' del='vari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='heightprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='heightqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='heightsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div><br/><hr/></div>");
              } else if (v == "length"){     
               
                $("#variationsbox").append("<div tas='vri"+n+"''><label class='mb-xs-2 strong'>Length</label> <span class='delvari' del='vari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='lengthprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='lengthqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='lengthsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div><br/><hr/></div>");
              } else if (v == "material"){
               
                $("#variationsbox").append("<div tas='vri"+n+"''><label class='mb-xs-2 strong'>Material</label> <span class='delvari' del='vari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='materialprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='materialqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='materialsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div><br/><hr/></div>");
              } else if (v == "pattren"){ 
               
                $("#variationsbox").append("<div tas='vri"+n+"''><label class='mb-xs-2 strong'>Pattren</label> <span class='delvari' del='vari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='pattrenprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='pattrenqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='pattrensku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div><br/><hr/></div>");
              } else if (v == "scent"){
               
                $("#variationsbox").append("<div tas='vri"+n+"''><label class='mb-xs-2 strong'>Scent</label> <span class='delvari' del='vari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='scentprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='scentqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='scentsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div><br/><hr/></div>");
              } else if (v == "size"){
                 
               
                $("#variationsbox").append("<div tas='vri"+n+"''><label class='mb-xs-2 strong'>Size</label> <span class='delvari' del='vari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='sizeprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='sizeqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='sizesku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div><br/><hr/></div>");
              } else if (v == "style"){
          
                $("#variationsbox").append("<div tas='vri"+n+"''><label class='mb-xs-2 strong'>Style</label> <span class='delvari' del='vari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='styleprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='styleqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='stylesku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div><br/><hr/></div>");
              } else if (v == "weight"){
               
                $("#variationsbox").append("<div tas='vri"+n+"''><label class='mb-xs-2 strong'>Weight</label> <span class='delvari' del='vari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='weightprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='weightqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='weightsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div><br/><hr/></div>");
                
              } else if (v == "width"){
               
                $("#variationsbox").append("<div tas='vri"+n+"''><label class='mb-xs-2 strong'>Width</label> <span class='delvari' del='vari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='widthprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='widthqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='widthsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div><br/><hr/></div>");
                
              } else if (v == "device"){
               
                $("#variationsbox").append("<div tas='vri"+n+"''><label class='mb-xs-2 strong'>Device</label> <span class='delvari' del='vari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='deviceprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='deviceqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='devicesku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div><br/><hr/></div>");
                
              } 
        }
        if (n == 2) {
          $("#variationopt").hide();
        }
        // delete variation .
        $("[del='vari']").on("click",function(){
           var d = $(this).attr('no');
           $("[tas='vri"+n+"']").remove();
          // n = n -1; 
           $("#variationopt").show();
        });
      });
    // end varation ..
    $("[product='img']").click(function(){
        var n = $(this).attr('n');
        var src = $(this).attr('src');
        $("#pimg"+n).click();
        $("#pimg"+n).change(function(event) {    
          var formData = new FormData();
          var file = document.getElementById("pimg"+n).files[0];
          formData.append("Filedata", file);
          var t = file.type.split('/').pop().toLowerCase();
          const fsize = file.size;
          var tmppath = URL.createObjectURL(event.target.files[0]);
            //$("img").fadeIn("fast").attr('src',tmppath);
          $("#img"+n).attr('src',src.replace(src,tmppath)); 
        });
    });
    /*
    $("[product='img']").click(function(){
        var n = $(this).attr('n');
        var src = $("#img"+n).attr('src');
        $("#pimg"+n).click();
        $("#pimg"+n).change(function(event) {        
            var formData = new FormData();
            var file = document.getElementById("pimg"+n).files[0];
            formData.append("Filedata", file);
            var t = file.type.split('/').pop().toLowerCase();
            const fsize = file.size;
            $("#imgg"+n).remove();
            $("#img"+n).css("display",'inline');
            var tmppath = URL.createObjectURL(event.target.files[0]);
            //$("img").fadeIn("fast").attr('src',tmppath);
            $("#img"+n).attr('src',src.replace(src,tmppath));
        });
    });
    */
    /*
    $("[productv='img']").click(function(){
        var n = $(this).attr('n');
        var src = $("#pvimg"+n).attr('src');
        $("#vimg"+n).click();
        $("#vimg"+n).change(function(event) {
            $("#pvimgg"+n).remove();
            $("#pvimg"+n).css("display",'inline');
            var tmppath = URL.createObjectURL(event.target.files[0]);
            //$("img").fadeIn("fast").attr('src',tmppath);
            $("#pvimg"+n).attr('src',src.replace(src,tmppath));
        });
    });
    */

});
$(document).ready(function(){
    $("#ui-id-1").addClass("list-group");
              $(function() {
        var projects = [
           {
              value: "Phone Cs in phone Cases",
              desc: "<p class='p-graph'> Home & living ▸ Home Decor ▸ wall decor </p>",
           },
           {
              value: "Iphone Mobile",
              desc: "<p class='p-graph'> Electornics ▸ Mobile phone ▸ Iphone</p>",
           },
           {
              value: "wall decorators",
              desc: "<p class='p-graph'> Home & living ▸ Home Decor ▸ wall decor </p>",
           },
           {
              value: "1 flat",
              desc: "<p class='p-graph'>▸ Property ▸ Home ▸ flat </p>",
           },
           {
              value: "Phone Cs in phone Cases",
              desc: "<p class='p-graph'> Home & living ▸ Home Decor ▸ wall decor </p>",
           },
           {
              value: "Phone Cs in phone Cases",
              desc: "<p class='p-graph'> Home & living ▸ Home Decor ▸ wall decor </p>",
           },
        ];
        $( "#project" ).autocomplete({
           minLength: 0,
           source: projects,
           focus: function( event, ui ) {
              $( "#project" ).val( ui.item.label );
                 return false;
           },
           select: function( event, ui ) {
              $( "#project" ).val( ui.item.label );
              $( "#project-id" ).val( ui.item.value );
              $( "#project-description" ).html( ui.item.desc );
              return false;
           }
        })
    
        .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
           return $( "<li class='list-group-item auto-list list-group-item-action'>" )
           .append( "<a style='text-decoration:none;'>" + item.label + "<br>" + item.desc + "</a>" )
           .appendTo( ul );
        };
        $("#ui-id-1").addClass("list-group");
        (".ui-helper-hidden-accessible").remove();
     });
  });
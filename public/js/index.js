$(document).ready(function(){
    // add variation ..
      
      var n = 0;
      $("#variationopt").change(function(){
          var v = $(this).val();
          n = n +1;
        if(n <= 2) {
              if(v == "pc") {             
                $("#variationsbox").append("<div id='vri"+n+"''><label class='mb-xs-2 strong'>Primary Colour</label> <span class='delvari' id='delvari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='pcprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='pcqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='pcsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div><br/><hr/>");
              } else if(v == "sc") {           
                $("#variationsbox").append("<div id='vri"+n+"''><label class='mb-xs-2 strong'>Secondary Colour</label><span class='delvari' id='delvari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='flavourprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='scqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='scsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div><br/><hr/>");
              } else if(v == "diameter"){
                $("#variationsbox").append("<div id='vri"+n+"''><label class='mb-xs-2 strong'>Diameter</label><span class='delvari' id='delvari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='diaprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='diaqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='diasku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div><br/><hr/>");
              } else if(v == "fabric") {     
                $("#variationsbox").append("<div id='vri"+n+"''><label class='mb-xs-2 strong'>Fabric</label><span class='delvari' id='delvari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='fabricprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='fabricqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='fabricsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div><br/><hr/>");
              } else if(v == "flavour") {
                $("#variationsbox").append("<div id='vri"+n+"''><label class='mb-xs-2 strong'>Flavour</label><span class='delvari' id='delvari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='flavourprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='flavourqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='flavoursku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div></div><br/><hr/>");
              } else if(v == "height") {
                $("#variationsbox").append("<label class='mb-xs-2 strong'>Height</label>");
                $("#variationsbox").append("<div id='vri"+n+"''><label class='mb-xs-2 strong'>Height</label><span class='delvari' id='delvari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='heightprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='heightqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='heightsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div></div><br/><hr/>");
              } else if (v == "length"){     
               
                $("#variationsbox").append("<div id='vri"+n+"''><label class='mb-xs-2 strong'>Length</label><span class='delvari' id='delvari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='lengthprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='lengthqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='lengthsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div></div><br/><hr/>");
              } else if (v == "material"){
               
                $("#variationsbox").append("<div id='vri"+n+"''><label class='mb-xs-2 strong'>Material</label><span class='delvari' id='delvari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='materialprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='materialqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='materialsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div></div><br/><hr/>");
              } else if (v == "pattren"){ 
               
                $("#variationsbox").append("<div id='vri"+n+"''><label class='mb-xs-2 strong'>pattren</label><span class='delvari' id='delvari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='pattrenprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='pattrenqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='pattrensku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div></div><br/><hr/>");
              } else if (v == "scent"){
               
                $("#variationsbox").append("<div id='vri"+n+"''><label class='mb-xs-2 strong'>Scent</label><span class='delvari' id='delvari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='scentprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='scentqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='scentsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div></div><br/><hr/>");
              } else if (v == "size"){
                 
               
                $("#variationsbox").append("<div id='vri"+n+"''><label class='mb-xs-2 strong'>Size</label><span class='delvari' id='delvari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='sizeprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='sizeqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='sizesku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div></div><br/><hr/>");
              } else if (v == "style"){
          
                $("#variationsbox").append("<div id='vri"+n+"''><label class='mb-xs-2 strong'>Style</label><span class='delvari' id='delvari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='styleprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='styleqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='stylesku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div></div><br/><hr/>");
              } else if (v == "weight"){
               
                $("#variationsbox").append("<div id='vri"+n+"''><label class='mb-xs-2 strong'>Weight</label><span class='delvari' id='delvari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='weightprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='weightqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='weightsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div></div><br/><hr/>");
                
              } else if (v == "width"){
               
                $("#variationsbox").append("<div id='vri"+n+"''><label class='mb-xs-2 strong'>Width</label><span class='delvari' id='delvari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='widthprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='widthqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='widthsku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div></div><br/><hr/>");
                
              } else if (v == "device"){
               
                $("#variationsbox").append("<div id='vri"+n+"''><label class='mb-xs-2 strong'>Device</label><span class='delvari' id='delvari' no='"+n+"'><font color='red'><i class='fa fa-trash'></i></font></span><div class='row'><div class='col-lg-6 col-sm-6 col-md-6'><input type='checkbox' name='deviceprice'/> Prices vary for each primary colour <br/> <input type='checkbox' name='deviceqty' /> Quantities vary for each primary colour <br/> <input type='checkbox' name='devicesku' /> SKU vary for each primary colour</div><div class='col-lg-6 col-md-6 col-sm-6'></div></div></div><br/><hr/>");
                
              }
        }
        if (n == 2) {
          $("#variationopt").remove();
        }
        $("#delvari").click(function(){
            //alert("ASd");
           var d = $(this).attr('no');
           $("#vri"+n).remove();
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
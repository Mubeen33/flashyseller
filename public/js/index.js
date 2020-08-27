$(document).ready(function(){
    

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
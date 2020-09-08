$(document).ready(function(){
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
            $("#img"+n).attr('src',src.replace(src,tmppath));
        });
    });
    
});

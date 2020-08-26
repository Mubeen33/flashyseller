$(document).ready(function(){
    $("#ui-id-1").addClass("list-group");
    $(".cat1").on('click',function(){
        $(".cat1").removeClass('active');
        $(this).addClass('active');
    });

    $(".cat2").on('click',function(){
        $(".cat2").removeClass('active');
        $(this).addClass('active');
    });
    $(".cat3").on('click',function(){
        $(".cat3").removeClass('active');
        $(this).addClass('active');
    });

    $("#cat-inp").on('click',function(){
        $("#category").slideDown("slow");
    });
    
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

    $("[category='cat']").change(function(){
        var v = $(this).val();
        $("#cat-inp").va(v);
    });
});
$(document).ready(function(){
    $("#addpv").click(function(){
        var n = 0;
        n = $(this).attr('n');
        n = +n + 1;
        $(this).attr('n',n);
       // console.log(n);
       $("#pv-main").append("<div class='product-variant' id='arrti"+n+"'><div class='row'><div class='col-lg-3'><label class='lab-edits'># Primary Colour</label><select class='form-control' name='primarycolor[]'><option>Select Primary Colour</option><option value='red'>Red</option><option value='blue'>blue</option><option value='yellow'>yellow</option></select></div><div class='col-lg-3'><label class='lab-edits'>Colour Name</label><label>(optional)</label><input type='text' placeholder='Colour name' class='form-control' name='colorname[]' /></div><div class='col-lg-3'><label class='lab-edits'>Barcode</label><input type='text' placeholder='Barcode' class='form-control' name='barrcode[]' /></div><div class='col-lg-2'><label class='lab-edits'>SKU</label><input type='text' placeholder='SKU' class='form-control' name='sku[]' /></div><div class='col-lg-1'><button class='btn btn-danger btn-small btm delo' type='button' id='delo' del='"+n+"'><i class='fa fa-trash'></i></button></div></div><br/><div class='row'><div class='col-lg-2'><div class='pv-img' n='"+n+"' productv='img'><div id='pvimgg"+n+"'><i class='fa fa-camera'></i><br />Upload Primary Image</div><img src='img.jpg' style='display:none;' class='img-box' id='pvimg"+n+"'  height='100%' width='100%'></div><input type='file' name='pvimg1[]' id='vimg"+n+"' style='display:none;' /></div><div class='col-lg-2'><div class='pv-img' n='"+n+"' productv='img'><div id='pvimgg"+n+"'><i class='fa fa-camera'></i><br />Upload Primary Image</div><img src='img.jpg' style='display:none;' class='img-box' id='pvimg"+n+"'  height='100%' width='100%'></div><input type='file' name='pvimg1[]' id='vimg"+n+"' style='display:none;' /></div><div class='col-lg-2'><div class='pv-img' n='"+n+"' productv='img'><div id='pvimgg"+n+"'><i class='fa fa-camera'></i><br />Upload Primary Image</div><img src='img.jpg' style='display:none;' class='img-box' id='pvimg"+n+"'  height='100%' width='100%'></div><input type='file' name='pvimg1[]' id='vimg"+n+"' style='display:none;' /></div><div class='col-lg-2'><div class='pv-img' n='"+n+"' productv='img'><div id='pvimgg"+n+"'><i class='fa fa-camera'></i> <br />Upload Primary Image</div><img src='img.jpg' style='display:none;' class='img-box' id='pvimg"+n+"'  height='100%' width='100%'></div><input type='file' name='pvimg1[]' id='vimg"+n+"' style='display:none;' /></div><div class='col-lg-2'><div class='pv-img' n='"+n+"' productv='img'><div id='pvimgg"+n+"'><i class='fa fa-camera'></i><br />Upload Primary Image</div><img src='img.jpg' style='display:none;' class='img-box' id='pvimg"+n+"'  height='100%' width='100%'></div><input type='file' name='pvimg1[]' id='vimg"+n+"' style='display:none;' /></div></div></div>");
       
       $(".delo").on("click",function(){
            var v = $(this).attr('del');
            $("#arrti"+n).remove();
       });
    });   
});
$(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myList li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
       $("#myInput1").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myList1 li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
      $("#myInput0").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myList0 li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#arrw").click(function(){
        var n = $(this).attr('n');
        alert(n);
      });
});

$(function(){
  $('#cancle-order').on('click', function () {
    var n = $(this).attr("n");
      Swal.fire({
        title: 'Are you sure You want to cancle Order?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        confirmButtonClass: 'btn btn-warning',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,         
      }).then(function (result) {
        if (result.value) {
          Swal.fire({
            type: "success",
            title: 'Deleted!',
            text: 'Your file has been deleted.',
            confirmButtonClass: 'btn btn-success',
          })
        }
        else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire({
            title: 'Cancelled',
            text: 'Your imaginary file is safe :)',
            type: 'error',
            confirmButtonClass: 'btn btn-success',
          })
        }
      })
  });
});

 $( document ).ready(function() {
    $("#accountability").keyup(function(){
        var loc= document.getElementById("baseurl").value;
        var redirect=loc+'encode/accountability_list';
          $.ajax({
            type: "POST",
            url: redirect,
            data:'accountability='+$(this).val(),
            beforeSend: function(){
                $("#accountability").css("background","#FFF");
            },
            success: function(data){
                $("#suggestion-accountability").show();
                $("#suggestion-accountability").html(data);
                $("#accountability").css("background","#FFF");
            }
        });
    });
    $('.acquired').keyup(function(){
        var id = $(this).attr("data-trigger");
        $('#acquired'+id).keyup(function(){
        var loc= document.getElementById("baseurl").value;
        var redirect=loc+'encode/acquired_list';
            $.ajax({
                type: "POST",
                url: redirect,
                data:'acquired='+$(this).val()+'&id='+id,
                beforeSend: function(){
                    $("#acquired"+id).css("background","#FFF");
                },
                success: function(data){
                    $("#suggestion-acquired"+id).show();
                    $("#suggestion-acquired"+id).html(data);
                    $("#acquired"+id).css("background","#FFF");
                }
            });
        });
    });
});

$(function() {
    $('.hidden').hide();
    $('.trigger').change(function() {  
    var hiddenId = $(this).attr("data-trigger");
        if ($(this).is(':checked')) {
          // Show the hidden fields.
          $("#" + hiddenId).show();
        } else {
          $("#" + hiddenId).hide();
        }
    });
});


function selectEmp(id, val, dept) {
    $("#accountability_id").val(id);
    $("#accountability").val(val);
    $("#department").val(dept);
    $("#suggestion-accountability").hide();
}

function selectAcq(id, val, loopid) {  
    $("#acquired_id"+loopid).val(id);
    $("#acquired"+loopid).val(val);
    $("#suggestion-acquired"+loopid).hide();
}

function chooseCategory(){
    var loc= document.getElementById("baseurl").value;
    var redirect = loc+'encode/getCat';
    var category = document.getElementById("category").value;
    $.ajax({
            type: 'POST',
            url: redirect,
            data: 'category='+category,
            success: function(data){
                $("#subcat").html(data);
           }
    }); 
}

function choosePrefix(){
    var loc= document.getElementById("baseurl").value;
    var redirect = loc+'encode/getPrefix';
    var subcat = document.getElementById("subcat").value;
    $.ajax({
            type: 'POST',
            url: redirect,
            data: 'subcat='+subcat,
            success: function(data){
                $("#pn").html(data);
           }
    });
}



function readPic1(input, count) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
                $('#pic1_'+count).attr('src', e.target.result);
          };
        var size1 = input.files[0].size;
        if(size1 >= 6000000){
            $("#img-check-none1-"+count).css({"display":"block"});
            $('input[type="submit"]').attr('disabled','disabled');
            $("#img2_"+count).attr('disabled','disabled');
            $("#img3_"+count).attr('disabled','disabled');
        } else {
            $("#img-check-none1-"+count).css({"display":"none"});
            $('input[type="submit"]').removeAttr('disabled');
            $("#img2_"+count).removeAttr('disabled');
            $("#img3_"+count).removeAttr('disabled');
        }
 
          reader.readAsDataURL(input.files[0]);
        
      }
}
function readPic2(input, count) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#pic2_'+count).attr('src', e.target.result);
      };
    var size2 = input.files[0].size;
    if(size2 >= 6000000){
      $("#img-check-none2-"+count).css({"display":"block"});
      $('input[type="submit"]').attr('disabled','disabled');
      $("#img3_"+count).attr('disabled','disabled');
    } else {
       $("#img-check-none2-"+count).css({"display":"none"});
       $('input[type="submit"]').removeAttr('disabled');
       $("#img3_"+count).removeAttr('disabled');
    }

      reader.readAsDataURL(input.files[0]);
  }
}
function readPic3(input, count) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#pic3_'+count).attr('src', e.target.result);
      };

      var size3 = input.files[0].size;
    if(size3 >= 6000000){
      $("#img-check-none3-"+count).css({"display":"block"});
      $('input[type="submit"]').attr('disabled','disabled');
    } else {
       $("#img-check-none3-"+count).css({"display":"none"});
       $('input[type="submit"]').removeAttr('disabled');
    }

      reader.readAsDataURL(input.files[0]);
  }
}
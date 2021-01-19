$( document ).ready(function() {
    $("#employee").keyup(function(){
        var loc= document.getElementById("baseurl").value;
        var redirect=loc+'masterfile/employee_suggest';
          $.ajax({
            type: "POST",
            url: redirect,
            data:'employee='+$(this).val(),
            beforeSend: function(){
                $("#employee").css("background","#FFF");
            },
            success: function(data){
                $("#suggestion-employee").show();
                $("#suggestion-employee").html(data);
                $("#employee").css("background","#FFF");
            }
        });
    });

    $(document).on('click', '#getSub', function(e){
        e.preventDefault();
        var uid = $(this).data('id');    
        var loc= document.getElementById("baseurl").value;
        var redirect1=loc+'masterfile/edit_subcat_modal';
        $.ajax({
              url: redirect1,
              type: 'POST',
              data: 'id='+uid,
            beforeSend:function(){
                $("#subcat").html('Please wait ..');
            },
            success:function(data){
               $("#subcat").html(data);
            },
        })
    });
});

function selectEmp(id, val) {
    $("#employee_id").val(id);
    $("#employee").val(val);
    $("#suggestion-employee").hide();
}

function chooseLoc(){
    var loc= document.getElementById("baseurl").value;
    var redirect = loc+'masterfile/getLocation';
    var location = document.getElementById("location").value;
    $.ajax({
            type: 'POST',
            url: redirect,
            data: 'location='+location,
            success: function(data){
                $("#aaf").html(data);
           }
    }); 
}




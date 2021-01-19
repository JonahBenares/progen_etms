$( document ).ready(function() {
    $("#rec").keyup(function(){
        var loc= document.getElementById("baseurl").value;
        var redirect=loc+'report/rec_list';
          $.ajax({
            type: "POST",
            url: redirect,
            data:'rec='+$(this).val(),
            beforeSend: function(){
                $("#rec").css("background","#FFF");
            },
            success: function(data){
                $("#suggestion-receivedby").show();
                $("#suggestion-receivedby").html(data);
                $("#rec").css("background","#FFF");
            }
        });
    });

    $('.receive').keyup(function(){
        var id = $(this).attr("data-trigger");
        $('#receive'+id).keyup(function(){
        var loc= document.getElementById("baseurl").value;
        var redirect=loc+'repair/rec_list';
            $.ajax({
                type: "POST",
                url: redirect,
                data:'receive='+$(this).val()+'&id='+id,
                beforeSend: function(){
                    $("#receive"+id).css("background","#FFF");
                },
                success: function(data){
                    $("#suggestion-receive"+id).show();
                    $("#suggestion-receive"+id).html(data);
                    $("#receive"+id).css("background","#FFF");
                }
            });
        });
    });
});

function selectRec(id, val, loopid) {  
    $("#rec_id"+loopid).val(id);
    $("#receive"+loopid).val(val);
    $("#suggestion-receive"+loopid).hide();
}
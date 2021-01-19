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

    $('.checked').keyup(function(){
        var id = $(this).attr("data-trigger");
        $('#checked'+id).keyup(function(){
        var loc= document.getElementById("baseurl").value;
        var redirect=loc+'report/checked_list';
            $.ajax({
                type: "POST",
                url: redirect,
                data:'checked='+$(this).val()+'&id='+id,
                beforeSend: function(){
                    $("#checked"+id).css("background","#FFF");
                },
                success: function(data){
                    $("#suggestion-checked"+id).show();
                    $("#suggestion-checked"+id).html(data);
                    $("#checked"+id).css("background","#FFF");
                }
            });
        });
    });

    $('.submitted').keyup(function(){
        var id = $(this).attr("data-trigger");
        $('#submitted'+id).keyup(function(){
        var loc= document.getElementById("baseurl").value;
        var redirect=loc+'report/submitted_list';
            $.ajax({
                type: "POST",
                url: redirect,
                data:'submitted='+$(this).val()+'&id='+id,
                beforeSend: function(){
                    $("#submitted"+id).css("background","#FFF");
                },
                success: function(data){
                    $("#suggestion-submitted"+id).show();
                    $("#suggestion-submitted"+id).html(data);
                    $("#submitted"+id).css("background","#FFF");
                }
            });
        });
    });

    $('.noted').keyup(function(){
        var id = $(this).attr("data-trigger");
        $('#noted'+id).keyup(function(){
        var loc= document.getElementById("baseurl").value;
        var redirect=loc+'report/noted_list';
            $.ajax({
                type: "POST",
                url: redirect,
                data:'noted='+$(this).val()+'&id='+id,
                beforeSend: function(){
                    $("#noted"+id).css("background","#FFF");
                },
                success: function(data){
                    $("#suggestion-noted"+id).show();
                    $("#suggestion-noted"+id).html(data);
                    $("#noted"+id).css("background","#FFF");
                }
            });
        });
    });

    $("#assign").keyup(function(){
        var loc= document.getElementById("baseurl").value;
        var redirect=loc+'report/assignlist';
        $.ajax({
            type: "POST",
            url: redirect,
            data:'assign='+$(this).val(),
            beforeSend: function(){
                $("#assign").css("background","#FFF");
            },
            success: function(data){
                $("#suggestion-assign").show();
                $("#suggestion-assign").html(data);
                $("#assign").css("background","#FFF");
            }
        });
    });

    var loc= document.getElementById("baseurl").value;
    var redirect=loc+'report/itemlist';
    $("#item").keyup(function(){
        $.ajax({
            type: "POST",
            url: redirect,
            data:'item='+$(this).val(),
            beforeSend: function(){
                $("#item").css("background","#FFF");
            },
            success: function(data){
                $("#suggestion-item").show();
                $("#suggestion-item").html(data);
                $("#item").css("background","#FFF");
            }
        });
    });
});
 
function selectChk(id, val, loopid) {  
    $("#checked_id"+loopid).val(id);
    $("#checked"+loopid).val(val);
    $("#suggestion-checked"+loopid).hide();
}

function selectSbmt(id, val, loopid) {  
    $("#submitted_id"+loopid).val(id);
    $("#submitted"+loopid).val(val);
    $("#suggestion-submitted"+loopid).hide();
}

function selectNtd(id, val, loopid) {  
    $("#noted_id"+loopid).val(id);
    $("#noted"+loopid).val(val);
    $("#suggestion-noted"+loopid).hide();
}

function selectRec(id, val) {
    $("#rec_id").val(id);
    $("#rec").val(val);
    $("#suggestion-receivedby").hide();
}

function selectAssign(emp_id,emp,dept,position,aaf_no, children,type) {
    if(type==1){
        var element = document.getElementById("receive_by");
        element.innerHTML = emp;
    } else {
        var child = children.split(",");
        var key='';
        var ch='';
        for(i = 0; i < child.length; i++){
            var element = document.getElementById("receive_by");
            ch += "<p>"+child[i]+"</p>";
            element.innerHTML = ch;
        }
    }
    $("#assign_id").val(emp_id);
    $("#assign").val(emp);
    $("#department").val(dept);
    $("#position").val(position);
    $("#aaf_no").val(aaf_no);
    $("#department").css({"pointer-events": "none"});
    $("#position").css({"pointer-events": "none"});
    $("#receive_by").css({"pointer-events": "none"});
    $("#aaf_no").css({"pointer-events": "none"});
    $("#suggestion-assign").hide();
}

function selectItem(id,setid,edid,val,acn,date,type,serial,brand,model,qty,unit,price,total,currency) {
    $("#item_id").val(id);
    $("#ed_id").val(edid);
    $("#set_id").val(setid);
    $("#type").val(type);
    $("#item").val(val);
    $("#acn").val(acn);
    $("#acq_date").val(date);
    $("#serial").val(serial);
    $("#brand").val(brand);
    $("#model").val(model);
    $("#qty").val(qty);
    $("#unit").val(unit);
    $("#price").val(price);
    $("#currency").val(currency);
    $("#total").val(total);
    $("#suggestion-item").hide();
}

function add_item(){
    var loc= document.getElementById("baseurl").value;
    var redirect=loc+'report/getitem';
    var item =$('#item').val();
    var type =$('#type').val();
    var itemid =$('#item_id').val();
    var edid =$('#ed_id').val();
    var setid =$('#set_id').val();
    var acn =$('#acn').val();
    var acq_date =$('#acq_date').val();
    var serial =$('#serial').val();
    var model =$('#model').val();
    var brand =$('#brand').val();
    var qty =$('#qty').val();
    var unit =$('#unit').val();
    var price =$('#price').val();
    var currency =$('#currency').val();
    var total =$('#total').val();
    var i = item.replace(/&/gi,"and");
    var i = i.replace(/#/gi,"");
    var itm = i.replace(/"/gi,"");
    if(itemid==''){
         alert('Item must not be empty. Please choose/click from the suggested item list.');
    }
     else {
        var rowCount = $('#item_body tr').length;
        count=rowCount+1;
        $.ajax({
            type: "POST",
            url:redirect,
            data: "itemid="+itemid+"&setid="+setid+"&edid="+edid+"&item="+item+"&count="+count+"&acn="+acn+"&acq_date="+acq_date+"&type="+type+"&serial="+serial+"&model="+model+"&brand="+brand+"&qty="+qty+"&unit="+unit+"&price="+price+"&total="+total+"&currency="+currency,
            success: function(html){
                //alert(html);
                $('#item_body').append(html);
                $('#savebutton').show();
                document.getElementById("item").value = '';
                document.getElementById("counter").value = count;
            }
        });
    }       
}

function remove_item(i){
    $('#item_row'+i).remove();
    var rowCount = $('#item_body tr').length;
    if(rowCount==0){
        $('#savebutton').hide();
        $('#itemtable').hide();
    } else {
        $('#savebutton').show();
        $('#itemtable').show();
    }
     
}

 function saveAssign(){

    var assigndata = $("#Assignform").serialize();
    var itemid = document.getElementById('item_id').value;
    var assign = document.getElementById('assign').value;
    var loc= document.getElementById("baseurl").value;
    var redirect = loc+'report/insert_assign';
    if(assign==""){
        alert('Please fill out Employee.');
    }
    else if(itemid==""){
        alert('Please fill out Item.');
    }else {
         $.ajax({
                type: "POST",
                url: redirect,
                data: assigndata,
                success: function(output){
                    /*window.close();
                    window.opener.location.href=loc+'receive/add_receive_first/'+output; */      
                    //alert(output);
                }
          });
    }
     
}

function chooseTrans(){
    var loc= document.getElementById("baseurl").value;
    var redirect = loc+'report/getTrans';
    var date = document.getElementById("date").value;
    var location = document.getElementById("location").value;
    $.ajax({
            type: 'POST',
            url: redirect,
            data: 'date='+date+'&location='+location,
            success: function(data){
                $("#trans").html(data);
           }
    }); 
}

function chooseArs(){
    var loc= document.getElementById("baseurl").value;
    var redirect = loc+'report/getArs';
    var date = document.getElementById("date").value;
    var ids = document.getElementById("ids").value;
    $.ajax({
            type: 'POST',
            url: redirect,
            data: 'date='+date+'&ids='+ids,
            success: function(data){
                $("#ars").html(data);
           }
    }); 
}

function chooseEtdr(){
    var loc= document.getElementById("baseurl").value;
    var redirect = loc+'report/getEtdr';
    var date = document.getElementById("recdate").value;
    var id = document.getElementById("id").value;
    var count = document.getElementById("count").value;
    $.ajax({
        type: 'POST',
        url: redirect,
        data: 'date='+date+'&id='+id,
        success: function(data){
            $('#etdr').html(data); 
        }
    }); 
}

function chooseCategory(){
    var loc= document.getElementById("baseurl").value;
    var redirect = loc+'report/getCat';
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

$('.noted').keyup(function(){
        var id = $(this).attr("data-trigger");
        $('#noted'+id).keyup(function(){
        var loc= document.getElementById("baseurl").value;
        var redirect=loc+'report/noted_list';
            $.ajax({
                type: "POST",
                url: redirect,
                data:'noted='+$(this).val()+'&id='+id,
                beforeSend: function(){
                    $("#noted"+id).css("background","#FFF");
                },
                success: function(data){
                    $("#suggestion-noted"+id).show();
                    $("#suggestion-noted"+id).html(data);
                    $("#noted"+id).css("background","#FFF");
                }
            });
        });
    });

function saveReplace(){

    var repdata = $("#Replaceform").serialize();
    var itemid = document.getElementById('item_id').value;
    var assign = document.getElementById('assign').value;
    var loc= document.getElementById("baseurl").value;
    var redirect = loc+'index.php/report/insert_replace';
    if(itemid==""){
        alert('Please fill out Item.');
    }else {
         $.ajax({
                type: "POST",
                url: redirect,
                data: repdata,
                success: function(output){
                    /*window.close();
                    window.opener.location.href=loc+'index.php/receive/add_receive_first/'+output; */      
                    //alert(output);
                }
          });
    }
     
}

$(document).ready(function(){
    $('#name').on('change', function() {
        var loc= document.getElementById("baseurl").value;
        var name= document.getElementById("name").value;
        var redirect = loc+'index.php/report/getsetInfo';
        var value = $(this).val();
        var sets = $('#sets [value="' + value + '"]').data('customvalue');
        if(name!=''){
            $.ajax({
                type: 'POST',
                url: redirect,
                global:false,
                data: 'set='+sets,
                dataType: 'json',
                cache:false,
                success: function(response){
                    $("#set").val(response.set);
                    $("#name").val(response.set_name);
                    $("#price").val(response.price);
                    $("#currency").val(response.currency);
                    $("#serial").val(response.serial);
                }
            });
        }else{
            $("#set").val('');
            $("#name").val('');
            $("#price").val('');
            $("#currency").val('');
            $("#serial").val('');
        }
    });
});




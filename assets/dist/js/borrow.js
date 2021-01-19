$( document ).ready(function() {
    $("#borrow").keyup(function(){
        var loc= document.getElementById("baseurl").value;
        var redirect=loc+'borrow/borrowlist';
          $.ajax({
            type: "POST",
            url: redirect,
            data:'borrow='+$(this).val(),
            beforeSend: function(){
                $("#borrow").css("background","#FFF");
            },
            success: function(data){
                $("#suggestion-borrow").show();
                $("#suggestion-borrow").html(data);
                $("#borrow").css("background","#FFF");
            }
        });
    });

    $("#return").keyup(function(){
        var loc= document.getElementById("baseurl").value;
        var redirect=loc+'borrow/returnlist';
          $.ajax({
            type: "POST",
            url: redirect,
            data:'return='+$(this).val(),
            beforeSend: function(){
                $("#return").css("background","#FFF");
            },
            success: function(data){
                $("#suggestion-return").show();
                $("#suggestion-return").html(data);
                $("#return").css("background","#FFF");
            }
        });
    });

    var loc= document.getElementById("baseurl").value;
    var redirect=loc+'borrow/itemlist';
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

function selectBorrow(id, val) {
    $("#borrow_id").val(id);
    $("#borrow").val(val);
    $("#suggestion-borrow").hide();
}

function selectReturn(employee_id,series,date,val,bh_id) {
    $("#return_id").val(employee_id);
    $("#rec_by").val(val);
    $("#series").val(series);
    $("#date").val(date);
    $("#return").val(val);
    $("#bh_id").val(bh_id);
    $("#suggestion-return").hide();
}

function selectItem(id,edid,val,qty,acn,type,serial,brand,model,unit) {
    $("#item_id").val(id);
    $("#qty").val(qty);
    $("#ed_id").val(edid);
    $("#type").val(type);
    //$("#item").val(val+' - '+brand+' - '+serial+' - '+model);
    $("#item").val(val);
    $("#acn").val(acn);
    $("#serial").val(serial);
    $("#brand").val(brand);
    $("#model").val(model);
    $("#unit").val(unit);
    $("#suggestion-item").hide();
}

function add_item(){
    var loc= document.getElementById("baseurl").value;
    var redirect=loc+'borrow/getitem';
    var item =$('#item').val();
    var type =$('#type').val();
    var itemid =$('#item_id').val();
    var bh_id =$('#bh_id').val();
    var edid =$('#ed_id').val();
    var acn =$('#acn').val();
    var serial =$('#serial').val();
    var model =$('#model').val();
    var brand =$('#brand').val();
    var qty =$('#qty').val();
    var unit =$('#unit').val();
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
            data: "itemid="+itemid+"&bh_id="+bh_id+"&edid="+edid+"&item="+item+"&count="+count+"&acn="+acn+"&type="+type+"&serial="+serial+"&model="+model+"&brand="+brand+"&qty="+qty+"&unit="+unit,
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

function saveBorrow(){
    var borrowdata = $("#Borrowform").serialize();
    var itemid = document.getElementById('item_id').value;
    var loc= document.getElementById("baseurl").value;
    var redirect = loc+'borrow/insert_borrow_details';
    if(itemid==""){
        alert('Please fill out Item.');
    }else {
         $.ajax({
                type: "POST",
                url: redirect,
                data: borrowdata,
                success: function(output){
                    /*window.close();*/  
                    /*window.location=loc+'borrow/insert_borrow_details/';*/     
                    //alert(output);
                }
          });
    }
     
}
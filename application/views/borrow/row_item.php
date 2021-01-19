 <tr id='item_row<?php echo $list['count']; ?>'>  
    <td class="main-tab" align="center"><input type = "text" name = "asset_control_no<?php echo $list['count']?>" style = "text-align:center;width:100%;border:1px transparent;" value = "<?php echo $list['acn']; ?>" ></td>
    <td class="main-tab" align="center"><input type = "text" name = "qty<?php echo $list['count']?>" style = "text-align:center;width:100%;border:1px transparent;" value="<?php echo $list['qty']; ?>"></td>
     <td class="main-tab" align="center"><input type = "text" name = "item<?php echo $list['count']?>" value = "<?php echo $list['item']?>" style = "text-align:center;width:100%;border:1px transparent;"></td>

     <td class="main-tab" align="center"><input type = "text" name = "brand<?php echo $list['count']?>" value = "<?php echo $list['brand']?>" style = "text-align:center;width:100%;border:1px transparent;"></td>
     <td class="main-tab" align="center"><input type = "text" name = "type<?php echo $list['count']?>" value = "<?php echo $list['type']?>" style = "text-align:center;width:100%;border:1px transparent;"></td>
     <td class="main-tab" align="center"><input type = "text" name = "model<?php echo $list['count']?>" value = "<?php echo $list['model']?>" style = "text-align:center;width:100%;border:1px transparent;"></td>
     <td class="main-tab" align="center"><input type = "text" name = "serial<?php echo $list['count']?>" value = "<?php echo $list['serial']?>" style = "text-align:center;width:100%;border:1px transparent;"></td>

     <td class="main-tab" align="center"><input type = "text" name = "unit<?php echo $list['count']?>" style = "text-align:center;width:100%;border:1px transparent;" value="<?php echo $list['unit']; ?>"></td>
    <td class = "hid"><center>
        <a class="btn btn-danger-alt btn-sm text-white" onclick="remove_item(<?php echo $list['count']; ?>)"><span class=" fa fa-times"></span></a></center>
        <input type="hidden" name="itemid[]" value="<?php echo $list['et_id']; ?>">
        <input type="hidden" name="edid[]" value="<?php echo $list['ed_id']; ?>">
    </td>
</tr>
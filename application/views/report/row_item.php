 <tr id='item_row<?php echo $list['count']; ?>'>  
    <td class="main-tab" align="center"><?php echo $list['acn']; ?></td>
     <td class="main-tab" align="center"><input type = "text" name = "acq_date<?php echo $list['count']?>" style = "text-align:center;width:100%;border:1px transparent;" value="<?php echo $list['acq_date']; ?>"></td>
     <td class="main-tab" align="center"><?php echo $list['item']; ?></td>

     <td class="main-tab" align="center"><?php echo $list['brand']; ?></td>
     <td class="main-tab" align="center"><?php echo $list['type']; ?></td>
     <td class="main-tab" align="center"><?php echo $list['model']; ?></td>
     <td class="main-tab" align="center"><?php echo $list['serial']; ?></td>

    <td class="main-tab" align="center"><?php echo $list['qty']; ?></td>
     <td class="main-tab" align="center"><?php echo $list['unit']; ?></td>
    <td class="main-tab" align="center"><?php if($list['set_id']==0){ echo number_format($list['price'],2)." <small>".$list['currency']."</small>"; } ?></td>
    <td class="main-tab" align="center"><?php if($list['set_id']==0){ echo number_format($list['total'],2)." <small>".$list['currency']."</small>"; } ?></td>
    <td class = "hid"><center>
        <a class="btn btn-danger-alt btn-sm text-white" onclick="remove_item(<?php echo $list['count']; ?>)"><span class=" fa fa-times"></span></a></center>
        <input type="hidden" name="itemid[]" value="<?php echo $list['et_id']; ?>">
        <input type="hidden" name="edid[]" value="<?php echo $list['ed_id']; ?>">
    </td>
</tr>
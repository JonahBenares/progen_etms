<link href="<?php echo base_url(); ?>assets/dist/css/prntrp.css" rel="stylesheet">
<div class="main-contdent" >
    <div>
        <div  style="position: fixed;width: 100%;top: 0" id="btn_print" >
            <center>
                <a class="btn btn-lg btn-warning-alt text-white" href = '<?php echo base_url(); ?>report/inv_rep_overall'  style="width:5%"><span class="fa fa-chevron-left"></span></a>
                <button class="btn btn-lg btn-info-alt" style="width:90%;" onclick="printDiv('printableArea')">Print</button>
            </center>
        </div>
        <div id="printableArea" style="margin-top:50px">
            <table class=" table-bordered table-hover" style="width:100%">
                <tr>
                    <td class = "thead">Item Description</td>
                    <td class = "thead">Qty</td>
                    <td class = "thead">Price</td>
                    <td class = "thead">Category</td>
                    <td class = "thead">Subcategory</td>
                    <td class = "thead">Department</td>
                    <td class = "thead">Set Name</td>
                    <td class = "thead">Status / Accountability</td>
                </tr>
                    <?php 
                        foreach($details AS $i){ 
                            if($i['accountability_id']!=0 && $i['borrowed']==0 && $i['lost']==0){
                                $status = $i['employee'];
                            }else if($i['accountability_id']==0 && $i['damaged']==0 && $i['change_location']==0){
                                $status = '<span style = "color:green;">Available</span>';
                            }else if($i['accountability_id']==0 && $i['change_location']==1){
                                $status = "Moved to ".$i['location'];
                            }else if($i['borrowed']==1){
                                $status = '<span style = "color:blue;">Borrowed</span>';
                            }else if($i['damaged']==1){
                                $status = '<span style = "color:red;">Damaged</span>';
                            }else if($i['lost']==1){
                                $status = '<span style = "color:orange;">Lost Item / '.$i['employee']."</span>";
                            }
                    ?>
                    <tr>
                        <td style="white-space: normal!important;"><?php echo $i['item'];?></td>
                        <td><?php echo $i['qty'];?></td>
                        <td><?php echo $i['unit_price'];?></td>
                        <td><?php echo $i['category'];?></td>
                        <td><?php echo $i['subcategory'];?></td>
                        <td><?php echo $i['department'];?></td>
                        <td><?php echo $i['set_name'];?></td>
                        <td align="center"><?php echo $status;?></td>
                    </tr>
                    <?php } ?>
            </table>
            <hr>
            <small>printed by: <?php echo $_SESSION['fullname'];?> || date: <?php echo date('Y-m-d');?> || Equipment and Tool Management System </small>
        </div>
    </div>
</div>
<script type="text/javascript">
    function printDiv(divName) {
        window.print();
    }
</script>
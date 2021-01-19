<link href="<?php echo base_url(); ?>assets/dist/css/prntrp.css" rel="stylesheet">
<div class="main-contdent" >
    <div>
        <div  style="position: fixed;width: 100%;top: 0" id="btn_print" >
            <center>
                <a class="btn btn-lg btn-warning-alt text-white" href = '<?php echo base_url(); ?>report/report_main_avail'  style="width:5%"><span class="fa fa-chevron-left"></span></a>
                <button class="btn btn-lg btn-info-alt" style="width:90%;" onclick="printDiv('printableArea')">Print</button>
            </center>
        </div>
        <div id="printableArea" style="margin-top:50px">
            <table class=" table-bordered table-hover" style="width:100%">
                <tr>
                    <td class="thead" align="center">Item Description</td>
                    <td class="thead" align="center">Accountability</td>
                    <td class="thead" align="center">Status</td>
                    <td class="thead" align="center">Qty</td>
                </tr>
                <tbody>
                    <?php 
                        foreach($item AS $i){ 
                        if($i['accountability_id']!=0 && $i['borrowed']==0 && $i['lost']==0){
                            $status = '<span class="badge badge-pill bg-primary-alt uppercase">Assigned</span>';
                        }else if($i['accountability_id']==0 && $i['damaged']==0 && $i['change_location']==0){
                            $status = '<span class="badge badge-pill bg-success-alt uppercase">Available</span>';
                        }else if($i['accountability_id']==0 && $i['change_location']==1){
                            $status = "Moved to ".$i['location'];
                        }else if($i['borrowed']==1){
                            $status = '<span class="badge badge-pill bg-info-alt uppercase">Borrowed</span>';
                        }else if($i['damaged']==1){
                            $status = '<span class="badge badge-pill bg-danger-alt uppercase">Damaged</span>';
                        }else if($i['lost']==1){
                            $status = '<span class="badge badge-pill bg-dark-alt uppercase">'.'Lost Item / '.$i['accountability'].'</span>';
                        }
                    ?>
                    <tr>
                        <td><?php echo $i['item'];?></td>
                        <td><?php echo $i['accountability'];?></td>
                        <td align="center"><?php echo $status;?></td>
                        <td align="center"><?php echo $i['qty'];?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <hr>
            <small>printed by: <?php echo $_SESSION['fullname']; ?> || date: <?php echo date('Y-m-d');?> || Equipment and Tool Management System </small>
        </div>
    </div>
</div>
<script type="text/javascript">
    function printDiv(divName) {
        window.print();
    }
</script>
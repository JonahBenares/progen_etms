<link href="<?php echo base_url(); ?>assets/dist/css/prntrp.css" rel="stylesheet">
<div class="main-contdent" >
    <div>
        <div  style="position: fixed;width: 100%;top: 0" id="btn_print" >
            <center>
                <a class="btn btn-lg btn-warning-alt text-white" href = '<?php echo base_url(); ?>report/report_draft'  style="width:5%"><span class="fa fa-chevron-left"></span></a>
                <button class="btn btn-lg btn-info-alt" style="width:90%;" onclick="printDiv('printableArea')">Print</button>
            </center>
        </div>
        <div id="printableArea" style="margin-top:50px">
            <table class=" table-bordered table-hover" style="width:100%">
                <tr>
                    <td class="thead">Category</td>
                    <td class="thead" align="center">Asset Control No.</td>
                    <td class="thead" align="center">Acquisition Date</td>
                    <td class="thead"><p style="width: 300px">Item Description</p></td>
                    <td class="thead">Brand</td>
                    <td class="thead">Model</td>
                    <td class="thead">Serial No.</td>
                    <td class="thead">Qty</td>
                    <td class="thead">UOM</td>
                    <td class="thead">Date Issue</td>
                    <td class="thead">Accountability</td>
                    <td class="thead">Status</td>
                    <td class="thead">Department</td>
                    <td class="thead">Placement</td>
                    <td class="thead">Rack</td>
                    <td class="thead">Company</td>
                    <td class="thead" align="center">Physical Condition</td>
                    <td class="thead" align="center">Total Cost</td>
                    <td class="thead">Remarks</td>
                </tr>
                <tbody>
                    <?php 
                        foreach($report AS $r){ 
                            if($r['accountability_id']!=0 && $r['borrowed']==0){
                                $status = 'Assigned';
                            }else if($r['accountability_id']==0 && $r['damaged']==0 && $r['change_location']==0){
                                $status = '<span style = "color:green;">Available</span>';
                            }else if($r['accountability_id']==0 && $r['change_location']==1){
                                $status = "Moved to ".$r['location'];
                            }else if($r['borrowed']==1){
                                $status = '<span style = "color:blue;">Borrowed</span>';
                            }else if($r['damaged']==1){
                                $status = '<span style = "color:red;">Damaged</span>';
                            }
                    ?>
                    <tr>
                        <td><?php echo $r['category'];?></td>
                        <td align="center"><?php echo $r['asset_control_no'];?></td>
                        <td align="center"><?php echo $r['acquisition_date'];?></td>
                        <td style="white-space: normal!important;"><?php echo $r['item'];?></td>
                        <td><?php echo $r['brand'];?></td>
                        <td><?php echo $r['model'];?></td>
                        <td><?php echo $r['serial_no'];?></td>
                        <td><?php echo $r['qty'];?></td>
                        <td><?php echo $r['unit'];?></td>
                        <td><?php echo $r['date_issued'];?></td>
                        <td><?php echo $r['accountability'];?></td>
                        <td><?php echo $status;?></td>
                        <td><?php echo $r['department'];?></td>
                        <td><?php echo $r['placement'];?></td>
                        <td><?php echo $r['rack'];?></td>
                        <td><?php echo $r['company'];?></td>
                        <td align="center"><?php echo $r['condition'];?></td>
                        <td align="center"><?php echo $r['total'];?></td>
                        <td><?php echo $r['remarks'];?></td>
                    </tr>
                    <?php } ?>
                </tbody>
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
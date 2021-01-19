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
                    <?php if(empty($item) && empty($set) || $set=='null' || $item!='null' && $set!='null'){ ?>
                    <td class="thead" align="center">Item Name</td>
                    <td class="thead" align="center">Set Name</td>
                    <td class="thead" align="center">Available</td>
                    <td class="thead" align="center">In-Use</td>
                    <?php } else { ?>
                    <td class="thead" align="center">Set Name</td>
                    <td class="thead" align="center">Set Count</td>
                    <?php } ?>  
                </tr>
                <tbody>
                    <?php 
                        usort($itema, function($a, $b) {
                            return $a['set_id'] - $b['set_id'];
                        });
                        $a=0;
                        $previousId = '';
                        foreach($itema AS $i){ 
                            if(empty($item) && empty($set)){
                    ?>
                    <tr>
                        <?php if(empty($item) && empty($set) || $set=='null' || $item!='null' && $set!='null'){ ?>
                        <td> 
                            <a href="<?php echo base_url(); ?>report/inv_report_itm/<?php echo $i['item_id'];?>/<?php echo $i['set_id'];?>" class="" style="white-space: normal!important;text-align: left" data-toggle="tooltip" data-placement="left" title="View">
                               <?php echo $i['item']; ?>
                            </a>           
                        </td>
                        <?php if ($i['set_id']!=0 && ($previousId !== $i['set_id'])) { ?>
                        <td <?php if($i['set_id']!=0) echo " rowspan='".$i['count_set']."'"; ?>><?php echo $i['set']; ?></td>
                        <?php }else if($i['set_id']==0){ ?>
                        <td><?php echo $i['set']; ?></td>
                        <?php } ?>
                        <td align="center"><?php echo $i['avcount']; ?></td>
                        <td align="center"><?php echo $i['incount']; ?></td>
                        <?php } else { ?>
                        <td><?php echo $i['set']; ?></td>
                        <td align="center"><?php echo $i['count']; ?></td>
                        <?php } ?>
                    </tr>
                    <?php }else { ?>
                    <tr>
                        <?php if(empty($item) && empty($set) || $set=='null' || $item!='null' && $set!='null'){ ?>
                        <td> 
                            <a href="<?php echo base_url(); ?>report/inv_report_itm/<?php echo $i['item_id'];?>/<?php echo $i['set_id'];?>" class="" style="white-space: normal!important;text-align: left" data-toggle="tooltip" data-placement="left" title="View">
                               <?php echo $i['item']; ?>
                            </a>           
                        </td>
                        <td><?php echo $i['set']; ?></td>
                        <td align="center"><?php echo $i['avcount']; ?></td>
                        <td align="center"><?php echo $i['incount']; ?></td>
                        <?php } else { ?>
                        <td><?php echo $i['set']; ?></td>
                        <td align="center"><?php echo $i['count']; ?></td>
                        <?php } ?>
                    </tr>
                    <?php } $previousId = $i['set_id']; } ?>
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
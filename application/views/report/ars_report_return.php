<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>
<link href="<?php echo base_url(); ?>assets/dist/css/printable.css" rel="stylesheet">

<div class="page-wrapper">
    <div class="container-fluid m-t-20">        
        <table class = "table-main " style = "width:100%">
            <tr>
                <td style="padding:10px;border-bottom: 2px solid #000" width="15%">
                    <img src="<?php echo base_url().LOGO;?>" width="100%" height="auto">
                </td>
                <td style="padding:10px;border-bottom: 2px solid #000;"  width="35%" >
                   <p style="margin: 0px"> <strong><?php echo COMPANY_NAME;?></strong></p>
                    <p style="margin: 0px"><?php echo ADDRESS;?></p>
                    <p style="margin: 0px"><?php echo TEL_NO;?></p>
                </td>
                <td style="padding:10px;border-bottom: 2px solid #000;border-left: 2px solid #000" width="50%" align="center">
                    <h5><strong>ASSET RETURN FORM</strong></h5>
                </td>
            </tr>
        </table>
        <div class="col-lg-12" style="margin:10px 0px 10px">
            <table width="100%">
                <tr>
                    <td width="13%"><h5 class="nomarg">Received From</h5></td>
                    <td width="40%" style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo $name;?></label></td>
                    <td width="4%"></td>
                    <td width="13%"><h5 class="nomarg pull-right">ARS No.</h5></td>
                    <td colspan="3" style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo $ars_no;?></label></td>
                </tr>
                <tr>
                    <td><h5 class="nomarg">Position</h5></td>
                    <td style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo $position;?></label></td>
                    <td></td>
                    <td></td>
                    <td><!-- <small id="idate">*year-month-thread</small> --></td>
                </tr>
                <tr>
                    <td><h5 class="nomarg">Date Returned</h5></td>
                    <td style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo $return_date;?></label></td>
                </tr>  
                <tr>
                    <td><h5 class="nomarg">Department</h5></td>
                    <td style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo $department;?></label></td>
                </tr>         
            </table>
        </div>
        <div class="col-lg-12">
            <table width="100%" class="table-bordered">
                <tr>                
                    <td class="main-tab" width="7%" align="center"><strong>Qty</strong></td>
                    <td class="main-tab" width="7%" align="center"><strong>U/M</strong></td>
                    <td class="main-tab" width="10%" align="center"><strong>Item</strong></td>                    
                    <td class="main-tab" width="10%" align="center"><strong>Brand</strong></td>                    
                    <td class="main-tab" width="10%" align="center"><strong>Type</strong></td>                    
                    <td class="main-tab" width="10%" align="center"><strong>Model</strong></td>                    
                    <td class="main-tab" width="10%" align="center"><strong>Serial No.</strong></td>                    
                    <td class="main-tab" width="7%" align="center"><strong>Unit Cost</strong></td>
                    <td class="main-tab" width="8%" align="center"><strong>Total</strong></td>
                </tr>
                <tr>
                <?php if(!empty($return)){ 
                        foreach($return as $ret){
                            usort($details, function($a, $b) {
                                return $a['set_id'] - $b['set_id'];
                            });
                            $a=0;
                            $previousId = '';
                            foreach($details AS $det){ 
                                switch($det){
                                    case($ret['return_id'] == $det['return_id']): 
                ?>
                    <tr style = "<?php echo ($det['lost']!=0) ? "background-color:#ec7070!important" : ''; ?>">
                        <td class="main-tab" align="center"><?php echo $det['qty'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['unit'];?></td>
                        <td class="main-tab" align="center"><?php echo ($det['lost']!=0) ? $det['item']." - <b>Lost Item</b>" : $det['item'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['brand'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['type'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['model'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['serial'];?></td>
                        <?php if ($det['set_id']!=0 && ($previousId !== $det['set_id'])) { ?>
                        <td class="main-tab" align="center" <?php if($det['set_id']!=0) echo " rowspan='".$det['count_set']."'"; ?>><?php echo ($det['set_id']==0) ? $det['price']."<small> ".$det['currency']."</small>" : $det['set_price']." <small>".$det['set_currency']."</small>"; ?></td>

                        <td class="main-tab" align="center" <?php if($det['set_id']!=0) echo " rowspan='".$det['count_set']."'"; ?>><?php echo ($det['set_id']==0) ? number_format($det['total'],2)."<small> ".$det['currency']."</small>" : number_format($det['set_total'],2)." <small>".$det['set_currency']."</small>"; ?></td>
                        <?php } else if($det['set_id']==0){ ?>
                        <td class="main-tab" align="center"><?php echo $det['price']."<small> ".$det['currency']."</small>"; ?></td>

                        <td class="main-tab" align="center"><?php echo number_format($det['total'],2)."<small> ".$det['currency']."</small>"; ?></td>
                        <?php } ?>
                    </tr>
                <?php   
                    break;
                    default: 
                    } $previousId = $det['set_id']; } } 
                    } else { 
                ?>
                    <tr>
                        <td class="main-tab" align="center" colspan='9'><center>No Data Available.</center></td>
                    </tr>
                <?php } ?>
                </tr>
                <tr>
                    <td class="main-tab" colspan="9"><center>***nothing follows***</center></td>
                </tr>   
            </table>
            <br>
            <table width="100%">
                <tr>
                    <td width="10%" class="main-tab">Remarks:</td>
                    <td style="border-bottom: 1px solid #999"><?php echo $remarks; ?></td>
                </tr>
            </table>
            <br>
             <table width="100%">
                <tr>
                    <td width="10%"></td>
                    <td width="26%" class="main-tab">Prepared/Received by:</td>
                    <td width="10%"></td>
                    <td width="26%" class="main-tab">Return by:</td>
                    <td width="10%"></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="border-bottom:1px solid #000;vertical-align:bottom;color:black">
                        <input class="select" type="" name="" value="<?php echo $user_id;?>">
                    </td> 
                    <td></td>
                    <td style="border-bottom:1px solid #000;vertical-align:bottom;color:black">
                        <?php if($type == 2){ ?>
                            <?php 
                                if(!empty($child)){ 
                                    foreach($child as $c){ 
                                        echo  "<div style='margin-top: 20px;'>".$c['emp'].", </div>"; 
                                    } 
                                } else{ 
                                    echo $name; 
                                }
                            ?>
                        <?php } else { ?>
                            <div style = "text-align:center;"><?php echo  $name;?></div>
                        <?php } ?>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="select" type="" name="" value="Asset Management Assistant" >
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>                
                <tr>
                    <td colspan="5" align="center">
                        <a href="" id="printBtn" onclick="iprint()" class="btn btn-success-alt m-t-50 p-l-100 p-r-100">Print</a>
                        <?php if($test==0 || $lost==1){ ?>
                        <a id="printBtn" href="<?php echo base_url(); ?>report/acf_report/<?php echo $id;?>" target="_blank" class="btn btn-info m-t-50 animated headShake">Print Clearance</a></td>
                        <?php } ?>
                </tr>
            </table> 
            <hr>
            <small>printed by: <?php echo $_SESSION['fullname'];?> || date: <?php echo date('Y-m-d');?> || Equipment and Tool Management System </small>
        </div>
    </div>
</div>
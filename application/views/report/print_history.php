<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>
<link href="<?php echo base_url(); ?>assets/dist/css/printable.css" rel="stylesheet">

<div class="page-wrapper">
    <div class="container-fluid m-t-20">        
        <table class = "table-main " style = "width:100%">
            <tr>
                <td style="padding:10px;border-bottom: 2px solid #000" width="15%">
                    <img src="<?php echo base_url(); ?>assets/default/logo_cenpri.png" width="100%" height="auto">
                </td>
                <td style="padding:10px;border-bottom: 2px solid #000;"  width="35%" >
                   <p id="head" style="margin: 0px"> <strong>CENTRAL NEGROS POWER RELIABILITY INC.</strong></p>
                    <p id="head" style="margin: 0px">Purok San Jose, Brgy. Calumangan, Bago City</p>
                    <p id="head" style="margin: 0px">Tel. No. 476-7382</p>
                </td>
                <td style="padding:10px;border-bottom: 2px solid #000;border-left: 2px solid #000" width="50%" align="center">
                    <h5><strong>ASSET CLEARANCE FORM</strong></h5>
                </td>
            </tr>
        </table>
        <form id='ACFform'>
            <div class="col-lg-12" style="margin:10px 0px 10px">
                <table width="100%">
                    <tr>
                        <td width="5%"><h5 class="nomarg">Date</h5></td>
                        <td width="20%" style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo date('Y-m-d');?></label></td>
                        <td width="34%"></td>
                        <td width="13%"><h5 class="nomarg pull-right">ACF No.</h5></td>
                        <td colspan="3" style="border-bottom: 1px solid #999"> <label class="nomarg">: <input type = "text" name = "acf_no" id = "acf_no" value = "<?php echo $acf_no; ?>" readonly></label></td>
                    </tr>            
                </table>
            </div>
            <div class="col-lg-12">
                <table width="100%" class="table-bordered">
                    <tr>                
                        <td class="main-tab" width="10%" align="center"><strong>Date Returned</strong></td>
                        <td class="main-tab" width="10%" align="center"><strong>Date Issued</strong></td>
                        <td class="main-tab" width="10%" align="center"><strong>Item</strong></td>                     
                        <td class="main-tab" width="7%" align="center"><strong>Qty</strong></td>
                        <td class="main-tab" width="7%" align="center"><strong>U/M</strong></td>
                        <td class="main-tab" width="7%" align="center"><strong>Unit Price</strong></td>
                        <td class="main-tab" width="8%" align="center"><strong>Remarks</strong></td>
                    </tr>
                    <tr>
                    <?php 
                        if(!empty($sub)){
                                usort($sub, function($a, $b) {
                                    return $a['set_id'] - $b['set_id'];
                                });
                                $a=0;
                                $previousId = '';
                                foreach($sub AS $det){ 
                    ?>
                        <tr style = "<?php echo ($det['lost']!=0) ? "background-color:#ec7070!important" : ''; ?>">
                            <td class="main-tab" align="center"><?php echo ($det['lost']==0) ? $det['date_returned'] : '';?></td>
                            <td class="main-tab" align="center"><?php echo $det['date_issued'];?></td>
                            <td class="main-tab" align="center"><?php echo ($det['lost']!=0) ? $det['et_desc']." - <b>Lost Item</b>" : $det['et_desc'];;?></td>
                            <td class="main-tab" align="center"><?php echo $det['qty'];?></td>
                            <td class="main-tab" align="center"><?php echo $det['unit'];?></td>
                            <?php if ($det['set_id']!=0 && ($previousId !== $det['set_id'])) { ?>
                            <td class="main-tab" align="center" <?php if($det['set_id']!=0) echo " rowspan='".$det['count_set']."'"; ?>><?php echo ($det['set_id']==0) ? $det['unit_price']." <small>".$det['currency']."</small>" : $det['set_price']." <small>".$det['set_currency']."</small>";?></td>
                            <?php } else if($det['set_id']==0){ ?>
                            <td class="main-tab" align="center"><?php echo $det['unit_price']." <small>".$det['currency']."</small>";?></td>   
                            <?php } ?>
                            <?php if(!empty($det['accountabilitys'])){ ?>
                                <td class="main-tab" align="center"><?php echo (!empty($det['remarks'])) ? $det['remarks']." - Turn over to ".$det['accountabilitys'] : $det['remarks']." Turn over to ".$det['accountabilitys']?></td>
                            <?php } else if(!empty($det['replacement'])){ ?>
                                <td class="main-tab" align="center"><?php echo (!empty($det['replacement']) && $det['lost']==0) ? "Replacement for lost item ".$det['replacement'] : ''; ?></td>
                            <?php }else{ ?>
                                <td class="main-tab" align="center"><?php echo $det['remarks'];?></td>
                            <?php }?>
                        </tr>
                        <?php $previousId = $det['set_id']; } } else { ?>
                        <tr>
                            <td class="main-tab" align="center" colspan='11'><center>No Data Available.</center></td>
                        </tr>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td class="main-tab" colspan="7"><center>***nothing follows***</center></td>
                    </tr>   
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td class="main-tab" style="text-indent:20%">This is to certify that <span style="border-bottom: 1px solid #a2a2a2"><?php echo $name;?></span> cleared from any liabilites from the company. </td>
                    </tr>
                </table>
                <br>
                 <table width="100%">
                    <tr>
                        <td width="10%"></td>
                        <td width="26%" class="main-tab">Prepared by:</td>
                        <td width="10%"></td>
                        <td width="26%" class="main-tab">Noted by:</td>
                        <td width="10%"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="border-bottom:1px solid #000">
                            <input class="select" type="" name="" value="<?php echo $user_id;?>">
                        </td> 
                        <td></td>
                        <td style="border-bottom:1px solid #000">
                            <input class="select" type="" name="" value="">
                        </td>
                        <td></td>
                    </tr>
                </table> 
                <hr>
                <small>printed by: <?php echo $_SESSION['fullname'];?> ||date:: <?php echo date('Y-m-d');?> || Equipment and Tool Management System </small>
            </div>
            </div>
            <br>
            <br>
            <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
            <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $id; ?>">
            <center><input type='button' class="btn btn-success-alt p-l-100 p-r-100 m-b-50 animated headShake" id='print' onclick='saveACF()' value='Print'></center>
        </form>
    </div>
</div>
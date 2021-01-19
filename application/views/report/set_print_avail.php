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
                    <h5><strong>AVAILABLE SET FORM</strong></h5>
                </td>
            </tr>
        </table>
        <br>
        <table width="100%" class="table-bordered">
            <tr>                
                <td class="main-tab" width="10%" align="center"><strong>Asset #</strong></td>
                <td class="main-tab" width="10%" align="center"><strong>Acquisition Date</strong></td>
                <td class="main-tab" width="40%" align="center"><strong>Description</strong></td>                    
                <td class="main-tab" width="7%" align="center"><strong>Qty</strong></td>
                <td class="main-tab" width="7%" align="center"><strong>U/M</strong></td>
                <td class="main-tab" width="20%" align="center"><strong>Set Name</strong></td>
                <td class="main-tab" width="20%" align="center"><strong>Lot No. </strong></td>
                <td class="main-tab" width="7%" align="center"><strong>Cost</strong></td>
                <td class="main-tab" width="8%" align="center"><strong>Total</strong></td>
            </tr>
            <tr>
            <?php 
                if(!empty($details)){ 
                    $a=0;
                    $b=0;
                    $ct_set =count(array_unique($set));
                    $new_set = array_unique($set);
                    foreach($details AS $det){          
            ?>
                <tr>
                    <td class="main-tab" align="center"><?php echo $det['asset_control_no'];?></td>
                    <td class="main-tab" align="center"><?php echo $det['acquisition_date'];?></td>
                    <td class="main-tab" align="center"><?php echo $det['et_desc'];?></td>
                    <td class="main-tab" align="center"><?php echo $det['qty'];?></td>
                    <td class="main-tab" align="center"><?php echo $det['unit'];?></td>
                    <?php
                        foreach($new_set AS $key=>$value){
                            if($key==$a){
                    ?>
                        <td class="main-tab" align="center" <?php echo " rowspan='".$value."'"; ?>><?php echo $det['set_name'];?></td>
                        <td class="main-tab" align="center" <?php echo " rowspan='".$value."'"; ?>><?php echo $det['set_lot'];?></td>
                        <td class="main-tab" align="center" <?php echo " rowspan='".$value."'"; ?>><?php echo $det['unit_price']." <small>".$det['set_currency']; ?></td>
                        <td class="main-tab" align="center" <?php  echo " rowspan='".$value."'"; ?>><?php echo number_format($det['total'],2)." <small>".$det['set_currency']; ?></td>
                    <?php } } ?>
                </tr>
            <?php $a++; } } else { ?> 
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
        <hr>
        <small>printed by: <?php echo $_SESSION['fullname'];?> || date: <?php echo date('Y-m-d');?> || Equipment and Tool Management System </small>
        <center><a href="" id="printBtn" onclick="iprint()" class="btn p-l-100 p-r-100 btn-success-alt m-t-50 m-b-50 animated headShake">Print</a></center>
    </div>
</div>
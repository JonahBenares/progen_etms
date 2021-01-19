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
                    <h5><strong>ASSET CLEARANCE SLIP</strong></h5>
                </td>
            </tr>
        </table>
        <div class="col-lg-12" style="margin:10px 0px 10px">
            <table width="100%">
                <tr>
                    <td width="5%"><h5 class="nomarg">Date</h5></td>
                    <td width="20%" style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo date('Y-m-d');?></label></td>
                    <td width="34%"></td>
                    <td width="13%"><h5 class="nomarg pull-right">ATF No.</h5></td>
                    <td colspan="3" style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo $atf_no;?></label></td>
                </tr>            
            </table>
        </div>
        <div class="col-lg-12">
            <table width="100%" class="table-bordered">
                <tr>                
                    <td class="main-tab" width="10%" align="center"><strong>AAF #</strong></td>
                    <td class="main-tab" width="20%" align="center"><strong>Date Issued</strong></td>
                    <td class="main-tab" width="10%" align="center"><strong>Item</strong></td>                    
                    <td class="main-tab" width="10%" align="center"><strong>Brand</strong></td>                    
                    <td class="main-tab" width="10%" align="center"><strong>Type</strong></td>                    
                    <td class="main-tab" width="10%" align="center"><strong>Model</strong></td>                    
                    <td class="main-tab" width="10%" align="center"><strong>Serial No.</strong></td>                    
                    <td class="main-tab" width="7%" align="center"><strong>Qty</strong></td>
                    <td class="main-tab" width="7%" align="center"><strong>U/M</strong></td>
                    <td class="main-tab" width="7%" align="center"><strong>Date Return</strong></td>
                    <td class="main-tab" width="8%" align="center"><strong>Remarks</strong></td>
                </tr>
                <tr>
                <?php 
                    if(!empty($return)){ 
                        foreach($return AS $r){
                            foreach($details AS $det){ 
                                switch($det){
                                    case($r['return_id'] == $det['return_id']): 
                ?>
                    <tr style = "<?php echo ($det['lost']!=0) ? "background-color:#ec7070!important" : ''; ?>">
                        <td class="main-tab" align="center"><?php echo $det['asset_control_no'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['date_issued'];?></td>
                        <td class="main-tab" align="center"><?php echo ($det['lost']!=0) ? $det['item']." - <b>Lost Item</b>" : $det['item'];;?></td>
                        <td class="main-tab" align="center"><?php echo $det['brand'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['type'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['model'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['serial'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['qty'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['unit'];?></td>
                        <td class="main-tab" align="center"><?php echo ($det['lost']==0) ? $return_date : '';?></td>
                        <td class="main-tab" align="center"></td>
                    </tr>
                    <?php  
                        break;
                        default: 
                        } } } } 
                        else { 
                    ?>
                    <tr>
                        <td class="main-tab" align="center" colspan='11'><center>No Data Available.</center></td>
                    </tr>
                    <?php } ?>
                </tr>
                <tr>
                    <td class="main-tab" colspan="11"><center>***nothing follows***</center></td>
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
</div>
<br>
    <center><a href="" id="printBtn" onclick="iprint()" class="btn btn-success-alt m-b-50 p-l-100 p-r-100">Print</a></center>
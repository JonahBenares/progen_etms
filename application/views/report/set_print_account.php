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
                    <h5><strong>ASSET ACCOUNTABILITY FORM</strong></h5>
                </td>
            </tr>
        </table>
        <div class="col-lg-12" style="margin:10px 0px 10px">
            <table width="100%">
                <tr>
                    <td width="10%"><h5 class="nomarg">Employee</h5></td>
                    <td width="40%" style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo $employee;?></label></td>
                    <td width="4%"></td>
                    <td width="10%"><h5 class="nomarg ">Employee No.</h5></td>
                    <td colspan="3" style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo $aaf_no;?></label></td>
                </tr>
                <tr>
                    <td><h5 class="nomarg">Position</h5></td>
                    <td style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo $position;?></label></td>
                    <td></td>
                    <td><h5 class="nomarg">Date Issued</h5></td>
                    <td style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo $date_issued;?></label></td>
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
                    <td class="main-tab" width="7%" align="center"><strong>Asset #</strong></td>
                    <td class="main-tab" width="6%" align="center"><strong>Acquisition Date</strong></td>
                    <td class="main-tab" width="20%" align="center"><strong>Item</strong></td>  
                    <td class="main-tab" width="10%" align="center"><strong>Brand</strong></td>
                    <td class="main-tab" width="10%" align="center"><strong>Model</strong></td>                  
                    <td class="main-tab" width="3%" align="center"><strong>Qty</strong></td>
                    <td class="main-tab" width="4%" align="center"><strong>U/M</strong></td>
                    <td class="main-tab" width="10%" align="center"><strong>Set Name</strong></td>
                    <td class="main-tab" width="10%" align="center"><strong>Serial No.</strong></td>
                    <td class="main-tab" width="8%" align="center"><strong>Cost</strong></td>
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
                        <td class="main-tab" align="center"><?php echo $det['brand'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['model'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['qty'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['unit'];?></td>
                        <?php
                            foreach($new_set AS $key=>$value){
                                if($key==$a){
                        ?>
                            <td class="main-tab" align="center" <?php echo " rowspan='".$value."'"; ?>><?php echo $det['set_name'];?></td>
                            <td class="main-tab" align="center" <?php echo " rowspan='".$value."'"; ?>><?php echo $det['set_lot'];?></td>
                            <td class="main-tab" align="center" <?php echo " rowspan='".$value."'"; ?>><?php echo $det['unit_price']." <small>".$det['currency']."</small>"; ?></td>
                            <td class="main-tab" align="center" <?php  echo " rowspan='".$value."'"; ?>><?php echo number_format($det['total'],2)." <small>".$det['currency']."</small>"; ?></td>
                        <?php } } ?>
                    </tr>
                <?php $a++; } } else { ?> 
                    <tr>
                        <td class="main-tab" align="center" colspan='9'><center>No Data Available.</center></td>
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
                    <td class="main-tab" style="text-indent:20%">I hereby acknowledge receipt of the company owned property/ies listed above for which I am accountable. I agree to maintain the property/ies in good condition and to return it when I cease working for the company, or earlier on request.  I promise to report any loss or damage immediately and further agree to use the said property for work related purposes.</td>
                </tr>
            </table>
            <br>
            <table width="100%">
                <tr>
                    <td width="10%"></td>
                    <td width="26%" class="main-tab">Prepared by:</td>
                    <td width="10%"></td>
                    <td width="26%" class="main-tab">Received by:</td>
                    <td width="10%"></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="border-bottom:1px solid #000;vertical-align:bottom;color:black" align = 'center'>
                        <?php echo $fullname;?>
                    </td> 
                    <td></td>
                    <td style="border-bottom:1px solid #000;color:black">
                        <?php if($type == 2){ ?>
                            <?php 
                                if(!empty($child)){
                                    foreach($child as $c){ 
                                        echo  "<div style='margin-top: 20px;'>".$c['emp'].", </div>"; 
                                    }
                                }else{
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
            </table> 
            <hr>
            <small>printed by: <?php echo $_SESSION['fullname'];?> || date: <?php echo date('Y-m-d');?> || Equipment and Tool Management System </small>
        </div>
        <center><a href="" id="printBtn" onclick="iprint()" class="btn p-l-100 p-r-100 btn-success-alt m-t-50 m-b-50 animated headShake">Print</a></center>
    </div>
</div>
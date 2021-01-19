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
                    <p><strong>EQUIPMENT/TOOLS DAMAGE REPORT</strong></p>
                </td>
            </tr>
        </table>
        <div class="col-lg-12" style="margin:10px 0px 10px">
            <?php 
                foreach($damage AS $dam){  
                    foreach($details AS $det){ 
                        switch($det){
                            case($dam['ed_id'] == $det['ed_id']):
            ?>
            <table width="100%">
                <tr>
                    <td width="15%"><p class="nomarg">Receive Date</p></td>
                    <td width="30%" style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo $dam['receive_date'];?></label></td>
                    <td width="20%"></td>
                    <td width="13%"><p class="nomarg pull-right">ETDR No.</p></td>
                    <td colspan="3" style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo $dam['etdr_no'];?></label></td>
                </tr> 
                <tr>
                    <td width="15%"><p class="nomarg">Date of Incident</p></td>
                    <td width="30%" style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo $dam['date_incident'];?></label></td>
                    <td width="20%"></td>
                    <td width="13%"></td>
                    <td colspan="3"></td>
                </tr>            
            </table>
            <br>
            <table width="100%">
                <tr>
                    <td width="43%"><p>Activity that the equipment was being used for</p></td>
                    <td width="55%" style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo $dam['activity'];?></label></td>
                </tr>            
            </table>
            <br>
            <table width="100%">
                <tr>
                    <td width="43%"><p>Location where incident occurred</p></td>
                    <td width="55%" style="border-bottom: 1px solid #999"> <label class="nomarg">: <?php echo $dam['location'];?></label></td>
                </tr>            
            </table>
            <br>
            <table width="100%">
                <tr>
                    <td width="10%"colspan="2"><p class="pull-right">Specification:</p></td>
                    <td></td>
                    <td></td>
                </tr>  
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right">Date Acquired </p></td>
                    <td style="border-bottom: 1px solid #999"> : <?php echo $det['acquisition_date'];?></td>
                </tr>    
                <tr>
                    <td></td>
                    <td  width="5%" colspan="2"><p class="pull-right">Equipment/Tools </p></td>
                    <td style="border-bottom: 1px solid #999"> : <?php echo $dam['item'];?></td>
                    <td width="10%"></td>
                </tr>        
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right">Brand </p></td>
                    <td style="border-bottom: 1px solid #999"> : <?php echo $det['brand'];?></td>
                </tr>  
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right">Model </p></td>
                    <td style="border-bottom: 1px solid #999"> : <?php echo $det['model'];?></td>
                </tr> 
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right">Serial Number </p></td>
                    <td style="border-bottom: 1px solid #999"> : <?php echo $det['serial'];?></td>
                </tr> 
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right">PO/SI Number </p></td>
                    <td style="border-bottom: 1px solid #999"> : <?php echo $dam['po_si_no'];?></td>
                </tr>
            </table>
            <br>
            <p>Person(s) who were using the equipment/Memorandum Receipt/Accountability</p>
            <table width="100%">
                <tr>
                    <td width="10%"></td>
                    <td style="border-bottom: 1px solid #999"><?php echo $dam['accountability'];?></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td ><br></td>
                </tr>
            </table>
            <br>
            <p>Provide a brief description of the incident:</p>
            <table width="100%">
                <tr>
                    <td width="10%"></td>
                    <td style="border-bottom: 1px solid #999"><?php echo $dam['incident_description'];?><br></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td><br></td>
                </tr>
            </table>
            <br>
            <p>Fully describe the damage done to the equipment:</p>
            <table width="100%">
                <tr>
                    <td width="10%"></td>
                    <td style="border-bottom: 1px solid #999"><?php echo $dam['equip_damage'];?><br></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td><br></td>
                </tr>
            </table>
            <br>
            <p> Provide a recommendation on how the equipment is going to be repaired or replaced:</p>
            <table width="100%">
                <tr>
                    <td width="10%"></td>
                    <td style="border-bottom: 1px solid #999"><?php echo $dam['recommendation'];?><br></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td><br></td>
                </tr>
            </table>
            <br>
            
            <center>
                <p> Note: Tag damaged equipment. Place tag as close as possible to the damage area.</p>
                <p> Store damaged equipment directly to the repair room to ensure no one else uses it.</p>
            </center>
        </div>
        <div class="col-lg-12">
            <br>
             <table width="100%">
                <tr>
                    <td width="5%"></td>
                    <td width="20%" class="main-tab">Submitted by:</td>
                    <td width="10%"></td>
                    <td width="20%" class="main-tab">Checked by:</td>
                    <td width="10%"></td>
                    <td width="20%" class="main-tab">Noted by:</td>
                    <td width="5%"></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="border-bottom:1px solid #000;color:black;vertical-align:bottom">
                        <?php if($dam['types'] == 2){ ?>
                            <?php foreach($child as $c){ echo ($c['status']==0) ? "<div style='margin-top: 20px;'>".$c['emp'].', </div>' : ''; }?>
                        <?php } else { ?>
                            <input class="select" type="" name="" value="<?php echo $submitted_by;?>" style = "pointer-events:none;">
                        <?php } ?>
                    </td> 
                    <td></td>
                    <td style="border-bottom:1px solid #000;color:black;vertical-align:bottom">
                        <?php if($dam['typec'] == 2){ ?>
                            <?php foreach($child2 as $c){ echo ($c['status']==0) ? "<div style='margin-top: 20px;'>".$c['emp'].', </div>' : ''; }?>
                        <?php } else { ?>
                            <input class="select" type="" name="" value="<?php echo $checked_by;?>" style = "pointer-events:none;">
                        <?php } ?>
                    </td>
                    <td></td>
                    <td style="border-bottom:1px solid #000;color:black;vertical-align:bottom">
                        <?php if($dam['typen'] == 2){ ?>
                            <?php foreach($child3 as $c){ echo ($c['status']==0) ? "<div style='margin-top: 20px;'>".$c['emp'].', </div>' : ''; }?>
                        <?php } else { ?>
                            <input class="select" type="" name="" value="<?php echo $noted_by;?>" style = "pointer-events:none;">
                        <?php } ?>
                    </td>
                    <td></td>
                </tr>
                <?php   
                    break;
                    default: 
                    } } }
                ?>
                 <tr>
                    <td></td>
                    <td>
                        <p></p>
                    </td> 
                    <td></td>
                    <td>
                        <center><p><!-- Asset Management Assistant --></p></center>
                    </td>
                    <td></td>
                    <td>
                        <center><p><!-- Plant Manager --></p></center>
                    </td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <small>printed by: <?php echo $_SESSION['fullname'];?> || date: <?php echo date('Y-m-d');?> || Equipment and Tool Management System </small>
            <br>
            <br>
            <br>
        </div>
        <center><a href="" id="printBtn" onclick="iprint()" class="btn btn-success btn-block m-b-50 animated headShake">Print</a></center>
    </div>
</div>
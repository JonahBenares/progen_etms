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
        <form id='Assignform'>
            <div class="col-lg-12" style="margin:10px 0px 10px">
                <table width="100%">
                    <tr>
                        <td width="13%"><h5 class="nomarg">Employee</h5></td>
                        <td width="40%" style="border-bottom: 1px solid #999">
                            <input type="text" id = "assign" name = "assigned" autocomplete="off" style="width: 100%" required>
                            <span id="suggestion-assign"></span>
                        </td>
                        <td width="4%"></td>
                        <td width="13%"><h5 class="nomarg pull-right">Employee No.</h5></td>
                        <td colspan="3" style="border-bottom: 1px solid #999">
                            <input type="text" name = "aaf_no" id ="aaf_no" style="width: 100%">
                        </td>
                    </tr>
                    <tr>
                        <td><h5 class="nomarg">Position</h5></td>
                        <td style="border-bottom: 1px solid #999">
                            <input type="text" name = "position" id = "position" style="width: 100%">
                        </td>
                        <td width="4%"></td>
                        <td><h5 class="nomarg  pull-right">Department</h5></td>
                        <td style="border-bottom: 1px solid #999">
                            <input type="text" name = "department" id = "department" style="width: 100%">
                        </td>
                    </tr>
                    <tr>
                        <td><h5 class="nomarg">Date Issued</h5></td>
                        <td style="border-bottom: 1px solid #999">
                            <input type="date" name = "date_issued" style="width: 100%">
                        </td>
                    </tr>             
                </table>
            </div>
            <div id="printhide">
                <div class="card p-b-10 p-t-10 p-l-10 p-r-10">
                    <div class="row">
                        <div class="col-lg-2"><label for="" class="control-label pull-right">Item Name:</label></div>
                        <div class="col-lg-7">                        
                            <input id="item" name="item" type="text" class="form-control" placeholder="" autocomplete="off">
                            <span id="suggestion-item"></span>
                        </div>
                        <div class="col-lg-3">
                            <a onclick='add_item()' class="btn btn-success-alt bor-radius text-white">Add Item</a>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-lg-12">
                <table width="100%" class="table-bordered">
                    <tr>                
                        <td class="main-tab" width="20%" align="center"><strong>Asset #</strong></td>
                        <td class="main-tab" width="10%" align="center"><strong>Acquisition Date</strong></td>
                        <td class="main-tab" width="10%" align="center"><strong>Item</strong></td>                    
                        <td class="main-tab" width="10%" align="center"><strong>Brand</strong></td>                    
                        <td class="main-tab" width="10%" align="center"><strong>Type</strong></td>                    
                        <td class="main-tab" width="10%" align="center"><strong>Model</strong></td>                    
                        <td class="main-tab" width="10%" align="center"><strong>Serial No.</strong></td>                    
                        <td class="main-tab" width="7%" align="center"><strong>Qty</strong></td>
                        <td class="main-tab" width="7%" align="center"><strong>U/M</strong></td>
                        <td class="main-tab" width="7%" align="center"><strong>Cost</strong></td>
                        <td class="main-tab" width="8%" align="center"><strong>Total</strong></td>
                        <td class="main-tab hid" width="8%" align="center"><strong>Action</strong></td>
                    </tr>

                    <tbody id="item_body"></tbody>

                    <tr>
                        <td class="main-tab" colspan="12"><center>***nothing follows***</center></td>
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
                        <td style="border-bottom:1px solid #000;vertical-align:bottom;">
                            <input class="select" type="text" name="" value="<?php echo $user_id;?>">
                        </td> 
                        <td></td>
                        <td style="border-bottom:1px solid #000">
                            <center>
                            <div id = "receive_by" style = "color:black;"></div>
                            </center>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input class="select" type="" name="" value="" >
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table> 
                <hr>
                <small>printed by: <?php echo $_SESSION['fullname'];?> || date: <?php echo date('Y-m-d');?> || Equipment and Tool Management System </small>
                <br>
                <center>
                    <input type='button' class="btn btn-info-alt" id='print' onclick='saveAssign()' value='Save & Print' onclick="confirmationSave(this);return false;">
                </center>
                <input type="hidden" id="user_id" name="user_id" value = "<?php echo $_SESSION['user_id'];?>"> 
                <input type='hidden' name='item_id' id='item_id'>
                <input type='hidden' name='ed_id' id='ed_id'>
                <input type='hidden' name='set_id' id='set_id'>
                <input type='hidden' name='type' id='type'>
                <input type='hidden' name='acn' id='acn'>
                <input type='hidden' name='acq_date' id='acq_date'>
                <input type='hidden' name='serial' id='serial'>
                <input type='hidden' name='model' id='model'>
                <input type='hidden' name='brand' id='brand'>
                <input type='hidden' name='qty' id='qty'>
                <input type='hidden' name='unit' id='unit'>
                <input type='hidden' name='price' id='price'>
                <input type='hidden' name='currency' id='currency'>
                <input type='hidden' name='total' id='total'>
                <input type="hidden" name="assign_id" id="assign_id">
                <input type='hidden' name='counter' id='counter'>
                <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
        </form>
    </div>
</div>
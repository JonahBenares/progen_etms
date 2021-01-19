<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/borrow.js"></script>
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
                    <h5><strong>BORROW FORM</strong></h5>
                </td>
            </tr>
        </table>
        <form method="POST" action="<?php echo base_url(); ?>borrow/generateReturn">
            <div class="col-lg-12" style="margin:10px 0px 10px">
                <table width="100%">
                    <tr>
                        <td width="20%"><h5 class="nomarg">Employee Name : </h5></td>
                        <td width="40%" style="border-bottom: 1px solid #999">
                            <?php echo $employees;?>
                            <span id="suggestion-return"></span>
                        </td>
                        <td width="2%"></td>
                        <td width="13%"><h5 class="nomarg pull-right">Series : </h5></td>
                        <td colspan="20%" style="border-bottom: 1px solid #999">
                            <?php echo $series; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><h5 class="nomarg">Borrowed Date/Time :</h5></td>
                        <td style="border-bottom: 1px solid #999">
                            <?php echo $date;?>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><small id="series">yy-mm-series</small></td>
                    </tr> 
                </table>
                 <input type="hidden" name="return_id" id="return_id">
                 <input type="hidden" name="bh_id" id="bh_id">
            </div>
        </form>
        <form method = "POST">
            <div class="col-lg-12">
                <table width="100%" class="table-bordered">
                    <tr>                
                        <td id="dngr" class="main-tab" width="1%" align="center"><strong>Damage</strong></td>
                        <td class="main-tab" width="5%" align="center"><strong>Returned Qty</strong></td>
                        <td class="main-tab" width="5%" align="center"><strong>Borrowed Qty</strong></td>
                        <td class="main-tab" width="15%" align="center"><strong>Item</strong></td>                    
                        <td class="main-tab" width="10%" align="center"><strong>Brand</strong></td>                    
                        <td class="main-tab" width="10%" align="center"><strong>Type</strong></td>                    
                        <td class="main-tab" width="10%" align="center"><strong>Model</strong></td>                    
                        <td class="main-tab" width="10%" align="center"><strong>Serial No.</strong></td>                    
                        <td class="main-tab" width="20%" align="center"><strong>Uom</strong></td>
                    </tr>

                    <tbody id="item_body">
                        <?php 
                            if(!empty($return)){
                                $x = 1;
                                foreach($return AS $r){
                        ?>
                        <tr>
                            <td id="dngr" class="bg-danger" align="center"><input type = "hidden" name = "ets_id[]" value = "<?php echo $r['et_id'];?>"><input type="checkbox" name="e_id[]" class="multi" value ="<?php echo $r['ed_id'];?>" style = "pointer-events: none;" <?php echo ((strpos($r['damage'], "1") !== false) ? ' checked' : '');?>></td>
                            <td class="main-tab" align="center">
                                <?php echo $r['return_qty'];?>
                            </td>
                            <td class="main-tab" align="center">
                                <?php echo number_format($r['borrowed_qty'],2);?>
                            </td>
                            <td class="main-tab" align="center"><input type = "hidden" name = "et_id<?php echo $x;?>" value = "<?php echo $r['et_id'];?>"><input type = "hidden" name = "ed_id<?php echo $x;?>" value = "<?php echo $r['ed_id'];?>"><?php echo $r['item'];?></td>
                            <td class="main-tab" align="center"><?php echo $r['brand']?></td>
                            <td class="main-tab" align="center"><?php echo $r['type']?></td>
                            <td class="main-tab" align="center"><?php echo $r['model']?></td>
                            <td class="main-tab" align="center"><?php echo $r['serial']?></td>
                            <td class="main-tab" align="center"><?php echo $r['unit']?></td>
                        </tr>
                        <input type="hidden" id="b_id" name="b_id" value = "<?php echo $r['bh_id'];?>">
                        <?php  $x++; } $counter = $x - 1;?>
                        <input type="hidden" id="count" name="count" value = "<?php echo $counter;?>">
                        <?php }else { ?>
                        <tr>
                            <td id="dngr"></td>
                            <td class="main-tab" align="center" colspan='9'><center>No Data Available.</center></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td class="main-tab" colspan="9"><center>***nothing follows***</center></td>
                        </tr>  
                    </tbody> 
                </table>
    
                <br>
                 <table width="100%">
                    <tr>
                        <td width="10%"></td>
                        <td width="26%" class="main-tab">Borrowed from:</td>
                        <td width="10%"></td>
                        <td width="26%" class="main-tab">Received by:</td>
                        <td width="10%"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="border-bottom:1px solid #000">
                            <input class="select" id = "" type="text" name="" value = "<?php echo $user_id;?>">
                        </td> 
                        <td></td>
                        <td style="border-bottom:1px solid #000">
                            <input class="select" id = "rec_by" type="text" name="" value = "<?php if(!empty($employees)){ echo $employees; } else{ echo ''; }?>">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input class="select" type="text" name="" value="Encoder">
                        </td>
                        <td></td>
                        <td><input class="select" type="text" name="" value="Employee Name"></td>
                        <td></td>
                    </tr>
                </table> 
                <br>
                <center>
                    <input type='button' class="btn btn-primary-alt" id='print' value='Print'>
                    <input type="hidden" id="" name="returned_by" value = "<?php echo (!empty($borrowed_by)) ? $borrowed_by : '';?>"> 
                    <input type="hidden" id="" name="emp" value = "<?php echo (!empty($employees)) ? $employees : '';?>"> 
                    <input type="hidden" id="user_id" name="user_id" value = "<?php echo $_SESSION['user_id'];?>"> 
                    <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
                </center>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function toggle_multi(source) {
      checkboxes_multi = document.getElementsByClassName('multi');
      for(var i=0, n=checkboxes_multi.length;i<n;i++) {
        checkboxes_multi[i].checked = source.checked;
      }
    }
</script>
<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>
 <!-- MAIN CONTENT-->
<div class="m-t-15">
    <div class="container-fluid">
        <div class="row">                
            <div class="col-lg-12">
                <div class="card bor-radius   shadow">
                    <div class="card-header bg-danger-alt cheader-bor">
                        <strong>DAMAGE</strong> Equipment / Tools
                    </div>
                    <form action="<?php echo base_url(); ?>report/insert_damage" method="POST">
                        <div class="card-body card-block">
                            <table class="table table-hover table-bordered">
                                <thead>       
                                    <th width="1%"><input type="checkbox" onClick="toggle_trans(this)" class="" style="margin: 0px"></th>
                                    <th width="40%">Item Name</th>
                                    <th width="10%">Serial No.</th>
                                    <th width="15%">Asset Control Number</th>
                                    <th width="10%">Brand</th>
                                    <th width="10%">Model</th>
                                    <th width="10%">Type</th>
                                </thead>
                                <?php $x=0; foreach($details AS $det){ ?>
                                <tr>       
                                    <td><input type="checkbox" name="edid[]"  class="trans" value="<?php echo $det['ed_id']; ?>" style="margin: 0px"></td>
                                    <td><?php echo $det['item'];?></td>
                                    <td><?php echo $det['serial_no'];?></td>
                                    <td><?php echo $det['asset_control_no'];?></td>
                                    <td><?php echo $det['brand'];?></td>
                                    <td><?php echo $det['model'];?></td>
                                    <td><?php echo $det['type'];?></td> 
                                </tr>
                                <?php $x++; } ?>
                            </table>
                        </div>
                        <div class="card-footer">
                            <center>
                                <input type = "submit" class="btn btn-danger-alt btn-sm bor-radius10 btn-block" placeholder="Save" value="Proceed">
                                <input type = "hidden" name = "et_id" value="<?php echo $et_id;?>">
                                <input type = "hidden" name = "id" value="<?php echo $id;?>">
                                <input type="hidden" id="count" name="count" class="form-control" value = "<?php echo $x;?>">
                                <input type="hidden" name="user_id" value = "<?php echo $_SESSION['user_id'];?>">
                                <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>"> 
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function toggle_trans(source) {
      checkboxes_trans = document.getElementsByClassName('trans');
      for(var i=0, n=checkboxes_trans.length;i<n;i++) {
        checkboxes_trans[i].checked = source.checked;
      }
    }
</script>
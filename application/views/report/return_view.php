<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>
<div class="m-t-15">
    <div class="container-fluid">
        <div class="row">                
            <div class="col-lg-12 ">
                <div class="card bor-radius shadow">
                    <div class="card-header bg-success-alt cheader-bor text-white">
                        <strong>RETURN</strong> Equipment / Tools
                    </div>
                    <form action="<?php echo base_url(); ?>report/insert_return" method="POST">
                        <div class="card-body card-block">
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <input id="date" name="date" type="date" onChange="chooseArs();" class="form-control form-alt" required>
                                    <label for="" class="control-label mb-1">Return Date:</label>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <input id="rec" name="text" type="text" class="form-control form-alt" autocomplete="off" required>
                                    <span id="suggestion-receivedby"></span>
                                    <input type="hidden" name="rec_id" id="rec_id" >
                                    <label for="" class="control-label mb-1">Received by:</label>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <select id="ars" name="ars_no" type="text" class="form-control form-alt" readonly style = "pointer-events:none;-webkit-appearance: none;" >                                            
                                    </select>
                                    <label for="" class="control-label mb-1">ARS No.:</label>
                                </div>                                
                                <div class="col-lg-3 col-md-3">
                                                <select class = "form-control form-alt" name = "location_id">
                                                    <option value="">--Select Location--</option>
                                                    <?php foreach($location AS $loc){ ?>
                                                    <option value="<?php echo $loc->location_id; ?>"><?php echo $loc->location_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                    <label for="" class="control-label mb-1">Change Location:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <textarea class="form-control form-alt" name = "remarks" cols="10" rows="4"></textarea>
                                    <label for="" class="control-label mb-1">Remarks:</label>
                                </div>
                            </div>                            
                            <br>
                            <table class="table table-hover table-bordered">
                                <thead>       
                                    <th width="1%"><input type="checkbox" onClick="toggle_multi(this)" style="margin: 0px"></th>
                                    <th width="40%">Item Name</th>
                                    <th width="10%">Serial No.</th>
                                    <th width="15%">Asset Control Number</th>
                                    <th width="10%">Brand</th>
                                    <th width="10%">Model</th>
                                    <th width="10%">Type</th>
                                </thead>
                                <?php $x=0; foreach($details AS $det){ ?>
                                <tr>       
                                    <td><input type="checkbox" name="edid[]" value="<?php echo $det['ed_id']; ?>" class="multi" style="margin: 0px"></td>
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
                                <input type = "submit" class="btn btn-success-alt btn-sm bor-radius10 btn-block" placeholder="Save" value="Return">
                                <input type = "hidden" name = "et_id" value="<?php echo $et_id;?>">
                                <input type = "hidden" id = "ids" name = "id" value="<?php echo $id;?>">
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
    function toggle_multi(source) {
      checkboxes_multi = document.getElementsByClassName('multi');
      for(var i=0, n=checkboxes_multi.length;i<n;i++) {
        checkboxes_multi[i].checked = source.checked;
      }
    }
</script>
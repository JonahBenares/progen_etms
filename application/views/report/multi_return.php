<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
 <script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <!-- <h4 class="text-themecolor">Employee List</h4> -->
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/dashboard/">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>report/report_main_emp">Equipment / Tools Per Employee</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>report/report_sub/<?php echo $id;?>">Current Items</a></li>
                        <li class="breadcrumb-item active">Multiple Return</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-success-alt" style="border-radius: 10px 10px 0px 0px">
                        <h4 class="card-title m-b-0">
                            <a onclick="history.go(-1);" class="btn text-white">
                                <span class="fa fa-arrow-left"></span>
                            </a>
                            <b>Multiple Return</b>
                        </h4>
                    </div>
                    <div class="card-body"> 
                        <form action = "<?php echo base_url(); ?>report/insert_multireturn" method = "POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group m-b-10">
                                        <p>Name: </p>
                                        <p style="text-transform: uppercase;font-weight: 500"><?php echo $fullname;?></p>
                                    </div>
                                    <div class="form-group m-b-10">
                                        <p>Position: </p>
                                        <p style="text-transform: uppercase;font-weight: 500"><?php echo $position;?></p>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group m-b-10">
                                                <p>Location: </p>
                                                <p style="text-transform: uppercase;font-weight: 500"><?php echo $location;?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group m-b-10">
                                        <p>Return Date: </p>
                                        <input id="date" name="date" type="date" onChange="chooseArs();" class="form-control bor-radius5" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group m-b-10">
                                                <p>ARS No.: </p>
                                                <select id="ars" name="ars_no" type="text" class="form-control bor-radius5" readonly style = "pointer-events:none;-webkit-appearance: none;" ></select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-b-10">
                                                <p>Change Location: </p>
                                                <select class = "form-control form-alt" name = "location_id">
                                                    <option value="">--Select Location--</option>
                                                    <?php foreach($location_list AS $loc){ ?>
                                                    <option value="<?php echo $loc->location_id; ?>"><?php echo $loc->location_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table dataTable table-striped">
                                <thead>
                                    <tr>
                                        <th width="1%" class="text-center">
                                            <input type="checkbox" name="" onClick="toggle_multi(this)">
                                        </th>
                                        <th>Item</th>
                                        <th>Asset Control #</th>
                                        <th>Cost</th>
                                        <th>S/N</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($multi AS $m){ 
                                             $x=0;
                                             if(!empty($details)){
                                            foreach($details AS $det){ 
                                                switch($det){
                                                    case($m['id'] == $det['id']):
                                    ?>
                                        <tr>
                                            <td align="center"><input class = "multi" type="checkbox" name="edid[]" value=<?php echo $det['edid']; ?>></td>
                                            <td><?php echo $m['item'];?></td>
                                            <td><?php echo $det['acn'];?></td>
                                            <td><?php if($det['set_id']==0){ echo $det['price']."<small> ".$det['currency']."</small>"; }?></td>
                                            <td><?php echo $det['serial'];?></td>
                                            <td><textarea name="ret_remarks[<?= $det['edid'] ?>]" placeholder="Remarks"></textarea></td>
                                        </tr>
                                    <?php 
                                        break;
                                        default: 
                                       } $x++; } } }
                                    ?>
                                </tbody>
                            </table>
                            <br>
                                Received By: <input id="rec" name="rec_by" type="text" class="form-control bor-radius5" autocomplete="off" required>
                                <span id="suggestion-receivedby"></span>
                                <input type="hidden" name="rec_id" id="rec_id" >

                                 <label for="remarks" class="control-label mb-1">Return Remarks:</label>
                                <textarea id="remarks" rows = "3" name="remarks" type="text" class="form-control bor-radius5"></textarea>

                                <center><button class="btn btn-lg btn-success-alt p-l-50 p-r-50" type = "submit">Return</button></center>
                                <input type="hidden" id="id" name="id" class="form-control" value = "<?php echo $id;?>">
                                <input type = "hidden" id = "ids" name = "id" value="<?php echo $id;?>">
                                <input type="hidden" id="count" name="count" class="form-control" value = "<?php echo (!empty($x)) ? $x : '0';?>">
                                <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
                                <input type="hidden" id="user_id" name="user_id" value = "<?php echo $_SESSION['user_id'];?>">
                            <br>
                        </form>
                    </div>
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

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
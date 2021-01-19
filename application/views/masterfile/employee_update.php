<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/masterfile.js"></script>

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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/employee_list/">Employee List</a></li>
                        <li class="breadcrumb-item active">Update Employee</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">                        
                        <div class="col-lg-6 offset-lg-3">
                            <div class="card bor-radius shadow">
                                <div class="card-header">
                                    <strong>UPDATE</strong> Employee
                                </div>
                                <form action="<?php echo base_url(); ?>masterfile/update_employee" method="POST" novalidate="novalidate">
                                    <div class="card-body card-block">
                                        <?php foreach($employee AS $emp){ ?>  
                                        <label for="" class="control-label mb-1">Employee:</label>
                                        <input id="" name="employee" type="text" value = "<?php echo $emp->employee_name;?>"  class="form-control bor-radius5" placeholder="">
                                        <label for="" class="control-label mb-1">Position:</label>
                                        <input id="" name="position" type="text" value = "<?php echo $emp->position;?>"  class="form-control bor-radius5" placeholder="">
                                        <label for="" class="control-label mb-1">Department:</label>
                                        <input id="" name="department" type="text" value = "<?php echo $emp->department;?>"  class="form-control bor-radius5" placeholder="">
                                        <label for="" class="control-label mb-1">Location:</label>
                                        <select name="location" id='location' class="form-control" onChange="chooseLoc();">
                                            <option value = ""></option>
                                            <?php foreach($location AS $loc){ ?>
                                            <option value = "<?php echo $loc->location_id;?>" <?php echo (($emp->location_id == $loc->location_id) ? ' selected' : '');?>><?php echo $loc->location_name;?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="" class="control-label mb-1">AAF No.:</label>
                                        <?php if(empty($emp->aaf_no)){ ?>
                                            <select id="aaf" name="aaf_no" class="form-control bor-radius5" readonly style = "pointer-events:none;-webkit-appearance: none;" ></select>
                                        <?php }else { ?>
                                            <select id="aaf" name="aaf_no" class="form-control bor-radius5" readonly style = "pointer-events:none;-webkit-appearance: none;" ><option value = "<?php echo $emp->aaf_no; ?>"><?php echo $emp->aaf_no; ?></option></select>
                                        <?php } ?>
                                        <label for="" class="control-label mb-1">Status:</label>
                                        <select name="status" class="form-control">
                                            <option value = "">--Select Status--</option>
                                            <option value = "0" <?php echo (($emp->status == '0') ? ' selected' : '');?>>Active</option>
                                            <option value = "1" <?php echo (($emp->status == '1') ? ' selected' : '');?>>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="card-footer">
                                        <center>
                                            <input type = "submit" class="btn btn-info-alt btn-sm bor-radius10 btn-block" placeholder="Update" value="update">
                                            <input type = "hidden" name = "employee_id" value="<?php echo $id; ?>">
                                            <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
                                        </center>
                                    </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
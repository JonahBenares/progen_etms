<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/masterfile.js"></script>

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Add New Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method = "POST" action="<?php echo base_url();?>masterfile/insert_employee">
                    <div class="form-group">
                        <label for="" class="control-label mb-1">Employee:</label>
                        <input name="employee" type="text" class="form-control bor-radius5" placeholder="">

                        <label for="" class="control-label mb-1">Position:</label>
                        <input name="position" type="text" class="form-control bor-radius5" placeholder="">

                        <label for="" class="control-label mb-1">Department:</label>
                        <input name="department" type="text" class="form-control bor-radius5" placeholder="">

                        <label for="" class="control-label mb-1">Location:</label>
                        <select name="location" class="form-control bor-radius5" id="location" onChange="chooseLoc();">
                            <option>-- Select Location --</option>
                            <?php 
                                foreach ($location AS $loc) {
                            ?>
                            <option value="<?php echo $loc->location_id; ?>"><?php echo $loc->location_name;?></option>
                            <?php } ?>
                        </select>
                        <label for="" class="control-label mb-1">Employee No.:</label>
                        <select id="aaf" name="aaf_no" class="form-control bor-radius5" readonly style = "pointer-events:none;-webkit-appearance: none;" ></select>

                        <label for="" class="control-label mb-1">Status:</label>
                        <select name="status" class="form-control bor-radius5">
                            <option>-- Select Status --</option>
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
                        </select>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary-alt btn-block">Add</button>
                    </div>
                </form>
            </div>                                        
        </div>
    </div>
</div>


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
                        <li class="breadcrumb-item active">Employee List</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Employee
                            <span data-toggle="modal" data-target="#mediumModal">
                                <a href="javascript:void(0)" class="btn btn-primary-alt bor-radius pull-right btn-sm" data-toggle="tooltip" data-placement="left" title="Add New Employee">
                                    <span class="fa fa-plus" ></span>
                                </a>
                            </span>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped table-earning table-hover" id="employeeTable">
                                <thead>
                                    <tr>                                        
                                        <th width="1%"></th>
                                        <th width="12%">Employee No.</th>
                                        <th width="30%">Employee</th>
                                        <th width="20%">Department</th>
                                        <th width="30%">Postition</th>
                                        <th width="10%">Location</th>
                                        <th width="7%" class="text-center"><span class="fa fa-bars"></span></th>
                                    </tr>
                                </thead>
                                <?php 
                                    foreach($employee AS $emp){ 
                                    if($emp['type'] == '1' || $emp['type'] == '0'){
                                ?>
                                    <tr>
                                        <td><?php echo ($emp['status']==0) ? '<span class="bor-radius20 badge badge-success"><i class="fa fa-check"></i></span>' : '<span class="badge badge-dark"><i class="fa fa-times"></i></span>';?> </td>
                                        <td><?php echo $emp['aaf_no'];?></td>
                                        <td><p class="m-0"><?php echo $emp['name'];?></p></td>
                                        <td><?php echo $emp['department'];?></td>
                                        <td><?php echo $emp['position'];?></td>
                                        <td><?php echo $emp['location'];?></td>
                                        <td>                                            
                                            <center>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url(); ?>masterfile/employee_update/<?php echo $emp['id']?>" class="btn btn-info-alt btn-xs" data-toggle="tooltip" data-placement="top" title="Update">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </a>
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
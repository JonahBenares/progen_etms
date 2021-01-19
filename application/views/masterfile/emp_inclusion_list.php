<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/masterfile.js"></script>

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Add New Office</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method = "POST" action="<?php echo base_url();?>masterfile/insert_employee_inc">
                    <div class="form-group">
                        <label for="" class="control-label mb-1">Office:</label>
                        <input id="" name="department" type="text" class="form-control bor-radius5" placeholder="">

                        <label for="" class="control-label mb-1">Location:</label>
                        <select name="location" class="form-control bor-radius5" id="location" onChange="chooseLoc();">
                            <option>-- Select Location --</option>
                            <?php 
                                foreach ($location AS $loc) {
                            ?>
                            <option value="<?php echo $loc->location_id; ?>"><?php echo $loc->location_name;?></option>
                            <?php } ?>
                        </select>
                        <label for="" class="control-label mb-1">Office No.:</label>
                        <select id="aaf" name="aaf_no" class="form-control bor-radius5" readonly style = "pointer-events:none;-webkit-appearance: none;" ></select>
                    </div>
                    <div class="form-group">
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
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Office List</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Office
                            <span data-toggle="modal" data-target="#mediumModal">
                                <a href="javascript:void(0)" class="btn btn-primary-alt bor-radius pull-right btn-sm" data-toggle="tooltip" data-placement="left" title="Add New Office">
                                    <span class="fa fa-plus" ></span>
                                </a>
                            </span>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped table-earning table-hover" id="employeeTable">
                                <thead>
                                    <tr>
                                        <th>Office No.</th>
                                        <th>Office</th>
                                        <th>Location</th>
                                        <th width="1%" class="text-center"><span class="fa fa-bars"></span></th>
                                    </tr>
                                </thead>
                                <?php 
                                    foreach($employee AS $emp){ 
                                        if($emp['type'] == '2'){
                                ?>
                                    <tr>                                        
                                        <td><?php echo $emp['aaf_no'];?></td>
                                        <td style="padding: 0px">
                                            <button class="accordion1" style="padding: 10px 10px"><p class="m-b-0" style="color:#44474e"><?php echo $emp['name'];?></p></button>
                                            <div class="panel1">
                                                <?php 
                                                    foreach($ems AS $e){ 
                                                        switch($e){
                                                            case($emp['id'] == $e['id']):
                                                ?>
                                                    <?php if($e['status']==0){ ?>
                                                        <p class="text-dark m-b-0 m-t-5"><?php echo $e['employee'];?></p>
                                                    <?php } ?>
                                                <?php   
                                                    break;
                                                    default: 
                                                    } } 
                                                ?> 
                                            </div>
                                        </td>
                                        <td><?php echo $emp['location'];?></td>
                                        <td>                                            
                                            <div class="btn-group">
                                                <a class="btn btn-success-alt item btn-sm text-white" data-toggle="tooltip" data-placement="top" title="Add Employee" onClick="viewEmp(<?php echo $emp['id'];?>)">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <a href="<?php echo base_url(); ?>masterfile/office_update/<?php echo $emp['id'];?>" class="btn btn-info-alt btn-xs" data-toggle="tooltip" data-placement="top" title="Update">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>
                                                <a href="<?php echo base_url(); ?>masterfile/delete_office/<?php echo $emp['id'];?>" onclick="confirmationDelete(this);return false;" class="btn btn-danger-alt item btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" title="Delete" alt='Delete'>
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
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
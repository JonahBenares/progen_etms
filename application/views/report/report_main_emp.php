<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>

<div class="modal fade" id="locModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='POST' action="<?php echo base_url(); ?>report/search_employee/">
                <div class="modal-body">
                    <table width="100%">
                        <tr>
                            <td><p>Location:</p>
                                <select name="location" class="form-control bor-radius5" id="location">
                                    <option value=''>-- Select Location --</option>
                                    <?php 
                                        foreach ($location AS $l) {
                                    ?>
                                    <option value="<?php echo $l->location_id; ?>"><?php echo $l->location_name;?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success-alt btn-sm btn-block bor-radius" value='Filter'>
                </div>
            </form>
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
                        <li class="breadcrumb-item active">Equipment / Tools Per Employee List</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">                        
                        <h4 class="card-title">Equipment / Tools Per Employee
                            <div class="pull-right btn-group">
                                <button type="button" class="btn btn-sm btn-success-alt " data-toggle="modal" data-target="#locModal">
                                    <span class="fa fa-filter"></span> Filter
                                </button>                                
                            </div>                           
                        </h4>

                        <?php if(!empty($filt)) { ?>     
                        <div class='sufee-alert alert with-close alert-success fade show m-l-30  m-r-30'><span class='btn btn-success disabled'>Filter Applied</span><?php echo $filt ?>, <a href='<?php echo base_url(); ?>report/report_main_emp' class='remove_filter alert-link pull-right btn'><span class="fa fa-times"></span></a>.</div>                    
                        <?php } ?>


                        <table class="table table-borderless table-striped table-earning table-hover" id="myTable_peret">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Number of Accountable Items</th>
                                    <th class="text-center" width="2%"><span class="fa fa-bars"></span></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                if(!empty($employees)){
                                foreach($employees AS $emp){ 
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $emp['employee'];?>                                        
                                    </td>
                                    <td><?php echo $emp['count'];?></td>
                                    <td>
                                        <div class="btn-group">
                                            
                                            <a href="<?php echo base_url(); ?>report/report_history/<?php echo $emp['employee_id']?>" class="btn text-white btn-secondary-alt item btn-sm" data-toggle="tooltip" data-placement="top"   title="View Overall Items"><span class="fa fa-eye"></span></a>

                                            <a href="<?php echo base_url(); ?>report/report_sub/<?php echo $emp['employee_id']?>" class="btn text-white btn-warning-alt item btn-sm" data-toggle="tooltip" data-placement="top"   title="View Current Items"><span class="fa fa-eye"></span></a>


                                            <?php if($_SESSION['usertype'] == 1){ ?>
                                            <a href="<?php echo base_url(); ?>report/multi_return/<?php echo $emp['employee_id']?>" class="btn btn-success-alt item btn-sm" data-toggle="tooltip" data-placement="top" title="Multiple Return">
                                                <i class="fa fa-dedent"></i>
                                            </a>
                                            <?php } ?>
                                            <!-- <a href="<?php echo base_url(); ?>report/multi_transfer/<?php echo $emp['employee_id']?>" class="btn text-white btn-warning item btn-sm" data-toggle="tooltip" data-placement="top" title="Multiple Transfer">
                                                <i class="fa fa-indent"></i>
                                            </a> -->
                                            <a href="<?php echo base_url(); ?>report/seaaf_report/<?php echo $emp['employee_id']?>" class="btn text-white btn-info-alt item btn-sm" data-toggle="tooltip" data-placement="top"   title="Summary of Employee's Asset Accountability Form"><span class="fa fa-print"></span></a>
                                                 
                                            
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


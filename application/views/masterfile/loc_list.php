<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/masterfile.js"></script>

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Add New Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method = "POST" action="<?php echo base_url();?>masterfile/insert_location">
                    <div class="form-group">
                        <label for="" class="control-label mb-1">Location:</label>
                        <input name="location" type="text" class="form-control bor-radius5" placeholder="">
                        <label for="" class="control-label mb-1">Location Perfix:</label>
                        <input name="prefix" type="text" class="form-control bor-radius5" placeholder="">
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
                <!-- <h4 class="text-themecolor">Employee List</h4> -->
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Location</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Location
                            <span data-toggle="modal" data-target="#mediumModal">
                                <a href="javascript:void(0)" class="btn btn-primary-alt bor-radius pull-right btn-sm" data-toggle="tooltip" data-placement="left" title="Add New Location">
                                    <span class="fa fa-plus" ></span>
                                </a>
                            </span>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped table-earning table-hover" id="employeeTable">
                                <thead>
                                    <tr>
                                        <th width="40%">Location Prefix</th>
                                        <th>Location</th>
                                        <th width="1%" class="text-center"><span class="fa fa-bars"></span></th>
                                    </tr>
                                </thead>
                                <?php foreach($location as $loc){ ?>
                                    <tr>
                                        <td><?php echo $loc->location_prefix;?></td>
                                        <td><?php echo $loc->location_name;?></td>
                                        <td>                                            
                                            <div class="btn-group">
                                                <a href="<?php echo base_url(); ?>masterfile/loc_update/<?php echo $loc->location_id ?>" class="btn btn-info-alt item btn-sm" data-toggle="tooltip" data-placement="top" title="Update">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>
                                                <a href="<?php echo base_url(); ?>masterfile/delete_location/<?php echo $loc->location_id;?>" onclick="confirmationDelete(this);return false;" class="btn btn-danger-alt item btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" title="Delete" alt='Delete'>
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
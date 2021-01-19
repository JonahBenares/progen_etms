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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/placement_list/">Placement List</a></li>
                        <li class="breadcrumb-item active">Update Placement</li>
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
                                    <strong>UPDATE</strong> Placement
                                </div>
                                <form action="<?php echo base_url(); ?>masterfile/update_placement" method="POST">
                                    <div class="card-body card-block">
                                        <label for="" class="control-label mb-1">Placement Name:</label>
                                        <?php foreach($placement AS $dep){ ?>  
                                        <input id="" name="placement" type="text" value = "<?php echo $dep->placement_name;?>"  class="form-control bor-radius5" placeholder="">
                                    </div>
                                    <div class="card-footer">
                                        <center>
                                            <input type = "submit" class="btn btn-info-alt btn-sm bor-radius10 btn-block" placeholder="Update" value="update">
                                            <input type = "hidden" name = "placement_id" value="<?php echo $id; ?>">
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
</div>\
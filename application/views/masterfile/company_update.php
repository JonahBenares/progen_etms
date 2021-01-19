<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/masterfile.js"></script>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/dashboard/">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/company_list/">Company List</a></li>
                        <li class="breadcrumb-item active">Update Company</li>
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
                                    <strong>UPDATE</strong> Company
                                </div>
                                <form action="<?php echo base_url(); ?>masterfile/update_company" method="POST">
                                    <div class="card-body card-block">
                                        <label for="" class="control-label mb-1">Company:</label>
                                        <?php foreach($company AS $dep){ ?>  
                                        <input id="" name="company" type="text" value = "<?php echo $dep->company_name;?>"  class="form-control bor-radius5" placeholder="">
                                    </div>
                                    <div class="card-footer">
                                        <center>
                                            <input type = "submit" class="btn btn-info-alt btn-sm bor-radius10 btn-block" placeholder="Update" value="update">
                                            <input type = "hidden" name = "company_id" value="<?php echo $id; ?>">
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
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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>report/inv_rep/">Inventory Report (Per Sub Category)</a></li>
                        <li class="breadcrumb-item active"><?php echo $subcat_name;?></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary-alt" style="border-radius: 5px 5px 0px 0px;">                    
                        <div class="bor-radius100  btn-block">
                            <h4 class="text-white">
                                <span class=" badge-alt badge badge-white m-r-10 animated infinite pulse">
                                    <b><?php echo $count;?></b>
                                </span>
                                <?php echo $subcat_name;?>
                                <a href="<?php echo base_url(); ?>report/inv_rep_det_print/<?php echo $subcat_id; ?>" class="btn btn-info-alt btn-sm pull-right"><span class="fa fa-print"></span>Print</a>
                            </h4>

                        </div>
                    </div>
                    <div class="card-body">
                        
                        <table class="table table-borderless table-striped table-earning " id="myTable_peremp">
                            <thead>
                                <tr>
                                    <th>Item Description</th>
                                    <th>Accountability</th>
                                    <th>Status</th>
                                    <th width="10%">Qty</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php 
                                    foreach($item AS $i){ 
                                    if($i['accountability_id']!=0 && $i['borrowed']==0 && $i['lost']==0){
                                        $status = '<span class="badge badge-pill bg-primary-alt uppercase">Assigned</span>';
                                    }else if($i['accountability_id']==0 && $i['damaged']==0 && $i['change_location']==0){
                                        $status = '<span class="badge badge-pill bg-success-alt uppercase">Available</span>';
                                    }else if($i['accountability_id']==0 && $i['change_location']==1){
                                        $status = "Moved to ".$i['location'];
                                    }else if($i['borrowed']==1){
                                        $status = '<span class="badge badge-pill bg-info-alt uppercase">Borrowed</span>';
                                    }else if($i['damaged']==1){
                                        $status = '<span class="badge badge-pill bg-danger-alt uppercase">Damaged</span>';
                                    }else if($i['lost']==1){
                                        $status = '<span class="badge badge-pill bg-dark-alt uppercase">'.'Lost Item / '.$i['accountability'].'</span>';
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $i['item'];?></td>
                                        <td><?php echo $i['accountability'];?></td>
                                        <td><?php echo $status;?></td>
                                        <td><?php echo $i['qty'];?></td>
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


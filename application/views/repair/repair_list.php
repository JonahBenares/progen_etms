<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Damaged List</li>
                    </ol>
                </div>
            </div>
        </div>
        <!--Modal Start -->
        <div class="modal fade" id="damage_modal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Filter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action = "<?php echo base_url();?>repair/export_damage">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="" class="control-label mb-1">Date Received From:</label>
                                        <input name="date_received_from" type="date" class="form-control bor-radius5">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="" class="control-label mb-1">Date Received To:</label>
                                        <input name="date_received_to" type="date" class="form-control bor-radius5">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary-alt btn-block" value="Export">
                            </div>
                        </form>
                    </div>                                        
                </div>
            </div>
        </div>
        <!--Modal End -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Damaged
                            <a href="<?php echo base_url(); ?>report/damage_report_blank" class="btn btn-sm btn-danger pull-right animated headShake infinite">PRINT <b>BLANK</b> E/T DAMAGE REPORT</a>
                            <a href="#"  data-target= "#damage_modal" data-toggle="modal" class="btn btn-sm btn-primary pull-right ">Filter</a>
                        </h4>
                        <form  action="<?php echo base_url(); ?>repair/insert_redirect" method="POST">
                            <table class="table table-borderless table-striped table-earning table-hover" id="myTable_pseret">
                                <thead>
                                    <tr>
                                        <th align="center" width="1%"><input type="checkbox" class="m-0" onClick="toggle_multi(this)"></th>
                                        <th width="25%">Asset Control No.</th>
                                        <th width="40%%">Item Description</th>
                                        <th width="20%">Category</th>
                                        <th width="%">Brand</th>
                                        <th width="15%">Model</th>
                                        <th width="%">Serial No.</th>
                                        <th width="%">Status</th>
                                        <th width="%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($damage)){ $x=0; foreach($damage as $d){ ?>
                                    <tr>
                                        <td class="p-b-10 p-t-10" align="center"><input type="checkbox" class="multi m-0" name="edid[]" value=<?php echo $d['ed_id']; ?>></td>
                                        <td class="p-b-10 p-t-10"><?php echo $d['asset_control'];?></td>
                                        <td class="p-b-10 p-t-10"><?php echo $d['et_desc'];?></td>
                                        <td class="p-b-10 p-t-10"><?php echo $d['category'];?></td>
                                        <td class="p-b-10 p-t-10"><?php echo $d['brand'];?></td>
                                        <td class="p-b-10 p-t-10"><?php echo $d['model'];?></td>
                                        <td class="p-b-10 p-t-10"><?php echo $d['serial_no'];?></td>
                                        <td class="p-b-10 p-t-10"><?php if($d['beyond_repair']==1){ echo 'Beyond Repair';}else if($d['repair']==1 && $d['count_ed_id'] < 1){ echo 'Repaired'; }?></td>
                                        <td class="p-b-10 p-t-10"  align="center">
                                            <a href="<?php echo base_url(); ?>report/damage_report_nav/<?php echo $d['damage_id']?>" class="btn btn-warning-alt text-white item btn-sm" data-toggle="tooltip" data-placement="top" title="Print">
                                                <i class="fa fa-print"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $x++; } ?>                                        
                                </tbody>
                            </table>
                            <?php if($_SESSION['usertype'] == 1){ ?> 
                            <input type = "submit" class="btn btn-info-alt btn-block  btn-md" value = "Repair" onclick="confirmationRepair(this);return false;">
                            <?php } ?>
                            <input type="hidden" id="count" name="count" class="form-control" value = "<?php echo $x;?>">
                            <input type="hidden" name="user_id" value = "<?php echo $_SESSION['user_id'];?>">
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


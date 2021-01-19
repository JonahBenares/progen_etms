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
                        <li class="breadcrumb-item active">Returned List</li>
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
                        <form method="POST" action = "<?php echo base_url();?>report/export_returned">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="" class="control-label mb-1">Date Returned From:</label>
                                        <input name="date_returned_from" type="date" class="form-control bor-radius5">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="" class="control-label mb-1">Date Returned To:</label>
                                        <input name="date_returned_to" type="date" class="form-control bor-radius5">
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
                        <h4 class="card-title">Returned
                            <div class="pull-right btn-group">
                                <a href="#"  data-target= "#damage_modal" data-toggle="modal" class="btn btn-sm btn-info-alt"><span class="fa fa-filter"></span> Filter</a>
                            </div>
                        </h4>
                        <table class="table table-borderless table-striped table-earning table-hover" id="myTable_peret">
                            <thead>
                                <tr>
                                    <th width = "11%">Returned Date</th>
                                    <th width = "15%">Employee Name</th>
                                    <th width = "30%">Item</th>
                                    <th width = "10%">Received By</th>
                                    <th width = "20%">Remarks</th>
                                    <th width="5%" class="text-center"><span class="fa fa-bars"></span></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if(!empty($main)){
                            foreach($main AS $m){ ?>
                                <tr> 
                                    <td><?php echo $m['returned_date']; ?></td>                                       
                                    <td><?php echo $m['accountability']; ?></td>
                                    <td><?php echo $m['item_desc']; ?></td>
                                    <td><?php echo $m['received_by']; ?></td>
                                    <td><?php echo $m['remarks']; ?></td>
                                    <td>                                            
                                        <div class="table-data-feature">
                                            <a href = "<?php echo base_url(); ?>report/ars_report/<?php echo $m['return_id'];?>" class="btn btn-warning-alt text-white item btn-sm" data-toggle="tooltip" data-placement="top" title="Print">
                                                <i class="fa fa-print"></i>
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


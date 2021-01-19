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
                        <li class="breadcrumb-item active">Lost List</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lost</h4>
                        <table class="table table-borderless table-striped table-earning table-hover" id="myTable_peret">
                            <thead>
                                <tr>
                                    <th>Date Lost</th>
                                    <th>Lost Item</th>
                                    <th>Replacement Item</th>
                                    <th>Accountable Person</th>
                                    <th>Remarks</th>
                                    <th width="5%" class="text-center"><span class="fa fa-bars"></span></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if(!empty($lost)){
                            foreach($lost AS $l){ ?>
                                <tr>                                        
                                    <td><?php echo $l['lost_date']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>report/view_more/<?php echo $l['et_id'];?>" class=""  data-toggle="tooltip" data-placement="right" title="View" style="word-wrap: break-word;">
                                            <?php echo $l['item']; ?>
                                        </a> 
                                    </td>
                                    <td><?php echo $l['replacement']; ?></td>
                                    <td><?php echo $l['accountable']; ?></td>
                                    <td><?php echo $l['remarks']; ?></td>
                                    <td>                                            
                                        <div class="table-data-feature">
                                            <?php 
                                                if($_SESSION['usertype'] == 1){ 
                                            ?>
                                            <a class="btn btn-success text-white item btn-sm <?php echo (!empty($l['replacement'])) ? "disabled" : ''; ?>" data-toggle="tooltip" data-placement="top" title="Replace Item" href="<?php echo base_url(); ?>report/replace_item/<?php echo $l['empid']; ?>/<?php echo $l['lost_id']; ?>">
                                                <i class="fa fa-refresh"></i>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


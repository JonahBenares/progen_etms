<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>

<div class="modal fade" id="lostTag" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><span class="fa fa-filter"></span>  Lost Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='POST' action="<?php echo base_url(); ?>report/insert_lost">
                <div class="modal-body">
                    <table width="100%">
                        <tr>
                            <td><p>Lost Date:</p>
                                <input type="date" id="lost_date" name="lost_date" class="form-control bor-radius10" >
                            </td>
                        </tr>
                        <tr>
                            <td><p>Accountable Person:</p>
                                <input type="text" style = "pointer-events: none;" name="accountable" id="accountable" class="form-control bor-radius10" >
                            </td>
                        </tr>
                        <tr>
                            <td><p>Remarks:</p>
                                <textarea id="remarks" name="remarks" class="form-control bor-radius10"></textarea>
                            </td>
                        </tr>                                                        
                    </table>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success btn-sm btn-block bor-radius" value='Save'>
                </div>
                <input type="hidden" name="emp_id" id="emp_id">
                <input type="hidden" name="ed_id" id="ed_id">
                <input type="hidden" name="et_id" id="et_id">
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="transferItem" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><span class="fa fa-forward"></span>  Transfer Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='POST' action="<?php echo base_url(); ?>report/transfer_item">
                <div class="modal-body">
                    <table width="100%">
                        <tr>
                            <td><p>Location:</p>
                                <select id="location" name="location" class="form-control bor-radius10">
                                    <option value="">--Select Location--</option>
                                    <?php foreach($location AS $l){ ?>
                                    <option value="<?php echo $l->location_id; ?>"><?php echo $l->location_name; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>  
                        <tr>
                            <td>
                                <p>Date Transfer:</p>
                                <input type="date" id="date" name="transfer_date" onChange="chooseTrans();" class="form-control bor-radius10">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Transfer Series:</p>
                                <select id="trans" name="transfer_no" class="form-control bor-radius5" readonly style = "pointer-events:none;-webkit-appearance: none;" ></select>
                            </td>
                        </tr>                                                     
                    </table>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success btn-sm btn-block bor-radius" value='Save'>
                </div>
                <input type="hidden" name="ed_id" id="ed_ids">
            </form>
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
                        <li class="breadcrumb-item active">Available Equipment / Tools List</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Available Equipment / Tools
                            <div class="pull-right btn-group">
                                <?php if($_SESSION['usertype'] == 1){ ?>
                                <a href="<?php echo base_url(); ?>report/create_set_avail" class="btn btn-warning-alt btn-sm text-white">Create Set</a>
                                <a href="<?php echo base_url(); ?>report/aaf_assign_rep" class="btn btn-success-alt btn-sm">
                                    Assign
                                </a>
                                <?php } ?>
                                <a href = "<?php echo base_url(); ?>report/report_print_avail" class="btn btn-info-alt btn-sm"><span class="fa fa-print"></span> Print</a>               
                            </div>                            
                        </h4>
                        
                        <table class="table table-striped table-hover" id="myTable_peret">
                            <thead>
                                    <tr>
                                        <th width="20%">Category</th>
                                        <th width="20%">Subcategory</th>
                                        <th width="20%">Item</th>
                                        <th>Unit</th>
                                        <th>Quantity</th>
                                        <th width="3%" class="text-center"><span class="fa fa-bars"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($avail)){ foreach($avail AS $a){ ?>
                                    <tr <?php if($a['damaged'] == 1){ echo "class='tr-damage'"; } else { echo ''; }?>>
                                        <td><?php echo $a['category']; ?></td>
                                        <td><?php echo $a['subcat']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>report/view_more/<?php echo $a['et_id']; ?>"  data-toggle="tooltip" data-placement="left" title="View">
                                            <?php echo $a['et_desc']; ?>
                                             </a>
                                            
                                        </td>
                                        <td align="center"><?php echo $a['unit']; ?></td>
                                        <td align="center"><?php echo $a['qty']; ?></td>
                                        <td >  
                                            <div class="btn-group">
                                            <?php if($a['damaged']!=1){ ?>     
                                                <?php if($_SESSION['usertype'] == 1){ ?>                                     
                                                <span data-toggle="tooltip" data-placement="top" title="Lost Item"><a class="btn btn-secondary-alt text-white item btn-sm" data-toggle="modal" id = "lost_button" data-id = "<?php echo $a['empid'];?>" data-name = "<?php echo $a['accountability'];?>" data-ab = "<?php echo $a['ed_id'];?>" data-ac = '<?php echo $a['et_id']; ?>' data-target="#lostTag" title="Lost">
                                                    <i class="fa fa-minus-circle"></i>
                                                </a></span>
                                                <a class="btn btn-info-alt text-white item btn-sm" data-toggle="tooltip" data-placement="top" title="Update" href="<?php echo base_url(); ?>report/edit_encode/<?php echo $a['et_id'];?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <?php } ?> 
                                                <a href = "<?php echo base_url(); ?>report/encode_report/<?php echo $a['et_id'];?>" class="btn btn-warning-alt text-white item btn-sm" data-toggle="tooltip" data-placement="top" title="Print">
                                                    <i class="fa fa-print"></i>
                                                </a>
                                                <?php if($_SESSION['usertype'] == 1){ ?>
                                                <span data-toggle="tooltip" data-placement="top" title="Transfer Item"><a class="btn btn-success-alt item btn-sm text-white" id="itemTransfer" data-id = "<?php echo $a['ed_id'];?>" data-toggle="modal" data-placement="top" title="Transfer Item" data-target="#transferItem">
                                                    <i class="fa fa-forward"></i>
                                                </a></span>
                                                <a class="btn btn-danger-alt item btn-sm text-white" onClick="tagAsDamage(<?php echo $a['empid'];?>,<?php echo $a['et_id'];?>)" data-toggle="tooltip" data-placement="top" title="Tag as Damage">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <?php } ?> 
                                            <?php } ?> 
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


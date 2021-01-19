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
                        <li class="breadcrumb-item active">Available Set Equipment/Tools List</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Available Set Equipment/Tools
                            <div class="pull-right btn-group">
                                <a href="<?php echo base_url(); ?>report/set_print_avail_all" class="btn btn-info-alt btn-sm" title="Set Print">
                                <span class="fa fa-print"></span></a>
                                <?php if($_SESSION['usertype'] == 1){ ?> 
                                <a href="<?php echo base_url(); ?>report/aaf_assign_rep" class="btn btn-success-alt btn-sm">
                                    Assign
                                </a>
                                <?php } ?>             
                            </div>                            
                        </h4>
                        <table class="table table-borderless table-striped table-earning table-hover" id="myTable_peret">
                            <thead>
                                <tr>
                                    <!-- <th>Asset Control #</th> -->
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Item</th>
                                    <th>Unit</th>
                                    <th>Quantity</th>
                                    <th>Set Name</th>
                                    <th width="3%" class="text-center"><span class="fa fa-bars"></span></th>
                                    <!-- <th>Department</th> -->                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(!empty($avail)){ 
                                        usort($avail, function($a, $b) {
                                            return $a['set_id'] - $b['set_id'];
                                        });
                                        foreach($avail AS $a){ 
                                ?>
                                <tr <?php if($a['damaged'] == 1){ echo "class='tr-damage'"; } else { echo ''; }?>>
                                    
                                    <td><?php echo $a['category']; ?></td>
                                    <td><?php echo $a['subcat']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>report/view_more/<?php echo $a['et_id']; ?>" class="pull-left" data-toggle="tooltip" data-placement="left" title="View Item">
                                        <?php echo $a['et_desc']; ?>
                                         </a>
                                        
                                    </td>
                                    <td align="center"><?php echo $a['unit']; ?></td>
                                    <td align="center"><?php echo $a['qty']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>report/set_print_avail/<?php echo $a['set_id'];?>" class="" data-toggle="tooltip" data-placement="top" title="View Set"  style="white-space: normal!important;text-align: left">
                                             <?php echo $a['set_name'];?>
                                        </a> 
                                    </td>
                                    <td >  
                                        <div class="btn-group">
                                        <?php if($a['damaged']!=1){ ?>         
                                            <?php if($_SESSION['usertype'] == 1){ ?>                                 
                                            <a class="btn btn-info-alt text-white item btn-sm" data-toggle="tooltip" data-placement="top" title="Update" href="<?php echo base_url(); ?>report/edit_encode/<?php echo $a['et_id'];?>">
                                                <i class="fa fa-edit"></i>
                                            </a>
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


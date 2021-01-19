<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><span class="fa fa-filter"></span>  Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='POST' action="<?php echo base_url(); ?>report/search_inv_overall/">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <table width="100%">
                                <tr>
                                    <td><p>Date Encoded (from):</p>
                                        <input type="date"  name="encoded_from" class="form-control bor-radius10" >
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Acquired Date (from):</p>
                                        <input type="date" name="from" class="form-control bor-radius10" >
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Category:</p>
                                       <select name="category" class="form-control bor-radius5" id="category" onChange="chooseCategory();">
                                         <option value=''>-- Select Category --</option>
                                           <?php 
                                                foreach ($cat AS $cat) {
                                            ?>
                                            <option value="<?php echo $cat->category_id; ?>"><?php echo $cat->category_name;?></option>
                                            <?php } ?>
                                     </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Sub Category:</p>
                                         <select id="subcat" name="subcat" class="form-control bor-radius5"></select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Office/Department:</p>
                                        <input type="text" id="department" name="department" class="form-control bor-radius10">
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Item Description:</p>
                                        <input type="text" id="item" name="item" class="form-control bor-radius10">
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Physical Condition :</p>
                                        <input type = "text" name="condition" class="form-control bor-radius5">
                                    </td>
                                </tr> 
                                <tr>
                                    <td><p>Placement :</p>
                                        <select name="placement" class="form-control bor-radius5">
                                            <option value=''>-- Select Placement --</option>
                                           <?php 
                                                foreach ($placement AS $p) {
                                            ?>
                                            <option value="<?php echo $p->placement_id; ?>"><?php echo $p->placement_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>                                                           
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table width="100%">
                                <tr>
                                    <td><p>Date Encoded (to):</p>
                                        <input type="date"  name="encoded_to" class="form-control bor-radius10" >
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Acquired Date (to):</p>
                                        <input type="date" name="to" class="form-control bor-radius10" >
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Brand:</p>
                                        <input type="text" id="brand" name="brand" class="form-control bor-radius10">
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Model:</p>
                                        <input type="text" id="model" name="model" class="form-control bor-radius10">
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Type:</p>
                                        <input type="text" id="item_type" name="item_type" class="form-control bor-radius10">
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Serial No. :</p>
                                        <input type="text" id="serial_no" name="serial_no" class="form-control bor-radius10">
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>Company :</p>
                                        <select name="company" class="form-control bor-radius5">
                                            <option value=''>-- Select Company --</option>
                                           <?php 
                                                foreach ($company1 AS $r) {
                                            ?>
                                            <option value="<?php echo $r->company_id; ?>"><?php echo $r->company_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <td><p>Damage</p><input type="checkbox" name="damage" id="damage" value='1'></td>
                                </tr>
                            </table>
                        </div>
                    </div>
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
                        <li class="breadcrumb-item active">Inventory Report (Overall Item Report)</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">   
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 class="card-title m-t-10 m-b-0 ">Inventory Report <small>(Overall Item Report)</small></h4>
                            </div>
                            <div class="col-lg-4 offset-lg-2">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-sm btn-info-alt " data-toggle="modal" data-target="#largeModal">
                                        <span class="fa fa-filter"></span> Filter
                                    </button>
                                    <?php if(!empty($filt)){ ?>
                                        <a href = "<?php echo base_url(); ?>report/export_overall/<?php echo $from;?>/<?php echo $to;?>/<?php echo $category;?>/<?php echo $subcat;?>/<?php echo $department;?>/<?php echo urlencode($item);?>/<?php echo $brand;?>/<?php echo $model;?>/<?php echo $item_type;?>/<?php echo $serial_no;?>/<?php echo $damage;?>/<?php echo $condition;?>/<?php echo $plac;?>/<?php echo $company;?>/<?php echo $encoded_from;?>/<?php echo $encoded_to;?>" class="btn btn-sm btn-warning-alt pull-right" style ="color:white;"><span class="fa fa-report"></span>Export to Excel</a>

                                        <a href = "<?php echo base_url(); ?>report/report_print_overall/<?php echo $from;?>/<?php echo $to;?>/<?php echo $category;?>/<?php echo $subcat;?>/<?php echo $department;?>/<?php echo urlencode($item);?>/<?php echo $brand;?>/<?php echo $model;?>/<?php echo $item_type;?>/<?php echo $serial_no;?>/<?php echo $damage;?>/<?php echo $condition;?>/<?php echo $plac;?>/<?php echo $company;?>/<?php echo $encoded_from;?>/<?php echo $encoded_to;?>" class="btn btn-sm btn-info-alt pull-right"><span class="fa fa-print"></span> Print</a>
                                    <?php }else { ?>
                                    <a href = "<?php echo base_url(); ?>report/export_overall" class="btn btn-sm btn-warning-alt pull-right active" style ="color:white;"><span class="fa fa-report"></span>Export to Excel</a>
                                    
                                    <a href = "<?php echo base_url(); ?>report/report_print_overall" target="_blank" class="btn btn-sm btn-info-alt pull-right"><span class="fa fa-print"></span> Print</a>
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php if(!empty($filt)){?>     
                        <div class='animated headShake alert with-close alert-success fade show p-10'><span class='btn btn-success-alt btn-sm'>Filter Applied</span><?php echo $filt ?>, <a href='<?php echo base_url(); ?>report/inv_rep_overall' class='alert-link pull-right btn p-t-0'><span class="fa fa-times"></span></a>
                        </div>                    
                        <?php } ?>


                        <?php if(!empty($details)){ ?>
                        <table class="table table-borderless table-striped table-earning " id="myTable_peremp" width = "100%">
                            <thead>
                                <tr>
                                    <th>Item Description</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Department</th>
                                    <th>Set Name</th>
                                    <th>Status / Accountability</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php 
                                    foreach($details AS $i){ 
                                    if($i['accountability_id']!=0 && $i['borrowed']==0 && $i['lost']==0){
                                        $status = $i['employee'];
                                    }else if($i['accountability_id']==0 && $i['damaged']==0 && $i['change_location']==0){
                                        $status = '<span class="badge badge-pill bg-success-alt uppercase">Available</span>';
                                    }else if($i['accountability_id']==0 && $i['change_location']==1){
                                        $status = "Moved to ".$i['location'];
                                    }else if($i['borrowed']==1){
                                        $status = '<span class="badge badge-pill bg-info-alt uppercase">Borrowed</span>';
                                    }else if($i['damaged']==1){
                                        $status = '<span class="badge badge-pill bg-danger-alt uppercase">Damaged</span>';
                                    }else if($i['lost']==1){
                                        $status = '<span  class="badge badge-pill bg-dark-alt uppercase">Lost Item / '.$i['employee']."</span>";
                                    }
                                    ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo base_url(); ?>report/view_more/<?php echo $i['et_id'];?>" class=""  data-toggle="tooltip" data-placement="left" title="View" style="word-wrap: break-word;">
                                            <?php echo $i['item']; ?>
                                        </a>
                                    </td>
                                    <td align="center"><?php echo $i['qty']; ?></td>
                                    <td align="center"><?php echo $i['unit_price']; ?></td>
                                    <td><?php echo $i['category']; ?></td>
                                    <td><?php echo $i['subcategory']; ?></td>
                                    <td><?php echo $i['department']; ?></td>
                                    <td><?php echo $i['set_name']; ?></td>
                                    <td align="center"><?php echo $status; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>                           
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


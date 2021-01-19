<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/borrow.js"></script>

<div class="modal fade" id="subcatModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>borrow/insert_borrow_head" method="POST" >
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="control-label mb-1">Employee Name:</label>
                        <input id="borrow" name="borrow" type="text" class="form-control bor-radius5" placeholder="" autocomplete="off" required>
                        <span id="suggestion-borrow"></span>
                        <input type="hidden" name="borrow_id" id="borrow_id">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label mb-1">Borrow Date:</label>
                        <input id="" name="date" type="date" class="form-control bor-radius5" placeholder="" required>
                    </div>
                </div>                                        
                <div class="modal-footer">
                    <input type='submit' class="btn btn-primary-alt btn-block btn-fill" value='Add' onclick="confirmationSave(this);return false;">
                    <input type="hidden" name="user_id" value = "<?php echo $_SESSION['user_id'];?>">
                </div>
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
                        <li class="breadcrumb-item active">Borrow List</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">                        
                        <h4 class="card-title">Borrow List
                            <div class="pull-right btn-group">
                                <a href="<?php echo base_url(); ?>borrow/borrow_view/" class="btn btn-success-alt text-white btn-sm"  title = "RETURN">
                                    <i class="fa fa-refresh"></i>
                                </a>    
                                <a href="" class="btn btn-primary-alt btn-sm" data-toggle="modal" data-target="#subcatModal">
                                    <span class="fa fa-plus" ></span>
                                </a>                              
                            </div>                           
                        </h4>

                        <table class="table table-striped table-earning" id="myTable_peret">
                            <thead>
                                <tr>
                                    <th align="center" width="1%">#</th>
                                    <th>Series</th>
                                    <th>Item Name</th>
                                    <th>Employee Name</th>
                                    <th>Borrowed Date/Time</th>
                                    <th>Returned Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <?php if(!empty($all)){ $x=1; foreach($all as $a){ ?>
                                <tr>
                                    <td align="center" width="1%"><?php echo $x;?></td>
                                    <td><?php echo $a['series'];?></td>
                                    <td><?php echo $a['item_name'];?></td>
                                    <td><?php echo $a['employee'];?></td>
                                    <td><?php echo $a['date'];?></td>
                                    <td><?php if(!empty($a['returned_date'])) { echo date("Y-m-d",strtotime($a['returned_date'])); }else { echo ''; }?></td>
                                    <td align="center"><a href="<?php echo base_url(); ?>borrow/borrow_print/<?php echo $a['borrowed_by']; ?>/<?php echo $a['bh_id']; ?>/<?php echo $a['bd_id']; ?>" class="btn btn-warning-alt text-white btn-sm"><i class="fa fa-print"></i></a></td>
                                </tr>
                                <?php $x++; } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


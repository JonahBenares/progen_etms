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
                        <li class="breadcrumb-item active">Inventory Report (Per Item)</li>
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
                                <h4 class="card-title m-t-10 m-b-0 ">Inventory Report <small>(Per Item)</small></h4>
                            </div>
                            <div class="col-lg-5 offset-lg-1">
                                <form method='POST' action="<?php echo base_url(); ?>report/search_inv_itm/">                          
                                    <div class="bor-radius100 btn-group btn-block ">
                                        <input id="item" name="item" type="text" class="form-control form-alt" placeholder="Enter Item Name" autocomplete="off">
                                        <input id="set" name="set" type="text" class="form-control form-alt" placeholder="Enter Set Name" autocomplete="off">
                                        <input type="submit" name="generate" id="generate" class="btn btn-success-alt btn-sm" value ="Generate" style="border-radius: 0px 20px 20px 0px">
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <br>
                                <?php if(!empty($item) && !empty($set) || !empty($set) && empty($item) || !empty($item) && empty($set)){ ?>
                                <a href="<?php echo base_url(); ?>report/inv_rep_itm_print/<?php echo urlencode($item); ?>/<?php echo $set; ?>" class="btn btn-info-alt btn-sm pull-right"><span class="fa fa-print"></span>Print</a>
                                <?php } else { ?>
                                <a href="<?php echo base_url(); ?>report/inv_rep_itm_print/" class="btn btn-info-alt btn-sm pull-right"><span class="fa fa-print"></span>Print</a>
                                <?php } ?>
                            </div>
                        </div>
                        <br>
                        <?php if(!empty($filt)){?>     
                            <div class='animated headShake alert with-close alert-success fade show p-10'><span class='btn btn-success-alt btn-sm'>Filter Applied</span><?php echo $filt ?>, <a href='<?php echo base_url(); ?>report/inv_rep_itm' class='alert-link pull-right btn p-t-0'><span class="fa fa-times"></span></a>
                            </div>                    
                        <?php } ?>


                        <?php if(!empty($itema)){ ?>
                        <table class="table table-borderless table-striped table-earning " id="myTable_peremp">
                            <thead>
                                <tr>
                                    <?php if(empty($item) && empty($set) || $set=='null' || $item!='null' && $set!='null'){ ?>
                                    <th>Item Name</th>
                                    <th>Set Name</th>
                                    <th align="center">Available</th>
                                    <th align="center">In-Use</th>
                                    <?php } else { ?>
                                    <th>Set Name</th>
                                    <th align="center">Set Count</th>
                                    <?php } ?>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php foreach($itema AS $i){ ?>
                                <tr>
                                    <?php if(empty($item) && empty($set) || $set=='null' || $item!='null' && $set!='null'){ ?>
                                    <td> 
                                        <a href="<?php echo base_url(); ?>report/inv_report_itm/<?php echo $i['item_id'];?>/<?php echo $i['set_id'];?>" class="" style="white-space: normal!important;text-align: left" data-toggle="tooltip" data-placement="left" title="View">
                                           <?php echo $i['item']; ?>
                                        </a>           
                                    </td>
                                    <td><?php echo $i['set']; ?></td>
                                    <td align="center"><?php echo $i['avcount']; ?></td>
                                    <td align="center"><?php echo $i['incount']; ?></td>
                                    <?php } else { ?>
                                    <td><?php echo $i['set']; ?></td>
                                    <td align="center"><?php echo $i['count']; ?></td>
                                    <?php } ?>
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


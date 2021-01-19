<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/encode.js"></script>

<div class="page-wrapper">
    <div class="container-fluid ">
        <div class="row page-titles">
            <div class="col-md-3 align-self-center"></div>
            <div class="col-md-6 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                    </ol>
                </div>
            </div>
            <div class="col-md-2 align-self-center text-right"></div>
        </div>

       <div class="row">
            <div class="col-lg-12 ">
                <div class="card bor-radius shadow ">
                     <div class="card-header bg-white">
                        <a href="" onclick="closeWindow()" class="btn btn-default-alt"><span class="fa fa-arrow-left"></span></a>
                        <center>
                                <table class= "">
                                    <tr>
                                        <td align="center"><h5><?php echo $item ?></h5></td>
                                        <td><h5 class="m-l-5 m-r-20">-</h5></td>
                                        <td align="center"><h5><?php echo $brand ?></h5></td>
                                        <td><h5 class="m-l-5 m-r-20">-</h5></td>
                                        <td align="center"><h5><?php echo $model ?></h5></td>
                                        <td><h5 class="m-l-5 m-r-20">-</h5></td>
                                        <td align="center"><h5><?php echo $sn ?></h5></td>
                                        <td><h5 class="m-l-5 m-r-20"></h5></td>
                                    </tr>
                                    <tr>
                                        <td style="border-top:1px solid #d7d7d7"><center><small>Item Description</small></center></td>
                                        <td></td>
                                        <td style="border-top:1px solid #d7d7d7"><center><small>Brand</small></center></td>
                                        <td></td>
                                        <td style="border-top:1px solid #d7d7d7"><center><small>Model</small></center></td>
                                        <td></td>
                                        <td style="border-top:1px solid #d7d7d7"><center><small>Serial Number</small></center></td>
                                    </tr>
                                    <?php if($damage == '1'){ ?>
                                    <tr>
                                        <td colspan="7"><button class="btn btn-danger btn-block btn-lg animated headShake">DAMAGED</button></td>
                                    </tr>
                                    <?php }else if($ids==0 && $changeloc==0){ ?>
                                    <tr>
                                        <td colspan="7"><button class="btn btn-success btn-block btn-lg animated headShake">Available</button></td>
                                    </tr>
                                    <?php } else if($borrowed=='1'){ ?>
                                    <tr>
                                        <td colspan="7"><button class="btn btn-warning btn-block btn-lg animated headShake text-white">Borrowed</button></td>
                                    </tr>   
                                    <?php } else if($ids==0 && $changeloc=='1'){ ?>
                                    <tr>
                                        <td colspan="7"><button class="btn btn-info btn-block btn-lg animated headShake text-white">Moved to <?php echo $location; ?></button></td>
                                    </tr> 
                                    <?php } else if($lost=='1'){ ?>
                                    <tr>
                                        <td colspan="7"><button class="btn btn-secondary btn-block btn-lg animated headShake text-white">Lost Item</button></td>
                                    </tr> 
                                    <?php }else { echo ''; } ?>
                                </table>

                            </center>
                    </div>
                    <div class="m-t-10 m-b-10 m-r-10 m-l-10">
                        <div>
                            
                        </div>
                        
                        <div class="card m-l-10 m-r-10 p-r-5 p-l-5 p-b-5 p-t-5 bg-flat-color-1-fade ">
                            <h4 class="text-dark m-r-10 m-l-10 m-t-10 m-b-10">CURRENT</h4>
                            <table class="table table-bordered table-striped table-earning">
                                <thead class="btn-dark">
                                    <tr>
                                        <td width="70%">Employee Name</td>
                                        <td align="right">Date Issued</td>
                                        <td width="10%" align="center">Qty</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($current AS $cur){ ?>
                                    <?php if($damage == '0' && $cur['id']!=0){ ?>
                                    <tr>
                                        <td><?php echo $cur['employee']; ?></td>
                                        <td align="right"><?php echo $cur['date_issued']; ?></td>
                                        <td align="right">
                                            <label class="btn btn-info btn-sm bor-radius btn-block">
                                                <center><span class="badge bg-white text-dark badge-pill"><h5><?php echo $cur['qty']; ?></h5></span></center>
                                            </label>
                                        </td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card m-l-10 m-r-10 p-r-5 p-l-5 p-b-5 p-t-5 bg-flat-color-5-fade ">
                            <h4 class="text-dark m-r-10 m-l-10 m-t-10 m-b-10">RETURNED</h4>
                            <table class="table table-bordered table-striped table-earning">
                                <thead class="btn-dark">
                                    <tr>
                                        <td width="40%">Employee Name</td>   
                                        <td align="right">Return Date</td>                                         
                                        <td width="35%">Received By</td>
                                        <td width="10%" align="center">Qty</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($head AS $ret){ 
                                    ?>
                                    <tr>
                                        <td><?php echo $ret['employee']; ?></td>
                                        <td align="right"><?php echo $ret['return_date']; ?></td>
                                        <td><?php echo $ret['received']; ?></td>
                                        <td align="right">
                                            <label class="btn btn-success btn-sm bor-radius btn-block">
                                                <span class="badge bg-white text-dark badge-pill"><h5><?php echo $ret['qty']; ?></h5></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <?php  }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="card m-l-10 m-r-10 p-r-5 p-l-5 p-b-5 p-t-5 bg-flat-color-3-fade ">
                            <h4 class="text-dark m-r-10 m-l-10 m-t-10 m-b-10">BORROWED</h4>
                            <table class="table table-bordered table-striped table-earning">
                                <thead class="btn-dark">
                                    <tr>
                                        <td width="40%">Employee Name</td>
                                        <td >Borrowed Date</td>
                                        <td >Returned By</td>
                                        <td >Returned Date</td>
                                        <td width="10%" align="center">Qty</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($borrow AS $to){ ?>
                                    <tr>
                                        <td><?php echo $to['borrowed_by']; ?></td>
                                        <td align="right"><?php echo $to['borrowed_date']; ?></td>
                                        <td><?php echo $to['returned_by']; ?></td>
                                        <td><?php echo date("Y-m-d",strtotime($to['return_date'])); ?></td>
                                        <td align="right">
                                            <label class="btn btn-warning btn-sm bor-radius btn-block">
                                                <span class="badge bg-white text-dark badge-pill"><h5><?php echo $to['qty']; ?></h5></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="card m-l-10 m-r-10 p-r-5 p-l-5 p-b-5 p-t-5 bg-flat-color-4-fade ">
                            <h4 class="text-dark m-r-10 m-l-10 m-t-10 m-b-10">REPAIRED</h4>
                            <table class="table table-bordered table-striped table-earning">
                                <thead class="btn-dark">
                                    <tr>
                                        <td width="">JO No.</td>
                                        <td width="">Repair Price</td>
                                        <td width="">Supplier</td>
                                        <td width="">Received By</td>
                                        <td align = "right">Repair Date</td>
                                        <td width="" align="center">Qty</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($repair AS $to){ ?>
                                    <tr>
                                        <td><?php echo $to['jo_no']; ?></td>
                                        <td><?php echo $to['repair_price']; ?></td>
                                        <td><?php echo $to['supplier']; ?></td>
                                        <td><?php echo $to['receive_by']; ?></td>
                                        <td align="right"><?php echo $to['repair_date']; ?></td>
                                        <td align="right">
                                            <label class="btn btn-warning btn-sm bor-radius btn-block">
                                                <span class="badge bg-white text-dark badge-pill"><h5><?php echo $to['qty']; ?></h5></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="card m-l-10 m-r-10 p-r-5 p-l-5 p-b-5 p-t-5" style = "background-color:#5a6268">
                            <h4 class="text-dark m-r-10 m-l-10 m-t-10 m-b-10" style = "color:white!important">LOST ITEM</h4>
                            <table class="table table-bordered table-striped table-earning">
                                <thead class="btn-dark">
                                    <tr>
                                        <td>Date Lost</td>
                                        <td>Item</td>
                                        <td>Replacement Item</td>
                                        <td>Accountable Person</td>
                                        <td>Remarks</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($losts)){ foreach($losts AS $l){ ?>
                                    <tr>
                                        <td><?php echo $l['lost_date']; ?></td>
                                        <td><?php echo $l['item']; ?></td>
                                        <td><?php echo $l['replacement']; ?></td>
                                        <td><?php echo $l['employee']; ?></td>
                                        <td align="right"><?php echo $l['remarks']; ?></td>
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
</div>





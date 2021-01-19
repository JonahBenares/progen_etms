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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>report/report_main_emp">Equipment / Tools Per Employee</a></li>
                        <li class="breadcrumb-item"><a onclick="history.go(-1);">Current Items</a></li>
                        <li class="breadcrumb-item active">Return Report</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body"> 
                        <h4 class="card-title">
                            <a onclick="history.go(-1);" class="btn ">
                                <span class="fa fa-arrow-left"></span>
                            </a>
                            <b><?php echo $fullname; ?> RETURN REPORT</b>
                        </h4>
                        <table class="table dataTable table-striped">
                            <thead>
                                <tr>
                                    <th width="15%">Return Date</th>
                                    <th width="20%">ARS #</th>
                                    <th width="10%">Quantity</th>
                                    <th width="15%">Received By</th>
                                    <th width="30%">Remarks</th>
                                    <th width="10%" class="text-center"><span class="fa fa-bars"></span></th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                                    foreach($info AS $i){ 
                                ?>
                                <tr>                                    
                                    <td style="padding: 0px" colspan="5">
                                        <button class="accordion1" style="padding: 0px 0px">
                                            <p class="m-b-0" style="color:#44474e">
                                                <table style="background: none" width="100%">
                                                    <tr style="background: none">
                                                        <td width="15%"><?php echo $i['ars_no']; ?></td>
                                                        <td width="20%"><?php echo $i['return_date']; ?></td>
                                                        <td width="10%"><?php echo $i['quantity']; ?></td>
                                                        <td width="15%"><?php echo $i['receive_by']; ?></td>
                                                        <td width="30%"><?php echo $i['remarks']; ?></td>
                                                    </tr>
                                                </table>
                                            </p>
                                        </button>
                                        <div class="panel1">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td width="60%">Item Desc:</td>
                                                        <td width="30%">S/N</td>
                                                        <td width="10%">Cost</td>
                                                    </tr>
                                                </thead>
                                                <?php 
                                                    foreach($details AS $det){ 
                                                        switch($det){
                                                            case($i['return_id'] == $det['return_id']):
                                                ?>
                                                <tr>
                                                    <td><?php echo $det['item'];?></td>
                                                    <td><?php echo $det['serial'];?></td>
                                                    <td><?php echo $det['price'];?></td>
                                                </tr>
                                                <?php 
                                                        break;
                                                        default: 
                                                        } 
                                                    } 
                                                ?>
                                            </table>
                                        </div>
                                    </td>                                    
                                    
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo base_url(); ?>report/acf_report/<?php echo $i['return_id']?>" class="btn btn-warning-alt text-white pull-right btn-xs">
                                                <span class="fa fa-print"></span> ACF
                                            </a>
                                            <a href="<?php echo base_url(); ?>report/ars_report/<?php echo $i['return_id']?>" class="btn btn-success-alt item btn-xs" data-toggle="tooltip" data-placement="top" title="Print Return Slip">
                                                <i class="fa fa-print"></i>
                                            </a>                                               
                                        </div>                                           
                                    </td>
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


<script type="text/javascript">
    function toggle_multi(source) {
      checkboxes_multi = document.getElementsByClassName('multi');
      for(var i=0, n=checkboxes_multi.length;i<n;i++) {
        checkboxes_multi[i].checked = source.checked;
      }
    }
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>


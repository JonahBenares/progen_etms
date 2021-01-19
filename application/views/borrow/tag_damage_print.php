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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>borrow/borrow_list/">Borrow</a></li>
                        <li class="breadcrumb-item active">Damage Equipment/Tools List</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Damage Equipment/Tools</h4>
                        <form action="<?php echo base_url(); ?>report/insert_transfer" method="POST">                            
                            <table class="table table-borderless table-striped table-earning table-hover" id="myTable_peret">
                                <thead>       
                                    <th>Asset Control Number</th>
                                    <th>Item Name</th>
                                    <th>Serial No.</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Type</th>
                                    <th><center><span class="fa fa-bars"></span></center></th>
                                </thead>
                                <?php 
                                    foreach($head AS $h){  
                                        foreach($details AS $det){     
                                            switch($det){
                                                case($h['et_id'] == $det['et_id']):
                                ?>
                                <tr>       
                                    <td><?php echo $det['acn'];?></td>
                                    <td><?php echo $det['item'];?></td>
                                    <td><?php echo $det['serial'];?></td>
                                    <td><?php echo $det['brand'];?></td>
                                    <td><?php echo $det['model'];?></td>
                                    <td><?php echo $det['type'];?></td>
                                    <td><center><a href="<?php echo base_url(); ?>report/damage_report/<?php echo $det['damage_id']?>" class="btn btn-info-alt item btn-xs"  data-toggle="tooltip" data-placement="top" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a></center></td>
                                </tr>
                                <?php   
                                    break;
                                    default: 
                                    } } }
                                ?>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


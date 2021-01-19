<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/encode.js"></script>
<link  href="<?php echo base_url(); ?>assets/dist/css/history.css" rel="stylesheet">

<div class="page-wrapper">
    <div class="container-fluid p-b-0" >
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
        <center>
            <div class="card card-hist m-b-0">
                <div id="card-over">                    
                    <div class="card-header" style="background: none; " >
                        <div style="position: absolute;right:20px">
                           
                            <?php if($damage == '1'){ ?>
                                <button class="btn btn-danger-alt btn-block btn-sm animated headShake bor-radius20">Damaged</button>
                            <?php }else if($ids==0 && $changeloc==0){ ?>
                                <button class="btn btn-success-alt btn-block btn-sm animated headShake bor-radius20">Available</button>
                            <?php } else if($borrowed=='1'){ ?>
                                <button class="btn btn-warning-alt btn-block btn-sm animated headShake text-white bor-radius20">Borrowed</button>
                            <?php } else if($ids==0 && $changeloc=='1'){ ?>
                                <button class="btn btn-info-alt btn-block btn-sm animated headShake text-white bor-radius20">Moved to <?php echo $location; ?></button>
                            <?php } else if($lost=='1'){ ?>
                                <button class="btn btn-secondary-alt btn-block btn-sm animated headShake text-white bor-radius20">Lost Item</button>
                            <?php }else { echo ''; } ?>
                        </div>

                        <div style="padding:50px 25px 0px 100px ">
                            <h4 style="font-weight: 450;position: absolute;padding-right: 70px"><?php echo $item ?></h4>  
                        </div>
                    </div>
                    <div class="card-body animated fadeIn">    
                        <div style="padding:80px 25px 25px 100px ">
                            <p style="font-weight: 500;font-size: 13px">Brand: <span style="font-weight: 600"><?php echo $brand ?></span></p>
                            <p style="font-weight: 500;font-size: 13px">Model: <span style="font-weight: 600"><?php echo $model ?></span></p>
                            <p style="font-weight: 500;font-size: 13px">Serial Number: <span style="font-weight: 600"><?php echo $sn ?></span></p> 
                            <hr>   
                            <center><p>Current Accountability</p></center>
                            <?php foreach($history AS $hist){ ?>
                            <?php if($hist['method'] == 'Current') {  ?>
                            <p style="font-weight: 500;font-size: 13px">Employee Name: <span style="font-weight: 600"><?php echo $hist['employee']; ?></span></p>
                            <p style="font-weight: 500;font-size: 13px">Date Issued: <span style="font-weight: 600"><?php echo (!empty($hist['trdate']) ? date('F d, Y', strtotime($hist['trdate'])) : ""); ?></span></p> 
                            <?php } ?>
                        </div>               
                        <div class="img-item animated fadeInLeft" >
                            <?php if(empty($hist['picture'])){ ?>
                                <img src="<?php echo base_url(); ?>assets/images/placeholder2.jpg" width="100%" style="border-radius: 20px">
                            <?php } else { ?>
                                <img src="<?php echo base_url(); ?>uploads/<?php echo $hist['picture'];?>" width="100%" style="border-radius: 20px;height: 100%">
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            
        </center>

        <ul class="timeline m-t-0">

        <?php 
        function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
            $sort_col = array();
            foreach ($arr as $key=> $row) {
                $sort_col[$key] = $row[$col];
            }

            array_multisort($sort_col, $dir, $arr);
        }
        array_sort_by_column($history, 'trdate');
        $direction = array('direction-r', 'direction-l');
        $count_dir=0;
       foreach($history AS $his){
            
            if($count_dir==2){
                $count_dir=0;
            }

            if($count_dir<2){
                $dir = $direction[$count_dir];
                $count_dir++;
            } 


            if($his['method']=='Current'){
                $bg = 'bg-info-alt';
                $border = "border-info";
            } else 
            if($his['method'] == 'Repaired'){
                $bg = 'bg-danger-alt';
                $border = "border-danger";
            } else if($his['method'] == 'Borrowed'){
                $bg = 'bg-warning-alt';
                $border = "border-warning";
            } else if($his['method'] == 'Returned'){
                $bg = 'bg-success-alt';
                $border = "border-success";
            } else if($his['method'] == 'Lost'){
                $bg = 'bg-dark-alt';
                $border = "border-dark";
            }
           
           ?>
                <li>
                <div class="<?php echo $dir; ?>">
                <div class="flag-wrapper">
                <span class="hexa"></span>
                <span class="flag"><?php echo $his['method']; ?></span>
                <span class="time-wrapper">
                    <span class="time <?php echo $bg; ?>"><?php echo (!empty($his['trdate']) ? date('F d, Y', strtotime($his['trdate'])) : ""); ?></span>
                </span>
                </div>
                <div class="desc shadow-sn <?php echo $border; ?>">
                <?php if($his['method'] == 'Current') {  ?>
                    <p class="font-bold">Employee Name: </p>
                    <p class="m-b-10"><?php echo $his['employee']; ?></p>
                    <p class="font-bold">Date Issued:</p>
                    <p class="m-b-10"><?php echo (!empty($his['trdate']) ? date('F d, Y', strtotime($his['trdate'])) : ""); ?></p>
                <?php }else if($his['method'] == 'Returned'){  ?>
                    <p class="font-bold">Employee Name:</p>
                    <p class="m-b-10"><?php echo $his['employee']; ?></p>
                    <p class="font-bold">Return Date:</p>
                    <p class="m-b-10"><?php echo (!empty($his['trdate']) ? date('F d, Y', strtotime($his['trdate'])) : ""); ?></p>
                    <p class="font-bold">Received By:</p>
                    <p class="m-b-10"><?php echo $his['received_by']; ?></p>
                    <p class="font-bold">Remarks:</p>
                    <p class="m-b-10"><?php echo $his['remarks']; ?></p>
                <?php } else if($his['method'] == 'Borrowed'){ ?>
                    <p class="font-bold">Employee Name:</p>
                    <p class="m-b-10"><?php echo $his['employee']; ?></p>
                    <p class="font-bold">Borrow Date:</p>
                    <p class="m-b-10"><?php echo (!empty($his['trdate']) ? date('F d, Y', strtotime($his['trdate'])) : ""); ?></p>
                    <p class="font-bold">Returned By:</p>
                    <p class="m-b-10"><?php echo $his['returned_by']; ?></p>
                    <p class="font-bold">Return Date:</p>
                    <p class="m-b-10"><?php echo (!empty($his['returned_date']) ? date('F d, Y', strtotime($his['returned_date'])) : ""); ?></p>
                <?php } else if($his['method'] == 'Repaired'){ ?>
                    <p class="font-bold">Repair Date:</p>
                    <p class="m-b-10"><?php echo (!empty($his['trdate']) ? date('F d, Y', strtotime($his['trdate'])) : ""); ?></p>
                    <p class="font-bold">JO No.:</p>
                    <p class="m-b-10"><?php echo $his['jo_no']; ?></p>
                    <p class="font-bold">Repair Price:</p>
                    <p class="m-b-10"><?php echo number_format($his['repair_price'],2); ?></p>
                    <p class="font-bold">Supplier:</p>
                    <p class="m-b-10"><?php echo $his['supplier']; ?></p>
                    <p class="font-bold">Received By :</p>
                    <p class="m-b-10"><?php echo $his['received_by']; ?></p>
                <?php }  else if($his['method'] == 'Lost'){ ?>
                    <p class="font-bold">Date Lost:</p>
                    <p class="m-b-10"><?php echo (!empty($his['trdate']) ? date('F d, Y', strtotime($his['trdate'])) : ""); ?></p>
                    <p class="font-bold">Replacement Item:</p>
                    <p class="m-b-10"><?php echo $his['replacement']; ?></p>
                    <p class="font-bold">Accountable Person:</p>
                    <p class="m-b-10"><?php echo $his['employee']; ?></p>
                    <p class="font-bold">Remarks:</p>
                    <p class="m-b-10"><?php echo $his['remarks']; ?></p>
                <?php } ?>
                </div>
                </div>
                </li>

        
       <?php 
        } ?>
        </ul>
    </div>
</div>





<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/encode.js"></script>
<link  href="<?php echo base_url(); ?>assets/dist/css/history.css" rel="stylesheet">

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
        <center>
            <div class="card shadow-sn m-l-150 m-r-150">
                <div class="card-body">
                    <div class="col-lg-8">
                        <h3><?php echo $item ?></h3>
                    </div>
                    <div class="col-lg-4"></div>
                    
                    <br>
                    <table class= "">
                        <tr>
                            <td align="center"><h4><?php echo $brand ?></h4></td>
                            <td><h4 class="m-l-5 m-r-20">-</h4></td>
                            <td align="center"><h4><?php echo $model ?></h4></td>
                            <td><h4 class="m-l-5 m-r-20">-</h4></td>
                            <td align="center"><h4><?php echo $sn ?></h4></td>
                            <td><h4 class="m-l-5 m-r-20"></h4></td>
                        </tr>
                        <tr>
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
                </div>
            </div>
        </center>

        <ul class="timeline">

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
            } else if($his['method'] == 'Repaired'){
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
                <span class="time-wrapper"><span class="time <?php echo $bg; ?>"><?php echo (!empty($his['trdate']) ? date('M Y', strtotime($his['trdate'])) : ""); ?></span></span>
                </div>
                <div class="desc shadow-sn <?php echo $border; ?>">
                  <?php if($his['method'] == 'Current') {  ?>
                    <p class="font-bold">Employee Name: </p>
                    <p class="m-b-10"><?php echo $his['employee']; ?></p>
                    <p class="font-bold">Date Issued:</p>
                    <p class="m-b-10"><?php echo (!empty($his['trdate']) ? date('M Y', strtotime($his['trdate'])) : ""); ?></p>
                <?php } else if($his['method'] == 'Returned'){  ?>
                    <p class="font-bold">Employee Name:</p>
                    <p class="m-b-10"><?php echo $his['employee']; ?></p>
                    <p class="font-bold">Return Date:</p>
                    <p class="m-b-10"><?php echo (!empty($his['trdate']) ? date('M Y', strtotime($his['trdate'])) : ""); ?></p>
                    <p class="font-bold">Received By:</p>
                    <p class="m-b-10"><?php echo $his['received_by']; ?></p>
                    <p class="font-bold">Remarks:</p>
                    <p class="m-b-10"><?php echo $his['remarks']; ?></p>
                <?php } else if($his['method'] == 'Borrowed'){ ?>
                    <p class="font-bold">Employee Name:</p>
                    <p class="m-b-10"><?php echo $his['employee']; ?></p>
                    <p class="font-bold">Borrow Date:</p>
                    <p class="m-b-10"><?php echo (!empty($his['trdate']) ? date('M Y', strtotime($his['trdate'])) : ""); ?></p>
                    <p class="font-bold">Returned By:</p>
                    <p class="m-b-10"><?php echo $his['returned_by']; ?></p>
                    <p class="font-bold">Return Date:</p>
                    <p class="m-b-10"><?php echo (!empty($his['returned_date']) ? date('M Y', strtotime($his['returned_date'])) : ""); ?></p>
                <?php } else if($his['method'] == 'Repaired'){ ?>
                    <p class="font-bold">Repair Date:</p>
                    <p class="m-b-10"><?php echo (!empty($his['trdate']) ? date('M Y', strtotime($his['trdate'])) : ""); ?></p>
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
                    <p class="m-b-10"><?php echo (!empty($his['trdate']) ? date('M Y', strtotime($his['trdate'])) : ""); ?></p>
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





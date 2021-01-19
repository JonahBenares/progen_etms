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
            <div class="col-lg-3 col-md-12" style="position: fixed;">
                <?php foreach($view AS $v){ ?>
                    <div class="card bor-radius5 shadow-sv animated fadeInLeft" style="min-height: 450px;">
                        <div class="card-header cheader-bor p-l-10 <?php if($damage == '1'){ ?> bg-danger-alt <?php } else { ?> bg-primary-alt <?php }?>" style="">
                            <button onclick="history.go(-1);" class="btn btn-white btn-sm"><span class="fa fa-chevron-left"></span></button>
                            <?php if($damage == '1'){ ?>
                                <button class="btn btn-danger btn-sm animated headShake infinite shadow-sv"><b>Damaged</b></button>
                            <?php } ?>
                            <h4 class="pull-right m-b-0"><strong><?php echo $v['qty'];?></strong> <?php echo $v['unit'];?></h4>
                        </div>
                        <div class="card-body ">
                            <h4 class="font-medium capitalize"><?php echo $v['et_desc'];?></h4>   
                            <div class="m-t-20"></div>
                            <hr class="m-b-5">
                            <p class="m-b-0">Category:</p>
                            <p class="m-b-20 font-medium"><?php echo $v['category'];?></p>
                            <p class="m-b-0">Sub-Category:</p>
                            <p class="m-b-20 font-medium"><?php echo $v['subcat'];?></p>
                            <p class="m-b-0">Accountability:</p>
                            <p class="m-b-20 font-medium"><?php echo $v['accountability'];?></p>
                            <p class="m-b-0">Department /Location: </p>
                            <p class="m-b-20 font-medium"><?php echo $v['department'];?></p>
                        </div>
                        <div class="card-footer "><center><span class="fa fa-ellipsis-h"></span></center></div>
                    </div>
                <?php } ?> 
            </div>
            <div class="col-lg-9 col-md-12 offset-lg-3 p-l-40">
                <?php if(!empty($details)){ foreach($details AS $det){ ?>
                    <div class="card bor-radius5 shadow-sv animated fadeInUp" > 
                        <div class="card-header cheader-bor <?php if($damage == '1'){ ?> bg-danger-alt <?php } else { ?> bg-primary-alt <?php }?>">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="row">
                                        <label>Acquisition Date:
                                            <p class="font-medium font-13"><?php echo $det['acquisition_date'];?></p>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <label>Date Issued:
                                            <p class="font-medium font-13"><?php echo $det['date_issued'];?></p>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <label>Asset Control #:
                                            <p class="font-medium font-13"><?php echo $det['asset_control_no'];?></p>
                                        </label>
                                    </div>  
                                </div>
                                <div class="col-lg-4">
                                    <div class="row">
                                        <label>Brand:
                                            <p class="font-medium font-13"><?php echo $det['brand'];?></p>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <label>Model:
                                            <p class="font-medium font-13"><?php echo $det['model'];?></p>
                                        </label>
                                    </div>
                                
                                    <div class="row">
                                        <label>Type:
                                            <p class="font-medium font-13"><?php echo $det['type'];?></p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4"> 
                                    <div class="row">
                                        <label>Serial Number:
                                            <p class="font-medium font-13"><?php echo $det['serial_no'];?></p>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <label>Unit Price:
                                            <p class="font-medium font-13"><?php if($det['set_id']==0){ echo $det['unit_price']."<small> ".$det['currency']."</small>"; }?></p>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <label>Supplier:
                                            <p class="font-medium font-13"><?php echo $det['acquired_by'];?></p>
                                        </label>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <label>Remarks:
                                            <p class="font-medium font-13"><?php echo $det['remarks'];?></p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-4 float-col">
                                    <label>Picture 1:</label>
                                   
                                    <div class="thumbnail">
                                        <img id="" class="pictures" src="<?php echo (empty($det['picture1']) ? base_url().'assets/default/default-img.jpg' : base_url().'uploads/'.$det['picture1']); ?>" alt="your image" />
                                    </div>
                                </div> 
                                <div class="col-lg-4 float-col">
                                    <label for="pic1">Picture 2:</label>
                                    
                                    <div class="thumbnail">
                                        <img id="" class="pictures" src="<?php echo (empty($det['picture2']) ? base_url().'assets/default/default-img.jpg' : base_url().'uploads/'.$det['picture2']); ?>" alt="your image" />
                                    </div>
                                </div>
                                <div class="col-lg-4 float-col">
                                    <label for="pic1">Picture 3:</label>
                                    
                                    <div class="thumbnail">
                                        <img id="" class="pictures" src="<?php echo (empty($det['picture3']) ? base_url().'assets/default/default-img.jpg' : base_url().'uploads/'.$det['picture3']); ?>" alt="your image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } } ?>
            </div>                
        </div>
    </div>
</div>



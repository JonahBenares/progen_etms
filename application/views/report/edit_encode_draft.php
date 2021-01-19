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
        <form action="<?php echo base_url(); ?>report/update_encode" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-3 col-md-12" style="position: fixed;">
                    <?php foreach($head AS $h){ ?>  
                        <div class="card bor-radius5 shadow-sv animated fadeInLeft" style="min-height: 450px;">
                            <div class="card-header cheader-bor bg-primary-alt" style="">
                                <h4 class="pull-right m-b-0"><strong><?php echo $qty;?></strong> <?php echo $h['unit']?></h4>
                            </div>
                            <div class="card-body ">
                                <h4 class="font-medium "><?php echo $h['item']?>
                                    <input type="hidden" name="item_name" value = "<?php echo $h['item']?>">
                                </h4>  
                                <div class="m-t-20"></div>
                                <hr class="m-b-5">
                                <p class="m-b-0">Category: </p>
                                <p class="m-b-20 font-medium"><?php echo $h['cat'];?></p>
                                <p class="m-b-0">Sub-Category: </p>
                                <p class="m-b-20 font-medium"><?php echo $h['subcat'];?></p>
                                <p class="m-b-0">Accountability: </p>
                                <p class="m-b-20 font-medium"><?php echo $h['accountability'];?></p>
                                <p class="m-b-0">Department /Location: </p>
                                <p class="m-b-20 font-medium"><?php echo $h['department'];?></p>
                            </div>
                            <div class="card-footer "><center><span class="fa fa-ellipsis-h"></span></center></div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-9 col-md-12 offset-lg-3 p-l-40">
                    <?php 
                        $count = 1; 
                        $asset = $asset_no;
                        $x = 1;
                        if(!empty($details)){
                        foreach($details AS $d){  
                    ?>
                    <div class="card bor-radius5 shadow-sv animated fadeInUp" > <!-- style="border:2px solid #e5a255" -->
                        <div class="card-header cheader-bor bg-primary-alt">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <input name="acq_date[]" type="date" class="form-control form-alt  cc-exp" value="<?php echo $d['date'];?>">
                                        <label for="" class="control-label mb-1">Acquisition Date:</label>
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <input name="date_issued[]"  class="form-control form-alt  cc-cvc" type="date" value="<?php echo $d['date_issued'];?>">
                                        <label for="" class="control-label mb-1">Date Issued:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group m-b-10">
                                        <input name="acn[]" type="text" class="form-control form-alt  cc-exp" value = "<?php echo ($d['asset_control_no']) ? $d['asset_control_no'] : $prefix."-".$location."-".$asset;?>" style = "pointer-events:none;" readonly>
                                        <label for="" class="control-label mb-1">Asset Control Number:</label>
                                    </div>
                                </div>     
                                <div class="col-lg-6">
                                    <div class="form-group m-b-10">
                                        <?php if(!empty($d['serial'])){ ?>
                                        <input name="sn[]" type="text" class="form-control form-alt  cc-exp" value="<?php echo $d['serial'];?>">
                                        <?php } else { ?>
                                        <input name="sn[]" type="text" class="form-control form-alt  cc-exp" value="">
                                        <?php } ?>
                                        <label for="" class="control-label mb-1">Serial Number:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                                 
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <?php if(!empty($d['brand'])){ ?>
                                        <input id="" name="brand[]"  value = "<?php echo $d['brand'];?>" type="text" class="form-control form-alt cc-exp" >
                                        <?php }else { ?>
                                        <input id="" name="brand[]" type="text" class="form-control form-alt cc-exp" >
                                        <?php } ?>
                                        <label for="" class="control-label mb-1">Brand:</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <?php if(!empty($d['model'])){ ?>
                                        <input id="" name="model[]"  value = "<?php echo $d['model'];?>" class="form-control form-alt cc-cvc" type="text">
                                        <?php } else {?>
                                        <input id="" name="model[]" class="form-control form-alt cc-cvc" type="text">
                                        <?php } ?>
                                        <label for="" class="control-label mb-1">Model:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                                 
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <?php if(!empty($d['type'])){ ?>
                                        <input id="" name="type[]"  value = "<?php echo $d['type'];?>" type="text" class="form-control form-alt cc-exp" >
                                        <?php }else { ?>
                                        <input id="" name="type[]" type="text" class="form-control form-alt cc-exp" > 
                                        <?php }?>
                                        <label for="" class="control-label mb-1">Type:</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group m-b-10">
                                        <?php if($d['price']!='0.00'){ ?>
                                        <input id="" name="price[]"  value = "<?php if($d['price'] == '0.00'){ echo ''; } else { echo $d['price']; }?>" class="form-control form-alt cc-cvc" type="text" autocomplete="off">
                                        <?php } else { ?>
                                        <input id="" name="price[]" class="form-control form-alt cc-cvc" type="text" autocomplete="off">
                                        <?php } ?>
                                        <label for="" class="control-label mb-1">Unit Price:</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group m-b-10">
                                        <?php if($d['currency']!=0){ ?>
                                        <select name="cur[]" class="form-control form-alt cc-cvc">
                                            <option value = "">--Select Currency--</option>
                                            <?php foreach($currency AS $c){ ?>
                                            <option value = "<?php echo $c->currency_id; ?>" <?php echo (($d['currency'] == $c->currency_id) ? ' selected' : '');?>><?php echo $c->currency_name;?></option>
                                            <?php } ?>
                                        </select>
                                        <?php } else { ?>
                                        <select name="cur[]" class="form-control form-alt cc-cvc">
                                            <option value = "">--Select Currency--</option>
                                            <?php foreach($currency AS $c){ ?>
                                            <option value = "<?php echo $c->currency_id; ?>"><?php echo $c->currency_name;?></option>
                                            <?php } ?>
                                        </select>
                                        <?php } ?>
                                        <label for="" class="control-label mb-1">Currency:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <?php if($d['placement']!=0){ ?>
                                        <select name="placement[]" class="form-control form-alt cc-cvc">
                                            <option value = "">--Select Placement--</option>
                                            <?php foreach($placement AS $ca){ ?>
                                            <option value = "<?php echo $ca->placement_id; ?>" <?php echo (($d['placement'] == $ca->placement_id) ? ' selected' : '');?>><?php echo $ca->placement_name;?></option>
                                            <?php } ?>
                                        </select>
                                        <?php } else { ?>
                                        <select name="placement[]" class="form-control form-alt cc-cvc">
                                            <option value = "">--Select Placement--</option>
                                            <?php foreach($placement AS $ca){ ?>
                                            <option value = "<?php echo $ca->placement_id; ?>"><?php echo $ca->placement_name;?></option>
                                            <?php } ?>
                                        </select>
                                        <?php } ?>
                                        <label for="" class="control-label mb-1">Placement:</label>
                                    </div>
                                </div>                                                
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <?php if($d['company']!=0){ ?>
                                        <select name="company[]" class="form-control form-alt cc-cvc">
                                            <option value = "">--Select Company--</option>
                                            <?php foreach($company AS $c){ ?>
                                            <option value = "<?php echo $c->company_id; ?>" <?php echo (($d['company'] == $c->company_id) ? ' selected' : '');?>><?php echo $c->company_name;?></option>
                                            <?php } ?>
                                        </select>
                                        <?php } else { ?>
                                        <select name="company[]" class="form-control form-alt cc-cvc">
                                            <option value = "">--Select Company--</option>
                                            <?php foreach($company AS $c){ ?>
                                            <option value = "<?php echo $c->company_id; ?>"><?php echo $c->company_name;?></option>
                                            <?php } ?>
                                        </select>
                                        <?php } ?>
                                        <label for="" class="control-label mb-1">Company:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class = "col-6">
                                    <div class="form-group m-b-10">
                                        <?php if($d['rack_id']!=0){ ?>
                                        <select name="rack[]" class="form-control form-alt cc-cvc">
                                            <option value = "">--Select Rack--</option>
                                            <?php foreach($rack AS $c){ ?>
                                            <option value = "<?php echo $c->rack_id; ?>" <?php echo (($d['rack_id'] == $c->rack_id) ? ' selected' : '');?>><?php echo $c->rack_name;?></option>
                                            <?php } ?>
                                        </select>
                                        <?php } else { ?>
                                        <select name="rack[]" class="form-control form-alt cc-cvc">
                                            <option value = "">--Select Rack--</option>
                                            <?php foreach($rack AS $c){ ?>
                                            <option value = "<?php echo $c->rack_id; ?>"><?php echo $c->rack_name;?></option>
                                            <?php } ?>
                                        </select>
                                        <?php } ?>
                                        <label for="" class="control-label mb-1">Rack:</label>
                                    </div>
                                </div>                                   
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <?php if(!empty($d['acquired_by'])){ ?>
                                        <input name="acquired_by[]"  value = "<?php echo $d['acquired_by'];?>" type="text" class="form-control form-alt cc-exp">
                                        <?php } else { ?>
                                        <input name="acquired_by[]" type="text" class="form-control form-alt cc-exp">
                                        <?php } ?>
                                        <label for="" class="control-label mb-1">Supplier:</label>
                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <?php if($d['physical']!=''){ ?>
                                        <textarea type="text" name="condition[]" class="form-control form-alt cc-cvc" ><?php echo $d['physical'];?></textarea> 
                                        <?php } else { ?>
                                        <textarea type="text" name="condition[]" class="form-control form-alt cc-cvc"></textarea>
                                        <?php } ?>
                                        <label for="" class="control-label mb-1">Physical Condition:</label>
                                    </div>
                                </div> 
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                         <textarea name="remarks[]" id="" class="form-control form-alt" cols="30" rows="2"><?php echo $d['remarks'];?></textarea>
                                        <label for="" class="control-label mb-1">Remarks:</label>
                                    </div>
                                </div> 
                            </div>
                            
                            <div class="row border-class" >
                                <style type="text/css">
                                    #img-check-none1-<?php echo $x?>{
                                        display:none;
                                    }
                                     #img-check-none2-<?php echo $x?>{
                                        display:none;
                                    }
                                     #img-check-none3-<?php echo $x?>{
                                        display:none;
                                    }                              
                                </style>
                                <div>
                                    <div class="col-lg-4 float-col">
                                        <label for="pic<?php echo $count;?>">Picture 1:</label>
                                        <input class="form-control"  type="file" name="pic1[]" id="img1_<?php echo $x; ?>" onchange="readPic1(this, <?php echo $x; ?>);">
                                        <div class="thumbnail">
                                            <img id="pic1_<?php echo $x; ?>" class="pictures" src="<?php echo (empty($d['picture1']) ? base_url().'assets/default/default-img.jpg' : base_url().'uploads/'.$d['picture1']); ?>" alt="your image" />
                                        </div>
                                        <div id="img-check-none1-<?php echo $x?>" class="alert alert-danger">
                                          <center><small><strong>Warning:</strong> Image too big. Upload images less than 5mb.</small></center>
                                        </div>
                                    </div> 
                                    <div class="col-lg-4 float-col">
                                        <label for="pic1">Picture 2:</label>
                                        <input class="form-control"  type="file" name="pic2[]" id="img2_<?php echo $x; ?>" data-trigger="<?php echo $count?>" onchange="readPic2(this, <?php echo $x; ?>);">
                                        <div class="thumbnail">
                                            <img id="pic2_<?php echo $x; ?>" class="pictures" src="<?php echo (empty($d['picture2']) ? base_url().'assets/default/default-img.jpg' : base_url().'uploads/'.$d['picture2']); ?>" alt="your image" />
                                        </div>
                                        <div id="img-check-none2-<?php echo $x;?>" class="alert alert-danger">
                                          <center><small><strong>Warning:</strong> Image too big. Upload images less than 5mb.</small></center>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 float-col">
                                        <label for="pic1">Picture 3:</label>
                                        <input class="form-control"  type="file" name="pic3[]" id="img3_<?php echo $x; ?>" data-trigger="<?php echo $count?>" onchange="readPic3(this, <?php echo $x; ?>);">
                                        <div class="thumbnail">
                                            <img id="pic3_<?php echo $x; ?>" class="pictures" src="<?php echo (empty($d['picture3']) ? base_url().'assets/default/default-img.jpg' : base_url().'uploads/'.$d['picture3']); ?>" alt="your image" />
                                        </div>
                                        <div id="img-check-none3-<?php echo $x;?>" class="alert alert-danger">
                                          <center><small><strong>Warning:</strong> Image too big. Upload images less than 5mb.</small></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="ed_id[]" value = "<?php echo $d['ed_id'];?>">
                    <?php
                        $asset=$asset+1; 
                        $count++;
                        $x++;
                        }  $counter = $count - 1; }else {
                    ?>
                    <div class="card bor-radius5 shadow-sv animated fadeInUp" > <!-- style="border:2px solid #e5a255" -->
                        <div class="card-header cheader-bor bg-primary-alt">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <input name="acq_date[]" type="date" class="form-control form-alt  cc-exp">
                                        <samll for="" class="control-label mb-1">Acquisition Date:</samll>
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <input name="date_issued[]" class="form-control form-alt  cc-cvc" type="date">
                                        <label for="" class="control-label mb-1">Date Issued:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group m-b-10">
                                        <input name="acn[]" type="text" class="form-control form-alt  cc-exp" value = "<?php echo $prefix."-".$location."-".$asset;?>" style = "pointer-events:none;" readonly>
                                        <label for="" class="control-label mb-1">Asset Control Number:</label>
                                    </div>
                                </div>     
                                <div class="col-lg-6">
                                    <div class="form-group m-b-10">
                                        <input name="sn[]" type="text" class="form-control form-alt  cc-exp" >
                                        <label for="" class="control-label mb-1">Serial Number:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                                 
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <input name="brand[]" type="text" class="form-control form-alt  cc-exp" >
                                        <label for="" class="control-label mb-1">Brand:</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <input name="model[]" class="form-control form-alt  cc-cvc" type="text">
                                        <label for="" class="control-label mb-1">Model:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                                 
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <input name="type[]" type="text" class="form-control form-alt  cc-exp" >
                                        <label for="" class="control-label mb-1">Type:</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group m-b-10">
                                        <input name="price[]" class="form-control form-alt  cc-cvc" type="text">
                                        <label for="" class="control-label mb-1">Unit Price:</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group m-b-10">
                                        <select name="cur[]" class="form-control form-alt  cc-cvc">
                                            <option value = "">--Select Currency--</option>
                                            <?php foreach($currency AS $c){ ?>
                                            <option value = "<?php echo $c->currency_id; ?>"><?php echo $c->currency_name;?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="" class="control-label mb-1">Currency:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <select name="placement[]" class="form-control form-alt  cc-cvc">
                                            <option value = "">--Select Placement--</option>
                                            <?php foreach($placement AS $p){ ?>
                                            <option value = "<?php echo $p->placement_id; ?>"><?php echo $p->placement_name;?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="" class="control-label mb-1">Placement:</label>
                                    </div>
                                </div>                                                
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <select name="company[]" class="form-control form-alt  cc-cvc">
                                            <option value = "">--Select Company--</option>
                                            <?php foreach($company AS $r){ ?>
                                            <option value = "<?php echo $r->company_id; ?>"><?php echo $r->company_name;?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="" class="control-label mb-1">Company:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class = "col-6">
                                    <div class="form-group m-b-10">
                                        <select name="rack[]" class="form-control form-alt  cc-cvc">
                                            <option value = "">--Select Rack--</option>
                                            <?php foreach($rack AS $ra){ ?>
                                            <option value = "<?php echo $ra->rack_id; ?>"><?php echo $ra->rack_name;?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="" class="control-label mb-1">Rack:</label>
                                    </div>
                                </div>                                   
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <input name="acquired_by[]" type="text" class="form-control form-alt  cc-exp">
                                        <label for="" class="control-label mb-1">Supplier:</label>
                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <textarea name="condition[]" class="form-control form-alt  cc-cvc" cols="30" rows="2"></textarea>
                                        <label for="" class="control-label mb-1">Physical Condition:</label>
                                    </div>
                                </div> 
                                <div class="col-6">
                                    <div class="form-group m-b-10">
                                        <textarea name="remarks[]" class="form-control form-alt " cols="30" rows="2"></textarea>
                                        <label for="" class="control-label mb-1">Remarks:</label>
                                    </div>
                                </div> 
                            </div>
                            
                            <div class="row border-class" >
                                <style type="text/css">
                                    #img-check-none1-<?php echo $x?>{
                                        display:none;
                                    }
                                     #img-check-none2-<?php echo $x?>{
                                        display:none;
                                    }
                                     #img-check-none3-<?php echo $x?>{
                                        display:none;
                                    }                              
                                </style>
                                <div>
                                    <div class="col-lg-4 float-col">
                                        <label for="pic<?php echo $count;?>">Picture 1:</label>
                                        <input class="form-control form-alt "  type="file" name="pic1[]" id="img1_<?php echo $x; ?>" onchange="readPic1(this, <?php echo $x; ?>);">
                                        <div class="thumbnail">
                                            <img id="pic1_<?php echo $x; ?>" class="pictures" src="<?php echo base_url() ?>assets/default/default-img.jpg" alt="your image" />
                                        </div>
                                        <div id="img-check-none1-<?php echo $x?>" class="alert alert-danger">
                                          <center><small><strong>Warning:</strong> Image too big. Upload images less than 5mb.</small></center>
                                        </div>
                                    </div> 
                                    <div class="col-lg-4 float-col">
                                        <label for="pic1">Pictu id="draft"re 2:</label>
                                        <input class="form-control form-alt "  type="file" name="pic2[]" id="img2_<?php echo $x; ?>" data-trigger="<?php echo $count?>" onchange="readPic2(this, <?php echo $x; ?>);">
                                        <div class="thumbnail">
                                            <img id="pic2_<?php echo $x; ?>" class="pictures" src="<?php echo base_url() ?>assets/default/default-img.jpg" alt="your image" />
                                        </div>
                                        <div id="img-check-none2-<?php echo $x;?>" class="alert alert-danger">
                                          <center><small><strong>Warning:</strong> Image too big. Upload images less than 5mb.</small></center>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 float-col">
                                        <label for="pic1">Picture 3:</label>
                                        <input class="form-control form-alt "  type="file" name="pic3[]" id="img3_<?php echo $x; ?>" data-trigger="<?php echo $count?>" onchange="readPic3(this, <?php echo $x; ?>);">
                                        <div class="thumbnail">
                                            <img id="pic3_<?php echo $x; ?>" class="pictures" src="<?php echo base_url() ?>assets/default/default-img.jpg" alt="your image" />
                                        </div>
                                        <div id="img-check-none3-<?php echo $x;?>" class="alert alert-danger">
                                          <center><small><strong>Warning:</strong> Image too big. Upload images less than 5mb.</small></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }  ?>
                    <center><div id='alt' style="font-weight:bold"></div></center>
                    <div class="btn-group btn-block" style="border-radius: 10px 10px 10px 10px">
                        <input type="hidden" name="count" id = "count" value = "<?php echo $counter;?>">
                        <input type ="submit" class="btn btn-info-alt btn-md btn-block" name ="draft" value="Submit Draft" style="border-radius: 10px 0px 0px 10px" onclick="confirmationSave(this);return false;" id="draft"> 
                        <input type ="submit" class="btn btn-success-alt btn-md btn-block m-0" name ="saved" value="Submit" style="border-radius: 0px 10px 10px 0px" onclick="confirmationSave(this);return false;" id="saved">   
                        <input type="hidden" name="user_id" value = "<?php echo $_SESSION['user_id'];?>">
                        <input type="hidden" name="et_id" value = "<?php echo $id;?>">
                        <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">                         
                    </div>
                </div>                
            </div>
        </form>
    </div>
</div>





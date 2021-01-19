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
                        <li class="breadcrumb-item active">Inventory Report (Per Sub Category)</li>
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
                                <h4 class="card-title m-t-10 m-b-0 ">Inventory Report <small>(Per Sub Category)</small></h4>
                            </div>
                            <div class="col-lg-4 offset-lg-2">
                                <form method='POST' action="<?php echo base_url(); ?>report/generateSubcat/">                          
                                    <div class="bor-radius100 btn-group btn-block ">
                                        <select name = "subcat" class = "form-control form-alt" style="">
                                            <?php foreach($subcat1 AS $s){ ?>
                                                <option value = "<?php echo $s->subcat_id;?>"><?php echo $s->subcat_name;?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="submit" name="generate" id="generate" class="btn btn-success-alt btn-sm" value ="Generate" style="border-radius: 0px 20px 20px 0px">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                        <?php if(!empty($subcatid)){?>     
                        <div class='animated headShake alert with-close alert-success fade show p-10'><span class='btn btn-success-alt btn-sm'>Filter Applied</span><?php echo $filts ?>, <a href='<?php echo base_url(); ?>report/inv_rep' class='alert-link pull-right btn p-t-0'><span class="fa fa-times"></span></a></div>                    
                        <?php } ?>
                        <table class="table table-borderless table-striped table-earning " id="myTable_peremp">
                            <thead>
                                <tr>
                                    <th>Sub Category Name</th>
                                    <th width="20%">Count</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php 
                                    if(!empty($sub)){
                                    foreach($sub AS $s){
                                ?>
                                <tr>
                                    <td> 
                                        <a href="<?php echo base_url(); ?>report/inv_rep_det/<?php echo $s['subcat_id'];?>" class="" data-toggle="tooltip" data-placement="left" title="View">
                                           <?php echo $s['subcat'];?>
                                        </a>           
                                    </td>
                                    <td><?php echo $s['count'];?></td>
                                </tr>
                                <?php } }?>
                            </tbody>                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


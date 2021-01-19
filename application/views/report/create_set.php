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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>report/report_sub/<?php echo $id;?>">Current Items</a></li>
                        <li class="breadcrumb-item active">Create Set</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">  
                        <h4 class="card-title">
                            <a onclick="history.go(-1);" class="btn  text-dfault">
                                <span class="fa fa-arrow-left"></span>
                            </a>
                            <b><?php echo $name;?></b>
                        </h4>
                        <form action="<?php echo base_url(); ?>report/insert_set" method = "POST">
                            <div class="row m-b-10">
                                <div class = "col-lg-4">
                                    <label>Set Name:</label>
                                    <!-- <input type = "text" class = "form-control bor-radius20" name = "name" value = "<?php if(isset($ed_id)){ foreach($set AS $s){ echo $s->set_name; } }else{ echo ''; } ; ?>" required=""> -->
                                    <input list = 'sets' class="form-control" type="text" name="name" id="name" autocomplete="off" value = "<?php if(isset($ed_id)){ foreach($set AS $s){ echo $s->set_name; } }else{ echo ''; } ; ?>" required="">
                                    <datalist id ='sets'>
                                        <?php foreach($sets AS $s){ ?>
                                        <option data-customvalue="<?php echo $s->set_id; ?>" value="<?php echo $s->set_name." - ".$s->set_serial_no; ?>"></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                                <div class = "col-lg-2">
                                    <label>Set Price:</label>
                                    <input type = "text" class = "form-control bor-radius20" id="price" name = "price" value = "<?php if(isset($ed_id)){ foreach($set AS $s){ echo $s->set_price; } }else{ echo ''; } ; ?>">
                                </div>
                                <div class = "col-lg-2">
                                    <label>Currency:</label>
                                    <select class = "form-control" name="currency" id = "currency">
                                        <option value="">--Select Currency-</option>
                                        <?php 
                                            foreach($currency AS $c){ 
                                        ?>
                                        <option value="<?php echo $c->currency_id; ?>" <?php foreach($set AS $s){  echo ($s->set_currency==$c->currency_id) ? 'selected' : ''; } ?>><?php echo $c->currency_name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <!-- <input type = "text" class = "form-control bor-radius20" name = "price" value = "<?php if(isset($ed_id)){ foreach($set AS $s){ echo $s->set_price; } }else{ echo ''; } ; ?>"> -->
                                </div>  
                                <div class = "col-lg-4">
                                    <label>Set Serial No.:</label>
                                    <input type = "text" class = "form-control bor-radius20" id = "serial" name = "serial" value = "<?php if(isset($ed_id)){ foreach($set AS $s){ echo $s->set_serial_no; } }else{ echo ''; } ; ?>">
                                </div> 
                                <input type="hidden" name = "id" id = "id" value = "<?php echo $id?>">
                                <input type="hidden" name = "set" id = "set">
                                <input type="hidden" name = "set_ed" id = "set_ed" value = "<?php echo $ed_id?>">
                                <input type="hidden" name="set_id" value = "<?php if(isset($ed_id)){ foreach($set AS $s){ echo $s->set_id; } } ?>">
                                <br>
                                <input type="submit" class="btn btn-block btn-info-alt" name = "submit" id = "submit" value="<?php echo (isset($ed_id)) ? 'Update' : 'Set' ?>">
                            </div>
                            <table class="table dataTable table-striped"  id = "">
                                <thead>
                                    <tr>
                                        <th width="0%" align="center" hidden></th>
                                        <th width="0%" align="center"><center><input type="checkbox" onClick="toggle_multi(this)" class=""></center></th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th width="30%">Item</th>
                                        <th>Unit</th>
                                        <th>Quantity</th>
                                        <th>Department</th>
                                        <th width="10%">Set Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        usort($sub, function($a, $b) {
                                            return $a['set_id'] - $b['set_id'];
                                        });
                                        $x = 1;
                                        foreach($sub AS $s){ 
                                    ?>
                                    <tr>
                                        <?php if($s['set_id']!=0){ ?>
                                        <td align="center" hidden><input type="text" name="etid[]" value='<?php echo $s['et_id']; ?>' disabled></td>
                                        <td align="center" width = "10%">
                                            <div class="btn-group">
                                                <a href = '<?php echo base_url(); ?>report/rem_set/<?php echo $s['ed_id'];?>/<?php echo $id;?>' class="btn btn-danger-alt item btn-sm text-white" data-toggle="tooltip" onclick="confirmationDeleteSet(this);return false;" data-placement="top" title="Remove Set">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <a href = '<?php echo base_url(); ?>report/create_set/<?php echo $s['employee_id'];?>/<?php echo $s['ed_id'];?>' class="btn btn-info-alt item btn-sm text-white" data-toggle="tooltip" data-placement="top" title="Update Set">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <?php } else { ?>
                                        <td align="center" hidden><input type="text" name="etid[]" value='<?php echo $s['et_id']; ?>'></td>
                                        <td align="center"><input type="checkbox" class="multi" name ='edid[]' value = '<?php echo $s['ed_id'];?>'></td>
                                        <?php } ?>
                                        <td><?php echo $s['cat']; ?></td>
                                        <td><?php echo $s['subcat']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>report/view_more/<?php echo $s['et_id'];?>" class="btn btn-ilink" data-toggle="tooltip" data-placement="top" title="View More"  style="white-space: normal!important;text-align: left;padding-left: 0;padding-top: 0px">
                                                 <?php echo $s['et_desc']; ?>
                                            </a><br>  
                                            <?php 
                                                echo (!empty($s['brand'])) ? "<a class='btn btn-xs btn-secondary-alt' style='font-size:10px'> ".$s['brand']."</a>" : '';
                                                echo (!empty($s['model'])) ? "<a class='btn btn-xs btn-info-alt' style='font-size:10px'>".$s['model']."<a/>" : '';
                                                echo (!empty($s['serial_no'])) ? "<a class='btn btn-xs btn-success-alt' style='font-size:10px'>".$s['serial_no']."</a>" : '';
                                            ?>                                           
                                        </td>
                                        <td><?php echo $s['unit']; ?></td>
                                        <td ><?php echo $s['qty']; ?></td>
                                        <td><?php echo $s['department']; ?></td>
                                        <td><?php echo $s['set_name'];?></td>
                                    </tr>
                                    <?php $x++; } ?>
                                    <input type="hidden" name = "count" id = "count" value = "<?php echo $x?>">
                                </tbody>
                            </table>
                        </form>
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
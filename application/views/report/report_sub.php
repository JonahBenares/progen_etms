<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>
<script type="text/javascript">
    function viewSet(){
        window.open('<?php echo base_url(); ?>report/add_set_pop/', '_blank', 'top=50px,left=350px,width=600,height=500');
    }
</script>

<div class="modal fade" id="modalSet" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Add Set</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method = "POST">
            <div class="modal-body">
                <table width="100%" id="">
                    <tr>
                        <td>Set Name:</td>
                        <td><input type="text" class="form-control bor-radius"></td>
                    </tr>
                    <tr>
                        <td><div class="m-t-10"></div></td>
                        <td><div class="m-t-10"></div></td>
                    </tr>
                    <tr>
                        <td>Set Price:</td>
                        <td><input type="text" class="form-control bor-radius"></td>
                    </tr>
                    <tr>
                        <td><div class="m-t-10"></div></td>
                        <td><div class="m-t-10"></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button class="btn btn-primary btn-block">Save</button></td>
                    </tr>
                </table>
            </div>    
            <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">     
            </form>                               
        </div>
    </div>
</div>

<div class="modal fade" id="lostTag" tabindex="-1" role="dialog" aria- labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"><span class="fa fa-filter"></span>  Lost Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method='POST' action="<?php echo base_url(); ?>report/insert_lost">
                <div class="modal-body">
                    <table width="100%">
                        <tr>
                            <td><p>Lost Date:</p>
                                <input type="date" id="lost_date" name="lost_date" class="form-control bor-radius10" >
                            </td>
                        </tr>
                        <tr>
                            <td><p>Accountable Person:</p>
                                <input type="text" style = "pointer-events: none;" name="accountable" id="accountable" class="form-control bor-radius10" >
                            </td>
                        </tr>
                        <tr>
                            <td><p>Remarks:</p>
                                <textarea id="remarks" name="remarks" class="form-control bor-radius10"></textarea>
                            </td>
                        </tr>                                                        
                    </table>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success btn-sm btn-block bor-radius" value='Save'>
                </div>
                <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
                <input type="hidden" name="emp_id" id="emp_id">
                <input type="hidden" name="ed_id" id="ed_id">
                <input type="hidden" name="et_id" id="et_id">
            </form>
        </div>
    </div>
</div>

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
                        <li class="breadcrumb-item active"><?php echo $name;?></li>
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
                            <div class="btn-group pull-right">
                                <a href="<?php echo base_url(); ?>report/create_set/<?php echo $id;?>" class="btn btn-warning-alt btn-sm text-white pull-right" data-toggle="tooltip" data-placement="top" title='Create Set'>Create Set</a>
                                <a href="<?php echo base_url(); ?>report/multi_return/<?php echo $id;?>" class="btn btn-success-alt btn-sm " data-toggle="tooltip" data-placement="top" title='Multiple Return'>
                                    <span class="fa fa-dedent"></span></a>
                                <a href="<?php echo base_url(); ?>report/return_report/<?php echo $id;?>" class="btn btn-success-alt btn-sm" data-toggle="tooltip" data-placement="top" title='Return Report'>
                                    <span class="fa fa-clipboard"></span></a>
                                <a href="<?php echo base_url(); ?>report/seaaf_report/<?php echo $id;?>" class="btn btn-info-alt btn-sm" data-toggle="tooltip" data-placement="top" title="Print">
                                    <span class="fa fa-print"></span></a>
                            </div>
                        </h4>
                        <table class="table dataTable table-striped ">
                            <thead>
                                <tr>
                                    <th width="15%" >Category</th>
                                    <th width="15%" >Sub Category</th>
                                    <th width="40%" >Item</th>
                                    <th width="5%" >Unit</th>
                                    <th width="5%" >Quantity</th>
                                    <th width="10%" >Department</th>
                                    <th width="10%" >Set Name</th>
                                    <th width="5%" class="text-center"><span class="fa fa-bars"></span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(!empty($sub)){ 
                                    usort($sub, function($a, $b) {
                                        return $a['set_id'] - $b['set_id'];
                                    });
                                    $x = 1;
                                    foreach($sub AS $s){ 
                                ?>
                                <tr style = "<?php echo ($s['lost']!=0) ? "background-color:#ec7070 !important" : ''; ?>">
                                    <td><?php echo $s['cat']; ?></td>
                                    <td><?php echo $s['subcat']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>report/view_more/<?php echo $s['et_id'];?>" class="btn btn-ilink" data-toggle="tooltip" data-placement="top" title="View More" style="white-space: normal!important;text-align: left">
                                             <?php echo ($s['lost']!=0) ? $s['et_desc']." - <b>Lost Item</b>" : $s['et_desc']; ?>
                                        </a>                                           
                                    </td>
                                    <td><?php echo $s['unit']; ?></td>
                                    <td ><?php echo $s['qty']; ?></td>
                                    <td><?php echo $s['department']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>report/set_print_account/<?php echo $s['set_id'];?>/<?php echo $s['empid'];?>" class="btn btn-ilink" data-toggle="tooltip" data-placement="top" title="View Set"  style="white-space: normal!important;text-align: left">
                                            <?php echo $s['set_name'];?> 
                                        </a>
                                    </td>
                                    <td>                                            
                                        <div class="btn-group">
                                            <?php if($s['lost']==0){ ?>
                                            <a class="btn btn-success-alt item btn-sm text-white" data-toggle="tooltip" data-placement="top" title="Return" onClick="viewReturn(<?php echo $id;?>,<?php echo $s['et_id'];?>)">
                                                <i class="fa fa-refresh"></i>
                                            </a>                                                        
                                            <a class="btn btn-danger-alt item btn-sm text-white" data-toggle="tooltip" data-placement="top" title="Tag as Damage" onClick="tagAsDamage(<?php echo $id;?>,<?php echo $s['et_id'];?>)">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            <span  data-toggle="tooltip" data-placement="top" title="Lost">
                                                <a class="btn btn-secondary-alt text-white item btn-sm" data-toggle="modal" id = "lost_button" data-id = "<?php echo $s['empid'];?>" data-name = "<?php echo $s['accountability'];?>" data-ab = "<?php echo $s['ed_id'];?>" data-ac = '<?php echo $s['et_id']; ?>' data-target="#lostTag" title="Lost" style="border-radius: 0px 2px 2px 0px">
                                                    <i class="fa fa-minus-circle"></i>
                                                </a>  
                                            </span>
                                            <?php } ?> 
                                        </div>
                                    </td>
                                </tr>
                                <?php $x++; } ?>
                                <input type="hidden" name = "count" id = "count" value = "<?php echo $x?>">
                                <input type="hidden" name = "id" id = "id" value = "<?php echo $id?>">
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
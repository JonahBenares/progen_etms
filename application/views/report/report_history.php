<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>
<script type="text/javascript">
    function viewSet(){
        window.open('<?php echo base_url(); ?>report/add_set_pop/', '_blank', 'top=50px,left=350px,width=600,height=500');
    }
</script>
<div class="modal fade" id="lostTag" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
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
                                <a href="<?php echo base_url(); ?>report/print_history/<?php echo $id;?>" class="btn btn-info-alt btn-sm" title="Print">
                                    <span class="fa fa-print"></span></a>
                            </div>
                        </h4>
                         <table class="table table-borderesd dataTable table-striped table-earning">
                            <thead>
                                <tr>
                                    <th width="15%">Date Returned</th>
                                    <th width="15%">Date Issued</th>
                                    <th width="40%">Item</th>
                                    <th width="%">Unit</th>
                                    <th width="%">Quantity</th>
                                    <th width="%">Unit Price</th>
                                    <th width="15%">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(!empty($sub)){
                                    $x = 1;
                                    foreach($sub AS $s){
                                ?>
                                <tr style = "<?php echo ($s['lost']!=0) ? "background-color:#1e2128!important;color:#fff" : ''; ?>">
                                    <td><?php echo $s['date_returned']; ?></td>
                                    <td><?php echo $s['date_issued']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>report/view_more/<?php echo $s['et_id'];?>" class=" p-0" data-toggle="tooltip" data-placement="top" title="View More" style="white-space: normal!important;text-align: left">
                                             <?php echo ($s['lost']!=0) ? $s['et_desc']." - <b>Lost Item</b>" : $s['et_desc']; ?>
                                        </a>                                           
                                    </td>
                                    <td><?php echo $s['unit']; ?></td>
                                    <td align="center"><?php echo $s['qty']; ?></td>
                                    <td><?php echo $s['unit_price']; ?></td>
                                    <td>
                                        <?php if($s['damaged']==1){ ?>
                                            <a href="#" title="Remarks" data-toggle="popover"  data-placement="bottom" data-trigger="hover" data-content="<?php echo $s['incident_description']; ?>"><?php echo $s['remarks']." - ".$s['accountability']; ?></a>
                                        <?php } else { ?>

                                            <?php if(!empty($s['accountabilitys'])){ ?>
                                                <a href="#" title="Remarks" data-toggle="popover"  data-placement="bottom" data-trigger="hover" data-content="<?php echo $s['remarks']; ?>"><?php echo (!empty($s['accountabilitys'])) ? $s['remarks_all']." ".$s['accountabilitys'] : ''; ?></a>
                                            <?php } else if(!empty($s['replacement'])){ ?>
                                                <a href="#" data-toggle="popover"  data-placement="bottom" data-trigger="hover"><?php echo (!empty($s['replacement']) && $s['lost']==0) ? "Replacement for lost item ".$s['replacement'] : ''; ?></a>
                                            <?php } else{ ?>
                                                <a href="#" title="Remarks" data-toggle="popover"  data-placement="bottom" data-trigger="hover" data-content="<?php echo $s['remarks']; ?>"><?php echo (!empty($s['remarks_all'])) ? 'Returned' : ''; ?></a>
                                            <?php } ?>
                                        
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php $x++; } ?>
                                <input type="hidden" name = "count" id = "count" value = "<?php echo $x ?>">
                                 <?php } else { ?>
                                <tr>
                                    <td class="main-tab" align="center" colspan='11'><center>No Data Available.</center></td>
                                </tr>
                                <?php  } ?>
                                
                                <input type="hidden" name = "id" id = "id" value = "<?php echo $id ?>">
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
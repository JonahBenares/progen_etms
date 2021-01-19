<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/masterfile.js"></script>
<script type="text/javascript">
    $(document).on("click", "#Trans_button", function () {
         var eid = $(this).attr("data-id");
         var emp_name = $(this).attr("data-name");
         $("#eid").val(eid);
         $("#emp_name").val(emp_name);
    });
</script>
<style type="text/css">
    a table tr.tr:hover, table tbody tr.tr:hover{
        background-color: #fff!important;
        color: #000!important;
        -webkit-animation-duration: 1s;
        transition: 1s;
    }
</style>
<div class="modal fade" id="transfer" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Transfer Office</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method = "POST" action="<?php echo base_url();?>masterfile/transfer_dept">
                    <div class="form-group">
                        <label for="" class="control-label mb-1">Office:</label>
                        <select name="office" class="form-control bor-radius5">
                            <option>-- Select Office --</option>
                            <?php 
                                foreach($employee AS $e){ 
                                    if($e->type == '2'){
                            ?>
                            <option value="<?php echo $e->employee_id; ?>"><?php echo $e->employee_name;?></option>
                            <?php } } ?> 
                        </select>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Transfer</button>
                    <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
                    <input type="hidden" name="eid" id="eid">
                    <input type="hidden" name="emp_name" id="emp_name">
                    <input type="hidden" name="emp_id" value = "<?php echo $id; ?>">
                </div>
                </form>
            </div>                                        
        </div>
    </div>
</div>
 <!-- MAIN CONTENT-->
<div class="m-t-30">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">                
                <div class="col-lg-6 offset-lg-3">
                    <div class="card bor-radius shadow">
                        <form action="<?php echo base_url(); ?>masterfile/insert_multiemp" method="POST">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    Employee Name
                                    <input id="employee" name="employee" type="text" class="form-control bor-radius5" placeholder="" autocomplete="off" required>
                                    <span id="suggestion-employee"></span>
                                    <input type="hidden" name="employee_id" id="employee_id">
                                </div>
                                <div class="form-group">
                                    <center>
                                        <input type = "submit" class="btn btn-success-alt btn-sm bor-radius10 btn-block" placeholder="Save" value="ADD"> 
                                        <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
                                        <input type = "hidden" name = "empid" value="<?php echo $id;?>">
                                    </center>
                                </div>     
                                <div style="height: 180px;position: inherit;overflow-y: scroll;">                          
                                    <table width = "100%">
                                        <?php 
                                            foreach($multi_emp AS $emp){ 
                                                if($emp['status']==0){
                                        ?>
                                        <tr class="tr">
                                            <td><input type="text" name="" class="form-control" readonly="" value="<?php echo $emp['emp_name'];?>"></td>
                                            <td width="1%"> 
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url(); ?>masterfile/delete_employee_pop/<?php echo $emp['eid'];?>/<?php echo $emp['parent'];?>/<?php echo $emp['id'];?>" onclick="confirmationDelete(this);return false;" class="btn btn-danger-alt" data-toggle="tooltip" data-placement="top" title="Delete" title="Delete" alt='Delete'>
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <a class="btn btn-info-alt" data-toggle="modal" data-target="#transfer" title="Transfer" alt='Transfer' data-id = "<?php echo $emp['eid'];?>" data-name = "<?php echo $emp['child_id'];?>" id = "Trans_button" style = "color: white;">
                                                        <i class="fa fa-retweet"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } } ?>
                                    </table>
                                </div>  
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
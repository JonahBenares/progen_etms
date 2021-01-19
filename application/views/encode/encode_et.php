<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/encode.js"></script>
 <!-- MAIN CONTENT-->
 <script type="text/javascript">
     function isNumberKey(txt, evt){
       var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode == 46) {
            //Check if the text already contains the . character
            if (txt.value.indexOf('.') === -1) {
                return true;
            } else {
                return false;
            }
        } else {
            if (charCode > 31
                 && (charCode < 48 || charCode > 57))
                return false;
        }
        return true;
    }
 </script>

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
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                <div class="card bor-radius10 shadow-sv animated fadeInLeft">
                    <div class="card-header cheader-bor bg-primary-alt">
                        <h4 class="card-title m-b-10 m-t-10">
                            <strong>ENCODE</strong>
                            <small>Equipment and Tools</small>
                            <span class="pull-right fa fa-plus"></span>
                        </h4>
                    </div>
                    <div class="card-body">                        
                        <div class="">
                            <form action="<?php echo base_url(); ?>encode/insert_head" method="POST">
                                <div class="">
                                    <div class="form-group m-b-10">
                                        <select name="category" class="form-control form-alt" id="category" onChange="chooseCategory();" required>
                                            <option value = ''>-- Select Category --</option>
                                            <?php 
                                                foreach ($cat AS $cat) {
                                            ?>
                                            <option value="<?php echo $cat->category_id; ?>"><?php echo $cat->category_name;?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="" class="control-label m-b-0">Category:</label>
                                    </div>
                                    <div class="form-group m-b-10">
                                        <select id="subcat" name="subcategory" class="form-control form-alt" onChange="choosePrefix();" required></select>
                                        <label for="" class="control-label m-b-0">Sub Category:</label>
                                    </div>
                                    <div class="form-group m-b-10">
                                        <textarea rows="2" id="item" name="item" type="text" class="form-control form-alt" placeholder="" autocomplete="off" required></textarea>
                                        <label for="" class="control-label m-b-0">Item Description:</label>
                                    </div>                                        
                                    <div class="row m-b-10">
                                        <div class="col-6">
                                            <div class="form-group m-b-10">
                                                <input id="qty" name="qty" class="form-control form-alt cc-cvc" type="text" onkeypress="return isNumberKey(this, event)" required>
                                            </div>
                                            <label for="x_card_code" class="control-label m-b-0">Quantity:</label>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group m-b-10">
                                                <select id="uom" name="uom" class="form-control form-alt cc-cvc">
                                                    <option value="">-- Select UoM --</option>
                                                    <?php 
                                                        foreach ($unit AS $un) {
                                                    ?>
                                                    <option value="<?php echo $un->unit_id; ?>"><?php echo $un->unit_name;?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="x_card_code" class="control-label m-b-0">UOM:</label>
                                            </div>
                                        </div>
                                    </div>        
                                    <div class="row m-b-10">
                                        <div class="col-6">

                                            <div class="form-group m-b-10">
                                                <input id="accountability" name="accountability" type="text" class="form-control form-alt" placeholder="" autocomplete="off">
                                                <span id="suggestion-accountability"></span>
                                                <input type="hidden" name="accountability_id" id="accountability_id" >
                                                <label for="" class="control-label m-b-0">Accountability:</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group m-b-10">
                                                <input type="text" name = "department" id ="department"  class="form-control form-alt">
                                                <label for="" class="control-label m-b-0">Department / Office:</label>
                                            </div> 
                                        </div>
                                    </div>                                   
                                </div>
                                <input type = "submit" id = "save" style="" class="btn btn-primary-alt btn-md btn-block" value="Next" onclick="confirmationSave(this);return false;"> 
                                <input type="hidden" name="user_id" value = "<?php echo $_SESSION['user_id'];?>">
                                <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





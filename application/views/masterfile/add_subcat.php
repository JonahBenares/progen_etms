<div class="mt-1">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">                
                <div class="col-lg-6 offset-lg-3">
                    <div class="card bor-radius shadow">
                        <div class="card-header">
                            <strong>ADD</strong> SubCategory
                        </div>
                        <form action="<?php echo base_url(); ?>masterfile/insert_subcat" method="POST">
                            <div class="card-body card-block">
                                <label for="" class="control-label mb-1">Category Name:</label>
                                <?php foreach($cat AS $cat){ ?>
                                <input id="" name="category" type="text" class="form-control bor-radius5" style = "pointer-events:none;" value = "<?php echo $cat->category_name;?>">
                                <label for="" class="control-label mb-1">Location:</label>
                                <select id="" name="location" class="form-control bor-radius5" required="">
                                    <option value = "">--Select Location--</option>
                                    <?php foreach($location AS $l){ ?>
                                    <option value = "<?php echo $l->location_prefix; ?>"><?php echo $l->location_name; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="" class="control-label mb-1">Sub Category Prefix:</label>
                                <input id="" name="prefix" type="text" class="form-control bor-radius5">
                                <label for="" class="control-label mb-1">Sub Category Name:</label>
                                <input id="" name="subcat" type="text" class="form-control bor-radius5">
                                <label for="" class="control-label mb-1">Description:</label>
                                <textarea class="form-control bor-radius5" cols="2" name = 'desc'></textarea>
                            </div>
                            <div class="card-footer">
                                <center>
                                    <input type = "submit" class="btn btn-info-alt btn-sm bor-radius10 btn-block" placeholder="Update" value="Submit">
                                    <input type = "hidden" name = "category_id" value="<?php echo $id; ?>">
                                </center>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
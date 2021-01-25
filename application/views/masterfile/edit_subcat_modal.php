<?php foreach($subcat AS $s){ ?>
	<input class="form-control" name = "subcat_id" type = "hidden" value = "<?php echo $id;?>"/>
	<div class="form-group">
        <label for="" class="control-label mb-1">Subcategory Name:</label>
        <input id="" name="subcat" type="text" class="form-control bor-radius5" value = "<?php echo $s->subcat_name;?>">
        <label for="" class="control-label mb-1">Location:</label>
        <select name="location" class="form-control bor-radius5 cc-cvc">
            <option value = "">--Select Location--</option>
            <?php foreach($location AS $l){ ?>
            <option value = "<?php echo $l->location_prefix; ?>" <?php echo (($s->location == $l->location_prefix) ? ' selected' : '');?>><?php echo $l->location_name; ?></option>
            <?php } ?> 
            <!-- <option value = "BCD" <?php echo (($s->location == 'BCD') ? ' selected' : '');?>>Bacolod</option>
            <option value = "BS" <?php echo (($s->location == 'BS') ? ' selected' : '');?>>Bago</option> -->
        </select>
        <label for="" class="control-label mb-1">Prefix Name:</label>
        <input id="" name="prefix" type="text" class="form-control bor-radius5" value = "<?php echo $s->subcat_prefix;?>">
        <label for="" class="control-label mb-1">Subcat Description:</label>
        <textarea id="" name="desc" type="text" class="form-control bor-radius5"><?php echo $s->subcat_desc;?></textarea>
    </div>
<?php } ?>

                   
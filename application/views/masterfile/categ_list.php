<script type="text/javascript">
    function viewCat(cat_id){
        window.open('<?php echo base_url(); ?>masterfile/add_subcat/'+cat_id, '_blank', 'top=50px,left=350px,width=600,height=500');
    }
</script>
<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/masterfile.js"></script>

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-slg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Category List with Sub Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table- shadow" id="item_table">
                        <?php foreach($category AS $cat){ ?>
                         <thead>
                            <tr >                                                     
                                <th style="background:#f9e065;text-transform: uppercase;" align="center" colspan="4"><h5 class="font-medium m-b-0"><?php echo $cat->category_name; ?></h5></th>
                            </tr>
                        </thead>
                        <?php 
                            foreach($subcat AS $sub){ 
                                switch($sub){
                                    case($cat->category_id == $sub['category_id']): 
                         ?>
                        <tr>
                            <td width="30%"><?php echo $sub['subcat_name'];?></td>    
                            <td  width="20%"><?php echo $sub['subcat_prefix']." - ".$sub['location'];?></td>
                            <td><?php echo $sub['subcat_desc']?></td>
                            <td>
                                <a href="#" class="btn btn-info-alt btn-sm bor-radius" data-id="<?php echo $sub['subcat_id']; ?>" data-toggle="modal" id='getSub' data-target="#subcatModal1">
                                    <span class="fa fa-edit" ></span>
                                </a>
                            </td>
                        </tr>
                        <?php   
                            break;
                            default: 
                            } } }
                        ?>
                </table>
            </div>                                        
        </div>
    </div>
</div>

<div class="modal fade" id="subcatModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action = "<?php echo base_url();?>masterfile/insert_category">
                    <div class="form-group">
                        <label for="" class="control-label mb-1">Category:</label>
                        <input id="" name="category" type="text" class="form-control bor-radius5" placeholder="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary-alt btn-block">Add</button>
                    </div>
                </form>
            </div>                                        
        </div>
    </div>
</div>

<div class="modal fade" id="subcatModal1" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Update Subcategory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action = "<?php echo base_url();?>masterfile/update_subcategory">
                    <div class="form-group">
                        <div id = 'subcat'></div>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary-alt btn-block">Update</button>
                </div>
                </form>
            </div>                                        
        </div>
    </div>
</div>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>masterfile/dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Category List</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category
                            <div class="pull-right">
                                <span data-toggle="modal" data-target="#mediumModal">
                                    <a href="javascript:void(0)" class="btn btn-secondary-alt bor-radius btn-sm" data-toggle="tooltip" data-placement="left" title="View All">
                                        <span class="fa fa-file-text" ></span>
                                    </a>
                                </span>
                                <span data-toggle="modal" data-target="#subcatModal">
                                    <a href="javascript:void(0)" class="btn btn-primary-alt bor-radius btn-sm" data-toggle="tooltip" data-placement="left" title="Add New Category">
                                        <span class="fa fa-plus" ></span>
                                    </a>
                                </span>
                            </div>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped table-earning table-hover" id="employeeTable">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th width="1%" class="text-center"><span class="fa fa-bars"></span></th>
                                    </tr>
                                </thead>
                                    <?php foreach($category AS $cat){ ?>
                                    <tr>
                                        <td><?php echo $cat->category_name?></td>
                                        <td>                                            
                                            <div class="btn-group">
                                                <a class="btn btn-success-alt item btn-sm text-white" onClick="viewCat(<?php echo $cat->category_id;?>)" data-toggle="tooltip" data-placement="left" title = "Add Sub Category">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <a href="<?php echo base_url(); ?>masterfile/categ_update/<?php echo $cat->category_id?>" class="btn btn-info-alt item btn-sm" data-toggle="tooltip" data-placement="top" title="Update Category">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $CI=&get_instance(); ?>
<style type="text/css">
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 28px;
        width: 466px;
    }
</style>
<body class="skin-default-dark fixed-layout">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">EQUIPMENTS AND TOOLS MANAGEMENT SYSTEM</p>
        </div>
    </div>
    <div class="modal fade" id="deletItem" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="largeModalLabel"><span class="fa fa-close"></span>  Delete Item</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
                <form method='POST' action="<?php echo base_url(); ?>masterfile/delete_item">
                    <div class="modal-body">
                        <table width="100%">
                            <tr>
                                <td><p>ID Number:</p>
                                <select id="edid_no" name="edid_no" class="form-control select2" style="width:500px">
                                    <option value =''>--Select Item to Delete--</option>
                                    <?php foreach($delete_item AS $del){ ?>
                                        <option value="<?php echo $del->ed_id; ?>,<?php echo $del->et_id; ?>"><?php echo $del->ed_id." - ".$del->et_desc.", " . $del->brand.", " . $del->serial_no. " - ".$CI->get_name("employee_name", "employees", "employee_id", $del->accountability_id) ; ?></option>
                                    <?php } ?>
                                </select>
                                </td>
                            </tr>                                                       
                        </table>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger-alt btn-sm btn-block bor-radius" value='Delete'>
                    </div>
                    <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
                </form>
            </div>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>masterfile/dashboard">
                        <b>
                            <img src="<?php echo base_url(); ?>assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <img src="<?php echo base_url(); ?>assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <span>
                         	<img src="<?php echo base_url(); ?>assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         	<img src="<?php echo base_url(); ?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                     	</span> 
                 	</a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item hidden-sm-up"> <a class="nav-link nav-toggler waves-effect waves-light" href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="fa fa-times"></i></a>
                            </form>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#deletItem" disabled>
                        <span class="fa fa-close"></span> Delete Item
                    </button>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>assets/images/users/1.jpg" alt="user" class="img-circle" width="30"></a>
                            <div class="dropdown-menu ">
                              <a class="dropdown-item" href="#">My Settings</a>
                              <a class="dropdown-item" href="<?php echo base_url(); ?>masterfile/user_logout">Logout</a>
                            </div>
                        </li>
                    </ul>

                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="d-flex no-block nav-text-box align-items-center">
                <span><img src="<?php echo base_url(); ?>assets/images/logo-icon.png" alt="elegant admin template"></span>
                <a class="waves-effect waves-dark ml-auto hidden-sm-down" href="javascript:void(0)"><i class="ti-menu"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> 
                            <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>masterfile/dashboard" aria-expanded="false">
                                <i class="fa fa-tachometer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark accordion">
                                <i class="fa fa-key"></i>
                                <span class="hide-menu"></span>Masterfile
                            </a>
                            <div class="panel">
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>masterfile/loc_list">Location</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>masterfile/categ_list">Category</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>masterfile/employee_list">Employees</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>masterfile/emp_inclusion_list">Office</a>
                              
                              
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>masterfile/placement_list">Placement</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>masterfile/rack_list">Rack</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>masterfile/company_list">Company</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>masterfile/currency_list">Currency</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>masterfile/uom_list">UOM</a>
                            </div>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>encode/encode_et" aria-expanded="false">
                                <i class="fa fa-plus"></i>
                                <span class="hide-menu">Encode</span>
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark accordion">
                                <i class="fa fa-wrench"></i>
                                <span class="hide-menu"></span>Equipment/Tools
                            </a>
                            <div class="panel">
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>report/report_main">Per Item</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>report/report_main_emp">Per Employee</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>report/report_draft">Drafts</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>report/report_main_avail">Available</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>report/report_set_avail">Available Set</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>report/transfer_list">Transferred Items</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>report/returned_list">Returned</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>report/lost_list">Lost</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>repair/repair_list">Damaged</a>
                            </div>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark accordion">
                                <i class="fa fa-file-text-o"></i>
                                <span class="hide-menu"></span>Inventory Report
                            </a>
                            <div class="panel">
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>report/inv_rep">Per Sub Category</a>

                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>report/inv_rep_itm">Per Item</a>
                                <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>report/report_main_hist">Item History</a>
                              <a class="acc waves-effect waves-dark" href="<?php echo base_url(); ?>report/inv_rep_overall">Overall Item Report</a>
                            </div>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>borrow/borrow_list" aria-expanded="false">
                                <i class="fa fa-bold"></i>
                                <span class="hide-menu">Borrow</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/navbar.js"></script>
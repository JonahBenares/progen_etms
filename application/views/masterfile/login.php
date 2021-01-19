<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/images/favicon.png">
    <title>Equipment and Tools Management System</title>
    <link href="<?php echo base_url(); ?>assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/dist/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/dist/css/pages/dashboard1.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/dist/css/jquery.dataTables.min.css" rel="stylesheet">      
</head>

<body class="body-login">
    <div class="container">                
            <div class="card m-t-60 shadow-login"> 
                <div class="row">  
                    <div class="col-lg-6">
                        <div class="login-back p-t-110">
                            <center>
                            <img class="float" src="<?php echo base_url(); ?>assets/images/logo3w2.png" class="m-b-20" style="width:250px">
                            </center>
                        </div>
                        
                    </div>                    
                    <div class="col-lg-6">
                        <div class="login-form p-t-50 p-r-50 p-l-40">
                            <center>
                                <img src="<?php echo base_url(); ?>assets/images/logo-nameb.png" class="m-b-20" style="width:350px">
                            </center>
                                                      
                            <form method="POST" action="<?php echo base_url(); ?>masterfile/login">
                                <div class="form-group ">
                                    <input class="form-control form-alt" type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group ">
                                    <input class="form-control form-alt" type="password" name="password" placeholder="Password">
                                </div>
                                <button class="btn btn-lg btn-dark btn-block" type="submit">SIGN IN</button>                              
                            </form>   
                            <br>
                            <?php
                            $error_msg= $this->session->flashdata('error_msg');  
                                ?>
                            <?php 
                                if($error_msg){
                            ?>
                                <div class="alert bor-radius10 alert-danger alert-shake animated headShake">
                                    <center><?php echo $error_msg; ?></center>                    
                                </div>
                            <?php } ?>                             
                        </div>
                    </div>                          
                </div>                 
            </div>
        </div>
    </div>

    </div>
    <script src="<?php echo base_url(); ?>assets/dist/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/popper/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/waves.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/sidebarmenu.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/d3/d3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/c3-master/c3.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myTable').DataTable({
                "lengthMenu": [[20, 35, 50, -1], [20, 35, 50, "All"]]
            });
        });
    </script>
</body>

</html>
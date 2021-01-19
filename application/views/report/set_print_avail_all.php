<?php $ci =& get_instance(); ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
</head>
<style type="text/css">
    .table-main{
        border:2px solid black;
        border-bottom:0px solid black;
    }
    #head{
        font-size: 14px;
    }
    .table-bordered>tbody>tr>td, 
    .table-bordered>tbody>tr>th, 
    .table-bordered>tfoot>tr>td, 
    .table-bordered>tfoot>tr>th, 
    .table-bordered>thead>tr>td, 
    .table-bordered>thead>tr>th {
        border: 1px solid #000!important;
    }
    .nomarg{
        margin: 0px;
    }
    p, .main-tab, h5, label.nomarg{
        color:#000;
    }
    .select {
       text-align-last: center;
       text-align: center;
       -ms-text-align-last: center;
       -moz-text-align-last: center;
        padding: 5px 0px!important;
        width:100%;
        border:0px;
        background:none;
        text-align:center;
        -webkit-appearance: none;
    }
    @media print{
        #back{
            display: none;
        }
    }
    body{
        padding: 20px 100px 
    }
</style>
                <td style="padding:10px;border-bottom: 2px solid #000;border-left: 2px solid #000" width="50%" align="center">
                    <h5><strong>AVAILABLE SET FORM</strong></h5>
                </td>
            </tr>
        </table>
            <table width="100%" class="table-bordered">
                <tr>                
                    <td class="main-tab" width="10%" align="center"><strong>Asset #</strong></td>
                    <td class="main-tab" width="10%" align="center"><strong>Acquisition Date</strong></td>
                    <td class="main-tab" width="40%" align="center"><strong>Description</strong></td>                    
                    <td class="main-tab" width="7%" align="center"><strong>Qty</strong></td>
                    <td class="main-tab" width="7%" align="center"><strong>U/M</strong></td>
                    <td class="main-tab" width="20%" align="center"><strong>Set Name</strong></td>
                    <td class="main-tab" width="20%" align="center"><strong>Lot No. </strong></td>
                    <td class="main-tab" width="7%" align="center"><strong>Cost</strong></td>
                    <td class="main-tab" width="8%" align="center"><strong>Total</strong></td>
                </tr>
                <tr>
                <?php 
                    if(!empty($details)){ 
                        usort($details, function($a, $b) {
                            return $a['set_id'] - $b['set_id'];
                        });
                        $previousId = '';
                        foreach($details AS $det){          
                ?>
                    <tr>
                        <td class="main-tab" align="center"><?php echo $det['asset_control_no'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['acquisition_date'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['et_desc'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['qty'];?></td>
                        <td class="main-tab" align="center"><?php echo $det['unit'];?></td>
                        <?php
                            if ($det['set_id']!=0 && ($previousId !== $det['set_id'])) { 
                        ?>
                            <td class="main-tab" align="center" <?php if($det['set_id']!=0) echo " rowspan='".$det['count_set']."'"; ?>><?php echo $det['set_name'];?></td>
                            <td class="main-tab" align="center" <?php if($det['set_id']!=0) echo " rowspan='".$det['count_set']."'"; ?>><?php echo $det['set_lot'];?></td>
                            <td class="main-tab" align="center" <?php if($det['set_id']!=0) echo " rowspan='".$det['count_set']."'"; ?>><?php echo $det['unit_price']; ?></td>
                            <td class="main-tab" align="center" <?php if($det['set_id']!=0) echo " rowspan='".$det['count_set']."'"; ?>><?php echo number_format($det['total'],2); ?></td>
                        <?php } $previousId = $det['set_id']; ?>

                    </tr>
                <?php } } else { ?> 
                    <tr>
                        <td class="main-tab" align="center" colspan='9'><center>No Data Available.</center></td>
                    </tr>
                <?php } ?>
                </tr>
                <tr>
                    <td class="main-tab" colspan="9"><center>***nothing follows***</center></td>
                </tr>  
            </table>
            <br>
            <hr>
            <small>printed by: <?php echo $_SESSION['fullname'];?> || date: <?php echo date('Y-m-d');?> || Equipment and Tool Management System </small>
        <!-- </div> -->
    </div>
    <center><a href="" id="printBtn" onclick="iprint()" class="btn btn-block btn-success m-t-50 m-b-50 animated headShake">Print</a></center>
    <script>
    function iprint() {
      window.print();
    }
    </script>
</body>
</html>
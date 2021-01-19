<script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/report.js"></script>
<link href="<?php echo base_url(); ?>assets/dist/css/printable.css" rel="stylesheet">

<div class="page-wrapper">
    <div class="container-fluid m-t-20">        
        <table class = "table-main " style = "width:100%">
            <tr>
                <td style="padding:10px;border-bottom: 2px solid #000" width="15%">
                    <img src="<?php echo base_url().LOGO;?>" width="100%" height="auto">
                </td>
                <td style="padding:10px;border-bottom: 2px solid #000;"  width="35%" >
                   <p style="margin: 0px"> <strong><?php echo COMPANY_NAME;?></strong></p>
                    <p style="margin: 0px"><?php echo ADDRESS;?></p>
                    <p style="margin: 0px"><?php echo TEL_NO;?></p>
                </td>
                <td style="padding:10px;border-bottom: 2px solid #000;border-left: 2px solid #000" width="50%" align="center">
                    <p><strong>LOST/STOLEN PROPERTY REPORT</strong></p>
                </td>
            </tr>
        </table>
        <div class="col-lg-12" style="margin:10px 0px 10px">
            <table width="100%">
                <tr>
                    <td width="15%"><p class="nomarg">Date Reported:</p></td>
                    <td width="30%" style="border-bottom: 1px solid #999"> <label class="nomarg">: </label></td>
                    <td width="20%"></td>
                    <td width="13%"><p class="nomarg pull-right">LSPR No.:</p></td>
                    <td colspan="3" style="border-bottom: 1px solid #999"> <label class="nomarg">:</label></td>
                </tr>            
            </table>
            <br>            
            <table width="100%">
                <tr>
                    <td width="10%"><p>Identify lost/stolen property:</p></td>
                    <td width="55%" style="border-bottom: 1px solid #999"> <label class="nomarg">: </label></td>
                </tr>            
            </table>
            <br>
            <table width="100%">
                <tr>
                    <td width="10%"colspan="2"><p class="pull-right">.</p></td>
                    <td></td>
                    <td></td>
                </tr>     
                <tr>
                    <td></td>
                    <td  width="5%" colspan="2"><p class="pull-right">Equipment/Tools </p></td>
                    <td style="border-bottom: 1px solid #999"> : </td>
                    <td width="10%"></td>
                </tr>        
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right">Brand </p></td>
                    <td style="border-bottom: 1px solid #999"> : </td>
                </tr>  
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right">Model </p></td>
                    <td style="border-bottom: 1px solid #999"> : </td>
                </tr> 
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right">Serial Number </p></td>
                    <td style="border-bottom: 1px solid #999"> : </td>
                </tr> 
            </table>
            <br><br>
            <table width="100%">
                <tr>
                    <td></td>
                    <td  width="20%" colspan="2"><p class="pull-right">Date last used/seen </p></td>
                    <td style="border-bottom: 1px solid #999"> : </td>
                    <td width=""></td>
                    <td  width="1%" colspan="2"><p class="pull-right">Location</p></td>
                    <td style="border-bottom: 1px solid #999"> : </td>
                    <td width="10%"></td>
                </tr>
            </table>
            <table width="100%">     
                <tr>
                    <td></td>
                    <td  width="20%" colspan="2"><p class="pull-right"><br></p></td>
                    <td > </td>
                    <td width="10%"></td>
                </tr>   
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right">Property Assigned to/Borrowed by </p></td>
                    <td style="border-bottom: 1px solid #999"> : </td>
                </tr>  
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right">Person who used last </p></td>
                    <td style="border-bottom: 1px solid #999"> : </td>
                </tr> 
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right">Date when loss noticed </p></td>
                    <td style="border-bottom: 1px solid #999"> : </td>
                </tr> 
            </table>            

            <br>
            <p>How was the property lost/stolen? (Actions leading to discovery of property loss and steps taken to locate said property)</p>
            <table width="100%">
                <tr>
                    <td width="10%"></td>
                    <td style="border-bottom: 1px solid #999"><br></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td style="border-bottom: 1px solid #999"><br></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td style="border-bottom: 1px solid #999"><br></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td style="border-bottom: 1px solid #999"><br></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td style="border-bottom: 1px solid #999"><br></td>
                </tr>
            </table>
            <br>
            <table width="100%">
                <tr>
                    <td></td>
                    <td  width="30%" colspan="2"><p class="pull-right">If stolen, was the property reported to the Police? </p></td>
                    <td width="20%"></td>
                    <td > Yes </td>
                    <td width="20%" style="border-bottom: 1px solid #999"></td>
                    <td  width="1%" colspan="2"><p class="pull-right">No</p></td>
                    <td  width="20%" style="border-bottom: 1px solid #999"> </td>
                    <td width="10%"></td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="10%"colspan="2"><p class="pull-right">.</p></td>
                    <td></td>
                    <td></td>
                </tr>     
                <tr>
                    <td></td>
                    <td  width="20%" colspan="2"><p class="pull-right">If YES, please provide the following </p></td>
                    <td style=""> : </td>
                    <td width="10%"></td>
                </tr>        
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right">Police File/Blotter No. </p></td>
                    <td style="border-bottom: 1px solid #999"> : </td>
                </tr>  
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right"> Date of File/Blotter No. </p></td>
                    <td style="border-bottom: 1px solid #999"> : </td>
                </tr> 
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right">Officer In Charge  </p></td>
                    <td style="border-bottom: 1px solid #999"> : </td>
                </tr> 
                <tr>
                    <td></td>
                    <td></td>
                    <td><p class="pull-right">Station No. </p></td>
                    <td style="border-bottom: 1px solid #999"> : </td>
                </tr> 
                <tr>
                    <td colspan="4" align="center">(Attach Police Report)</td>
                </tr>
            </table>
                                         

            <br>

            <p>Action taken by the Department Head to address loss/stolen property with responsible individual::</p>
            <table width="100%">
                <tr>
                    <td width="10%"></td>
                    <td style="border-bottom: 1px solid #999"><br></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td style="border-bottom: 1px solid #999"><br></td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td style="border-bottom: 1px solid #999"><br></td>
                </tr>
            </table>
            <br>
           <!--  <center>
                <p> Note: Tag damaged equipment. Place tag as close as possible to the damage area.</p>
                <p> Store damaged equipment directly to the repair room to ensure no one else uses it.</p>
            </center> -->
        </div>
        <div class="col-lg-12">
            <br>
             <table width="100%">
                <tr>
                    <td width="5%"></td>
                    <td width="20%" class="main-tab">Submitted by:</td>
                    <td width="10%"></td>
                    <td width="20%" class="main-tab">Checked by:</td>
                    <td width="10%"></td>
                    <td width="20%" class="main-tab">Noted by:</td>
                    <td width="5%"></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="border-bottom:1px solid #000">
                        <br>
                    </td> 
                    <td></td>
                    <td style="border-bottom:1px solid #000">
                        <br>
                    </td>
                    <td></td>
                    <td style="border-bottom:1px solid #000">
                        <br>
                    </td>
                    <td></td>
                </tr>
                 <tr>
                    <td></td>
                    <td>
                        <p></p>
                    </td> 
                    <td></td>
                    <td>
                        <center><p><!-- Asset Management Assistant --></p></center>
                    </td>
                    <td></td>
                    <td>
                        <center><p><!-- Plant Manager --></p></center>
                    </td>
                    <td></td>
                </tr>
            </table>
            <hr>
            <br>
            <br>
            <br>
        </div>
        <center><a href="" id="printBtn" onclick="iprint()" class="btn btn-success btn-block m-b-50 animated headShake">Print</a></center>
    </div>
</div>
        <!-- <footer class="footer">
            © 2018 Elegent Admin by wrappixel.com
        </footer> -->
    </div>
    <script src="<?php echo base_url(); ?>assets/dist/js/jquery.min.js"></script>
    <link href="<?php echo base_url(); ?>assets/dist/css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>assets/dist/js/select2.min.js"></script> 
    <script>
        $('.select2').select2();
    </script> 
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
        $(document).ready(function(){
            $('#employeeTable').DataTable({
                "order": [[ 1, "asc" ]]
            });
        });

        $(document).ready(function(){
            $('#myTable_avail_set').DataTable({
                "order": [[ 1, "asc" ]]
            });
        });

        $(document).ready(function(){
            $('#myTable_avail_set_emp').DataTable({
                "order": [[ 1, "asc" ]]
            });
        });

        var acc = document.getElementsByClassName("accordion1");
        var i;

        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("active1");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
              panel.style.maxHeight = null;
            } else {
              panel.style.maxHeight = panel.scrollHeight + "px";
            }
          });
        }

        function viewEmp(empid){
            window.open('<?php echo base_url(); ?>masterfile/employee_pop/'+empid, '_blank', 'top=100px,left=400px,width=600,height=450');
        }

    </script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#myTable_peret').DataTable();
            $('#myTable_peremp').DataTable();
            $('#myTable_avail').DataTable();
        } );     

        
        var mas_name = document.getElementById("mas_name");
        var mas_list = document.getElementById("mas_list");
        function nameIn(x) {            
            mas_name.setAttribute('style', 'display:none');
            mas_list.setAttribute('style', 'display:block');
        }
        function listIn(x) {
            mas_name.setAttribute('style', 'display:block');
            mas_list.setAttribute('style', 'display:none');
        }
        function nameIn1(x) {            
            mas_name1.setAttribute('style', 'display:none');
            mas_list1.setAttribute('style', 'display:block');
        }
        function listIn1(x) {
            mas_name1.setAttribute('style', 'display:block');
            mas_list1.setAttribute('style', 'display:none');
        }


        
        var rep_name = document.getElementById("rep_name");
        var rep_list = document.getElementById("rep_list");
        function repNameIn(d) {            
            rep_name.setAttribute('style', 'display:none');
            rep_list.setAttribute('style', 'display:block');
        }
        function repListIn(d) {
            rep_name.setAttribute('style', 'display:block');
            rep_list.setAttribute('style', 'display:none');
        }
        function repNameIn1(d) {            
            rep_name1.setAttribute('style', 'display:none');
            rep_list1.setAttribute('style', 'display:block');
        }
        function repListIn1(d) {
            rep_name1.setAttribute('style', 'display:block');
            rep_list1.setAttribute('style', 'display:none');
        }

        function viewReturn(accountability_id,et_id){
            window.open('<?php echo base_url(); ?>report/return_view/'+accountability_id+"/"+et_id, '_blank', 'top=30px,left=140px,width=1100,height=600');
        }
        function tagAsDamage(accountability_id,et_id){
            window.open('<?php echo base_url(); ?>report/tag_damage/'+accountability_id+"/"+et_id, '_blank', 'top=10px,left=60px,width=1250,height=650');
        }
        function assignTo(et_id){
            window.open('<?php echo base_url(); ?>report/assign/'+et_id, '_blank', 'top=100px,left=400px,width=600,height=450');
        }
        function transferPop(accountability_id,et_id){
            window.open('<?php echo base_url(); ?>report/transfer_pop/'+accountability_id+"/"+et_id, '_blank', 'top=10px,left=200px,width=900,height=650');
        }
        
        function viewEmp(empid){
            window.open('<?php echo base_url(); ?>masterfile/employee_pop/'+empid, '_blank', 'top=100px,left=400px,width=600,height=450');
        }

        var check = document.getElementById("print");
        if(check!=null){
            document.querySelector("#print").addEventListener("click", function() {
                window.print();
            });
        }

        function confirmationDelete(anchor){
            var conf = confirm('Are you sure you want to delete this record?');
            if(conf)
            window.location=anchor.attr("href");
        }

        function confirmationDeleteSet(anchor){
            var conf = confirm('Are you sure you want to Remove this as a set?');
            if(conf)
            window.location=anchor.attr("href");
        }

        function confirmationSave(anchor){
            var conf = confirm('Are you sure you want to save this record?'); 
            if(conf==true){
                document.getElementById('alt').innerHTML='<b>Please wait, Saving Data...</b>';
                $("#draft").hide();
                $("#saved").hide();
                window.location=anchor.attr("href");
            }else {
                $("#draft").show();
                $("#saved").show();
            }
        }

        function confirmationRepair(anchor){
            var conf = confirm('Are you sure you want to tag this as repair?');
            if(conf)
            window.location=anchor.attr("href");
        }

        function confirmationReturn(anchor){
            var conf = confirm('Are you sure you want to return this item/s?');
            if(conf)
            window.location=anchor.attr("href");
        }
        // 
    </script>
    <script>
        function closeWindow() {
            window.open('','_parent','');
            window.close();
        }
    </script>  

    <script>
    function iprint() {
      window.print();
    }
    </script>
    <script type="text/javascript">
        $(document).on("click", "#updateReminder_button", function () {
            var et_id = $(this).attr("data-id");
            $("#et_id").val(et_id);
        });

        $(document).on("click", "#lost_button", function () {
            var emp_id = $(this).attr("data-id");
            var accountable = $(this).attr("data-name");
            var ed_id = $(this).attr("data-ab");
            var et_id = $(this).attr("data-ac");
            $("#emp_id").val(emp_id);
            $("#accountable").val(accountable);
            $("#ed_id").val(ed_id);
            $("#et_id").val(et_id);
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#qty').blur( function(){
                var qty = document.getElementById("qty").value;
                if(qty==0 || qty==''){
                    alert('Cannot Proceed Quantity is Zero/Empty!');
                    $('#save').hide();
                }else{
                    $('#save').show();
                }
            });
        });

        $( document ).ready(function() {
            $("#sn_nos").keyup(function(){
                var serial = document.getElementById("sn_nos").value;
                if(serial!=''){
                    $("#draft").show();
                    $("#saved").show();
                    $("#alt").hide();
                }else {
                    $("#alt").show();
                    $("#draft").hide();
                    $("#saved").hide();
                }
            });
        });
    </script>


</body>

</html>
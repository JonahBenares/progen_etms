<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterfile extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('super_model');
        $this->dropdown['delete_item']=$this->super_model->custom_query("SELECT * FROM et_head eh INNER JOIN et_details ed ON eh.et_id=ed.et_id");
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/welcome
	 *	- or -
	 * 		http://example.com/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	  function arrayToObject($array){
            if(!is_array($array)) { return $array; }
            $object = new stdClass();
            if (is_array($array) && count($array) > 0) {
                foreach ($array as $name=>$value) {
                    $name = strtolower(trim($name));
                    if (!empty($name)) { $object->$name = arrayToObject($value); }
                }
                return $object;
            } 
            else {
                return false;
            }
        }

	}

    public function index(){  
        $this->load->view('masterfile/login');
    }

    public function dashboard()
    {
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $this->load->view('masterfile/dashboard');
        $this->load->view('template/footer');
    }

	public function login(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $count=$this->super_model->login_user($username,$password);
        if($count>0){   
            $password1 =md5($this->input->post('password'));
            $fetch=$this->super_model->select_custom_where("users", "username = '$username' AND (password = '$password' OR password = '$password1')");
            foreach($fetch AS $d){
                $userid = $d->user_id;
                $username = $d->username;
                $fullname = $d->fullname;
                $usertype = $d->usertype;
            }
            $newdata = array(
               'user_id'=> $userid,
               'username'=> $username,
               'fullname'=> $fullname,
               'usertype'=> $usertype,
               'logged_in'=> TRUE
            );
            $this->session->set_userdata($newdata);
            redirect(base_url().'masterfile/dashboard/');
        }
        else{
            $this->session->set_flashdata('error_msg', 'Username And Password Do not Exist!');
            $this->load->view('template/header');
            $this->load->view('masterfile/login');
            $this->load->view('template/footer');       
        }
    }


    public function user_logout(){
        $this->session->sess_destroy();
        $this->load->view('masterfile/login');
        echo "<script>alert('You have successfully logged out.'); 
        window.location ='".base_url()."masterfile/index'; </script>";
    }

	public function employee_list(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['location'] = $this->super_model->select_all_order_by('location', 'location_name', 'ASC');
        $row=$this->super_model->count_rows("employees");
        if($row!=0){
            foreach($this->super_model->select_all_order_by('employees', 'employee_name', 'ASC') AS $emp){
                $location= $this->super_model->select_column_where('location', 'location_name', 'location_id', $emp->location_id);
                $data['employee'][] = array(
                    'id'=>$emp->employee_id,
                    'name'=>$emp->employee_name,
                    'department'=>$emp->department,
                    'location'=>$location,
                    'position'=>$emp->position,
                    'aaf_no'=>$emp->aaf_no,
                    'type'=>$emp->type,
                    'status'=>$emp->status,
                );
            }
        }else {
            $data['employee'] = array();
        }

        $this->load->view('masterfile/employee_list',$data);
        $this->load->view('template/footer');
    }

    public function employee_suggest(){
        $employee=$this->input->post('employee');
        $rows=$this->super_model->count_custom_where("employees","employee_name LIKE '%$employee%' AND type='1'");
        if($rows!=0){
             echo "<ul id='name-item'>";
            foreach($this->super_model->select_custom_where("employees", "employee_name LIKE '%$employee%' AND type='1'") AS $acct){ 
                    ?>
                   <li onClick="selectEmp('<?php echo $acct->employee_id; ?>','<?php echo $acct->employee_name; ?>')"><?php echo $acct->employee_name; ?></li>
                <?php 
            }
             echo "<ul>";
        }
    }

    public function employee_pop(){  
        $this->load->view('template/header');
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $row=$this->super_model->count_rows_where("employee_inclusion","parent_id",$id);
        $data['employee'] = $this->super_model->select_all_order_by('employees', 'employee_name', 'ASC');
        if($row!=0){
            foreach($this->super_model->select_row_where("employee_inclusion","parent_id",$id) AS $multi){
                $employee_name =$this->super_model->select_column_custom_where("employees", "employee_name", "status = '0' AND employee_id = '$multi->child_id'");
                $status = $this->super_model->select_column_where("employees","status","employee_id",$multi->child_id);
                $data['multi_emp'][] = array(
                    'id'=>$multi->child_id,
                    'emp_name'=>$employee_name,
                    'eid'=>$multi->ei_id,
                    'parent'=>$multi->parent_id,
                    'child_id'=>$multi->child_id,
                    'status'=>$status,
                );
            }
        }else{
            $data['multi_emp'] = array();
        }
        $this->load->view('masterfile/employee_pop',$data);
        $this->load->view('template/footer');
    }

    public function delete_employee_pop(){
        $id=$this->uri->segment(3);
        $parent=$this->uri->segment(4);
        $child=$this->uri->segment(5);
        $row = $this->super_model->count_rows_where("et_head","accountability_id",$child);
        if($row!=0){
           echo "<script>alert('You cannot delete this record!');window.opener.location.reload();window.location = '".base_url()."masterfile/employee_pop/$parent';</script>";
        }else{
            if($this->super_model->delete_where('employee_inclusion', 'ei_id', $id)){
                echo "<script>alert('Succesfully Deleted');
                window.opener.location.reload();window.location = '".base_url()."masterfile/employee_pop/$parent'; </script>";
            }
        }
    }

    public function transfer_dept(){
        $office = $this->input->post('office');
        $eid = $this->input->post('eid');
        $emp_name = $this->input->post('emp_name');
        $data = array(
            'parent_id'=>$office,
            'child_id'=>$emp_name
        );
        $this->super_model->delete_where('employee_inclusion', 'ei_id', $eid);
        $this->super_model->insert_into("employee_inclusion", $data);
        echo "<script>alert('Succesfully Transfered'); window.close();window.opener.location.reload();</script>";
    }

    public function insert_employee(){
        $employee = trim($this->input->post('employee')," ");
        $position = trim($this->input->post('position')," ");
        $department = trim($this->input->post('department')," ");
        $location = trim($this->input->post('location')," ");
        $aaf_no = trim($this->input->post('aaf_no')," ");
        $status = trim($this->input->post('status')," ");
        $row = $this->super_model->count_rows_where("employees","employee_name",$employee);
        if($row!=0){
            echo "<script>alert('$employee is already encoded!'); </script>";
            redirect(base_url().'masterfile/employee_list');
        }else {
            $data = array(
                'employee_name'=>$employee,
                'location_id'=>$location,
                'aaf_no'=>$aaf_no,
                'position'=>$position,
                'department'=>$department,
                'type'=>1,
                'status'=>$status,
            );
            if($this->super_model->insert_into("employees", $data)){
                $emp=explode("-", $this->input->post('aaf_no'));
                $one=$emp[0];
                $two=$emp[1];
                $three = (!empty($emp[2])) ? $emp[2] : '';
                if(!empty($one) && !empty($two) && !empty($three)){ 
                    $aaf_prefix1=$emp[0];
                    $aaf_prefix2=$emp[1];
                    $aaf_prefix=$aaf_prefix1."-".$aaf_prefix2;
                    $series = $emp[2];
                }else {
                    $aaf_prefix=$emp[0];
                    $series = $emp[1];
                }

                $emp_data= array(
                    'aaf_prefix'=>$aaf_prefix,
                    'series'=>$series
                );
                $this->super_model->insert_into("employee_series", $emp_data);
                echo "<script>alert('Successfully Added!');  </script>";
                 redirect(base_url().'masterfile/employee_list');   
            }
        }
    }

    public function employee_update(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['location'] = $this->super_model->select_all_order_by('location', 'location_name', 'ASC');
        $data['employee'] = $this->super_model->select_row_where('employees', 'employee_id', $id);
        $this->load->view('masterfile/employee_update',$data);
        $this->load->view('template/footer');
    }

    public function update_employee(){
        $empid = $this->input->post('employee_id');
        foreach($this->super_model->select_row_where('employees', 'employee_id', $empid) AS $emp){
            if(empty($emp->aff_no)){
                $aaf_no = $this->input->post('aaf_no');
                $data = array(
                    'employee_name'=>$this->input->post('employee'),
                    'position'=>$this->input->post('position'),
                    'department'=>$this->input->post('department'),
                    'location_id'=>$this->input->post('location'),
                    'status'=>$this->input->post('status'),
                    'aaf_no'=>$aaf_no
                );
                if($this->super_model->update_where('employees', $data, 'employee_id', $empid)){
                    $emp=explode("-", $this->input->post('aaf_no'));
                    $one=$emp[0];
                    $two=$emp[1];
                    $three = (!empty($emp[2])) ? $emp[2] : '';
                    if(!empty($one) && !empty($two) && !empty($three)){ 
                        $aaf_prefix1=$emp[0];
                        $aaf_prefix2=$emp[1];
                        $aaf_prefix=$aaf_prefix1."-".$aaf_prefix2;
                        $series = $emp[2];
                    }else {
                        $aaf_prefix=$emp[0];
                        $series = $emp[1];
                    }

                    $emp_data= array(
                        'aaf_prefix'=>$aaf_prefix,
                        'series'=>$series
                    );

                    $this->super_model->insert_into("employee_series", $emp_data);
                    echo "<script>alert('Successfully Updated!'); 
                        window.location ='".base_url()."masterfile/employee_list'; </script>";
                }
            }else {
                $aaf_no = $this->input->post('aaf_no');
                $data = array(
                    'employee_name'=>$this->input->post('employee'),
                    'position'=>$this->input->post('position'),
                    'department'=>$this->input->post('department'),
                    'location_id'=>$this->input->post('location'),
                    'status'=>$this->input->post('status'),
                    'aaf_no'=>$aaf_no,
                );
                if($this->super_model->update_where('employees', $data, 'employee_id', $empid)){
                    $emp=explode("-", $this->input->post('aaf_no'));
                    $one=$emp[0];
                    $two=$emp[1];
                    $three = (!empty($emp[2])) ? $emp[2] : '';
                    if(!empty($one) && !empty($two) && !empty($three)){ 
                        $aaf_prefix1=$emp[0];
                        $aaf_prefix2=$emp[1];
                        $aaf_prefix=$aaf_prefix1."-".$aaf_prefix2;
                        $series = $emp[2];
                    }else {
                        $aaf_prefix=$emp[0];
                        $series = $emp[1];
                    }

                    echo "<script>alert('Successfully Updated!'); 
                        window.location ='".base_url()."masterfile/employee_list'; </script>";
                }
            }
        }
    }

    public function getLocation(){
        $location = $this->input->post('location');
        $aaf_prefix= $this->super_model->select_column_where('location', 'location_prefix', 'location_id', $location);
        $rows=$this->super_model->count_custom_where("employee_series","aaf_prefix = '$aaf_prefix'");
        if($rows==0){
            $aaf_no= $aaf_prefix."-1001";
        } else {
            $series = $this->super_model->get_max_where("employee_series", "series","aaf_prefix = '$aaf_prefix'");
            $next=$series+1;
            $aaf_no = $aaf_prefix."-".$next;
        }
        echo '<option value="'. $aaf_no .'">'. $aaf_no .'</option>';
    }

    public function delete_employee(){
        $id=$this->uri->segment(3);
        $row = $this->super_model->count_rows_where("et_head","accountability_id",$id);
        if($row!=0){
            echo "<script>alert('You cannot delete this record!'); 
                    window.location ='".base_url()."masterfile/employee_list'; </script>";
        }else{
            if($this->super_model->delete_where('employees', 'employee_id', $id)){
                echo "<script>alert('Succesfully Deleted'); 
                    window.location ='".base_url()."masterfile/employee_list'; </script>";
            }
        }
    }

    public function physical_list(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['physical'] = $this->super_model->select_all_order_by('physical_condition', 'condition_name', 'ASC');
        $this->load->view('masterfile/physical_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_physical(){
        $condition = trim($this->input->post('condition')," ");
        $row = $this->super_model->count_rows_where("physical_condition","condition_name",$condition);
        if($row!=0){
            echo "<script>alert('$condition is already encoded!'); 
                    window.location ='".base_url()."masterfile/physical_list'; </script>";
        }else {
            $data = array(
                'condition_name'=>$condition
            );
            if($this->super_model->insert_into("physical_condition", $data)){
               echo "<script>alert('Successfully Added!'); 
                    window.location ='".base_url()."masterfile/physical_list'; </script>";
            }
        }
    }

    public function physical_update(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['physical'] = $this->super_model->select_row_where('physical_condition', 'physical_id', $id);
        $this->load->view('masterfile/physical_update',$data);
        $this->load->view('template/footer');
    }

    public function update_physical(){
        $data = array(
            'condition_name'=>$this->input->post('condition')
        );
        $physical_id = $this->input->post('physical_id');
            if($this->super_model->update_where('physical_condition', $data, 'physical_id', $physical_id)){
            echo "<script>alert('Successfully Updated!'); 
                window.location ='".base_url()."masterfile/physical_list'; </script>";
        }
    }

    public function delete_physical(){
        $id=$this->uri->segment(3);
        $row = $this->super_model->count_rows_where("et_details","physical_id",$id);
        if($row!=0){
            echo "<script>alert('You cannot delete this record!'); 
                    window.location ='".base_url()."masterfile/physical_list'; </script>";
        }else{
            if($this->super_model->delete_where('physical_condition', 'physical_id', $id)){
                echo "<script>alert('Succesfully Deleted'); 
                    window.location ='".base_url()."masterfile/physical_list'; </script>";
            }
        }
    }

    public function loc_list(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['location'] = $this->super_model->select_all_order_by('location', 'location_name', 'ASC');
        $this->load->view('masterfile/loc_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_location(){
        $trim = trim($this->input->post('location')," ");
        $prefix = trim($this->input->post('prefix')," ");
        $row = $this->super_model->count_rows_where("location","location_name",$trim);
        if($row!=0){
            echo "<script>alert('$trim is already encoded!'); 
                    window.location ='".base_url()."masterfile/loc_list'; </script>";
        }else {
            $data = array(
                'location_name'=>$trim,
                'location_prefix'=>$prefix
            );
            if($this->super_model->insert_into("location", $data)){
               echo "<script>alert('Successfully Added!'); 
                    window.location ='".base_url()."masterfile/loc_list'; </script>";
            }
        }
    }

    public function loc_update(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['location'] = $this->super_model->select_row_where('location', 'location_id', $id);
        $this->load->view('masterfile/loc_update',$data);
        $this->load->view('template/footer');
    }

    public function update_location(){
        $data = array(
            'location_name'=>$this->input->post('location'),
            'location_prefix'=>$this->input->post('prefix')
        );
        $locid = $this->input->post('location_id');
            if($this->super_model->update_where('location', $data, 'location_id', $locid)){
            echo "<script>alert('Successfully Updated!'); 
                window.location ='".base_url()."masterfile/loc_list'; </script>";
        }
    }

    public function delete_location(){
        $id=$this->uri->segment(3);
        $row = $this->super_model->count_rows_where("employees","location_id",$id);
        if($row!=0){
            echo "<script>alert('You cannot delete this record!'); 
                    window.location ='".base_url()."masterfile/loc_list'; </script>";
        }else{
            if($this->super_model->delete_where('location', 'location_id', $id)){
                echo "<script>alert('Succesfully Deleted'); 
                    window.location ='".base_url()."masterfile/loc_list'; </script>";
            }
        }
    }

    public function placement_list(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['placement'] = $this->super_model->select_all_order_by('placement', 'placement_name', 'ASC');
        $this->load->view('masterfile/placement_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_placement(){
        $placement = trim($this->input->post('placement')," ");
        $row = $this->super_model->count_rows_where("placement","placement_name",$placement);
        if($row!=0){
            echo "<script>alert('$placement is already encoded!'); 
                    window.location ='".base_url()."masterfile/placement_list'; </script>";
        }else {
            $data = array(
                'placement_name'=>$placement
            );
            if($this->super_model->insert_into("placement", $data)){
               echo "<script>alert('Successfully Added!'); 
                    window.location ='".base_url()."masterfile/placement_list'; </script>";
            }
        }
    }

    public function placement_update(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['placement'] = $this->super_model->select_row_where('placement', 'placement_id', $id);
        $this->load->view('masterfile/placement_update',$data);
        $this->load->view('template/footer');
    }

    public function update_placement(){
        $data = array(
            'placement_name'=>$this->input->post('placement')
        );
        $placement_id = $this->input->post('placement_id');
            if($this->super_model->update_where('placement', $data, 'placement_id', $placement_id)){
            echo "<script>alert('Successfully Updated!'); 
                window.location ='".base_url()."masterfile/placement_list'; </script>";
        }
    }

    public function delete_placement(){
        $id=$this->uri->segment(3);
        $row = $this->super_model->count_rows_where("et_details","placement_id",$id);
        if($row!=0){
            echo "<script>alert('You cannot delete this record!'); 
                    window.location ='".base_url()."masterfile/placement_list'; </script>";
        }else{
            if($this->super_model->delete_where('placement', 'placement_id', $id)){
                echo "<script>alert('Succesfully Deleted'); 
                    window.location ='".base_url()."masterfile/placement_list'; </script>";
            }
        }
    }

    public function rack_list(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['rack'] = $this->super_model->select_all_order_by('rack', 'rack_name', 'ASC');
        $this->load->view('masterfile/rack_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_rack(){
        $rack = trim($this->input->post('rack')," ");
        $row = $this->super_model->count_rows_where("rack","rack_name",$rack);
        if($row!=0){
            echo "<script>alert('$rack is already encoded!'); 
                    window.location ='".base_url()."masterfile/rack_list'; </script>";
        }else {
            $data = array(
                'rack_name'=>$rack
            );
            if($this->super_model->insert_into("rack", $data)){
               echo "<script>alert('Successfully Added!'); 
                    window.location ='".base_url()."masterfile/rack_list'; </script>";
            }
        }
    }

    public function rack_update(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['rack'] = $this->super_model->select_row_where('rack', 'rack_id', $id);
        $this->load->view('masterfile/rack_update',$data);
        $this->load->view('template/footer');
    }

    public function update_rack(){
        $data = array(
            'rack_name'=>$this->input->post('rack')
        );
        $rack_id = $this->input->post('rack_id');
            if($this->super_model->update_where('rack', $data, 'rack_id', $rack_id)){
            echo "<script>alert('Successfully Updated!'); 
                window.location ='".base_url()."masterfile/rack_list'; </script>";
        }
    }

    public function delete_rack(){
        $id=$this->uri->segment(3);
        $row = $this->super_model->count_rows_where("et_details","rack_id",$id);
        if($row!=0){
            echo "<script>alert('You cannot delete this record!'); 
                    window.location ='".base_url()."masterfile/rack_list'; </script>";
        }else{
            if($this->super_model->delete_where('rack', 'rack_id', $id)){
                echo "<script>alert('Succesfully Deleted'); 
                    window.location ='".base_url()."masterfile/rack_list'; </script>";
            }
        }
    }

    public function uom_list(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['unit'] = $this->super_model->select_all_order_by('unit', 'unit_name', 'ASC');
        $this->load->view('masterfile/uom_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_unit(){
        $trim = trim($this->input->post('unit')," ");
        $row = $this->super_model->count_rows_where("unit","unit_name",$trim);
        if($row!=0){
            echo "<script>alert('$trim is already encoded!'); 
                    window.location ='".base_url()."masterfile/uom_list'; </script>";
        }else {
            $data = array(
                'unit_name'=>$trim
            );
            if($this->super_model->insert_into("unit", $data)){
               echo "<script>alert('Successfully Added!'); 
                    window.location ='".base_url()."masterfile/uom_list'; </script>";
            }    
        }        
    }

    public function uom_update(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['unit'] = $this->super_model->select_row_where('unit', 'unit_id', $id);
        $this->load->view('masterfile/uom_update',$data);
        $this->load->view('template/footer');
    }

    public function update_unit(){
        $data = array(
            'unit_name'=>$this->input->post('unit')
        );
        $unid = $this->input->post('unit_id');
            if($this->super_model->update_where('unit', $data, 'unit_id', $unid)){
            echo "<script>alert('Successfully Updated!'); 
                window.location ='".base_url()."masterfile/uom_list'; </script>";
        }
    }

    public function delete_unit(){
        $id=$this->uri->segment(3);
        $row = $this->super_model->count_rows_where("et_head","unit_id",$id);
        if($row!=0){
            echo "<script>alert('You cannot delete this record!'); 
                    window.location ='".base_url()."masterfile/uom_list'; </script>";
        }else{
            if($this->super_model->delete_where('unit', 'unit_id', $id)){
                echo "<script>alert('Succesfully Deleted'); 
                    window.location ='".base_url()."masterfile/uom_list'; </script>";
            }
        }
    }

    public function currency_list(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['currency'] = $this->super_model->select_all_order_by('currency', 'currency_name', 'ASC');
        $this->load->view('masterfile/currency_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_currency(){
        $trim = trim($this->input->post('currency')," ");
        $row = $this->super_model->count_rows_where("currency","currency_name",$trim);
        if($row!=0){
            echo "<script>alert('$trim is already encoded!'); 
                    window.location ='".base_url()."masterfile/currency_list'; </script>";
        }else {
            $data = array(
                'currency_name'=>$trim
            );
            if($this->super_model->insert_into("currency", $data)){
               echo "<script>alert('Successfully Added!'); 
                    window.location ='".base_url()."masterfile/currency_list'; </script>";
            }    
        }        
    }

    public function currency_update(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['currency'] = $this->super_model->select_row_where('currency', 'currency_id', $id);
        $this->load->view('masterfile/currency_update',$data);
        $this->load->view('template/footer');
    }

    public function update_currency(){
        $data = array(
            'currency_name'=>$this->input->post('currency')
        );
        $curid = $this->input->post('currency_id');
            if($this->super_model->update_where('currency', $data, 'currency_id', $curid)){
            echo "<script>alert('Successfully Updated!'); 
                window.location ='".base_url()."masterfile/currency_list'; </script>";
        }
    }

    public function delete_currency(){
        $id=$this->uri->segment(3);
        $row = $this->super_model->count_rows_where("et_details","currency_id",$id);
        if($row!=0){
            echo "<script>alert('You cannot delete this record!'); 
                    window.location ='".base_url()."masterfile/currency_list'; </script>";
        }else{
            if($this->super_model->delete_where('currency', 'currency_id', $id)){
                echo "<script>alert('Succesfully Deleted'); 
                    window.location ='".base_url()."masterfile/currency_list'; </script>";
            }
        }
    }

    public function company_list(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['company'] = $this->super_model->select_all_order_by('company', 'company_name', 'ASC');
        $this->load->view('masterfile/company_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_company(){
        $company = trim($this->input->post('company')," ");
        $row = $this->super_model->count_rows_where("company","company_name",$company);
        if($row!=0){
            echo "<script>alert('$company is already encoded!'); 
                    window.location ='".base_url()."masterfile/company_list'; </script>";
        }else {
            $data = array(
                'company_name'=>$company
            );
            if($this->super_model->insert_into("company", $data)){
               echo "<script>alert('Successfully Added!'); 
                    window.location ='".base_url()."masterfile/company_list'; </script>";
            }
        }
    }

    public function company_update(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['company'] = $this->super_model->select_row_where('company', 'company_id', $id);
        $this->load->view('masterfile/company_update',$data);
        $this->load->view('template/footer');
    }

    public function update_company(){
        $data = array(
            'company_name'=>$this->input->post('company')
        );
        $company_id = $this->input->post('company_id');
            if($this->super_model->update_where('company', $data, 'company_id', $company_id)){
            echo "<script>alert('Successfully Updated!'); 
                window.location ='".base_url()."masterfile/company_list'; </script>";
        }
    }

    public function delete_company(){
        $id=$this->uri->segment(3);
        $row = $this->super_model->count_rows_where("et_details","company_id",$id);
        if($row!=0){
            echo "<script>alert('You cannot delete this record!'); 
                    window.location ='".base_url()."masterfile/company_list'; </script>";
        }else{
            if($this->super_model->delete_where('company', 'company_id', $id)){
                echo "<script>alert('Succesfully Deleted'); 
                    window.location ='".base_url()."masterfile/company_list'; </script>";
            }
        }
    }

    public function add_subcat(){  
        $this->load->view('template/header');
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['location'] = $this->super_model->select_all_order_by('location',"location_name",'ASC');
        $data['cat'] = $this->super_model->select_row_where('category', 'category_id', $id);
        $this->load->view('masterfile/add_subcat',$data);
        $this->load->view('template/footer');
    }

    public function insert_subcat(){
        $prefix = trim($this->input->post('prefix')," ");
        $sub_name = trim($this->input->post('subcat')," ");
        $desc = trim($this->input->post('desc')," ");
        $location = trim($this->input->post('location')," ");
        $row = $this->super_model->count_rows_where("subcategory","subcat_name",$sub_name);
        if($row!=0){
            echo "<script>alert('$sub_name is already encoded!'); window.opener.location.reload(); window.close();</script>";
        }else {
            $data = array(
                'category_id'=>$this->input->post('category_id'),
                'location'=>$location,
                'subcat_prefix'=>$prefix,
                'subcat_name'=> $sub_name,
                'subcat_desc'=> $desc,
            );
            if($this->super_model->insert_into("subcategory", $data)){
               echo "<script>alert('Successfully Added!'); window.opener.location.reload(); window.close();</script>";
            }
        }
    }

    public function edit_subcat_modal(){  
        $this->load->view('template/header');
        $data['id']=$this->input->post('id');
        $id=$this->input->post('id');
        $data['subcat'] = $this->super_model->select_row_where('subcategory', 'subcat_id', $id);
        $data['location'] = $this->super_model->select_all_order_by('location', 'location_name', 'ASC');
        $this->load->view('masterfile/edit_subcat_modal',$data);
    }

    public function update_subcategory(){
        $data = array(
            'subcat_name'=>$this->input->post('subcat'),
            'subcat_prefix'=>$this->input->post('prefix'),
            'location'=>$this->input->post('location'),
            'subcat_desc'=>$this->input->post('desc'),
        );
        $subid = $this->input->post('subcat_id');
            if($this->super_model->update_where('subcategory', $data, 'subcat_id', $subid)){
            echo "<script>alert('Successfully Updated!'); 
                window.location ='".base_url()."masterfile/categ_list'; </script>";
        }
    }

    public function categ_list(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['category'] = $this->super_model->select_all('category'); 
        foreach($this->super_model->select_all('subcategory') AS $s){
            $data['subcat'][]=array(
                'subcat_id'=>$s->subcat_id,
                'category_id'=>$s->category_id,
                'subcat_name'=>$s->subcat_name,
                'subcat_prefix'=>$s->subcat_prefix,
                'subcat_desc'=>$s->subcat_desc,
                'location'=>$s->location,
            );
        }
        $this->load->view('masterfile/categ_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_category(){
        $cat_name = trim($this->input->post('category')," ");
        $row = $this->super_model->count_rows_where("category","category_name",$cat_name);
        if($row!=0){
            echo "<script>alert('$cat_name is already encoded!'); 
                    window.location ='".base_url()."masterfile/categ_list'; </script>";
        }else {
            $data = array(
                'category_name'=>$cat_name
            );
            if($this->super_model->insert_into("category", $data)){
               echo "<script>alert('Successfully Added!'); 
                    window.location ='".base_url()."masterfile/categ_list'; </script>";
            }
        }
    }

    public function categ_update(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['category'] = $this->super_model->select_row_where('category', 'category_id', $id);
        $this->load->view('masterfile/categ_update',$data);
        $this->load->view('template/footer');
    }

    public function update_category(){
        $data = array(
            'category_name'=>$this->input->post('category')
        );
        $catid = $this->input->post('category_id');
            if($this->super_model->update_where('category', $data, 'category_id', $catid)){
            echo "<script>alert('Successfully Updated!'); 
                window.location ='".base_url()."masterfile/categ_list'; </script>";
        }
    }

    public function emp_inclusion_list(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['location'] = $this->super_model->select_all_order_by('location', 'location_name', 'ASC');
        $row=$this->super_model->count_rows("employees");
        if($row!=0){
            foreach($this->super_model->select_all_order_by('employees', 'employee_name', 'ASC') AS $emp){
                $location= $this->super_model->select_column_where('location', 'location_name', 'location_id', $emp->location_id);
                $data['employee'][] = array(
                    'id'=>$emp->employee_id,
                    'name'=>$emp->employee_name,
                    'location'=>$location,
                    'position'=>$emp->position,
                    'aaf_no'=>$emp->aaf_no,
                    'type'=>$emp->type
                );
                $rows=$this->super_model->count_rows("employee_inclusion");
                if($rows!=0){
                    foreach($this->super_model->select_row_where("employee_inclusion", "parent_id", $emp->employee_id) AS $em){
                        $emp = $this->super_model->select_column_custom_where('employees', 'employee_name', "employee_id = '$em->child_id'");
                        $status = $this->super_model->select_column_custom_where('employees', 'status', "employee_id = '$em->child_id'");
                        $data['ems'][] = array(
                            'eid'=>$em->ei_id,
                            'id'=>$em->parent_id,
                            'employee' => $emp,
                            'status' => $status,
                        ); 
                    }
                }else {
                    $data['ems'] = array();
                }
            }
        }else {
            $data['employee'] = array();
        }

        $this->load->view('masterfile/emp_inclusion_list',$data);
        $this->load->view('template/footer');
    }

    public function insert_employee_inc(){
        $department = trim($this->input->post('department')," ");
        $location = trim($this->input->post('location')," ");
        $aaf_no = trim($this->input->post('aaf_no')," ");
        $row = $this->super_model->count_rows_where("employees","employee_name",$department);
        if($row!=0){
            echo "<script>alert('$department is already encoded!');</script>";
             redirect(base_url().'masterfile/emp_inclusion_list');        
        } else {
            $data = array(
                'employee_name'=>$department,
                'location_id'=>$location,
                'aaf_no'=>$aaf_no,
                'type'=>2
            );
            if($this->super_model->insert_into("employees", $data)){
                $emp=explode("-", $this->input->post('aaf_no'));
                $one=$emp[0];
                $two=$emp[1];
                $three = (!empty($emp[2])) ? $emp[2] : '';
                if(!empty($one) && !empty($two) && !empty($three)){ 
                    $aaf_prefix1=$emp[0];
                    $aaf_prefix2=$emp[1];
                    $aaf_prefix=$aaf_prefix1."-".$aaf_prefix2;
                    $series = $emp[2];
                }else {
                    $aaf_prefix=$emp[0];
                    $series = $emp[1];
                }
                $emp_data= array(
                    'aaf_prefix'=>$aaf_prefix,
                    'series'=>$series
                );
                $this->super_model->insert_into("employee_series", $emp_data);
                redirect(base_url().'masterfile/emp_inclusion_list');
            }
        }
    }

    public function insert_multiemp(){
        $employee = $this->input->post('employee_id');
        $empid = $this->input->post('empid');
        $data = array(
            'parent_id'=>$empid,
            'child_id'=>$employee
        );
        $count =$this->super_model->count_custom_where("employee_inclusion","child_id = '$employee' AND parent_id = '$empid'");
        if($count!=0){
            echo "<script>alert('This employee is already encoded!'); window.opener.location.reload();window.location = '".base_url()."masterfile/employee_pop/$empid';</script>";
        }else {
            if($this->super_model->insert_into("employee_inclusion", $data)){
                echo "<script>alert('Successfully Added!'); window.opener.location.reload();window.location = '".base_url()."masterfile/employee_pop/$empid';</script>";
            }
        }
    }

    public function office_update(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        $data['location'] = $this->super_model->select_all_order_by('location', 'location_name', 'ASC');
        $data['employee'] = $this->super_model->select_row_where('employees', 'employee_id', $id);
        $this->load->view('masterfile/office_update',$data);
        $this->load->view('template/footer');
    }

    public function update_office(){
        $data = array(
            'employee_name'=>$this->input->post('office'),
            'location_id'=>$this->input->post('location'),
            'aaf_no'=>$this->input->post('aaf_no'),
        );
        $employee_id = $this->input->post('employee_id');
        if($this->super_model->update_where('employees', $data, 'employee_id', $employee_id)){
            $emp=explode("-", $this->input->post('aaf_no'));
            $one=$emp[0];
            $two=$emp[1];
            $three = (!empty($emp[2])) ? $emp[2] : '';
            if(!empty($one) && !empty($two) && !empty($three)){ 
                $aaf_prefix1=$emp[0];
                $aaf_prefix2=$emp[1];
                $aaf_prefix=$aaf_prefix1."-".$aaf_prefix2;
                $series = $emp[2];
            }else {
                $aaf_prefix=$emp[0];
                $series = $emp[1];
            }
            $count=$this->super_model->count_custom_where("employee_series","aaf_prefix='$aaf_prefix' AND series='$series'");
            if($count==0){
                $emp_data= array(
                    'aaf_prefix'=>$aaf_prefix,
                    'series'=>$series
                );
                $this->super_model->insert_into("employee_series", $emp_data);
            }
            echo "<script>alert('Successfully Updated!'); window.location ='".base_url()."masterfile/emp_inclusion_list'; </script>";
        }
    }

    public function delete_office(){
        $id=$this->uri->segment(3);
        $row = $this->super_model->count_rows_where("et_head","accountability_id",$id);
        if($row!=0){
            echo "<script>alert('You cannot delete this record!'); 
                    window.location ='".base_url()."masterfile/emp_inclusion_list'; </script>";
        }else{
            if($this->super_model->delete_where('employees', 'employee_id', $id)){
                $this->super_model->delete_where('employee_inclusion', 'parent_id', $id);
                echo "<script>alert('Succesfully Deleted'); 
                    window.location ='".base_url()."masterfile/emp_inclusion_list'; </script>";
            }
        }
    }

    public function delete_item(){
        $multid = $this->input->post('edid_no');
        $multi=explode(',',$multid);
        $edid=$multi[0];
        $etid=$multi[1];
        foreach($this->super_model->select_row_where("et_details","ed_id",$edid) AS $et){ 
            $count_et=$this->super_model->count_rows_where("et_details","et_id",$et->et_id);
            $qty=$this->super_model->select_column_where("et_head","qty","et_id",$etid);
            $newqty=$qty-1;
            if($count_et>1){ 
                $data = array(
                    'qty'=>$newqty
                );
                $this->super_model->update_where('et_head', $data, 'et_id', $et->et_id);
                $this->super_model->delete_where('et_details', 'ed_id', $edid);
            }else {
                $this->super_model->delete_where('et_head', 'et_id', $et->et_id);
                $this->super_model->delete_where('et_details', 'ed_id', $edid);
            }
        }

        foreach($this->super_model->select_row_where("return_details","ed_id",$edid) AS $ret){
            $count_return=$this->super_model->count_rows_where("return_details","return_id",$ret->return_id);
            if($count_return>1){ 
                $this->super_model->delete_where('return_details', 'ed_id', $edid);
            }else {
                $this->super_model->delete_where('return_head', 'return_id', $ret->return_id);
                $this->super_model->delete_where('return_details', 'ed_id', $edid);
            }
        }

        foreach($this->super_model->select_row_where("borrow_details","ed_id",$edid) AS $bh){
            $count_borrow=$this->super_model->count_rows_where("borrow_details","bh_id",$bh->bh_id);
            if($count_borrow>1){ 
                $this->super_model->delete_where('borrow_details', 'ed_id', $edid);
            }else {
                $this->super_model->delete_where('borrow_head', 'bh_id', $bh->bh_id);
                $this->super_model->delete_where('borrow_details', 'ed_id', $edid);
            }
        }
        $this->super_model->delete_where('damage_info', 'ed_id', $edid);
        $this->super_model->delete_where('lost_items', 'ed_id', $edid);
        $this->super_model->delete_where('repair_details', 'ed_id', $edid);
        echo "<script type='text/javascript'>alert('Successfully Deleted!');</script>";
        echo "<script>location.replace(document.referrer);</script>";
    }

    public function get_name($col, $table, $whr_clm, $whr_val){
        $column = $this->super_model->select_column_where($table, $col, $whr_clm, $whr_val);
        return $column;
    }
}

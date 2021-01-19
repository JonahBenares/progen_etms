<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encode extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        date_default_timezone_set("Asia/Manila");
        $this->load->model('super_model');
        $this->dropdown['delete_item']=$this->super_model->custom_query("SELECT * FROM et_head eh INNER JOIN et_details ed ON eh.et_id=ed.et_id");
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

    public function encode_et(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['location'] = $this->super_model->select_all_order_by('location', 'location_name', 'ASC');
        $data['unit'] = $this->super_model->select_all_order_by('unit', 'unit_name', 'ASC');
        $data['cat'] = $this->super_model->select_all_order_by('category', 'category_name', 'ASC');
        $data['sub'] = $this->super_model->select_all_order_by('subcategory', 'subcat_name', 'ASC');
        $this->load->view('encode/encode_et',$data);
        $this->load->view('template/footer');
    }

    public function encode_next(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown); 
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);   
        $data['qty'] = $this->super_model->select_column_where("et_head", "qty", "et_id", $id);
        $data['currency'] = $this->super_model->select_all_order_by('currency', 'currency_name', 'ASC');
        $data['company'] = $this->super_model->select_all_order_by('company', 'company_name', 'ASC');
        $data['placement'] = $this->super_model->select_all_order_by('placement', 'placement_name', 'ASC');
        $data['rack'] = $this->super_model->select_all_order_by('rack', 'rack_name', 'ASC');
        $x=1;
        foreach($this->super_model->select_row_where("et_head","et_id",$id) AS $nxt){
            $category = $this->super_model->select_column_where("category", "category_name", "category_id", $nxt->category_id);
            $subcat = $this->super_model->select_column_where("subcategory", "subcat_name", "subcat_id", $nxt->subcat_id);
            $employee_name = $this->super_model->select_column_where("employees", "employee_name", "employee_id", $nxt->accountability_id);
            $department = $this->super_model->select_column_where("employees", "department", "employee_id", $nxt->accountability_id);
            $unit = $this->super_model->select_column_where("unit", "unit_name", "unit_id", $nxt->unit_id);
            $subcat_prefix= $this->super_model->select_column_where('subcategory', 'subcat_prefix', 'subcat_id', $nxt->subcat_id);
            $location= $this->super_model->select_column_where('subcategory', 'location', 'subcat_id', $nxt->subcat_id);
            $rows=$this->super_model->count_custom_where("asset_series","subcat_prefix = '$subcat_prefix'");
            if($rows==0){
                $next = '1001';
                $asset_no= $subcat_prefix."-".$location."-".$next;
            } else {
                $series = $this->super_model->get_max_where("asset_series", "series","subcat_prefix = '$subcat_prefix'");
                $next=$series+1;
                $asset_no = $subcat_prefix."-".$location."-".$next;

            }

            $data['prefix'] = $subcat_prefix;
            $data['location'] = $location;
            $data['asset_no'] = $next;

            $data['head'][] = array(
                'item'=>$nxt->et_desc,
                'cat'=>$category,
                'subcat'=>$subcat,
                'asset_no'=>$asset_no,
                'unit'=>$unit,
                'accountability'=>$employee_name,
                'department'=>$department
            );
        }
        $this->load->view('encode/encode_next',$data);
        $this->load->view('template/footer');
    }

    public function insert_head(){
        $head_rows = $this->super_model->count_rows("et_head");
        if($head_rows==0){
            $et_id=1;
        } else {
            $maxid=$this->super_model->get_max("et_head", "et_id");
            $et_id=$maxid+1;
        }
        $data = array(
            'et_id'=>$et_id,
            'user_id'=>$this->input->post('user_id'),
            'et_desc'=>$this->input->post('item'),
            'qty'=>$this->input->post('qty'),
            'unit_id'=>$this->input->post('uom'),
            'accountability_id'=>$this->input->post('accountability_id'),
            'category_id'=>$this->input->post('category'),
            'subcat_id'=>$this->input->post('subcategory'),
            'department'=>$this->input->post('department'),
            'create_date'=>date("Y-m-d H:i:s")
        );
        if($this->super_model->insert_into("et_head", $data)){
            echo "<script>window.location ='".base_url()."encode/encode_next/$et_id'; </script>";
        }
    }

    public function encode_report(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $data['id']=$this->uri->segment(3);
        $id=$this->uri->segment(3);
        foreach($this->super_model->select_row_where('et_head','et_id',$id) AS $et){
            $data['type'] = $this->super_model->select_column_where("employees", "type", "employee_id", $et->accountability_id); 
            $data['employee_no'] = $this->super_model->select_column_where("employees", "aaf_no", "employee_id", $et->accountability_id);
            $data['save_temp']=$et->save_temp;
            foreach($this->super_model->select_row_where('employee_inclusion','parent_id',$et->accountability_id) AS $em){
                $status = $this->super_model->select_column_custom_where("employees", "status", "employee_id = '$em->child_id'");
                $data['child'][] = array( 
                    'emp'=> $this->super_model->select_column_custom_where("employees", "employee_name", "status = '0' AND employee_id = '$em->child_id'"), 
                    'status'=>$status
                );
            }
            $data['name'] =$this->super_model->select_column_where("employees", "employee_name", "employee_id", $et->accountability_id);
            $data['position'] =$this->super_model->select_column_where("employees", "position", "employee_id", $et->accountability_id);
            foreach($this->super_model->select_row_where('et_details','et_id',$et->et_id) AS $det){
                $item = $this->super_model->select_column_where("et_head", "et_desc", "et_id", $det->et_id);
                $price = $this->super_model->select_column_where("et_details", "unit_price", "ed_id", $det->ed_id);
                $brand = $this->super_model->select_column_where("et_details", "brand", "ed_id", $det->ed_id);
                $type = $this->super_model->select_column_where("et_details", "type", "ed_id", $det->ed_id);
                $model = $this->super_model->select_column_where("et_details", "model", "ed_id", $det->ed_id);
                $serial = $this->super_model->select_column_where("et_details", "serial_no", "ed_id", $det->ed_id);
                $currency = $this->super_model->select_column_where("currency", "currency_name", "currency_id", $det->currency_id);
                $qty = '1';
                $total = $qty * $price;
                $data['date_issued'] = $det->date_issued;
                foreach($this->super_model->select_row_where('et_head','et_id',$det->et_id) AS $u){
                    $unit = $this->super_model->select_column_where('unit', 'unit_name', 'unit_id', $u->unit_id);
                    $data['user_id'] =$this->super_model->select_column_where("users", "fullname", "user_id", $u->user_id);
                    $data['department'] =$u->department;
                }
                $data['details'][] = array(
                    'et_id'=>$det->et_id,
                    'ed_id'=>$det->ed_id,
                    'acn_no'=>$det->asset_control_no,
                    'date'=>$det->acquisition_date,
                    'date_issued'=>$det->date_issued,
                    'currency'=>$currency,
                    'qty'=>$qty,
                    'item'=>$item,
                    'type'=>$type,
                    'brand'=>$brand,
                    'serial'=>$serial,
                    'model'=>$model,
                    'price'=>$price,
                    'total'=>$total,
                    'unit'=>$unit
                );
                foreach($this->super_model->select_row_where("et_details", "ed_id", $det->ed_id) AS $et_rem){
                    $data['remarks_it'][] = array(
                        'ed_id'=>$et_rem->ed_id,
                        'remarks'=>$et_rem->remarks
                    );
                }
            }
            $data['head'][] = array(
                'et_id'=>$et->et_id,
            ); 
              
        }
        $this->load->view('encode/encode_report',$data);
        $this->load->view('template/footer');
    }

    public function insert_details(){
        $id = $this->input->post('et_id');
        $qty = $this->super_model->select_column_where("et_head", "qty", "et_id", $id);
        /*$serial = array();*/
        for($x=0;$x<$qty;$x++){
            $serial = $this->input->post('sn['.$x.']');
            /*$itemname=$test;*/
            $error_ext=0;
            $dest= realpath(APPPATH . '../uploads/');
                if(!empty($_FILES['pic1']['name'][$x])){
                     $img1= basename($_FILES['pic1']['name'][$x]);
                     $ext1= pathinfo($img1, PATHINFO_EXTENSION);
                    
                    if($ext1=='php' || ($ext1!='png' && $ext1 != 'jpg' && $ext1!='jpeg')){
                        $error_ext++;
                    } else {
                        $filename1=$serial.'-1.'.$ext1;
                        move_uploaded_file($_FILES['pic1']['tmp_name'][$x], $dest.'/'.$filename1);
                    }
                } else {
                    $filename1="";
                }
            
            
                if(!empty($_FILES['pic2']['name'][$x])){
                     $img2= basename($_FILES['pic2']['name'][$x]);
                     $ext2= pathinfo($img2, PATHINFO_EXTENSION);
                     
                    if($ext2=='php' || ($ext2!='png' && $ext2 != 'jpg' && $ext2!='jpeg')){
                        $error_ext++;
                    } else {
                        $filename2=$serial.'-2.'.$ext2;
                        move_uploaded_file($_FILES["pic2"]['tmp_name'][$x], $dest.'/'.$filename2);
                    }
                } else {
                    $filename2="";
                }

                if(!empty($_FILES['pic3']['name'][$x])){
                     $img3= basename($_FILES['pic3']['name'][$x]);
                     $ext3= pathinfo($img3, PATHINFO_EXTENSION);
                    
                    if($ext3=='php' || ($ext3!='png' && $ext3 != 'jpg' && $ext3!='jpeg')){
                        $error_ext++;
                    } else {
                        $filename3=$serial.'-3.'.$ext3;
                        move_uploaded_file($_FILES["pic3"]['tmp_name'][$x], $dest.'/'.$filename3);

                    }
                } else {
                    $filename3="";
                }

            if($this->input->post('saved')=='Submit'){  
                $data = array(
                    'et_id'=>$this->input->post('et_id'),
                    'acquisition_date'=>$this->input->post('acq_date['.$x.']'),
                    'date_issued'=>$this->input->post('date_issued['.$x.']'),
                    'asset_control_no'=>$this->input->post('acn['.$x.']'),
                    'serial_no'=>$this->input->post('sn['.$x.']'),
                    'brand'=>$this->input->post('brand['.$x.']'),
                    'model'=>$this->input->post('model['.$x.']'),
                    'type'=>$this->input->post('type['.$x.']'),
                    'unit_price'=>$this->input->post('price['.$x.']'),
                    'acquired_by'=>$this->input->post('acquired_by['.$x.']'),
                    'remarks'=>$this->input->post('remarks['.$x.']'),
                    'currency_id'=>$this->input->post('cur['.$x.']'),
                    'physical_condition'=>$this->input->post('condition['.$x.']'),
                    'placement_id'=>$this->input->post('placement['.$x.']'),
                    'company_id'=>$this->input->post('company['.$x.']'),
                    'rack_id'=>$this->input->post('rack['.$x.']'),
                    'picture1'=>$filename1,
                    'picture2'=>$filename2,
                    'picture3'=>$filename3
                );
            
                if($this->super_model->insert_into("et_details", $data)){
                    $assetdetails=explode("-", $this->input->post('acn['.$x.']'));
                    $ret_one=$assetdetails[0];
                    $ret_two=(!empty($assetdetails[1])) ? $assetdetails[1] : '';
                    $ret_three=(!empty($assetdetails[2])) ? $assetdetails[2] : '';
                    $ret_four = (!empty($assetdetails[3])) ? $assetdetails[3] : '';
                    if(!empty($ret_one) && !empty($ret_two) && !empty($ret_three) && !empty($ret_four)){
                        $subcat_prefix1=$assetdetails[0];
                        $subcat_prefix2=$assetdetails[1];
                        $location=$assetdetails[2];
                        $subcat_prefix=$subcat_prefix1."-".$subcat_prefix2;
                        $series = $assetdetails[3];
                    }else {
                        $subcat_prefix1=$assetdetails[0];
                        $location=$assetdetails[1];
                        $subcat_prefix=$subcat_prefix1;
                        $series = $assetdetails[2];
                    }
                    $asset_data= array(
                        'subcat_prefix'=>$subcat_prefix,
                        'location'=>$location,
                        'series'=>$series
                    );
                    $this->super_model->insert_into("asset_series", $asset_data);

                    $data_up = array(
                        'save_temp'=>0,
                    );

                    $this->super_model->update_where("et_head", $data_up, "et_id", $id);

                    echo "<script>alert('Equipment/Tool successfully Added!'); 
                        window.location ='".base_url()."encode/encode_report/$id'; </script>";
                }
            }else {
                $data = array(
                    'et_id'=>$this->input->post('et_id'),
                    'acquisition_date'=>$this->input->post('acq_date['.$x.']'),
                    'date_issued'=>$this->input->post('date_issued['.$x.']'),
                    'asset_control_no'=>$this->input->post('acn['.$x.']'),
                    'serial_no'=>$this->input->post('sn['.$x.']'),
                    'brand'=>$this->input->post('brand['.$x.']'),
                    'model'=>$this->input->post('model['.$x.']'),
                    'type'=>$this->input->post('type['.$x.']'),
                    'unit_price'=>$this->input->post('price['.$x.']'),
                    'acquired_by'=>$this->input->post('acquired_by['.$x.']'),
                    'remarks'=>$this->input->post('remarks['.$x.']'),
                    'currency_id'=>$this->input->post('cur['.$x.']'),
                    'physical_condition'=>$this->input->post('condition['.$x.']'),
                    'placement_id'=>$this->input->post('placement['.$x.']'),
                    'company_id'=>$this->input->post('company['.$x.']'),
                    'rack_id'=>$this->input->post('rack['.$x.']'),
                    'picture1'=>$filename1,
                    'picture2'=>$filename2,
                    'picture3'=>$filename3,
                );
            
                if($this->super_model->insert_into("et_details", $data)){
                    $assetdetails=explode("-", $this->input->post('acn['.$x.']'));
                    $ret_one=$assetdetails[0];
                    $ret_two=(!empty($assetdetails[1])) ? $assetdetails[1] : '';
                    $ret_three=(!empty($assetdetails[2])) ? $assetdetails[2] : '';
                    $ret_four = (!empty($assetdetails[3])) ? $assetdetails[3] : '';
                    if(!empty($ret_one) && !empty($ret_two) && !empty($ret_three) && !empty($ret_four)){
                        $subcat_prefix1=$assetdetails[0];
                        $subcat_prefix2=$assetdetails[1];
                        $location=$assetdetails[2];
                        $subcat_prefix=$subcat_prefix1."-".$subcat_prefix2;
                        $series = $assetdetails[3];
                    }else {
                        $subcat_prefix1=$assetdetails[0];
                        $location=$assetdetails[1];
                        $subcat_prefix=$subcat_prefix1;
                        $series = $assetdetails[2];
                    }
                    $asset_data= array(
                        'subcat_prefix'=>$subcat_prefix,
                        'location'=>$location,
                        'series'=>$series
                    );
                    $this->super_model->insert_into("asset_series", $asset_data);
                    $data_up = array(
                        'save_temp'=>1,
                    );

                    $this->super_model->update_where("et_head", $data_up, "et_id", $id);
                    echo "<script>alert('Equipment/Tool successfully Added!'); 
                        window.location ='".base_url()."encode/encode_report/$id'; </script>";
                }
            }



        }
    }

    public function accountability_list(){
        $accountability=$this->input->post('accountability');
        $rows=$this->super_model->count_custom_where("employees","employee_name LIKE '%$accountability%'");
        if($rows!=0){
            echo "<ul id='name-item'>";
            foreach($this->super_model->select_custom_where("employees", "status = '0' AND employee_name LIKE '%$accountability%'") AS $acct){     
            ?>
                   <li onClick="selectEmp('<?php echo $acct->employee_id; ?>','<?php echo $acct->employee_name; ?>','<?php echo $acct->department; ?>')"><?php echo $acct->employee_name; ?></li>
                <?php 
            }
             echo "<ul>";
        }
    }

    public function getCat(){
        $cat = $this->input->post('category');

        echo '<option value="">-Select Sub Category-</option>';
        foreach($this->super_model->select_row_where('subcategory', 'category_id', $cat) AS $row){
            echo '<option value="'. $row->subcat_id .'">'. $row->subcat_name .'</option>';
        }
    }

    public function getPrefix(){
        $subcat = $this->input->post('subcat');
        $subcat_prefix= $this->super_model->select_column_where('subcategory', 'subcat_prefix', 'subcat_id', $subcat);

        $rows=$this->super_model->count_custom_where("asset_series","subcat_prefix = '$subcat_prefix'");
        if(empty($rows)){
            $asset_no= $subcat_prefix."-1001";
        } else {
            $series = $this->super_model->get_max_where("asset_series", "series","subcat_prefix = '$subcat_prefix'");
            $next=$series+1;
            $asset_no = $subcat_prefix."-".$next;
        }
        echo '<option value="'. $asset_no .'">'. $asset_no .'</option>';
    }

    public function get_name($col, $table, $whr_clm, $whr_val){
        $column = $this->super_model->select_column_where($table, $col, $whr_clm, $whr_val);
        return $column;
    }

}

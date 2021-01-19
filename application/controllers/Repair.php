<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repair extends CI_Controller {

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

    public function repair_list(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        $row_avail=$this->super_model->count_custom_where("et_head", "accountability_id=0");
        foreach($this->super_model->select_custom_where("et_head", "accountability_id=0") AS $check){
            $data['available_qty']=$this->super_model->count_custom_where("et_details", "damage='0' AND et_id = '$check->et_id'");           
        }
        $data['damage_qty']=$this->super_model->count_custom_where("et_details", "damage='1'");
        if($row_avail!=0){
            foreach($this->super_model->select_custom_where('et_head', 'accountability_id=0') AS $et){
                foreach($this->super_model->select_custom_where("et_details", "damage='1' AND et_id ='$et->et_id'") AS $det){
                    $item =$this->super_model->select_column_where("et_head", "et_desc", "et_id", $det->et_id);
                    $category =$this->super_model->select_column_where("category", "category_name", "category_id", $et->category_id);
                    $subcat =$this->super_model->select_column_where("subcategory", "subcat_name", "subcat_id", $et->subcat_id);
                    $qty =$this->super_model->select_column_where("et_head", "qty", "et_id", $det->et_id);
                    $empid =$this->super_model->select_column_where("et_head", "accountability_id", "et_id", $det->et_id);
                    $repair =$this->super_model->select_column_where("repair_details", "assessment", "ed_id", $det->ed_id);
                    foreach($this->super_model->select_custom_where("damage_info","ed_id='$det->ed_id' ORDER BY ed_id DESC") AS $dam){
                        $damage_id =$dam->damage_id;
                        $count_ed_id = $this->super_model->count_rows_where("damage_info","ed_id",$dam->ed_id);
                    }
                    $data['damage'][] = array(
                        'damage_id'=>$damage_id,
                        'ed_id'=>$det->ed_id,
                        'empid'=>$empid,
                        'damaged'=>$det->damage,
                        'beyond_repair'=>$det->beyond_repair,
                        'repair'=>$repair,
                        'asset_control'=>$det->asset_control_no,
                        'acquisition_date'=>$det->acquisition_date,
                        'serial_no'=>$det->serial_no,
                        'model'=>$det->model,
                        'et_desc'=>$item,
                        'category'=>$category,
                        'subcat'=>$subcat,
                        'qty'=>$qty,
                        'brand'=>$det->brand,
                        'count_ed_id'=>$count_ed_id,
                    );
                }
            }
        }else {
            $data['damage'] = array();
        }
        $this->load->view('repair/repair_list',$data);
        $this->load->view('template/footer');
    }

    public function repair_form(){  
        $this->load->view('template/header');
        $this->load->view('template/navbar',$this->dropdown);
        foreach($this->super_model->select_all("repair_details") AS $det){
            if($det->saved == 0 AND $det->unsaved==1){
                $data['rep'][]=array(
                    'repair_id'=>$det->repair_id,
                    'ed_id'=>$det->ed_id,
                );
                foreach($this->super_model->select_custom_where("et_details", "ed_id='$det->ed_id'") AS $dets){
                    foreach($this->super_model->select_custom_where("et_head", "et_id='$dets->et_id'") AS $et){
                        $category=$this->super_model->select_column_where("category", "category_name", "category_id", $et->category_id);  
                    } 
                    $item=$this->super_model->select_column_where("et_head", "et_desc", "et_id", $dets->et_id);             
                    $model =$this->super_model->select_column_where("et_details", "model", "ed_id", $dets->ed_id);
                    $model =$this->super_model->select_column_where("et_details", "model", "ed_id", $dets->ed_id);
                    $serial =$this->super_model->select_column_where("et_details", "serial_no", "ed_id", $dets->ed_id);
                    $brand =$this->super_model->select_column_where("et_details", "brand", "ed_id", $dets->ed_id);
                    $acn =$this->super_model->select_column_where("et_details", "asset_control_no", "ed_id", $dets->ed_id);
                    $data['details'][]=array(
                        'ed_id'=>$dets->ed_id,
                        'item'=>$item,
                        'category'=>$category,
                        'brand'=>$brand,
                        'model'=>$model,
                        'serial'=>$serial,
                        'acn'=>$acn,
                    );
                }
            }
        }
        $this->load->view('repair/repair_form',$data);
        $this->load->view('template/footer');
    }

    public function rec_list(){
        $receive=$this->input->post('receive');
        $id=$this->input->post('id');
        $rows=$this->super_model->count_custom_where("employees","employee_name LIKE '%$receive%'");
        if($rows!=0){
             echo "<ul id='name-item'>";
            foreach($this->super_model->select_custom_where("employees", "employee_name LIKE '%$receive%'") AS $acct){ 
                    ?>
                   <li onClick="selectRec('<?php echo $acct->employee_id; ?>','<?php echo $acct->employee_name; ?>','<?php echo $id; ?>')"><?php echo $acct->employee_name; ?></li>
                <?php 
            }
            echo "<ul>";
        }
    }

    public function insert_redirect(){  
        $count = $this->input->post('count');
        $edid = $this->input->post('edid');
        $checked =count($edid);
        for($x=0;$x<$checked;$x++){
            foreach($this->super_model->select_row_where('et_details', 'ed_id', $edid[$x]) AS $rep){
                $rep_data = array(
                    'ed_id'=>$edid[$x],
                    'unsaved'=>1,
                );
                $this->super_model->insert_into("repair_details", $rep_data);
            }
        }        
        echo "<script>window.location = '".base_url()."repair/repair_form';</script>";
    }

    public function insert_repair(){
        $count = $this->input->post('count');
        for($x=0;$x<$count;$x++){
            $edid = $this->input->post('ed_id'.$x);
            $date = $this->input->post('date'.$x);
            $price = $this->input->post('price'.$x);
            $jo = $this->input->post('jo'.$x);
            $supplier = $this->input->post('supplier'.$x);
            $radio = $this->input->post('repair'.$x);
            $remarks = $this->input->post('remarks'.$x);
            $user_id = $this->input->post('user_id'.$x);
            $received_by = $this->input->post('rec_id'.$x);
            foreach($this->super_model->select_row_where('repair_details', 'ed_id', $edid) AS $rep){
                $rep_data = array(
                    'repair_date'=>$date,
                    'repair_price'=>$price,
                    'jo_no'=>$jo,
                    'supplier'=>$supplier,
                    'assessment'=>$radio,
                    'received_by'=>$received_by,
                    'remarks'=>$remarks,
                    'create_date'=>date("Y-m-d H:i:s"),
                    'user_id'=>$user_id,
                    'saved'=>1,
                    'unsaved'=>0,
                );
                $this->super_model->update_where("repair_details", $rep_data, "ed_id", $edid);
            }
            foreach($this->super_model->select_row_where('et_details', 'ed_id', $edid) AS $det){
                if($radio=='1'){
                    $det_data = array(
                        'damage'=>0
                    ); 
                }else {
                    $det_data = array(
                        'beyond_repair'=>1
                    ); 
                }
                $this->super_model->update_where("et_details", $det_data, "ed_id", $edid);
            }
        }
        if($radio=='1'){
            echo "<script>alert('Successfully Repaired'); window.location = '".base_url()."repair/repair_list';</script>";
        }else {
            echo "<script>alert('Equipment is Beyond Repair'); window.location = '".base_url()."repair/repair_list';</script>";
        }
    }

    public function unsaved(){
        $count = $this->input->post('count');
        for($x=0;$x<$count;$x++){
            $edid = $this->input->post('ed_id'.$x);
            $data = array(
                'unsaved'=>0
            ); 
            $this->super_model->update_where("repair_details", $data, "ed_id", $edid);
        }
        echo "<script>window.location = '".base_url()."repair/repair_list';</script>";
    }

    public function get_name($col, $table, $whr_clm, $whr_val){
        $column = $this->super_model->select_column_where($table, $col, $whr_clm, $whr_val);
        return $column;
    }

    public function export_damage(){
        $date_received_from=$this->input->post('date_received_from');
        $date_received_to=$this->input->post('date_received_to');
        $date = date("FY",strtotime($date_received_from));
        require_once(APPPATH.'../assets/dist/js/phpexcel/Classes/PHPExcel/IOFactory.php');
        $objPHPExcel = new PHPExcel();
        $exportfilename="Damage Summary Report.xlsx";
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', "Damage Summary Report $date");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', "No.");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2', "Received Report");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2', "Date Damage");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D2', "ETDR No.");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E2', "Category");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F2', "Persons who where using/ Accountability");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G2', "Item Description");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H2', "Brand");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I2', "Model");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J2', "Type");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K2', "Serial No.");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L2', "Qty");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M2', "UOM");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('N2', "Acquisition Date");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('O2', "Acquisition Cost");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('P2', "PO No/ Si/ JO");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q2', "Submitted by");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('R2', "Description of the incident");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('S2', "Damage done to the Equipment");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('T2', "Recommendation");
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('U2', "Remarks");
        $styleArray = array(
          'borders' => array(
            'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
            )
          )
        );

        foreach(range('A','U') as $columnID){
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }

        $num=3;
        $x=1;
        foreach($this->super_model->select_custom_where("damage_info","receive_date BETWEEN '$date_received_from' AND '$date_received_to'") AS $d){
            $category_id=$this->super_model->select_column_where("et_head","category_id","et_id",$d->et_id);
            $category=$this->super_model->select_column_where("category","category_name","category_id",$category_id);
            $et_desc=$this->super_model->select_column_where("et_head","et_desc","et_id",$d->et_id);
            $qty=$this->super_model->select_column_where("et_head","qty","et_id",$d->et_id);
            $unit_price=$this->super_model->select_column_where("et_details","unit_price","ed_id",$d->ed_id);
            $currency_id = $this->super_model->select_column_where("et_details", "currency_id", "ed_id", $d->ed_id);
            $currency = $this->super_model->select_column_where("currency", "currency_name", "currency_id", $currency_id);
            $brand=$this->super_model->select_column_where("et_details","brand","ed_id",$d->ed_id);
            $type=$this->super_model->select_column_where("et_details","type","ed_id",$d->ed_id);
            $serial_no=$this->super_model->select_column_where("et_details","serial_no","ed_id",$d->ed_id);
            $model=$this->super_model->select_column_where("et_details","model","ed_id",$d->ed_id);
            $acquisition_date=$this->super_model->select_column_where("et_details","acquisition_date","ed_id",$d->ed_id);
            $unit_id=$this->super_model->select_column_where("et_head","unit_id","et_id",$d->et_id);
            $unit_name=$this->super_model->select_column_where("unit","unit_name","unit_id",$unit_id);
            $submitted_by=$this->super_model->select_column_where("employees","employee_name","employee_id",$d->submitted_by);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$num, $x);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$num, $d->receive_date);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$num, $d->incident_date);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$num, $d->etdr_no);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$num, $category);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$num, $d->accountability);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$num, $et_desc);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$num, $brand);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$num, $model);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$num, $type);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$num, $serial_no);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$num, $qty);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$num, $unit_name);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.$num, $acquisition_date);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('O'.$num, $unit_price." ".$currency);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('P'.$num, $d->po_si_no);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q'.$num, $submitted_by);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('R'.$num, $d->incident_description);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('S'.$num, $d->equip_damage);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('T'.$num, $d->recommendation);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('U'.$num, $d->remarks);
            $objPHPExcel->getActiveSheet()->getStyle('A'.$num.":U".$num)->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('A'.$num.":C".$num)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('L'.$num.":O".$num)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('O'.$num)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $x++;
            $num++;
        }
        $objPHPExcel->getActiveSheet()->getStyle('A2:U2')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->getStyle('A2:U2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true)->setName('Arial Black')->setSize(12);
        $objPHPExcel->getActiveSheet()->getStyle('A2:U2')->getFont()->setBold(true)->setName('Arial')->setSize(9.5);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        if (file_exists($exportfilename))
        unlink($exportfilename);
        $objWriter->save($exportfilename);
        unset($objPHPExcel);
        unset($objWriter);   
        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Damage Summary Report.xlsx"');
        readfile($exportfilename);
    }
}
?>

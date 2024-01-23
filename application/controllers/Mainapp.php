
<?php 
class Mainapp extends CI_Controller{
  public function __construct(){
    parent::__construct();
      $this->load->model("Users_model");
      $this->load->model("SplitpageModel");
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function backend(){
  session_destroy();   
  return $this->load->view("pages/login");
}

//login.
function login_process(){ 
  if(isset($this->session->userdata('emp_info_logged_in')['SESS_OPR_CODE'])){ 
    $username  = $this->session->userdata('emp_info_logged_in')['SESS_OPR_CODE'];
    $password  = $this->session->userdata('emp_info_logged_in')['SESS_OPR_PASS'];
  }
  else{ 
    $username  = $_POST["username"];
    $password  = md5($_POST["password"]);
  }

  $result = $this->Users_model->login($username,$password);
  if($result){
    $sess_array = array("SESS_OPR_CODE"  => $result->OPR_CODE, 
                        "SESS_OPR_NAME"  => $result->OPR_NAME_T, 
                        "SESS_OPR_PASS"  => $result->OPR_PASS_W,
                        "SESS_COM_CODE"  => $result->COM_CODE,
                        "SESS_OPR_GROUP" => $result->OPR_GROUP,
                        "SESS_EMP_TYPE"  => $result->EMP_TYPE,
                        "SESS_EMP_NO"    => $result->EMP_NO,
                        "SESS_PRJ_CODE"  => $result->PRJ_CODE,
                        "SESS_AVATAR"    => $result->AVATAR,
                        );
      $this->session->set_userdata("emp_info_logged_in", $sess_array);
      //--------------------------------------------------------------------------------------------------
        $emp     = $this->session->userdata('emp_info_logged_in')['SESS_EMP_NO'];
        // ดึงข้อมูลจาก model SplitpageModel
        $result2 = $this->SplitpageModel->checkmenu($emp);
        if($result2){
          foreach ($result2 as $row) {
            $this->session->set_userdata($row->PRG_CODE, $row->PRG_CODE);
          }   
        }
        //-------------------------------------------------------------------------------------------
        $result3 = $this->SplitpageModel->checklogin();
        if ($result3) { 
          redirect(base_url()."Mainapp/home_page", "refresh"); 
        }
        else{
          $this->session->set_userdata("login_status","รหัสหมดอายุ!!"); 
          redirect(base_url()."Mainapp/backend", "refresh");   
        }
  }
  else{
    $this->session->set_userdata("login_status","กรุณาตรวจสอบรหัสอีกครั้ง!!"); 
    redirect(base_url()."Mainapp/backend", "refresh");
  }
}


//Register========================================================================================================
function home_page(){
  $data["data_com"]  = "";//$this->SplitpageModel->fetch_data_com();   //
  $data["title"]          = "Home Page";
  $this->load->view("pages/home_page",$data);
}
// เชื่อแต่ละหน้า

function Popup(){  
  return $this->load->view("pages/Popup");
}

function Vehicleinspection (){  
  return $this->load->view("pages/Vehicleinspection");
}

function checkconditioncar2(){  
  return $this->load->view("pages/checkconditioncar 2");
}

function checkconditioncar (){  
  return $this->load->view("pages/checkconditioncar");
}

function Reportrepaircar (){  
  return $this->load->view("pages/Report/Report repaircar");
}

function Datarepaircar (){  
  return $this->load->view("pages/Report/Data repaircar");
}

function Reportuser(){  
  return $this->load->view("pages/Report/Reportuser");
}

function Datauser(){  
  return $this->load->view("pages/Report/Datauser");
}


function Admin_Reportrepaircar (){  
  return $this->load->view("pages/admin/Report repaircar");
}

function Admin_Datarepaircar (){  
  return $this->load->view("pages/admin/Data repaircar");
}



function Admin_Datauser(){  
  return $this->load->view("pages/admin/Datauser");
}

function page_vehicleinspection(){  
  return $this->load->view("pages/page_vehicleinspection");
}


// สำหรับตั้งค่าประเภทรถ set_cartype
function set_cartype(){
   if ($this->session->userdata("emp_info_logged_in")){

      if ( isset($_POST["ft_veh_type_code"]) ) { 
          $veh_type_code  = $_POST["ft_veh_type_code"];
        }
        else{
          $veh_type_code  = "";
        }
         $data['data_all']     = $this->SplitpageModel->fetch_set_cartype($veh_type_code);        //หมวดงาน//
         $data['data_type']     = $this->SplitpageModel->fetch_cartype();        //หมวดงาน//
         $data["title"]          = "ประเภทรถ";
         //------------------------
         $data["ft_veh_type_code"] = $veh_type_code;
      //Session redirec
      return $this->load->view('pages/set_cartype',$data);
    }
    else{
      redirect(base_url().'Mainapp/backend', 'refresh');
    }
}

  //บันทึกหมวดงาน
  function ajax_save_cartype(){
          $id              = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
          $flg             = $_POST["flg"];
          $md_veh_type_code    = $_POST["md_veh_type_code"];
          $md_veh_grp_type    = $_POST["md_veh_grp_type"];
          $md_veh_type_name    = $_POST["md_veh_type_name"];
          // $md_passenger_number  = $_POST["md_passenger_number"];
          if($flg == "A"){
            $result      = $this->SplitpageModel->fetch_ajax_add_cartype($id,$md_veh_type_code,$md_veh_type_name,$md_veh_grp_type);        //ปุ่มเพิ่ม
          }
          else if($flg == "E"){
            $result      = $this->SplitpageModel->fetch_ajax_edit_cartype($id,$md_veh_type_code,$md_veh_type_name,$md_veh_grp_type);        //ปุ่มแก้ไข
          } 
          else{
           $result      = $this->SplitpageModel->fetch_ajax_del_cartype($md_veh_type_code);        //ปุ่มลบ
          }
          echo json_encode($result);
  }

  //บันทึกหมวดงาน
  function ajax_list_data_cartype(){
          $md_veh_type_code    = $_POST["veh_type_code"];
        
            $result      = $this->SplitpageModel->fetch_ajax_list_data_cartype($md_veh_type_code);        //ลบ
        
          echo json_encode($result);
  }


// สำหรับตั้งค่าประเภทรถ set_car
function set_car(){
   if ($this->session->userdata("emp_info_logged_in")){

      if ( isset($_POST["ft_veh_brand_code"]) ) { 
          $veh_brand_code  = $_POST["ft_veh_brand_code"];
        }
        else{
          $veh_brand_code  = "";
        }
         $data['data_all']     = $this->SplitpageModel->fetch_set_car($veh_brand_code);        //หมวดงาน//
         $data['data_type']     = $this->SplitpageModel->fetch_car();        //หมวดงาน//
         $data["title"]          = "ยี่ห้อรถ";
         //------------------------
         $data["ft_veh_brand_code"] = $veh_brand_code;
      //Session redirec
      return $this->load->view('pages/set_car',$data);
    }
    else{
      redirect(base_url().'Mainapp/backend', 'refresh');
    }
}

  //บันทึกหมวดงาน
  function ajax_save_car(){
          $id                  = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
          $flg                 = $_POST["flg"];
          $md_veh_brand_code    = $_POST["md_veh_brand_code"];
          $md_veh_brand_name    = $_POST["md_veh_brand_name"];
          if($flg == "A"){
            $result      = $this->SplitpageModel->fetch_ajax_add_car($id,$md_veh_brand_code,$md_veh_brand_name);        //ปุ่มเพิ่ม
          }
          else if($flg == "E"){
            $result      = $this->SplitpageModel->fetch_ajax_edit_car($id,$md_veh_brand_code,$md_veh_brand_name);        //ปุ่มแก้ไข
          } 
          else{
           $result      = $this->SplitpageModel->fetch_ajax_del_car($md_veh_brand_code);        //ปุ่มลบ
          }
          echo json_encode($result);
  }

  //บันทึกหมวดงาน
  function ajax_list_data_car(){
          $md_veh_brand_code    = $_POST["veh_brand_code"];
        
            $result      = $this->SplitpageModel->fetch_ajax_list_data_car($md_veh_brand_code);        
        
          echo json_encode($result);
  }




  // สำหรับตั้งค่าประเภทรถ license_plate
function license_plate(){
   if ($this->session->userdata("emp_info_logged_in")){

      if ( isset($_POST["ft_veh_type_code"]) ) { 
          $veh_type_code  = $_POST["ft_veh_type_code"];
          $veh_brand_code  = $_POST["ft_veh_brand_code"];
          $veh_regis_no  = $_POST["ft_veh_regis_no"];
        }
        else{
          $veh_type_code   = "";
          $veh_brand_code  = "";
          $veh_regis_no   = "";
        }
         $data['data_all']          = $this->SplitpageModel->fetch_set_licenseplate($veh_type_code, $veh_brand_code, $veh_regis_no);        //หมวดงาน//
         $data['data_regis']        = $this->SplitpageModel->fetch_licenseplate();        //ทะเบียน//
         $data['data_cartype']      = $this->SplitpageModel->fetch_cartype();  // ประเภทรถ
         $data['data_car']          = $this->SplitpageModel->fetch_car(); // ชนิดรถ
         $data["title"]             = "ทะเบียนรถ";
         //------------------------
         
         $data["ft_veh_type_code"] = $veh_type_code;      
         $data["ft_veh_brand_code"] = $veh_brand_code;      
         $data["ft_veh_regis_no"] = $veh_regis_no; 
      //Session redirec
      return $this->load->view('pages/license_plate',$data);
    }
    else{
      redirect(base_url().'Mainapp/backend', 'refresh');
    }
}


  //บันทึกหมวดงาน
  function ajax_save_license_plate(){
    //กำหนดตามที่ใน excel กำหนด
          $id                      = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
          $flg                     = $_POST["flg"];
          $md_veh_regis_no         = $_POST["md_veh_regis_no"];
          $md_veh_type_code         = $_POST["md_veh_type_code"];
          $md_veh_brand_code        = $_POST["md_veh_brand_code"];
          $md_veh_body_weight      = $_POST["md_veh_body_weight"];
          $md_veh_lading_weight    = $_POST["md_veh_lading_weight"];
          $md_veh_law_weight        = $_POST["md_veh_law_weight"];
          $md_veh_number_car        = $_POST["md_veh_number_car"];
          $md_veh_number_engine     = $_POST["md_veh_number_engine"];
          if($flg == "A"){
            $result      = $this->SplitpageModel->fetch_ajax_add_license_plate($id,$md_veh_regis_no,$md_veh_type_code,$md_veh_brand_code,$md_veh_body_weight,$md_veh_lading_weight,$md_veh_law_weight,$md_veh_number_car,$md_veh_number_engine);        //ปุ่มเพิ่มข้อมูล โดยจะดึงจาก ajax_save_license_plate มา
          }
          else if($flg == "E"){
            $result      = $this->SplitpageModel->fetch_ajax_edit_license_plate($id,$md_veh_regis_no,$md_veh_type_code,$md_veh_brand_code,$md_veh_body_weight,$md_veh_lading_weight,$md_veh_law_weight,$md_veh_number_car,$md_veh_number_engine);         //ปุ่มแก้ไข โดยจะดึงจาก ajax_save_license_plate มา
          } 
          else{
           $result      = $this->SplitpageModel->fetch_ajax_del_license_plate($md_veh_regis_no);        //ปุ่มลบ จะเอาค่ามาจากทีใน excelมา
          }
          echo json_encode($result);
  }

  //บันทึกหมวดงาน
  function ajax_list_data_license_plate(){
          $md_veh_regis_no    = $_POST["veh_regis_no"];
            $result      = $this->SplitpageModel->fetch_ajax_list_data_license_plate($md_veh_regis_no);        //ลบ
        
          echo json_encode($result);
  }



  // สำหรับตั้งค่าประเภทรถ Set_driver
function set_driver(){
   if ($this->session->userdata("emp_info_logged_in")){
      if ( isset($_POST["ft_veh_emp_no"]) ) { 
          $veh_emp_no     = $_POST["ft_veh_emp_no"]; // รหัส
          $veh_emp_name   = $_POST["ft_veh_emp_name"]; // ชื่อ
          $veh_type_code  = $_POST["ft_veh_type_code"];// ประเภท
          $veh_regis_no   = $_POST["ft_veh_regis_no"]; // ทะเบียน

        }
        else{
          $veh_emp_no    = "";
          $veh_emp_name   = "";
          $veh_type_code  = "";
          $veh_regis_no  = "";   
        }
         $data['data_all']          = $this->SplitpageModel->fetch_set_driver($veh_emp_no,$veh_emp_name,$veh_type_code,$veh_regis_no);    //หมวดงาน//
         $data['data_driver']        = $this->SplitpageModel->fetch_driver();        //พนักงานขับรถ//
         $data['data_cartype']      = $this->SplitpageModel->fetch_cartype();  // ชนิดรถ
         $data['data_regis']      = $this->SplitpageModel->fetch_licenseplate(); // ทะเบียน
         
         $data["title"]             = "รายละเอียดพนักงานขับรถ";
         //------------------------     
         $data["ft_veh_emp_no"]     = $veh_emp_no;
         $data["ft_veh_emp_name"]   = $veh_emp_name; 
         $data["ft_veh_type_code"]  = $veh_type_code;
         $data["ft_veh_regis_no"]   = $veh_regis_no;
      //Session redirec
      return $this->load->view('pages/set_driver',$data);
    }
    else{
      redirect(base_url().'Mainapp/backend', 'refresh');
    }
}


  //บันทึกหมวดงาน
  function ajax_save_driver(){
    //กำหนดตามที่ใน excel กำหนด
 // $arrayData=$this->input->post(); $keys=array_keys($arrayData);  echo '<pre>';print_r($arrayData);echo '<br>';print_r($keys); print_r(count($arrayData));echo '</pre>';// exit()    
          $id                      = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
          $flg                     = $_POST["hd_flg"];
          $md_veh_emp_no           = $_POST["md_veh_emp_no"];
          $md_veh_id_card          = $_POST["md_veh_id_card"];
          $md_veh_regis_no         = $_POST["md_veh_regis_no"];
          $md_veh_emp_name         = $_POST["md_veh_emp_name"];
          $md_veh_brith_day        = $_POST["md_veh_brith_day"];
          $md_veh_age              = $_POST["md_veh_age"];
          $md_veh_tell             = $_POST["md_veh_tell"];
          $md_veh_address          = $_POST["md_veh_address"];
          $md_veh_driver_id        = $_POST["md_veh_driver_id"];
          $md_veh_driver_type      = $_POST["md_veh_driver_type"];
          $md_veh_issue_date       = $_POST["md_veh_issue_date"];
          $md_veh_expirt_date      = $_POST["md_veh_expirt_date"];
          $md_veh_start_work_date  = $_POST["md_veh_start_work_date"];
          $md_veh_work_age         = $_POST["md_veh_work_age"];
          $md_veh_position_name    = $_POST["md_veh_position_name"];
          $md_veh_type_code        = $_POST["md_veh_type_code"];
          $md_veh_note_resign      = $_POST["md_veh_note_resign"];
          $md_veh_date_resign      = $_POST["md_veh_date_resign"];
          $md_veh_emp_pic          =  "";
          $file_tmp                = "";

// upload รูป
 if($_FILES["filUpload"]["tmp_name"]){ // filUpload ให้ตั้งชื่อให้ตรงกับหน้า HTML
          $file_name           = $_FILES["filUpload"]["name"];            // ชื่อไฟล์
          $file_size           = $_FILES["filUpload"]["size"]; //ขนาดรูป
          $file_tmp            = $_FILES["filUpload"]["tmp_name"];
          $file_type           = $_FILES["filUpload"]["type"];  //ชนิดของไฟล์
          $extention_file      = ".".pathinfo($_FILES["filUpload"]["name"], PATHINFO_EXTENSION);        // .นามสกุลไฟล์ 
          $md_veh_emp_pic      = $md_veh_emp_no.$extention_file; // ชื่อไฟล์รูปจะตั้งตามชื่อชื่อพนักงานขับรถ
           //อัพรูปใส่โฟลเดอร์ img          
      } 

          if($flg == "A"){
            $result      = $this->SplitpageModel->fetch_ajax_add_driver($id,$md_veh_emp_no,$md_veh_id_card,$md_veh_regis_no,$md_veh_emp_name,$md_veh_brith_day,$md_veh_age,$md_veh_tell,$md_veh_address,$md_veh_driver_id,$md_veh_driver_type,$md_veh_issue_date,$md_veh_expirt_date,$md_veh_start_work_date,$md_veh_work_age,$md_veh_position_name,$md_veh_type_code,$md_veh_emp_pic,$file_tmp);        
          }
          else if($flg == "E"){
            $result      = $this->SplitpageModel->fetch_ajax_edit_driver($id,$md_veh_emp_no,$md_veh_id_card,$md_veh_regis_no,$md_veh_emp_name,$md_veh_brith_day,$md_veh_age,$md_veh_tell,$md_veh_address,$md_veh_driver_id,$md_veh_driver_type,$md_veh_issue_date,$md_veh_expirt_date,$md_veh_start_work_date,$md_veh_work_age,$md_veh_position_name,$md_veh_type_code,$md_veh_emp_pic,$file_tmp);         
          } 
          else if($flg == "F"){
            $result      = $this->SplitpageModel->fetch_ajax_del_resign_driver($md_veh_emp_no,$md_veh_note_resign,$md_veh_date_resign);        
          }           
          else{
           $result      = $this->SplitpageModel->fetch_ajax_del_driver($md_veh_emp_no);        
          }
          echo json_encode($result);
  }

  //บันทึกหมวดงาน
  function ajax_list_data_driver(){
          $md_veh_emp_no    = $_POST["veh_emp_no"];
            $result      = $this->SplitpageModel->fetch_ajax_list_data_driver($md_veh_emp_no);        
        
          echo json_encode($result);
  }





//------------------------------------------------------- รายงานพนักงานขับรถ ----------------------------//

  // สำหรับตั้งค่ารายงานพนักงาน
function set_formuser_test(){
   if ($this->session->userdata("emp_info_logged_in")){
      if ( isset($_POST["ft_veh_regis_no"]) ) { 
          $veh_regis_no  = $_POST["ft_veh_regis_no"];
          $date_frm     = $_POST["ft_date_frm"];
          $date_to      = $_POST["ft_date_to"];
        }
        else{
          $veh_regis_no  = "";   
          $date_frm     = "";
          $date_to      = "";       
        }
         $data['data_all']                  = $this->SplitpageModel->fetch_set_formuser_test($veh_regis_no,$date_frm,$date_to);   
         $data['data_formuser_test']        = $this->SplitpageModel->fetch_formuser_test();        //พนักงานขับรถ//
         $data['data_cartype']              = $this->SplitpageModel->fetch_cartype();  // ชนิดรถ
         $data['data_regis']                = $this->SplitpageModel->fetch_licenseplate(); // ทะเบียน
         $data['data_vts']                  = $this->SplitpageModel->fetch_vts_prj_code(); // ทะเบียน
         $data["title"]                     = "รายงานพนักงานขับรถ";
         // ------------------------     
         $data["ft_veh_regis_no"] = $veh_regis_no;
         $data["ft_date_frm"] = $date_frm;
         $data["ft_date_to"] = $date_to;         
          
      //Session redirec
      return $this->load->view('pages/Formuser_test',$data);
    }

    else{
      redirect(base_url().'Mainapp/backend', 'refresh');
    }
}


  //บันทึกหมวดงาน
  function ajax_save_formuser_test(){
    //กำหนดตามที่ใน excel กำหนด
 // $arrayData=$this->input->post(); $keys=array_keys($arrayData);  echo '<pre>';print_r($arrayData);echo '<br>';print_r($keys); print_r(count($arrayData));echo '</pre>';// exit();
          $id                      = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
          $flg                     = $_POST["hd_flg"];
          $doc_no                  = $_POST["doc_no"]; 
          $doc_date                = $_POST["doc_date"]; 
          $md_veh_start            = $_POST["md_veh_start"];
          $md_veh_stop             = $_POST["md_veh_stop"];
          $md_veh_regis_no         = $_POST["md_veh_regis_no"];
          $md_veh_date_up          = $_POST["md_veh_date_up"];
          $md_veh_time_start       = $_POST["md_veh_time_start"];
          $md_veh_km_start         = $_POST["md_veh_km_start"];
          $md_veh_type_list        = $_POST["md_veh_type_list"];
          $md_veh_weight           = $_POST["md_veh_weight"];
          if ($md_veh_start == "xxx") {
            $md_veh_start_name = $_POST["md_veh_start_name"];
          }
          else {
             $md_veh_start_name = $_POST["test"];
          }

          if ($md_veh_stop == "xxx") {
            $md_veh_stop_name = $_POST["md_veh_stop_name"];
          }
          else {
             $md_veh_stop_name = $_POST["stop1"];
          }

          $arrayData               = $_POST;

          // UPDATE VTS_OPR_DAILYWORK     

          if($flg == "A"){
            $doc_no =  $this->SplitpageModel->fetch_run_doc_no($id); 
            $result      = $this->SplitpageModel->fetch_ajax_add_formuser_test($id,$doc_no,$doc_date,$md_veh_start,$md_veh_stop,$md_veh_regis_no,$md_veh_date_up,$md_veh_time_start,$md_veh_km_start,$md_veh_type_list,$md_veh_weight,$md_veh_start_name,$md_veh_stop_name,$arrayData);        //ปุ่มเพิ่มข้อมูล โดยจะดึงจาก ajax_save_license_plate มา
          }
          else if($flg == "E"){
              $result      = $this->SplitpageModel->fetch_ajax_edit_formuser_test($id,$doc_no,$doc_date,$md_veh_start,$md_veh_stop,$md_veh_regis_no,$md_veh_date_up,$md_veh_time_start,$md_veh_km_start,$md_veh_type_list,$md_veh_weight,$arrayData,$md_veh_start_name,$md_veh_stop_name);  
          } 
           else {
           $result      = $this->SplitpageModel->fetch_ajax_del_formuser_test($doc_no);        //ปุ่มลบ จะเอาค่ามาจากทีใน 
          }
          echo json_encode($result);
  }

  function ajax_save_formuser_test_approve(){
    //กำหนดตามที่ใน excel กำหนด
 // $arrayData=$this->input->post(); $keys=array_keys($arrayData);  echo '<pre>';print_r($arrayData);echo '<br>';print_r($keys); print_r(count($arrayData));echo '</pre>';// exit();

          $id                      = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
          $flg                     = $_POST["hd_flg_c"];
          $doc_no                  = $_POST["doc_no_c"]; 
          $md_veh_time_stop        = $_POST["md_veh_time_stop"];
          $md_veh_sum_time         = $_POST["md_veh_sum_time"];
          $md_veh_km_stop          = $_POST["md_veh_km_stop"];
          $md_veh_bearer           = $_POST["md_veh_bearer"];
          $md_veh_date_drop        = $_POST["md_veh_date_drop"];
          $md_veh_note             = $_POST["md_veh_note"];
          $arrayData               = $_POST;

         if($flg == "B"){

            $result      = $this->SplitpageModel->fetch_ajax_approve_formuser_test($id,$doc_no,$md_veh_time_stop,$md_veh_sum_time,$md_veh_km_stop,$md_veh_bearer,$md_veh_date_drop,$md_veh_note,$arrayData);         //ปุ่มแก้ไข โดยจะดึงจาก ajax_save_license_plate มา
          } 

          echo json_encode($result);
  }

  //------------------------------ หน้ารายงาน admin -------------------------------------------------------------------

function Admin_Reportuser(){
   if ($this->session->userdata("emp_info_logged_in")){
      if ( isset($_POST["ft_veh_regis_no"]) ) { 
          $veh_regis_no     = $_POST["ft_veh_regis_no"];
          $date_frm         = $_POST["ft_date_frm"];
          $date_to          = $_POST["ft_date_to"];
       
          $veh_opr_name     = $_POST["ft_veh_opr_name"]; // ชื่อพนักงาน
          $veh_status  = $_POST["ft_veh_status"];
        }
        else{
          $veh_regis_no      = "";   
          $date_frm          = "";
          $date_to           = "";
          $veh_opr_name      = "";       
    
          $veh_status      = ""; 
        }
         $data['data_all']                 = $this->SplitpageModel->fetch_set_formuser_admin($veh_regis_no,$date_frm,$date_to,$veh_opr_name,$veh_status);
         $data['data_formuser_test']       = $this->SplitpageModel->fetch_formuser_test();        //พนักงานขับรถ//
         $data['data_cartype']             = $this->SplitpageModel->fetch_cartype();  // ชนิดรถ
         $data['data_regis']               = $this->SplitpageModel->fetch_licenseplate(); // ทะเบียน
         $data['data_vts']                 = $this->SplitpageModel->fetch_vts_prj_code(); // ชื่อ
         $data['data_opr_daily']           = $this->SplitpageModel->fetch_vts_opr_dailywork(); // รายชื่อพนักงานรายวัน         
         $data["title"]                    = "ตรวจสอบรายงานพนักงานขับรถ";
         // ------------------------     
         $data["ft_veh_regis_no"] = $veh_regis_no;
         $data["ft_date_frm"] = $date_frm;
         $data["ft_date_to"] = $date_to;
   
         $data["ft_veh_opr_name"] = $veh_opr_name; 
         $data["ft_veh_status"] = $veh_status;
      //Session redirec
      return $this->load->view('pages/admin/Reportuser',$data);
    }

    else{
      redirect(base_url().'Mainapp/backend', 'refresh');
    }
}

//-------------------------------------------------- ดึงต่าต่างๆมา save -----------------------------------//
  function ajax_save_formuser_admin(){
    //กำหนดตามที่ใน excel กำหนด
 // $arrayData=$this->input->post(); $keys=array_keys($arrayData);  echo '<pre>';print_r($arrayData);echo '<br>';print_r($keys); print_r(count($arrayData));echo '</pre>';// exit();
          $id                      = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
          $flg                     = $_POST["hd_flg_b"];
          $doc_no                  = $_POST["doc_no_b"];
          $md_veh_time_stop_b      = $_POST["md_veh_time_stop_b"]; 
          $md_veh_km_stop_b        = $_POST["md_veh_km_stop_b"];
          $md_veh_bearer_b         = $_POST["md_veh_bearer_b"];
          $md_veh_date_drop_b      = $_POST["md_veh_date_drop_b"];
          $md_veh_note_b           = $_POST["md_veh_note_b"];
          $md_explain_b            = $_POST["md_explain_b"]; 
          $md_veh_time_sum_b       = $_POST["md_veh_time_sum_b"];
          $save_1                  = $_POST["save_1"];

         if($flg == "F"){
            $result      = $this->SplitpageModel->fetch_ajax_admin_formuser($id,$doc_no,$md_veh_time_stop_b,$md_veh_km_stop_b,$md_veh_bearer_b,$md_veh_date_drop_b,$md_veh_note_b,$save_1,$md_explain_b,$md_veh_time_sum_b);          //ปุ่มแก้ไข โดยจะดึงจาก ajax_save_license_plate มา
          } 

          echo json_encode($result);
  }

  //บันทึกหมวดงาน
  function ajax_list_data_formuser_test(){
          $doc_no    = $_POST["doc_no"];
            $result      = $this->SplitpageModel->fetch_ajax_list_data_formuser_test($doc_no);        //ลบ
        
          echo json_encode($result);
  }
  // ตารางรูป
  function ajax_list_data_formuser_pic(){
          $doc_no    = $_POST["doc_no"];
            $result      = $this->SplitpageModel->fetch_ajax_list_data_formuser_pic($doc_no);        //ลบ
        
          echo json_encode($result);
  }
// ตารางรายการ
  function ajax_list_data_list(){
          $doc_no    = $_POST["doc_no"];
            $result      = $this->SplitpageModel->fetch_ajax_list_data_list($doc_no);        //ลบ
        
          echo json_encode($result);
  }



//----------------------------------------หน้าตั้งค่ารถเสีย------------------------------------------------------------------------------//

// สำหรับตั้งค่าหัวข้อรถเสีย
function set_broken(){
   if ($this->session->userdata("emp_info_logged_in")){

      if ( isset($_POST["ft_veh_broken_no"]) ) { 
          $veh_broken_no  = $_POST["ft_veh_broken_no"];
        }
        else{
          $veh_broken_no  = "";
        }
         $data['data_all']     = $this->SplitpageModel->fetch_set_broken($veh_broken_no);        //หมวดงาน//
         $data['data_broken']     = $this->SplitpageModel->fetch_broken();        //หมวดงาน//
         $data["title"]          = "รายการรถเสีย";
         //------------------------
         $data["ft_veh_broken_no"] = $veh_broken_no;
      //Session redirec
      return $this->load->view('pages/set_broken',$data);
    }
    else{
      redirect(base_url().'Mainapp/backend', 'refresh');
    }
}

  //บันทึกหมวดงาน
  function ajax_save_broken(){
          $id                  = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
          $flg                 = $_POST["flg"];
          $md_veh_broken_no    = $_POST["md_veh_broken_no"];
          $md_veh_broken_list    = $_POST["md_veh_broken_list"];
          if($flg == "A"){
            $result      = $this->SplitpageModel->fetch_ajax_add_broken($id,$md_veh_broken_no,$md_veh_broken_list);        //ปุ่มเพิ่ม
          }
          else if($flg == "E"){
            $result      = $this->SplitpageModel->fetch_ajax_edit_broken($id,$md_veh_broken_no,$md_veh_broken_list);        //ปุ่มแก้ไข
          } 
          else{
           $result      = $this->SplitpageModel->fetch_ajax_del_broken($md_veh_broken_no);        //ปุ่มลบ
          }
          echo json_encode($result);
  }

  //บันทึกหมวดงาน
  function ajax_list_data_broken(){
          $md_veh_broken_no    = $_POST["veh_broken_no"];
            $result      = $this->SplitpageModel->fetch_ajax_list_data_broken($md_veh_broken_no);        //ลบ
        
          echo json_encode($result);
  }



//---------------------------------------------------- ตั้งค่าเช็คลิส ------------------------------------------------- //
  // สำหรับตั้งค่ารายงานพนักงาน
function set_checklist(){
   if ($this->session->userdata("emp_info_logged_in")){
      if ( isset($_POST["ft_veh_title_seq"]) ) { 
          $veh_title_seq  = $_POST["ft_veh_title_seq"];

        }
        else{
          $veh_title_seq  = "";   
      
        }
         $data['data_all']                  = $this->SplitpageModel->fetch_set_checklist($veh_title_seq);   
         $data['data_checklist']            = $this->SplitpageModel->fetch_checklist();        //พนักงานขับรถ//
         $data['data_cartype']              = $this->SplitpageModel->fetch_cartype();  // ชนิดรถ
         $data["title"]                     = "ตั้งค่าหัวข้อเช็คลิสต์";
         // ------------------------     
         $data["ft_veh_title_seq"] = $veh_title_seq;
        
          
      //Session redirec
      return $this->load->view('pages/checklist_header',$data);
    }

    else{
      redirect(base_url().'Mainapp/backend', 'refresh');
    }
}


  //บันทึกหมวดงาน
  function ajax_save_checklist(){
    //กำหนดตามที่ใน excel กำหนด
 // $arrayData=$this->input->post(); $keys=array_keys($arrayData);  echo '<pre>';print_r($arrayData);echo '<br>';print_r($keys); print_r(count($arrayData));echo '</pre>';// exit();
        
          $flg                     = $_POST["hd_flg"];
          $arrayData               = $_POST;  
          $keys                    = array_keys($arrayData);
          if($flg == "A"){
            $result      = $this->SplitpageModel->fetch_ajax_add_checklist($arrayData,$keys);  
          }
          else if($flg == "E"){
              $result      = $this->SplitpageModel->fetch_ajax_del_checklist($arrayData,$keys);  
              $result      = $this->SplitpageModel->fetch_ajax_add_checklist($arrayData,$keys); 
          } 
           else {
           $result      = $this->SplitpageModel->fetch_ajax_del_checklist($arrayData,$keys);    
          }
           if($result){
          redirect(base_url()."Mainapp/set_checklist", "refresh");
           // redirect(base_url()."Mainapp/set_checklist?se_prj_s=".$arrayData["md_ft_prj_s"], "refresh");
        }
          
  }

      function ajax_list_data_check(){
            $md_veh_title_seq    = $_POST["veh_title_seq"];
            $result_header      = $this->SplitpageModel->fetch_ajax_list_data_header($md_veh_title_seq);       
            $result_list      = $this->SplitpageModel->fetch_ajax_list_data_check($md_veh_title_seq); 
            echo json_encode(["arr_header" => $result_header , "arr_list" => $result_list ] );
        }

      //บันทึกหมวดงาน
      function ajax_list_data_checklist(){
              $md_veh_title_seq    = $_POST["md_veh_title_seq"]; 
                $result      = $this->SplitpageModel->fetch_ajax_list_data_checklist($md_veh_title_seq);       
              echo json_encode($result);
           }

      function ajax_list_data_checkgrub(){
                $grp_type    = $_POST["grp_type"]; 
                $result      = $this->SplitpageModel->fetch_ajax_list_data_checkgrub($grp_type);        
              echo json_encode($result);
           }




//------------------------------------------------------- เช็คลิสต์หัวข้อย่อย ----------------------------//

  // สำหรับตั้งค่ารายงานพนักงาน
function set_checklist_items(){
   if ($this->session->userdata("emp_info_logged_in")){
      if ( isset($_POST["ft_veh_title_seq"]) ) { 
          $veh_title_seq  = $_POST["ft_veh_title_seq"];

        }
        else{
          $veh_title_seq  = "";   
      
        }
         $data['data_all']                  = $this->SplitpageModel->fetch_set_checklist_items($veh_title_seq);   
         $data['data_checklist_items']      = $this->SplitpageModel->fetch_checklist_items();        //พนักงานขับรถ//
         $data['data_checklist_header']     = $this->SplitpageModel->fetch_checklist_header();        //พนักงานขับรถ//
         $data['data_checklist']            = $this->SplitpageModel->fetch_checklist();        //พนักงานขับรถ//
         $data['data_cartype']              = $this->SplitpageModel->fetch_cartype();  // ชนิดรถ
         $data["title"]                     = "ตั้งค่ารายการเช็คลิสต์ย่อย";
         // ------------------------     
         $data["ft_veh_title_seq"] = $veh_title_seq;
    
          
      //Session redirec
      return $this->load->view('pages/checklist',$data);
    }

    else{
      redirect(base_url().'Mainapp/backend', 'refresh');
    }
}


  //บันทึกหมวดงาน
  function ajax_save_checklist_items(){
    //กำหนดตามที่ใน excel กำหนด
 // $arrayData=$this->input->post(); $keys=array_keys($arrayData);  echo '<pre>';print_r($arrayData);echo '<br>';print_r($keys); print_r(count($arrayData));echo '</pre>';// exit();
          $id                      = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
          $flg                     = $_POST["hd_flg"];
          $md_veh_title_seq        = $_POST["md_veh_title_seq"];
          $arrayData               = $_POST;

          // UPDATE VTS_OPR_DAILYWORK     

          if($flg == "A"){
            $result      = $this->SplitpageModel->fetch_ajax_add_checklist_items($id,$md_veh_title_seq,$arrayData);       
          }
          else if($flg == "E"){
              $result      = $this->SplitpageModel->fetch_ajax_edit_checklist_items($id,$md_veh_title_seq,$arrayData); 
          } 
           else {
           $result      = $this->SplitpageModel->fetch_ajax_del_checklist_items($md_veh_title_seq);       
          }
          echo json_encode($result);
  }



  // บันทึกหมวดงาน
  function ajax_list_data_checklist_items(){
          $md_veh_title_seq    = $_POST["veh_title_seq"];
            $result      = $this->SplitpageModel->fetch_ajax_list_data_checklist_items($md_veh_title_seq);        //ลบ
        
          echo json_encode($result);
  }




//------------------------------------------------------- เช็คลิสต์รายการตรวจสภาพรถประจำวัน ----------------------------//

  // สำหรับตั้งค่ารายงานพนักงาน
function set_checklist_daily(){
   if ($this->session->userdata("emp_info_logged_in")){
      if ( isset($_POST["ft_veh_title_seq"]) ) { 
          $veh_title_seq  = $_POST["ft_veh_title_seq"];

        }
        else{
          $veh_title_seq  = "";   
      
        }
         $data['data_all']                  = $this->SplitpageModel->fetch_set_checklist_daily($veh_title_seq);   
         $data['data_checklist_daily']      = $this->SplitpageModel->fetch_checklist_daily();        //พนักงานขับรถ//
         $data['data_checklist_header']     = $this->SplitpageModel->fetch_checklist_header();        //พนักงานขับรถ//
         $data['data_checklist']            = $this->SplitpageModel->fetch_checklist();        //พนักงานขับรถ//
         $data['data_cartype']              = $this->SplitpageModel->fetch_cartype();  // ชนิดรถ
         $data["title"]                     = "ตรวจเช็ครถประจำวัน";
         // ------------------------     
         $data["ft_veh_title_seq"] = $veh_title_seq;
    
          
      //Session redirec
      return $this->load->view('pages/checklist_daily',$data);
    }

    else{
      redirect(base_url().'Mainapp/backend', 'refresh');
    }
}

  //บันทึกหมวดงาน
  function ajax_save_checklist_daily(){
    //กำหนดตามที่ใน excel กำหนด
 // $arrayData=$this->input->post(); $keys=array_keys($arrayData);  echo '<pre>';print_r($arrayData);echo '<br>';print_r($keys); print_r(count($arrayData));echo '</pre>';// exit();
          $id                      = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
          $flg                     = $_POST["hd_flg"];
          $md_veh_title_seq        = $_POST["md_veh_title_seq"];
          $md_veh_title_list        = $_POST["md_veh_title_list"];
          $arrayData               = $_POST;
          // UPDATE VTS_OPR_DAILYWORK     
          if($flg == "A"){
            $result      = $this->SplitpageModel->fetch_ajax_add_checklist_daily($id,$md_veh_title_seq,$md_veh_title_list,$arrayData);       
          }
          else if($flg == "E"){
              $result      = $this->SplitpageModel->fetch_ajax_edit_checklist_daily($id,$md_veh_title_seq,$md_veh_title_list,$arrayData); 
          } 
           else {
           $result      = $this->SplitpageModel->fetch_ajax_del_checklist_daily($md_veh_title_seq);       
          }
          echo json_encode($result);
  }

  // บันทึกหมวดงานหลัก
  function ajax_list_data_checklist_daily(){
            $md_veh_title_seq    = $_POST["veh_title_seq"];
            $result      = $this->SplitpageModel->fetch_ajax_list_data_checklist_daily($md_veh_title_seq);        //ลบ
        
          echo json_encode($result);
  }

  // บันทึกตารางรอง
  function ajax_list_data_list_daily(){
            $md_veh_title_seq    = $_POST["veh_title_seq"];
            $result      = $this->SplitpageModel->fetch_ajax_list_data_list_daily($md_veh_title_seq);        //ลบ
        
          echo json_encode($result);
  }


//------------------------------------------------------ ตรวจเช็ครถประจำวัน ----------------------------------------------------------------//


  // สำหรับตั้งค่ารายงานพนักงาน
function set_car_repair(){
   if ($this->session->userdata("emp_info_logged_in")){
      if ( isset($_POST["ft_veh_regis_no"]) ) { 
          $veh_regis_no  = $_POST["ft_veh_regis_no"];
          $date_frm     = $_POST["ft_date_frm"];
          $date_to      = $_POST["ft_date_to"];
          $veh_status  = $_POST["ft_veh_status"];
        }
        else{
          $veh_regis_no  = "";   
          $date_frm     = "";
          $date_to      = "";       
          $veh_status      = "";
        }
         $data['data_all']                        = $this->SplitpageModel->fetch_set_car_repair($veh_regis_no,$date_frm,$date_to,$veh_status); 
         $data['data_car_repair']                 = $this->SplitpageModel->fetch_car_repair();        //รายการเช็คลิสต์//
         $data['data_checklist_daily']            = $this->SplitpageModel->fetch_checklist_daily();        //หัวข้อเช็คลิสต์//
         $data['data_cartype']                    = $this->SplitpageModel->fetch_cartype();  // ชนิดรถ
         $data['data_regis']                      = $this->SplitpageModel->fetch_licenseplate(); // ทะเบียน
         $data['data_car']                        = $this->SplitpageModel->fetch_car(); // ยี่ห้อ
        $data['data_broken']                      = $this->SplitpageModel->fetch_broken();        //รถเสีย/
         $data["title"]                           = "ตรวจเช็ครถประจำวัน";

         // ------------------------     
         $data["ft_veh_regis_no"] = $veh_regis_no;
         $data["ft_date_frm"] = $date_frm;
         $data["ft_date_to"] = $date_to;         
         $data["ft_veh_status"] = $veh_status;
 
      //Session redirec
      return $this->load->view('pages/car_repair',$data);
    }

    else{
      redirect(base_url().'Mainapp/backend', 'refresh');
    }
}

  // บันทึกหมวดงาน
  function ajax_save_car_repair(){
    //กำหนดตามที่ใน excel กำหนด
 // $arrayData=$this->input->post(); $keys=array_keys($arrayData);  echo '<pre>';print_r($arrayData);echo '<br>';print_r($keys); print_r(count($arrayData));echo '</pre>';// exit();        

          $id                      = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
          $flg                      = $_POST["hd_flg"];
          $doc_no                   = $_POST["doc_no"]; 
          $md_veh_km                = $_POST["md_veh_km"];
          $md_veh_time              = $_POST["md_veh_time"];
          $md_veh_regis_no          = $_POST["md_veh_regis_no"];
          $md_veh_type_code         = $_POST["md_veh_type_code"];
          $md_veh_brand_code        = $_POST["md_veh_brand_code"]; 
          $arrayData                = $_POST;  
          $keys                     = array_keys($arrayData);

          if($flg == "A"){
            $doc_no     =  $this->SplitpageModel->fetch_run_doc_no($id); 
            $result      = $this->SplitpageModel->fetch_ajax_add_car_repair($id,$doc_no,$md_veh_km,$md_veh_time,$md_veh_regis_no,$md_veh_type_code,$md_veh_brand_code,$arrayData,$keys);        
          }    
           else if($flg == "E"){
              $result      = $this->SplitpageModel->fetch_ajax_edit_car_repair($id,$doc_no,$md_veh_km,$md_veh_time,$md_veh_regis_no,$md_veh_type_code,$md_veh_brand_code,$arrayData,$keys); 
          }                        
           else {
          $result    = $this->SplitpageModel->fetch_ajax_del_car_repair($doc_no,$arrayData,$keys);    
          }
           echo json_encode($result);



          
  }


  function ajax_save_car_spoil(){
    //กำหนดตามที่ใน excel กำหนด
 // $arrayData=$this->input->post(); $keys=array_keys($arrayData);  echo '<pre>';print_r($arrayData);echo '<br>';print_r($keys); print_r(count($arrayData));echo '</pre>';// exit();

          $id                             = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
          $flg                            = $_POST["hd_flg_c"];
          $doc_no                         = $_POST["doc_no_c"]; 
          $md_veh_time_c                  = $_POST["md_veh_time_c"];
          $md_veh_spoil_c                 = $_POST["md_veh_spoil_c"];
          $md_veh_regis_no_c              = $_POST["md_veh_regis_no_c"];
          $md_veh_type_code_c             = $_POST["md_veh_type_code_c"];
          $md_veh_brand_code_c            = $_POST["md_veh_brand_code_c"];
          $md_veh_spoil_name              = $_POST["md_veh_spoil_name"];

         if($flg == "B"){
            $doc_no     =  $this->SplitpageModel->fetch_run_doc_no($id); 
            $result      = $this->SplitpageModel->fetch_ajax_add_car_spoi($id,$doc_no,$md_veh_time_c,$md_veh_spoil_c,$md_veh_regis_no_c,$md_veh_type_code_c,$md_veh_brand_code_c,$md_veh_spoil_name);        
          } 
           else {
          $result    = $this->SplitpageModel->fetch_ajax_del_car_spoi($doc_no);    
          }
          echo json_encode($result);
  }



// เช็คว่ามีตัวไหนเรียกไหม
  function ajax_list_data_daily_checklist_hed(){
             $doc_no    = $_POST["doc_no"];
            $result      = $this->SplitpageModel->fetch_ajax_list_data_daily_checklist_hed($doc_no);        //ลบ
        
          echo json_encode($result);
  }
  


  function ajax_list_data_checklist_daily_broken(){
          $doc_no    = $_POST["doc_no"];
            $result      = $this->SplitpageModel->fetch_ajax_list_data_checklist_daily_broken($doc_no);        //ลบ
        
          echo json_encode($result);
  }

  function ajax_list_data_checklist_daily_broken_admin(){
          $doc_no    = $_POST["doc_no"];
            $result      = $this->SplitpageModel->fetch_ajax_list_data_checklist_daily_broken_admin($doc_no);        //ลบ
        
          echo json_encode($result);
  }

  function ajax_list_data_car_repair(){
             $doc_no    = $_POST["doc_no"];
            $result      = $this->SplitpageModel->fetch_ajax_list_data_checkcar($doc_no);        //ลบ
        
          echo json_encode($result);
  }

      function ajax_list_data_daily_checklist(){ // ลบ
            $doc_no    = $_POST["doc_no"];
            $result_header    = $this->SplitpageModel->fetch_ajax_list_data_daily_checklist_hed($doc_no);       
            $result_list      = $this->SplitpageModel->fetch_ajax_list_data_daily_checklist_body($doc_no); 
            echo json_encode(["arr_header" => $result_header , "arr_list" => $result_list ] );
        }


//----------------------------------------ตรวจสอบรเข็ครถประจำวัน-----------------------------------------------------//
function daily_checklist_admin(){
   if ($this->session->userdata("emp_info_logged_in")){
      if ( isset($_POST["ft_veh_regis_no"]) ) { 
          $veh_regis_no  = $_POST["ft_veh_regis_no"];
          $date_frm     = $_POST["ft_date_frm"];
          $date_to      = $_POST["ft_date_to"];
          $veh_status  = $_POST["ft_veh_status"];
          $veh_opr_name     = $_POST["ft_veh_opr_name"]; // ชื่อพนักงาน
        }
        else{
          $veh_regis_no    = "";   
          $date_frm        = "";
          $date_to         = "";       
          $veh_status      = "";
          $veh_opr_name    = "";
        }
         $data['data_all']                        = $this->SplitpageModel->fetch_set_daily_checklist($veh_regis_no,$date_frm,$date_to,$veh_status,$veh_opr_name); 
         $data['data_daily_checklist']            = $this->SplitpageModel->fetch_daily_checklist();        //รายการเช็คลิสต์//
         $data['data_checklist_daily']            = $this->SplitpageModel->fetch_checklist_daily();        //หัวข้อเช็คลิสต์//
         $data['data_cartype']                    = $this->SplitpageModel->fetch_cartype();  // ชนิดรถ
         $data['data_regis']                      = $this->SplitpageModel->fetch_licenseplate(); // ทะเบียน
         $data['data_car']                        = $this->SplitpageModel->fetch_car(); // ยี่ห้อ
         $data['data_broken']                     = $this->SplitpageModel->fetch_broken();        //รถเสีย/
         $data['data_vts']                        = $this->SplitpageModel->fetch_vts_prj_code(); // user password
         $data['data_opr']                        = $this->SplitpageModel->fetch_vts_opr_code(); // รายชื่อพนักงานรายเดือน
         $data['data_opr_daily']                  = $this->SplitpageModel->fetch_vts_opr_dailywork(); // รายชื่อพนักงานรายวัน
         $data["title"]                           = "ตรวจสอบเช็ครถประจำวัน";

         // ------------------------     
         $data["ft_veh_regis_no"] = $veh_regis_no;
         $data["ft_date_frm"] = $date_frm;
         $data["ft_date_to"] = $date_to;         
         $data["ft_veh_status"] = $veh_status;
         $data["ft_veh_opr_name"] = $veh_opr_name; 
      //Session redirec
      return $this->load->view('pages/car_repair_admin',$data);
    }

    else{
      redirect(base_url().'Mainapp/backend', 'refresh');
    }
}

//   //--------------------------ตรวจสอบเช็ครถไม่ได้ ---------------------------//
  function ajax_save_daily_checklist_admin(){
 // $arrayData=$this->input->post(); $keys=array_keys($arrayData);  echo '<pre>';print_r($arrayData);echo '<br>';print_r($keys); print_r(count($arrayData));echo '</pre>';// exit();
          $id                             = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
          $flg                            = $_POST["hd_flg"];
          $doc_no                         = $_POST["doc_no"]; 
          $save                         = $_POST["save"];
          $md_veh_note                    = $_POST["md_veh_note"];

         if($flg == "E"){
          $result      = $this->SplitpageModel->fetch_ajax_edit_daily_checklist($id,$doc_no,$save,$md_veh_note);   
          } 
           else {
          $result    = $this->SplitpageModel->fetch_ajax_del_car_spoi($doc_no);    
          }
          echo json_encode($result);
  }

//--------------------------ตรวจสอบเช็ครถไม่ได้ ---------------------------//
  function ajax_save_car_spoil_admin(){
 // $arrayData=$this->input->post(); $keys=array_keys($arrayData);  echo '<pre>';print_r($arrayData);echo '<br>';print_r($keys); print_r(count($arrayData));echo '</pre>';// exit();
          $id                             = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
          $flg                            = $_POST["hd_flg_a"];
          $doc_no                         = $_POST["doc_no_a"]; 
          $save_1                         = $_POST["save_1"];
          $md_veh_note_a                    = $_POST["md_veh_note_a"];

         if($flg == "A"){
            $result      = $this->SplitpageModel->fetch_ajax_add_daily_spoi($id,$doc_no,$save_1,$md_veh_note_a);         //ปุ่มแก้ไข โดยจะดึงจาก ajax_save_license_plate มา
          } 
           else {
          $result    = $this->SplitpageModel->fetch_ajax_del_car_spoi($doc_no);    
          }
          echo json_encode($result);
  }




} ?>
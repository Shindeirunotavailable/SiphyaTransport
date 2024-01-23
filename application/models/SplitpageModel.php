<?php 

class SplitpageModel extends CI_Model
{ 

//เชคเปิดเมนู
public function checkmenu($emp){
  $DB2 = $this->load->database('default',TRUE);
  $DB2->select("PRG_CODE");
  $DB2->where("OPR_CODE","$emp");
  $query = $DB2->get("VTS_PRG");
  if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
                      $data[] = $row;
      }
      return $data;
  }
    return false;
  }
  
//เช็ควันหมดอายุ     
public function checklogin(){
  $com  = $this->session->userdata("emp_info_logged_in")["SESS_COM_CODE"];
  $type = $this->session->userdata("emp_info_logged_in")["SESS_EMP_TYPE"];
  $opr  = $this->session->userdata("emp_info_logged_in")["SESS_EMP_NO"];
    if($type == "M"){
      $DB = $this->load->database("db2",TRUE);
    }
    if($type == "D"){
      $DB = $this->load->database("db3",TRUE);
    }     
            
      $DB->select("COM_CODE,EMP_NO,EMP_RES_DATE");
      $DB->where("COM_CODE", $com);
      $DB->where("EMP_NO", $opr);
      $DB->where("(EMP_RES_DATE IS NULL OR EMP_RES_DATE > TO_DATE(TO_CHAR(SYSDATE, 'DD/MM/YYYY'), 'DD/MM/YYYY'))");
      $result = $DB->get("VTS_MAS")->row(); // * Added ->row()
      if($result){
        return "1";
      } 
      else{
        return false;
      }  
}

    //ประเภทรถ
    public function fetch_set_cartype($veh_type_code) {
      $DB1 = $this->load->database("default",TRUE); 

          
        if ($veh_type_code == ""){
         $veh_type_code = "0=0";
        }else 
        {
         $veh_type_code =" A.VEH_TYPE_CODE = '".$veh_type_code."' ";
        }
    //--------------------------------------------------------------------------
          $sql = " SELECT A.*  ".
                  " FROM SSP_VEH_TYPE A  ".
                  " WHERE ".$veh_type_code.  
                  " ORDER BY A.VEH_TYPE_CODE  ";                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }
                 return $data;
              }
             return $data="";
  }
    public function fetch_cartype() {
      $DB1 = $this->load->database("default",TRUE); 

          
    //--------------------------------------------------------------------------
          $sql = "SELECT * FROM SSP_VEH_TYPE ORDER BY VEH_TYPE_CODE ";                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }
                 return $data;
              }
             return $data="";
  }



   //เพิ่มหมวดงาน
  public function fetch_ajax_add_cartype($id,$md_veh_type_code,$md_veh_type_name,$md_veh_grp_type){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว
          $DB1->where("VEH_TYPE_CODE", $md_veh_type_code);
          $query = $DB1->get("SSP_VEH_TYPE")->row(); // * Added ->row()
            if($query) {
              $d = "N";
            }
            else{
                //INSERT SSP_SSP_VEH_TYPE
                $DB1->set("VEH_TYPE_CODE", $md_veh_type_code);
                $DB1->set("VEH_TYPE_NAME", $md_veh_type_name);
                $DB1->set("VEH_GRP_TYPE", $md_veh_grp_type);
                // $DB1->set("PASSENGER_NUMBER", $md_passenger_number);
                $DB1->set("OPR_CODE", $id);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("OPR_CODE_ADD", $id);
                $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "0");                                                                     
                $DB1->insert("SSP_VEH_TYPE");
                $d = "Y";
            }
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return $d;
          }
  }

   //แก้ไขหมวดงาน
 public function fetch_ajax_edit_cartype($id,$md_veh_type_code,$md_veh_type_name,$md_veh_grp_type){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว
        
                //INSERT SSP_SSP_VEH_TYPE
                $DB1->where("VEH_TYPE_CODE", $md_veh_type_code);
                $DB1->set("VEH_TYPE_NAME", $md_veh_type_name);
                $DB1->set("VEH_GRP_TYPE", $md_veh_grp_type);
                // $DB1->set("PASSENGER_NUMBER", $md_passenger_number);
                $DB1->set("OPR_CODE", $id);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "NVL(MODIFY_CNT,0) + 1" , FALSE);                                                                    
                $DB1->update("SSP_VEH_TYPE");
            
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }

  //ลบหมวดงาน
  public function fetch_ajax_del_cartype($md_veh_type_code){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว
        
                //INSERT SSP_VEH_TYPE
                $DB1->where("VEH_TYPE_CODE", $md_veh_type_code);
                                                                           
                $DB1->delete("SSP_VEH_TYPE");
            
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }

  //ส่งค่าไปsave
    public function fetch_ajax_list_data_cartype($md_veh_type_code) {
      $DB1 = $this->load->database("default",TRUE); 
    //--------------------------------------------------------------------------
          $sql = " SELECT A.*  ".
                  " FROM SSP_VEH_TYPE A  ".
                  " WHERE A.VEH_TYPE_CODE = '".$md_veh_type_code."' ".
                  " ORDER BY A.VEH_TYPE_CODE  ";                                  
          $query = $DB1->query($sql)->row();
              if ($query) {  
                 
                 return $query;
              }
             return "";
  }
  



      //ชนิดรถ
    public function fetch_set_car($veh_brand_code) {
      $DB1 = $this->load->database("default",TRUE); 

          
        if ($veh_brand_code == ""){
         $veh_brand_code = "0=0";
        }else {
         $veh_brand_code =" A.VEH_BRAND_CODE = '".$veh_brand_code."' ";
        }

    //--------------------------------------------------------------------------
          $sql = " SELECT A.*  ".
                  " FROM SSP_VEH_BRAND A  ".
                  " WHERE ".$veh_brand_code.  
                  " ORDER BY A.VEH_BRAND_CODE  ";                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }
                 return $data;
              }
             return $data="";
  }
    public function fetch_car() {
      $DB1 = $this->load->database("default",TRUE); 

          
    //--------------------------------------------------------------------------
          $sql = "SELECT * FROM SSP_VEH_BRAND ORDER BY VEH_BRAND_CODE ";                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }
                 return $data;
              }
             return $data="";
  }



   //เพิ่มหมวดงาน
  public function fetch_ajax_add_car($id,$md_veh_brand_code,$md_veh_brand_name){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว
          $DB1->where("VEH_BRAND_CODE", $md_veh_brand_code);
          $query = $DB1->get("SSP_VEH_BRAND")->row(); // * Added ->row()
            if($query) {
              $d = "N";
            }
            else{
                //INSERT SSP_VEH_TYPE

                $DB1->set("VEH_BRAND_CODE", $md_veh_brand_code);
                $DB1->set("VEH_BRAND_NAME", $md_veh_brand_name);
                $DB1->set("OPR_CODE", $id);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("OPR_CODE_ADD", $id);
                $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "0");                                                                     
                $DB1->insert("SSP_VEH_BRAND");
                $d = "Y";
            }
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return $d;
          }
  }

   //แก้ไข
 public function fetch_ajax_edit_car($id,$md_veh_brand_code,$md_veh_brand_name){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว
        
                //INSERT SSP_VEH_TYPE
                $DB1->where("VEH_BRAND_CODE", $md_veh_brand_code);
                $DB1->set("VEH_BRAND_NAME", $md_veh_brand_name);   
                $DB1->set("OPR_CODE", $id);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "NVL(MODIFY_CNT,0) + 1" , FALSE);                                                                    
                $DB1->update("SSP_VEH_BRAND");
            
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }

  //ลบหมวดงาน
  public function fetch_ajax_del_car($md_veh_brand_code){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว
        
                //INSERT SSP_VEH_TYPE
                $DB1->where("VEH_BRAND_CODE", $md_veh_brand_code);
                                                                           
                $DB1->delete("SSP_VEH_BRAND");
            
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }
    public function fetch_ajax_list_data_car($md_veh_brand_code) {
      $DB1 = $this->load->database("default",TRUE); 
    //--------------------------------------------------------------------------
          $sql = " SELECT A.*  ".
                  " FROM SSP_VEH_BRAND A  ".
                  " WHERE A.VEH_BRAND_CODE = '".$md_veh_brand_code."' ".
                  " ORDER BY A.VEH_BRAND_CODE ";                                  
          $query = $DB1->query($sql)->row();
              if ($query) {  
                 
                 return $query;
              }
             return "";
  }


      //ทะเบียนรถ
    public function fetch_set_licenseplate($veh_type_code, $veh_brand_code, $veh_regis_no) {
      $DB1 = $this->load->database("default",TRUE);  //วิธีการทำค้นหา โดยการกำหนดชื่อตัวแปลค้นให้ครบ และโหลดให้ตรงตาราง

          
        //กำหนดชื่อฟังชั่นแต่ละประเภทให้ครบ

        //ประเภทรถ
        if ($veh_type_code == ""){
         $veh_type_code = "0=0";
        }
        else {
         $veh_type_code =" A.VEH_TYPE_CODE= '".$veh_type_code."' ";
        }
        //ชนิดรถ
        if ($veh_brand_code == ""){
         $veh_brand_code = "0=0";
        }
        else {
         $veh_brand_code =" A.VEH_BRAND_CODE= '".$veh_brand_code."' ";
        }
        //ทะเบียนรถ
        if ($veh_regis_no == ""){
          $veh_regis_no = "0=0";
        }
        else {
         $veh_regis_no =" A.VEH_REGIS_NO = '".$veh_regis_no."' ";
        }
    //--------------------------------------------------------------------------
       
          $sql = " SELECT A.*, B.VEH_TYPE_NAME, C.VEH_BRAND_NAME ".
 
                  "FROM SSP_VEH_REGIS A, SSP_VEH_TYPE B, SSP_VEH_BRAND C ".
                  //เมื่อรับค่ามาค่าเดียวให้ใส่ where แต่ถ้าต้องการเพิ่มให้ใส่ and
                  " WHERE ".$veh_type_code.  //ประเภท
                  " AND ".$veh_brand_code. //ชนิด
                  " AND ".$veh_regis_no.  //ทะเบียน
                  " AND A.VEH_TYPE_CODE = B.VEH_TYPE_CODE(+)  ".
                  " AND A.VEH_BRAND_CODE = C.VEH_BRAND_CODE(+) ".
                  " ORDER BY A.VEH_REGIS_NO ";

                    //ทำการดึงข้อมูลมาจาก $sql
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }
                 return $data;
              }
             return $data="";
  }
    public function fetch_licenseplate() {
      $DB1 = $this->load->database("default",TRUE);           
    //--------------------------------------------------------------------------
          $sql = " SELECT * FROM SSP_VEH_REGIS ORDER BY VEH_REGIS_NO ";                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }
                 return $data;
              }
             return $data="";
  }




   //เพิ่มหมวดงาน
  public function fetch_ajax_add_license_plate($id,$md_veh_regis_no,$md_veh_type_code,$md_veh_brand_code,$md_veh_body_weight,$md_veh_lading_weight,$md_veh_law_weight,$md_veh_number_car,$md_veh_number_engine){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว
          $DB1->where("VEH_REGIS_NO", $md_veh_regis_no);
          $query = $DB1->get("SSP_VEH_REGIS")->row(); // * Added ->row()
            if($query) {
              $d = "N";
            }
            else{
                //INSERT SSP_VEH_TYPE
                $DB1->set("VEH_REGIS_NO", $md_veh_regis_no);
                $DB1->set("VEH_TYPE_CODE", $md_veh_type_code);
                $DB1->set("VEH_BRAND_CODE", $md_veh_brand_code);
                $DB1->set("VEH_BODY_WEIGHT", $md_veh_body_weight);
                $DB1->set("VEH_LADING_WEIGHT",$md_veh_lading_weight);
                $DB1->set("VEH_LAW_WEIGHT", $md_veh_law_weight);  
                $DB1->set("VEH_NUMBER_CAR",$md_veh_number_car);
                $DB1->set("VEH_NUMBER_ENGINE", $md_veh_number_engine);  
                $DB1->set("OPR_CODE", $id);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("OPR_CODE_ADD", $id);
                $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "0");                                                                     
                $DB1->insert("SSP_VEH_REGIS");
                $d = "Y";
            }
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return $d;
          }
  }

   // แก้ไขหมวดงาน
 public function fetch_ajax_edit_license_plate($id,$md_veh_regis_no,$md_veh_type_code,$md_veh_brand_code,$md_veh_body_weight,$md_veh_lading_weight,$md_veh_law_weight,$md_veh_number_car,$md_veh_number_engine){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว
                //INSERT SSP_VEH_TYPE
                $DB1->where("VEH_REGIS_NO", $md_veh_regis_no);
                $DB1->set("VEH_TYPE_CODE", $md_veh_type_code);
                $DB1->set("VEH_BRAND_CODE", $md_veh_brand_code);
                $DB1->set("VEH_BODY_WEIGHT", $md_veh_body_weight);
                $DB1->set("VEH_LADING_WEIGHT",$md_veh_lading_weight);
                $DB1->set("VEH_LAW_WEIGHT", $md_veh_law_weight);  
                $DB1->set("VEH_NUMBER_CAR",$md_veh_number_car);
                $DB1->set("VEH_NUMBER_ENGINE", $md_veh_number_engine);
                $DB1->set("OPR_CODE", $id);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "NVL(MODIFY_CNT,0) + 1" , FALSE);                                                                    
                $DB1->update("SSP_VEH_REGIS");
            
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }

  //ลบหมวดงาน
  public function fetch_ajax_del_license_plate($md_veh_regis_no){ //กำหนดชื่อตัวแปรทีต้องการจะลบ
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว
        
                //INSERT SSP_VEH_TYPE
                $DB1->where("VEH_REGIS_NO", $md_veh_regis_no);
                                                                           
                $DB1->delete("SSP_VEH_REGIS");
            
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }

  // ส่งค่าไปsave
    public function fetch_ajax_list_data_license_plate($veh_regis_no) {
      $DB1 = $this->load->database("default",TRUE); 
    //--------------------------------------------------------------------------
          $sql = " SELECT A.* ".
                  " FROM SSP_VEH_REGIS A  ".
                  " WHERE VEH_REGIS_NO = '$veh_regis_no'";
                                                  
          $query = $DB1->query($sql)->row();
              if ($query) {  
                 
                 return $query;
              }
             return "";
  }
    



      //พนักงานขับรถ
  public function fetch_set_driver($veh_emp_no,$veh_emp_name,$veh_type_code,$veh_regis_no){ 
  $DB1 = $this->load->database("default",TRUE);

  $veh_emp_no         = ($veh_emp_no == "" ? "0=0" : " upper(A.VEH_EMP_NO) like upper('%".$veh_emp_no."%') ");
  $veh_emp_name       = ($veh_emp_name == "" ? "0=0" : " upper(A.VEH_EMP_NAME) like upper('%".$veh_emp_name."%') ");
  $veh_type_code        = ($veh_type_code == "" ? "0=0" : " A.VEH_TYPE_CODE= '".$veh_type_code."' ");
  $veh_regis_no        = ($veh_regis_no == "" ? "0=0" : " A.VEH_REGIS_NO= '".$veh_regis_no."' ");
    //-------------------------------------
     $sql = " SELECT A.*, B.VEH_TYPE_NAME   ".               
            " FROM SSP_TRANSPORT_DRIVER A            ".    
            // การจอยตาราง data base  โดยเอาชื่อตารางมาจอย SSP_.......... B on A. = B.
            " LEFT OUTER JOIN SSP_VEH_TYPE B ON A.VEH_TYPE_CODE = B.VEH_TYPE_CODE   ".                                      
            " WHERE ".$veh_emp_no. // รหัส
            " AND ".$veh_emp_name. // ชื่อ           
            " AND ".$veh_type_code. //ประเภท           
            " AND ".$veh_regis_no. // ทะเบียน            
            " ORDER BY A.VEH_EMP_NO  ";                            
      $query = $DB1->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
            return $data;
        }
    return "";
}





  // }
    public function fetch_driver() {
      $DB1 = $this->load->database("default",TRUE);        
    //--------------------------------------------------------------------------
          $sql = " SELECT * FROM SSP_TRANSPORT_DRIVER ORDER BY VEH_EMP_NO ";                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }
                 return $data;
              }
             return $data="";
  }
   //เพิ่มหมวดงาน
  public function fetch_ajax_add_driver($id,$md_veh_emp_no,$md_veh_id_card,$md_veh_regis_no,$md_veh_emp_name,$md_veh_brith_day,$md_veh_age,$md_veh_tell,$md_veh_address,$md_veh_driver_id,$md_veh_driver_type,$md_veh_issue_date,$md_veh_expirt_date,$md_veh_start_work_date,$md_veh_work_age,$md_veh_position_name,$md_veh_type_code,$md_veh_emp_pic){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว
          $DB1->where("VEH_EMP_NO", $md_veh_emp_no);
          $query = $DB1->get("SSP_TRANSPORT_DRIVER")->row(); // * Added ->row()
            if($query) {
              $d = "N";
            }
            else{
                //INSERT SSP_VEH_TYPE
                $DB1->set("VEH_EMP_NO", $md_veh_emp_no);
                $DB1->set("VEH_ID_CARD", $md_veh_id_card);
                $DB1->set("VEH_REGIS_NO", $md_veh_regis_no);
                $DB1->set("VEH_EMP_NAME", $md_veh_emp_name);
                $DB1->set("VEH_BIRTH_DAY", $md_veh_brith_day);
                $DB1->set("VEH_AGE",$md_veh_age);
                $DB1->set("VEH_TELL", $md_veh_tell); 
                $DB1->set("VEH_ADDRESS", $md_veh_address);
                $DB1->set("VEH_DRIVER_ID", $md_veh_driver_id);
                $DB1->set("VEH_DRIVER_TYPE", $md_veh_driver_type);
                $DB1->set("VEH_ISSUE_DATE", $md_veh_issue_date);
                $DB1->set("VEH_EXPIRY_DATE", $md_veh_expirt_date);
                $DB1->set("VEH_START_WORK_DATE",$md_veh_start_work_date);
                $DB1->set("VEH_WORK_AGE", $md_veh_work_age);          
                $DB1->set("VEH_POSITION_NAME", $md_veh_position_name);
                $DB1->set("VEH_TYPE_CODE", $md_veh_type_code);
                $DB1->set("VEH_EMP_PIC", $md_veh_emp_pic);               
                $DB1->set("OPR_CODE", $id);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("OPR_CODE_ADD", $id);
                $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "0");                                                                     
                $DB1->insert("SSP_TRANSPORT_DRIVER");
                $d = "Y";
            }
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return $d;
          }
  }

   // แก้ไขหมวดงาน
 public function fetch_ajax_edit_driver($id,$md_veh_emp_no,$md_veh_id_card,$md_veh_regis_no,$md_veh_emp_name,$md_veh_brith_day,$md_veh_age,$md_veh_tell,$md_veh_address,$md_veh_driver_id,$md_veh_driver_type,$md_veh_issue_date,$md_veh_expirt_date,$md_veh_start_work_date,$md_veh_work_age,$md_veh_position_name,$md_veh_type_code,$md_veh_emp_pic){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว

                //INSERT SSP_VEH_TYPE
                $DB1->where("VEH_EMP_NO", $md_veh_emp_no);
                $DB1->set("VEH_ID_CARD", $md_veh_id_card);
                $DB1->set("VEH_REGIS_NO", $md_veh_regis_no);
                $DB1->set("VEH_EMP_NAME", $md_veh_emp_name);
                $DB1->set("VEH_BIRTH_DAY", $md_veh_brith_day);
                $DB1->set("DOC_STATUS",  "");
                $DB1->set("VEH_AGE",$md_veh_age);
                $DB1->set("VEH_TELL", $md_veh_tell); 
                $DB1->set("VEH_ADDRESS", $md_veh_address);
                $DB1->set("VEH_DRIVER_ID", $md_veh_driver_id);
                $DB1->set("VEH_DRIVER_TYPE", $md_veh_driver_type);
                $DB1->set("VEH_ISSUE_DATE", $md_veh_issue_date);
                $DB1->set("VEH_EXPIRY_DATE", $md_veh_expirt_date);
                $DB1->set("VEH_START_WORK_DATE",$md_veh_start_work_date);
                $DB1->set("VEH_WORK_AGE", $md_veh_work_age);          
                $DB1->set("VEH_POSITION_NAME", $md_veh_position_name);
                $DB1->set("VEH_TYPE_CODE", $md_veh_type_code);
                $DB1->set("VEH_EMP_PIC", $md_veh_emp_pic); 
                $DB1->set("OPR_CODE", $id);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "NVL(MODIFY_CNT,0) + 1" , FALSE);                                                                    
                $DB1->update("SSP_TRANSPORT_DRIVER");
            
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }

  //ลบหมวดงาน
  public function fetch_ajax_del_driver($md_veh_emp_no){ //กำหนดชื่อตัวแปรทีต้องการจะลบ
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว
        
                //INSERT SSP_VEH_TYPE
                $DB1->where("VEH_EMP_NO", $md_veh_emp_no);
                                                                           
                $DB1->delete("SSP_TRANSPORT_DRIVER");
            
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }

    //ลบหมวดงาน
  public function fetch_ajax_del_resign_driver($md_veh_emp_no,$md_veh_note_resign,$md_veh_date_resign){ //กำหนดชื่อตัวแปรทีต้องการจะลบ
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();        
                //INSERT SSP_VEH_TYPE
                $DB1->where("VEH_EMP_NO", $md_veh_emp_no);
                $DB1->set("DATE_RESIGN", "to_date('".date("d/m/Y", strtotime($md_veh_date_resign))."','dd/mm/yyyy')", false);
                $DB1->set("DOC_STATUS",  "I");
                $DB1->set("VEH_NOTE_RESIGN", $md_veh_note_resign);                                                    
                $DB1->update("SSP_TRANSPORT_DRIVER");
            
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }



  // ส่งค่าไปsave
    public function fetch_ajax_list_data_driver($veh_emp_no) {
      $DB1 = $this->load->database("default",TRUE); 
    //--------------------------------------------------------------------------
          $sql = " SELECT A.* ".
                  " FROM SSP_TRANSPORT_DRIVER A  ". 
                  " WHERE VEH_EMP_NO = '$veh_emp_no'";
                                                  
          $query = $DB1->query($sql)->row();
              if ($query) {  
                 
                 return $query;
              }
             return "";
  }  


      // รายงานพนักงานขับรถ TEST
  public function fetch_set_formuser_test($veh_regis_no,$date_frm,$date_to){ 
  $DB1 = $this->load->database("default",TRUE);
  $veh_regis_no        = ($veh_regis_no == "" ? "0=0" : " A.VEH_REGIS_NO= '".$veh_regis_no."' ");
  $date_frm     = ($date_frm == "" ? "0=0" : " A.VEH_DATE_DROP >= TO_DATE('".date('d/m/Y', strtotime($date_frm))."', 'DD/MM/YYYY') ");
  $date_to      = ($date_to == "" ? "0=0" : " A.VEH_DATE_DROP <= TO_DATE('".date('d/m/Y', strtotime($date_to))."', 'DD/MM/YYYY') ");
    // -------------------------------------
    $ID = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
     $sql = " SELECT A.*, B.PRJ_NAME_T as RRJ_VEH_START,C.PRJ_NAME_T as RRJ_VEH_STOP  ".  
     //SELECT A.*, B.ชื่อตารางที่เราต้องการโชว์ as คือการตั้งชื่อเพื่อไม่ให้ซ่ำกัน,C.ชื่อตารางที่เราต้องการโชว์ as คือการตั้งชื่อเพื่อไม่ให้ซ่ำกัน           

            " FROM SSP_TRANSPORT_TIMELINE A            ".    
            // การจอยตาราง data base  โดยเอาชื่อตารางมาจอย SSP_.......... B on A. = B.
            " LEFT OUTER JOIN VTS_PRJ_CODE B ON A.VEH_START = B.PRJ_CODE   ".  // LEFT OUTER JOIN ชื่อตารางที่ต้องการจอย B ON A.ชื่อตารางที่เรากำหนด = B.ชื่อตารางสำหรับค้นหา
            " LEFT OUTER JOIN VTS_PRJ_CODE C ON A.VEH_STOP = C.PRJ_CODE   ".    
             // LEFT OUTER JOIN หาชื่อตารางโดย function set_........ จาก DATA [.........]                               
            " WHERE ".$veh_regis_no. // รหัส
            " AND ".$date_frm.
            " AND ".$date_to. 
            " AND OPR_CODE_ADD = '".$ID."'".
            " ORDER BY A.VEH_REGIS_NO  ";                            
      $query = $DB1->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
            return $data;
        }
    return "";
}

    public function fetch_formuser_test() {
      $DB1 = $this->load->database("default",TRUE);        
    //--------------------------------------------------------------------------
          $sql = " SELECT * FROM SSP_TRANSPORT_TIMELINE ORDER BY DOC_NO ";                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }
                 return $data;
              }
             return $data="";
  }
   //เพิ่มหมวดงาน
  public function fetch_ajax_add_formuser_test($id,$doc_no,$doc_date,$md_veh_start,$md_veh_stop,$md_veh_regis_no,$md_veh_date_up,$md_veh_time_start,$md_veh_km_start,$md_veh_type_list,$md_veh_weight,$md_veh_start_name,$md_veh_stop_name,$arrayData){
        $DB1   = $this->load->database("default",TRUE); 
        $keys=array_keys($arrayData);
        $DB1->trans_start();
                //INSERT SSP_VEH_
                $DB1->set("DOC_NO", $doc_no);
                $DB1->set("DOC_STATUS",  "A"); 
                $DB1->set("DOC_DATE", "to_date('".date("d/m/Y")."','dd/mm/yyyy')", false);
                $DB1->set("VEH_START", $md_veh_start);
                $DB1->set("VEH_STOP", $md_veh_stop);
                $DB1->set("VEH_REGIS_NO", $md_veh_regis_no);
                $DB1->set("VEH_DATE_UP", "to_date('".date("d/m/Y", strtotime($md_veh_date_up))."','dd/mm/yyyy')", false);
                $DB1->set("VEH_TIME_START", $md_veh_time_start); 
                $DB1->set("VEH_KM_START", $md_veh_km_start);
                $DB1->set("VEH_TYPE_LIST", $md_veh_type_list);
                $DB1->set("VEH_WEIGHT", $md_veh_weight);
                $DB1->set("VEH_START_NAME", $md_veh_start_name);
                $DB1->set("VEH_STOP_NAME", $md_veh_stop_name);              
                $DB1->set("OPR_CODE", $id);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("OPR_CODE_ADD", $id);
                $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "0");                                                                     
                $DB1->insert("SSP_TRANSPORT_TIMELINE");
                //----------------------- เพิ่มตารางราง------------------//
                    $seq =1 ;
                                     for($i = 15; $i < count($arrayData); $i++) {
                        $j = 0; 
                              foreach ($arrayData[$keys[$i]] as $key => $value) {
                                  switch ($j) { 
                                      case 0 : $md_veh_list_no    = $value; break; 
                                      case 1 : $md_veh_list    = $value;  break; 
                                   }
                                   $j++;
                              } 
                                    // SSP_PRJ_AREA_TYPE_SUBROOM     -add
                                    $DB1->set("DOC_NO", $doc_no);
                                    $DB1->set("DET_SEQ", $seq);
                                    $DB1->set("VEH_LIST_NO", $md_veh_list_no);
                                    $DB1->set("VEH_LIST", $md_veh_list);
                                    $DB1->set("OPR_CODE", $id);
                                    $DB1->set("DATE_U", "SYSDATE", FALSE); 
                                    $DB1->set("OPR_CODE_ADD", $id);
                                    $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                                    $DB1->set("MODIFY_CNT",  "0");                                                                     
                                    $DB1->insert("SSP_TRANSPORT_LIST");
                                   $seq++;
                      }


         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }

//ยืนยันปลายทาง
 public function fetch_ajax_approve_formuser_test($id,$doc_no,$md_veh_time_stop,$md_veh_sum_time,$md_veh_km_stop,$md_veh_bearer,$md_veh_date_drop,$md_veh_note,$arrayData){
        $DB1   = $this->load->database("default",TRUE); 
        $keys=array_keys($arrayData);
        $DB1->trans_start();
                $DB1->where("DOC_NO", $doc_no);
                $DB1->set("DOC_CNF_FLG",  "Y");
                $DB1->set("VEH_TIME_STOP", $md_veh_time_stop);
                $DB1->set("VEH_SUM_TIME", $md_veh_sum_time);
                $DB1->set("VEH_KM_STOP",$md_veh_km_stop);
                $DB1->set("VEH_BEARER", $md_veh_bearer);          
                $DB1->set("VEH_DATE_DROP", "to_date('".date("d/m/Y", strtotime($md_veh_date_drop))."','dd/mm/yyyy')", false);
                $DB1->set("VEH_NOTE", $md_veh_note);             
                $DB1->set("OPR_CODE", $id);
                $DB1->set("CNF_DATE", "SYSDATE", FALSE);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "0");                                                                     
                $DB1->update("SSP_TRANSPORT_TIMELINE");
                        //--------------- save รูป----------------------------------//
                            if(isset($_FILES["filUpload"])){ // เช็คค่าไฟล์
                                   $DB1->select_max("ATTACH_SEQ");
                                      $DB1->where("DOC_NO",  $doc_no);
                                      $result = $DB1->get("SSP_TRANSPORT_PIC")->row(); // * Added ->row()
                                          if($result){

                                            $seq = $result->ATTACH_SEQ + 1;
                                          }
                                          else{
                                            $seq = 1;
                                          }
                                  foreach($_FILES["filUpload"]["tmp_name"] as $key => $val){ 
                                      if($_FILES["filUpload"]["tmp_name"][$key]){  
                                          $file_name        = $_FILES["filUpload"]["name"][$key];            // ชื่อไฟล์
                                          $file_size           = $_FILES["filUpload"]["size"][$key];
                                          $file_tmp          = $_FILES["filUpload"]["tmp_name"][$key];
                                          $file_type         = $_FILES["filUpload"]["type"][$key];  
                                          $extention_file  = ".".pathinfo($_FILES["filUpload"]["name"][$key], PATHINFO_EXTENSION);        // .นามสกุลไฟล์
                                          $name_suc       = $doc_no."-".str_pad($seq, 3, "0", STR_PAD_LEFT).$extention_file; 
                                     
                                         move_uploaded_file($file_tmp,"PIC/".$name_suc); 
                                          //insert table ans_vac_emp_ath_file      
                                          $DB1->set("DOC_NO",  $doc_no);      
                                          $DB1->set("ATTACH_SEQ",  $seq);      
                                          $DB1->set("FILE_NAME",  $name_suc);      
                                          $DB1->set("REAL_FILE_NAME",  $file_name);      
                                          $DB1->set("FILE_TYPE",  $extention_file);      
                                          $DB1->set("OPR_CODE",  $id);  
                                           $DB1->set("DATE_U", "SYSDATE", FALSE);    
                                          $DB1->set("OPR_CODE_ADD",  $id);      
                                          $DB1->set("DATE_U_ADD", "SYSDATE", FALSE);  
                                          $DB1->set("MODIFY_CNT",  "0");   
                                          $DB1->insert("SSP_TRANSPORT_PIC");   
                                          $seq++;
                                      }
                                  }
                              }

         // // //complete-----------------  
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }

  }



//----------------------------------------------- แก้ไขต้นทาง----------------------------------//
   public function fetch_ajax_edit_formuser_test($id,$doc_no,$doc_date,$md_veh_start,$md_veh_stop,$md_veh_regis_no,$md_veh_date_up,$md_veh_time_start,$md_veh_km_start,$md_veh_type_list,$md_veh_weight,$arrayData,$md_veh_start_name,$md_veh_stop_name){
        $DB1   = $this->load->database("default",TRUE); 
        $keys=array_keys($arrayData);
        $DB1->trans_start();

                //INSERT SSP_VEH_
                $DB1->where("DOC_NO", $doc_no);
                $DB1->set("VEH_START", $md_veh_start);
                $DB1->set("VEH_STOP", $md_veh_stop);
                $DB1->set("VEH_REGIS_NO", $md_veh_regis_no);
                $DB1->set("VEH_DATE_UP", "to_date('".date("d/m/Y", strtotime($md_veh_date_up))."','dd/mm/yyyy')", false);
                $DB1->set("VEH_TIME_START", $md_veh_time_start); 
                $DB1->set("VEH_KM_START", $md_veh_km_start);
                $DB1->set("VEH_TYPE_LIST", $md_veh_type_list);
                $DB1->set("VEH_WEIGHT", $md_veh_weight);
                $DB1->set("VEH_START_NAME", $md_veh_start_name);
                $DB1->set("VEH_STOP_NAME", $md_veh_stop_name);                              
                $DB1->set("OPR_CODE", $id);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "NVL(MODIFY_CNT,0) + 1" , FALSE);                                                                     
                $DB1->update("SSP_TRANSPORT_TIMELINE");
  // --------------------------------- แก้ไขตารางย่อย ทำการอัพเดต-------------------------// 
                                    $DB1->where("DOC_NO", $doc_no);                                                                   
                                    $DB1->delete("SSP_TRANSPORT_LIST");
                    $seq =1 ;
                                     for($i = 15; $i < count($arrayData); $i++) {
                        $j = 0; 
                              foreach ($arrayData[$keys[$i]] as $key => $value) {
                                  switch ($j) { 
                                      case 0 : $md_veh_list_no    = $value; break; 
                                      case 1 : $md_veh_list    = $value;  break; 
                                   }
                                   $j++;
                              } 
                                    // SSP_PRJ_AREA_TYPE_SUBROOM     -add
                                    $DB1->set("DOC_NO", $doc_no);
                                    $DB1->set("DET_SEQ", $seq);
                                    $DB1->set("VEH_LIST_NO", $md_veh_list_no);
                                    $DB1->set("VEH_LIST", $md_veh_list);
                                    $DB1->set("OPR_CODE", $id);
                                    $DB1->set("DATE_U", "SYSDATE", FALSE); 
                                    $DB1->set("OPR_CODE_ADD", $id);
                                    $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                                    $DB1->set("MODIFY_CNT",  "0");                                                                     
                                    $DB1->insert("SSP_TRANSPORT_LIST");
                                   $seq++;
                      }
         // //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }





//----------------------------------------- หน้า admin รายงานพนักงานขับรถ ---------------------------------------//
    public function fetch_set_formuser_admin($veh_regis_no,$date_frm,$date_to,$veh_opr_name,$veh_status){ 
  $DB1 = $this->load->database("default",TRUE);
  $veh_regis_no        = ($veh_regis_no == "" ? "0=0" : " A.VEH_REGIS_NO= '".$veh_regis_no."' ");
  $date_frm            = ($date_frm == "" ? "0=0" : " A.VEH_DATE_DROP >= TO_DATE('".date('d/m/Y', strtotime($date_frm))."', 'DD/MM/YYYY') ");
  $date_to             = ($date_to == "" ? "0=0" : " A.VEH_DATE_DROP <= TO_DATE('".date('d/m/Y', strtotime($date_to))."', 'DD/MM/YYYY') ");
  $veh_opr_name        = ($veh_opr_name == "" ? "0=0" : " A.OPR_CODE= '".$veh_opr_name."' ");
  $veh_status        = ($veh_status == "" ? "0=0" : " A.APPROVE_FLG = '".$veh_status."' ") ;  
  //$veh_opr_code        = ($veh_opr_code == "" ? "0=0" : " upper(A.OPR_CODE) like upper('%".$veh_opr_code."%') ");
  //$veh_opr_name        = ($veh_opr_name == "" ? "0=0" : " upper(D.OPR_NAME_T) like upper('%".$veh_opr_name."%') "); 

 
    // -------------------------------------
     $sql = " SELECT A.*, B.PRJ_NAME_T as RRJ_VEH_START,C.PRJ_NAME_T as RRJ_VEH_STOP,D.OPR_NAME_T as OPR_NAME,E.OPR_NAME_T as APPROVE_OPR  ".

     //SELECT A.*, B.ชื่อตารางที่เราต้องการโชว์ as คือการตั้งชื่อเพื่อไม่ให้ซ่ำกัน,C.ชื่อตารางที่เราต้องการโชว์ as คือการตั้งชื่อเพื่อไม่ให้ซ่ำกัน           

            " FROM SSP_TRANSPORT_TIMELINE A ".    
            // การจอยตาราง data base  โดยเอาชื่อตารางมาจอย SSP_.......... B on A. = B.
            " LEFT OUTER JOIN VTS_PRJ_CODE B ON A.VEH_START = B.PRJ_CODE   ".  
            // LEFT OUTER JOIN ชื่อตารางที่ต้องการจอย B ON A.ชื่อตารางที่เรากำหนด = B = ตัวแปรจะเปลี่ยงไปทุกๆครั่'.ชื่อตารางสำหรับค้นหา
            " LEFT OUTER JOIN VTS_PRJ_CODE C ON A.VEH_STOP = C.PRJ_CODE   ".
            " LEFT OUTER JOIN VTS_OPR_DAILYWORK D ON A.OPR_CODE = D.OPR_CODE   ".
            " LEFT OUTER JOIN VTS_OPR_DAILYWORK E ON A.APPROVE_OPR = E.OPR_CODE   ". 
             // LEFT OUTER JOIN หาชื่อตารางโดย function set_........ จาก DATA [.........]   
            " WHERE ".$veh_opr_name. // รหัส
            " AND ".$veh_regis_no. // รหัส
            " AND ".$date_frm.
            " AND ".$date_to. 
            " AND ".$veh_status.
            //" AND ".$veh_opr_code.
            " AND DOC_STATUS = 'A' ".
            //" AND DOC_CNF_FLG = 'Y' ".
            " ORDER BY A.VEH_REGIS_NO  ";    


      $query = $DB1->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }

          // echo "<pre>";
          // print_r($data); exit(); // สำหรับส่งข้อมูลมา test โชว์ช้อมูล
          // echo "</pre>";

            return $data;
        }
    return "";
}

 public function fetch_ajax_admin_formuser($id,$doc_no,$md_veh_time_stop_b,$md_veh_km_stop_b,$md_veh_bearer_b,$md_veh_date_drop_b,$md_veh_note_b,$save_1,$md_explain_b,$md_veh_time_sum_b){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว
                // admin
                $DB1->where("DOC_NO", $doc_no);
                $DB1->set("VEH_TIME_STOP", $md_veh_time_stop_b);
                $DB1->set("VEH_KM_STOP",$md_veh_km_stop_b);
                $DB1->set("VEH_BEARER", $md_veh_bearer_b);          
                $DB1->set("VEH_DATE_DROP", "to_date('".date("d/m/Y", strtotime($md_veh_date_drop_b))."','dd/mm/yyyy')", false);
                $DB1->set("VEH_NOTE", $md_veh_note_b);                  
                $DB1->set("APPROVE_FLG",$save_1); 
                $DB1->set("VEH_EXPLAIN",$md_explain_b); 
                $DB1->set("VEH_SUM_TIME",$md_veh_time_sum_b);                      
                $DB1->set("APPROVE_OPR", $id);
                $DB1->set("APPROVE_DATE", "SYSDATE", FALSE);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "0");                                                                     
                $DB1->update("SSP_TRANSPORT_TIMELINE");



         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }

  }
 


  //Run Docno
  public function fetch_run_doc_no($id){
        $DB1    = $this->load->database("default",TRUE); 
        $DB1->trans_start();
                      $todate    = date("Y-m-d");
                      $year       = date("Y", strtotime($todate)) ;
                      $month    = date("m", strtotime($todate));
              
                      $DB1->select("DOC_RUN_LAST_SEQ");
                      $DB1->where("DOC_TYPE", "TRANSPORT");
                      $DB1->where("DOC_RUN_YEAR", $year);
                      $DB1->where("DOC_RUN_MONTH", $month);
                      $result = $DB1->get("SSP_DOC_RUN_MONTH")->row(); 
                          if($result){
                                 $m_seq = $result->DOC_RUN_LAST_SEQ + 1 ;
                                 $DB1->where("DOC_TYPE", "TRANSPORT");
                                 $DB1->where("DOC_RUN_YEAR", $year);
                                 $DB1->where("DOC_RUN_MONTH", $month);
                                 $DB1->set("DOC_RUN_LAST_SEQ", $m_seq);
                                 $DB1->set("OPR_CODE", $id);
                                 $DB1->set("DATE_U", "SYSDATE",false);
                                 $DB1->set("MODIFY_CNT",  "NVL(MODIFY_CNT,0) + 1" , FALSE);                                    
                                 $DB1->update("SSP_DOC_RUN_MONTH");
                          }
                          else{
                                 $m_seq = 1;
                                 $DB1->set("DOC_TYPE", "TRANSPORT");
                                 $DB1->set("DOC_RUN_YEAR", $year);
                                 $DB1->set("DOC_RUN_MONTH", $month);
                                 $DB1->set("DOC_RUN_LAST_SEQ", $m_seq);
                                 $DB1->set("OPR_CODE", $id);
                                 $DB1->set("DATE_U", "SYSDATE", FALSE); 
                                 $DB1->set("OPR_CODE_ADD", $id);
                                 $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                                 $DB1->set("MODIFY_CNT",  "0");       
                                 $DB1->insert("SSP_DOC_RUN_MONTH");
                         }
                       $seq    = str_pad($m_seq, 4, "0", STR_PAD_LEFT);
                       $doc    = $year.$month."-".$seq; 
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return $doc;
          }
                       
  }



  //ลบหมวดงาน
  public function fetch_ajax_del_formuser_test($doc_no){ //กำหนดชื่อตัวแปรทีต้องการจะลบ
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();        
                //INSERT SSP_VEH_TYPE
                $DB1->where("DOC_NO", $doc_no);
                $DB1->set("DOC_STATUS",  "I"); 
                $DB1->set("DOC_CNF_FLG",  "");                                                    
                $DB1->update("SSP_TRANSPORT_TIMELINE");
            
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }


  // save ตารางหลัก
    public function fetch_ajax_list_data_formuser_test($doc_no) {
      $DB1 = $this->load->database("default",TRUE); 
    //--------------------------------------------------------------------------
          $sql = " SELECT A.* ".
                  " FROM  SSP_TRANSPORT_TIMELINE  A". 
                  " WHERE DOC_NO = '$doc_no'";
                                                  
          $query = $DB1->query($sql)->row();
              if ($query) {  
                 
                 return $query;
              }
             return "";
  }  


// ตารางsave รูปรายงานพนักงานขับรถ
    public function fetch_ajax_list_data_formuser_pic($doc_no) {
      $DB1 = $this->load->database("default",TRUE); 
    //--------------------------------------------------------------------------
          $sql = " SELECT A.* ".
                  " FROM SSP_TRANSPORT_PIC A  ". 
                  " WHERE DOC_NO = '$doc_no'";
                                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }

         // echo "<pre>";
         //  print_r($data); exit(); // สำหรับส่งข้อมูลมา test โชว์ช้อมูล
         //  echo "</pre>";

                 return $data;
              }
             return $data="";
  }  

  // ตารางรอง
    public function fetch_ajax_list_data_list($doc_no) {
      $DB1 = $this->load->database("default",TRUE); 
          $sql = " SELECT A.* ".
                  " FROM SSP_TRANSPORT_LIST A  ". 
                  " WHERE DOC_NO = '$doc_no'";
                                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }


                 return $data;
              }
             return $data="";
  }
    //------------------ตาราง รหัสต้นทุน--------------------------------------------------------

        public function fetch_vts_prj_code () {
      $DB1 = $this->load->database("default",TRUE);           
          $sql = " SELECT * FROM VTS_PRJ_CODE  ORDER BY PRJ_CODE ";                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }

                 return $data;
              }
             return $data="";
  }
    //------------------ตาราง รหัสพนักงาน--------------------------------------------------------

        public function fetch_vts_opr_dailywork () { 
      $DB1 = $this->load->database("default",TRUE);           
          $sql = " SELECT * FROM VTS_OPR_DAILYWORK  ORDER BY OPR_CODE ";                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }

         // echo "<pre>";
         //  print_r($data); exit(); // สำหรับส่งข้อมูลมา test โชว์ช้อมูล
         //  echo "</pre>";

                 return $data;
              }
             return $data="";
  }


//----------------------------------------------------------ตั้งค่ารถเสีย ------------------------------------------------
    public function fetch_set_broken($veh_broken_no) {
      $DB1 = $this->load->database("default",TRUE); 
        if ($veh_broken_no == ""){
         $veh_broken_no = "0=0";
        }else {
         $veh_broken_no =" A.VEH_BROKEN_NO = '".$veh_broken_no."' ";
        }
    //--------------------------------------------------------------------------
          $sql = " SELECT A.*  ".
                  " FROM SSP_TRANSPORT_BROKEN A  ".
                  " WHERE ".$veh_broken_no.  
                  " ORDER BY A.VEH_BROKEN_NO  ";                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }
                 return $data;
              }
             return $data="";
  }
    public function fetch_broken() {
      $DB1 = $this->load->database("default",TRUE); 


    //--------------------------------------------------------------------------
          $sql = "SELECT * FROM SSP_TRANSPORT_BROKEN ORDER BY VEH_BROKEN_NO ";                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }
                 return $data;
              }
             return $data="";
  }



   //เพิ่มหมวดงาน
  public function fetch_ajax_add_broken($id,$md_veh_broken_no,$md_veh_broken_list){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว
          $DB1->where("VEH_BROKEN_NO", $md_veh_broken_no);
          $query = $DB1->get("SSP_TRANSPORT_BROKEN")->row(); // * Added ->row()
            if($query) {
              $d = "N";
            }
            else{
                //INSERT SSP_VEH_TYPE
                $DB1->set("VEH_BROKEN_NO", $md_veh_broken_no);
                $DB1->set("VEH_BROKEN_LIST", $md_veh_broken_list);
                $DB1->set("OPR_CODE", $id);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("OPR_CODE_ADD", $id);
                $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "0");                                                                     
                $DB1->insert("SSP_TRANSPORT_BROKEN");
                $d = "Y";
            }
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return $d;
          }
  }

   //แก้ไข
 public function fetch_ajax_edit_broken($id,$md_veh_broken_no,$md_veh_broken_list){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว
        
                //INSERT SSP_VEH_TYPE
                $DB1->where("VEH_BROKEN_NO", $md_veh_broken_no);
                $DB1->set("VEH_BROKEN_LIST", $md_veh_broken_list);   
                $DB1->set("OPR_CODE", $id);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "NVL(MODIFY_CNT,0) + 1" , FALSE);                                                                    
                $DB1->update("SSP_TRANSPORT_BROKEN");
            
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }

  //ลบหมวดงาน
  public function fetch_ajax_del_broken($md_veh_broken_no){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว
        
                //INSERT SSP_VEH_TYPE
                $DB1->where("VEH_BROKEN_NO", $md_veh_broken_no);
                                                                           
                $DB1->delete("SSP_TRANSPORT_BROKEN");
            
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          } 
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }
    public function fetch_ajax_list_data_broken($md_veh_broken_no) {
      $DB1 = $this->load->database("default",TRUE); 
    //--------------------------------------------------------------------------
          $sql = " SELECT A.*  ".
                  " FROM SSP_TRANSPORT_BROKEN A  ".
                  " WHERE A.VEH_BROKEN_NO = '".$md_veh_broken_no."' ".
                  " ORDER BY A.VEH_BROKEN_NO ";                                  
          $query = $DB1->query($sql)->row();
              if ($query) {  
                 
                 return $query;
              }
             return "";
  }





    // ตั้งค่าเช็คลิส
  public function fetch_set_checklist($veh_title_seq){  
  $DB1 = $this->load->database("default",TRUE);
  $veh_title_seq        = ($veh_title_seq == "" ? "0=0" : " A.VEH_TITLE_SEQ= '".$veh_title_seq."' ");

    // -------------------------------------
    $ID = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
     $sql = " SELECT DISTINCT  A. VEH_TITLE_SEQ, VEH_TITLE_LIST  ".  // VEH_TITLE_SEQ, VEH_TITLE_LIST  ช่องที่ต้องการแสดงไม่ให้ซ่ำกัน โดยใช้ DISTINCT ตัดตัวแปรที่ซ่ำกันออก
            " FROM SSP_TRANSPORT_FIRST_CHECK_TYPE A            ".    
            " WHERE ".$veh_title_seq. // รหัส
            //" AND OPR_CODE_ADD = '".$ID."'". เห็นแค่ของตัวเอง
            " ORDER BY A.VEH_TITLE_SEQ  ";                            
      $query = $DB1-> query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
            return $data;
        }
    return "";
}


    public function fetch_checklist() {
      $DB1 = $this->load->database("default",TRUE);        
    //--------------------------------------------------------------------------
          $sql = " SELECT * FROM SSP_TRANSPORT_FIRST_CHECK_TYPE ORDER BY VEH_TITLE_SEQ ";                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }
                 return $data;
              }
             return $data="";
  }


  


      public function fetch_ajax_list_data_checklist($md_veh_title_seq) {
      $DB1 = $this->load->database("default",TRUE); 
    //--------------------------------------------------------------------------
          $sql = " SELECT A.*  ".
                  " FROM SSP_TRANSPORT_FIRST_CHECK_TYPE A  ".
                  " WHERE A.VEH_TITLE_SEQ = '".$md_veh_title_seq."' ".
                  " ORDER BY A.VEH_TITLE_SEQ ";                                  
          $query = $DB1->query($sql)->row();
              if ($query) {  
                 
                 return $query;
              }
             return "";
  }

      public function fetch_ajax_list_data_checkgrub($grp_type) {
      $DB1 = $this->load->database("default",TRUE); 
    //--------------------------------------------------------------------------
          $sql = " SELECT A.*  ".
                  " FROM SSP_VEH_TYPE A  ".
                  " WHERE A.VEH_TYPE_CODE = '".$grp_type."' ";                                
          $query = $DB1->query($sql)->row();
              if ($query) {  
                 
                 return $query; 
              }
             return "";
  }


    public function fetch_ajax_list_data_header($veh_title_seq) { // ตารางหลัก
      $DB1 = $this->load->database("default",TRUE); 
    //-------------------------------------
     $sql = " SELECT *   ".               
            " FROM SSP_TRANSPORT_CHECK_HEADER             ".    
            " WHERE VEH_TITLE_SEQ = '$veh_title_seq'";            
      $query = $DB1->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
            return $data;
        }
    return "";
}



    public function fetch_ajax_list_data_check($veh_title_seq) {
      $DB1 = $this->load->database("default",TRUE); 
    //-------------------------------------
     $sql = " SELECT A.*, B.VEH_TYPE_NAME   ".               
            " FROM SSP_TRANSPORT_FIRST_CHECK_TYPE A            ".    
            " LEFT OUTER JOIN SSP_VEH_TYPE B ON A.VEH_TYPE_CODE = B.VEH_TYPE_CODE   ".                                      
            " WHERE VEH_TITLE_SEQ = '$veh_title_seq'";            
            " ORDER BY A.VEH_EMP_NO  ";                            
      $query = $DB1->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
            return $data;
        }
    return "";
}





  //บันทึก
  public function fetch_ajax_add_checklist($arrayData,$keys){
          $DB1 = $this->load->database("default",TRUE); 

          $id     = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
           $md_veh_title_seq = $arrayData['md_veh_title_seq'];
           $md_veh_title_list = $arrayData['md_veh_title_list'];
              $DB1->trans_begin();

          $DB1->where("VEH_TITLE_SEQ", $md_veh_title_seq);
          $query = $DB1->get("SSP_TRANSPORT_CHECK_HEADER")->row(); // * Added ->row()

            if($query) {
              $d = "N";
            }
            else {
                $DB1->set("VEH_TITLE_SEQ", $md_veh_title_seq);
                $DB1->set("VEH_TITLE_LIST", $md_veh_title_list);
//                $DB1->set("OPR_CODE", $id); เห็นแค่ของตัวเอง
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("OPR_CODE_ADD", $id);
                $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "0");                                                                     
                $DB1->insert("SSP_TRANSPORT_CHECK_HEADER");   
            }
     

                foreach($arrayData['arr_prd'] as $key => $value){
                  //INSERT TABLE SSP_PRJ_MINIMUM_STOCK  
                    $DB1->set("VEH_TITLE_SEQ", $md_veh_title_seq);
                    $DB1->set("VEH_TITLE_LIST", $md_veh_title_list);
                    $DB1->set('VEH_GRP_CODE', $value[0]);
                    $DB1->set('VEH_TYPE_CODE', $value[1]);
                    //$DB1->set('OPR_CODE', $id); เห็นแค่ของตัวเอง
                    $DB1->set('DATE_U', "SYSDATE",false);
                    $DB1->set('OPR_CODE_ADD', $id);
                    $DB1->set('DATE_U_ADD', "SYSDATE",false);
                    $DB1->set("MODIFY_CNT",  "0");  
                    $DB1->insert('SSP_TRANSPORT_FIRST_CHECK_TYPE');     
                } 
         //complete-----------------    
                $DB1->trans_complete();
                if ($DB1->trans_status() === FALSE){
                    $DB1->trans_rollback();
                    return "";
                }
                else{
                    $DB1->trans_commit();
                    return "Y";
                }
  }



 

  //ลบ
  public function fetch_ajax_del_checklist($arrayData,$keys){
          $DB1 = $this->load->database("default",TRUE); 
           $md_veh_title_seq = $arrayData['md_veh_title_seq'];
              $DB1->trans_begin();
                  //INSERT TABLE SSP_PRJ_MINIMUM_STOCK  
                    $DB1->where("VEH_TITLE_SEQ", $md_veh_title_seq); 
                    $DB1->delete('SSP_TRANSPORT_FIRST_CHECK_TYPE'); 

                    $DB1->where("VEH_TITLE_SEQ", $md_veh_title_seq); 
                    $DB1->delete('SSP_TRANSPORT_CHECK_HEADER');     
         //complete-----------------    
                $DB1->trans_complete();
                if ($DB1->trans_status() === FALSE){
                    $DB1->trans_rollback();
                    return "";
                }
                else{
                    $DB1->trans_commit();
                    return "Y";
                }
  }




//------------------------------------------------------- ตั้งค่ารายการเช็คลิสต์ย่อย -----------------------------------------------//
  public function fetch_set_checklist_items ($veh_title_seq){ 
  $DB1 = $this->load->database("default",TRUE);
  $veh_title_seq        = ($veh_title_seq == "" ? "0=0" : " A.VEH_TITLE_SEQ= '".$veh_title_seq."' ");
    // -------------------------------------
    $ID = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
     $sql = " SELECT DISTINCT A.*, B.VEH_TITLE_LIST ".  
            " FROM SSP_TRANSPORT_FIRST_CHECK A            ".    

            " LEFT OUTER JOIN SSP_TRANSPORT_FIRST_CHECK_TYPE B ON A.VEH_TITLE_SEQ = B.VEH_TITLE_SEQ   ".                     
            " WHERE ".$veh_title_seq. 

            " ORDER BY A.VEH_TITLE_SEQ  ";                            
      $query = $DB1->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
            return $data;
        }
    return "";
}


    public function fetch_checklist_items () {
      $DB1 = $this->load->database("default",TRUE);        
    //--------------------------------------------------------------------------
          $sql = " SELECT * FROM SSP_TRANSPORT_FIRST_CHECK ORDER BY VEH_TITLE_SEQ ";                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }
                 return $data;
              }
             return $data="";
  }


   //เพิ่มหมวดงาน
  public function fetch_ajax_add_checklist_items($id,$md_veh_title_seq,$arrayData) {
        $DB1   = $this->load->database("default",TRUE); 
        $keys=array_keys($arrayData);
        $DB1->trans_start();
                    $seq =1 ;
                             
                                     for($i = 2; $i < count($arrayData); $i++) {
                        $j = 0; 
                              foreach ($arrayData[$keys[$i]] as $key => $value) {
                                  switch ($j) { 
                                      case 0 : $md_veh_list_seq    = $value; break; 
                                      case 1 : $md_veh_list       = $value;  break; 
                                   }
                                   $j++;
                              } 
                                    // SSP_PRJ_AREA_TYPE_SUBROOM     -add 
                                    $DB1->set("VEH_TITLE_SEQ", $md_veh_title_seq); 
                                    $DB1->set("VEH_LIST_SEQ", $md_veh_list_seq);
                                    $DB1->set("VEH_LIST", $md_veh_list);
                                    $DB1->set("OPR_CODE", $id);
                                    $DB1->set("DATE_U", "SYSDATE", FALSE); 
                                    $DB1->set("OPR_CODE_ADD", $id);
                                    $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                                    $DB1->set("MODIFY_CNT",  "0");                                                                     
                                    $DB1->insert("SSP_TRANSPORT_FIRST_CHECK");
                                   $seq++;
                      }


         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }
  
//----------------------------------------------- แก้ไขเช็คลิสต์----------------------------------//
   public function fetch_ajax_edit_checklist_items($id,$md_veh_title_seq,$arrayData){
        $DB1   = $this->load->database("default",TRUE); 
        $keys=array_keys($arrayData);
        $DB1->trans_start();

                                    $DB1->where("VEH_TITLE_SEQ", $md_veh_title_seq);                                                                   
                                    $DB1->delete("SSP_TRANSPORT_FIRST_CHECK");
                    $seq =1 ;
                                     for($i = 2; $i < count($arrayData); $i++) {
                        $j = 0; 
                              foreach ($arrayData[$keys[$i]] as $key => $value) {
                                  switch ($j) { 
                                      case 0 : $md_veh_list_seq    = $value; break; 
                                      case 1 : $md_veh_list    = $value;  break; 
                                   }
                                   $j++;
                              } 
                                    $DB1->set("VEH_TITLE_SEQ", $md_veh_title_seq); 
                                    $DB1->set("VEH_LIST_SEQ", $md_veh_list_seq);
                                    $DB1->set("VEH_LIST", $md_veh_list);
                                    $DB1->set("OPR_CODE", $id);
                                    $DB1->set("DATE_U", "SYSDATE", FALSE); 
                                    $DB1->set("OPR_CODE_ADD", $id);
                                    $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                                    $DB1->set("MODIFY_CNT",  "0");                                                                     
                                    $DB1->insert("SSP_TRANSPORT_FIRST_CHECK");
                                   $seq++;
                      }
         // //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }



  //ลบหมวดงาน
  public function fetch_ajax_del_checklist_items($md_veh_title_seq){ //กำหนดชื่อตัวแปรทีต้องการจะลบ
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();        
                //INSERT SSP_VEH_TYPE
                $DB1->where("VEH_TITLE_SEQ", $md_veh_title_seq);                                                   
                $DB1->delete("SSP_TRANSPORT_FIRST_CHECK");
            
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }




  // ตารางรอง
    public function fetch_ajax_list_data_checklist_items($md_veh_title_seq) {
      $DB1 = $this->load->database("default",TRUE); 
          $sql = " SELECT A.* ".
                  " FROM SSP_TRANSPORT_FIRST_CHECK A  ". 
                  " WHERE VEH_TITLE_SEQ = '$md_veh_title_seq'";
                                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }


                 return $data;
              }
             return $data="";
  }


    //------------------ตารางหัวข้อเช็คลิส --------------------------------------------------------

        public function fetch_checklist_header () {
      $DB1 = $this->load->database("default",TRUE);           
          $sql = " SELECT * FROM SSP_TRANSPORT_CHECK_HEADER  ORDER BY VEH_TITLE_SEQ ";                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }

         // echo "<pre>";
         //  print_r($data); exit(); // สำหรับส่งข้อมูลมา  โชว์ช้อมูล
         //  echo "</pre>";

                 return $data;
              }
             return $data="";
  }




//------------------------------------------------------- ตั้งค่ารายการตรวจเช็ครถประจำวัน -----------------------------------------------//
  public function fetch_set_checklist_daily ($veh_title_seq){ 
  $DB1 = $this->load->database("default",TRUE);
  $veh_title_seq        = ($veh_title_seq == "" ? "0=0" : " A.VEH_TITLE_SEQ= '".$veh_title_seq."' ");
    // -------------------------------------
    $ID = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
     $sql = " SELECT A.*,B.VEH_LIST_SEQ ,B.VEH_LIST ".  
            " FROM SSP_TRANSPORT_SET_DAILY_HEADER A            ".    
            " LEFT OUTER JOIN SSP_TRANSPORT_SET_DAILY_LIST B ON A.VEH_TITLE_SEQ = B.VEH_TITLE_SEQ   ". 
            " WHERE ".$veh_title_seq. 

            " ORDER BY A.VEH_TITLE_SEQ  ";                            
      $query = $DB1->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
            return $data;
        }
    return "";
}


    public function fetch_checklist_daily () {
      $DB1 = $this->load->database("default",TRUE);        
    //--------------------------------------------------------------------------
          $sql = " SELECT * FROM SSP_TRANSPORT_SET_DAILY_HEADER ORDER BY VEH_TITLE_SEQ ";                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }
                 return $data;
              }
             return $data="";
  }


   //เพิ่มหมวดงาน
  public function fetch_ajax_add_checklist_daily($id,$md_veh_title_seq,$md_veh_title_list,$arrayData){
        $DB1   = $this->load->database("default",TRUE); 
        $keys=array_keys($arrayData);
        $DB1->trans_start();
                $DB1->set("VEH_TITLE_SEQ", $md_veh_title_seq);
    
                                    $DB1->set("VEH_TITLE_SEQ", $md_veh_title_seq); 
                                    $DB1->set("VEH_TITLE_LIST", $md_veh_title_list);             
                                    $DB1->set("OPR_CODE", $id);
                                    $DB1->set("DATE_U", "SYSDATE", FALSE); 
                                    $DB1->set("OPR_CODE_ADD", $id);
                                    $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                                    $DB1->set("MODIFY_CNT",  "0");                                                                     
                                    $DB1->insert("SSP_TRANSPORT_SET_DAILY_HEADER");
                                      //--------------- Save ตารางรอง ------------------//
                    $seq =1 ;
                             
                                     for($i = 3; $i < count($arrayData); $i++) {
                        $j = 0; 
                              foreach ($arrayData[$keys[$i]] as $key => $value) {
                                  switch ($j) { 
                                      case 0 : $md_veh_list_seq    = $value; break; 
                                      case 1 : $md_veh_list       = $value;  break; 
                                   }
                                   $j++;
                              } 
                                    // SSP_PRJ_AREA_TYPE_SUBROOM     -add 
                                    $DB1->set("VEH_TITLE_SEQ", $md_veh_title_seq); 
                                    $DB1->set("VEH_LIST_SEQ", $md_veh_list_seq);
                                    $DB1->set("VEH_LIST", $md_veh_list);
                                    $DB1->set("OPR_CODE", $id);
                                    $DB1->set("DATE_U", "SYSDATE", FALSE); 
                                    $DB1->set("OPR_CODE_ADD", $id);
                                    $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                                    $DB1->set("MODIFY_CNT",  "0");                                                                     
                                    $DB1->insert("SSP_TRANSPORT_SET_DAILY_LIST");
                                   $seq++;
                      }


         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }


  
  public function fetch_ajax_edit_checklist_daily($id,$md_veh_title_seq,$md_veh_title_list,$arrayData){
        $DB1   = $this->load->database("default",TRUE); 
        $keys=array_keys($arrayData);
        $DB1->trans_start();
                $DB1->set("VEH_TITLE_SEQ", $md_veh_title_seq);
    
                                    $DB1->where("VEH_TITLE_SEQ", $md_veh_title_seq); 
                                    $DB1->set("VEH_TITLE_LIST", $md_veh_title_list);             
                                    $DB1->set("OPR_CODE", $id);
                                    $DB1->set("DATE_U", "SYSDATE", FALSE); 
                                    $DB1->set("OPR_CODE_ADD", $id);
                                    $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                                    $DB1->set("MODIFY_CNT",  "0");                                                                     
                                    $DB1->update("SSP_TRANSPORT_SET_DAILY_HEADER");
                                      //--------------- Save ตารางรอง ------------------//
                                      $DB1->where("VEH_TITLE_SEQ", $md_veh_title_seq);                                                                   
                                    $DB1->delete("SSP_TRANSPORT_SET_DAILY_LIST");
                    $seq =1 ;
                             
                                     for($i = 3; $i < count($arrayData); $i++) {
                        $j = 0; 
                              foreach ($arrayData[$keys[$i]] as $key => $value) {
                                  switch ($j) { 
                                      case 0 : $md_veh_list_seq    = $value; break; 
                                      case 1 : $md_veh_list       = $value;  break; 
                                   }
                                   $j++;
                              } 
                                    // SSP_PRJ_AREA_TYPE_SUBROOM     -add 
                                    $DB1->set("VEH_TITLE_SEQ", $md_veh_title_seq); 
                                    $DB1->set("VEH_LIST_SEQ", $md_veh_list_seq);
                                    $DB1->set("VEH_LIST", $md_veh_list);
                                    $DB1->set("OPR_CODE", $id);
                                    $DB1->set("DATE_U", "SYSDATE", FALSE); 
                                    $DB1->set("OPR_CODE_ADD", $id);
                                    $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                                    $DB1->set("MODIFY_CNT",  "0");                                                                     
                                    $DB1->insert("SSP_TRANSPORT_SET_DAILY_LIST");
                                   $seq++;
                      }


         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }





  //ลบหมวดงาน
  public function fetch_ajax_del_checklist_daily($md_veh_title_seq){ //กำหนดชื่อตัวแปรทีต้องการจะลบ
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();        
                //INSERT SSP_VEH_TYPE
                $DB1->where("VEH_TITLE_SEQ", $md_veh_title_seq);                                                  
                $DB1->delete("SSP_TRANSPORT_SET_DAILY_HEADER");

                $DB1->where("VEH_TITLE_SEQ", $md_veh_title_seq);                                                  
                $DB1->delete("SSP_TRANSPORT_SET_DAILY_LIST");
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          }
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }



  // save ตารางหลัก
    public function fetch_ajax_list_data_checklist_daily($md_veh_title_seq) {
      $DB1 = $this->load->database("default",TRUE); 
    //--------------------------------------------------------------------------
          $sql = " SELECT A.* ".
                  " FROM  SSP_TRANSPORT_SET_DAILY_HEADER  A". 
                  " WHERE VEH_TITLE_SEQ = '$md_veh_title_seq'";
                                                  
          $query = $DB1->query($sql)->row();
              if ($query) {  
                 
                 return $query;
              }
             return "";
  }  

  

  // ตารางรอง
    public function fetch_ajax_list_data_list_daily($md_veh_title_seq) {
      $DB1 = $this->load->database("default",TRUE); 
          $sql = " SELECT A.* ".
                  " FROM SSP_TRANSPORT_SET_DAILY_LIST A  ". 
                  " WHERE VEH_TITLE_SEQ = '$md_veh_title_seq'";
                                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }


                 return $data;
              }
             return $data="";
  }





  
// // // //--------------------------------------------- ตรวจสภาพรถประจำวัน ----------------------------------------------------------------//
  public function fetch_set_car_repair($veh_regis_no,$date_frm,$date_to,$veh_status){ 
  $DB1 = $this->load->database("default",TRUE);
  $veh_regis_no        = ($veh_regis_no == "" ? "0=0" : " A.VEH_REGIS_NO= '".$veh_regis_no."' ");
  $veh_status        = ($veh_status == "" ? "0=0" : " A.DOC_STATUS = '".$veh_status."' ") ;
  $date_frm     = ($date_frm == "" ? "0=0" : " A.DOC_DATE >= TO_DATE('".date('d/m/Y', strtotime($date_frm))."', 'DD/MM/YYYY') ");
  $date_to      = ($date_to == "" ? "0=0" : " A.DOC_DATE <= TO_DATE('".date('d/m/Y', strtotime($date_to))."', 'DD/MM/YYYY') ");

    // -------------------------------------
 $ID = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
     $sql = " SELECT  A.*, B.VEH_TYPE_NAME , C.VEH_BRAND_NAME ,D.VEH_BROKEN_LIST, ". 

         
              " CASE WHEN A.DOC_STATUS = 'I' THEN '5' ".
              " WHEN A.DOC_STATUS = 'N' THEN '4' ".
              " WHEN A.CNF_FLG = '' THEN '3' ".
              " WHEN A.CNF_FLG = 'A' THEN '2' ".
              " ELSE '1' ".
              " END AS DOC_STATUS_FLG, ".

             " CASE WHEN A.DOC_STATUS = 'I' THEN 'ยกเลิก' ".
             " WHEN A.DOC_STATUS = 'N' THEN 'เช็ครถไม่ได้' ".
             " ELSE 'รอตรวจสอบ' ".
             " END AS DOC_STATUS_DESC, ".

             " CASE  WHEN A.CNF_FLG = 'Y' THEN 'ผ่านตรวจสอบ' ".
             " WHEN A.CNF_FLG = 'N' THEN 'ไม่ผ่านตรวจสอบ' ".
             " ELSE '' ".
             " END AS CNF_FLG_DESC    ".

            " FROM SSP_TRANSPORT_DAILY_LIST_HED A            ".         //เก็บข้อมูลส่วนหัว
            " LEFT OUTER JOIN SSP_VEH_TYPE B ON A.VEH_TYPE_CAR = B.VEH_TYPE_CODE   ".
            " LEFT OUTER JOIN SSP_VEH_BRAND C ON A.VEH_BRAND = C.VEH_BRAND_CODE   ".
            " LEFT OUTER JOIN SSP_TRANSPORT_BROKEN D ON A.VEH_CAR_NOTE = D.VEH_BROKEN_NO   ".
            " WHERE ".$veh_regis_no. // รหัส
            " AND ".$date_frm.
            " AND ".$date_to. 
            " AND ".$veh_status. 
            " ORDER BY A.VEH_TYPE_CAR,VEH_BRAND,DOC_NO  ";                            

      $query = $DB1->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
            return $data;
        }
    return "";
}






    public function fetch_car_repair () {
      $DB1 = $this->load->database("default",TRUE);        
    //--------------------------------------------------------------------------
          $sql = " SELECT * FROM SSP_TRANSPORT_DAILY_CHECKLIST ORDER BY DOC_NO ";      // เก็บรายการเช็คลิสต์ย่อย                            
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }
                 return $data;
              }
             return $data="";
  }

 
  public function fetch_ajax_add_car_repair($id,$doc_no,$md_veh_km,$md_veh_time,$md_veh_regis_no,$md_veh_type_code,$md_veh_brand_code,$arrayData,$keys){
        $DB1   = $this->load->database("default",TRUE); 
        $keys=array_keys($arrayData);
        $DB1->trans_start();              

                 // --------------------------- save หัวตาราง ---------------------//
                $DB1->set("DOC_NO", $doc_no);
                $DB1->set("DOC_DATE", "to_date('".date("d/m/Y")."','dd/mm/yyyy')", false);
                $DB1->set("DOC_STATUS",  "A");
                $DB1->set("VEH_CAR_NOTE",  "00");
                $DB1->set("VEH_NOTE",  "รถปกติ"); 
                $DB1->set("VEH_KM", $md_veh_km);
                $DB1->set("VEH_TIME", $md_veh_time);
                $DB1->set("VEH_REGIS_NO", $md_veh_regis_no);
                $DB1->set("VEH_TYPE_CAR", $md_veh_type_code);
                $DB1->set("VEH_BRAND", $md_veh_brand_code);
                $DB1->set("OPR_CODE", $id);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("OPR_CODE_ADD", $id);
                $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "0");                                                                     
                $DB1->insert("SSP_TRANSPORT_DAILY_LIST_HED");
                //----------------------- save เช็คลิสต์------------------//
               foreach($arrayData['arr_prd'] as $key => $value){ 
                    foreach($value as $desc){ 
                      $DB1->set("DOC_NO", $doc_no);
                      $DB1->set("DOC_DATE", "to_date('".date("d/m/Y")."','dd/mm/yyyy')", false);
                      $DB1->set("DOC_STATUS",  "A"); 
                      $DB1->set("VEH_KM", $md_veh_km);
                      $DB1->set("VEH_TIME", $md_veh_time);
                      $DB1->set("VEH_REGIS_NO", $md_veh_regis_no);
                      $DB1->set("VEH_TYPE_CAR", $md_veh_type_code);
                      $DB1->set("VEH_BRAND", $md_veh_brand_code);
                      $DB1->set('VEH_TITLE_SEQ',$desc[0]); // หัวข้อหลัก
                      $DB1->set('VEH_LIST_SEQ',$desc[1]);  // หัวข้อย่อย
                      $DB1->set('VEH_LIST',$desc[2]); // รายการเช็คลิสต์เช็คลิสต์
                      $DB1->set('VEH_CHK_RESULT',$desc[3]); // หมายเหตุ
                      $DB1->set('VEH_NOTE',$desc[4]); // หมายเหตุ
                      $DB1->set('OPR_CODE', $id); //เห็นแค่ของตัวเอง
                      $DB1->set('DATE_U', "SYSDATE",false);
                      $DB1->set('OPR_CODE_ADD', $id);
                      $DB1->set('DATE_U_ADD', "SYSDATE",false);
                      $DB1->set("MODIFY_CNT",  "0");  
                      $DB1->insert('SSP_TRANSPORT_DAILY_CHECKLIST');                        
                    }
              }    
         //complete-----------------    
                $DB1->trans_complete();
                if ($DB1->trans_status() === FALSE){
                    $DB1->trans_rollback();
                    return "";
                }
                else{
                    $DB1->trans_commit();
                    return "Y";
                }
  }

//------------------------------------------------------ แก้ไช --------------------------------------------------------------------//

    public function fetch_ajax_edit_car_repair($id,$doc_no,$md_veh_km,$md_veh_regis_no,$md_veh_type_code,$md_veh_brand_code,$arrayData,$keys){
        $DB1   = $this->load->database("default",TRUE); 
        $keys=array_keys($arrayData);
        $DB1->trans_start();              
                                    $DB1->where("DOC_NO", $doc_no);                                                                  
                                    $DB1->delete("SSP_TRANSPORT_DAILY_LIST_HED");
                                    $DB1->where("DOC_NO", $doc_no);   
                                    $DB1->delete("SSP_TRANSPORT_DAILY_CHECKLIST");
                 // --------------------------- save หัวตาราง ---------------------//
                $DB1->set("DOC_NO", $doc_no);
                $DB1->set("DOC_DATE", "to_date('".date("d/m/Y")."','dd/mm/yyyy')", false);
                $DB1->set("DOC_STATUS",  "A");
                $DB1->set("VEH_CAR_NOTE",  "00");
                $DB1->set("VEH_NOTE",  "รถปกติ"); 
                $DB1->set("VEH_KM", $md_veh_km);
                $DB1->set("VEH_TIME", $md_veh_time);
                $DB1->set("VEH_REGIS_NO", $md_veh_regis_no);
                $DB1->set("VEH_TYPE_CAR", $md_veh_type_code);
                $DB1->set("VEH_BRAND", $md_veh_brand_code);
                $DB1->set("OPR_CODE", $id);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("OPR_CODE_ADD", $id);
                $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "0");                                                                     
                $DB1->insert("SSP_TRANSPORT_DAILY_LIST_HED");
                //----------------------- save เช็คลิสต์------------------//
               foreach($arrayData['arr_prd'] as $key => $value){ 
                    foreach($value as $desc){ 
                      $DB1->set("DOC_NO", $doc_no);
                      $DB1->set("DOC_DATE", "to_date('".date("d/m/Y")."','dd/mm/yyyy')", false);
                      $DB1->set("DOC_STATUS",  "A"); 
                      $DB1->set("VEH_KM", $md_veh_km);
                      $DB1->set("VEH_TIME", $md_veh_time);
                      $DB1->set("VEH_REGIS_NO", $md_veh_regis_no);
                      $DB1->set("VEH_TYPE_CAR", $md_veh_type_code);
                      $DB1->set("VEH_BRAND", $md_veh_brand_code);
                      $DB1->set('VEH_TITLE_SEQ',$desc[0]); // หัวข้อหลัก
                      $DB1->set('VEH_LIST_SEQ',$desc[1]);  // ลำดับหัวข้อย่อย
                      $DB1->set('VEH_CHK_RESULT',$desc[2]); // ลำดับค่าเช็คลิสต์
                      $DB1->set('VEH_NOTE',$desc[3]); // หมายเหตุ
                      $DB1->set('OPR_CODE', $id); //เห็นแค่ของตัวเอง
                      $DB1->set('DATE_U', "SYSDATE",false);
                      $DB1->set('OPR_CODE_ADD', $id);
                      $DB1->set('DATE_U_ADD', "SYSDATE",false);
                      $DB1->set("MODIFY_CNT",  "0");  
                      $DB1->insert('SSP_TRANSPORT_DAILY_CHECKLIST');                        
                    }
              }    
         // //complete-----------------      
                $DB1->trans_complete();
                if ($DB1->trans_status() === FALSE){
                    $DB1->trans_rollback();
                    return "";
                }
                else{
                    $DB1->trans_commit();
                    return "Y";
                }
  }
//--------------------------------------------------------------------------------------------------------------------------------//

//ลบ

  public function fetch_ajax_del_car_repair($doc_no,$arrayData,$keys){
          $DB1 = $this->load->database("default",TRUE); 
           $doc_no = $arrayData['doc_no'];
              $DB1->trans_begin();
                    $DB1->where("DOC_NO", $doc_no); 
                    $DB1->set("DOC_STATUS",  "I"); 
                    $DB1->update('SSP_TRANSPORT_DAILY_LIST_HED'); 

                    $DB1->where("DOC_NO", $doc_no); 
                    $DB1->set("DOC_STATUS",  "I"); 
                    $DB1->update('SSP_TRANSPORT_DAILY_CHECKLIST');     
         //complete-----------------    
                $DB1->trans_complete();
                if ($DB1->trans_status() === FALSE){
                    $DB1->trans_rollback();
                    return "";
                }
                else{
                    $DB1->trans_commit();
                    return "Y";
                }
  }


 public function fetch_ajax_add_car_spoi($id,$doc_no,$md_veh_time_c,$md_veh_spoil_c,$md_veh_regis_no_c,$md_veh_type_code_c,$md_veh_brand_code_c,$md_veh_spoil_name){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();              

                 // --------------------------- save หัวตาราง ---------------------//
                $DB1->set("DOC_NO", $doc_no);
                $DB1->set("DOC_DATE", "to_date('".date("d/m/Y")."','dd/mm/yyyy')", false);
                $DB1->set("DOC_STATUS",  "N"); 
                $DB1->set("VEH_CAR_NOTE", $md_veh_spoil_c);
                $DB1->set("VEH_NOTE", $md_veh_spoil_name);
                $DB1->set("VEH_TIME", $md_veh_time_c);
                $DB1->set("VEH_REGIS_NO", $md_veh_regis_no_c);
                $DB1->set("VEH_TYPE_CAR", $md_veh_type_code_c);
                $DB1->set("VEH_BRAND", $md_veh_brand_code_c);
                $DB1->set("OPR_CODE", $id);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("OPR_CODE_ADD", $id);
                $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "0");                                                                     
                $DB1->insert("SSP_TRANSPORT_DAILY_LIST_HED");   
         //complete-----------------    
                $DB1->trans_complete();
                if ($DB1->trans_status() === FALSE){
                    $DB1->trans_rollback();
                    return "";
                }
                else{
                    $DB1->trans_commit();
                    return "Y";
                }
  }


 
  //ลบหมวดงาน
  public function fetch_ajax_del_car_spoi($doc_no){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();
          //เช็ครหัสหมวดงาน ว่ามีแล้ว
        
                //INSERT SSP_VEH_TYPE
                $DB1->where("DOC_NO", $doc_no);       
                $DB1->set("DOC_STATUS",  "I");                                          
                $DB1->update("SSP_TRANSPORT_DAILY_LIST_HED");
            
         //complete-----------------    
          $DB1->trans_complete();
          if ($DB1->trans_status() === FALSE){
              $DB1->trans_rollback();
              return "";
          } 
          else{
              $DB1->trans_commit();
              return "Y";
          }
  }



  // save ตารางหลัก
    public function fetch_ajax_list_data_checklist_daily_broken($doc_no) {
      $DB1 = $this->load->database("default",TRUE); 
    //--------------------------------------------------------------------------
          $sql = " SELECT A.* ".
                  " FROM  SSP_TRANSPORT_DAILY_LIST_HED  A". 
                  " WHERE DOC_NO = '$doc_no'";
                                                  
          $query = $DB1->query($sql)->row();
              if ($query) {  
                 
                 return $query;
              }
             return "";
  } 



    public function fetch_ajax_list_data_checkcar_header($doc_no) { // ตารางหลัก
      $DB1 = $this->load->database("default",TRUE); 
    //-------------------------------------
     $sql = " SELECT *   ".               
            " FROM SSP_VEH_REGIS             ".    
            " WHERE VEH_REGIS_NO = '$doc_no'"; 
            //" ORDER BY VEH_REGIS_NO";             
      $query = $DB1->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
            return $data;
        }
    return "";
}





    public function fetch_ajax_list_data_checkcar($doc_no) { // ดึงรายการเช็คลิส
      $DB1 = $this->load->database("default",TRUE); 
    //-------------------------------------
     $sql = " SELECT  A.*, B.VEH_TITLE_LIST  ".               
            " FROM SSP_TRANSPORT_SET_DAILY_LIST A            ".    
            " LEFT OUTER JOIN SSP_TRANSPORT_SET_DAILY_HEADER B ON A.VEH_TITLE_SEQ = B.VEH_TITLE_SEQ   ".                                               
            " ORDER BY A.VEH_TITLE_SEQ,VEH_LIST_SEQ "; 

      $query = $DB1->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
            return $data;
        }
    return "";
}






    public function fetch_ajax_list_data_daily_checklist_hed($doc_no) { 
      $DB1 = $this->load->database("default",TRUE); 
    //-------------------------------------
     $sql = " SELECT *   ".               
            " FROM SSP_TRANSPORT_DAILY_LIST_HED             ".    
             " WHERE DOC_NO = '$doc_no'";    
       
      $query = $DB1->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
            return $data;
        }
    return "";
}



    public function fetch_ajax_list_data_daily_checklist_body($doc_no) {
      $DB1 = $this->load->database("default",TRUE); 
    //-------------------------------------
     $sql = " SELECT A.*, B.VEH_TITLE_LIST , C.VEH_LIST AS VEH_LIST_BODY  ".               
            "  FROM SSP_TRANSPORT_DAILY_CHECKLIST  A             ".  
            " LEFT OUTER JOIN SSP_TRANSPORT_SET_DAILY_HEADER B ON A.VEH_TITLE_SEQ = B.VEH_TITLE_SEQ  ".                                        
            " LEFT OUTER JOIN SSP_TRANSPORT_SET_DAILY_LIST   C ON A.VEH_TITLE_SEQ = C.VEH_TITLE_SEQ  AND A.VEH_LIST_SEQ  = C.VEH_LIST_SEQ   ". 
            " WHERE A.DOC_NO = '".$doc_no."'".    
            " ORDER BY A.VEH_TITLE_SEQ,A.VEH_LIST_SEQ   ";       

      $query = $DB1->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
            return $data;
        }
    return "";
}






  // save ตารางหลัก
    public function fetch_ajax_list_data_checklist_daily_broken_admin($doc_no) {
      $DB1 = $this->load->database("default",TRUE); 
    //--------------------------------------------------------------------------
          $sql = " SELECT A.* ".
                  " FROM  SSP_TRANSPORT_DAILY_LIST_HED  A". 
                  " WHERE DOC_NO = '$doc_no'";
                                                  
          $query = $DB1->query($sql)->row();
              if ($query) {  
                 
                 return $query;
              }
             return "";
  }  










// // // //--------------------------------------------- ตรวจสภาพรถประจำวัน ----------------------------------------------------------------//
  public function fetch_set_daily_checklist($veh_regis_no,$date_frm,$date_to,$veh_status,$veh_opr_name){ 
  $DB1 = $this->load->database("default",TRUE);
  $veh_regis_no        = ($veh_regis_no == "" ? "0=0" : " A.VEH_REGIS_NO= '".$veh_regis_no."' ");
  $veh_opr_name        = ($veh_opr_name == "" ? "0=0" : " A.OPR_CODE= '".$veh_opr_name."' ");
  $veh_status        = ($veh_status == "" ? "0=0" : " A.CNF_FLG = '".$veh_status."' ") ;
  $date_frm     = ($date_frm == "" ? "0=0" : " A.DOC_DATE >= TO_DATE('".date('d/m/Y', strtotime($date_frm))."', 'DD/MM/YYYY') ");
  $date_to      = ($date_to == "" ? "0=0" : " A.DOC_DATE <= TO_DATE('".date('d/m/Y', strtotime($date_to))."', 'DD/MM/YYYY') ");
 // $veh_opr_name      = ($veh_opr_name == "" ? "0=0" : " upper(F.OPR_NAME_T) like upper('%".$veh_opr_name."%') "); 
    // -------------------------------------
 $ID = $this->session->userdata("emp_info_logged_in")["SESS_OPR_CODE"];
     $sql = "SELECT A.*,B.VEH_TYPE_NAME , C.VEH_BRAND_NAME ,D.VEH_BROKEN_LIST,E.OPR_NAME_T AS CNF_OPR,F.OPR_NAME_T AS OPR_NAME, G.DOC_NO AS DET_STATUS,".  

            " CASE  WHEN G.DOC_NO = ''  THEN 'ปกติ'  ".
            " WHEN G.DOC_NO IS NULL THEN 'ปกติ' ".
            " ELSE 'ผิดปกติ' ".  
            " END AS DATE_STATUS    ".       
            " FROM SSP_TRANSPORT_DAILY_LIST_HED A            ".         //เก็บข้อมูลส่วนหัว
            " LEFT OUTER JOIN (SELECT DISTINCT DOC_NO FROM SSP_TRANSPORT_DAILY_CHECKLIST G WHERE VEH_CHK_RESULT = 'N') G ON  A.DOC_NO = G.DOC_NO ".
            " LEFT OUTER JOIN SSP_VEH_TYPE B ON A.VEH_TYPE_CAR = B.VEH_TYPE_CODE   ".
            " LEFT OUTER JOIN SSP_VEH_BRAND C ON A.VEH_BRAND = C.VEH_BRAND_CODE   ".
            " LEFT OUTER JOIN SSP_TRANSPORT_BROKEN D ON A.VEH_CAR_NOTE = D.VEH_BROKEN_NO   ".
            " LEFT OUTER JOIN VTS_OPR_DAILYWORK E ON A.CNF_OPR = E.OPR_CODE    ".
            " LEFT OUTER JOIN VTS_OPR_DAILYWORK F ON A.OPR_CODE = F.OPR_CODE ".
            " WHERE NOT DOC_STATUS = 'I' ".
            " AND ".$veh_opr_name. 
            " AND ".$veh_regis_no. 
            " AND ".$date_frm.
            " AND ".$date_to. 
            " AND ".$veh_status. 

            //" AND DOC_STATUS = 'A' ".
            " ORDER BY A.VEH_TYPE_CAR,VEH_BRAND  ";                            
                                     
      $query = $DB1->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
            return $data;
        }
    return "";
}


    public function fetch_daily_checklist () {
      $DB1 = $this->load->database("default",TRUE);        
    //--------------------------------------------------------------------------
          $sql = " SELECT * FROM SSP_TRANSPORT_DAILY_CHECKLIST ORDER BY DOC_NO ";      // เก็บรายการเช็คลิสต์ย่อย                            
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }
                 return $data;
              }
             return $data="";
  }



//------------------------------------------------------ แก้ไช --------------------------------------------------------------------//

    public function fetch_ajax_edit_daily_checklist($id,$doc_no,$save,$md_veh_note){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();              

                 // --------------------------- save หัวตาราง ---------------------//
                $DB1->where("DOC_NO", $doc_no);
                $DB1->set("VEH_LIST", $md_veh_note);  
                $DB1->set("CNF_OPR", $id);
                $DB1->set("CNF_FLG",$save); 
                $DB1->set("CNF_DATE", "to_date('".date("d/m/Y")."','dd/mm/yyyy')", false);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "0");                                                                     
                $DB1->update("SSP_TRANSPORT_DAILY_LIST_HED");
            
         // //complete-----------------      
                $DB1->trans_complete();
                if ($DB1->trans_status() === FALSE){
                    $DB1->trans_rollback();
                    return "";
                }
                else{
                    $DB1->trans_commit();
                    return "Y";
                }
  }
//--------------------------------------------------------------------------------------------------------------------------------//


 public function fetch_ajax_add_daily_spoi($id,$doc_no,$save_1,$md_veh_note_a){
        $DB1   = $this->load->database("default",TRUE); 
        $DB1->trans_start();              
                 // --------------------------- save หัวตาราง ---------------------//
                $DB1->where("DOC_NO", $doc_no);
                $DB1->set("CNF_FLG",$save_1);  
                $DB1->set("VEH_LIST", $md_veh_note_a);                
                $DB1->set("CNF_OPR", $id);
                $DB1->set("CNF_DATE", "to_date('".date("d/m/Y")."','dd/mm/yyyy')", false);
                $DB1->set("DATE_U", "SYSDATE", FALSE); 
                $DB1->set("DATE_U_ADD", "SYSDATE", FALSE); 
                $DB1->set("MODIFY_CNT",  "0");                                                                     
                $DB1->update("SSP_TRANSPORT_DAILY_LIST_HED");   
         //complete-----------------    
                $DB1->trans_complete();
                if ($DB1->trans_status() === FALSE){
                    $DB1->trans_rollback();
                    return "";
                }
                else{
                    $DB1->trans_commit();
                    return "Y";
                }
  }

  

    public function fetch_ajax_list_data_daily_checklist_hed_edit($doc_no) { // ดึงรายการเช็คลิส
      $DB1 = $this->load->database("default",TRUE); 
    //-------------------------------------
     $sql = " SELECT  A.* ".               
                   " FROM  SSP_TRANSPORT_DAILY_LIST_HED  A". 
                   " WHERE DOC_NO = '$doc_no'";

      $query = $DB1->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
            return $data;
        }
    return "";
}


    public function fetch_ajax_list_data_daily_checklist_edit($doc_no) {
      $DB1 = $this->load->database("default",TRUE); 
    //--------------------------------------------------------------------------
     $sql = " SELECT A.*, B.VEH_TITLE_LIST , C.VEH_LIST AS VEH_LIST_BODY  ".               
            "  FROM SSP_TRANSPORT_DAILY_CHECKLIST  A             ".  
            " LEFT OUTER JOIN SSP_TRANSPORT_SET_DAILY_HEADER B ON A.VEH_TITLE_SEQ = B.VEH_TITLE_SEQ  ".                                        
            " LEFT OUTER JOIN SSP_TRANSPORT_SET_DAILY_LIST   C ON A.VEH_TITLE_SEQ = C.VEH_TITLE_SEQ  AND A.VEH_LIST_SEQ  = C.VEH_LIST_SEQ   ". 
            " WHERE A.DOC_NO = '".$doc_no."'".    
            " ORDER BY A.VEH_TITLE_SEQ,A.VEH_LIST_SEQ   ";                                    
      $query = $DB1->query($sql);
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            $data[] = $row;
          }
            return $data;
        }
    return "";
}


    //------------------ตาราง รายชื่อพนักงาน--------------------------------------------------------

        public function fetch_vts_opr_code () {
      $DB1 = $this->load->database("default",TRUE);           
          $sql = " SELECT * FROM VTS_OPR  ORDER BY OPR_CODE ";                                  
          $query = $DB1->query($sql);
              if ($query->num_rows() > 0) {  
                        foreach ($query->result() as $row) {
                                        $data[] = $row;
                      }

                 return $data;
              }
             return $data="";
  }



} ?>
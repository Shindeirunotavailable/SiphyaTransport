<!DOCTYPE html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <?php $this->load->view("include/head_style.php") ?> 
  </head>
  <body>

    <div class="container-scroller">
      <!-- partial:../../partials/_horizontal-navbar.html -->
      <?php $this->load->view("include/_navbar.php") ?> 
      <!-- partial -->

      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
         <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> <?php echo $title; ?> </h3>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12"> 
                    <form id="search_ot" method="POST" action="<?php echo base_url();?>Mainapp/daily_checklist_admin">     
                       <!--  ประเภท -->
                          <div class="row">
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>เลือกป้ายทะเบียน</label> 
                                    <input type="hidden" id="hd_ft_veh_regis_no" value="<?php echo $ft_veh_regis_no?>">
                                    <select class="js-example-basic-single" id="ft_veh_regis_no" name="ft_veh_regis_no" style="width: 100%;">
                                      <option value="">เลือก</option>
                                        <?php
                                            if($data_regis != ""){
                                              foreach ($data_regis as $key => $value){
                                                echo "<option value='".$value->VEH_REGIS_NO."'>".$value->VEH_REGIS_NO." </option>";     
                                              }
                                            } 
                                        ?>
                                    </select>
                                  </div>
                              </div>  

                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>ชื่อผู้ตรวจเช็ค</label> 
                                    <input type="hidden" id="hd_ft_veh_opr_name" value="<?php echo $ft_veh_opr_name?>">
                                    <select class="js-example-basic-single" id="ft_veh_opr_name" name="ft_veh_opr_name" style="width: 100%;">
                                      <option value="">เลือก</option>
                                        <?php
                                            if($data_opr_daily != ""){
                                              foreach ($data_opr_daily as $key => $value){
                                                echo "<option value='".$value->EMP_NO."'>".$value->EMP_NO.":".$value->OPR_NAME_T. " </option>";     
                                              }
                                            } 
                                        ?>
                                    </select>
                                  </div>
                              </div> 

                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>สถานะเอกสาร</label> 
                                    <input type="hidden" id="hd_ft_veh_status" value="<?php echo $ft_veh_status?>">
                                    <select class="js-example-basic-single" id="ft_veh_status" name="ft_veh_status" style="width: 100%;">
                                        <option value="">เลือก</option>
                                        <option value="Y">ผ่านการตรวจสอบ</option>
                                        <option value="N">ไม่ผ่านการตรวจสอบ</option>
                                    </select>
                                  </div>
                              </div>                                
                                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                   <div class="form-group"> 
                                    <label>วันที่เริ่มตรวจสภาพ</label> 
                                    <input type="date" class="form-control" id="hd_ft_date_frm" name="ft_date_frm" value="<?php echo $ft_date_frm?>">  
                                   </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                   <div class="form-group"> 
                                    <label>วันที่สิ้นสุด</label> 
                                     <input type="date" class="form-control" id="hd_ft_date_to" name="ft_date_to" value="<?php echo $ft_date_to?>">
                                   </div>
                                </div>                                                                                                                     
                         </div>      
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                  <button type="submit" class="btn btn-info btn-sm fs-14 p-lr-9" id="searchData"><i class="fa fa-search"></i> ค้นหา</button>
                                </div>
                            </div>
                        </div>
                  </form>               
                  <hr> 
                </div>
              </div> 
               <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="table-responsive">
                      <table id="datatable-ot" class="table table-striped" style="width: 100%">
                        <thead class="table-dark">
                          <tr>
                          <th class='txt-center no-sort'></th>
                          <th>วันที่ตรวจสภาพ</th>
                          <th>ผลการตรวจสภาพ</th>
                          <th>รายละเอียด</th>
                          <th>ตรวจสอบ</th>
                          <th>สถานะเอกสาร</th>
                          <th>เลขที่ตรวจสภาพ</th>
                          
                          <th>เวลา</th>                          
                          <th>ชื่อผู้ขับขี่</th>
                          <th>ทะเบียน</th>
                          <th>เลขไมล์</th>
                          <th>ประเภทรถ</th>
                          <th>ยี่ห้อรถ</th>
                          <th>ชื่อผู้ตรวจสอบ</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            if($data_all != ""){
                              foreach ($data_all as $key => $value) {
                                echo "<tr class='".($value->DOC_STATUS == "A" && $value->CNF_FLG == "" || $value->DOC_STATUS == "N" && $value->CNF_FLG == "" ?  'table-warning' : ($value->CNF_FLG == "Y" && $value->DOC_STATUS == "A" ||$value->CNF_FLG == "Y" &&  $value->DOC_STATUS == "N" ? 'table-success' :  'table-danger'))."'>";

                                  echo "<td></td>";
                                     echo "<td>".$value->DOC_DATE."</td>";
                                  if ($value -> DOC_STATUS == "A" && $value -> CNF_FLG == "" || $value -> DOC_STATUS == "A" && $value -> CNF_FLG == "Y" 
                                    || $value -> DOC_STATUS == "A" && $value -> CNF_FLG == "N" ) {

                                    echo "<td>".$value->DATE_STATUS."</td>";
                                  }
                                  elseif ($value -> DOC_STATUS == "N" && $value -> CNF_FLG == ""|| $value -> DOC_STATUS == "N" && $value -> CNF_FLG == "Y" 
                                    || $value -> DOC_STATUS == "N" && $value -> CNF_FLG == "N" ) {
                                    echo "<td>เช็ครถไม่ได้</td>";
                                  }
                                  else{
                                     echo "<td></td>"; 
                                  }
                                  
                                  if ($value -> DOC_STATUS == "N" && $value -> CNF_FLG == "N" || $value -> DOC_STATUS == "N" && $value -> CNF_FLG == "Y"  ) {
                                      echo "<td class='txt-center'>".
                                        "<button type='button' onclick=\"modal_spoil_details('รายละเอียดผลการตรวจสภาพ','#e74a3b','G','".$value->DOC_NO."')\" class='btn btn-success btn-sm' ><i class='fa fa-list m-tb-2 m-lr-4'></i></button>".
                                      "</td>"; 
                                  }
                                  elseif ($value->DOC_STATUS == "A" && $value->CNF_FLG == "N" || $value->DOC_STATUS == "A" && $value->CNF_FLG == "Y"  ) {
                                    echo "<td class='txt-center'>".
                                      "<button type='button' onclick=\"modal_type_admin('รายละเอียดผลการตรวจสภาพ','#e74a3b','F','".$value->DOC_NO."')\" class='btn btn-success btn-sm' ><i class='fa fa-list m-tb-2 m-lr-4'></i></button>".
                                    "</td>"; 
                                  }

                                  else{
                                     echo "<td></td>"; 
                                  }
 
                                  if ($value -> DOC_STATUS == "N" && $value -> CNF_FLG == ""  ) {
                                  echo "<td class='txt-center'>".
                                    "<button type='button' onclick=\"modal_spoil('ยืนยัน','#82F7FF','A','".$value->DOC_NO."')\" class='btn btn btn-warning btn-sm' ><i class='fa fa-check'></i></button>".
                                    "</td>";
                                  }
                                  elseif ($value->DOC_STATUS == "A" && $value->CNF_FLG == ""   ) {
                                  echo "<td class='txt-center'>".
                                    "<button type='button' onclick=\"modal_type('ยืนยัน','#82F7FF','E','".$value->DOC_NO."')\" class='btn btn btn-warning btn-sm' ><i class='fa fa-check'></i></button>".
                                    "</td>";
                                  }                                  
                                  elseif ($value->DOC_STATUS == "A" && $value->CNF_FLG == "Y" || $value -> DOC_STATUS == "N" && $value -> CNF_FLG == "Y"  ) {
                                    echo "<td></td>"; 
                                  }
                                  elseif ($value->DOC_STATUS == "A" && $value->CNF_FLG == "N" || $value -> DOC_STATUS == "N" && $value -> CNF_FLG == "N"  ) {
                                    echo "<td></td>"; 
                                  }                                  
                                  else{
                                    echo "<td></td>"; 
                                  }

                                  if($value->DOC_STATUS == "A" && $value->CNF_FLG == "" || $value -> DOC_STATUS == "N" && $value -> CNF_FLG == ""  ){ 
                                    echo "<td> รอตรวจสอบ </td>";
                                  }
                                  elseif (($value -> CNF_FLG == "Y" && $value->DOC_STATUS == "A")||($value -> CNF_FLG == "Y" && $value->DOC_STATUS == "N")) {
                                    echo "<td> ผ่านการตรวจสอบ </td>";
                                  }
                                  elseif (($value->DOC_STATUS == "A" && $value -> CNF_FLG == "N" )||($value -> CNF_FLG == "N" && $value->DOC_STATUS == "N")) {
                                    echo "<td> ไม่ผ่านการตรวจสอบ </td>";
                                  }
                                  else{
                                   echo "<td></td>"; 
                                  }        

                                  echo "<td>".$value->DOC_NO."</td>";
                               
                                  echo "<td>".$value->VEH_TIME."</td>";
                                  echo "<td>".$value->OPR_NAME."</td>";                                                                            
                                  echo "<td>".$value->VEH_REGIS_NO."</td>";
                                  echo "<td>".$value->VEH_KM."</td>";
                                  echo "<td>".$value->VEH_TYPE_NAME."</td>";
                                  echo "<td>".$value->VEH_BRAND_NAME."</td>"; 
                                  echo "<td>".$value->CNF_OPR."</td>"; 
                                echo "</tr>";
                              }  
                            }
                        ?>  
                        </tbody>
                      </table> 
                    <div class="col-lg-12" align="center">
                      <table >
                        <tr>                         
                           <th><input type="text" style="background-color: #e69138;border-radius: 5px;border: none;width: 20px;" disabled=""></th>
                              <th>รอตรวจสอบ</th>
                           <th><input type="text" style="background-color: #71da41;border-radius: 5px;border: none;width: 20px;" disabled=""></th>
                              <th>ผ่านการตรวจสอบ</th>   
                           <th><input type="text" style="background-color: #fa0303;border-radius: 5px;border: none;width: 20px;" disabled=""></th>
                              <th>ไม่ผ่านการตรวจสอบ</th>                                                          
                      </tr>
                        </table>  
                    </div>                        
                  </div>                    
                  </div>
                </div>
              </div> 
            </div>
          </div>


        <!-- modal -->
        <div class="modal fade show" id="modal_spoil"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="form_admin" method="POST" enctype="multipart/form-data">
                <div class="modal-header" id="c_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(67, 202, 232);">
                  <h4 class="modal-title" id="h_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i> แบบฟอร์มตรวจสภาพรถไม่ได้ </font></b></h4>
                      <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                </div>
                    <div class="modal-body">
                      <input  type="hidden" id="hd_flg_a" name="hd_flg_a" value="">
                      <input  type="hidden" id="doc_no_a"  name="doc_no_a" value=""> 
                     
                        <div class="row">
                           <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">  
                            <div class="form-group">
                                <label>วันที่ตรวจสภาพ</label>
                                  <input type="date" class="form-control" name="md_veh_date_check_a" id="md_veh_date_check_a" >
                            </div>
                          </div>                            
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                              <div class="form-group">
                                <label>เวลาที่ตรวจสภาพ</label>
                                  <input type="time"class="form-control" id="md_veh_time_a" name="md_veh_time_a" >
                              </div>
                          </div>         
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ทะเบียน</label>
                                   <select class="js-example-basic-single" id="md_veh_regis_no_a" name="md_veh_regis_no_a" style="width: 100%;" onchange="Carspoil()">
                                    <option value="">เลือก</option>
                                      <?php
                                          if($data_regis != ""){
                                            foreach ($data_regis as $key => $value){
                                              echo "<option value='".$value->VEH_REGIS_NO."'>".$value->VEH_REGIS_NO." </option>";     
                                            }
                                          } 
                                      ?>
                                  </select>
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ประเภทรถ</label>
                                <select class="js-example-basic-single test" id="md_veh_type_code_a" name="md_veh_type_code_a"  style="width: 100%;">
                                  <option value="">เลือก</option>
                                    <?php
                                        if($data_cartype != ""){
                                          foreach ($data_cartype as $key => $value){
                                            echo "<option value='".$value->VEH_TYPE_CODE."'>".$value->VEH_TYPE_NAME."</option>";     
                                          }
                                        } 
                                    ?>
                                </select>
                            </div>
                          </div> 
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ยี่ห้อรถ</label>
                                <select class="js-example-basic-single" id="md_veh_brand_code_a"  name="md_veh_brand_code_a" style="width: 100%;">
                                  <option value="">เลือก</option>
                                    <?php
                                        if($data_car != ""){
                                          foreach ($data_car as $key => $value){
                                            echo "<option value='".$value->VEH_BRAND_CODE."'>".$value->VEH_BRAND_NAME." </option>";     
                                          }
                                        } 
                                    ?>
                                </select>
                            </div>                            
                          </div>   
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>รายการรถเสีย</label>
                                        <select class="js-example-basic-single" style="width: 100%;" id="md_veh_spoil_a"  name="md_veh_spoil_a" onchange = "START()">
                                          <option value="">เลือก</option>
                                          <option value="xxx">อื่นๆ</option> 
                                            <?php
                                                if($data_broken != ""){
                                                  foreach ($data_broken as $key => $value){
                                                    echo "<option value='".$value->VEH_BROKEN_NO."'>".$value->VEH_BROKEN_LIST."</option>";     
                                                  }
                                                } 
                                            ?>
                                        </select>
                                    <div id="dvPassport"><br>
                                     <label>รายการรถเสีย</label>
                                    <input type="text" class="form-control" id="md_veh_spoil_name_a" name="md_veh_spoil_name_a" /> 
                                    </div>                                        
                                </div>
                            </div> 
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                            <label>หมายเหตุที่ไม่ผ่าน</label>
                              <input type="text" class="form-control" id="md_veh_note_a" name="md_veh_note_a">
                          </div>
                        </div> 
                      </div>    
                    </div>
                   <div class="modal-footer">
                      <input type="hidden" id="save_1" name="save_1" value="">
                      <button type="button" class="btn btn-success save_1"  value="Y" ><em class="fa fa-check-circle-o" style='font-size:18px'></em> ตรวจสอบ </button>
                      <button type="button" class="btn btn-danger save_1" value="N" >
                        <em class=" fa  fa-times-circle-o" style='font-size:18px'></em> ไม่ผ่านตรวจสอบ </button>  
                    </div>
              </form>
            </div>
          </div>
        </div>   
          <!-- partial -->   
<!--  รายละเอียดตรวจเช็ครถไม่ได้ -->
        <div class="modal fade show" id="modal_spoil_details"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="form_approve" method="POST" enctype="multipart/form-data">
                <div class="modal-header" id="c_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(67, 202, 232);">
                  <h4 class="modal-title" id="h_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i> แบบฟอร์มตรวจสภาพรถไม่ได้ </font></b></h4>
                      <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                </div>
                    <div class="modal-body">
                      <input  type="hidden" id="hd_flg_g" name="hd_flg_g" value="">
                      <input  type="hidden" id="doc_no_g"  name="doc_no_g" value=""> 
                     
                        <div class="row">
                           <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">  
                            <div class="form-group">
                                <label>วันที่ตรวจสภาพ</label>
                                  <input type="date" class="form-control" name="md_veh_date_check_g" id="md_veh_date_check_g" value="">
                            </div>
                          </div>                            
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                              <div class="form-group">
                                <label>เวลาที่ตรวจสภาพ</label>
                                  <input type="time"class="form-control" id="md_veh_time_g" name="md_veh_time_g" value="" >
                              </div>
                          </div>         
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ทะเบียน</label>
                                   <select class="js-example-basic-single" id="md_veh_regis_no_g" name="md_veh_regis_no_g" style="width: 100%;">
                                    <option value="">เลือก</option>
                                      <?php
                                          if($data_regis != ""){
                                            foreach ($data_regis as $key => $value){
                                              echo "<option value='".$value->VEH_REGIS_NO."'>".$value->VEH_REGIS_NO." </option>";     
                                            }
                                          } 
                                      ?>
                                  </select>
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ประเภทรถ</label>
                                <select class="js-example-basic-single test" id="md_veh_type_code_g" name="md_veh_type_code_g"  style="width: 100%;">
                                  <option value="">เลือก</option>
                                    <?php
                                        if($data_cartype != ""){
                                          foreach ($data_cartype as $key => $value){
                                            echo "<option value='".$value->VEH_TYPE_CODE."'>".$value->VEH_TYPE_NAME."</option>";     
                                          }
                                        } 
                                    ?>
                                </select>
                            </div>
                          </div> 
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ยี่ห้อรถ</label>
                                <select class="js-example-basic-single" id="md_veh_brand_code_g"  name="md_veh_brand_code_g" style="width: 100%;">
                                  <option value="">เลือก</option>
                                    <?php
                                        if($data_car != ""){
                                          foreach ($data_car as $key => $value){
                                            echo "<option value='".$value->VEH_BRAND_CODE."'>".$value->VEH_BRAND_NAME." </option>";     
                                          }
                                        } 
                                    ?>
                                </select>
                            </div>                            
                          </div>   
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>รายการรถเสีย</label>
                                        <select class="js-example-basic-single" style="width: 100%;" id="md_veh_spoil_g"  name="md_veh_spoil_g" onchange = "STOP()" >
                                          <option value="">เลือก</option>
                                          <option value="xxx">อื่นๆ</option> 
                                            <?php
                                                if($data_broken != ""){
                                                  foreach ($data_broken as $key => $value){
                                                    echo "<option value='".$value->VEH_BROKEN_NO."'>".$value->VEH_BROKEN_LIST."</option>";     
                                                  }
                                                } 
                                            ?>
                                        </select>
                                    <div id="dvPassport"><br>
                                     <label>รายการรถเสีย</label>
                                    <input type="text" class="form-control" id="md_veh_spoil_name_g" name="md_veh_spoil_name_g" /> 
                                    </div>                                        
                                </div>
                            </div>                             
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                              <div class="form-group">
                                <label>หมายเหตุที่ไม่ผ่าน</label>
                                  <input type="text" class="form-control" id="md_veh_note_g" name="md_veh_note_g">
                              </div>
                            </div> 
                        </div>    
                    </div>
                      <div class="modal-footer">
                        
                      </div> 
              </form>
            </div>
          </div>
        </div> 
<!-- ตรวจสอบเช็คลิสต์ -->
        <div class="modal fade show" id="modal_add"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="form_add" method="POST" enctype="multipart/form-data">
                <div class="modal-header" id="c_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(67, 202, 232);">
                  <h4 class="modal-title" id="h_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i> แบบฟอร์มตรวจสภาพรถประจำวัน </font></b></h4>
                      <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                </div>
                    <div class="modal-body">
                      <input  type="hidden" id="hd_flg" name="hd_flg" value="">
                      <input  type="hidden" id="doc_no"  name="doc_no" value=""> 
                      
                        <div class="row">
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                              <div class="form-group">
                                <label>เลขไมล์</label>
                                  <input type="text"class="form-control" id="md_veh_km" name="md_veh_km" >
                              </div>
                          </div>
                           <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">  
                            <div class="form-group">
                                <label>วันที่ตรวจสภาพ</label>
                                  <input type="date" class="form-control" name="md_veh_date_check" id="md_veh_date_check" >
                            </div>
                          </div>                            
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                              <div class="form-group">
                                <label>เวลาที่ตรวจสภาพ</label>
                                  <input type="time"class="form-control" id="md_veh_time" name="md_veh_time" >
                              </div>
                          </div>         
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ทะเบียน</label>
                                  <select class="js-example-basic-single" id="md_veh_regis_no" name="md_veh_regis_no" style="width: 100%;">
                                    <option value="">เลือก</option>
                                      <?php
                                          if($data_regis != ""){
                                            foreach ($data_regis as $key => $value){
                                              echo "<option value='".$value->VEH_REGIS_NO."'>".$value->VEH_REGIS_NO." </option>";     
                                            }
                                          } 
                                      ?>
                                  </select>
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ประเภทรถ</label>
                                <select class="js-example-basic-single test" id="md_veh_type_code" name="md_veh_type_code"  style="width: 100%;">
                                  <option value="">เลือก</option>
                                    <?php
                                        if($data_cartype != ""){
                                          foreach ($data_cartype as $key => $value){
                                            echo "<option value='".$value->VEH_TYPE_CODE."'>".$value->VEH_TYPE_NAME."</option>";     
                                          }
                                        } 
                                    ?>
                                </select>
                            </div>
                          </div> 

                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ยี่ห้อรถ</label>
                                <select class="js-example-basic-single" id="md_veh_brand_code"  name="md_veh_brand_code" style="width: 100%;">
                                  <option value="">เลือก</option>
                                    <?php
                                        if($data_car != ""){
                                          foreach ($data_car as $key => $value){
                                            echo "<option value='".$value->VEH_BRAND_CODE."'>".$value->VEH_BRAND_NAME." </option>";     
                                          }
                                        } 
                                    ?>
                                </select>
                            </div>
                          </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                            <label>หมายเหตุที่ไม่ผ่าน</label>
                              <input type="text" class="form-control" id="md_veh_note" name="md_veh_note">
                          </div>
                        </div>                                                  
                        </div>    
                        <div class="row">
                         <div class="col-12 ">    
                            <div class="form-group">
                                <div class="table-responsive">
                                  <table id="modal_tabel" class="table table-striped">
                                    <thead class="table-secondary"  border='1'>
                                        <tr align="center">
                                          <th width="250px"><h5>รายการตรวจเช็ค</h5></th>
                                          <th colspan="4" width="450px" align="center"><h5>สภาพโดยทั่วไป</h5></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody> 
                                </table>
                              </div>
                            </div>
                          </div>  
                        </div>
                    </div>
                   <div class="modal-footer">
                      <input type="hidden" id="save" name="save" value="">
                      <button type="button" class="btn btn-success save"  value="Y" ><em class="fa fa-check-circle-o" style='font-size:18px'></em> ตรวจสอบ </button>
                      <button type="button" class="btn btn-danger save"   value="N" >
                        <em class=" fa  fa-times-circle-o" style='font-size:18px'></em> ไม่ผ่านตรวจสอบ </button>  
                    </div>
              </form>
            </div>
          </div>
        </div>   
<!-- จบ ตรวจสอบเช็คลิสต์ -->
     <!-- ดูรายละเอียดเช็คลิสต์ -->
        <div class="modal fade show" id="modal_details"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div id="print-content">


                <form id="form_add" method="POST" enctype="multipart/form-data">
                <div class="modal-header" id="c_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(67, 202, 232);">
                  <h4 class="modal-title" id="h_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i> รายละเอียดผลการตรวจสภาพรถประจำวัน </font></b></h4>
                      <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                </div>
                    <div class="modal-body">
                      <input  type="hidden" id="hd_flg_b" name="hd_flg_b" value="">
                      <input  type="hidden" id="doc_no_b"  name="doc_no_b" value=""> 
                     
                        <div class="row">
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                              <div class="form-group">
                                <label>เลขไมล์</label>
                                  <input type="text"class="form-control" id="md_veh_km_b" name="md_veh_km_b" >
                              </div>
                          </div>
                           <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">  
                            <div class="form-group">
                                <label>วันที่ตรวจสภาพ</label>
                                  <input type="date" class="form-control" name="md_veh_date_check_b" id="md_veh_date_check_b" value="">
                            </div>
                          </div>                            
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                              <div class="form-group">
                                <label>เวลาที่ตรวจสภาพ</label>
                                  <input type="time"class="form-control" id="md_veh_time_b" name="md_veh_time_b" >
                              </div>
                          </div>         
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ทะเบียน</label>
                                  <select class="js-example-basic-single" id="md_veh_regis_no_b" name="md_veh_regis_no_b" style="width: 100%;">
                                    <option value="">เลือก</option>
                                      <?php
                                          if($data_regis != ""){
                                            foreach ($data_regis as $key => $value){
                                              echo "<option value='".$value->VEH_REGIS_NO."'>".$value->VEH_REGIS_NO." </option>";     
                                            }
                                          } 
                                      ?>
                                  </select>
                            </div>
                          </div>
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ประเภทรถ</label>
                                <select class="js-example-basic-single test" id="md_veh_type_code_b" name="md_veh_type_code_b"  style="width: 100%;">
                                  <option value="">เลือก</option>
                                    <?php
                                        if($data_cartype != ""){
                                          foreach ($data_cartype as $key => $value){
                                            echo "<option value='".$value->VEH_TYPE_CODE."'>".$value->VEH_TYPE_NAME."</option>";     
                                          }
                                        } 
                                    ?>
                                </select>
                            </div>
                          </div> 

                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ยี่ห้อรถ</label>
                                <select class="js-example-basic-single" id="md_veh_brand_code_b"  name="md_veh_brand_code_b" style="width: 100%;">
                                  <option value="">เลือก</option>
                                    <?php
                                        if($data_car != ""){
                                          foreach ($data_car as $key => $value){
                                            echo "<option value='".$value->VEH_BRAND_CODE."'>".$value->VEH_BRAND_NAME." </option>";     
                                          }
                                        } 
                                    ?>
                                </select>
                            </div>
                          </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                            <label>หมายเหตุที่ไม่ผ่าน</label>
                              <input type="text" class="form-control" id="md_veh_note_b" name="md_veh_note_b">
                          </div>
                        </div>                                                  
                        </div>    
                        <div class="row">
                         <div class="col-12 ">    
                            <div class="form-group">
                                <div class="table-responsive">
                                  <table id="modal_tabel_b" class="table table-striped">
                                    <thead class="table-secondary"  border='1'>
                                        <tr align="center">
                                          <th width="250px"><h5>รายการตรวจเช็ค</h5></th>
                                          <th colspan="4" width="450px" align="center"><h5>สภาพโดยทั่วไป</h5></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody> 
                                </table>
                              </div>
                            </div>
                          </div>  
                        </div>
                    </div>
                      <div class="modal-footer">
                         <button type="button" onclick="printDiv('print-content')" value="print a div!" class="btn btn-success btn-sm fs-14 p-lr-9" ><i class="fa fa-file-pdf-o"></i> Export PDF </button>
                      </div> 
              </form>
            </div>

            </div>
          </div>
        </div>   
      <!-- จบดูรายละเอียดเช็คลิสต์  -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
        <?php $this->load->view("include/_footer.php") ?> 
    <!-- include footer_script -->
    <?php $this->load->view('include/footer_script.php');?>

    <script type="text/javascript"  src="<?php echo base_url(); ?>assets/dist/js/script_set_daily_admin.js?v=<?php echo rand(0,999999); ?>" ></script>
        <script type="text/javascript"  src="<?php echo base_url(); ?>assets/dist/js/script_set_excel.js?v=<?php echo rand(0,999999); ?>" ></script> 

  </body>
</html>
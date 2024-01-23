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
                    <form id="search_ot" method="POST" action="<?php echo base_url();?>Mainapp/set_car_repair">     
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
                                    <label>สถานะเอกสาร</label> 
                                    <input type="hidden" id="hd_ft_veh_status" value="<?php echo $ft_veh_status?>">
                                    <select class="js-example-basic-single" id="ft_veh_status" name="ft_veh_status" style="width: 100%;">
                                        <option value="">เลือก</option>
                                        <option value="I">ยกเลิก</option>  
                                        <option value="N">เช็ครถไม่ได้</option>  
                                        <option value="U">รอการตรวจสอบ</option>
                                                                              
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
                   <div class="row"> 
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                          <div class="form-group" align="right" >
                            <button type="button"  onclick="modal_type(' เพิ่มตรวจเช็ครถประจำวัน','#4e73df','A','1')" id="" class='btn btn-primary btn-sm fs-14'><i class="fa fa-plus"></i> &nbsp; เช็ครถ  </button>
                            <button type="button"  onclick="modal_spoil(' เช็ครถไม่ได้','#1BBBD8','B','')" id="" class='btn btn-danger btn-sm fs-14'><i class="fa fa-car"></i> &nbsp;&nbsp; เช็ครถไม่ได้ </button>                            
                          </div>
                      </div>                                          
                    </div>                    
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
                          <th>สถานะเอกสาร</th> 
                         <!--  <th>เลขที่เอกสาร</th> -->
                          <th>เวลา</th>
                          <th>ทะเบียน</th>
                          <th>เลขไมล์</th>
                          <th>ประเภทรถ</th>
                          <th>ยี่ห้อรถ</th>
                          <th>สถานะรถ</th>
                          <th class='txt-center no-sort'>ยกเลิก</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            if($data_all != ""){
                              foreach ($data_all as $key => $value) {
                                echo "<tr class='".($value->DOC_STATUS == "A" && $value->CNF_FLG == "" ?  'table-warning' : 
                                  ($value->DOC_STATUS == "I" && $value->CNF_FLG == "" ? 'table-secondary' : ($value->DOC_STATUS == "N" && $value->CNF_FLG == "" ? 'table-primary' : ($value->CNF_FLG == "Y" && $value->DOC_STATUS == "A" ||$value->CNF_FLG == "Y" &&  $value->DOC_STATUS == "N" ? 'table-success' :  'table-danger'))))."'>";
                                  echo "<td></td>";    

                                  echo "<td>".$value->DOC_DATE."</td>";

                                  if ($value -> CNF_FLG == "Y" && $value->DOC_STATUS == "A") {
                                   echo "<td class='txt-center'>".
                                            "<button type='button' onclick=\"modal_type('รายละเอียดผลการตรวจสภาพ','#e74a3b','F','".$value->DOC_NO."')\" class='btn btn-success btn-sm' ><i class='fa fa-list m-tb-2 m-lr-4'></i></button>".
                                          "</td>"; 
                                  }
                                  elseif ($value->DOC_STATUS == "A" && $value -> CNF_FLG == "N" ) {
                                   echo "<td class='txt-center'>".
                                            "<button type='button' onclick=\"modal_type('รายละเอียดผลการตรวจสภาพ','#e74a3b','F','".$value->DOC_NO."')\" class='btn btn-success btn-sm' ><i class='fa fa-list m-tb-2 m-lr-4'></i></button>".
                                          "</td>"; 
                                  }
                                  else if ($value -> CNF_FLG == "Y" && $value->DOC_STATUS == "N") {
                                   echo "<td class='txt-center'>".
                                            "<button type='button' onclick=\"modal_spoil_details('รายละเอียดผลการตรวจสภาพ','#0A0D89','G','".$value->DOC_NO."')\" class='btn btn-success btn-sm' ><i class='fa fa-list m-tb-2 m-lr-4'></i></button>".
                                          "</td>";                                    
                                  }
                                  elseif ($value -> CNF_FLG == "N" && $value->DOC_STATUS == "N") {
                                   echo "<td class='txt-center'>".
                                            "<button type='button' onclick=\"modal_spoil_details('รายละเอียดผลการตรวจสภาพ','#0A0D89','G','".$value->DOC_NO."')\" class='btn btn-success btn-sm' ><i class='fa fa-list m-tb-2 m-lr-4'></i></button>".
                                          "</td>";                                                                   # code...
                                  }                               
                                  else {
                                       echo "<td></td>"; 
                                  }

                                  if($value->DOC_STATUS == "A" && $value -> CNF_FLG == ""|| $value->DOC_STATUS == "N" && $value -> CNF_FLG == ""|| $value->DOC_STATUS == "I" && $value -> CNF_FLG == ""){ 
                                    echo "<td>".$value->DOC_STATUS_DESC."</td>";
                                  }
                                  elseif ($value -> CNF_FLG == "N" || $value -> CNF_FLG == "Y") {
                                        echo "<td>".$value->CNF_FLG_DESC."</td>";
                                  }
                                  else{
                                   echo "<td></td>"; 
                                  }
                                 // echo "<td>".$value->DOC_NO."</td>";
                                  echo "<td>".$value->VEH_TIME."</td>";
                                  echo "<td>".$value->VEH_REGIS_NO."</td>";
                                  echo "<td>".$value->VEH_KM."</td>";
                                  echo "<td>".$value->VEH_TYPE_NAME."</td>";
                                  echo "<td>".$value->VEH_BRAND_NAME."</td>"; 

                                  if ($value->VEH_NOTE) {
                                    echo "<td>".$value->VEH_NOTE."</td>";
                                  }     
                                  else {
                                    echo "<td>".$value->VEH_BROKEN_LIST."</td>";
                                  }

                                  if ($value -> CNF_FLG == "" && $value->DOC_STATUS == "A") {
                                  echo "<td class='txt-center'>".
                                            "<button type='button' onclick=\"modal_type('ยกเลิกรายการตรวจเช็ครถประจำวัน','#e74a3b','D','".$value->DOC_NO."')\" class='btn btn-danger btn-sm' ><i class='fa fa-trash-o m-tb-2 m-lr-4'></i></button>".
                                        "</td>";  
                                  }
                                  elseif ($value -> CNF_FLG == "" && $value->DOC_STATUS == "N") {
                                    echo "<td class='txt-center'>".
                                              "<button type='button' onclick=\"modal_spoil('ยกเลิกรายการตรวจเช็ครถไม่ได้','#e74a3b','H','".$value->DOC_NO."')\" class='btn btn-danger btn-sm' ><i class='fa fa-trash-o m-tb-2 m-lr-4'></i></button>".
                                          "</td>"; 
                                  }
                                  elseif ($value -> CNF_FLG == "Y" && $value -> CNF_FLG == "N") {
                                    echo "<td></td>";
                                  }
                                  else{
                                    echo "<td></td>";
                                  }

                                echo "</tr>";
                              }  
                            }
                        ?>  
                        </tbody>
                      </table> 
                    <div class="col-lg-12" align="center">
                      <table >
                        <tr>
                          <th><input type="text" style="background-color: #e69138; border-radius: 5px;border: none;width: 20px;" disabled=""></th>
                              <th>รอตรวจสอบ</th>                          
                            <th><input type="text" style="background-color: #6fa8dc; border-radius: 5px;border: none;width: 20px;" disabled=""></th>
                              <th>เช็ครถไม่ได้</th>                           
                           <th><input type="text" style="background-color: #bcbcbc;border-radius: 5px;border: none;width: 20px;" disabled=""></th>
                              <th>ยกเลิก</th>
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
                      <input  type="hidden" id="num_radio"  value="">
                      <input  type="hidden" id="doc_no"  name="doc_no" value=""> 
                      
                        <div class="row">
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                              <div class="form-group">
                                <label>เลขไมล์ <font color="red"><b> * </b></font></label>
                                  <input type="text"class="form-control" id="md_veh_km" name="md_veh_km" >
                              </div>
                          </div>
                           <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">  
                            <div class="form-group">
                                <label>วันที่ตรวจสภาพ <font color="red"><b> * </b></font></label>
                                  <input type="date" class="form-control" name="md_veh_date_check" id="md_veh_date_check" value="<?=date('Y-m-d')?>"
                                   min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d');?>">
                            </div>
                          </div>                            
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                              <div class="form-group">
                                <label>เวลาที่ตรวจสภาพ <font color="red"><b> * </b></font></label>
                                  <input type="time"class="form-control" id="md_veh_time" name="md_veh_time" value="now" >
                              </div>
                          </div>         
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ทะเบียน <font color="red"><b> * </b></font></label>
                                  <select class="js-example-basic-single" id="md_veh_regis_no" name="md_veh_regis_no" style="width: 100%;" onchange="Register()">
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
                              <label>ประเภทรถ <font color="red"><b> * </b></font></label>
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
                              <label>ยี่ห้อรถ <font color="red"><b> * </b></font></label>
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
                         <button type="submit" class="btn btn-success fs-14" id="addData" style="min-width: 100px">บันทึก</button>
                         <button type="button" class="btn btn-light fs-14" data-dismiss="modal" style="min-width: 100px">ยกเลิก</button>
                      </div> 
              </form>
            </div>
          </div>
        </div>   
          <!-- partial -->
      <!-- ดูรายละเอียดเช็คลิสต์ -->
        <div class="modal fade show" id="modal_details"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="form_add" method="POST" enctype="multipart/form-data">
                <div class="modal-header" id="c_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(67, 202, 232);">
                  <h4 class="modal-title" id="h_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i> รายละเอียดผลการตรวจสภาพรถประจำวัน </font></b></h4>
                      <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                </div>
                    <div class="modal-body">
                      <input  type="hidden" id="hd_flg" name="hd_flg_b" value="">
                      <input  type="hidden" id="num_radio"  value="">
                      <input  type="hidden" id="doc_no"  name="doc_no_b" value=""> 
                     
                        <div class="row">
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                              <div class="form-group">
                                <label>เลขไมล์ <font color="red"><b> * </b></font></label>
                                  <input type="text"class="form-control" id="md_veh_km_b" name="md_veh_km_b" >
                              </div>
                          </div>
                           <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">  
                            <div class="form-group">
                                <label>วันที่ตรวจสภาพ <font color="red"><b> * </b></font></label>
                                  <input type="date" class="form-control" name="md_veh_date_check_b" id="md_veh_date_check_b" value="">
                            </div>
                          </div>                            
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                              <div class="form-group">
                                <label>เวลาที่ตรวจสภาพ <font color="red"><b> * </b></font></label>
                                  <input type="time"class="form-control" id="md_veh_time_b" name="md_veh_time_b" >
                              </div>
                          </div>         
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ทะเบียน <font color="red"><b> * </b></font></label>
                                  <select class="js-example-basic-single" id="md_veh_regis_no_b" name="md_veh_regis_no_b" style="width: 100%;" onchange="Register()">
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
                              <label>ประเภทรถ <font color="red"><b> * </b></font></label>
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
                              <label>ยี่ห้อรถ <font color="red"><b> * </b></font></label>
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
                      </div> 
              </form>
            </div>
          </div>
        </div>   
      <!-- จบดูรายละเอียดเช็คลิสต์  -->
        <!-- modal -->
        <div class="modal fade show" id="modal_spoil"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="form_approve" method="POST" enctype="multipart/form-data">
                <div class="modal-header" id="a_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(67, 202, 232);">
                  <h4 class="modal-title" id="b_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i>  </font></b></h4>
                      <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                </div>
                    <div class="modal-body">
                      <input  type="hidden" id="hd_flg_c" name="hd_flg_c" value="">
                      <input  type="hidden" id="doc_no_c"  name="doc_no_c" value=""> 
                     
                        <div class="row">
                           <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">  
                            <div class="form-group">
                                <label>วันที่ตรวจสภาพ <font color="red"><b> * </b></font></label>
                                  <input type="date" class="form-control" name="md_veh_date_check_c" id="md_veh_date_check_c"
                                   value="<?=date('Y-m-d')?>" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d');?>">
                            </div>
                          </div>                            
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                              <div class="form-group">
                                <label>เวลาที่ตรวจสภาพ <font color="red"><b> * </b></font></label>
                                  <input type="time"class="form-control" id="md_veh_time_c" name="md_veh_time_c" value="now" >
                              </div>
                          </div>         
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ทะเบียน <font color="red"><b> * </b></font></label>
                                   <select class="js-example-basic-single" id="md_veh_regis_no_c" name="md_veh_regis_no_c" style="width: 100%;" onchange="Carspoil()">
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
                              <label>ประเภทรถ <font color="red"><b> * </b></font></label>
                                <select class="js-example-basic-single test" id="md_veh_type_code_c" name="md_veh_type_code_c"  style="width: 100%;">
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
                              <label>ยี่ห้อรถ <font color="red"><b> * </b></font></label>
                                <select class="js-example-basic-single" id="md_veh_brand_code_c"  name="md_veh_brand_code_c" style="width: 100%;">
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
                                        <select class="js-example-basic-single" style="width: 100%;" id="md_veh_spoil_c"  name="md_veh_spoil_c" onchange = "START()">
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
                                     <label>รายการรถเสีย<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                    <input type="text" class="form-control" id="md_veh_spoil_name" name="md_veh_spoil_name" /> 
                                    </div>                                        
                                </div>
                            </div> 
                        </div>    
                    </div>
                      <div class="modal-footer">
                         <button type="submit" class="btn btn-success fs-14" id="addData" style="min-width: 100px">บันทึก</button>
                         <button type="button" class="btn btn-light fs-14" data-dismiss="modal" style="min-width: 100px">ยกเลิก</button>
                      </div> 
              </form>
            </div>
          </div>
        </div>   
          <!-- partial -->   
  <!-- รายละเอียดตรวจเช็ครถไม่ได้ -->
        <div class="modal fade show" id="modal_spoil_details"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="form_approve" method="POST" enctype="multipart/form-data">
                <div class="modal-header" id="f_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(67, 202, 232);">
                  <h4 class="modal-title" id="g_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i></font></b></h4>
                      <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                </div>
                    <div class="modal-body">
                      <input  type="hidden" id="hd_flg_g" name="hd_flg_g" value="">
                      <input  type="hidden" id="doc_no_g"  name="doc_no_g" value=""> 
                     
                        <div class="row">
                           <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">  
                            <div class="form-group">
                                <label>วันที่ตรวจสภาพ <font color="red"><b> * </b></font></label>
                                  <input type="date" class="form-control" name="md_veh_date_check_g" id="md_veh_date_check_g" value="">
                            </div>
                          </div>                            
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                              <div class="form-group">
                                <label>เวลาที่ตรวจสภาพ <font color="red"><b> * </b></font></label>
                                  <input type="time"class="form-control" id="md_veh_time_g" name="md_veh_time_g" value="" >
                              </div>
                          </div>         
                          <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ทะเบียน <font color="red"><b> * </b></font></label>
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
                              <label>ประเภทรถ <font color="red"><b> * </b></font></label>
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
                              <label>ยี่ห้อรถ <font color="red"><b> * </b></font></label>
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
                                    <div id="stop"><br>
                                     <label>รายการรถเสีย<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
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

  <!-- จบรายละเอียดตรวจเช็ครถไม่ได้  --> 
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
        <?php $this->load->view("include/_footer.php") ?> 
    <!-- include footer_script -->
    <?php $this->load->view('include/footer_script.php');?>
    <script type="text/javascript"  src="<?php echo base_url(); ?>assets/dist/js/script_set_daily.js?v=<?php echo rand(0,999999); ?>" ></script>
  </body>
</html>
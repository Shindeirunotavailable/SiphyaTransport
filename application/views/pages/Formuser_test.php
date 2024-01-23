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
                    <form id="search_ot" method="POST" action="<?php echo base_url();?>Mainapp/set_formuser_test">     
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
                                    <label>วันที่เริ่มนำของลง</label> 
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
                    <div class="row">
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                          <div class="form-group" align="right" >
                            <button type="button"  onclick="modal_type(' เพิ่มรายงานพนักงานขับรถ','#4e73df','A','1')" id="" class='btn btn-primary btn-sm fs-14'><i class="fa fa-plus"></i> เพิ่ม</button>
                          </div>
                      </div>
                    </div>                        
                </div>
              </div> 
               <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="table-responsive">
                      <table id="datatable-ot" class="table table-striped" style="width: 100%">
                        <thead class="table-dark">
                        <tr>
                      <th class='txt-center no-sort' width="5px"  style="display:none;"></th>
                      <th>วันที่ขึ้นของ</th> 
                      <th>วันที่ลงของ </th>                       
                      <th>ยืนยัน</th>
                      <th>สถานะเอกสาร</th>
                      <!-- <th>เลขที่เอกสาร</th> -->
                      <!-- <th>วันที่เอกสาร</th> -->
                      <th>ทะเบียนรถ</th>
                      <th>ต้นทาง</th>
                      <th>ปลายทาง</th>
                      <th>วัสดุ</th>
                      <th>น้ำหนัก</th>                       
                      <th>ผู้รับ</th>
                      <th>อุปสรรคที่พบ</th>
                      <th class='txt-center no-sort' width="25px">แก้ไข</th>
                      <th class='txt-center no-sort' width="25px">ยกเลิก</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                            if($data_all != ""){
                              foreach ($data_all as $key => $value) {
                                echo "<tr class='".($value->DOC_CNF_FLG == "Y" ? 'table-success' : ($value->DOC_STATUS == "A" ? 
                                  'table-warning' : ($value->DOC_STATUS == "I" ? 'table-danger' : 'table-secondary')))."'>";

                                  echo "<td></td>";
                                  echo "<td>".$value->VEH_DATE_UP."</td>";                                  
                                  echo "<td>".$value->VEH_DATE_DROP."</td>"; 
                                  if($value->DOC_CNF_FLG == "" && $value -> DOC_STATUS == "A"){
                                   echo "<td class='txt-center'>".
                                    "<button type='button' onclick=\"modal_list('ยืนยัน','#82F7FF','B','".$value->DOC_NO."')\" class='btn btn btn-success btn-sm' ><i class='fa fa-check'></i></button>".
                                    "</td>";
                                  }

                                  else{
                                   echo "<td></td>"; 
                                  }
                                  // echo "<td>".$value->DOC_STATUS."</td>";   
                                  if($value->DOC_CNF_FLG == "" && $value -> DOC_STATUS == "A" ){
                                    echo "<td> รอยืนยันปลายทาง </td>";
                                  }
                                  elseif ($value -> DOC_CNF_FLG == "Y" && $value -> DOC_STATUS == "A" ) {
                                    echo "<td> เสร็จสิ้น </td>";
                                  }

                                  elseif ($value -> DOC_STATUS == "I" ) {
                                    echo "<td> ยกเลิก </td>";
                                  }

                                  else{
                                   echo "<td></td>"; 
                                  }
                                 
                                 // echo "<td>".$value->DOC_NO."</td>";
                                  //echo "<td>".$value->DOC_DATE."</td>";
                                  echo "<td>".$value->VEH_REGIS_NO."</td>";
                                  echo "<td>".$value->VEH_START_NAME."</td>";
                                  echo "<td>".$value->VEH_STOP_NAME."</td>";                                                           
                                  // echo "<td>".$value->RRJ_VEH_START."</td>";
                                  // echo "<td>".$value->RRJ_VEH_STOP."</td>"; 
                                  echo "<td>".$value->VEH_TYPE_LIST."</td>";
                                  echo "<td>".$value->VEH_WEIGHT."</td>";

                                  echo "<td>".$value->VEH_BEARER."</td>";
                                  echo "<td></td>"; 
                                  if($value->DOC_CNF_FLG == "" && $value -> DOC_STATUS == "A" ){
                                  echo "<td class='txt-center'>".
                                            "<button type='button' onclick=\"modal_type(' แก้ไขรายการบันทึกต้นทาง','#de732f','E','".$value->DOC_NO."')\" class='btn btn-warning btn-sm' ><i class='fa fa-pencil-square-o m-tb-2 m-l-4 m-r-1'></i></button>".
                                          "</td>";
                                  echo "<td class='txt-center'>".
                                            "<button type='button' onclick=\"modal_type('ยกเลิกรายการบันทึกต้นทาง','#e74a3b','D','".$value->DOC_NO."')\" class='btn btn-danger btn-sm' ><i class='fa fa-trash-o m-tb-2 m-lr-4'></i></button>".
                                          "</td>";                                    
                                  }
                                  elseif ($value->DOC_STATUS == "I" ) {
                                    echo "<td></td>"; 
                                    echo "<td></td>"; 
                                  }
                                  else {
                                    echo "<td></td>"; 
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
                          <th><input type="text" style="background-color: #00FFFF  ;border-radius: 5px;border: none;width: 20px;" disabled=""></th>
                              <th>รอยืนยันปลายทาง</th>                          
                            <th><input type="text" style="background-color: #82e0aa;border-radius: 5px;border: none;width: 20px;" disabled=""></th>
                              <th>เสร็จสิ้น</th>                           
                           <th><input type="text" style="background-color: #DB3423;border-radius: 5px;border: none;width: 20px;" disabled=""></th>
                              <th>ยกเลิก</th>
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
                    <h4 class="modal-title" id="h_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i> </font></b></h4>
                      <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                  </div>
                    <div class="modal-body">
                      <input  type="hidden" id="hd_flg" name="hd_flg" value="">
                      <input  type="hidden" id="doc_no"  name="doc_no" value=""> 
                      <input  type="hidden" id="doc_date"  name="doc_date" value=""> 
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>เริ่มเดินทางจาก<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label> 
                                  <select class="js-example-basic-single" style="width:100%" id ="md_veh_start" name="md_veh_start" onchange = "START()">
                                    <option value="">เลือก</option>
                                    <option value="xxx">อื่นๆ</option>  
                                            <?php
                                                if($data_vts != ""){
                                                  foreach ($data_vts as $key => $value){
                                                    echo "<option value='".$value->PRJ_CODE."'> $value->PRJ_CODE : $value->PRJ_NAME_T</option>";
                                                  }
                                                } 
                                            ?>
                                </select>
                                   <div id="dvPassport"><br>
                                     <label>เริ่มเดินทางจาก<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                    <input type="text" class="form-control" id="md_veh_start_name" name="md_veh_start_name" /> 
                                    </div>
                                     <input type="hidden" class="form-control" id="test" name="test" >
                              </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>เดินทางไปที<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                  <select class="js-example-basic-single" style="width:100%" id ="md_veh_stop" name="md_veh_stop" onchange = "STOP()">
                                    <option value="">เลือก</option>
                                    <option value="xxx">อื่นๆ</option>  
                                            <?php
                                                if($data_vts != ""){
                                                  foreach ($data_vts as $key => $value){
                                                    echo "<option value='".$value->PRJ_CODE."'> $value->PRJ_CODE : $value->PRJ_NAME_T</option>";
                                                  }
                                                } 
                                            ?>
                                </select>
                                   <div id="stop"><br>
                                     <label>เดินทางไปทีอื่นๆ<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                    <input type="text" class="form-control" id="md_veh_stop_name" name="md_veh_stop_name" />
                                    </div>
                                  <input type="hidden" class="form-control" id="stop1" name="stop1" value=""> 
                                </div>
                            </div>  

                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>หมายเลขทะเบียน<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                        <select class="js-example-basic-single" id="md_veh_regis_no"  style="width: 100%;" name="md_veh_regis_no">
                                          <option value="">เลือก</option>
                                            <?php
                                                if($data_regis != ""){
                                                  foreach ($data_regis as $key => $value){
                                                    echo "<option value='".$value->VEH_REGIS_NO."'>".$value->VEH_REGIS_NO."</option>";     
                                                  }
                                                } 
                                            ?>
                                        </select>
                                </div>
                            </div>                                               
                           <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">  
                            <div class="form-group">
                                <label>วันที่ขึ้นของ <font color="red"><b> * </b></font></label>
                                  <input type="date" class="form-control" name="md_veh_date_up" id="md_veh_date_up" value="<?=date('Y-m-d')?>" min="<?php echo date('Y-m-d');?>">
                            </div>
                          </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>เวลาที่เริ่มออกเดินทาง<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                    <input type="time" class="form-control" id="md_veh_time_start" name="md_veh_time_start" value="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>เลขไมล์ก่อนออกเดินทาง<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                    <input type="text" class="form-control" id="md_veh_km_start" name="md_veh_km_start">
                                </div>
                            </div>
                               <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>ประเภทขนส่ง<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                    <select class="js-example-basic-single select2-hidden-accessible" style="width:100%" id="md_veh_type_list" name="md_veh_type_list">
                                      <option value="">เลือก</option>
                                      <option>วัสดุ</option>
                                      <option>ผู้โดยสาร</option>                           
                                    </select>
                                  </div>
                              </div>                                                      
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>น้ำหนักของที่บรรทุก (KG.) / จำนวนผู้โดยสาร <font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                    <input type="text" class="form-control"id="md_veh_weight" name="md_veh_weight">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" >
                          <button type="button" class="btn btn-sm btn-dark fs-14" id="btn-row"><i class="fa fa-plus"></i>
                          </button><input type="hidden" id="md_num" value="">
                        </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">    
                      <div class="form-group">
                          <div class="table-responsive">
                            <table id="table-subroom" class="table table-striped">
                              <thead class="table-dark">
                                 <tr>
                                    <th>เลขที่ใบส่งของ</th>
                                    <th>รายการ</th>
                                    <th>ลบ</th>
                                 </tr>
                              </thead>
                              <tbody>
                              </tbody> 
                          </table>
                        </div>
                      </div>
                    </div>  
                      <div  id="alert_save"></div>                       
                    </div>
                      <div class="modal-footer">
                         <button type="submit" class="btn btn-success fs-14" id="addData" style="min-width: 100px">บันทึก</button>
                         <button type="button" class="btn btn-light fs-14" data-dismiss="modal" style="min-width: 100px">ยกเลิก</button>
                      </div> 
                </form>
              </div>
            </div>
        </div>

           <!--     หน้าต่างยืนยันการถึงจุดหมายปลายทาง      -->
        <div class="modal fade show" id="modal_approve"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg">
           <div class="modal-content">
            <form id="form_approve" method="POST" enctype="multipart/form-data">
                <div class="modal-header" id="p_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(67,202,232);">
                  <h4 class="modal-title" id="l_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i>ยืนยันข้อมูลปลายทาง</font></b></h4>
                    <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                </div>
              <div class="modal-body">
                <h4 class="card-title">รายงานพนักงานขับรถต้นทาง</h4>  
                  <div class="row">
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>เริ่มเดินทางจาก</label>
                                    <input type="text" class="form-control" id="md_veh_start_c" name="md_veh_start_c" >
                                </div>
                            </div>                             
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>เดินทางไปที</label>
                                    <input type="text" class="form-control" id="md_veh_stop_c" name="md_veh_stop_c" >
                                </div>
                            </div> 
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                            <label>หมายเลขทะเบียน</label>
                              <input type="text" class="form-control" id="md_veh_regis_no_c" name="md_veh_regis_no_c" >
                          </div>
                      </div>
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                            <label>วันที่ขึ้นของ</label>
                              <input type="date" class="form-control"  id="md_veh_date_up_c" name="md_veh_date_up_c">
                          </div>
                      </div>  
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                            <label>เวลาที่เริ่มออกเดินทาง</label>
                               <input type="time"class="form-control" id="md_veh_time_start_c" name="md_veh_time_start_c">
                          </div>
                      </div>
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                            <label>เลขไมล์ก่อนออกเดินทาง</label>
                              <input type="text" class="form-control" id="md_veh_km_start_c" name="md_veh_km_start_c">
                          </div>
                      </div>                                                                      
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>ประเภทขนส่ง</label>
                            <input type="text" class="form-control" id="md_veh_type_list_c" name="md_veh_type_list_c" >
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>น้ำหนักของที่บรรทุก (KG.)</label>
                            <input type="text" class="form-control"id="md_veh_weight_c" name="md_veh_weight_c">
                        </div>
                    </div>
                </div> 
                  <div class="form-group" >
<!--                     <button type="button" class="btn btn-sm btn-dark fs-14" id="btn-row"><i class="fa fa-plus"></i>
                    </button><input type="hidden" id="md_num_c" value="">
                  </div> -->
              <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">    
                <div class="form-group">
                    <div class="table-responsive">
                      <table id="table-subroom_c" class="table table-striped">
                        <thead class="table-dark">
                           <tr>
                              <th>เลขที่ใบส่งของ</th>
                              <th>รายการ</th>
                              <th>ลบ</th>
                           </tr>
                        </thead>
                        <tbody>
                        </tbody> 
                    </table>
                  </div>
                </div>
              </div>  
            <div  id="alert_save"></div>                        
                      <input  type="hidden" id="hd_flg_c" name="hd_flg_c" value="">
                      <input  type="hidden" id="doc_no_c"  name="doc_no_c" value="">  
                      <input  type="hidden" id="md_veh_sum_time"  name="md_veh_sum_time" value="">  
                <hr>
              <p  id="md_veh_time_sum_a"></p>
                                  
              <h4 class="card-title">รายงานพนักงานขับรถ จากปลายทาง</h4>                     
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>เวลาทีถึงจุดหมาย<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                              <input type="time"class="form-control" id="md_veh_time_stop" name="md_veh_time_stop"  oninput="mytime()">
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>เลขไมล์เมื่อถึง<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                            <input type="text" class="form-control" id="md_veh_km_stop" name="md_veh_km_stop">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>ผู้รับของ<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                            <input type="text" class="form-control" id="md_veh_bearer" name="md_veh_bearer" >
                        </div>
                    </div>                    
                           <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">  
                            <div class="form-group">
                                <label>วันที่ลงของ<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                  <input type="date" class="form-control" name="md_veh_date_drop" id="" value="<?=date('Y-m-d')?>" 
                                  min="<?php echo date('Y-m-d');?>">

                            </div>
                          </div>                    
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>ปัญหาอุปสรรคที่พบ</label>
                             <input type="text" class="form-control" id="md_veh_note" name="md_veh_note">
                        </div>
                    </div> 
                </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                      <div class="row dis-add-row">
                        <div class="col-12">
                            <div class="form-group">
                              <button type="button"  id="btn_add_row" class='btn btn-sm btn-warning'>ไฟล์แนบ</button>
                              <input type="hidden"    id="hd_num_row" value="">
                            </div>
                        </div>
                      </div>    
                      <div class="row">
                        <div class="col-12">
                          <div class="table-responsive">
                            <table id="modaltable_file" class="table table-bordered" style="width: 100%">
                              <thead class="table-dark">
                                <th width="90%">ชื่อไฟล์</th>
                                <th class="txt-center" width="10%">ลบ</th>
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
                <button type="submit" class="btn btn-success"  ><em class="fa fa-floppy-o" style='font-size:18px'></em> บันทึก </button>  
                <button type="button" class="btn btn-light fs-14 btn-cl" data-dismiss="modal" style="min-width: 100px">ปิด</button>                           
              </div>
            </form>
          </div>     
        </div>   
      </div>
          <!-- content-wrapper ends -->      
          <!-- partial:../../partials/_footer.html -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
        <?php $this->load->view("include/_footer.php") ?> 
    <!-- container-scroller -->
    <!-- include footer_script -->
    <?php $this->load->view('include/footer_script.php');?>
    <script type="text/javascript"  src="<?php echo base_url(); ?>assets/dist/js/script_set_formuser_test.js?v=<?php echo rand(0,999999); ?>" ></script>
  </body>
</html>
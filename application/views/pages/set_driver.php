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
                    
                       <form id="search_ot" method="POST" action="<?php echo base_url();?>Mainapp/set_driver">     
                       <!--  ประเภท -->
                          <div class="row">
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>รหัสพนักงาน</label>
                                       <input type="text" class="form-control fs-14" id="ft_veh_emp_no" name="ft_veh_emp_no" value="<?php echo $ft_veh_emp_no ?>">
                                  </div>
                              </div> 
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>ชื่อพนักงาน</label>
                                      <input type="text" class="form-control fs-14" id="ft_veh_emp_name" name="ft_veh_emp_name" value="<?php echo $ft_veh_emp_name ?>">
                                  </div>
                              </div> 
                            

                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>เลือกประเภทรถ</label>
                                    <input type="hidden" id="hd_ft_veh_grp_code" value="<?php echo $ft_veh_type_code ?>">

                                    <select class="js-example-basic-single" id="ft_veh_type_code" name="ft_veh_type_code" style="width: 100%;">
                                      <option value="">เลือก</option>
                                        <?php
                                            if($data_cartype != ""){
                                              foreach ($data_cartype as $key => $value){
                                                echo "<option value='".$value->VEH_TYPE_CODE."'>".$value->VEH_TYPE_NAME."</option>";   // จะทำการโชว์ชื่อแทน ID  
                                              }
                                            } 
                                        ?>
                                    </select>
                                  </div>
                              </div>  

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


                         </div>      
                          <div class="row">
                                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                      <div class="form-group">
                                          <button type="submit" class="btn btn-info btn-sm fs-14 p-lr-9" id="searchData"><i class="fa fa-search">
                                          </i> ค้นหา</button>
                                          <button type="submit" class="btn btn-success" id="exporttable"><i class="fa fa-download" ></i> excel</button>
                                      </div>
                                  </div>
                          </div>
                        </form>
                          <hr>
                    <div class="row">
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                          <div class="form-group" align="right" >
                            <button type="button"  onclick="modal_type('เพิ่มรายละเอียดพนักงานขับรถ','#4e73df','A','')" id="" class='btn btn-primary btn-sm fs-14'><i class="fa fa-plus"></i> เพิ่ม</button>
                          </div>
                      </div>
                    </div>
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                            <table id="datatable-ot" class="table table-striped" style="width: 100%">
                              <thead class="table-dark">
                                <tr>
                                  <th></th>
                                  <th>สถานะพนักงาน</th>
                                  <th>วันที่ลาออก</th>
                                  <th>รหัสพนักงาน</th>
                                  <th>ชื่อ-นามสุกล</th>
                                  <th>เลขบัตรประชาชน</th>
                                  <th>วัน/เดือน/ปีเกิด</th>
                                  <th>อายุ</th>
                                  <th>เบอร์โทร</th>
                                  <th>ที่อยู่</th>
                                  <th>เลขทีใบขับขี่</th>
                                  <th>ประเภทใบขับขี่</th>
                                  <th>วันอนุญาติออกบัตร</th>
                                  <th>วันหมดอายุบัตร</th>
                                  <th>วันที่เข้าทำงาน</th>
                                  <th>อายุงาน</th>
                                  <th>ตำแหน่ง</th>
                                  <th>ขับรถประเภท</th>
                                  <th>ทะเบียน</th>
                                  <th>รูป</th>
                                  <th class='txt-center no-sort' width="50px">แก้ไข</th>
                                  <!-- <th class='txt-center no-sort' width="50px">ลบ</th> -->
                                  <th class='txt-center no-sort' width="50px">ลาออก</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                    if($data_all != ""){
                                      foreach ($data_all as $key => $value) {
                                        echo "<tr class='".($value->DOC_STATUS == "I" ? 'table-danger' : 'table-success')."'>";
                                            echo "<td></td>";
                                            if($value -> DOC_STATUS == "I"){
                                              echo "<td> ลาออก </td>";
                                            }
                                            else{
                                             echo "<td> เป็นพนักงาน </td>"; 
                                            }
                                          echo "<td>".$value->DATE_RESIGN."</td>";
                                          echo "<td>".$value->VEH_EMP_NO."</td>";
                                          echo "<td>".$value->VEH_EMP_NAME."</td>"; 
                                          echo "<td>".$value->VEH_ID_CARD."</td>";
                                          echo "<td>".$value->VEH_BIRTH_DAY."</td>";    
                                          echo "<td>".$value->VEH_AGE."</td>";
                                          echo "<td>".$value->VEH_TELL."</td>";
                                          echo "<td>".$value->VEH_ADDRESS."</td>"; 
                                          echo "<td>".$value->VEH_DRIVER_ID."</td>"; 
                                          echo "<td>".$value->VEH_DRIVER_TYPE."</td>"; 
                                          echo "<td>".$value->VEH_ISSUE_DATE."</td>"; 
                                          echo "<td>".$value->VEH_EXPIRY_DATE."</td>"; 
                                          echo "<td>".$value->VEH_START_WORK_DATE."</td>";
                                          echo "<td>".$value->VEH_WORK_AGE."</td>";
                                          echo "<td>".$value->VEH_POSITION_NAME."</td>"; 
                                          echo "<td>".$value->VEH_TYPE_NAME."</td>";
                                          echo "<td>".$value->VEH_REGIS_NO."</td>"; 
                                          echo "<td>".$value->VEH_EMP_PIC."</td>"; 
                                         // echo "<td>".$value->NOTE_RESIGN."</td>";

                                          echo "<td class='txt-center'>".
                                                    "<button type='button' onclick=\"modal_type('แก้ไขรายละเอียดพนักงาน','#de732f','E','".$value->VEH_EMP_NO."')\" class='btn btn-warning btn-sm' ><i class='fa fa-pencil-square-o m-tb-2 m-l-4 m-r-1'></i></button>".
                                                  "</td>";
                                          // echo "<td class='txt-center'>".
                                          //           "<button type='button' onclick=\"modal_type('ลบข้อมูลพนักงานขับรถ','#e74a3b','D','".$value->VEH_EMP_NO."')\" class='btn btn-danger btn-sm' ><i class='fa fa-trash-o m-tb-2 m-lr-4'></i></button>".
                                          //         "</td>";
                                          echo "<td class='txt-center'>".
                                                    "<button type='button' onclick=\"modal_type('ลาออก','#493be7','F','".$value->VEH_EMP_NO."')\" class='btn btn-info btn-sm' ><i class='fa fa-user-times'></i></button>".
                                                  "</td>";

                                        echo "</tr>";
                                      } 
                                    }
                                ?>  
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
        <!-- modal เพิ่ม/แก้ไข -->
         <div class="modal fade show" id="modal_add"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg">
                <form id="form_add" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                  <div class="modal-header" id="a_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(67, 202, 232);">
                    <h4 class="modal-title" id="f_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i> </font></b></h4>
                      <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                  </div>
                    <div class="modal-body">
                      <input  type="hidden" id="hd_flg" name="hd_flg" value="">
                      <!-- โชว์รูป -->
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 form-group"  align="left" >
                          <div class="user-avatar mb-auto">
                              <img src="" alt="profile image" class="profile-img img-lg rounded-circle emp_avatar" width="128" height="128"  > 
                          </div>
                      </div>
                      <hr> 
                <!--       ถ้ามีรูป ต้องเพิ่ม name ด้วยเพราะว่า การแนบรูปมันจะรับค่าเป็น name โดยให้ name ตรงกับชื่อ ID -->
                       <h3> ข้อมูลส่วนบุคคล </h3> <br>
                        <div class="row">
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>ชื่อ-นามสุกล<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                      <input type="text" class="form-control fs-14" id="md_veh_emp_name" name="md_veh_emp_name">
                                  </div>
                              </div>
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>เลขบัตรประชาชน<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                        <input type="text" class="form-control fs-14" id="md_veh_id_card"name="md_veh_id_card">
                                  </div>
                              </div>
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>วัน/เดือน/ปีเกิด<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                      <input type="date" class="form-control fs-14" id="md_veh_brith_day"name="md_veh_brith_day">
                                  </div>
                              </div>
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>อายุ<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                      <input type="text" class="form-control fs-14" id="md_veh_age"name="md_veh_age">
                                  </div>
                              </div> 
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>เบอร์โทร<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                      <input type="text" class="form-control fs-14" id="md_veh_tell"name="md_veh_tell">
                                  </div>
                              </div>
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>ที่อยู่<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                        <textarea  rows="4" cols="50" class="form-control fs-14" id="md_veh_address" name="md_veh_address"></textarea>
                                  </div>
                              </div>
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>แนบรูป</label>
                                    <span class="input-group-append"> 
                                      <!-- name filUpload เอามาจาก mainapp -->
                                       <input type="file" id="filUpload" name="filUpload" class="dropify" accept="image/png, image/jpeg"> <!-- รับเฉพาะภาพ JPG PNG -->
                                    </span>
                                  </div>
                              </div>
                             
                          </div>
                         <hr>
                       <h3> ข้อมูลใบขับขี่ </h3> <br>
                        <div class="row">
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>เลขทีใบขับขี่<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                               <input type="text" class="form-control fs-14" id="md_veh_driver_id" name="md_veh_driver_id">
                                  </div>
                              </div>
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>ประเภทใบขับขี่</label>
                                    <select class="js-example-basic-single select2-hidden-accessible" style="width:100%" id="md_veh_driver_type" name="md_veh_driver_type"> 
                                      <option>เลือก<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></option>
                                      <option>รถยนต์ส่วนบุคคล</option>
                                      <option>ใบขับขี่ประเภทที่ 2</option>
                                      <option>ใบขับขี่ประเภทที่ 3</option>
                                      <option>ใบขับขี่ประเภทที่ 4</option>                            
                                    </select>
                                  </div>
                              </div>
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>วันอนุญาตออกบัตร<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                      <input type="date" class="form-control fs-14" id="md_veh_issue_date" name="md_veh_issue_date">
                                  </div>
                              </div>
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>วันหมดอายุบัตร<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                      <input type="date" class="form-control fs-14" id="md_veh_expirt_date" name="md_veh_expirt_date">
                                  </div>
                              </div> 
                            </div>
                       <hr>
                       <h3> ข้อมูลการทำงาน </h3> <br>
                        <div class="row">
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>รหัสพนักงาน<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                               <input type="text" class="form-control fs-14" id="md_veh_emp_no" name="md_veh_emp_no">
                                  </div>
                              </div>
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>วันที่เข้าทำงาน<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                      <input type="date" class="form-control fs-14" id="md_veh_start_work_date" name="md_veh_start_work_date">
                                  </div>
                              </div>
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>อายุงาน<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                               <input type="text" class="form-control fs-14" id="md_veh_work_age" name="md_veh_work_age">
                                  </div>
                              </div>
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>ตำแหน่ง<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                               <input type="text" class="form-control fs-14" id="md_veh_position_name" name="md_veh_position_name">
                                  </div>
                              </div> 
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>ขับรถประเภท<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                  <select class="js-example-basic-single" id="md_veh_type_code"  style="width: 100%;" name="md_veh_type_code" >
                                      <option value="">เลือก</option>
                                        <?php
                                            if($data_cartype != ""){
                                              foreach ($data_cartype as $key => $value){
                                                echo "<option value='".$value->VEH_TYPE_CODE."'>".$value->VEH_TYPE_NAME." </option>";     
                                              }
                                            } 
                                        ?>
                                    </select>
                                  </div>
                              </div> 
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>ทะเบียน<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
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
                            </div>
                       <hr>
                               <h3> ข้อมูลในการลาออก </h3> <br>
                        <div class="row">
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>วันที่ลาออก</label>
                                      <input type="date"  rows="4" cols="50" class="form-control fs-14" id="md_veh_date_resign" name="md_veh_date_resign">
                                  </div> 
                              </div>                           
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>หมายเหตุ</label>
                                      <textarea  rows="4" cols="50" class="form-control fs-14" id="md_veh_note_resign" name="md_veh_note_resign"></textarea>
                                  </div> 
                              </div> 
                        </div>

<!-- content-wrapper ends -->               
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-success fs-14" id="addData" style="min-width: 100px">บันทึก</button>
                     <button type="button" class="btn btn-light fs-14" data-dismiss="modal" style="min-width: 100px">ยกเลิก</button>
                    </div>
                  </div> 
                </div>
                </form>     
              </div>   
             </div>            
          </div> 
          <!-- partial:../../partials/_footer.html -->
          <?php $this->load->view("include/_footer.php") ?> 
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- include footer_script -->
    <?php $this->load->view('include/footer_script.php');?>
    <script type="text/javascript"  src="<?php echo base_url(); ?>assets/dist/js/script_set_driver.js?v=<?php echo rand(0,999999); ?>" ></script>
    <script type="text/javascript"  src="<?php echo base_url(); ?>assets/dist/js/script_set_excel.js?v=<?php echo rand(0,999999); ?>" ></script> 
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.table2excel.min.js"></script>    
  </body>
</html>
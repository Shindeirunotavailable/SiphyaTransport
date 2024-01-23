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
                    
                       <form id="search_ot" method="POST" action="<?php echo base_url();?>Mainapp/license_plate">     
                       <!--  ประเภท -->
                          <div class="row">
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>เลือกประเภทรถ</label>
                                    <input type="hidden" id="hd_ft_veh_type_code" value="<?php echo $ft_veh_type_code ?>">
                                    <select class="js-example-basic-single" id="ft_veh_type_code" name="ft_veh_type_code" style="width: 100%;">
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
                         
                                                 <!--  ชนิด -->
                         
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>เลือกยี่ห้อรถ</label>
                                    <input type="hidden" id="hd_ft_veh_brand_code" value="<?php echo $ft_veh_brand_code ?>">
                                    <select class="js-example-basic-single" id="ft_veh_brand_code" name="ft_veh_brand_code" style="width: 100%;">
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
                                                 <!--  ชนิด -->
                          
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
                                          <button type="submit" class="btn btn-info btn-sm fs-14 p-lr-9" id="searchData"><i class="fa fa-search"></i> ค้นหา</button>
                                          <button type="submit" class="btn btn-success" id="exporttable"><i class="fa fa-download"></i> excel</button>                                         
                                      </div>
                                  </div>
                          </div>
                        </form>
                          <hr>
                    <div class="row">
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                          <div class="form-group" align="right" >
                            <button type="button"  onclick="modal_type(' เพิ่มประเภทรถ','#4e73df','A','')" id="" class='btn btn-primary btn-sm fs-14'><i class="fa fa-plus"></i> เพิ่ม</button>
                          </div>
                      </div>
                    </div>
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                          <div class="table-responsive">
                            <table id="datatable-ot" class="table table-striped" style="width: 100%">
                              <thead class="table-dark">
                                <tr>
                                  <th>ทะเบียนรถ </th>
                                  <th>ประเภทรถ</th>
                                  <th>ยี่ห้อรถ</th>
                                <!--   <th>จำนวนผู้โดยสารต่อเที่ยว </th> -->
                                  <th>น้ำหนักตัวรถ</th>
                                 <!--  <th>น้ำหนักบรรทุก</th> -->
                                  <th>น้ำหนักบรรทุกตามกฏหมายกำหนด</th>
                                  <th>เลขที่ตัวถัง</th>
                                  <th>เลขที่เครื่องยนต์</th>
                                  <th class='txt-center no-sort' width="50px">แก้ไข</th>
                                  <th class='txt-center no-sort' width="50px">ลบ</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                    if($data_all != ""){
                                      foreach ($data_all as $key => $value) {
                                        echo "<tr>";
                                          echo "<td>".$value->VEH_REGIS_NO."</td>"; 
                                          echo "<td>".$value->VEH_TYPE_NAME."</td>"; 
                                          echo "<td>".$value->VEH_BRAND_NAME."</td>"; 
                                          // echo "<td>".$value->PASSENGER_NUMBER."</td>"; 
                                          echo "<td>".$value->VEH_BODY_WEIGHT."</td>"; 
                                          //echo "<td>".$value->VEH_LADING_WEIGHT."</td>";
                                          echo "<td>".$value->VEH_LAW_WEIGHT."</td>";
                                          echo "<td>".$value->VEH_NUMBER_CAR."</td>";
                                          echo "<td>".$value->VEH_NUMBER_ENGINE."</td>";                                                                                    
                                          echo "<td class='txt-center'>".
                                                    "<button type='button' onclick=\"modal_type(' แก้ไขประเภทรถ','#de732f','E','".$value->VEH_REGIS_NO."')\" class='btn btn-warning btn-sm' ><i class='fa fa-pencil-square-o m-tb-2 m-l-4 m-r-1'></i></button>".
                                                  "</td>";
                                          echo "<td class='txt-center'>".
                                                    "<button type='button' onclick=\"modal_type(' ลบประเภทรถ','#e74a3b','D','".$value->VEH_REGIS_NO."')\" class='btn btn-danger btn-sm' ><i class='fa fa-trash-o m-tb-2 m-lr-4'></i></button>".
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
        <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header" id="c_md" style="border-radius: 4px 4px 1px 1px;margin: -1px;">
                    <h4 class="modal-title" id="h_md"></h4>
                   <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                  </div>
                  <div class="modal-body">
                      <input  type="hidden" id="hd_flg" value="">
                      <div class="form-group">
                        <label>หมายเลขทะเบียน<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                        <input type="text" class="form-control fs-14" id="md_veh_regis_no" name="md_veh_regis_no">
                      </div> 

                      <div class="form-group">
                        <label>ประเภทรถ<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                        <select class="js-example-basic-single" id="md_veh_type_code"  style="width: 100%;">
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
                      <div class="form-group">
                        <label>ยี่ห้อรถ<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
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
                      <div class="form-group">
                        <label>น้ำหนักตัวรถ</label>
                        <input type="text" class="form-control fs-14" id="md_veh_body_weight">
                      </div>  
                       <div class="form-group">
                        <label>น้ำหนักบรรทุก</label>
                        <input type="text" class="form-control fs-14" id="md_veh_lading_weight">
                      </div>      
                       <div class="form-group">
                          <label>น้ำหนักบรรทุก-กฎหมายกำหนด</label>
                            <input type="text" class="form-control fs-14" id="md_veh_law_weight">
                      </div>
                       <div class="form-group">
                          <label>เลขที่ตัวถัง</label>
                            <input type="text" class="form-control fs-14" id="md_veh_number_car">
                      </div>
                       <div class="form-group">
                          <label>เลขที่เครื่องยนต์</label>
                            <input type="text" class="form-control fs-14" id="md_veh_number_engine">
                      </div>                      
                  </div> 

                  <div class="modal-footer">
                     <button type="button" class="btn btn-success fs-14" id="addData" style="min-width: 100px">บันทึก</button>
                     <button type="button" class="btn btn-light fs-14" data-dismiss="modal" style="min-width: 100px">ยกเลิก</button>
                  </div>
                  </div>     
                </div>   
            </div>
        
          </div>
          <!-- content-wrapper ends -->

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
    <script type="text/javascript"  src="<?php echo base_url(); ?>assets/dist/js/script_set_license_plate.js?v=<?php echo rand(0,999999); ?>" ></script> 
    <script type="text/javascript"  src="<?php echo base_url(); ?>assets/dist/js/script_set_excel.js?v=<?php echo rand(0,999999); ?>" ></script> 
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.table2excel.min.js"></script>  
  </body>
</html>
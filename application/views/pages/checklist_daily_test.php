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
                    <form id="search_ot" method="POST" action="<?php echo base_url();?>Mainapp/Admin_Reportuser">     
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
                                    <label>รหัสผู้ขับขี่</label>
                                      <input type="text" class="form-control fs-14" id="ft_veh_opr_code" name="ft_veh_opr_code" value="<?php echo $ft_veh_opr_code ?>">
                                  </div>
                              </div> 
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>ชื่อผู้ขับขี่</label>
                                      <input type="text" class="form-control fs-14" id="ft_veh_opr_name" name="ft_veh_opr_name" value="<?php echo $ft_veh_opr_name ?>">
                                  </div>
                              </div>   
                                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                   <div class="form-group"> 
                                    <label>วันที่นำของลง</label> 
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
                </div>
              </div> 
               <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="table-responsive">
                     <table id="datatable-ot" class="table table-striped" style="width: 100%">
                        <thead class="table-dark">
                        <tr>
                      <th class='txt-center no-sort' width="40px">ตรวจสอบ</th>
                      <th class='txt-center no-sort' width="40px">รายละเอียด</th>
                      <th>สถานะเอกสาร</th>
                      <th>เลขที่เอกสาร</th>
                      <th>วันที่เอกสาร</th>                    
                      <th>ทะเบียนรถ</th>
                      <th>ชื่อผู้ขับขี่</th>
                      <th>ต้นทาง</th>
                      <th>ปลายทาง</th>
                      <th>รายการขนส่ง</th>
                      <th>ชื่อผู้ตรวจสอบ</th>
                        </tr>
                      </thead>
                      <tbody>
                              <?php
                                    if($data_all != ""){
                                      foreach ($data_all as $key => $value) {
                                echo "<tr class='".($value->APPROVE_FLG  == "" && $value->DOC_CNF_FLG  == "Y"   ? 'table-info' : ($value->APPROVE_FLG == "Y" ? 
                                  'table-success' : ($value->APPROVE_FLG == "N" ? 'table-danger' : 'table-warning')))."'>";
                                  // ---- start ---//
                                  if($value->DOC_CNF_FLG == "Y" && $value-> APPROVE_FLG=="" ){ 
                                  echo "<td class='txt-center'>".
                                            "<button type='button' onclick=\"modal_admin('ตรวจสอบ','#de732f','F','".$value->DOC_NO."')\" class='btn btn-warning btn-sm'><i class='fa fa-check-square-o'></i></button>".
                                          "</td>";
                                  }
                                  else{
                                   echo "<td></td>"; 
                                  }

                                   if ($value->APPROVE_FLG == "N") {
                                  echo "<td class='txt-center'>".
                                            "<button type='button' onclick=\"modal_admin_approve('ดูรายละเอียด','#82F7FF','D','".$value->DOC_NO."')\" class='btn btn-primary btn-sm' ><i class='fa fa-list'></i></button>".
                                          "</td>";
                                   }
                                    elseif ($value->APPROVE_FLG == "Y") {
                                    echo "<td class='txt-center'>".
                                              "<button type='button' onclick=\"modal_admin_approve('ดูรายละเอียด','#82F7FF','D','".$value->DOC_NO."')\" class='btn btn-primary btn-sm' ><i class='fa fa-list'></i></button>".
                                            "</td>";
                                     }
                                    elseif ($value->DOC_STATUS == "A" && $value ->DOC_CNF_FLG =="") {
                                    echo "<td class='txt-center'>".
                                              "<button type='button' onclick=\"modal_admin_approve('ดูรายละเอียด','#82F7FF','D','".$value->DOC_NO."')\" class='btn btn-primary btn-sm' ><i class='fa fa-list'></i></button>".
                                            "</td>";
                                     }                                     
                                  else{
                                   echo "<td></td>";
                                  }


                                  if($value->DOC_STATUS == "A" && $value ->DOC_CNF_FLG ==""  ){ 
                                    echo "<td> รอยืนยันปลายทาง </td>";
                                  }
                                  elseif ($value -> APPROVE_FLG == "N" ) {
                                    echo "<td> ไม่ผ่านตรวจสอบ </td>";
                                  }
                                  elseif ($value -> APPROVE_FLG == "Y") {
                                    echo "<td> ผ่านการตรวจสอบ </td>";
                                  } 
                                  elseif ($value->DOC_CNF_FLG == "Y" ) {
                                    echo "<td> รอการตรวจสอบ </td>";
                                  }                                                                                                                                                                 
                                  else{
                                   echo "<td></td>";
                                   echo "<td></td>";
                                   echo "<td></td>"; 
                                   echo "<td></td>";
                                  }
                                  //------ end ----//                                     
                                  if($value -> DOC_STATUS == "A" ){
                                      echo "<td>".$value->DOC_NO."</td>";
                                      echo "<td>".$value->DOC_DATE."</td>";
                                      echo "<td>".$value->VEH_REGIS_NO."</td>"; 
                                      echo "<td>".$value->OPR_NAME."</td>";                                          
                                      echo "<td>".$value->VEH_START_NAME."</td>"; 
                                      echo "<td>".$value->VEH_STOP_NAME."</td>"; 
                                      echo "<td>".$value->VEH_TYPE_LIST."</td>";
                                      echo "<td>".$value->APPROVE_OPR."</td>"; 

                                   }
                                   else{
                                     echo "<td></td>";
                                     echo "<td></td>";
                                     echo "<td></td>";
                                     echo "<td></td>";
                                     echo "<td></td>";
                                     echo "<td></td>";
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
                           <th><input type="text" style="background-color: #f09826;border-radius: 5px;border: none;width: 20px;" disabled=""></th>
                              &nbsp;<th>รอยืนยันปลายทาง</th>                          
                          <th><input type="text" style="background-color: #00FFFF  ;border-radius: 5px;border: none;width: 20px;" disabled=""></th>
                              &nbsp;<th>รอการตรวจสอบ</th>                          
                            <th><input type="text" style="background-color: #82e0aa;border-radius: 5px;border: none;width: 20px;" disabled=""></th>
                              &nbsp;<th>ผ่านการตรวจสอบ</th>                           
                           <th><input type="text" style="background-color: #DB3423;border-radius: 5px;border: none;width: 20px;" disabled=""></th>
                              &nbsp;<th>ไม่ผ่านตรวจสอบ</th>
                      </tr>
                        </table>  
                    </div>                      
                  </div>                    
                  </div>
                </div>
              </div> 
            </div>
          </div>

           <!--     หน้าต่างยืนยันการถึงจุดหมายปลายทาง      -->
        <div class="modal fade show" id="modal_admin"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg">
           <div class="modal-content">
            <form id="form_admin" method="POST" enctype="multipart/form-data">
                <div class="modal-header" id="p_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(241,195,15);">
                  <h4 class="modal-title" id="l_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i> ตรวจสอบรายงานพนักงานขับรถ</font></b></h4>
                    <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                </div>
              <div class="modal-body">
                      <input  type="hidden" id="hd_flg_b" name="hd_flg_b" value="">
                      <input  type="hidden" id="doc_no_b"  name="doc_no_b" value="">  
                      <input  type="hidden" id="md_veh_grp_code_b"  name="md_veh_grp_code_b" value="">  
                <h4 class="card-title">รายงานพนักงานขับรถต้นทาง</h4>  
                  <div class="row">
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>เริ่มเดินทางจาก</label>
                                    <input type="text" class="form-control" id="md_veh_start_b" name="md_veh_start_b" disabled>
                                </div>
                            </div>                             
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>เดินทางไปที</label>
                                    <input type="text" class="form-control" id="md_veh_stop_b" name="md_veh_stop_b" disabled>
                                </div>
                            </div> 
                                                                                                                                   
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                            <label>หมายเลขทะเบียน</label>
                              <input type="text" class="form-control" id="md_veh_regis_no_b" name="md_veh_regis_no_b" disabled>
                          </div>
                      </div>
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                            <label>วันที่ขึ้นของ</label>
                              <input type="date" class="form-control" placeholder="dd/mm/yyyy" id="md_veh_date_up_b" name="md_veh_date_up_b" disabled>
                          </div>
                      </div>  
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                            <label>เวลาที่เริ่มออกเดินทาง</label>
                               <input type="time"class="form-control" id="md_veh_time_start_b" name="md_veh_time_start_b" disabled>
                          </div>
                      </div>
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                            <label>เลขไมล์ก่อนออกเดินทาง</label>
                              <input type="text" class="form-control" id="md_veh_km_start_b" name="md_veh_km_start_b" disabled>
                          </div>
                      </div>                                                                      
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>ประเภทขนส่ง</label>
                            <input type="text" class="form-control" id="md_veh_type_list_b" name="md_veh_type_list_b" disabled>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>น้ำหนักของที่บรรทุก (KG.)</label>
                            <input type="text" class="form-control"id="md_veh_weight_b" name="md_veh_weight_b" disabled>
                        </div>
                    </div>
                </div>               
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">    
                  <div class="form-group">
                      <div class="table-responsive">
                        <table id="table-subroom_b" class="table table-striped">
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
                <hr>  
                <h4 class="card-title">รายงานพนักงานขับรถ จากปลายทาง</h4>                    
                <div class="row">

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>เวลาทีถึงจุดหมาย</label>
                              <input type="time"class="form-control" id="md_veh_time_stop_b" name="md_veh_time_stop_b" oninput="mytime()" >
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>ระยะเวลาในการเดินทาง</label>
                              <input type="text"class="form-control" id="md_veh_time_sum_a" name="md_veh_time_sum_a" disabled> 
                              <input type="hidden"class="form-control" id="md_veh_time_sum_b" name="md_veh_time_sum_b">
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>เลขไมล์เมื่อถึง</label>
                            <input type="text" class="form-control" id="md_veh_km_stop_b" name="md_veh_km_stop_b" >
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>ผู้รับของ</label>
                            <input type="text" class="form-control" id="md_veh_bearer_b" name="md_veh_bearer_b" >
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>วันที่ลงของ</label>
                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" id="md_veh_date_drop_b" name="md_veh_date_drop_b" >
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>ปัญหาอุปสรรคที่พบ</label>
                             <input type="text" class="form-control" id="md_veh_note_b" name="md_veh_note_b" >
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>ระบุบหมายเหตุไม่ผ่านตรวจสอบ</label>
                             <input type="text" class="form-control" id="md_explain_b" name="md_explain_b">
                        </div>
                    </div>                        
                  </div>
                  <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="row">
                        <div class="col-12">
                          <div class="table-responsive">
                            <table id="modaltable_file_b" class="table table-bordered" style="width: 100%">
                              <thead class="table-dark">
                                <th width="90%">ชื่อไฟล์</th>
                              </thead>
                              <tbody>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="di_gallery dis-none"></div>  
              </div>                          
              <div class="modal-footer">
                <input type="text" id="save_1" name="save_1" value="">
                <button type="button" class="btn btn-success save_1"  value="Y" ><em class="fa fa-check-circle-o" style='font-size:18px'></em> ตรวจสอบ </button>
                <button type="button" class="btn btn-danger save_1" value="N" >
                  <em class=" fa  fa-times-circle-o" style='font-size:18px'></em> ไม่ผ่านตรวจสอบ </button>  
              </div>
            </form>
          </div>     
        </div>   
        </div>
          <!-- content-wrapper ends -->        


           <!--     หน้าต่างดุรายละเอียดเมื่อกดตรวจสอบ      -->
        <div class="modal fade show" id="modal_admin_approve"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg">
           <div class="modal-content">
            <form id="form_admin" method="POST" enctype="multipart/form-data">
                <div class="modal-header" id="p_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(52,152,219);">
                  <h4 class="modal-title" id="l_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i> รายละเอียดตรวจสอบรายงานพนักงานขับรถ</font></b></h4>
                    <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                </div>
              <div class="modal-body">
                      <input  type="hidden" id="hd_flg_d" name="hd_flg_d" value="">
                      <input  type="hidden" id="doc_no_d"  name="doc_no_d" value="">  
                      <input  type="hidden" id="md_veh_grp_code_d"  name="md_veh_grp_code_d" value="">  
                <h4 class="card-title">รายละเอียดรายงานพนักงานขับรถต้นทาง</h4>  
                  <div class="row">
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>เริ่มเดินทางจาก</label>
                                    <input type="text" class="form-control" id="md_veh_start_d" name="md_veh_start_d" disabled>
                                </div>
                            </div>                             
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>เดินทางไปที</label>
                                      <input type="text" class="form-control" id="md_veh_stop_d" name="md_veh_stop_d" disabled>
                                </div>
                            </div> 
                                                                                                                                   
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                            <label>หมายเลขทะเบียน</label>
                              <input type="text" class="form-control" id="md_veh_regis_no_d" name="md_veh_regis_no_d" disabled>
                          </div>
                      </div>
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                            <label>วันที่ขึ้นของ</label>
                              <input type="date" class="form-control" placeholder="dd/mm/yyyy" id="md_veh_date_up_d" name="md_veh_date_up_d" disabled>
                          </div>
                      </div>  
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                            <label>เวลาที่เริ่มออกเดินทาง</label>
                               <input type="time"class="form-control" id="md_veh_time_start_d" name="md_veh_time_start_d" disabled>
                          </div>
                      </div>
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                            <label>เลขไมล์ก่อนออกเดินทาง</label>
                              <input type="text" class="form-control" id="md_veh_km_start_d" name="md_veh_km_start_d" disabled>
                          </div>
                      </div>                                                                      
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>ประเภทขนส่ง</label>
                            <input type="text" class="form-control" id="md_veh_type_list_d" name="md_veh_type_list_d" disabled>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>น้ำหนักของที่บรรทุก (KG.)</label>
                            <input type="text" class="form-control"id="md_veh_weight_d" name="md_veh_weight_d" disabled>
                        </div>
                    </div>
                
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">    
                      <div class="form-group">
                          <div class="table-responsive">
                            <table id="table-subroom_d" class="table table-striped">
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
                <hr>  
                <h4 class="card-title">รายละเอียดรายงานพนักงานขับรถ จากปลายทาง</h4>                 
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>เวลาทีถึงจุดหมาย</label>
                              <input type="time"class="form-control" id="md_veh_time_stop_d" name="md_veh_time_stop_d" disabled>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>ระยะเวลาในการเดินทาง</label>
                              <input type="text"class="form-control" id="md_veh_time_sum_f" name="md_veh_time_sum_f" disabled>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>เลขไมล์เมื่อถึง</label>
                            <input type="text" class="form-control" id="md_veh_km_stop_d" name="md_veh_km_stop_d" disabled>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>ผู้รับของ</label>
                            <input type="text" class="form-control" id="md_veh_bearer_d" name="md_veh_bearer_d" disabled>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>วันที่ลงของ</label>
                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" id="md_veh_date_drop_d" name="md_veh_date_drop_d" disabled>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>ปัญหาอุปสรรคที่พบ</label>
                             <input type="text" class="form-control" id="md_veh_note_d" name="md_veh_note_d" disabled>
                        </div>
                    </div>
                  
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                          <label>ระบุบหมายเหตุไม่ผ่านตรวจสอบ</label>
                             <input type="text" class="form-control" id="md_explain_d" name="md_explain_d" disabled>
                        </div>
                    </div>                   
                  </div>
                  <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                      <div class="row">
                        <div class="col-12">
                          <div class="table-responsive">
                            <table id="modaltable_file_d" class="table table-bordered" style="width: 100%">
                              <thead class="table-dark">
                                <th width="90%">ชื่อไฟล์</th>
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
    <script type="text/javascript"  src="<?php echo base_url(); ?>assets/dist/js/script_set_formuser_admin.js?v=<?php echo rand(0,999999); ?>" ></script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <?php $this->load->view("include/head_style.php") ?> 
<style>
.d1{
 display:none;
}

</style>
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
                      <h3 class="page-title">  </h3>
                    </div>
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12"> 
                            <form id="search_ot" method="POST" action="">     
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
                                            <input type="date" class="form-control" id="hd_ft_date_frm" name="ft_date_frm" value="">  
                                           </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                           <div class="form-group"> 
                                            <label>วันที่สิ้นสุด</label> 
                                             <input type="date" class="form-control" id="hd_ft_date_to" name="ft_date_to" value="">
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
                                <button ><a href="#modal_add" data-toggle="modal" class="btn btn-primary">
                                  <em class="fa fa-plus" style='font-size:20px'></em> เพิ่ม </a></button>
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
                              <th>ทะเบียน</th>
                              <th>วัน/เดือน/ปี</th>
                              <th>ประเภทรถ</th>
                              <th>ชนิดรถ</th>
                              <th>ผลการตรวจ</th>
                              <th>รายละเอียด</th>
                              <th>ลบ</th>
                              <th class='txt-center no-sort' width="25px">แก้ไข</th>
                              <th class='txt-center no-sort' width="25px">ลบ</th>
                                </tr>
                              </thead>
                            </table> 
                          </div>                    
                        </div>
                      </div>
                    </div> 
                  </div>


              </div>
             <!-- partial -->
          </div>
            <!-- main-panel ends -->
        </div>
          <!-- page-body-wrapper ends -->
      </div>
          <!--    start modal สำหรับกรอกข้อมุล -->
          <div class="modal fade show" id="modal_add"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header" id="a_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(67, 202, 232);">
                    <h4 class="modal-title" id="f_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i> รายงานละเอียดรถ</font></b></h4>
                      <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                  </div>
                    <div class="modal-body">
                      <input  type="hidden" id="hd_flg" name="hd_flg" value="">
                      <input  type="hidden" id="doc_no"  name="doc_no" value=""> 
                      <input  type="hidden" id="doc_date"  name="doc_date" value=""> 

                    <div class="row">
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>ต้นทาง<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                        <select class="js-example-basic-single" style="width:100%" id="md_veh_start" name="md_veh_start">
                                          <option value="">เลือก</option>
                                            <?php
                                                if($data_vts != ""){
                                                  foreach ($data_vts as $key => $value){
                                                    echo "<option value='".$value->PRJ_CODE."'> $value->PRJ_CODE : $value->PRJ_NAME_T</option>";     
                                                  }
                                                } 
                                            ?>
                                        </select>
                                </div>
                            </div> 
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>ปลายทาง<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                        <select class="js-example-basic-single" style="width:100%" id="md_veh_stop" name="md_veh_stop">
                                          <option value="">เลือก</option>
                                            <?php
                                                if($data_vts != ""){
                                                  foreach ($data_vts as $key => $value){
                                                    echo "<option value='".$value->PRJ_CODE."'> $value->PRJ_CODE : $value->PRJ_NAME_T</option>";     
                                                  }
                                                } 
                                            ?>
                                        </select>
                                </div>
                            </div> 
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>เลขไมล์</label>
                                <input type="text"class="form-control" />
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ทะเบียน</label>
                              <select class="js-example-basic-single select2-hidden-accessible" style="width:100%" id="test"> 
                                <option value="0">เลือก</option>
                                <option value="1">ทะเบียน 1</option>
                                <option value="2">ทะเบียน 2</option>
                                <option value="3">ทะเบียน 3</option>
                                                       
                              </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ประเภทรถ</label>
                              <select class="js-example-basic-single select2-hidden-accessible" style="width:100%" disabled>
                                <option value="0">เลือกประเภทรถ</option>
                                <option value="1">1.รถเก๋ง</option>
                                <option value="2">2.รถตู้</option>
                                <option value="3">3.รถกระบะปิกอัพ</option>
                                <option value="4">4.รถกระบะ 4 ล้อโดยสาร</option>
                                <option value="5">5.รถบรรทุก 6 ล้อโดยสาร</option>
                                <option value="6">6.รถบรรทุก 6 ล้อ</option>
                                <option value="7">7.รถบรรทุก 10 ล้อดัมพ์</option>
                                <option value="8">8.กึ่งพ่วง</option>
                                <option value="9">9.ลูกพ่วง</option>                       
                              </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ยี่ห้อรถ</label>
                              <select class="js-example-basic-single select2-hidden-accessible" style="width:100%" disabled>
                                <option>เลือกประเภทรถ</option>
                                <option>1.ยี้ห้อรถ</option>
                                <option>2.ยี้ห้อรถ</option>
                                <option>3.ยี้ห้อรถ</option>
                                <option>4.ยี้ห้อรถ</option>
                                <option>5.ยี้ห้อรถ</option>
                                <option>6.ยี้ห้อรถ</option>
                                <option>7.ยี้ห้อรถ</option>
                                <option>8.ยี้ห้อรถ</option>
                                <option>9.ยี้ห้อรถ</option>                           
                              </select>
                            </div>
                        </div>                                                                                                
                    </div>                     
                  </div>


        <!--  start -->
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
       
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    
                    <form id="example-form" action="#">
<!------------------------------------------------------- 6 ล้อขึ้นไป -------------------------------------------------------------->
            <div class="Text1 Box1 d1"> 
              <h3>ความพร้อมก่อนปฏิบัติงาน</h3>                 
                <section>
                    <table border="0" width="80%" cellpadding="5" align="center" class=" font-weight-semibold">
                        <tr  align="center">
                            <td rowspan="2">ความพร้อมก่อนปฏิบัติงาน</td>
                        </tr>
                        <tr  align="left">
                        <td>ใช่</td>
                        <td>ไม่ใช่</td>   
                        </tr>
                    <tr>
                      <td>1.คุณพักผ่อนเพียงพอหรือไม่ </td>
                        <td align="left">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side1" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="left">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side1" id="membershipRadios1" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>2.สุขภาพโดยรวมวันนี้ ปกติหรือไม่</td>
                        <td align="left">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side2" id="membershipRadios2" value="option3" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="left">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side2" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>3.วันนี้ไม่มีสารเสพติด ไม่มีแอลกอฮอล์ในร่างกายใช่หรือไม่</td>
                        <td align="left">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side3" id="membershipRadios3" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="left">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side3" id="membershipRadios3" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>4.ได้ตรวจเช็ครถประจำวันเรียบร้อยแล้วใช่หรือไม่</td>
                        <td align="left">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side4" id="membershipRadios4" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="left">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side4" id="membershipRadios4" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>5.คุณเข้าใจกฏระเบียบการทำงานของบริษัทเรียบร้อยใช่หรือไม่</td>
                        <td align="left">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side5" id="membershipRadios5" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="left">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side5" id="membershipRadios5" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                    </tr>                                                            
                </table>
                <div class="form-group">
                  <label>หมายเหตุ</label>
                    <textarea class="form-control" rows="4"></textarea>
                </div>                       
               </section>  

                           <h3>ตรวจสอบสภาพตัวรถ</h3>                 
                           <section>
                    <table border="0" width="80%" cellpadding="5" align="center" class=" font-weight-semibold">
                        <tr  align="center">
                            <td rowspan="2">รายการตรวจเช็ค</td>
                            <td colspan="3">สภาพทั่วไป</td>
                        </tr>
                        <tr  align="center">
                          <td>มี</td>
                          <td>ไม่มี</td>   
                          <td>จำนวน</td> 
                        </tr>
                    <tr>
                      <td>1.1 เสารั่วเสียบข้าง</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side1.1" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="center">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side1.1" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                        <td align="center"><input type="text" name="number"> </td>     
                    </tr>
                    <tr>
                      <td>1.2 ทวิสล็อก</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side1.2" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center">
                          <div class="col-sm-5">
                            <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side1.2" id="membershipRadios2" value="option2">
                                </label>
                            </div>
                          </div>
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                      <tr>
                        <td>1.3 เเหล็ก</td>
                          <td align="center">
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="pole_plugged_in_side1.3" id="membershipRadios1" value="option1" > 
                                </label>
                              </div>
                            </div>    
                          </td>
                          <td align="center">
                            <div class="col-sm-5">
                              <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="pole_plugged_in_side1.3" id="membershipRadios2" value="option2">
                                  </label>
                              </div>
                            </div>
                          </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                  </table><br>
                          <div class="form-group">
                            <label>หมายเหตุ</label>
                              <textarea class="form-control" rows="4"></textarea>
                          </div>
                             <br>                           
                        </section>

                       <!--  หัวข้อที่ 2 -->
                           <h3>ตรวจสอบอุปกรณ์ร่วม</h3>                 
                           <section>
                    <table border="0" width="80%" cellpadding="5" align="center" class=" font-weight-semibold">
                        <tr  align="center">
                            <td rowspan="2">รายการตรวจเช็ค</td>
                            <td colspan="3">สภาพทั่วไป</td>
                        </tr>
                        <tr  align="center">
                        <td>มี</td>
                        <td>ไม่มี</td>   
                        <td>จำนวน</td> 
                        </tr>
                    <tr>
                      <td>2.1 ชุดโซ่/สเตร์  </td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side2.1" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="center">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side2.1" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>2.2 ชุดสายรัด</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side2.2" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="center">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side2.2" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                      <td>2.3 ผ้าใบคลุมรถ</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side2.3" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="center">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side2.3" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
    
                      </tr>
                            </table><br>
                          <div class="form-group">
                            <label>หมายเหตุ</label>
                              <textarea class="form-control" rows="4"></textarea>
                          </div>
                             <br>                           
                        </section>
                     <!--      หัวข้อที่ 3 -->
                <h3>ตรวจสอบวัสดุบนรถ</h3>
                  <section>
                    <table border="0" width="80%" cellpadding="5" align="center" class=" font-weight-semibold">
                      <tr  align="center">
                        <td rowspan="2">รายการตรวจเช็ค</td>
                          <td colspan="2">ประเภทวัสดุ//รายละเอียด</td>
                        </tr>
                          <tr align="center">
                              <td></td>
                             <td></td>    
                            </tr>
                    <tr>
                      <td>3.1 แผ่นผนัง PRECAST  </td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="pole_plugged_in_side3.3" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>3.2 เหล็กเส้น CUT LIST</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="pole_plugged_in_side3.3" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>3.3 ปูนถุง  </td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="pole_plugged_in_side" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>3.4 ตู้สำนักงาน 6ม. 12ม.</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="pole_plugged_in_side" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>                      
                    <tr>
                      <td>3.5 ร์ปั๊มทาวเว่อร์เครน/ทาวเว่อ</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="pole_plugged_in_side" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>3.6 ไม้แบบ EX นั่งร้าน แผ่นเหล็ก โครงโต๊ะ</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="pole_plugged_in_side" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>3.7 จักรกลล้อเลื่อน EX โพล์คลิฟต์ อีแต๋น ดัมพ์เปอร์</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="pole_plugged_in_side" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                     <tr>
                      <td>3.8 อื่นๆ</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="pole_plugged_in_side" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>                                                                     
                            </table><br>
                          <div class="form-group">
                            <label>หมายเหตุ</label>
                              <textarea class="form-control" rows="4"></textarea>
                          </div>
                             <br>                           
                        </section>

                    <!--  หัวข้อที่ 4 -->
                           <h3>ตรวจสอบการแพ็คกิ้งของบนรถ</h3>                 
                           <section>
                    <table border="0" width="80%" cellpadding="5" align="center" class=" font-weight-semibold">
                        <tr  align="center">
                            <td rowspan="2">รายการตรวจเช็ค</td>
                            <td colspan="3">สภาพทั่วไป</td>
                        </tr>
                        <tr  align="center">
                        <td></td>
                        <td></td>   
                        <td></td> 
                        </tr>
                    <tr>
                      <td>4.1 การแพ็คกิ้งของ  </td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <h5>แพ็ค</h5>
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side4.1" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="center">
                        <div class="col-sm-7">
                          <div class="form-check">
                              <label class="form-check-label">
                                <h5>ไม่ได้แพ็ค</h5>
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side4.1" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>4.2 การรัดชุดโซ่/สเตอร์</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <h5>รัด</h5>
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side4.2" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="center">
                        <div class="col-sm-7">
                          <div class="form-check">
                              <label class="form-check-label">
                                <h5>ไม่ได้รัด</h5>
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side4.2" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>4.3 การรัดชุดสายรัด</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <h5>รัด</h5>
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side4.3" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="center">
                        <div class="col-sm-7">
                          <div class="form-check">
                              <label class="form-check-label">
                                <h5>ไม่รัด</h5>
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side4.3" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>4.4 การคลุมผ้าใบคลุมรถ</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <h5>คลุม</h5>
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side4.4" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="center">
                        <div class="col-sm-7">
                          <div class="form-check">
                              <label class="form-check-label">
                                <h5>ไม่ได้คลุม</h5>
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side4.4" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>                                            
                            </table><br>
                          <div class="form-group">
                            <label>หมายเหตุ</label>
                              <textarea class="form-control" rows="4"></textarea>
                          </div>
                             <br>                           
                        </section>

                        <h3>การตรวจเช็คน้ำหนัก/ความเร็ว</h3>
                        <section>     
                         <table border="0" width="80%" cellpadding="5" align="center" class=" font-weight-semibold">

                            <tr>
                                <td align=center>รายการตรวจเช็ค</td>
                                <td colspan="2"></td>
                            </tr>

                            <tr>
                                <td>5.น้ำหนักของบรรทุก</td>
                                <td align="center">
                              <input type="text" name="number">
                              </td>    
                                <td>กิโลกรัม</td>
                            </tr>
                        <tr>
                          <td>6.ความเร็วเฉลี่ย</td>
                            <td align="center">
                              <input type="text" name="number">
                              </td>    
                                <td>กิโลเมตร/ชั่วโมง</td> 
                            </tr>
                        </table><br>
                        <div class="form-group">
                            <label class=" font-weight-semibold">หมายเหตุ</label>
                              <textarea class="form-control" rows="4"></textarea>
                          </div>
                        </section>                                             
                      </div>

<!-------------------------------------------------------รถกระบะ 4ล้อบรรทุก -------------------------------------------------------------->
                      <div class="Text1 Box2 d1">
                     <h3>ความพร้อมก่อนออกเดินทาง</h3>                 
                <section>
                    <table border="0" width="80%" cellpadding="5" align="center" class=" font-weight-semibold">
                        <tr  align="center">
                            <td rowspan="2">ความพร้อมก่อนออกเดินทาง</td>
                        </tr>
                        <tr  align="left">
                        <td>ใช่</td>
                        <td>ไม่ใช่</td>   
                        </tr>
                    <tr>
                      <td>1.คุณพักผ่อนเพียงพอหรือไม่ </td>
                        <td align="left">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side1" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="left">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side1" id="membershipRadios1" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>2.สุขภาพโดยรวมวันนี้ ปกติหรือไม่</td>
                        <td align="left">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side2" id="membershipRadios2" value="option3" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="left">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side2" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>3.วันนี้ไม่มีสารเสพติด ไม่มีแอลกอฮอล์ในร่างกายใช่หรือไม่</td>
                        <td align="left">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side3" id="membershipRadios3" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="left">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side3" id="membershipRadios3" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>4.ได้ตรวจเช็ครถประจำวันเรียบร้อยแล้วใช่หรือไม่</td>
                        <td align="left">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side4" id="membershipRadios4" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="left">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side4" id="membershipRadios4" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>5.คุณเข้าใจกฏระเบียบการทำงานของบริษัทเรียบร้อยใช่หรือไม่</td>
                        <td align="left">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side5" id="membershipRadios5" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="left">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side5" id="membershipRadios5" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                    </tr>                                                            
                </table>
                <div class="form-group">
                  <label>หมายเหตุ</label>
                    <textarea class="form-control" rows="4"></textarea>
                </div>                       
               </section>  
                       <!--  หัวข้อที่ 2 -->
                           <h3>ตรวจสอบอุปกรณ์ร่วม</h3>                 
                           <section>
                    <table border="0" width="80%" cellpadding="5" align="center" class=" font-weight-semibold">
                        <tr  align="center">
                            <td rowspan="2">รายการตรวจเช็ค</td>
                            <td colspan="3">สภาพทั่วไป</td>
                        </tr>
                        <tr  align="center">
                        <td>มี</td>
                        <td>ไม่มี</td>   
                        <td>จำนวน</td> 
                        </tr>
                    <tr>
                      <td>2.1 ชุดโซ่/สเตอร์  </td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side2.1" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="center">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side2.1" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>2.2 ชุดสายรัด</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side2.2" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="center">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side2.2" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                      <td>2.3 ผ้าใบคลุมรถ</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side2.3" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="center">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side2.3" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
    
                      </tr>
                            </table><br>
                          <div class="form-group">
                            <label>หมายเหตุ</label>
                              <textarea class="form-control" rows="4"></textarea>
                          </div>
                             <br>                           
                        </section>
                     <!--      หัวข้อที่ 3 -->
                <h3>ตรวจสอบวัสดุบนรถ</h3>
                  <section>
                    <table border="0" width="80%" cellpadding="5" align="center" class=" font-weight-semibold">
                      <tr  align="center">
                        <td rowspan="2">รายการตรวจเช็ค</td>
                          <td colspan="2">ประเภทวัสดุ//รายละเอียด</td>
                        </tr>
                          <tr align="center">
                              <td></td>
                             <td></td>    
                            </tr>
                    <tr>
                      <td>3.1 แผ่นผนัง PRECAST  </td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="pole_plugged_in_side3.3" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>3.2 เหล็กเส้น CUT LIST</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="pole_plugged_in_side3.3" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>3.3 ปูนถุง  </td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="pole_plugged_in_side" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>3.4 ตู้สำนักงาน 6ม. 12ม.</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="pole_plugged_in_side" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>                      
                    <tr>
                      <td>3.5 ทาวเว่อร์เครน/ทาวเว่อร์ปั๊ม</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="pole_plugged_in_side" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>3.6 ไม้แบบ EX นั่งร้าน แผ่นเหล็ก โครงโต๊ะ</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="pole_plugged_in_side" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>3.7 จักรกลล้อเลื่อน EX โพล์คลิฟต์ อีแต๋น ดัมพ์เปอร์</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="pole_plugged_in_side" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                     <tr>
                      <td>3.8 อื่นๆ</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="pole_plugged_in_side" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>                                                                     
                            </table><br>
                          <div class="form-group">
                            <label>หมายเหตุ</label>
                              <textarea class="form-control" rows="4"></textarea>
                          </div>
                             <br>                           
                        </section>
                      <!--  หัวข้อที่ 4 -->
                           <h3>ตรวจสอบการแพ็คกิ้งของบนรถ</h3>                 
                           <section>
                    <table border="0" width="80%" cellpadding="5" align="center" class=" font-weight-semibold">
                        <tr  align="center">
                            <td rowspan="2">รายการตรวจเช็ค</td>
                            <td colspan="3">สภาพทั่วไป</td>
                        </tr>
                        <tr  align="center">
                        <td></td>
                        <td></td>   
                        <td></td> 
                        </tr>
                    <tr>
                      <td>4.1 การแพ็คกิ้งของ  </td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <h5>แพ็ค</h5>
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side4.1" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="center">
                        <div class="col-sm-7">
                          <div class="form-check">
                              <label class="form-check-label">
                                <h5>ไม่ได้แพ็ค</h5>
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side4.1" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>4.2 การรัดชุดโซ่/สเตอร์</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <h5>รัด</h5>
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side4.2" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="center">
                        <div class="col-sm-7">
                          <div class="form-check">
                              <label class="form-check-label">
                                <h5>ไม่ได้รัด</h5>
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side4.2" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>4.3 การรัดชุดสายรัด</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <h5>รัด</h5>
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side4.3" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="center">
                        <div class="col-sm-7">
                          <div class="form-check">
                              <label class="form-check-label">
                                <h5>ไม่รัด</h5>
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side4.3" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>
                    <tr>
                      <td>4.4 การคลุมผ้าใบคลุมรถ</td>
                        <td align="center">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <h5>คลุม</h5>
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side4.4" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="center">
                        <div class="col-sm-7">
                          <div class="form-check">
                              <label class="form-check-label">
                                <h5>ไม่ได้คลุม</h5>
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side4.4" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                        <td align="center"><input type="text" name="number"> </td>     
                      </tr>                                            
                            </table><br>
                          <div class="form-group">
                            <label>หมายเหตุ</label>
                              <textarea class="form-control" rows="4"></textarea>
                          </div>
                             <br>                           
                        </section>


                        <h3>การตรวจเช็คน้ำหนัก/ความเร็ว</h3>
                        <section>     
                         <table border="0" width="80%" cellpadding="5" align="center" class=" font-weight-semibold">

                            <tr>
                                <td align=center>รายการตรวจเช็ค</td>
                                <td colspan="2"></td>
                            </tr>

                            <tr>
                                <td>5.น้ำหนักของบรรทุก</td>
                                <td align="center">
                              <input type="text" name="number">
                              </td>    
                                <td>กิโลกรัม</td>
                            </tr>
                        <tr>
                          <td>6.ความเร็วเฉลี่ย</td>
                            <td align="center">
                              <input type="text" name="number">
                              </td>    
                                <td>กิโลเมตร/ชั่วโมง</td> 
                            </tr>
                        </table><br>
                        <div class="form-group">
                            <label class=" font-weight-semibold">หมายเหตุ</label>
                              <textarea class="form-control" rows="4"></textarea>
                          </div>
                        </section>                                    
                      </div>

<!-------------------------------------------------------  รถเก๋ง รถโดยสาร -------------------------------------------------------------->
                      <div class="Text1 Box3 d1">
              <h3>ความพร้อมก่อนออกเดินทาง</h3>                 
                <section>
                    <table border="0" width="80%" cellpadding="5" align="center" class=" font-weight-semibold">
                        <tr  align="center">
                            <td rowspan="2">ความพร้อมก่อนออกเดินทาง</td>
                        </tr>
                        <tr  align="left">
                        <td>ใช่</td>
                        <td>ไม่ใช่</td>   
                        </tr>
                    <tr>
                      <td>1.คุณพักผ่อนเพียงพอหรือไม่ </td>
                        <td align="left">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side1" id="membershipRadios1" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="left">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side1" id="membershipRadios1" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>2.สุขภาพโดยรวมวันนี้ ปกติหรือไม่</td>
                        <td align="left">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side2" id="membershipRadios2" value="option3" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="left">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side2" id="membershipRadios2" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>3.วันนี้ไม่มีสารเสพติด ไม่มีแอลกอฮอล์ในร่างกายใช่หรือไม่</td>
                        <td align="left">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side3" id="membershipRadios3" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="left">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side3" id="membershipRadios3" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>4.ได้ตรวจเช็ครถประจำวันเรียบร้อยแล้วใช่หรือไม่</td>
                        <td align="left">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side4" id="membershipRadios4" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="left">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side4" id="membershipRadios4" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>5.คุณเข้าใจกฏระเบียบการทำงานของบริษัทเรียบร้อยใช่หรือไม่</td>
                        <td align="left">
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="pole_plugged_in_side5" id="membershipRadios5" value="option1" > 
                              </label>
                            </div>
                          </div>    
                        </td>
                      <td align="left">
                        <div class="col-sm-5">
                          <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="pole_plugged_in_side5" id="membershipRadios5" value="option2">
                              </label>
                          </div>
                        </div>
                      </td>
                    </tr>                                                            
                </table>
                <div class="form-group">
                  <label>หมายเหตุ</label>
                    <textarea class="form-control" rows="4"></textarea>
                </div>                       
               </section>  
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>   
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- include footer_script -->
    <?php $this->load->view('include/footer_script.php');?>
     <script type="text/javascript"  src="<?php echo base_url(); ?>assets/dist/js/script_set_page_checkconditioncar.js?v=<?php echo rand(0,999999); ?>" >
       
     </script>   
  </body>
</html>
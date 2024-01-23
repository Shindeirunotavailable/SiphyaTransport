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
          <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="page-header">
              <h3 class="page-title"> ประวัติการตรวจสภาพรถ </h3>
              </div>
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                  <div class="row">
                  <div class="col-12">
                      <form id="search_ot" method="POST" action="http://203.154.204.33:8883/SpyOT/Mainapp/ot_approve_search" onsubmit="return check_data()">     
                          <div class="row">
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>วันที่เริ่มต้น</label>
                                    <input type="date" class="form-control fs-14" id="ft_date_from" name="ft_date_from" value="">
                                  </div>
                              </div>
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>วันที่สิ้นสุด</label>
                                   <input type="date" class="form-control fs-14" id="ft_date_to" name="ft_date_to" value="">
                                  </div>
                              </div>
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>เวลา</label>
                                   <input type="time" class="form-control fs-14" id="ft_date_to" name="ft_date_to" value="">
                                  </div>
                              </div> 
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>ทะเบียน</label>
                                   <input type="taxt" class="form-control fs-14" id="ft_date_to" name="ft_date_to" value="">
                                  </div>
                              </div> 
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>ยี่ห้อรถ</label>
                                   <input type="taxt" class="form-control fs-14" id="ft_date_to" name="ft_date_to" value="">
                                  </div>
                              </div>
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>ประเภทรถ</label>
                                   <input type="taxt" class="form-control fs-14" id="ft_date_to" name="ft_date_to" value="">
                                  </div>
                              </div>  
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>เลขตัวถัง</label>
                                   <input type="taxt" class="form-control fs-14" id="ft_date_to" name="ft_date_to" value="">
                                  </div>
                              </div> 
                              <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                                  <div class="form-group">
                                    <label>เลขเครื่องยนต์</label>
                                   <input type="taxt" class="form-control fs-14" id="ft_date_to" name="ft_date_to" value="">
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
                              <div class="col-12">
                                <div class="table-responsive">
                                  <table id="order-listing" class="table">
                                    <thead class="table-dark">
                                      <tr>
                                        <th>วันที่</th>
                                        <th>เวลา</th>
                                        <th>ทะเบียน</th>
                                        <th>ประเภทรถ</th>
                                        <th>ยี่ห้อรถ</th>
                                        <th>เลขตัวถัง</th>
                                        <th>เลขเครื่องยนต์</th>
                                        <th>ผลการตรวจ</th>
                                        <th>รายละเอียด<th>
                                        <th>ลบ</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>3/10/2564</td>
                                        <td>08:06:42</td>
                                        <td>ชท-1135 </td> 
                                        <td>รถสิบล้อ </td> 
                                        <td>TOYOTA </td>
                                        <td>1343154AEX154 </td>
                                        <td>ADCAE235A41 </td>  
                                        <td><label class="badge badge-success">ผ่าน</label></td>
                                        <td><a href="#modal_add" data-toggle="modal" class="btn btn-outline-primary" style='font-size:15px'><em class="fa fa-address-card"></em></a></td>
                                        <td>
                                          <a href="#modal-del" data-toggle="modal" class="btn btn-danger" style='font-size:15px' 
                                               onclick="showSwal('warning-message-and-cancel')">
                                          <em class="fa fa-trash"></em>
                                          </a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>3/10/2564</td>
                                        <td>09:05:50</td>
                                        <td>1ฒฎ-9515   </td> 
                                        <td>รถ4 ล้อบรรทุก  </td> 
                                        <td>KIA </td>
                                        <td>ADE021210A </td>
                                        <td>DDFS1FS311 </td>  
                                        <td><label class="badge badge-success">ผ่าน</label></td>
                                        <td><a href="#modal_add" data-toggle="modal" class="btn btn-outline-primary" style='font-size:15px'><em class="fa fa-address-card"></em></a></td>
                                        <td>
                                          <a href="#modal-del" data-toggle="modal" class="btn btn-danger" style='font-size:15px' 
                                               onclick="showSwal('warning-message-and-cancel')">
                                          <em class="fa fa-trash"></em>
                                          </a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>3/10/2564</td>
                                        <td>16:05:26</td>
                                        <td>1นก-6580   </td> 
                                        <td>รถตู้โดยสาร </td> 
                                        <td>TOYOTA </td>
                                        <td>GFASDSAD131 </td>
                                        <td>FASD13154AD </td>  
                                        <td><label class="badge badge-success">ผ่าน</label></td>
                                        <td><a href="#modal_add" data-toggle="modal" class="btn btn-outline-primary" style='font-size:15px'><em class="fa fa-address-card"></em></a></td>
                                        <td>
                                          <a href="#modal-del" data-toggle="modal" class="btn btn-danger" style='font-size:15px' 
                                               onclick="showSwal('warning-message-and-cancel')">
                                          <em class="fa fa-trash"></em>
                                          </a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>3/10/2564</td>
                                        <td>13:06:44</td>
                                        <td>83-6399  </td> 
                                        <td>รถเทรลเลอร์  </td> 
                                        <td>HINO   </td>
                                        <td>DSADSD13146 </td>
                                        <td>5444DASD123 </td>  
                                        <td><label class="badge badge-success">ผ่าน</label></td>
                                        <td><a href="#modal_add" data-toggle="modal" class="btn btn-outline-primary" style='font-size:15px'><em class="fa fa-address-card"></em></a></td>
                                        <td>
                                          <a href="#modal-del" data-toggle="modal" class="btn btn-danger" style='font-size:15px' 
                                               onclick="showSwal('warning-message-and-cancel')">
                                          <em class="fa fa-trash"></em>
                                          </a>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>

                            <!-- Open Modal See -->
                <div class="modal fade show" id="modal_add"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header" id="c_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(67, 202, 232);">
                        <h4 class="modal-title" id="h_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i> ดูข้อมูลการตรวจสภาพรถ</font></b></h4>
                       <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                      </div>
                      <div class="modal-body">
                        <p class="m-b-12"><b>รายงานผลการตรวจสภาพรภ</b></p>
                         <hr class="m-t-1">
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <p class="m-b-10"><b>เครื่องยนต์</b></p>
                                <table border="0" width="73%" cellpadding="10">
                                    <tr>
                                        <td>รายการ</td>
                                        <td colspan="2" aling="center">ผลการตรวจสภาพ</td>
                                    </tr>
                                    <tr>
                                        <td>1.1 ระดับน้ำมันเครื่อง</td>
                                        <td><label class="badge badge-success">ผ่าน</label></td>
                                        <td><label class="badge badge-danger"></label></td>
                                    </tr>
                                    <tr>
                                        <td>1.2 ระดับน้ำหล่อเย็น</td>
                                        <td><label class="badge badge-success">ผ่าน</label></td>
                                        <td><label class="badge badge-danger"></label></td>
                                    </tr>
                                    <tr>
                                        <td>1.3 ความปกติของระบบสตาร์ทเครื่องยนต์</td>
                                        <td><label class="badge badge-success">ผ่าน</label></td>
                                        <td><label class="badge badge-danger"></label></td>
                                    </tr>
                                    <tr>
                                        <td>1.4 ความปกติของระดับเชื้อเพลิง</td>
                                        <td><label class="badge badge-success">ผ่าน</label></td>
                                        <td><label class="badge badge-danger"></label></td>
                                    </tr>
                                </table> 
                              </div> 
                            </div>
                          </div>
                          <hr class="m-t-1">
                          <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                              <div class="form-group">
                                <p class="m-b-10"><b>เบรก/คลัทช์</b></p>
                                    <table border="0" width="85%" cellpadding="10">
                                        <tr>
                                            <td>รายการ</td>
                                            <td colspan="2" aling="center">ผลการตรวจสภาพ</td>
                                        </tr>
                                        <tr>
                                            <td>2.1 ระดับน้ำมันเบรก</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                        <tr>
                                            <td>2.2 ระดับน้ำมันคลัทช์</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                        <tr>
                                            <td>2.3 ระยะดึงคันเบรกมือ</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                        <tr>
                                            <td>2.4 ระดับความดันในถังลม</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                        <tr>
                                            <td>2.5 ปลั๊กสายลมลูกพ่วง</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                    </table>

                              </div>
                            </div>
                          </div>

                          <hr class="m-t-1">
                        <div id="dis-form">
                          <p class="m-b-10"></p>
                          <div class="row">
                            <div class="col-12 ">
                              <div class="form-group">
                                    <p class="m-b-10"><b>ล้อยาง</b></p>
                                    <table border="0" width="70%" cellpadding="10">
                                        <tr>
                                            <td>รายการ</td>
                                            <td colspan="2" aling="center">ผลการตรวจสภาพ</td>
                                        </tr>
                                        <tr>
                                            <td>3.1 แรงดันลมยาง</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                        <tr>
                                            <td>3.2 ตรวจเช็คการแตก เสียหา วัสดุแปลกทีฝังอยู่</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                        <tr>
                                            <td>3.3 ความลึกร่องยาง</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                        <tr>
                                            <td>3.4 ความแน่นของน็อตล้อ</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                    </table> 
                              </div> 
                            </div>
                          </div>
                        </div>

                          <hr class="m-t-1">
                          <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                              <div class="form-group">
                                   <p class="m-b-10"><b>ระบบไฟ</b></p>
                                    <table border="0" width="70%" cellpadding="10">
                                        <tr>
                                            <td>รายการ</td>
                                            <td colspan="2" aling="center">ผลการตรวจสภาพ</td>
                                        </tr>
                                        <tr>
                                            <td>4.1 การทำงานของระบบไฟเตือน และไฟหน้า</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                        <tr>
                                            <td>4.2 การทำงานของไฟให้ทาง</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                        <tr>
                                            <td>4.3 การทำงานของระบบไฟเลี้ยว</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                        <tr>
                                            <td>4.4 การทำงานของระบบไฟเบรก</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                        <tr>
                                            <td>4.5 ปลั๊กสายไฟลูกพ่วง</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                    </table>

                              </div>
                            </div>
                          </div>
                          <hr class="m-t-1">
                          <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                              <div class="form-group">
                                  <p class="m-b-10"><b>ทัศนวิสัย</b></p>
                                    <table border="0" width="64%" cellpadding="10">
                                        <tr>
                                            <td>รายการ</td>
                                            <td colspan="2" aling="center">ผลการตรวจสภาพ</td>
                                        </tr>
                                        <tr>
                                            <td>5.1 ปริมาณน้ำยาล้างกระจก</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                        <tr>
                                            <td>5.2 การเสียหายกระจก หรือ รอยเปื้อน</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                        <tr>
                                            <td>5.3 ลักษณะการฉีดน้ำยาล้างกระจก และสภาพของใบปัดน้ำฝน</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                        <tr>
                                            <td>5.4 ความชัดเจนกระจกมองหลัง</td>
                                            <td><label class="badge badge-success">ผ่าน</label></td>
                                            <td><label class="badge badge-danger"></label></td>
                                        </tr>
                                    </table> 
                              </div>
                            </div>
                          </div>
                    </div>     
                  </div>   
                </div>
              </div>
 
            
                            <!-- Close Modal See -->
                            <!-- Open Modal Approve -->
                <div class="modal fade show" id="modal_app"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header" id="c_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(31, 166, 122);">
                        <h4 class="modal-title" id="h_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i> ติดตามการอนุมัติการลา</font></b></h4>
                       <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                      </div>
                      <div class="modal-body">
                         <table id="tablef" class="table table-hover display nowrap t-font-size" style="width:100%">
                  <thead>
                    <tr style="background-color: #343a40;color: #ffffff; width: 100%">
                      <td align="center">LEVEL</td>
                      <td>ผู้อนุมัติ</td>
                      <td>วันที่-เวลา</td>
                      <td>สถานะ</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="info">
                      <td align="center">1</td>
                      <td>610381 : นางสาว ปนัดดา เซ่งเซียน</td>
                      <td>28/05/2021 09:05:50</td>
                      <td>อนุมัติ</td>
                    </tr>
                    <tr class="info">
                      <td align="center">2</td>
                      <td>000354 : นางสาว สุดารัตน์ สิงห์ศักดา</td>
                      <td>31/05/2021 16:05:26</td>
                      <td>อนุมัติ</td>
                    </tr>
                    <tr class="info">
                      <td align="center">3</td>
                      <td>057250 : นาย สมคิด กรวยทอง</td>
                      <td>01/06/2021 08:06:42</td>
                      <td>อนุมัติ</td>
                    </tr>
                    <tr class="info">
                      <td align="center">4</td>
                      <td>000343 : นาย สุรพงษ์ พรรณบุตร</td>
                      <td>01/06/2021 13:06:44</td>
                      <td>อนุมัติ</td>
                    </tr>
                  </tbody>
                </table>   
                      <div class="modal-footer">
                       <button type="button" class="btn btn-light fs-14 btn-cl" data-dismiss="modal" style="min-width: 100px">ปิด</button>
                      </div>
                    </div>     
                  </div>   
                </div>
                            <!-- Close Modal Approve -->
            </div>
                </div>               
                  </div>
                </div>
              </div>
          </div>   
          </div> <!-- content-wrapper ends -->
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
    <script type="text/javascript"  src="<?php echo base_url(); ?>assets/dist/js/script_home_page.js?v=<?php echo rand(0,999999); ?>" ></script>  
  </body>
</html>
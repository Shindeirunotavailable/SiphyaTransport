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


                  <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3>บันทึกการเดินรถ</h3>
                    <div class="row">
                      <div class="col-3">
                         <div class="form-group"> <input type="date" class="form-control" >  
                         </div>
                          </div>
                            <div class="col-3 ">
                               <input type="date" class="form-control" >
                                </div> 
                                  <div class="form-group"> 
                                     <button type="submit" class="btn btn-info btn-sm fs-14 p-lr-9" id="searchData"><i class="fa fa-search"></i> ค้นหา</button>
                                    
                                          </a>
                                           </div>
                                            </div>
                    <div class="row overflow-auto">
                      <div class="col-12">
                        <table id="order-listing" class="table" cellspacing="0" width="100%">
                          <thead>
                            <tr class="bg-primary text-white ">
                              <th>ทะเบียน</th>
                              <th>ประเภทรถ</th>
                              <th>เริ่มเดินทางจาก</th>
                              <th>เดินทางไปที</th>
                              <th>วัน-เวลา</th>
                              <th>รหัสสินค้า</th>
                              <th>ชื่อสินค้า</th>
                              <th>เพิ่มเติม</th>
                              <th>ลบ</th>
                            </tr>
                          </thead>
                          <tbody class=" font-weight-semibold">
                            <tr>
                              <td >3 กฬ 2738</td>
                              <td>รถบรรทุก</td>
                              <td>โรงงาน 1</td>
                              <td>โรงงาน 2</td>
                              <td> 29 ตุลาคม 2563 13:11</td>
                              <td>TH_0001</td>
                              <td>เหล็ก</td>
                               <td> <a href="#modal_add" data-toggle="modal" class="btn btn-outline-primary" style='font-size:20px'><em class="fa fa-book"></em></a></td>   
                              <td><a href="#modal-del" data-toggle="modal" class="btn btn-danger" style='font-size:20px' 
                                onclick="showSwal('warning-message-and-cancel')"><em class="fa fa-trash"></em></a></td>
                            </tr>
                             <tr>
                              <td >3 กฬ 2738</td>
                              <td>รถบรรทุก</td>
                              <td>โรงงาน 2</td>
                              <td>โรงงาน 3</td>
                              <td> 28 ตุลาคม 2563 10:05</td>
                              <td>TH_0002</td>
                              <td>ปูน</td>
                              <td> <a href="#modal_add" data-toggle="modal" class="btn btn-outline-primary" style='font-size:20px'><em class="fa fa-book"></em></a></td>    
                              <td><a href="#modal-del" data-toggle="modal" class="btn btn-danger" style='font-size:20px' 
                                onclick="showSwal('warning-message-and-cancel')"><em class="fa fa-trash"></em></a></td>
                            </tr>                         
                              <tr>
                              <td >3 กฬ 2738</td>
                              <td>รถบรรทุก</td>
                              <td>โรงงาน 3</td>
                              <td>โรงงาน 4</td>
                              <td> 27 ตุลาคม 2563 11:11</td>
                              <td>TH_0003</td>
                              <td>วัสดุก่อสร้าง</td>
                               <td> <a href="#modal_add" data-toggle="modal" class="btn btn-outline-primary" style='font-size:20px'><em class="fa fa-book"></em></a></td>   
                              <td><a href="#modal-del" data-toggle="modal" class="btn btn-danger" style='font-size:20px' 
                                onclick="showSwal('warning-message-and-cancel')"><em class="fa fa-trash"></em></a></td>
                            </tr>
                            <tr>
                              <td >3 กฬ 2738</td>
                              <td>รถบรรทุก</td>
                              <td>โรงงาน 4</td>
                              <td>โรงงาน 1</td>
                              <td> 26 ตุลาคม 2563 09:04</td>
                              <td>TH_0004</td>
                              <td>ไม้</td>
                               <td> <a href="#modal_add" data-toggle="modal" class="btn btn-outline-primary" style='font-size:20px'><em class="fa fa-book"></em></a></td>   
                              <td><a href="#modal-del" data-toggle="modal" class="btn btn-danger" style='font-size:20px' 
                                onclick="showSwal('warning-message-and-cancel')"><em class="fa fa-trash"></em></a></td>
                            </tr>
                          </tbody>
                        </table>
                     </div>
                     </div>
                   </div>
                   </div>
                 </div>
              </div>
                           
          <div class="modal fade show" id="modal_add"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header" id="c_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(67, 202, 232);">
                        <h4 class="modal-title" id="h_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i> ดูข้อมูลการตรวจสภาพรถ</font></b></h4>
                       <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                      </div>
                      <div class="modal-body">
                         <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                              <div class="form-group">
                                 <p id="p-emp"><b>รหัสพนักงาน</b> : 056260</p>
                              </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                              <div class="form-group">
                                 <p id="p_name"><b>ชื่อ-นามสกุล</b> : นาย ก</p>
                              </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                              <div class="form-group">
                                 <p id="p-pos"><b>ทะเบียน</b> :   3กฬ 2738</p>
                              </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                              <div class="form-group">
                                 <p id="p-div"><b>แบบรถ</b> :   รถบรรทุก 6 ล้อ</p>
                              </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                              <div class="form-group">
                                 <p id="p-div"><b>ประเภทรถ</b> : รถบรรทุก 6 ล้อคอกสูง </p>
                              </div>
                            </div>                            
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                              <div class="form-group">
                                 <p id="p-prj"><b>เบอร์ติดต่อ</b> : 000-0000-000</p>
                              </div>
                            </div>
                         </div>

            <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">รายงานพนักงานขับรถ</h4>
                    <form class="form-sample">
                      <p class="card-description"> คำอธิบายเพิ่มเติม </p>
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" >เริ่มเดินทางจาก</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control"/ value="โรงงาน1" disabled>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" >วันที่</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control"/ value="12-10-2564" disabled>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">เวลาทีเริ่มออกเดินทาง</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" / value="10.00 น." disabled>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">เลขไมล์ก่อนออกเดินทาง</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control"/ value="10000" disabled>
                            </div>
                          </div>
                        </div>              
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">เดินทางไปที</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control"/ value="โรงงาน2" disabled>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">รายการเลขที่ใบส่งของ</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control"/ value="TH0001/เหล็ก" disabled>
                            </div>
                          </div>
                        </div>
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" >อนุมัติในการเดินรถ</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" / value="พี่ส้ม " disabled>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" >ถึงจุดหมายเวลา</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" / value="12.00 น." disabled>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ระยะเวลาในการเดินทาง</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" / value="3 ชม." disabled>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">เลขไมล์เมื่อถึง</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control"/ value="150000" disabled>
                            </div>
                          </div>
                        </div>              
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ผู้รับของ</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control"/ value="เจ้าหน้าที่" disabled>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" >หมายเหตุ</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control"/ value="ไม่มี" disabled>
                            </div>
                          </div>
                        </div>
                      </div>
                       </div>  
                      </div>  
                        <div class="modal-footer">
                           <button type="button" class="btn btn-light fs-14 btn-cl" data-dismiss="modal" style="min-width: 100px">ปิด</button>
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
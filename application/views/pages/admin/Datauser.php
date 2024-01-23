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
            <table frame="below" border="1" width="100%" cellpadding="10" class=" font-weight-semibold"> 
            <h3>รายละเอียดพนักงาน</h3>        
              <tr>
                <td align="center" width="37%"><h4>รายละเอียดของผู้ขับขี่</h4></td>
                   <td></td>
              </tr>
              <tr>
                <td class="mdi mdi-account-circle" height="20%"> ชื่อ-นามสุกล</td>
                  <td>นาย ก</td>
              </tr>
              <tr>
                <td><i class="mdi mdi-cellphone"></i>  เบอร์โทร</td>
                  <td >999-999-9999</td>
              </tr> 
              <tr>
                <td><i class="mdi mdi-new-box"></i> ทะเบียนรถ</td>
                  <td> 3 กฏฬ 2738</td>
              </tr> 
                  </table ><br>
              <table frame="below" border="1" width="100%" cellpadding="10" class=" font-weight-semibold"> 
              <tr >
                  <td align="center" width="37%"><h4>รายงานพนักงานขับรถ</h4></td>
            <td></td>
              </tr>
              <tr >
            <td><i class="mdi mdi-factory"></i> เดินทางจาก</td>
            <td>โรงงาน 1</td>
              </tr>
              <tr>
                  <td><i class="mdi mdi-factory"></i> กำลังไปที</td>
             <td>โรงงาน 2</td>
              </tr> 
                  <tr>
                  <td><i class="mdi mdi-printer-3d"></i> รายละเอียดขนส่ง</td>
             <td> TH 0001/เหล็ก</td>
              </tr> 
             </table>
              <br>
                <div class="form-group" align="right"> 
                  <button class="btn btn-inverse-success btn-fw" onclick="showSwal('success-message')"> อนุมัติ</button>
                      <button type="button" class="btn btn-inverse-danger btn-fw"> ไม่อนุมัติ</button>  </a>
                        </div>
                          <div class="page-header">
                            <h3 class="page-title"></h3>
                              </div>
                    <div class="row overflow-auto">
                      <div class="col-12">
                        <table id="order-listing" class="table" cellspacing="0" width="100%">
                          <thead>
                            <tr class="bg-primary text-white ">
                              <th>ผู้อนุมัติ</th>
                              <th>เดินทางจาก</th>
                              <th>เดินทางไปที</th>
                              <th>วัน-เวลา</th>
                              <th>เลขไมล์ก่อนเดินทาง</th>
                              <th>เลขไมล์เมื่อเดินทางถึง</th>
                              <th>รายการเลขที่ส่งของ</th>
                              
                            </tr>
                          </thead>
                          <tbody class=" font-weight-semibold">
                            <tr>
                              <td>
                                <label class="badge badge-info "> พี่ส้ม </label>
                              </td>
                              <td >โรงงาน 1</td>
                              <td>โรงงาน 2</td>
                              <td> 29 ตุลาคม 2563 13:11</td>
                              <td>12631</td>
                              <td>12900</td>
                              <td>TH 0001/เหล็ก </td>                    
                            </tr>

                            <tr>
                              <td>
                                <label class="badge badge-warning"> พี่ส้ม </label>
                              </td>
                              <td>โรงงาน 2</td>
                              <td>โรงงาน 1</td>
                              <td> 28 ตุลาคม 2563 16:11</td>
                              <td>12333</td>
                              <td>12631</td>
                              <td>TH 0004/ไม้ </td>
                            </tr>
                            
                             <tr>
                              <td>
                                <label class="badge badge-danger"> พี่ส้ม </label>
                              </td>
                              <td>โรงงาน 3</td>
                              <td>โรงงาน 1</td>
                              <td> 27 ตุลาคม 2563 14:10</td>
                              <td>10000</td>
                              <td>12333</td>
                              <td>TH 0003/วัดดุก่อสร้าง </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
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
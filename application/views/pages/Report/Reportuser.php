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
              <h3 class="page-title"> ระบบรายงานพนักงานขับรถ  </h3>
            </div>
                    <div class="row overflow-auto">
                      <div class="col-12">
                        <table id="order-listing" class="table" cellspacing="0" width="100%">
                          <thead>
                            <tr class="bg-primary text-white">
                              <th>ทะเบียนรถ</th>
                              <th>ชื่อผู้ขับขี่</th>
                              <th>เดินทางจาก</th>
                              <th>กำลังเดินทางไปที</th>
                              <th>รายการเลขที่ส่งของ</th>
                              <th>ชื่อผู้อนุมัติ</th>
                              <th>หมายเหตุ</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>3 กฬ 2738</td>
                              <td>นาย ก</td>
                              <td>โรงงาน 1</td>
                              <td>โรงงาน 2</td>
                              <td>เหล็ก</td>
                              <td>
                                <label class="badge badge-danger"> รอการอนุมัติ </label>
                              </td>
                              <td class="text-right">
                                <button class="btn btn-light" > 
                                  <i class="mdi mdi-eye text-primary">
                                  </i><a href="<?php echo base_url()."Mainapp/Datauser";?>">เพิ่มเติม</a></button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>ลบ </button>
                              </td>
                            </tr>
                            <tr>
                              <td>กค 6412</td>
                              <td>นาย ข</td>
                              <td>โรงงาน 2</td>
                              <td>โรงงาน 3</td>
                              <td>ท่อ PVC</td>
                              <td>
                                <label class="badge badge-warning">เจ้าหน้าที่</label>
                              </td>
                              <td class="text-right">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>เพิ่มเติม </button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>ลบ </button>
                              </td>
                            </tr>
                            <tr>
                              <td>มด 5413</td>
                              <td>นาย ค</td>
                              <td>โรงงาน 3</td>
                              <td>โรงงาน 2</td>
                              <td>ไม้แผ่น</td>
                              <td>
                                <label class="badge badge-danger">พี่โต้</label>
                              </td>
                              <td class="text-right">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>เพิ่มเติม </button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>ลบ </button>
                              </td>
                            </tr>
                            <tr>
                              <td>6 กค 5413</td>
                              <td>นาย จ</td>
                              <td>โรงงาน 1</td>
                              <td>โรงงาน 2</td>
                              <td>ปูน</td>
                              <td>
                                <label class="badge badge-info"> พี่ส้ม </label>
                              </td>
                              <td class="text-right">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>เพิ่มเติม </button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>ลบ </button>
                              </td>
                            </tr>
                             <tr>
                              <td>มบ 5673</td>
                              <td>นาย ง</td>
                              <td>โรงงาน 1</td>
                              <td>โรงงาน 2</td>
                              <td>เหล็กเส้น</td>
                              <td>
                                <label class="badge badge-danger">พี่โต้</label>
                              </td>
                              <td class="text-right">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>เพิ่มเติม </button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>ลบ </button>
                              </td>
                            </tr>
                            <tr>
                              <td>อด 1354</td>
                              <td>นาย บ</td>
                              <td>โรงงาน 3</td>
                              <td>โรงงาน 2</td>
                              <td>อุปกรณ์ก่อสร้าง</td>
                              <td>
                                <label class="badge badge-info"> พี่ส้ม </label>
                              </td>
                              <td class="text-right">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>เพิ่มเติม</button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>ลบ </button>
                              </td>
                            </tr>
                            <tr>
                              <td>ฟก 4844</td>
                              <td>นาย ม</td>
                              <td>โรงงาน 3</td>
                              <td>โรงงาน 2</td>
                              <td>ปูน</td>
                              <td>
                                <label class="badge badge-danger">พี่โต้</label>
                              </td>
                              <td class="text-right">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>เพิ่มเติม </button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>ลบ </button>
                              </td>
                            </tr>
                            <tr>
                              <td>ดก 2134</td>
                              <td>นาย ป</td>
                              <td>โรงงาน 3</td>
                              <td>โรงงาน 1</td>
                              <td>อุปกรณ์ก่อสร้าง</td>
                              <td>
                                <label class="badge badge-danger">พี่โต้</label>
                              </td>
                              <td class="text-right">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>เพิ่มเติม </button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>ลบ </button>
                              </td>
                            </tr>
                            <tr>
                              <td>3 กฬ 2738</td>
                              <td>นาย ก</td>
                              <td>โรงงาน 1</td>
                              <td>โรงงาน 2</td>
                              <td>เหล็ก</td>
                              <td>
                                <label class="badge badge-info"> พี่ส้ม </label>
                              </td>
                              <td class="text-right">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>เพิ่มเติม </button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>ลบ </button>
                              </td>
                            </tr>
                            <tr>
                              <td>คด 1346</td>
                              <td>นาย ฟ</td>
                              <td>โรงงาน 2</td>
                              <td>โรงงาน 1</td>
                              <td>ท่อ PVC</td>
                              <td>
                                <label class="badge badge-warning">เจ้าหน้าที่</label>
                              </td>
                              <td class="text-right">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>เพิ่มเติม </button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>ลบ </button>
                              </td>
                            </tr>
                            <tr>
                              <td>อว 5974</td>
                              <td>นาย ต</td>
                              <td>โรงงาน 3</td>
                              <td>โรงงาน 4</td>
                              <td>อุปกรณ์ก่อสร้าง</td>
                              <td>
                                <label class="badge badge-danger">พี่โต้</label>
                              </td>
                              <td class="text-right">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>เพิ่มเติม </button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>ลบ </button>
                              </td>
                            </tr>
                            <tr>
                              <td>ดด 5641</td>
                              <td>นาย ม</td>
                              <td>โรงงาน 1</td>
                              <td>โรงงาน 2</td>
                              <td>ปูน</td>
                              <td>
                                <label class="badge badge-info"> พี่ส้ม </label>
                              </td>
                              <td class="text-right">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>เพิ่มเติม </button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>ลบ </button>
                              </td>
                            </tr>
                             <tr>
                              <td>กอ 9631</td>
                              <td>นาย พ</td>
                              <td>โรงงาน 1</td>
                              <td>โรงงาน 2</td>
                              <td>อุปกรณ์ก่อสร้าง</td>
                              <td>
                                <label class="badge badge-danger">พี่โต้</label>
                              </td>
                              <td class="text-right">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>เพิ่มเติม </button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>ลบ </button>
                              </td>
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
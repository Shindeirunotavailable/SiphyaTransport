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
              <h3 class="page-title"> รายงานผลการตรวจสภาพรภ</h3>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="order-listing" class="table">
                        <thead>
                          <tr>
                            <th>ลำดับ</th>
                            <th>ทะเบียน</th>
                            <th>ประเภทรถ</th>
                            <th>แบบรถ</th>
                            <th>วันที่ทำการตรวจสอบ</th>
                            <th>ชื่อผู้ตรวจเช็ค</th>
                            <th>ผลการตรจเช็ค</th>
                            <th>รายละเอียดเพิ่มเติม</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>ชท-1135</td>
                            <td>เก๋ง</td>
                            <td>CAMRY</td>
                            <td>3/10/2564</td>
                            <td>นาย ก</td>
                            <td>
                              <label class="badge badge-danger">ไม่ผ่าน</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary"><a href="<?php echo base_url()."Mainapp/Datarepaircar";?>">เพิ่มเติม</button>

                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>ญผ-1595</td>
                            <td>เก๋ง</td>
                            <td>CAMRY</td>
                            <td>9/10/2564</td>
                            <td>นาย ข</td>
                            <td>
                              <label class="badge badge-danger">ไม่ผ่าน</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">เพิ่มเติม</button>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>ฒฬ-9551</td>
                            <td>กระบะบรรทุกใหญ่</td>
                            <td>K2500</td>
                            <td>11/10/2564</td>
                            <td>นาย ค</td>
                            <td>
                              <label class="badge badge-success">ผ่าน</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">เพิ่มเติม</button>
                            </td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>2ฒฐ-9915</td>
                            <td>กระบะบรรทุกใหญ่</td>
                            <td>KIA</td>
                            <td>14/10/2564</td>
                            <td>นาย ง</td>
                            <td>
                              <label class="badge badge-success">ผ่าน</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">เพิ่มเติม</button>
                            </td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>ฮร-9515</td>
                            <td>ตู้โดยสาร</td>
                            <td>KDH223R-LEPDYT A1</td>
                            <td>15/10/2564</td>
                            <td>นาย จ</td>
                            <td>
                              <label class="badge badge-success">ผ่าน</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">เพิ่มเติม</button>
                            </td>
                          </tr>
                                                    <tr>
                            <td>6</td>
                            <td>83-5439</td>
                            <td>สิบล้อดั้ม</td>
                            <td>FVZ34PSDFH</td>
                            <td>16/10/2564</td>
                            <td>นาย พ</td>
                            <td>
                              <label class="badge badge-danger">ไม่ผ่าน</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">เพิ่มเติม</button>
                            </td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td>83-9608</td>
                            <td>สิบสองล้อติดเครน</td>
                            <td>FYH77SXDFQ</td>
                            <td>17/10/2564</td>
                            <td>นาย ป</td>
                            <td>
                              <label class="badge badge-danger">ไม่ผ่าน</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">เพิ่มเติม</button>
                            </td>
                          </tr>
                          <tr>
                            <td>8</td>
                            <td>84-2659</td>
                            <td>หัวลากจูง</td>
                            <td>GXZ77NXXFT</td>
                            <td>18/10/2564</td>
                            <td>นาย ว</td>
                            <td>
                              <label class="badge badge-success">ผ่าน</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">เพิ่มเติม</button>
                            </td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>ปบ-4066</td>
                            <td>กระบะบรรทุกใหญ่เล็ก</td>
                            <td>TFR54HPM4AAM</td>
                            <td>21/10/2564</td>
                            <td>นาย ย</td>
                            <td>
                              <label class="badge badge-success">ผ่าน</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">เพิ่มเติม</button>
                            </td>
                          </tr>
                          <tr>
                            <td>10</td>
                            <td>ฬฬก-874</td>
                            <td>จักรยานยนต์</td>
                            <td>WAVE X</td>
                            <td>22/10/2564</td>
                            <td>นาย ม</td>
                            <td>
                              <label class="badge badge-success">ผ่าน</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">เพิ่มเติม</button>
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
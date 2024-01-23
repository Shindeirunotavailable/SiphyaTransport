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
    <div class="container-scroller ">
      <!-- partial:../../partials/_horizontal-navbar.html -->
      <?php $this->load->view("include/_navbar.php") ?> 
      <!-- partial -->
              <div class="main-panel"> 
               <div class="content-wrapper" >
                  <div class="page-section">
                    <div class="container">
                       <div class="form-group"> 
                      <div class="row">.
                      <div class="col-lg-3">
                        <div class="card-service wow fadeInUp">
                          <p align="left">รายการที่ 1</p>
                          <div class="header">
                             <a href="<?php echo base_url()."Mainapp/set_car_repair";?>"> 
                             <i class="mdi mdi-engine-outline text-secondary" style='font-size:70px'>                                 
                             </i>
                            </a>           
                          </div>
                          <div class="body">
                            <h4 class="text-secondary">ตรวจเช็ครถประจำวัน</h4><br>
                            <br><br>
                            <a href="<?php echo base_url()."Mainapp/set_car_repair";?>" class="btn btn-outline-info" style='font-size:15px'>คลิก</a>                  
                          </div>
                        </div>
                      </div>
                       <div class="col-lg-3">
                        <div class="card-service wow fadeInUp">
                           <p align="left">รายการที่ 2</p>
                          <div class="header">
                            <a href="<?php echo base_url()."Mainapp/page_checkconditioncar";?>">
                              <i class="mdi mdi-clipboard-check text-warning" style='font-size:70px' ></i> 
                            </a>
                          </div>
                          <div class="body">
                            <h4 class="text-secondary">ใบตรวจเช็คความปลอดภัย<br>ก่อนออกเดินทาง (UX/UI) </h4><br>
                            <br>
                              <a href="<?php echo base_url()."Mainapp/page_checkconditioncar";?>" class="btn btn-outline-info" style='font-size:15px'>คลิก</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3">
                      <div class="card-service wow fadeInUp">
                        <p align="left">รายการที่ 3</p>
                          <div class="header">
                          <a href="<?php echo base_url()."Mainapp/set_formuser_test";?>">
                            <i class="mdi mdi-account text-info" style='font-size:70px' ></i> 
                          </a>  
                          </div>
                        <div class="body">
                          <h4 class="text-secondary">รายงานพนักงานขับรถ</h4><br>
                            <br><br>
                        <a href="<?php echo base_url()."Mainapp/set_formuser_test";?>" class="btn btn-outline-info" style='font-size:15px'>คลิก</a>
                        </div>
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
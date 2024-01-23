<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <?php $this->load->view("include/head_style.php") ?> 
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
          <div class="row flex-grow">
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
              <div class="auth-form-transparent text-left p-3">
                <div class="brand-logo">
                  <img src="<?php echo base_url(); ?>assets/images/logo.svg" alt="logo">
                </div>
                <form id="sign_in" method="POST" action="<?php echo base_url();?>Mainapp/login_process" onsubmit="return check_login()">
                  <div class="form-group">
                    <label for="exampleInputEmail">Username</label>
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0 input-login">
                          <i class="mdi mdi-account-outline text-primary"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control form-control-lg border-left-0 input-login" name="username" id="username" style="height: 3.175rem;" placeholder="Username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword">Password</label>
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0 input-login">
                          <i class="mdi mdi-lock-outline text-primary"></i>
                        </span>
                      </div>
                      <input type="password" class="form-control form-control-lg border-left-0 input-login" name="password" id="password" style="height: 3.175rem;"  placeholder="Password">
                    </div>
                  </div>
                  <div class="my-3">
                    <div align='center'  class="alert alert-danger dis-none" role="alert" id="alert_login"></div>
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-semibold">LOGIN</button> 
                    <input type="hidden" id="hd_alert" value="<?php echo $this->session->userdata('login_status')?>">
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 login-half-bg d-flex flex-row">
              <p class="text-white font-weight-semibold text-center flex-grow align-self-end">Copyright © 2020 DooCode Software Co.,Ltd. . All rights reserved.</p>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   
    <?php $this->load->view('include/footer_script.php');?>
    <script type="text/javascript"  src="<?php echo base_url(); ?>assets/dist/js/script_login.js" ></script>   
  </body>
</html>
    <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
          <div class="container">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
               <input  type="hidden"   id="te_url" name="te_url"   value="<?php echo base_url() ?>">
              <a class="navbar-brand brand-logo" href="<?php echo base_url()."Mainapp/home_page";?>">
                <img src="<?php echo base_url() ?>assets/images/logo.svg" alt="logo" />
              </a>
              <a class="navbar-brand brand-logo-mini" href="<?php echo base_url()."Mainapp/home_page";?>"><img class="nav-brand-logo-img" src="<?php echo base_url() ?>assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
              <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                       <img src="<?php echo $this->config->item('base_url_portal').'assets/images/avatar/'.($this->session->userdata('emp_info_logged_in')["SESS_AVATAR"] ? $this->session->userdata('emp_info_logged_in')["SESS_AVATAR"] : "none.png") ?>" alt="profile"> 
                      </div>
                    <div class="nav-profile-text" style="margin-left: 7px">
                      <p class="text-black font-weight-semibold m-0"><?php echo $this->session->userdata('emp_info_logged_in')['SESS_OPR_NAME'];?></p>
                      <span class="font-13 online-color">online <i class="mdi mdi-chevron-down"></i></span>
                    </div>
                  </a>
                  <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="<?php echo base_url()."Mainapp/backend";?>">
                      <i class="mdi mdi-logout mr-2 text-danger"></i> Signout </a>
                  </div>
                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                <span class="mdi mdi-menu"></span>
              </button>
            </div>
          </div>
        </nav>
        <nav class="bottom-navbar">
          <div class="container" style="text-align: -webkit-left;">
            <ul class="nav page-navigation">
              <li class="nav-item">
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()."Mainapp/home_page";?>" style="padding-right: 43px !important;">
                  <i class="mdi mdi-home  menu-icon"></i>
                  <span class="menu-title fs-14-ipt">หน้าหลัก</span>
                </a>
              </li>
    
<!--               <li class="nav-item">
                <a href="#" class="nav-link" style="padding-right: 40px !important;">
                  <i class="mdi mdi-check menu-icon"></i>
                  <span class="menu-title fs-14-ipt">Admin</span>
                  <i class="menu-arrow"></i></a>
                <div class="submenu">
                  <ul class="submenu-item">              
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url()."Mainapp/Admin_Reportuser";?>">ตรวจสอบการเดินทาง</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()."#";?>">ยืนยันการตรวจเช็คสภาพรถก่อนออกเดินทาง</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()."#";?>">ยืนยันการตรวจเช็คสภาพรถก่อนประจำวัน</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()."#";?>">ประวัติการเดินทางพนักงานขับรถ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()."#";?>">ประวัติการเช็คสภาพรถก่อนออกเดินทาง</a></li>
                      <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()."Mainapp/Datarepaircar";?>">ประวัติการเช็คสภาพรถประจำวัน</a></li>
                  </ul>
                </div>       -->      
                               
              <li class="nav-item">
                <a href="#" class="nav-link" style="padding-right: 40px !important;">
                  <i class="mdi mdi-check menu-icon"></i>
                  <span class="menu-title fs-14-ipt">ตรวจสอบ / รายงาน</span>
                  <i class="menu-arrow"></i></a>
                <div class="submenu">
                  <ul class="submenu-item">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url()."Mainapp/daily_checklist_admin";?>">ตรวจสอบเช็ครถประจำวัน</a></li>               
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url()."Mainapp/Admin_Reportuser";?>">ตรวจสอบรายงานพนักงานขับรถ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()."#";?>">รายงานตรวจเช็คความปลอดภัยก่อนออกเดินทาง (UX/UI)</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()."Mainapp/Datarepaircar";?>">รายงานตรวจเช็ครถประจำวัน (UX/UI) </a></li> 
                  <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()."Mainapp/page_checkconditioncar";?>">Test</a></li>    -->  
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" style="padding-right: 40px !important;">
                  <i class="mdi mdi-settings menu-icon"></i>
                  <span class="menu-title fs-14-ipt">ตั้งค่าระบบ</span>
                  <i class="menu-arrow"></i></a>
                <div class="submenu">
                  <ul class="submenu-item">
           <!-- การกำหนดสิทธิมองเห็น -->     
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url()."Mainapp/set_cartype";?>">ประเภทรถ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()."Mainapp/set_car";?>">ยี่ห้อรถ</a></li>               
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()."Mainapp/license_plate";?>">ทะเบียนรถ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()."Mainapp/set_driver";?>">พนักงานขับรถ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()."Mainapp/set_broken";?>">รถเสีย</a></li>
                   <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()."Mainapp/set_checklist";?>">หัวข้อเช็คลิสต์ตรวจเช็คความปลอดภัยก่อนออกเดินทาง</a></li> 
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()."Mainapp/set_checklist_items";?>">รายการช็คลิสต์ตรวจเช็คความปลอดภัยก่อนออกเดินทาง</a></li> 
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url()."Mainapp/set_checklist_daily";?>">ตรวจเช็ครถประจำวัน</a></li>
                  </ul>
                </div>
              </li> 
              <?php if($this->session->userdata("FRMTNVEHICLESETTING")) { ?>  
                    <?php } ?>                                

              <!-- คู่มือการใช้งาน -->
               <!-- <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()."Mainapp/manual";?>" style="padding-right: 43px !important;">
                  <i class="mdi mdi-book-open-page-variant  menu-icon"></i>
                  <span class="menu-title fs-14-ipt">คู่มือการใช้งาน</span>
                </a>
              </li> -->
              <li class="nav-item">
              </li>
            </ul>
          </div>
        </nav>
      </div>

    
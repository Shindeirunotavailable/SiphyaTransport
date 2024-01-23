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
                  <div class="col-7"> 
                    <form id="search_ot" method="POST" action="<?php echo base_url();?>Mainapp/set_checklist">     
                       <!--  ประเภท -->
                          <div class="row">
                              <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                  <div class="form-group">
                                    <label>เลือกรายการหัวข้อเช็คลิสต์</label>
                                    <input type="hidden" id="hd_ft_veh_title_seq" value="<?php echo $ft_veh_title_seq ?>">
                                    <select class="js-example-basic-single" id="ft_veh_title_seq" name="ft_veh_title_seq" style="width: 100%;">
                                      <option value="">เลือก</option>
                                        <?php
                                            if($data_all != ""){
                                              foreach ($data_all as $key => $value){
                                                echo "<option value='".$value->VEH_TITLE_SEQ."'>".$value->VEH_TITLE_SEQ." : ".$value->VEH_TITLE_LIST."</option>";     
                                              }
                                            }  
                                        ?>
                                    </select>
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
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                          <div class="form-group" align="right" >
                            <button type="button"  onclick="modal_type(' เพิ่มหัวข้อเช็คลิสต์','#4e73df','A','')" id="" class='btn btn-primary btn-sm fs-14'><i class="fa fa-plus"></i> เพิ่ม</button>
                          </div>
                      </div>
                    </div>                        
                </div>
              </div> 

               <div class="row">
                 <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                    <div class="table-responsive">
                      <table id="datatable-ot" class="table table-striped" style="width: 100%">
                        <thead class="table-dark">
                                <tr>
                                  <th>ลำดับหัวข้อ </th>
                                  <th>ชื่อหัวข้อ</th>
                                  <th class='txt-center no-sort' width="50px">แก้ไข</th>
                                  <th class='txt-center no-sort' width="50px">ลบ</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                    if($data_all != ""){
                                      foreach ($data_all as $key => $value) {
                                        echo "<tr>";
                                          echo "<td>".$value->VEH_TITLE_SEQ."</td>"; 
                                          echo "<td>".$value->VEH_TITLE_LIST."</td>";                                         
                                          echo "<td class='txt-center'>".
                                                    "<button type='button' onclick=\"modal_type(' แก้ไขหัวเช็คลิสต์','#de732f','E','".$value->VEH_TITLE_SEQ."')\" class='btn btn-warning btn-sm' ><i class='fa fa-pencil-square-o m-tb-2 m-l-4 m-r-1'></i></button>".
                                                  "</td>";
                                          echo "<td class='txt-center'>".
                                                    "<button type='button' onclick=\"modal_type(' ลบหัวเช็คลิสต์','#e74a3b','D','".$value->VEH_TITLE_SEQ."')\" class='btn btn-danger btn-sm' ><i class='fa fa-trash-o m-tb-2 m-lr-4'></i></button>".
                                                  "</td>";
                                        echo "</tr>";
                                      } 
                                    }
                                ?> 

                      </tbody>
                    </table>   
                  </div>                    
                  </div>
                </div>
              </div> 

            </div>
          </div>
        <!-- modal -->
        <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl " role="document">
                <div class="modal-content">
                  <form id="form_add" method="POST" action="<?php echo base_url();?>Mainapp/ajax_save_checklist"> 
                    <div class="modal-header" id="c_md" style="border-radius: 4px 4px 1px 1px;margin: -1px;">
                      <h4 class="modal-title" id="h_md"></h4>
                        <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                    </div>
                    <div class="modal-body">
                      <input  type="hidden" id="hd_flg" name="hd_flg" value="">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">                                                          
                              <div class="form-group">
                                <label>ลำดับหัวข้อเช็คลิสต์<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                <input type="text" class="form-control fs-14" id="md_veh_title_seq" name="md_veh_title_seq">
                              </div>
                            </div>
                        </div>    
                      <div class="row">
                          <div class="col-6 col-sm-6 col-md-6 col-lg-6">                        
                            <div class="form-group">
                              <label>ชื่อหัวข้อเช็คลิสต์<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                              <input type="text" class="form-control fs-14" id="md_veh_title_list" name="md_veh_title_list">
                            </div> 
                          </div>
                      </div>      
                      <div class="row">
                          <div class="col-6 col-sm-6 col-md-6 col-lg-6">                          
                            <div class="form-group">
                              <label>ประเภทกลุ่มรถ<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label>
                                <select class="js-example-basic-single" id="md_veh_type_code" style="width: 100%;">
                                  <option value="">เลือก</option>
                                    <?php
                                        if($data_cartype != ""){
                                          foreach ($data_cartype as $key => $value){ 
                                            echo "<option value='".$value->VEH_TYPE_CODE."'>$value->VEH_TYPE_CODE : $value->VEH_TYPE_NAME</option>";  
                                          }
                                        } 
                                    ?>
                                </select>
                              <div class="dropDownSelect1"></div>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-8 col-sm-8 col-md-8 col-lg-8">  
                              <div class="table-responsive">
                                <table class="table table-hover t-font-size" id="modalTable_add">
                                    <thead style="background-color: #343a40;color: #ffffff;">
                                       <tr>
                                          <th style="display:none;"></th>
                                          <th>กลุ่มประเภทรถ</th>
                                          <th >รหัสประเภทรถ</th>
                                          <th>ชื่อประเภทรถ</th>
                                          <th >ลบ</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    </tbody> 
                                </table>
                              </div>
                          </div>
                      </div>
                    </div>
                      <div class="modal-footer">
                         <button type="button" class="btn btn-success fs-14" id="addData" style="min-width: 100px">บันทึก</button>
                         <button type="button" class="btn btn-light fs-14" data-dismiss="modal" style="min-width: 100px">ยกเลิก</button>
                      </div> 
                </form>
                  </div>     
                </div>   
            </div>




          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
        <?php $this->load->view("include/_footer.php") ?> 

    <!-- container-scroller -->
    <!-- include footer_script -->
    <?php $this->load->view('include/footer_script.php');?>
    <script type="text/javascript"  src="<?php echo base_url(); ?>assets/dist/js/script_set_checklist_header.js?v=<?php echo rand(0,999999); ?>" ></script>
  </body>
</html>
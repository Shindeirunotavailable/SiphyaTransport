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
                  <div class="col-12"> 
                    <form id="search_ot" method="POST" action="<?php echo base_url();?>Mainapp/set_checklist_items">     
                       <!--  ประเภท -->
                          <div class="row">
                               <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                  <div class="form-group">
                                    <label>เลือกรายการเช็คลิสต์ย่อย</label>
                                    <input type="hidden" id="hd_ft_veh_title_seq" >
                                    <select class="js-example-basic-single" id="ft_veh_title_seq" name="ft_veh_title_seq" style="width: 100%;">
                                      <option value="">เลือก</option>
                                            <?php
                                                if($data_checklist_header != ""){
                                                  foreach ($data_checklist_header as $key => $value){
                                                    echo "<option value='".$value->VEH_TITLE_SEQ."'> $value->VEH_TITLE_SEQ : $value->VEH_TITLE_LIST</option>";
                                                  }
                                                } 
                                            ?>
                                    </select>
                                  </div>
                              </div>      
                          </div>     
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                      <button type="submit" class="btn btn-info btn-sm fs-14 p-lr-9" id="searchData"><i class="fa fa-search"></i> ค้นหา</button>
                                  </div>
                              </div>
                        </div>
                  </form>
                  <hr>
                    <div class="row">
                      <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                          <div class="form-group" align="right" >
                            <button type="button"  onclick="modal_type(' เพิ่มรายการเช็คลิสต์ย่อย','#4e73df','A','')" id="" class='btn btn-primary btn-sm fs-14'><i class="fa fa-plus"></i> เพิ่ม</button>
                          </div>
                      </div>
                    </div>                        
                </div>
              </div> 
               <div class="row">
                <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <div class="table-responsive">
                      <table id="datatable-ot" class="table table-striped" style="width: 100%">
                        <thead class="table-dark">
                        <tr>
                          <th>ลำดับรายการเช็คลิสต์ย่อย </th>
                          <th>รายการเช็คลิสต์ย่อย</th>
                          <th class='txt-center no-sort' width="25px">แก้ไข</th>
                          <th class='txt-center no-sort' width="25px">ลบ</th>
                        </tr>
                      </thead>
                         <?php
                              if($data_all != ""){
                                foreach ($data_all as $key => $value) {
                                  echo "<tr>";
                                    echo "<td>".$value->VEH_TITLE_SEQ. "." .$value->VEH_TITLE_LIST."</td>"; 
                                    echo "<td>".$value->VEH_LIST_SEQ  . " : " .  $value->VEH_LIST."</td>";                                         
                                    echo "<td class='txt-center'>".
                                              "<button type='button' onclick=\"modal_type(' แก้ไขรายการเช็คลิสต์ย่อย','#FFC000','E','".$value->VEH_TITLE_SEQ."')\" class='btn btn-warning btn-sm' ><i class='fa fa-pencil-square-o m-tb-2 m-l-4 m-r-1'></i></button>".
                                            "</td>";
                                    echo "<td class='txt-center'>".
                                              "<button type='button' onclick=\"modal_type(' ลบรายการเช็คลิสต์ย่อย','#e74a3b','D','".$value->VEH_TITLE_SEQ."')\" class='btn btn-danger btn-sm' ><i class='fa fa-trash-o m-tb-2 m-lr-4'></i></button>".
                                            "</td>";
                                  echo "</tr>";
                                } 
                              }
                          ?> 
                    </table>  
                  </div>                    
                  </div>
                </div>
              </div> 

            </div>
          </div>
        <!-- modal -->
         <div class="modal fade show" id="modal_add"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <form id="form_add" method="POST" enctype="multipart/form-data">
                  <div class="modal-header" id="c_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(67, 202, 232);">
                    <h4 class="modal-title" id="h_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i></font></b></h4>
                      <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                  </div>
                    <div class="modal-body">
                      <input  type="hidden" id="hd_flg" name="hd_flg" value="">
                          <div class="row">
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>เลือกรายการเช็คลิสต์ย่อย<font color="red"><i class="fa fa-asterisk" style="color: red;font-size: 10px"></i></font></label> 
                                  <select class="js-example-basic-single" style="width:100%" id ="md_veh_title_seq" name="md_veh_title_seq" >
                                    <option value="">เลือก</option>
                                            <?php
                                                if($data_checklist_header != ""){
                                                  foreach ($data_checklist_header as $key => $value){
                                                    echo "<option value='".$value->VEH_TITLE_SEQ."'> $value->VEH_TITLE_SEQ : $value->VEH_TITLE_LIST</option>";
                                                  }
                                                } 
                                            ?>
                                </select>
                              </div>
                            </div>                    
                          </div>
                        <div class="form-group" >
                          <button type="button" class="btn btn-sm btn-dark fs-14" id="btn-row"><i class="fa fa-plus"></i>
                          </button><input type="hidden" id="md_num" value="">
                        </div>
                   <div class="col-8 col-sm-8 col-md-8 col-lg-8">    
                      <div class="form-group">
                          <div class="table-responsive">
                            <table id="table-subroom" class="table table-striped">
                              <thead class="table-dark">
                                 <tr>
                                    <th width="35%">ลำดับรายการเช็คลิสต์ย่อย</th>
                                    <th >รายการเช็คลิสต์ย่อย</th>
                                    <th width="30%">ลบ</th>
                                 </tr>
                              </thead>
                              <tbody>
                              </tbody> 
                          </table>
                        </div>
                      </div>
                    </div>  
                      <div  id="alert_save"></div>                       
                      <div class="modal-footer">
                         <button type="submit" class="btn btn-success fs-14" id="addData" style="min-width: 100px">บันทึก</button>
                         <button type="button" class="btn btn-light fs-14" data-dismiss="modal" style="min-width: 100px">ยกเลิก</button>
                      </div> 
                </form>
              </div>
            </div>
        </div>

  
          <!-- partial:../../partials/_footer.html -->
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
    <script type="text/javascript"  src="<?php echo base_url(); ?>assets/dist/js/script_set_checklist.js?v=<?php echo rand(0,999999); ?>" ></script>
  </body>
</html>
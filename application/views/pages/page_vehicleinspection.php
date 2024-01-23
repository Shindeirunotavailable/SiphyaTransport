<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <?php $this->load->view("include/head_style.php") ?>

    <style>
.d1{
 display:none;
}
</style>

  </head>
  <body>
    <div class="container-scroller">
       <?php $this->load->view("include/_navbar.php") ?> 
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3>ใบตรวจเช็ครถประจำวัน</h3>
                    <div class="row">
                      <div class="col-3">
                         <div class="form-group"> 
                          <input type="date" class="form-control" >  
                         </div>
                      </div>
                        <div class="col-3 ">
                            <input type="date" class="form-control" >
                        </div> 
                         <div class="form-group"> 
                          <button type="submit" class="btn btn-info btn-sm fs-14 p-lr-9" id="searchData"><i class="fa fa-search"></i> ค้นหา</button>
                            <a href="<?php echo base_url()."Mainapp/Popup";?>"> 
                              <button >
                                <a href="#modal_approve" data-toggle="modal" class="btn btn-primary"  >
                                 <em class="fa fa-plus" style='font-size:20px'></em> เพิ่ม </a>
                              </button>
                              <button >
                                <a href="#modal_car" data-toggle="modal" class="btn btn-danger"  >
                                 <em class="fa fa-car" style='font-size:20px'></em> เช็ครถไม่ได้ </a>
                              </button>                                  
                            </a>
                         </div>
                    </div>
                
                    <div class="row overflow-auto">
                      <div class="col-11">
                        <table id="order-listing" class="table" cellspacing="15" width="100%">
                          <thead>
                            <tr class="bg-primary text-white">
                              <th>ทะเบียน</th>
                              <th>วัน/เดือน/ปี</th>
                              <th> เวลา </th>
                              <th>ประเภทรถ</th>
                              <th>ชนิดรถ</th>
                              <th>ผลการตรวจ</th>
                              <th>รายละเอียด</th>
                              <th>ลบ</th>
                             
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td> 1ฒอ-2313 </td>
                              <td>15/04/64</td>
                              <td> 8.23 </td>
                              <td>รถ4 ล้อบรรทุก</td>
                              <td>  KIA </td>
                              <td>
                                <label class="badge badge-info">ผ่าน</label>
                              </td>
                             <td>
                              <a href="#modal_add" data-toggle="modal" class="btn btn-outline-primary" style='font-size:24px'>
                                <em class="fa fa-address-card">
                                </em>
                              </a>
                            </td>
                              <td>
                                <a href="#modal-del" data-toggle="modal" class="btn btn-danger" style='font-size:20px' 
                                onclick="showSwal('warning-message-and-cancel')">
                                  <em class="fa fa-trash">
                                  </em>
                                </a>
                              </td>
                            </tr>
                            <tr>
                              <td>82-6320</td>
                              <td>16/04/64</td>
                              <td> 9.22 </td>
                              <td>รถ6 ล้อบรรทุก</td>
                              <td>ISUZU</td>
                              <td>
                                <label class="badge badge-danger">ไม่ผ่าน</label>
                              </td>
                             <td>
                              <a href="#modal_add" data-toggle="modal" class="btn btn-outline-primary" style='font-size:24px'>
                                <em class="fa fa-address-card">
                                </em>
                              </a>
                            </td>
                              <td>
                                <a href="#modal-del" data-toggle="modal" class="btn btn-danger" style='font-size:20px' 
                                onclick="showSwal('warning-message-and-cancel')">
                                  <em class="fa fa-trash">
                                  </em>
                                </a>
                              </td>

                            </tr>
                            <tr>
                              <td>83-7969 </td>
                              <td>17/04/64</td>
                              <td> 8.10 </td>
                              <td>รถกึ่งพ่วง</td>
                              <td>SAMMIRT</td>
                              <td>
                                <label class="badge badge-info">ผ่าน</label>
                              </td>
                             <td>
                              <a href="#modal_add" data-toggle="modal" class="btn btn-outline-primary" style='font-size:24px'>
                                <em class="fa fa-address-card">
                                </em>
                              </a>
                            </td>
                              <td>
                                <a href="#modal-del" data-toggle="modal" class="btn btn-danger" style='font-size:20px' 
                                onclick="showSwal('warning-message-and-cancel')">
                                  <em class="fa fa-trash">
                                  </em>
                                </a>
                              </td>
                            
                            </tr>
                            <tr>
                              <td>บบ-785</td>
                              <td>18/04/64</td>
                              <td> 8.50 </td>
                              <td>รถ4 ล้อบรรทุก </td>
                              <td>ISUZU</td>
                              <td>
                                <label class="badge badge-info">ผ่าน</label>
                              </td>
                             <td>
                              <a href="#modal_add" data-toggle="modal" class="btn btn-outline-primary" style='font-size:24px'>
                                <em class="fa fa-address-card">
                                </em>
                              </a>
                            </td>
                              <td>
                                <a href="#modal-del" data-toggle="modal" class="btn btn-danger" style='font-size:20px' 
                                onclick="showSwal('warning-message-and-cancel')">
                                  <em class="fa fa-trash">
                                  </em>
                                </a>
                              </td>              
                            </tr>
                            <tr>
                              <td>ฮพ-1595 </td>
                              <td>19/04/64</td>
                              <td> 8.00 </td>
                              <td>รถตู้โดยสาร </td>
                              <td>TOYOTA</td>
                              <td>
                                <label class="badge badge-info">ผ่าน</label>
                              </td>
                             <td>
                              <a href="#modal_add" data-toggle="modal" class="btn btn-outline-primary" style='font-size:24px'>
                                <em class="fa fa-address-card">
                                </em>
                              </a>
                            </td>
                              <td>
                                <a href="#modal-del" data-toggle="modal" class="btn btn-danger" style='font-size:20px' 
                                onclick="showSwal('warning-message-and-cancel')">
                                  <em class="fa fa-trash">
                                  </em>
                                </a>
                              </td>                        
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          <!--    start modal สำหรับกรอกข้อมุล -->
          <div class="modal fade show" id="modal_approve"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header" id="a_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(67, 202, 232);">
                    <h4 class="modal-title" id="f_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i> ใบตรวจเช็ครถประจำวัน</font></b></h4>
                      <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                  </div>
                    <div class="modal-body">
                      <h3> ข้อมูลพนักงานตรวจสภาพรถ </h3> <br>
                      <div class="row">
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>เลขไมล์</label>
                                <input type="text"class="form-control" />
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ทะเบียน</label>
                              <select class="js-example-basic-single select2-hidden-accessible" style="width:100%" id="test"> 
                                <option value="0">เลือก</option>
                                <option value="1">ทะเบียน 1</option>
                                <option value="2">ทะเบียน 2</option>
                                <option value="1">ทะเบียน 3</option>
                                <option value="1">ทะเบียน 4</option>
                                <option value="1"> อื่นๆ </option>                         
                              </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ประเภทรถ</label>
                              <select class="js-example-basic-single select2-hidden-accessible" style="width:100%" disabled>> 
                                <option value="0">เลือกประเภทรถ</option>
                                <option value="1">1.รถเก๋ง</option>
                                <option value="2">2.รถตู้</option>
                                <option value="3">3.รถกระบะปิกอัพ</option>
                                <option value="4">4.รถกระบะ 4 ล้อโดยสาร</option>
                                <option value="5">5.รถบรรทุก 6 ล้อโดยสาร</option>
                                <option value="6">6.รถบรรทุก 6 ล้อ</option>
                                <option value="7">7.รถบรรทุก 10 ล้อดัมพ์</option>
                                <option value="8">8.กึ่งพ่วง</option>
                                <option value="9">9.ลูกพ่วง</option>                       
                              </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ยี่ห้อรถ</label>
                              <select class="js-example-basic-single select2-hidden-accessible" style="width:100%" disabled>> 
                                <option>เลือกประเภทรถ</option>
                                <option>1.ยี้ห้อรถ</option>
                                <option>2.ยี้ห้อรถ</option>
                                <option>3.ยี้ห้อรถ</option>
                                <option>4.ยี้ห้อรถ</option>
                                <option>5.ยี้ห้อรถ</option>
                                <option>6.ยี้ห้อรถ</option>
                                <option>7.ยี้ห้อรถ</option>
                                <option>8.ยี้ห้อรถ</option>
                                <option>9.ยี้ห้อรถ</option>                           
                              </select>
                            </div>
                      </div>
                  </div>
                                            <!-- แบบฟอร์มตรวจรถ -->
<div class="Text1 Box1 d1">
          <h3> ตรวจเช็ครถประจำวัน </h3> <br>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                     <form id="example-form" action="#">        
                  <div>
                        <h3>เครื่องยนต์</h3><br>                             
                          <section>
                <table border="0" width="80%" cellpadding="5" align="center">
                        <tr align="center">
                            <td rowspan="2">รายการตรวจเช็ค</td>
                            <td colspan="2">สภาพทั่วไป</td>
                        </tr>
                        <tr  align="center">
                            <td>ปกติ</td>
                            <td>ไม่ปกติ</td>    
                        </tr>
                      <tr>
                          <td>1.1 ระดับน้ำมันเครื่อง</td>
                            <td align="center"><div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 1" id="membershipRadios1" value="option1" >
                                </label>    
                              </div>
                            </td>
                            <td align="center"><div class="col-sm-5">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="membershipRadios 1" id="membershipRadios2" value="option2">
                                  </label>   
                                </div>
                            </td>
                      </tr>
                    </section>
                      <tr>
                          <td>1.2 ระดับน้ำหล่อเย็น</td>
                            <td align="center">
                              <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="membershipRadios 2" id="membershipRadios3" value="option3" > 
                                    </label>
                                </div>
                              </div>
                            </td>
                            <td align="center">
                              <div class="col-sm-5">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="membershipRadios 2" id="membershipRadios4" value="option4">
                                  </label>                            
                                </div>
                              </div>
                            </td>
                       </tr>
                       <tr>
                          <td>1.3 ความปกติของระบบสตาร์ทเครื่องยนต์</td>
                            <td align="center">
                              <div class="col-sm-4">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="membershipRadios 1.3" id="membershipRadios1" value="option5" >
                                  </label>       
                                </div>
                              </div>
                            </td>
                            <td align="center"><div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 1.3" id="membershipRadios2" value="option6">
                                </label>
                              </div>
                            </td>
                      </tr>
                      <tr>
                        <td>1.4 ความปกติของระดับเชื้อเพลิง</td>
                          <td align="center">
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 1.4" id="membershipRadios3" value="option7" > 
                                </label>
                              </div>
                            </div>
                          </td>
                          <td align="center">
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 1.4" id="membershipRadios4" value="option8">
                                </label>    
                              </div>
                            </div>
                          </td>
                      </tr>                      
              </table><br>
                          <div class="form-group">
                            <label>หมายเหตุ</label>
                              <textarea class="form-control" rows="4"></textarea>
                          </div> <br>
                          </section>

                        <h3>เบรก/คลัทช์</h3>
               <section>
                  <table border="0" width="80%" cellpadding="5" align="center">
                            <tr align="center">
                                <td rowspan="2">รายการตรวจเช็ค</td>
                                <td colspan="2">สภาพทั่วไป</td>
                            </tr>
                            <tr align="center">
                                <td>ปกติ</td>
                                <td>ไม่ปกติ</td>    
                            </tr>
                      <tr>
                            <td>2.1 ระดับน้ำมันเบรก</td>
                        <td align="center">
                          <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 2.1" id="membershipRadios1" value="option1" >
                                </label>     
                              </div>
                          </div>
                        </td>
                        <td align="center"><div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 2.1" id="membershipRadios2" value="option2">    
                                </label>  
                              </div>
                        </td>
                      </tr>
                      <tr>
                            <td>2.2 ระดับน้ำมันคลัทช์</td>
                              <td align="center">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="membershipRadios 2.2" id="membershipRadios3" value="option3" > 
                                      </label>
                                    </div>
                                  </div>
                              </td>
                               <td align="center">
                                <div class="col-sm-5">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="membershipRadios 2.2" id="membershipRadios4" value="option4"> 
                                    </label>
                                  </div>
                                </div>
                               </td>
                              </tr>
                      <tr>
                        <td> 2.3 ระยะดึงคันเบรกมือ </td>
                          <td align="center">
                            <div class="col-sm-4">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="membershipRadios 2.3" id="membershipRadios1" value="option5" >
                                  </label>      
                                </div>
                            </div>
                           </td>
                        <td align="center">
                          <div class="col-sm-5">
                            <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 2.3" id="membershipRadios2" value="option6">
                                </label>  
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                          <td>2.4 ระดับความดันในถังลม </td>
                            <td align="center">
                              <div class="col-sm-4">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="membershipRadios 2.4" id="membershipRadios3" value="option7" > 
                                  </label>
                                </div>
                              </div>
                            </td>
                          <td align="center">
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 2.4" id="membershipRadios4" value="option8">
                                </label>     
                              </div>
                            </div>
                          </td>
                      </tr>
                      <tr>   
                        <td>2.5 ปลั๊กสายลมลูกพ่วง</td>
                          <td align="center">
                              <div class="col-sm-4">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="membershipRadios 2.5" id="membershipRadios3" value="option7" > 
                                  </label>
                                </div>
                              </div>
                          </td>
                          <td align="center">
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 2.5" id="membershipRadios4" value="option8"> 
                                </label>    
                              </div>
                            </div>
                           </td>
                        </tr>                     
                    </table><br>
                          <div class="form-group">
                            <label>หมายเหตุ</label>
                              <textarea class="form-control" rows="4"></textarea>
                          </div>                         
              </section>

                        <h3>ล้อยาง</h3>
                          <section>
                            <table border="0" width="80%" cellpadding="5" align="center">
                              <tr  align="center">
                                <td rowspan="2">รายการตรวจเช็ค</td>
                                    <td colspan="2">สภาพทั่วไป</td>
                              </tr>
                        <tr  align="center">
                            <td>ปกติ</td>
                              <td>ไม่ปกติ</td>    
                        </tr>
                      <tr>
                        <td>3.1 แรงดันลมยาง</td>
                          <td align="center"><div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 3.1" id="membershipRadios1" value="option1" > 
                              </div>
                            </div>
                        </td>
                               <td align="center"><div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 3.1" id="membershipRadios2" value="option2">
                                   
                              </div>
                                </div>
                               </td>
                      </tr>
                      <tr>
                          <td>3.2 ตรวจเช็คการแตก เสียหา วัสดุแปลกทีฝังอยู่</td>
                            <td align="center">
                              <div class="col-sm-4">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="membershipRadios 3.2" id="membershipRadios3" value="option3" > 
                                  </label>
                                </div>
                              </div>
                            </td>
                            <td align="center">
                              <div class="col-sm-5">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="membershipRadios 3.2" id="membershipRadios4" value="option4"> 
                                  </label>                     
                                </div>
                              </div>
                            </td>
                      </tr>
                      <tr>
                        <td> 3.3 ความลึกร่องยาง </td>
                          <td align="center">
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 3.3" id="membershipRadios1" value="option5" >
                                </label>       
                              </div>
                            </div>
                          </td>
                        <td align="center">
                          <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 3.3" id="membershipRadios2" value="option6">
                                </label>  
                              </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>3.4 ความแน่นของน็อตล้อ </td>
                          <td align="center">
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 3.4" id="membershipRadios3" value="option7" > 
                                </label>
                              </div>
                            </div>
                          </td>
                          <td align="center">
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 3.4" id="membershipRadios4" value="option8">
                                </label>     
                              </div>
                            </div>
                          </td>
                      </tr>
                    </table> <br>
                          <div class="form-group">
                            <label>หมายเหตุ</label>
                              <textarea class="form-control" rows="4"></textarea>
                           </div><br>                           
                        </section>

                         <h3> ระบบไฟ</h3>
                          <section>
                            <table border="0" width="80%" cellpadding="5" align="center">
                              <tr  align="center">
                                <td rowspan="2">รายการตรวจเช็ค</td>
                                <td colspan="2">สภาพทั่วไป</td>
                              </tr>
                        <tr align="center">
                            <td>ปกติ</td>
                            <td>ไม่ปกติ</td>    
                        </tr>
                      <tr>
                        <td>4.1 การทำงานของระบบไฟเตือน และไฟหน้า</td>
                          <td align="center">
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipradios4.1" id="membershipRadios1" value="option1" >
                                </label>   
                              </div>
                            </div>
                        </td>
                          <td align="center">
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipradios4.1" id="membershipRadios2" value="option2">
                                </label>   
                              </div>
                            </div>
                          </td>
                      </tr>
                      <tr>
                        <td>4.2 การทำงานของไฟให้ทาง</td>
                          <td align="center">
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipradios4.2" id="membershipRadios3" value="option3" > 
                                </label>
                              </div>
                            </div>
                          </td>
                          <td align="center">
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipradios4.2" id="membershipRadios4" value="option4">
                                </label>                      
                              </div>
                            </div>
                          </td>
                      </tr>
                      <tr>
                        <td> 4.3 การทำงานของระบบไฟเลี้ยว </td>
                          <td align="center">
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipradios4.3" id="membershipRadios1" value="option5" >      
                              </div>
                            </div>
                          </td>
                        <td align="center">
                          <div class="col-sm-5">
                            <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipradios4.3" id="membershipRadios2" value="option6">
                                </label>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>4.4 การทำงานของระบบไฟเบรก </td>
                          <td align="center">
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipradios4.4" id="membershipRadios3" value="option7" > 
                                </label>
                              </div>
                            </div>
                          </td>
                          <td align="center">
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipradios4.4" id="membershipRadios4" value="option8"> 
                                </label>  
                              </div>
                            </div>
                          </td>
                      </tr>
                      <tr>
                        <td>4.5 ปลั๊กสายไฟลูกพ่วง </td>
                            <td align="center">
                                <div class="col-sm-4">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="membershipradios4.5" id="membershipRadios3" value="option7" > 
                                  </label>
                                </div>
                              </div>
                            </td>
                            <td align="center">
                              <div class="col-sm-5">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="membershipradios4.5" id="membershipRadios4" value="option8"> 
                                  </label>  
                                </div>
                              </div>
                            </td>
                    </tr>
                        </table><br>
                          <div class="form-group">
                            <label>หมายเหตุ</label>
                              <textarea class="form-control" rows="4"></textarea>
                          </div>
                             <br>                           
                        </section>

                        <h3>ทัศนวิสัย</h3>
                          <section>
                            <table border="0" width="80%" cellpadding="5" align="center">
                              <tr align="center">
                                <td rowspan="2">รายการตรวจเช็ค</td>
                                <td colspan="2">สภาพทั่วไป</td>
                              </tr>
                        <tr align="center">
                            <td>ปกติ</td>
                            <td>ไม่ปกติ</td>    
                        </tr>
                      <tr>
                        <td>5.1 ปริมาณน้ำยาล้างกระจก</td>
                          <td align="center">
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 4.1" id="membershipRadios1" value="option1" > 
                                </label>
                              </div>
                            </div>
                          </td>
                          <td align="center">
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="membershipRadios 5.1" id="membershipRadios2" value="option2">
                                </label>    
                              </div>
                            </div>
                          </td>
                      </tr>
                      <tr>
                          <td>5.2 การเสียหายกระจก หรือ รอยเปื้อน</td>
                            <td align="center">
                              <div class="col-sm-4">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="membershipRadios 5.2" id="membershipRadios3" value="option3" > 
                                    </label>
                                  </div>
                                </div>
                            </td>
                          <td align="center">
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 5.2" id="membershipRadios4" value="option4">
                                </label>                      
                                  </div>
                                </div>
                          </td>
                      </tr>
                      <tr>
                        <td>5.3 ลักษณะการฉีดน้ำยาล้างกระจก และสภาพของใบปัดน้ำฝน</td>
                          <td align="center">
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 5.3" id="membershipRadios1" value="option5" >
                                 </label>       
                              </div>
                            </div>
                          </td>
                            <td align="center">
                              <div class="col-sm-5">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="membershipRadios 5.3" id="membershipRadios2" value="option6">
                                  </label>
                                </div>
                              </div>
                            </td>
                      </tr>
                      <tr>
                        <td>5.4 ความชัดเจนกระจกมองหลัง</td>
                          <td align="center">
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 5.4" id="membershipRadios3" value="option7" > 
                                </label>
                              </div>
                            </div>
                          </td>
                          <td align="center">
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="membershipRadios 5.4" id="membershipRadios4" value="option8">
                                </label>     
                              </div>
                            </div>
                          </td>
                      </tr>
                    </table><br>

                        <div class="form-group">
                          <label>หมายเหตุ</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                             <br>                           
                        </section>
                    </form>
                  </div>
                </div> 
              </div>
              </div>
            </div>
          </div>
                      <!-- จบแบบฟอร์มตรวจรถ -->
                </div>
              </div>
            </div>
          </div> 
            <!-- End modal สำหรับกรอกข้อมูล -->

        <!-- Start modal สำหรับรายงานผลการตรวจสภาพ -->
      <div class="modal fade show" id="modal_add"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header" id="c_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(31, 166, 122);">
                    <h4 class="modal-title" id="h_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i> ผลการตรวจสภาพรถ</font></b></h4>
                      <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                </div>
                <div class="modal-body">
                       <!--  body modal -->
                        <p class="m-b-12"><b>รายงานผลการตรวจสภาพรภ</b></p>
                         <hr class="m-t-1">
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <p class="m-b-10"><b>เครื่องยนต์</b></p>
                                <table border="1" width="73%" cellpadding="10">
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
                                    <table border="1" width="85%" cellpadding="10">
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

                       <!--  end modal -->

                    <div class="modal-footer">
                       <button type="button" class="btn btn-light fs-14 btn-cl" data-dismiss="modal" style="min-width: 100px">ปิด</button>
                    </div>
                </div>     
              </div>   
            </div>
          </div>
            <!-- End Modal สำหรับรายงานผลการตรวจสภาพ -->

          <!-- content-wrapper ends -->

        <!-- Start modal สำหรับรายงานผลการตรวจสภาพ -->
      <div class="modal fade show" id="modal_car"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header" id="c_md" style="border-radius: 4px 4px 1px 1px; margin: -1px; background-color: rgb(166,31,75);">
                    <h4 class="modal-title" id="h_md"><b><font color="#ffffff"><i class="fa fa-th-list"></i> รถไม่สามารถใช้งานได้</font></b></h4>
                      <a href="" class="pull-right" data-dismiss="modal"><font color="#ffffff" size="4"><em class="fa fa-lg fa-close"></em></font></a>
                </div>
                <div class="modal-body">
                      <div class="row">
                            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                  <label>หมายเลขทะเบียน</label>
                                        <select class="js-example-basic-single" id="md_veh_regis_no"  style="width: 100%;" name="md_veh_regis_no">
                                          <option value="">เลือก</option>
                                            <?php
                                                if($data_regis != ""){
                                                  foreach ($data_regis as $key => $value){
                                                    echo "<option value='".$value->VEH_REGIS_NO."'>".$value->VEH_REGIS_NO."</option>";     
                                                  }
                                                } 
                                            ?>
                                        </select>
                                </div>
                            </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ประเภทรถ</label>
                              <select class="js-example-basic-single select2-hidden-accessible" style="width:100%" disabled>
                                <option value="0">เลือกประเภทรถ</option>
                                <option value="1">1.รถเก๋ง</option>
                                <option value="2">2.รถตู้</option>
                                <option value="3">3.รถกระบะปิกอัพ</option>
                                <option value="4">4.รถกระบะ 4 ล้อโดยสาร</option>
                                <option value="5">5.รถบรรทุก 6 ล้อโดยสาร</option>
                                <option value="6">6.รถบรรทุก 6 ล้อ</option>
                                <option value="7">7.รถบรรทุก 10 ล้อดัมพ์</option>
                                <option value="8">8.กึ่งพ่วง</option>
                                <option value="9">9.ลูกพ่วง</option>                       
                              </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                              <label>ยี่ห้อรถ</label>
                              <select class="js-example-basic-single select2-hidden-accessible" style="width:100%" disabled>
                                <option>เลือกประเภทรถ</option>
                                <option>1.ยี้ห้อรถ</option>
                                <option>2.ยี้ห้อรถ</option>
                                <option>3.ยี้ห้อรถ</option>
                                <option>4.ยี้ห้อรถ</option>
                                <option>5.ยี้ห้อรถ</option>
                                <option>6.ยี้ห้อรถ</option>
                                <option>7.ยี้ห้อรถ</option>
                                <option>8.ยี้ห้อรถ</option>
                                <option>9.ยี้ห้อรถ</option>                           
                              </select>
                            </div>
                      </div>
                      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                          <div class="form-group">
                            <label>รายการรถเสีย</label>
                                  <select class="js-example-basic-single" id="md_veh_broken_no"  style="width: 100%;" name="md_veh_broken_no">
                                    <option value="">เลือก</option>
                                      <?php
                                          if($data_broken != ""){
                                            foreach ($data_broken as $key => $value){
                                              echo "<option value='".$value->VEH_BROKEN_NO."'>".$value->VEH_BROKEN_LIST."</option>";     
                                            }
                                          } 
                                      ?>
                                  </select>
                          </div>
                      </div>
                  </div>














                    <div class="modal-footer">
                       <button type="button" class="btn btn-light fs-14 btn-cl" data-dismiss="modal" style="min-width: 100px">ปิด</button>
                    </div>
                </div>     
              </div>   
            </div>
          </div>
            <!-- End Modal สำหรับรายงานผลการตรวจสภาพ -->
          <!-- content-wrapper ends -->
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
    <script type="text/javascript"  src="<?php echo base_url(); ?>assets/dist/js/script_set_modal.js?v=<?php echo rand(0,999999); ?>" ></script>  
    <script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>





    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../../assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="../../../assets/vendors/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="../../../assets/vendors/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="../../../assets/vendors/jquery-asColorPicker/jquery-asColorPicker.min.js"></script>
    <script src="../../../assets/vendors/x-editable/bootstrap-editable.min.js"></script>
    <script src="../../../assets/vendors/moment/moment.min.js"></script>
    <script src="../../../assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js"></script>
    <script src="../../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../../../assets/vendors/dropify/dropify.min.js"></script>
    <script src="../../../assets/vendors/jquery-file-upload/jquery.uploadfile.min.js"></script>
    <script src="../../../assets/vendors/jquery-tags-input/jquery.tagsinput.min.js"></script>
    <script src="../../../assets/vendors/dropzone/dropzone.js"></script>
    <script src="../../../assets/vendors/jquery.repeater/jquery.repeater.min.js"></script>
    <script src="../../../assets/vendors/inputmask/jquery.inputmask.bundle.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../../assets/js/off-canvas.js"></script>
    <script src="../../../assets/js/hoverable-collapse.js"></script>
    <script src="../../../assets/js/misc.js"></script>
    <script src="../../../assets/js/settings.js"></script>
    <script src="../../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../../assets/js/formpickers.js"></script>
    <script src="../../../assets/js/form-addons.js"></script>
    <script src="../../../assets/js/x-editable.js"></script>
    <script src="../../../assets/js/dropify.js"></script>
    <script src="../../../assets/js/dropzone.js"></script>
    <script src="../../../assets/js/jquery-file-upload.js"></script>
    <script src="../../../assets/js/formpickers.js"></script>
    <script src="../../../assets/js/form-repeater.js"></script>
    <script src="../../../assets/js/inputmask.js"></script>
  </body>
</html>
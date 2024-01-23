 
let url              = $('#te_url').val(); 
//open modal add
   function modal_type(head,c,flg,doc_no){ 
     $('#hd_flg').val(flg);

      $("#modal_tabel > tbody").empty(); 
      $("#modal_tabel_b > tbody").empty();
      $('input[name=modal_tabel]').attr('checked',false);
     //หัว modal
      $("#c_md").css('background-color' , c);
      $("#h_md").html('<b><font color="#ffffff">'+head+'</font></b>');
      //------------- ----------------------------------------
    $('#doc_no').val(doc_no);
      //การกำหนดตารางให้สามารถกรอกได้หรือไม่ได้
          if(flg == "A"){
            $("#md_veh_km").prop("disabled", false);
            $("#md_veh_time").prop("disabled", true);
            $("#md_veh_regis_no").prop("disabled", false);
            $("#md_veh_type_code").prop("disabled", true);
            $("#md_veh_brand_code").prop("disabled", true);
            $("#md_veh_date_check").prop("disabled", false); 
          }
          else if(flg == "E"){
           $("#md_veh_km").prop("disabled", false);
            $("#md_veh_time").prop("disabled", true);
            $("#md_veh_regis_no").prop("disabled", false);
            $("#md_veh_type_code").prop("disabled", true);
            $("#md_veh_brand_code").prop("disabled", true);
            $("#md_veh_date_check").prop("disabled", false); 
          }      
          else if(flg == "F"){
            $("#md_veh_km_b").prop("disabled", true);
            $("#md_veh_time_b").prop("disabled", true);
            $("#md_veh_regis_no_b").prop("disabled", true);
            $("#md_veh_type_code_b").prop("disabled", true);
            $("#md_veh_brand_code_b").prop("disabled", true);
            $("#md_veh_date_check_b").prop("disabled", true);   
             $("#md_veh_note_b").prop("disabled", true); 
          }                              
          else{
            $("#md_veh_km").prop("disabled", true);
            $("#md_veh_time").prop("disabled", true);
            $("#md_veh_regis_no").prop("disabled", true);
            $("#md_veh_type_code").prop("disabled", true);
            $("#md_veh_brand_code").prop("disabled", true);
            $("#md_veh_date_check").prop("disabled", true);    
          }
          if (flg == "A" ) {
            list_add_tb(doc_no,flg);
            $("#modal_add").modal("show");
          }
          else if (flg == "E"){
            list_edit_tb(doc_no,flg);
            $("#modal_add").modal("show");
          }
          else if (flg == "F"){
            list_details_tb(doc_no,flg);
            $("#modal_details").modal("show");

          }          
          else {
            list_del_tb(doc_no,flg);
            $("#modal_add").modal("show");
          }
          
  }  



 

   var ele = document.getElementsByName("modal_tabel");
   for(var i=0;i<ele.length;i++)
      ele[i].checked = false;



  function list_add_tb(doc_no,flg){ 
      var url  = $('#te_url').val(); 
          $.ajax({ 
                url : url+"Mainapp/ajax_list_data_car_repair", 
                data: { doc_no }, 
                type: "POST",
                dataType: "json",
                success:function(data) {  
               $('#num_radio').val(data.length);
                    if(data){
                        let veh_title_seq = "";
                        let start = 1 ;
                        let headbutton = 0 ;
                        let bodybutton = 0 ;
                        $.each(data, function(key, value){ 
                          if(veh_title_seq != value.VEH_TITLE_SEQ){

                              if(start == 1){
                                  var head    =  $("<tr class='table-light'></tr>");
                                  $("<th>"+value.VEH_TITLE_SEQ+" "+value.VEH_TITLE_LIST+"</th>").appendTo(head);
                                  $("<td align='center'><h5>ปกติ</h5></td>").appendTo(head);
                                  $("<td align='center'><h5>ผิดปกติ</h5></td>").appendTo(head);
                                  $("<td align='center'><h5>ไม่ต้องตรวจ</h5></td>").appendTo(head);
                                  $("<td align='center'><h5>หมายเหตุ</h5></td> ").appendTo(head);
                                   $('#modal_tabel > tbody:last').append(head); 
                                   start++ ;
                              }
                                else{
                                  var head    =  $("<tr class='table-light'></tr>");
                                  $("<th colspan='5'><hr> "+value.VEH_TITLE_SEQ+" "+value.VEH_TITLE_LIST+"</th>").appendTo(head);
                                   $('#modal_tabel > tbody:last').append(head);                                   
                                }
                                headbutton ++;
                          }
                              var body    =  $("<tr class='table-light' ></tr>");
                                  $("<td width='30%' > <input type='hidden' name='arr_prd["+headbutton+"]["+bodybutton+"][]' value='"+value.VEH_TITLE_SEQ+"'>"+
                                                      "<input type='hidden' name='arr_prd["+headbutton+"]["+bodybutton+"][]' value='"+value.VEH_LIST_SEQ+"'> "+value.VEH_LIST_SEQ+" "+value.VEH_LIST+" </td>").appendTo(body); // ชื่อรายการเช็คลิสต์
                                
                                  $("<input type='hidden' name='arr_prd["+headbutton+"]["+bodybutton+"][]' value='"+value.VEH_LIST+"'>").appendTo(body); // รายการเช็คลิสต์
                                  $("<td width='10%' align='center'> <input type='radio' id='' name='arr_prd["+headbutton+"]["+bodybutton+"][]' value='Y'></td>").appendTo(body); // ผ่าน
                                  $("<td width='10%' align='center'> <input type='radio' id='' name='arr_prd["+headbutton+"]["+bodybutton+"][]' value='N'></td>").appendTo(body); // ไมผ่าน
                                  $("<td width='10%' align='center'> <input type='radio' id='' name='arr_prd["+headbutton+"]["+bodybutton+"][]' value='O'></td>").appendTo(body); // ไม่ต้องตรวจ
                                  $("<td align='center'> <input type='text' class='form-control note' name='arr_prd["+headbutton+"]["+bodybutton+"][]'  style='width:300px'> </td> ").appendTo(body); // หมายเหตุ
                                   //$("<td align='center'> <input type='text' class='form-control note' name='arr_prd["+headbutton+"]["+bodybutton+"][]'  style='width:300px'> </td> ").appendTo(body); // หมายเหตุ
                                  
                                 $('#modal_tabel > tbody:last').append(body); 
                                 veh_title_seq = value.VEH_TITLE_SEQ;
                                 bodybutton ++;
                        }); 
                    }                
                },
                error:function(data) { 
                    alert("เกิดข้อผิดพลาด ลองใหม่อีกครั้ง");
                }
          });  
  }  


//------------------------------------------------------------ แก้ไข ----------------------------------------------------------------//

 function list_edit_tb(doc_no,flg){ 
      var url  = $('#te_url').val(); 
          $.ajax({ 
                url : url+"Mainapp/ajax_list_data_edit_daily_checklist", 
                data: { doc_no }, 
                type: "POST",
                dataType: "json",
                success:function(data) {  
                    if (data.arr_header) {
                         $.each(data.arr_header, function(key, value){  
                             $("#md_veh_km").val(value.VEH_KM);
                             $("#md_veh_time").val(value.VEH_TIME);
                             $('#md_veh_regis_no').val(value.VEH_REGIS_NO).trigger('change');   
                             $('#md_veh_type_code').val(value.VEH_TYPE_CAR).trigger('change');   
                             $('#md_veh_brand_code').val(value.VEH_BRAND).trigger('change');   
                             $('#md_veh_date_check').val(value.DOC_DATE);       
                        });                      
                    }

                    if(data.arr_list){
                        let veh_title_seq = "";
                        let start = 1 ;
                        let headbutton = 0 ;
                        let bodybutton = 0 ;
                        $.each(data.arr_list, function(key, value){ 
                          if(veh_title_seq != value.VEH_TITLE_SEQ){
                              if(start == 1){
                                  var head    =  $("<tr class='table-light'></tr>"); 
                                  $("<td>"+value.VEH_TITLE_SEQ+" "+value.VEH_TITLE_LIST+"</td>").appendTo(head);
                                  $("<td align='center'><h5>ปกติ</h5></td>").appendTo(head);
                                  $("<td align='center'><h5>ผิดปกติ</h5></td>").appendTo(head);
                                  $("<td align='center'><h5>ไม่ต้องตรวจ</h5></td>").appendTo(head);
                                  $("<td align='center'><h5>หมายเหตุ</h5></td> ").appendTo(head);
                                   $('#modal_tabel > tbody:last').append(head); 
                                   start++ ;
                              }
                                else{
                                  var head    =  $("<tr class='table-light'></tr>");
                                  $("<td colspan='5'><hr> "+value.VEH_TITLE_SEQ+" "+value.VEH_TITLE_LIST+"</td>").appendTo(head);
                                   $('#modal_tabel > tbody:last').append(head);                                   
                                }
                                headbutton ++;
                          }
                              var body    =  $("<tr class='table-light' ></tr>");
                                  $("<td width='30%' > <input type='hidden'  name='arr_prd["+headbutton+"]["+bodybutton+"][]' value='"+value.VEH_TITLE_SEQ+"'>"+
                                                      "<input type='hidden'  name='arr_prd["+headbutton+"]["+bodybutton+"][]' value='"+value.VEH_LIST_SEQ+"'> "+value.VEH_LIST_SEQ+" "+value.VEH_LIST_BODY+" </td>").appendTo(body); // ชื่อรายการเช็คลิสต์
                                  $("<td width='10%' align='center'> <input type='radio' id='' name='arr_prd["+headbutton+"]["+bodybutton+"][]' value='Y' "+(value.VEH_CHK_RESULT == "Y" ? 'checked' : '')+" "+(flg == '' ? '' : '')+"> </td>").appendTo(body); // ผ่าน
                                  $("<td width='10%' align='center'> <input type='radio' id='' name='arr_prd["+headbutton+"]["+bodybutton+"][]' value='N' "+(value.VEH_CHK_RESULT == "N" ? 'checked' : '')+" "+(flg == '' ? '' : '')+"> </td>").appendTo(body); // ไมผ่าน
                                  $("<td width='10%' align='center'> <input type='radio' id='' name='arr_prd["+headbutton+"]["+bodybutton+"][]' value='O' "+(value.VEH_CHK_RESULT == "O" ? 'checked' : '')+" "+(flg == '' ? '' : '')+"> </td>").appendTo(body); // ไม่ต้องตรวจ
                                  $("<td align='center'> <input type='text' class='form-control' name='arr_prd["+headbutton+"]["+bodybutton+"][]' value='"+(value.VEH_NOTE ==null ? '' : value.VEH_NOTE)+"' "+(flg == '' ? '' : '')+" style='width:300px'> </td> ").appendTo(body); // หมายเหตุ

                                 $('#modal_tabel > tbody:last').append(body); 
                                 veh_title_seq = value.VEH_TITLE_SEQ;
                                 bodybutton ++;

                        }); 
                    }
                
                },

                error:function(data) { 
                    alert("เกิดข้อผิดพลาด ลองใหม่อีกครั้ง");
                }
          });  
  }  
//---------------------------------------------------------------ลบ ----------------------------------------------------------------//
 function list_del_tb(doc_no,flg){ 
      var url  = $('#te_url').val(); 
          $.ajax({ 
                url : url+"Mainapp/ajax_list_data_daily_checklist", 
                data: { doc_no }, 
                type: "POST",
                dataType: "json",
                success:function(data) { 
                    if (data.arr_header) {
                         $.each(data.arr_header, function(key, value){  
                             $("#md_veh_km").val(value.VEH_KM);
                             $("#md_veh_time").val(value.VEH_TIME);
                             $('#md_veh_regis_no').val(value.VEH_REGIS_NO).trigger('change');   
                             $('#md_veh_type_code').val(value.VEH_TYPE_CAR).trigger('change');   
                             $('#md_veh_brand_code').val(value.VEH_BRAND).trigger('change');   
                             $('#md_veh_date_check').val(value.DOC_DATE);       
                        });                      
                    }

                    if(data.arr_list){
                        let veh_title_seq = "";
                        let start = 1 ;
                        let headbutton = 0 ;
                        let bodybutton = 0 ;
                        $.each(data.arr_list, function(key, value){ 
                          if(veh_title_seq != value.VEH_TITLE_SEQ){
                              if(start == 1){
                                  var head    =  $("<tr class='table-light'></tr>"); 
                                  $("<td>"+value.VEH_TITLE_SEQ+" "+value.VEH_TITLE_LIST+"</td>").appendTo(head);
                                  $("<td align='center'><h5>ปกติ</h5></td>").appendTo(head);
                                  $("<td align='center'><h5>ผิดปกติ</h5></td>").appendTo(head);
                                  $("<td align='center'><h5>ไม่ต้องตรวจ</h5></td>").appendTo(head);
                                  $("<td align='center'><h5>หมายเหตุ</h5></td> ").appendTo(head);
                                   $('#modal_tabel > tbody:last').append(head); 
                                   start++ ;
                              }
                                else{
                                  var head    =  $("<tr class='table-light'></tr>");
                                  $("<td colspan='5'><hr> "+value.VEH_TITLE_SEQ+" "+value.VEH_TITLE_LIST+"</td>").appendTo(head);
                                   $('#modal_tabel > tbody:last').append(head);                                   
                                }
                                headbutton ++;
                          }
                              var body    =  $("<tr class='table-light' ></tr>");
                                  $("<td width='10%' > <input type='hidden'  value='"+value.VEH_TITLE_SEQ+"'>"+
                                                      "<input type='hidden'  value='"+value.VEH_LIST_SEQ+"'> "+value.VEH_LIST_SEQ+" "+value.VEH_LIST+" </td>").appendTo(body); // ชื่อรายการเช็คลิสต์
                                  //$("<td width='10%'> <input type='hidden'  value='"+value.VEH_TITLE_SEQ+"'> </td>").appendTo(body); // ลำดับ
                                  //$("<td width='10%'> <input type='text'  value='"+value.VEH_LIST+"'> </td>").appendTo(body); // รายการ

                                  $("<td width='10%' align='center'> <input type='radio' id=''  value='Y' "+(value.VEH_CHK_RESULT == "Y" ? 'checked' : 'disabled')+" "+(flg == 'D' ? '' : '')+"> </td>").appendTo(body); // ผ่าน
                                  $("<td width='10%' align='center'> <input type='radio' id=''  value='N' "+(value.VEH_CHK_RESULT == "N" ? 'checked' : 'disabled')+" "+(flg == 'D' ? '' : '')+"> </td>").appendTo(body); // ไมผ่าน
                                  $("<td width='10%' align='center'> <input type='radio' id=''  value='O' "+(value.VEH_CHK_RESULT == "O" ? 'checked' : 'disabled')+" "+(flg == 'D' ? '' : '')+"> </td>").appendTo(body); // ไม่ต้องตรวจ
                                  $("<td align='center'> <input type='text' class='form-control' name='arr_prd["+value.VEH_NOTE+"][]' value='"+(value.VEH_NOTE ==null ? '' : value.VEH_NOTE)+"' "+(flg == 'D' ? 'readonly' : '')+" style='width:300px'> </td> ").appendTo(body); // หมายเหตุ

                                 $('#modal_tabel > tbody:last').append(body); 
                                 veh_title_seq = value.VEH_TITLE_SEQ;
                                 bodybutton ++;

                        }); 
                    }
                
                },

                error:function(data) { 
                    alert("เกิดข้อผิดพลาด ลองใหม่อีกครั้ง");
                }
          });  
  }  

//---------------------------------------------------------------รายละเอียดผลการเช็คลิสต์----------------------------------------------------------------//


 function list_details_tb(doc_no,flg){ 
      var url  = $('#te_url').val(); 
          $.ajax({ 
                url : url+"Mainapp/ajax_list_data_daily_checklist", 
                data: { doc_no }, 
                type: "POST",
                dataType: "json",
                success:function(data) { 
                    if (data.arr_header) {
                         $.each(data.arr_header, function(key, value){  
                             //$('#md_veh_km').val(data.VEH_KM);
                            $("#md_veh_note_b").val(value.VEH_LIST);    
                             $("#md_veh_km_b").val(value.VEH_KM);
                             $("#md_veh_time_b").val(value.VEH_TIME);
                             $('#md_veh_regis_no_b').val(value.VEH_REGIS_NO).trigger('change');   
                             $('#md_veh_type_code_b').val(value.VEH_TYPE_CAR).trigger('change');   
                             $('#md_veh_brand_code_b').val(value.VEH_BRAND).trigger('change');   
                             $('#md_veh_date_check_b').val(value.DOC_DATE);   
                        });                      
                    }

                    if(data.arr_list){
                        let veh_title_seq = "";
                        let start = 1 ;
                        let headbutton = 0 ;
                        let bodybutton = 0 ;
                        $.each(data.arr_list, function(key, value){ 
                          if(veh_title_seq != value.VEH_TITLE_SEQ){
                              if(start == 1){
                                  var head    =  $("<tr class='table-light'></tr>"); 
                                  $("<td>"+value.VEH_TITLE_SEQ+" "+value.VEH_TITLE_LIST+"</td>").appendTo(head);
                                  $("<td align='center'><h5>ปกติ</h5></td>").appendTo(head);
                                  $("<td align='center'><h5>ผิดปกติ</h5></td>").appendTo(head);
                                  $("<td align='center'><h5>ไม่ต้องตรวจ</h5></td>").appendTo(head);
                                  $("<td align='center'><h5>หมายเหตุ</h5></td> ").appendTo(head);
                                   $('#modal_tabel_b > tbody:last').append(head); 
                                   start++ ;
                              }
                                else{
                                  var head    =  $("<tr class='table-light'></tr>");
                                  $("<td colspan='5'><hr> "+value.VEH_TITLE_SEQ+" "+value.VEH_TITLE_LIST+"</td>").appendTo(head);
                                   $('#modal_tabel_b > tbody:last').append(head);                                   
                                }
                                headbutton ++;
                          }
                              var body    =  $("<tr class='table-light' ></tr>");
                                 $("<td width='10%' > <input type='hidden'  value='"+value.VEH_TITLE_SEQ+"'>"+
                                                      "<input type='hidden'  value='"+value.VEH_LIST_SEQ+"'> "+value.VEH_LIST_SEQ+" "+value.VEH_LIST+" </td>").appendTo(body); 
                                  $("<td width='10%' align='center'> <input type='radio' id=''  value='Y' "+(value.VEH_CHK_RESULT == "Y" ? 'checked' : 'disabled')+" "+(flg == 'F' ? '' : '')+"> </td>").appendTo(body); // ผ่าน
                                  $("<td width='10%' align='center'> <input type='radio' id=''  value='N' "+(value.VEH_CHK_RESULT == "N" ? 'checked' : 'disabled')+" "+(flg == 'F' ? '' : '')+"> </td>").appendTo(body); // ไมผ่าน
                                  $("<td width='10%' align='center'> <input type='radio' id=''  value='O' "+(value.VEH_CHK_RESULT == "O" ? 'checked' : 'disabled')+" "+(flg == 'F' ? '' : '')+"> </td>").appendTo(body); // ไม่ต้องตรวจ
                                  $("<td align='center'> <input type='text' class='form-control' name='arr_prd["+value.VEH_NOTE+"][]' value='"+(value.VEH_NOTE ==null ? '' : value.VEH_NOTE)+"' "+(flg == 'F' ? 'readonly' : '')+" style='width:300px'> </td> ").appendTo(body); // หมายเหตุ

                                 $('#modal_tabel_b > tbody:last').append(body); 
                                 veh_title_seq = value.VEH_TITLE_SEQ;
                                 bodybutton ++;

                        }); 
                    }
                
                },

                error:function(data) { 
                    alert("เกิดข้อผิดพลาด ลองใหม่อีกครั้ง");
                }
          });  
  } 









  $('#form_add').on('submit', function(e){ 
    e.preventDefault();
  let flg= $("#hd_flg").val();

                let doc_no                        = $("#doc_no").val();
                let doc_date                      = $("#doc_date").val();
                let md_veh_km                     = $("#md_veh_km").val();
                let md_veh_time                   = $("#md_veh_time").val();
                let md_veh_regis_no               = $("#md_veh_regis_no").val();
                let md_veh_type_code              = $("#md_veh_type_code").val();
                let md_veh_brand_code             = $("#md_veh_brand_code").val();
                let md_veh_date_check             = $("#md_veh_date_check").val();
                let num_radio                     = $("#num_radio").val();

    var totalPrice   = 0; 
     var chk_val      = "Y";
     var v1 = ""; //v1 เช็คค่าช่องหมายเหตุ
      $('input[type=checkbox], input[type=radio]').each( function() {
        if( $(this).is(':checked') ) { 
              totalPrice++; console.log(totalPrice);
              v1 = $(this).parent().nextAll().find('.note').val(); //test คือclass ของหมายเหตุ
              if($(this).val() == "N" && v1 == ""){ //ถ้าช่อง radio มีค่าเป็น N แล้วหมายเหตุว่าง จะทำการส่ง flg เป็นค่า ว่าง ไม่ให้ save
               chk_val = "N";
               return false;
              }
            }
        });

      //$("p").text(chk_val);


      
     if ((flg == "A"  &&chk_val=="Y" &&num_radio == totalPrice  && doc_no != "" && md_veh_km != ""  && md_veh_regis_no != ""    )  
      || (flg == "D" && doc_no != "" ))
     {
            $("#doc_no").prop("disabled", false);
            $("#doc_date").prop("disabled", false);
            $("#md_veh_km").prop("disabled", false);
            $("#md_veh_time").prop("disabled", false);
            $("#md_veh_regis_no").prop("disabled", false);
            $("#md_veh_type_code").prop("disabled", false);
            $("#md_veh_brand_code").prop("disabled", false);
            $("#md_veh_date_check").prop("disabled", false);

        $.ajax({
          url    : url+"Mainapp/ajax_save_car_repair",
            type: 'POST',
            dataType: "json",
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){  
              if(data == "Y"){
                 swal({
                    title: 'บันทึกสำเร็จ!',
                    text: '\n',
                    icon: 'success',
                    timer: 500,
                    buttons: false
                });
               location.reload();
              }
              else{
                 alert_info("รหัสซ่ำกัน")
              }
          },
          error:function() {
              alert_info('เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
          }
        });
     } 
     else {
         alert_info('กรุณากรอกหมายเหตุรายการที่ผิดปกติ');
     }     


  });  //click



 
$(function(){     
  var d = new Date(),        
      h = d.getHours(),
      m = d.getMinutes();
  if(h < 10) h = '0' + h; 
  if(m < 10) m = '0' + m; 
  $('input[type="time"][value="now"]').each(function(){ 
    $(this).attr({'value': h + ':' + m});
  });
});
     

$(function(){     
  var d = new Date(),        
      h = d.getHours(),
      m = d.getMinutes();
  if(h < 10) h = '0' + h; 
  if(m < 10) m = '0' + m; 
  $('input[type="time"][value="date"]').each(function(){ 
    $(this).attr({'value': h + ':' + m});
  });
});




function Register() {
  var veh_regis_no = document.getElementById("md_veh_regis_no").value;
     $.ajax({
                      url    : url+"Mainapp/ajax_list_data_license_plate",
                      data : { veh_regis_no }, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){  
                              if(data){                              
                              $("#md_veh_type_code").val(data.VEH_TYPE_CODE).trigger('change'); //สำหรับเลือกข้อมูลแบบ dropdown
                              $("#md_veh_brand_code").val(data.VEH_BRAND_CODE).trigger('change');
                        
                              }
                          },
                  });
}





// open modal add
  function modal_spoil(head,c,flg,doc_no){
      $("#a_md").css('background-color' , c);
      $("#b_md").html('<b><font color="#ffffff">'+head+'</font></b>');
     $('#hd_flg_c').val(flg);
     $('#doc_no').val(doc_no); 
      //การกำหนดตารางให้สามารถกรอกได้หรือไม่ได้
          if(flg == "B"){
            $("#md_veh_time_c").prop("disabled", true);
            $("#md_veh_spoil_c").prop("disabled", false);
            $("#md_veh_regis_no_c").prop("disabled", false);
            $("#md_veh_type_code_c").prop("disabled", true);
            $("#md_veh_brand_code_c").prop("disabled", true);
            $("#md_veh_date_check_c").prop("disabled", true);
            $("#md_veh_spoil_name").prop("disabled", false);
          }
          else{
            $("#md_veh_time_c").prop("disabled", true);
            $("#md_veh_spoil_c").prop("disabled", true);
            $("#md_veh_regis_no_c").prop("disabled", true);
            $("#md_veh_type_code_c").prop("disabled", true);
            $("#md_veh_brand_code_c").prop("disabled", true);
            $("#md_veh_date_check_c").prop("disabled", true);  
            $("#md_veh_spoil_name").prop("disabled", true);          
          }
            list_data_spoil(doc_no);
            $("#modal_spoil").modal("show");  
  }  


// open modal add
  function modal_spoil_details(head,c,flg,doc_no){
     $("#f_md").css('background-color' , c);
     $("#g_md").html('<b><font color="#ffffff">'+head+'</font></b>');
     $('#hd_flg_g').val(flg);
     $('#doc_no_g').val(doc_no); 
      //การกำหนดตารางให้สามารถกรอกได้หรือไม่ได้
          flg == "G"
            $("#md_veh_time_g").prop("disabled", true);
            $("#md_veh_spoil_g").prop("disabled", true);
            $("#md_veh_regis_no_g").prop("disabled", true);
            $("#md_veh_type_code_g").prop("disabled", true);
            $("#md_veh_brand_code_g").prop("disabled", true);
            $("#md_veh_date_check_g").prop("disabled", true);
            $("#md_veh_spoil_name_g").prop("disabled", true);
             $("#md_veh_note_g").prop("disabled", true);

            list_data_spoil_details(doc_no);
            $("#modal_spoil_details").modal("show");  
  }  

  function list_data_spoil(doc_no){ 
   $.ajax({
                      url    : url+"Mainapp/ajax_list_data_checklist_daily_broken",
                      data : { doc_no}, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){  
                              if(data){ 
                              $("#doc_no_c").val(data.DOC_NO);
                              $("#md_veh_time_c").val(data.VEH_TIME); 
                              $("#md_veh_spoil_name").val(data.VEH_NOTE);
                              $("#md_veh_spoil_c").val(data.VEH_CAR_NOTE).trigger('change');
                              $("#md_veh_regis_no_c").val(data.VEH_REGIS_NO).trigger('change');
                              $("#md_veh_type_code_c").val(data.VEH_TYPE_CAR).trigger('change');
                              $("#md_veh_brand_code_c").val(data.VEH_BRAND).trigger('change'); 

                              }
                            else{ 
                              $("#md_veh_spoil_c").val("").trigger('change');
                              $("#md_veh_regis_no_c").val("").trigger('change');
                              $("#md_veh_spoil_name").val("");

                            }
                          },
                          error:function() {
                              alert_info('เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
                          }
                  });
 }

//---------------------------------------------//.
  function list_data_spoil_details(doc_no){ 
   $.ajax({
                      url    : url+"Mainapp/ajax_list_data_checklist_daily_broken",
                      data : { doc_no}, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){  
                              if(data){ 
                              $("#doc_no_g").val(data.DOC_NO);
                              $("#md_veh_date_check_g").val(data.DOC_DATE);
                              $("#md_veh_time_g").val(data.VEH_TIME); 
                              $("#md_veh_spoil_name_g").val(data.VEH_NOTE);
                              $("#md_veh_spoil_g").val(data.VEH_CAR_NOTE).trigger('change');
                              $("#md_veh_regis_no_g").val(data.VEH_REGIS_NO).trigger('change');
                              $("#md_veh_type_code_g").val(data.VEH_TYPE_CAR).trigger('change');
                              $("#md_veh_brand_code_g").val(data.VEH_BRAND).trigger('change'); 
                               $("#md_veh_note_g").val(data.VEH_LIST);
                              }

                          },
                          error:function() {
                              alert_info('เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
                          }
                  });
 }

// --------------------------------- save  ----------------------------//

  $('#form_approve').on('submit', function(e){ 
    e.preventDefault();
  let flg= $("#hd_flg").val();
                let doc_no                                       = $("#doc_no").val();
                let md_veh_time_c                                = $("#md_veh_time_c").val();
                let md_veh_spoil_c                               = $("#md_veh_spoil_c").val();
                let md_veh_regis_no_c                            = $("#md_veh_regis_no_c").val();
                let md_veh_type_code_c                           = $("#md_veh_type_code_c").val();
                let md_veh_brand_code_c                          = $("#md_veh_brand_code_c").val();
                let md_veh_date_check_c                          = $("#md_veh_date_check_c").val();
            
     if (md_veh_time_c != "" && md_veh_spoil_c != ""&& md_veh_regis_no_c != ""&& md_veh_type_code_c != "" && md_veh_brand_code_c != "" && md_veh_date_check_c != "" )
     {
            
            $("#md_veh_time_c").prop("disabled", false);
            $("#md_veh_spoil_c").prop("disabled", false);
            $("#md_veh_regis_no_c").prop("disabled", false);
            $("#md_veh_type_code_c").prop("disabled", false);
            $("#md_veh_brand_code_c").prop("disabled", false);
            $("#md_veh_date_check_c").prop("disabled", false);
            $("#md_veh_spoil_name").prop("disabled", false);

        $.ajax({
          url    : url+"Mainapp/ajax_save_car_spoil",
            type: 'POST',
            dataType: "json",
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){  
              if(data == "Y"){
                 swal({
                    title: 'บันทึกสำเร็จ!',
                    text: '\n',
                    icon: 'success',
                    timer: 500,
                    buttons: false
                });
               location.reload();
              }
              else{
                 alert_info("มีพนักงงานคนนี้แล้ว")
              }
          },
          error:function() {
              alert_info('เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
          }
        });
     } 
     else{
         alert_info('กรุณากรอกข้อมูลให้ครบถ้วน');
     }     
  });  //click





function Carspoil() {
  var veh_regis_no = document.getElementById("md_veh_regis_no_c").value;
     $.ajax({
                      url    : url+"Mainapp/ajax_list_data_license_plate",
                      data : { veh_regis_no }, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){  
                              if(data){                              
                              $("#md_veh_type_code_c").val(data.VEH_TYPE_CODE).trigger('change'); //สำหรับเลือกข้อมูลแบบ dropdown
                              $("#md_veh_brand_code_c").val(data.VEH_BRAND_CODE).trigger('change');
                        
                              }
                          },
                  });
}


    function START() {
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = md_veh_spoil_c.value == "xxx" ? "block" : "none";
    }

    function STOP() {
        var stop = document.getElementById("stop");
        stop.style.display = md_veh_spoil_g.value == "xxx" ? "block" : "none";
    }

  // ค้นหา
   $(document).ready(function() {
      $('#datatable-ot').DataTable({
         responsive: true,
      "aLengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "iDisplayLength": 25,
      "language": {
          "lengthMenu": "แสดง _MENU_  รายการ",
          "search": "",
          "zeroRecords": "",
          "info": "ข้อมูล _START_-_END_ จาก <font color=\"red\"><b>_TOTAL_</b></font>  รายการที่พบ",
          "infoEmpty": "<font color=\"red\"><b>ไม่พบข้อมูล</b></font>",
          "sEmptyTable": "",
          "infoFiltered": "(กรองจาก <font color=\"red\"><b>_MAX_</b></font> รายการ)"
      },

      "order": [ 0, 'asc' ], 
    // "ordering": true,
        columnDefs: [{
          orderable: false,
          targets: "no-sort"
        }]
    });
    $('#datatable-ot').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'ค้นหา');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });

let regis=$('#hd_ft_veh_regis_no').val();
$('#ft_veh_regis_no').val(regis).trigger('change'); 

let status=$('#hd_ft_veh_status').val();
$('#ft_veh_status').val(status).trigger('change'); 

  });


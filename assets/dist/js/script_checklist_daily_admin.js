 
let url              = $('#te_url').val(); 


//------------------------------------------- admin ตรวจสอบ --------------------------------//
  function list_subroom_b(flg,doc_no){ // การโชว์ช้อมูลในตาราง
    $("#table-subroom_b > tbody").empty(); 
      if(doc_no ){
                $.ajax({
                    url    : url+"Mainapp/ajax_list_data_list",
                    data : { doc_no }, 
                    type  : "POST",
                    dataType: "json",
                        success:function(data){ 
                            if(data){
                              var num = parseInt($('#md_num_b').val());
                                $.each(data, function(key, value){  
                                  var body    =  $("<tr></tr>"); 
                                                      $("<td><br><input type='text' class='form-control fs-14 chk-val_b' name='arr_"+num+"[]' value='"+value.VEH_LIST_NO+"' "+(flg == "E" ? "" : "readonly")+"></td>").appendTo(body);
                                                      $("<td><br><input type='text' class='form-control fs-14 chk-val_b' name='arr_"+num+"[]' value='"+value.VEH_LIST+"' "+(flg == "E" ? "" : "readonly")+"></td>").appendTo(body);
                                                      $("<td class='txt-center'><br><button type='button' class='btn btn-sm btn-danger' onclick=\"deleteRow_c(this)\"><i class='fa fa-times'></i></button></td>").appendTo(body);
                                                    $('#table-subroom_b > tbody:last').append(body); 
                                                    num = num+1;
                                                    $('#md_num_b').val(num);
                                });
                            }
                        },
                        error:function() {
                               alert("เกิดข้อผิดพลาด ลองใหม่อีกครั้ง");
                        }
                });
          }
  }

  //ลบคอลัม 
  function deleteRow_c(r){
      var i = r.parentNode.parentNode.rowIndex;
      document.getElementById("table-subroom_b").deleteRow_c(i);

  }
  
  //เพิ่มคอลัม 
  $('#btn-row').on('click', function(){ 
         var num = parseInt($('#md_num_b').val()); 
         var body    =  $("<tr></tr>"); 
                                $("<td><br><input type='text' class='form-control fs-14 chk-val_b' name='arr_"+num+"[]' value=''></td>").appendTo(body);
                                $("<td><br><input type='text' class='form-control fs-14 chk-val_b' name='arr_"+num+"[]' value=''></td>").appendTo(body);
                                $("<td class='txt-center'><button type='button' class='btn btn-sm btn-danger' onclick=\"deleteRow_c(this)\"><i class='fa fa-times'></i></button></td>").appendTo(body);
                                $('#table-subroom_b > tbody:last').append(body); 
                              num = num+1;
                              $('#md_num_b').val(num);
  });  //click

//------------------------------------------- admin รายละเอียด --------------------------------//
  function list_subroom_d(flg,doc_no){ // การโชว์ช้อมูลในตาราง
    $("#table-subroom_d > tbody").empty(); 
      if(doc_no ){
                $.ajax({
                    url    : url+"Mainapp/ajax_list_data_list",
                    data : { doc_no }, 
                    type  : "POST",
                    dataType: "json",
                        success:function(data){ 
                            if(data){
                              var num = parseInt($('#md_num_d').val());
                                $.each(data, function(key, value){  
                                  var body    =  $("<tr></tr>"); 
                                                      $("<td><br><input type='text' class='form-control fs-14 chk-val_d' name='arr_"+num+"[]' value='"+value.VEH_LIST_NO+"' "+(flg == "E" ? "" : "readonly")+"></td>").appendTo(body);
                                                      $("<td><br><input type='text' class='form-control fs-14 chk-val_d' name='arr_"+num+"[]' value='"+value.VEH_LIST+"' "+(flg == "E" ? "" : "readonly")+"></td>").appendTo(body);
                                                      $("<td class='txt-center'><button type='button' class='btn btn-sm btn-danger' onclick=\"deleteRow_d(this)\"><i class='fa fa-times'></i></button></td>").appendTo(body);
                                                    $('#table-subroom_d > tbody:last').append(body); 
                                                    num = num+1;
                                                    $('#md_num_d').val(num);
                                });
                            }
                        },
                        error:function() {
                               alert("เกิดข้อผิดพลาด ลองใหม่อีกครั้ง");
                        }
                });
          }
  }

  //ลบคอลัม 
  function deleteRow_c(r){
      var i = r.parentNode.parentNode.rowIndex;
      document.getElementById("table-subroom_d").deleteRow_c(i);

  }
  
  //เพิ่มคอลัม 
  $('#btn-row').on('click', function(){ 
         var num = parseInt($('#md_num_d').val()); 
         var body    =  $("<tr></tr>"); 
                                $("<td><br><input type='text' class='form-control fs-14 chk-val_d' name='arr_"+num+"[]' value=''></td>").appendTo(body);
                                $("<td><br><input type='text' class='form-control fs-14 chk-val_d' name='arr_"+num+"[]' value=''></td>").appendTo(body);
                                $("<td class='txt-center'><button type='button' class='btn btn-sm btn-danger' onclick=\"deleteRow_c(this)\"><i class='fa fa-times'></i></button></td>").appendTo(body);
                                $('#table-subroom_d > tbody:last').append(body); 
                              num = num+1;
                              $('#md_num_d').val(num);
  });  //click



// รายงาน admin
  function modal_admin(head,c,flg,doc_no){
     $('#hd_flg_b').val(flg);
     $('#md_num_b').val(1); // กำหนดค่าตารางให้ทำการ +1 ไปเรื่อยๆเมื่อมีการเพิ่มตาราง
     // ถ้าตารางรูปเป็นค่าว่างจะทำการลบค่าว่างของรูปออก
        $(".di_gallery").empty(); 
        $(".di_gallery").append('<div class="di_img"></div>');
        $("#modaltable_file_b  tbody").empty(); 
     //หัว modal
      $("#c_md").css('background-color');
      $("#h_md").html('<b><font color="#ffffff">'+head+'</font></b>');
      //------------- ----------------------------------------
      $('#doc_no_b').val(doc_no); 
    
      //การกำหนดตารางให้สามารถกรอกได้หรือไม่ได้
            if(flg == "F"){
            $("#md_veh_start").prop("disabled", true);
            $("#md_veh_stop").prop("disabled", true);
            $("#md_veh_regis_no").prop("disabled", true);
            $("#md_veh_date_up").prop("disabled", true);
            $("#md_veh_time_start").prop("disabled", true);
            $("#md_veh_km_start").prop("disabled", true);            
            $("#md_veh_type_list").prop("disabled", true); 
            $("#md_veh_weight").prop("disabled", true);                     
            $("#md_veh_time_stop").prop("disabled", true);
            $("#md_veh_sum_time").prop("disabled", true);
            $("#md_veh_km_stop").prop("disabled", true);
            $("#md_veh_bearer").prop("disabled", true);
            $("#md_veh_date_drop").prop("disabled", true);
            $("#md_veh_pic").prop("disabled", true);
            $("#md_veh_note").prop("disabled", true);
            $("#md_veh_grp_code").prop("disabled", true);
            $("#md_veh_list_no").prop("disabled", true);
            $("#md_veh_list").prop("disabled", true);            

          }
            list_data_formuser_admin(doc_no);
            list_subroom_b(flg,doc_no); // การส่งค่าตารางให้ไปแสดง โดย list_subroom_b คือชื่อฟังชั่น
            list_data_formuser_pic(doc_no);
            $("#modal_admin").modal("show");  
  } 


// ----------------------------------------------- ส่งค่าไป save ----------------------------------------//
// รายงาน admin
  function modal_admin_approve(head,c,flg,doc_no){
     $('#hd_flg_d').val(flg);
     $('#md_num_d').val(1); // กำหนดค่าตารางให้ทำการ +1 ไปเรื่อยๆเมื่อมีการเพิ่มตาราง
        $(".di_gallery").empty(); 
        $(".di_gallery").append('<div class="di_img"></div>');
        $("#modaltable_file_d  tbody").empty(); 
     //หัว modal
      $("#c_md").css('background-color');
      $("#h_md").html('<b><font color="#ffffff">'+head+'</font></b>');
      //------------- ----------------------------------------
      $('#doc_no_b').val(doc_no); 
    
      //การกำหนดตารางให้สามารถกรอกได้หรือไม่ได้
            if(flg == "D"){
            $("#md_veh_start").prop("disabled", true);
            $("#md_veh_stop").prop("disabled", true);
            $("#md_veh_regis_no").prop("disabled", true);
            $("#md_veh_date_up").prop("disabled", true);
            $("#md_veh_time_start").prop("disabled", true);
            $("#md_veh_km_start").prop("disabled", true);            
            $("#md_veh_type_list").prop("disabled", true); 
            $("#md_veh_weight").prop("disabled", true);                     
            $("#md_veh_time_stop").prop("disabled", true);
            $("#md_veh_sum_time").prop("disabled", true);
            $("#md_veh_km_stop").prop("disabled", true);
            $("#md_veh_bearer").prop("disabled", true);
            $("#md_veh_date_drop").prop("disabled", true);
            $("#md_veh_pic").prop("disabled", true);
            $("#md_veh_note").prop("disabled", true);
            $("#md_veh_grp_code").prop("disabled", true);
            $("#md_veh_list_no").prop("disabled", true);
            $("#md_veh_list").prop("disabled", true);            

          }
            list_data_formuser_admin_approve(doc_no);
            list_data_formuser_pic_d(doc_no);
            list_subroom_d(flg,doc_no); // การส่งค่าตารางให้ไปแสดง โดย list_subroom_b คือชื่อฟังชั่น
            $("#modal_admin_approve").modal("show");  
  } 


// ------------------------------------ admin  ---------------------------------//

  function list_data_formuser_admin(doc_no){ 
   $.ajax({
                      url    : url+"Mainapp/ajax_list_data_formuser_test",
                      data : { doc_no}, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){  
                              if(data){ 
                              $("#md_veh_start_b").val(data.VEH_START_NAME).trigger('change'); 
                              $("#md_veh_stop_b").val(data.VEH_STOP_NAME).trigger('change');
                              $("#md_veh_regis_no_b").val(data.VEH_REGIS_NO).trigger('change');
                              $("#md_veh_date_up_b").val(data.VEH_DATE_UP).trigger('change');
                              $("#md_veh_time_start_b").val(data.VEH_TIME_START).trigger('change');
                              $("#md_veh_km_start_b").val(data.VEH_KM_START);
                              $("#md_veh_type_list_b").val(data.VEH_TYPE_LIST);
                              $("#md_veh_weight_b").val(data.VEH_WEIGHT);
                              $("#md_veh_time_stop_b").val(data.VEH_TIME_STOP).trigger('change');
                              $("#md_veh_sum_time_b").val(data.VEH_SUM_TIME).trigger('change');
                              $("#md_veh_km_stop_b").val(data.VEH_KM_STOP);
                              $("#md_veh_bearer_b").val(data.VEH_BEARER);
                              $("#md_veh_date_drop_b").val(data.VEH_DATE_DROP).trigger('change');
                              $("#md_veh_note_b").val(data.VEH_NOTE);

                              var md_veh_time_start_s = data.VEH_TIME_START;
                              var md_veh_time_stop_s = data.VEH_TIME_STOP;
                              md_veh_time_start_s = md_veh_time_start_s.split(":");
                              md_veh_time_stop_s = md_veh_time_stop_s.split(":");
                              var startDate = new Date(0, 0, 0, md_veh_time_start_s[0], md_veh_time_start_s[1], 0);
                              var endDate = new Date(0, 0, 0, md_veh_time_stop_s[0], md_veh_time_stop_s[1], 0);
                              var diff = endDate.getTime() - startDate.getTime();
                              var hours = Math.floor(diff / 1000 / 60 / 60);
                              diff -= hours * 1000 * 60 * 60;
                              var minutes = Math.floor(diff / 1000 / 60);     
                              $("#md_veh_time_sum_a").val(hours+"ชั่วโมง" + " : "+minutes +" นาที") ;
                               $("#md_veh_time_sum_b").val (hours + ":" + (minutes < 9 ? "0" : "") + minutes);

                              }
                            else{ 
                              $("#md_veh_start_b").val("").trigger('change'); 
                              $("#md_veh_stop_b").val("").trigger('change');
                              $("#md_veh_regis_no_b").val("").trigger('change');
                              $("#md_veh_date_up_b").val("").trigger('change');
                              $("#md_veh_time_start_b").val("").trigger('change');
                              $("#md_veh_km_start_b").val("");
                              $("#md_veh_type_list_b").val("");
                              $("#md_veh_weight_b").val("");
                              $("#md_veh_time_stop_b").val("").trigger('change');
                              $("#md_veh_sum_time_b").val("").trigger('change');
                              $("#md_veh_km_stop_b").val("");
                              $("#md_veh_bearer_b").val("");
                              $("#md_veh_date_drop_b").val("").trigger('change');
                              $("#md_veh_note_b").val("");
                            }

                          },
                          error:function() {
                              alert_info('เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
                          }
                  });
  }


function mytime() {
   var md_veh_time_start_b = document.getElementById("md_veh_time_start_b").value.split(':');
   var md_veh_time_stop_b = document.getElementById("md_veh_time_stop_b").value.split(':');
   
    var sumA = (parseInt(md_veh_time_start_b[0])*60) + parseInt(md_veh_time_start_b[1]);
    var sumB = (parseInt(md_veh_time_stop_b[0])*60) + parseInt(md_veh_time_stop_b[1]);
    if(sumA < sumB){
     var cal = sumB - sumA;
        var hor = parseInt(Math.floor(cal/60));
        var min = parseInt(cal%60);
        if(min < 10){
         min = "0"+min;
        }
        document.getElementById("md_veh_time_sum_a").value =  hor+"ชั่วโมง"+":"+min+"นาที";
        document.getElementById("md_veh_time_sum_b").value = hor+":"+min;

    }
    else if(sumA == sumB){
     document.getElementById("md_veh_time_sum_a").value = "0:00";
    }
    else{
     var cal = (1440-sumA)+sumB;
        var hor = parseInt(Math.floor(cal/60));
        var min = parseInt(cal%60);
        document.getElementById("md_veh_time_sum_a").value = hor+"ชั่วโมง"+":"+min+"นาที";
        document.getElementById("md_veh_time_sum_b").value = hor+":"+min;
    }
   
}



   function list_data_formuser_pic(doc_no){ 
    
       $.ajax({
                url : url+"Mainapp/ajax_list_data_formuser_pic",
                data :  {doc_no},  
                type  : "POST",
                dataType: "json",
                    success:function(data){  

                      if(data){ 
                           let tbody = "";
                           let icon   = "";
                           let type   = "";
                           let td1     = "";

                           let img     = "";
                              $.each(data, function(key, value){ 
                                  type = value.FILE_TYPE;
                               
                          
                                 if(type == ".jpg" || type == ".jpeg" || type == ".png" || type == ".gif"){  
                                   td1  = `<button type="button" class="image_c m-tb-5 p-l-0" onclick="show_img('${value.ATTACH_SEQ}')"><font size="5"><i class="fa fa-file-image-o"></i></font></button> ${value.REAL_FILE_NAME}`;
                                   img  += `<a href="${url}PIC/${value.FILE_NAME}" class="image-tile cl${value.ATTACH_SEQ}"><img src="${url}PIC/${value.FILE_NAME}" alt="${value.REAL_FILE_NAME}"></a>`;
                                 }
                                 else if(type == ".ppt" || type == ".pptx" || type == ".doc" || type == ".docx" || type == ".xls" || type == ".xlsx" || type == ".pdf" || type == ".txt"){ 
                                  icon = (type == ".ppt" || type == ".pptx" ? "fa fa-file-powerpoint-o" : (type == ".doc" || type == ".docx" ? "fa fa-file-word-o" : (type == ".xls" || type == ".xlsx" ? "fa fa-file-excel-o" : (type == ".pdf" ? "fa fa-file-pdf-o" : "fa fa-file-text-o"))));
                                  td1 = `<a href="${url}PIC/${value.FILE_NAME}" target='_blank' class='m-tb-5'><font size='5'><i class='${icon}'></i></font></a> ${value.REAL_FILE_NAME}`; 
                                 }
                          



                                  tbody  += `<tr>  
                                                      <td>${td1}</td>
                                                  </tr>`;
                              }); 
                              $('#modaltable_file_b tbody').html(tbody); 
                              $(".di_img").html(img).lightGallery();  
                      }
                    },
                    error:function() {
                          alert_danger("เกิดข้อผิดพลาด ลองใหม่อีกครั้ง");
                    }
              });
      
  }

  function show_img(seq){ 
    $(".cl"+seq).trigger("click");
  }


// ------------------------------------ modal_admin_approve  ---------------------------------//

  function list_data_formuser_admin_approve(doc_no){ 
   $.ajax({
                      url    : url+"Mainapp/ajax_list_data_formuser_test",
                      data : { doc_no}, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){  
                              if(data){ 
                              $("#md_veh_start_d").val(data.VEH_START_NAME).trigger('change'); 
                              $("#md_veh_stop_d").val(data.VEH_STOP_NAME).trigger('change');
                              $("#md_veh_regis_no_d").val(data.VEH_REGIS_NO).trigger('change');
                              $("#md_veh_date_up_d").val(data.VEH_DATE_UP).trigger('change');
                              $("#md_veh_time_start_d").val(data.VEH_TIME_START).trigger('change');
                              $("#md_veh_km_start_d").val(data.VEH_KM_START);
                              $("#md_veh_type_list_d").val(data.VEH_TYPE_LIST);
                              $("#md_veh_weight_d").val(data.VEH_WEIGHT);
                              $("#md_veh_time_stop_d").val(data.VEH_TIME_STOP).trigger('change');
                              $("#md_veh_sum_time_d").val(data.VEH_SUM_TIME).trigger('change');
                              $("#md_veh_km_stop_d").val(data.VEH_KM_STOP);
                              $("#md_veh_bearer_d").val(data.VEH_BEARER);
                              $("#md_veh_date_drop_d").val(data.VEH_DATE_DROP).trigger('change');
                              $("#md_veh_note_d").val(data.VEH_NOTE);
                              $("#md_explain_d").val(data.VEH_EXPLAIN);
                              $("#md_veh_time_sum_f").val(data.VEH_SUM_TIME);
                              // การคำนวณเวลา 
                              var md_veh_time_start_a = data.VEH_TIME_START;
                              var md_veh_time_stop_a = data.VEH_TIME_STOP;
                              md_veh_time_start_a = md_veh_time_start_a.split(":");
                              md_veh_time_stop_a = md_veh_time_stop_a.split(":");
                              var startDate = new Date(0, 0, 0, md_veh_time_start_a[0], md_veh_time_start_a[1], 0);
                              var endDate = new Date(0, 0, 0, md_veh_time_stop_a[0], md_veh_time_stop_a[1], 0);
                              var diff = endDate.getTime() - startDate.getTime();
                              var hours = Math.floor(diff / 1000 / 60 / 60);
                              diff -= hours * 1000 * 60 * 60;
                              var minutes = Math.floor(diff / 1000 / 60);
                              $("#md_veh_time_sum_f").val(hours+"ชั่วโมง" + " : "+minutes +" นาที") ;

                              }
                            else{ 
                              $("#md_veh_start_d").val("").trigger('change'); 
                              $("#md_veh_stop_d").val("").trigger('change');
                              $("#md_veh_regis_no_d").val("").trigger('change');
                              $("#md_veh_date_up_d").val("").trigger('change');
                              $("#md_veh_time_start_d").val("").trigger('change');
                              $("#md_veh_km_start_d").val("");
                              $("#md_veh_type_list_d").val("");
                              $("#md_veh_weight_d").val("");
                              $("#md_veh_time_stop_d").val("").trigger('change');
                              $("#md_veh_sum_time_d").val("").trigger('change');
                              $("#md_veh_km_stop_d").val("");
                              $("#md_veh_bearer_d").val("");
                              $("#md_veh_date_drop_d").val("").trigger('change');
                              $("#md_veh_note_d").val("");
                              $("#md_explain_d").val("");

                            }
                          },
                          error:function() {
                              alert_info('เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
                          }
                  });
  }


 function list_data_formuser_pic_d(doc_no){ 
    
       $.ajax({
                url : url+"Mainapp/ajax_list_data_formuser_pic",
                data :  {doc_no},  
                type  : "POST",
                dataType: "json",
                    success:function(data){  

                      if(data){ 
                           let tbody = "";
                           let icon   = "";
                           let type   = "";
                           let td1     = "";

                           let img     = "";
                              $.each(data, function(key, value){ 
                                  type = value.FILE_TYPE;
                               
                          
                                 if(type == ".jpg" || type == ".jpeg" || type == ".png" || type == ".gif"){  
                                   td1  = `<button type="button" class="image_c m-tb-5 p-l-0" onclick="show_img('${value.ATTACH_SEQ}')"><font size="5"><i class="fa fa-file-image-o"></i></font></button> ${value.REAL_FILE_NAME}`;
                                   img  += `<a href="${url}PIC/${value.FILE_NAME}" class="image-tile cl${value.ATTACH_SEQ}"><img src="${url}PIC/${value.FILE_NAME}" alt="${value.REAL_FILE_NAME}"></a>`;
                                 }
                                 else if(type == ".ppt" || type == ".pptx" || type == ".doc" || type == ".docx" || type == ".xls" || type == ".xlsx" || type == ".pdf" || type == ".txt"){ 
                                  icon = (type == ".ppt" || type == ".pptx" ? "fa fa-file-powerpoint-o" : (type == ".doc" || type == ".docx" ? "fa fa-file-word-o" : (type == ".xls" || type == ".xlsx" ? "fa fa-file-excel-o" : (type == ".pdf" ? "fa fa-file-pdf-o" : "fa fa-file-text-o"))));
                                  td1 = `<a href="${url}PIC/${value.FILE_NAME}" target='_blank' class='m-tb-5'><font size='5'><i class='${icon}'></i></font></a> ${value.REAL_FILE_NAME}`; 
                                 }
                          



                                  tbody  += `<tr>  
                                                      <td>${td1}</td>
                                                  </tr>`;
                              }); 
                              $('#modaltable_file_d tbody').html(tbody); 
                              $(".di_img").html(img).lightGallery();  
                      }
                    },
                    error:function() {
                          alert_danger("เกิดข้อผิดพลาด ลองใหม่อีกครั้ง");
                    }
              });
      
  }

  function show_img(seq){ 
    $(".cl"+seq).trigger("click");
  }

// --------------------------------- save admin ----------------------------//
$('.save_1').on('click', function(){ // สำรหับการรับค่าปุ่ม button
  let test = $(this).val(); 
  $("#save_1").val(test);
   $('#form_admin').submit();
});

  $('#form_admin').on('submit', function(e){
    e.preventDefault();
  let flg= $("#hd_flg").val();
                let doc_no                                = $("#doc_no").val();
                let doc_date                              = $("#doc_date").val();
                let md_veh_start                          = $("#md_veh_start").val();
                let md_veh_stop                           = $("#md_veh_stop").val();
                let md_veh_regis_no                       = $("#md_veh_regis_no").val();
                let md_veh_date_up                        = $("#md_veh_date_up").val();
                let md_veh_time_start                     = $("#md_veh_time_start").val();
                let md_veh_km_start                       = $("#md_veh_km_start").val();
                let md_veh_type_list                      = $("#md_veh_type_list").val();
                let md_veh_weight                         = $("#md_veh_weight").val();
                let md_veh_time_stop                      = $("#md_veh_time_stop").val();
                let md_veh_sum_time                       = $("#md_veh_sum_time").val();
                let md_veh_km_stop                        = $("#md_veh_km_stop").val();
                let md_veh_bearer                         = $("#md_veh_bearer").val();
                let md_veh_date_drop                      = $("#md_veh_date_drop").val();
                let md_veh_pic                            = $("#md_veh_pic").val();
                let md_veh_note                           = $("#md_veh_note").val();
                let md_explain_b                          = $("#md_explain_b").val();
                let md_veh_time_sum_b                     = $("#md_veh_time_sum_b").val();
                let save_1                                =$("#save_1").val();

       if ((save_1 == "Y" && md_veh_time_sum_b != "" )  || (save_1 == "N" && md_explain_b != "" && md_veh_time_sum_b != "" )) {
        $.ajax({
          url    : url+"Mainapp/ajax_save_formuser_admin",
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
         alert_info('ระบุบหมายเหตุไม่ผ่านตรวจสอบ');
     }     
  });  //click


  // ค้นหา
   $(document).ready(function() {
      $('#datatable-ot').DataTable({
         responsive: true,
      "aLengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
          "lengthMenu": "แสดง _MENU_  รายการ",
          "search": "",
          "zeroRecords": "",
          "info": "ข้อมูล _START_-_END_ จาก <font color=\"red\"><b>_TOTAL_</b></font>  รายการที่พบ",
          "infoEmpty": "<font color=\"red\"><b>ไม่พบข้อมูล</b></font>",
          "sEmptyTable": "",
          "infoFiltered": "(กรองจาก <font color=\"red\"><b>_MAX_</b></font> รายการ)"
      },
        "order": [[0, 'asc' ],[2, 'asc' ],[5, 'asc' ],[4, 'asc' ]],       
        dom: 'Bfrtip',
        buttons: [
          { extend: 'excel', className: 'btn btn-success fs-20 btn-lg',  exportOptions: {columns: ':not(.no-sort)'} } ,
          { extend: 'pageLength', className: 'btn btn-light fs-20 btn-lg'}     
        ]

    });
       $('.buttons-excel').html('<i class="fa fa-file-excel-o" /> Excel');

    $('#datatable-ot').each(function() {
      var datatable = $(this);
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'ค้นหา');
      search_input.removeClass('form-control-sm');
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });

let regis=$('#hd_ft_veh_regis_no').val();
$('#ft_veh_regis_no').val(regis).trigger('change'); 

});
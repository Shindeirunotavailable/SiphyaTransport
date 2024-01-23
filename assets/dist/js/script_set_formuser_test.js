 
let url              = $('#te_url').val(); 

  //ลิสห้องย่อย
  function list_subroom(flg,doc_no){
    $("#table-subroom > tbody").empty(); 
      if(doc_no ){
                $.ajax({
                    url    : url+"Mainapp/ajax_list_data_list",
                    data : { doc_no }, 
                    type  : "POST",
                    dataType: "json",
                        success:function(data){
                            if(data){
                              var num = parseInt($('#md_num').val());
                                $.each(data, function(key, value){  
                                  var body    =  $("<tr></tr>"); 
                                                      $("<td><br><input type='text' class='form-control fs-14 chk-val' name='arr_"+num+"[]' value='"+value.VEH_LIST_NO+"' "+(flg == "E" ? "" : "readonly")+"></td>").appendTo(body);
                                                      $("<td><br><input type='text' class='form-control fs-14 chk-val' name='arr_"+num+"[]' value='"+value.VEH_LIST+"' "+(flg == "E" ? "" : "readonly")+"></td>").appendTo(body);
                                                      $("<td class='txt-center'><br><button type='button' class='btn btn-sm btn-danger' onclick=\"deleteRow(this)\"><i class='fa fa-times'></i></button></td>").appendTo(body);
                                                    $('#table-subroom > tbody:last').append(body); 
                                                    num = num+1;
                                                    $('#md_num').val(num);
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
  function deleteRow(r){
      var i = r.parentNode.parentNode.rowIndex;
      document.getElementById("table-subroom").deleteRow(i);

  }
  
  //เพิ่มคอลัม 
  $('#btn-row').on('click', function(){ 
         var num = parseInt($('#md_num').val()); 
         var body    =  $("<tr></tr>"); 
                                $("<td><br><input type='text' class='form-control fs-14 chk-val' name='arr_"+num+"[]' value=''></td>").appendTo(body);
                                $("<td><br><input type='text' class='form-control fs-14 chk-val' name='arr_"+num+"[]' value=''></td>").appendTo(body);
                                $("<td class='txt-center'><button type='button' class='btn btn-sm btn-danger' onclick=\"deleteRow(this)\"><i class='fa fa-times'></i></button></td>").appendTo(body);
                                $('#table-subroom > tbody:last').append(body); 
                              num = num+1;
                              $('#md_num').val(num);
  });  //click
//------------------------------------------- ปลายทาง --------------------------------//
  function list_subroom_c(flg,doc_no){
    $("#table-subroom_c > tbody").empty(); 
      if(doc_no ){
                $.ajax({
                    url    : url+"Mainapp/ajax_list_data_list",
                    data : { doc_no }, 
                    type  : "POST",
                    dataType: "json",
                        success:function(data){ 
                            if(data){
                              var num = parseInt($('#md_num_c').val());
                                $.each(data, function(key, value){  
                                  var body    =  $("<tr></tr>"); 
                                                      $("<td><br><input type='text' class='form-control fs-14 chk-val_c' name='arr_"+num+"[]' value='"+value.VEH_LIST_NO+"' "+(flg == "E" ? "" : "readonly")+"></td>").appendTo(body);
                                                      $("<td><br><input type='text' class='form-control fs-14 chk-val_c' name='arr_"+num+"[]' value='"+value.VEH_LIST+"' "+(flg == "E" ? "" : "readonly")+"></td>").appendTo(body);
                                                      $("<td class='txt-center'><button type='button' class='btn btn-sm btn-danger' onclick=\"deleteRow_c(this)\"><i class='fa fa-times'></i></button></td>").appendTo(body);
                                                    $('#table-subroom_c > tbody:last').append(body); 
                                                    num = num+1;
                                                    $('#md_num_c').val(num);
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
      document.getElementById("table-subroom_c").deleteRow_c(i);

  }
  
  //เพิ่มคอลัม 
  $('#btn-row').on('click', function(){ 
         var num = parseInt($('#md_num_c').val()); 
         var body    =  $("<tr></tr>"); 
                                $("<td><br><input type='text' class='form-control fs-14 chk-val_c' name='arr_"+num+"[]' value=''></td>").appendTo(body);
                                $("<td><br><input type='text' class='form-control fs-14 chk-val_c' name='arr_"+num+"[]' value=''></td>").appendTo(body);
                                $("<td class='txt-center'><button type='button' class='btn btn-sm btn-danger' onclick=\"deleteRow_c(this)\"><i class='fa fa-times'></i></button></td>").appendTo(body);
                                $('#table-subroom_c > tbody:last').append(body); 
                              num = num+1;
                              $('#md_num_c').val(num);
  });  //click

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
                                                      $("<td class='txt-center'><br><button type='button' class='btn btn-sm btn-danger' onclick=\"deleteRow_d(this)\"><i class='fa fa-times'></i></button></td>").appendTo(body);
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
                                $("<td class='txt-center'><br><button type='button' class='btn btn-sm btn-danger' onclick=\"deleteRow_c(this)\"><i class='fa fa-times'></i></button></td>").appendTo(body);
                                $('#table-subroom_d > tbody:last').append(body); 
                              num = num+1;
                              $('#md_num_d').val(num);
  });  //click

//--------------------- เพิ่มรูปแบบตาราง arr -----------------------------------------//

  //เพิ่มแถว
  $("#btn_add_row").on('click', function(){ 
        let num = parseInt($('#hd_num_row').val()); //console.log(num);
          tbody  = `<tr>
                          <td class="txt-left files">  
                            <label class="btn btn-sm btn-primary m-tb-3 not-file la${num}" for="te_files${num}" style="width:80px;text-align: center;">
                            <input id="te_files${num}" name="filUpload[]" type="file" class="dis-none" onchange="list_file(this,'la${num}','sp${num}','tsp${num}')"  accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf">
                            <span id="multfile-label"  class="sp${num}"><font class="fs-13" color="#ffffff">เลือก</font></span>
                            </label>
                            <span class="clblack tsp${num}"></span>
                        </td>
                        <td class="txt-center">
                            <button type="button" class="btn btn-danger btn-sm p-tb-3 fs-14 btn-del-row"><i class="fa fa-times p-lr-3"></i></button>
                        </td>
                      </tr>`;
                      $('#modaltable_file > tbody:last').append(tbody); 
                      $('#hd_num_row').val(num+1);
  });

  //ลบคอลัม 
  $(document).on("click",".btn-del-row",function() {
      $(this).closest('tr').remove();
  });

  $(document).on("click",".btn-del-row-file",function() {
      let seq = $(this).data("seq");
      $(".flg-"+seq).val("").removeClass("suc-file"); 
      $(this).closest('tr').addClass('dis-none');
  });

  //เลือกไฟล์
  function list_file(r,la,sp,tsp){
      var fileName = r.files[0].name;
      var type       = r.files[0].type; 
      var id           = r.id;
      $('.'+la).removeClass('btn-primary not-file').addClass('btn-info suc-file');
      $('.'+sp).empty().html("<font class='fs-12' color='#ffffff'>รอบันทึก</font>"); 
      $('.'+tsp).text(" "+fileName);
  }
  //-----------------------ปิด------------------------//

//open modal add
  function modal_type(head,c,flg,doc_no){
     $('#hd_flg').val(flg);
     $('#md_num').val(1);
     //หัว modal
      $("#c_md").css('background-color' , c);
      $("#h_md").html('<b><font color="#ffffff">'+head+'</font></b>');
      //------------- ----------------------------------------
      $('#doc_no').val(doc_no); 
    
      //การกำหนดตารางให้สามารถกรอกได้หรือไม่ได้
          if(flg == "A"){
            $("#doc_no").prop("disabled", false);
            $("#doc_date").prop("disabled", false);
            $("#md_veh_start").prop("disabled", false);
            $("#md_veh_stop").prop("disabled", false);
            $("#md_veh_regis_no").prop("disabled", false);
            $("#md_veh_date_up").prop("disabled", false);
            $("#md_veh_time_start").prop("disabled", false);
            $("#md_veh_km_start").prop("disabled", false);
            $("#md_veh_type_list").prop("disabled", false);
            $("#md_veh_weight").prop("disabled", false);
              $("#modal_add").modal("show"); 
          }
          else if(flg == "E"){
            $("#doc_no").prop("disabled", true);
            $("#doc_date").prop("disabled", false);
            $("#md_veh_start").prop("disabled", false);
            $("#md_veh_stop").prop("disabled", false);
            $("#md_veh_regis_no").prop("disabled", false);
            $("#md_veh_date_up").prop("disabled", false);
            $("#md_veh_time_start").prop("disabled", false);
            $("#md_veh_km_start").prop("disabled", false);
            $("#md_veh_type_list").prop("disabled", false);
            $("#md_veh_weight").prop("disabled", false);   
              $("#modal_add").modal("show"); 

          }

          else{
            $("#doc_no").prop("disabled", true);
            $("#doc_date").prop("disabled", true);
            $("#md_veh_start").prop("disabled", true);
            $("#md_veh_start_name").prop("disabled", true);
            $("#md_veh_stop").prop("disabled", true);
            $("#md_veh_stop_name").prop("disabled", true);
            $("#md_veh_regis_no").prop("disabled", true);
            $("#md_veh_date_up").prop("disabled", true);
            $("#md_veh_time_start").prop("disabled", true);
            $("#md_veh_km_start").prop("disabled", true);
            $("#md_veh_type_list").prop("disabled", true);
            $("#md_veh_weight").prop("disabled", true);
              $("#modal_add").modal("show"); 
          }
          list_data_formuser_test(doc_no); 
          list_subroom(flg,doc_no);
  }  


// open modal add
  function modal_list(head,c,flg,doc_no){
     $('#hd_flg_c').val(flg);
     $('#md_num_c').val(1);
     $('#hd_num_row').val(1);
        $("#modaltable_file  tbody").empty(); 
      //------------- ----------------------------------------
      $('#doc_no_c').val(doc_no); 
    
      //การกำหนดตารางให้สามารถกรอกได้หรือไม่ได้
          if(flg == "B"){
            $("#md_veh_start_c").prop("disabled", true);
            $("#md_veh_stop_c").prop("disabled", true);
            $("#md_veh_regis_no_c").prop("disabled", true);
            $("#md_veh_date_up_c").prop("disabled", true);
            $("#md_veh_time_start_c").prop("disabled", true);
            $("#md_veh_km_start_c").prop("disabled", true);
            $("#md_veh_type_list_c").prop("disabled", true);
            $("#md_veh_weight_c").prop("disabled", true);       
            $("#md_veh_time_stop").prop("disabled", false);
            $("#md_veh_sum_time").prop("disabled", false);
            $("#md_veh_km_stop").prop("disabled", false);
            $("#md_veh_bearer").prop("disabled", false);
            $("#md_veh_date_drop").prop("disabled", false);
            $("#md_veh_pic").prop("disabled", false);
            $("#md_veh_note").prop("disabled", false);
      


          }
            list_subroom_c(flg,doc_no);
            list_data_formuser_approve(doc_no);
            $("#modal_approve").modal("show");  
  }  




//----------------------------------------------- ต้นทาง ----------------------------------------//

  function list_data_formuser_test(doc_no){ 
   $.ajax({
                      url    : url+"Mainapp/ajax_list_data_formuser_test",
                      data : { doc_no}, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){  
                              if(data){  
                              $("#md_veh_start").val(data.VEH_START).trigger('change'); 
                              $("#md_veh_stop").val(data.VEH_STOP).trigger('change');
                              $("#md_veh_regis_no").val(data.VEH_REGIS_NO).trigger('change');
                              $("#md_veh_date_up").val(data.VEH_DATE_UP).trigger('change');
                              $("#md_veh_time_start").val(data.VEH_TIME_START).trigger('change');
                              $("#md_veh_km_start").val(data.VEH_KM_START);
                              $("#md_veh_type_list").val(data.VEH_TYPE_LIST).trigger('change');
                              $("#md_veh_weight").val(data.VEH_WEIGHT);
                              $("#md_veh_start_name").val(data.VEH_START_NAME);
                              $("#md_veh_stop_name").val(data.VEH_STOP_NAME);                              
                              }
                            else{ 
                              $("#md_veh_start").val("").trigger('change'); //สำหรับเลือกข้อมูลแบบ dropdown
                              $("#md_veh_stop").val("").trigger('change');
                              $("#md_veh_regis_no").val("").trigger('change'); 
                              $("#md_veh_date_up").val("");
                              $("#md_veh_time_start").val("");
                              $("#md_veh_km_start").val("");
                              $("#md_veh_type_list").val("").trigger('change');
                              $("#md_veh_weight").val("");


                            }
                          },
                          error:function() {
                              alert_info('เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
                          }
                  });
  }

//------------------------------------ ยืนยันปลายทาง ---------------------------------//

  function list_data_formuser_approve(doc_no){ 
   $.ajax({
                      url    : url+"Mainapp/ajax_list_data_formuser_test",
                      data : { doc_no}, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){  
                              if(data){ 
                              $("#md_veh_start_c").val(data.VEH_START_NAME).trigger('change'); 
                              $("#md_veh_stop_c").val(data.VEH_STOP_NAME).trigger('change');
                              $("#md_veh_regis_no_c").val(data.VEH_REGIS_NO).trigger('change');
                              $("#md_veh_date_up_c").val(data.VEH_DATE_UP).trigger('change');
                              $("#md_veh_time_start_c").val(data.VEH_TIME_START).trigger('change');
                              $("#md_veh_km_start_c").val(data.VEH_KM_START);
                              $("#md_veh_type_list_c").val(data.VEH_TYPE_LIST).trigger('change');
                              $("#md_veh_weight_c").val(data.VEH_WEIGHT);

                              }
                            else{ 
                              $("#md_veh_start_c").val("").trigger('change'); 
                              $("#md_veh_stop_c").val("").trigger('change');
                              $("#md_veh_regis_no_c").val("").trigger('change');
                              $("#md_veh_date_up_c").val("").trigger('change');
                              $("#md_veh_time_start_c").val("").trigger('change');
                              $("#md_veh_km_start_c").val("");
                              $("#md_veh_type_list_c").val("").trigger('change');
                              $("#md_veh_weight_c").val("");


                            }
                          },
                          error:function() {
                              alert_info('เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
                          }
                  });
  }



// --------------------------------- save ต้นทาง----------------------------//
  $('#form_add').on('submit', function(e){
    e.preventDefault();
  let flg= $("#hd_flg").val();
                let md_veh_list_no                        = $("#md_veh_list_no").val(); 
                let md_veh_list                           = $("#md_veh_list").val();
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
                let test                                  = $("#test").val();
                // let stop1                                 = $("#stop1").val();
                let md_veh_note                           = $("#md_veh_note").val();
               

          let inputs   = $(".chk-val");
          let count = inputs.length;  
          let flg_val         = "Y";
              for(let i = 0; i < count; i++) {
                    if($(inputs[i]).val() == ""){       
                        flg_val = "";
                        break;
                    }
              }

     if (md_veh_start != "" && md_veh_stop != "" && md_veh_regis_no != ""&& md_veh_date_up != ""&& md_veh_time_start != ""&& md_veh_km_start != ""
      && md_veh_type_list != ""&& md_veh_weight != "" && flg_val == "Y"){
            $("#doc_no").prop("disabled", false);
            $("#doc_date").prop("disabled", false);
            $("#md_veh_start").prop("disabled", false);
            $("#md_veh_start_name").prop("disabled", false);
            $("#md_veh_stop").prop("disabled", false);
            $("#md_veh_stop_name").prop("disabled", false);
            $("#md_veh_regis_no").prop("disabled", false);
            $("#md_veh_date_up").prop("disabled", false);
            $("#md_veh_time_start").prop("disabled", false);
            $("#md_veh_km_start").prop("disabled", false);
            $("#md_veh_type_list").prop("disabled", false);
            $("#md_veh_weight").prop("disabled", false);
            $("#md_veh_time_stop").prop("disabled", false);
            $("#md_veh_sum_time").prop("disabled", false);
            $("#md_veh_km_stop").prop("disabled", false);
            $("#md_veh_bearer").prop("disabled", false);
            $("#md_veh_date_drop").prop("disabled", false);
            $("#test").prop("disabled", false);
            // $("#stop").prop("disabled", false);
            $("#md_veh_note").prop("disabled", false);


        $.ajax({
          url    : url+"Mainapp/ajax_save_formuser_test",
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




// --------------------------------- save ปลายทาง ----------------------------//

  $('#form_approve').on('submit', function(e){ 
    e.preventDefault();
  let flg= $("#hd_flg").val();
                let doc_no_c                              = $("#doc_no").val();
                let md_veh_time_stop                      = $("#md_veh_time_stop").val();
                let md_veh_sum_time                       = $("#md_veh_sum_time").val();
                let md_veh_km_stop                        = $("#md_veh_km_stop").val();
                let md_veh_bearer                         = $("#md_veh_bearer").val();
                let md_veh_date_drop                      = $("#md_veh_date_drop").val();
                let md_veh_pic                            = $("#md_veh_pic").val();
                let md_veh_note                           = $("#md_veh_note").val();
              


     if (md_veh_time_stop != "" && md_veh_km_stop != ""&& md_veh_bearer != ""&& md_veh_date_drop != ""){
       $('.not-file').closest('tr').remove();
        $.ajax({
          url    : url+"Mainapp/ajax_save_formuser_test_approve",
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



$('#md_veh_start').on('change', function(e) {
 let name = $("#md_veh_start option:selected").text(); 
 name = name.substr(6);
 // name = name.replace(/[a-zA-Z0-9-:]/g, ''); ใช้ไม่ได้เนื่องจากรหัสต้นทุนอันไหนเป็น eng จะหายไปหมด
 $("#test").val(name);
});

$('#md_veh_stop').on('change', function(e) {
 let name = $("#md_veh_stop option:selected").text(); 
  name = name.substr(6);
 $("#stop1").val(name);
});


    function START() {
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = md_veh_start.value == "xxx" ? "block" : "none";
    }

    function STOP() {
        var dvPassport = document.getElementById("stop");
        dvPassport.style.display = md_veh_stop.value == "xxx" ? "block" : "none";
    }



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
        // dom: 'Bfrtip',
        // buttons: [
        //   { extend: 'excel', className: 'btn btn-success fs-20 btn-lg',  exportOptions: {columns: ':not(.no-sort)'} } ,
        //   { extend: 'pageLength', className: 'btn btn-light fs-20 btn-lg'}     
        // ]

    });
       //$('.buttons-excel').html('<i class="fa fa-file-excel-o" /> Excel');

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


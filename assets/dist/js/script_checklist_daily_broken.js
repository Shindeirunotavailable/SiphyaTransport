 let url              = $('#te_url').val(); 
// open modal add
  function modal_spoil(head,c,flg,doc_no){
     $('#hd_flg_c').val(flg);
     $('#doc_no_c').val(doc_no); 
      //การกำหนดตารางให้สามารถกรอกได้หรือไม่ได้
          if(flg == "B"){
            $("#md_veh_time_c").prop("disabled", true);
            $("#md_veh_spoil_c").prop("disabled", false);
            $("#md_veh_regis_no_c").prop("disabled", false);
            $("#md_veh_type_code_c").prop("disabled", true);
            $("#md_veh_brand_code_c").prop("disabled", true);
            $("#md_veh_date_check_c").prop("disabled", true);
          }

            list_data_spoil(doc_no);
            $("#modal_spoil").modal("show");  
  }  



  function list_data_spoil(doc_no){ 
   $.ajax({
                      url    : url+"Mainapp/ajax_list_data_checklist_daily_broken",
                      data : { doc_no}, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){  
                              if(data){ 
                              $("#md_veh_time_c").val(data.VEH_TIME); 
                              $("#md_veh_spoil_c").val(data.VEH_CAR_NOTE).trigger('change');
                              $("#md_veh_regis_no_c").val(data.VEH_REGIS_NO).trigger('change');
                              $("#md_veh_type_code_c").val(data.VEH_TYPE_CAR).trigger('change');
                              $("#md_veh_brand_code_c").val(data.VEH_BRAND).trigger('change');
                              $("#md_veh_date_check_c").val(data.DOC_DATE);
                              }
                            else{ 
                              $("#md_veh_time_c").val(""); 
                              $("#md_veh_spoil_c").val("").trigger('change');
                              $("#md_veh_regis_no_c").val("").trigger('change');
                              $("#md_veh_type_code_c").val("").trigger('change');
                              $("#md_veh_brand_code_c").val("").trigger('change');
                              $("#md_veh_date_check_c").val("");

                            }
                          },
                          error:function() {
                              alert_info('เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
                          }
                  });
 }

// --------------------------------- save ปลายทาง ----------------------------//

  $('#form_approve').on('submit', function(e){ 
    e.preventDefault();
  let flg= $("#hd_flg").val();
                let doc_no_c                                     = $("#doc_no_c").val();
                let md_veh_time_c                                = $("#md_veh_start_c").val();
                let md_veh_spoil_c                               = $("#md_veh_stop_c").val();
                let md_veh_regis_no_c                            = $("#md_veh_regis_no_c").val();
                let md_veh_type_code_c                           = $("#md_veh_type_code_c").val();
                let md_veh_brand_code_c                          = $("#md_veh_brand_code_c").val();
                let md_veh_date_check_c                          = $("#md_veh_date_check_c").val();
            
     if (md_veh_time_c != "" && md_veh_spoil_c != ""&& md_veh_regis_no_c != ""&& md_veh_type_code_c != "" && md_veh_brand_code_c != "" && md_veh_date_check_c != "" ){
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





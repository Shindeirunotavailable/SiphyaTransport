 
let url              = $('#te_url').val(); 

//open modal add
  function modal_type(head,c,flg,veh_emp_no){
     $('#hd_flg').val(flg);
     //หัว modal
      $("#a_md").css('background-color' , c);
      $("#f_md").html('<b><font color="#ffffff">'+head+'</font></b>');
      //------------- ----------------------------------------
      $('#md_veh_emp_no').val(veh_emp_no); 
    
      //การกำหนดตารางให้สามารถกรอกได้หรือไม่ได้
          if(flg == "A"){
            $("#md_veh_emp_no").prop("disabled", false);
            $("#md_veh_id_card").prop("disabled", false);
            $("#md_veh_regis_no").prop("disabled", false);
            $("#md_veh_emp_name").prop("disabled", false);
            $("#md_veh_brith_day").prop("disabled", false);
            $("#md_veh_age").prop("disabled", false);
            $("#md_veh_tell").prop("disabled", false);
            $("#md_veh_address").prop("disabled", false);
            $("#md_veh_driver_id").prop("disabled", false);
            $("#md_veh_driver_type").prop("disabled", false);
            $("#md_veh_issue_date").prop("disabled", false);
            $("#md_veh_expirt_date").prop("disabled", false);
            $("#md_veh_start_work_date").prop("disabled", false);
            $("#md_veh_work_age").prop("disabled", false);
            $("#md_veh_position_name").prop("disabled", false);
            $("#md_veh_type_code").prop("disabled", false);
            $("#md_veh_note_resign").prop("disabled", true);
            $("#md_veh_date_resign").prop("disabled", true);
          }
          else if(flg == "E"){
            $("#md_veh_emp_no").prop("disabled", true);
            $("#md_veh_id_card").prop("disabled", false);
            $("#md_veh_regis_no").prop("disabled", false);
            $("#md_veh_emp_name").prop("disabled", false);
            $("#md_veh_brith_day").prop("disabled", false);
            $("#md_veh_age").prop("disabled", false);
            $("#md_veh_tell").prop("disabled", false);
            $("#md_veh_address").prop("disabled", false);
            $("#md_veh_driver_id").prop("disabled", false);
            $("#md_veh_driver_type").prop("disabled", false);
            $("#md_veh_issue_date").prop("disabled", false);
            $("#md_veh_expirt_date").prop("disabled", false);
            $("#md_veh_start_work_date").prop("disabled", false);
            $("#md_veh_work_age").prop("disabled", false);
            $("#md_veh_position_name").prop("disabled", false);
            $("#md_veh_type_code").prop("disabled", false);
            $("#md_veh_note_resign").prop("disabled", true); 
            $("#md_veh_date_resign").prop("disabled", true);

          }
          else if(flg == "F"){
            $("#md_veh_emp_no").prop("disabled", true);
            $("#md_veh_id_card").prop("disabled", true);
            $("#md_veh_regis_no").prop("disabled", true);
            $("#md_veh_emp_name").prop("disabled", true);
            $("#md_veh_brith_day").prop("disabled", true);
            $("#md_veh_age").prop("disabled", true);
            $("#md_veh_tell").prop("disabled", true);
            $("#md_veh_address").prop("disabled", true);
            $("#md_veh_driver_id").prop("disabled", true);
            $("#md_veh_driver_type").prop("disabled", true);
            $("#md_veh_issue_date").prop("disabled", true);
            $("#md_veh_expirt_date").prop("disabled", true);
            $("#md_veh_start_work_date").prop("disabled", true);
            $("#md_veh_work_age").prop("disabled", true);
            $("#md_veh_position_name").prop("disabled", true);
            $("#md_veh_type_code").prop("disabled", true);
            $("#md_veh_note_resign").prop("disabled", false);
            $("#md_veh_date_resign").prop("disabled", false);
          }          
          else{
            $("#md_veh_emp_no").prop("disabled", true);
            $("#md_veh_id_card").prop("disabled", true);
            $("#md_veh_regis_no").prop("disabled", true);
            $("#md_veh_emp_name").prop("disabled", true);
            $("#md_veh_brith_day").prop("disabled", true);
            $("#md_veh_age").prop("disabled", true);
            $("#md_veh_tell").prop("disabled", true);
            $("#md_veh_address").prop("disabled", true);
            $("#md_veh_driver_id").prop("disabled", true);
            $("#md_veh_driver_type").prop("disabled", true);
            $("#md_veh_issue_date").prop("disabled", true);
            $("#md_veh_expirt_date").prop("disabled", true);
            $("#md_veh_start_work_date").prop("disabled", true);
            $("#md_veh_work_age").prop("disabled", true);
            $("#md_veh_position_name").prop("disabled", true);
            $("#md_veh_type_code").prop("disabled", true);
            $("#md_veh_note_resign").prop("disabled", true);
            $("#md_veh_date_resign").prop("disabled", true);

          }
          list_data_driver(veh_emp_no);
          $("#modal_add").modal("show");  
  }  

  function list_data_driver(veh_emp_no){ 
   $.ajax({
                      url    : url+"Mainapp/ajax_list_data_driver",
                      data : { veh_emp_no}, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){  
                              if(data){
                              $("#md_veh_emp_no").val(data.VEH_EMP_NO);  
                              $("#md_veh_id_card").val(data.VEH_ID_CARD); //.trigger('change') สำหรับเลือกข้อมูลแบบ dropdown
                              $("#md_veh_regis_no").val(data.VEH_REGIS_NO).trigger('change'); //สำหรับเลือกข้อมูลแบบ dropdown
                              $("#md_veh_emp_name").val(data.VEH_EMP_NAME);
                              $("#md_veh_brith_day").val(data.VEH_BIRTH_DAY);
                              $("#md_veh_age").val(data.VEH_AGE);
                              $("#md_veh_tell").val(data.VEH_TELL);
                              $("#md_veh_address").val(data.VEH_ADDRESS);
                              $("#md_veh_driver_id").val(data.VEH_DRIVER_ID);
                              $("#md_veh_driver_type").val(data.VEH_DRIVER_TYPE).trigger('change');
                              $("#md_veh_issue_date").val(data.VEH_ISSUE_DATE);
                              $("#md_veh_expirt_date").val(data.VEH_EXPIRY_DATE);
                              $("#md_veh_start_work_date").val(data.VEH_START_WORK_DATE);
                              $("#md_veh_work_age").val(data.VEH_WORK_AGE);
                              $("#md_veh_note_resign").val(data.VEH_NOTE_RESIGN);
                              $("#md_veh_date_resign").val(data.DATE_RESIGN);
                              $("#md_veh_position_name").val(data.VEH_POSITION_NAME);
                              $("#md_veh_type_code").val(data.VEH_TYPE_CODE).trigger('change');
                              $(".emp_avatar").attr("src",url+"avatar/"+data.VEH_EMP_PIC);
                              }
                            else{
                              $("#md_veh_emp_no").val("");  
                              $("#md_veh_id_card").val(""); //.trigger('change') สำหรับเลือกข้อมูลแบบ dropdown
                              $("#md_veh_regis_no").val("").trigger('change'); //สำหรับเลือกข้อมูลแบบ dropdown
                              $("#md_veh_emp_name").val("");
                              $("#md_veh_brith_day").val("");
                              $("#md_veh_age").val("");
                              $("#md_veh_tell").val("");
                              $("#md_veh_address").val("");
                              $("#md_veh_driver_id").val("");
                              $("#md_veh_driver_type").val("").trigger('change');
                              $("#md_veh_issue_date").val("");
                              $("#md_veh_expirt_date").val("");
                              $("#md_veh_start_work_date").val("");
                              $("#md_veh_work_age").val("");
                              $("#md_veh_position_name").val("");
                              $("#md_veh_note_resign").val("");
                              $("#md_veh_date_resign").val("");
                              $("#md_veh_type_code").val("").trigger('change');
                            }
                          },
                          error:function() {
                              alert_info('เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
                          }
                  });
  }
  
//    บันทึก add
  $('#form_add').on('submit', function(e){
    e.preventDefault();
  let flg= $("#hd_flg").val();
  let md_veh_emp_no            = $("#md_veh_emp_no").val();
  let md_veh_id_card           = $("#md_veh_id_card").val();
  let md_veh_regis_no          = $("#md_veh_regis_no").val();
  let md_veh_emp_name          = $("#md_veh_emp_name").val();
  let md_veh_brith_day         = $("#md_veh_brith_day").val();
  let md_veh_age               = $("#md_veh_age").val();
  let md_veh_tell              = $("#md_veh_tell").val();
  let md_veh_address           = $("#md_veh_address").val();
  let md_veh_driver_id         = $("#md_veh_driver_id").val();
  let md_veh_driver_type       = $("#md_veh_driver_type").val();
  let md_veh_issue_date        = $("#md_veh_issue_date").val();
  let md_veh_expirt_date       = $("#md_veh_expirt_date").val();
  let md_veh_start_work_date   = $("#md_veh_start_work_date").val();
  let md_veh_work_age          = $("#md_veh_work_age").val()
  let md_veh_position_name     = $("#md_veh_position_name").val();
  let md_veh_type_code          = $("#md_veh_type_code").val();

     if (md_veh_emp_no != "" && md_veh_id_card != "" && md_veh_regis_no != ""&& md_veh_emp_name != ""&& md_veh_brith_day != ""&& md_veh_age != ""&& md_veh_tell != ""
     && md_veh_address != ""&& md_veh_driver_id != ""&& md_veh_driver_type != ""&& md_veh_issue_date != ""&& md_veh_expirt_date != ""&& md_veh_start_work_date != ""&& md_veh_work_age != ""
     && md_veh_position_name != ""&& md_veh_type_code != "" ){
      //เคลียร์ค่าก่อน save
            $("#md_veh_emp_no").prop("disabled", false);
            $("#md_veh_id_card").prop("disabled", false);
            $("#md_veh_regis_no").prop("disabled", false);
            $("#md_veh_emp_name").prop("disabled", false);
            $("#md_veh_brith_day").prop("disabled", false);
            $("#md_veh_age").prop("disabled", false);
            $("#md_veh_tell").prop("disabled", false);
            $("#md_veh_address").prop("disabled", false);
            $("#md_veh_driver_id").prop("disabled", false);
            $("#md_veh_driver_type").prop("disabled", false);
            $("#md_veh_issue_date").prop("disabled", false);
            $("#md_veh_expirt_date").prop("disabled", false);
            $("#md_veh_start_work_date").prop("disabled", false);
            $("#md_veh_work_age").prop("disabled", false);
            $("#md_veh_position_name").prop("disabled", false);
            $("#md_veh_type_code").prop("disabled", false);
            $("#md_veh_note_resign").prop("disabled", false);
            $("#md_veh_date_resign").prop("disabled", false);

        $.ajax({
          url    : url+"Mainapp/ajax_save_driver",
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
let cartype=$('#hd_ft_veh_grp_code').val();
$('#ft_veh_grp_code').val(cartype).trigger('change');
let regis=$('#hd_ft_veh_regis_no').val();
$('#ft_veh_regis_no').val(regis).trigger('change'); 

  });


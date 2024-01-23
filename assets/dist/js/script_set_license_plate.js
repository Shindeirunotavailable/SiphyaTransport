 
let url              = $('#te_url').val(); 

//open modal add
  function modal_type(head,c,flg,veh_regis_no){
     $('#hd_flg').val(flg);
     //หัว modal
      $("#c_md").css('background-color' , c);
      $("#h_md").html('<b><font color="#ffffff">'+head+'</font></b>');
      //------------- ----------------------------------------
      $('#md_veh_regis_no').val(veh_regis_no); 
    
      //การกำหนดตารางให้สามารถกรอกได้หรือไม่ได้
          if(flg == "A"){
            $("#md_veh_regis_no").prop("disabled", false);
            $("#md_veh_brand_code").prop("disabled", false);
            $("#md_veh_type_code").prop("disabled", false);
            $("#md_veh_body_weight").prop("disabled", false);
            $("#md_veh_lading_weight").prop("disabled", false);
            $("#md_veh_law_weight").prop("disabled", false);
            $("#md_veh_number_car").prop("disabled", false);
            $("#md_veh_number_engine").prop("disabled", false);
          }
          else if(flg == "E"){
            $("#md_veh_regis_no").prop("disabled", true);
            $("#md_veh_brand_code").prop("disabled", false);
            $("#md_veh_type_code").prop("disabled", false);
            $("#md_veh_body_weight").prop("disabled", false);
            $("#md_veh_lading_weight").prop("disabled", false);
            $("#md_veh_law_weight").prop("disabled", false);
            $("#md_veh_number_car").prop("disabled", false);
            $("#md_veh_number_engine").prop("disabled", false);            
          }
          else{
            $("#md_veh_regis_no").prop("disabled", true);
            $("#md_veh_brand_code").prop("disabled", true);
            $("#md_veh_type_code").prop("disabled", true);
            $("#md_veh_body_weight").prop("disabled", true);
            $("#md_veh_lading_weight").prop("disabled", true);
            $("#md_veh_law_weight").prop("disabled", true);
            $("#md_veh_number_car").prop("disabled", true);
            $("#md_veh_number_engine").prop("disabled", true);            
          }
          list_data_license_plate(veh_regis_no);
      $("#modal_add").modal("show"); 
  }  

  function list_data_license_plate(veh_regis_no){ 
   $.ajax({
                      url    : url+"Mainapp/ajax_list_data_license_plate",
                      data : { veh_regis_no}, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){  
                              if(data){
                              $("#md_veh_regis_no").val(data.VEH_REGIS_NO);  
                              $("#md_veh_brand_code").val(data.VEH_BRAND_CODE).trigger('change'); //.trigger('change') สำหรับเลือกข้อมูลแบบ dropdown
                              $("#md_veh_type_code").val(data.VEH_TYPE_CODE).trigger('change'); //สำหรับเลือกข้อมูลแบบ dropdown
                              $("#md_veh_body_weight").val(data.VEH_BODY_WEIGHT);
                              $("#md_veh_lading_weight").val(data.VEH_LADING_WEIGHT);
                              $("#md_veh_law_weight").val(data.VEH_LAW_WEIGHT);
                              $("#md_veh_number_car").val(data.VEH_NUMBER_CAR);
                              $("#md_veh_number_engine").val(data.VEH_NUMBER_ENGINE);                          
                              }
                          },
                          error:function() {
                              alert_info('เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
                          }
                  });
  }

   //บันทึก add
  $('#addData').on('click', function(){ 
  let flg= $("#hd_flg").val();
  let md_veh_regis_no         = $("#md_veh_regis_no").val();
  let md_veh_brand_code       = $("#md_veh_brand_code").val();
  let md_veh_type_code        = $("#md_veh_type_code").val();
  let md_veh_body_weight      = $("#md_veh_body_weight").val();
  let md_veh_lading_weight    = $("#md_veh_lading_weight").val();
  let md_veh_law_weight       = $("#md_veh_law_weight").val();
  let md_veh_number_car       = $("#md_veh_number_car").val();
  let md_veh_number_engine    = $("#md_veh_number_engine").val();    
     if (md_veh_regis_no != "" && md_veh_brand_code != "" && md_veh_type_code != ""){
                $.ajax({
                      url    : url+"Mainapp/ajax_save_license_plate",
                      data : { flg,md_veh_regis_no,md_veh_brand_code,md_veh_type_code,md_veh_body_weight,md_veh_lading_weight,md_veh_law_weight,md_veh_number_car,md_veh_number_engine}, 
                      type  : "POST",
                      dataType: "json",
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
                                 alert_info("มีประเภทรถนี้แล้ว")
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
let car=$('#hd_ft_veh_type_code').val(); 
$('#ft_veh_type_code').val(car).trigger('change'); 
let regis=$('#hd_ft_veh_regis_no').val();
$('#ft_veh_regis_no').val(regis).trigger('change'); 
  });


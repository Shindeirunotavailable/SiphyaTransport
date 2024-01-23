 
let url              = $('#te_url').val(); 

//open modal add
  function modal_type(head,c,flg,veh_type_code){
     $('#hd_flg').val(flg);
     //หัว modal
      $("#c_md").css('background-color' , c);
      $("#h_md").html('<b><font color="#ffffff">'+head+'</font></b>');
      //------------- ----------------------------------------
      $('#md_veh_type_code').val(veh_type_code);    
          if(flg == "A"){
            $("#md_veh_type_code").prop("disabled", false);
            $("#md_veh_type_name").prop("disabled", false);
            $("#md_veh_grp_type").prop("disabled", false);
          }
          else if(flg == "E"){
            $("#md_veh_type_code").prop("disabled", true);
            $("#md_veh_type_name").prop("disabled", false);
            $("#md_veh_grp_type").prop("disabled", true);
          }
          else{
            $("#md_veh_type_code").prop("disabled", true);
            $("#md_veh_type_name").prop("disabled", true);
            $("#md_veh_grp_type").prop("disabled", true);
          }
          list_data_cartype(veh_type_code);
          $("#modal_add").modal("show"); 
  }  

  function list_data_cartype(veh_type_code){
   $.ajax({
                      url    : url+"Mainapp/ajax_list_data_cartype",
                      data : {veh_type_code}, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){ 
                              if(data){
                              $("#md_veh_type_code").val(data.VEH_TYPE_CODE);
                              $("#md_veh_type_name").val(data.VEH_TYPE_NAME);
                              $("#md_veh_grp_type").val(data.VEH_GRP_TYPE);
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
  let md_veh_type_code     = $("#md_veh_type_code").val().trim();
  let md_veh_type_name     = $("#md_veh_type_name").val().trim();
  let md_veh_grp_type     = $("#md_veh_grp_type").val().trim();
     if (md_veh_type_code != "" && md_veh_type_name != ""&& md_veh_grp_type != ""){
                $.ajax({
                      url    : url+"Mainapp/ajax_save_cartype",
                      data : { flg, md_veh_type_code , md_veh_type_name ,md_veh_grp_type }, 
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
let crytype=$('#hd_ft_veh_type_code').val();
$('#ft_veh_type_code').val(crytype).trigger('change'); 
  });


  
let url              = $('#te_url').val(); 

//open modal add
  function modal_type(head,c,flg,veh_brand_code){
     $('#hd_flg').val(flg);
     //หัว modal
      $("#c_md").css('background-color' , c);
      $("#h_md").html('<b><font color="#ffffff">'+head+'</font></b>');
      //------------- ----------------------------------------
      $('#md_veh_brand_code').val(veh_brand_code); 
    
      
          if(flg == "A"){
            $("#md_veh_brand_code").prop("disabled", false);
            $("#md_veh_brand_name").prop("disabled", false);
          
          }
          else if(flg == "E"){
            $("#md_veh_brand_code").prop("disabled", true);
            $("#md_veh_brand_name").prop("disabled", false);
           
          }
          else{
            $("#md_veh_brand_code").prop("disabled", true);
            $("#md_veh_brand_name").prop("disabled", true);
       
          }
          list_data_car(veh_brand_code);
      $("#modal_add").modal("show"); 
  }  

  function list_data_car(veh_brand_code){
   $.ajax({
                      url    : url+"Mainapp/ajax_list_data_car",
                      data : { veh_brand_code}, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){  
                              if(data){
                              $("#md_veh_brand_code").val(data.VEH_BRAND_CODE);
                              $("#md_veh_brand_name").val(data.VEH_BRAND_NAME);
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
  let md_veh_brand_code     = $("#md_veh_brand_code").val().trim();
  let md_veh_brand_name     = $("#md_veh_brand_name").val().trim();
     if (md_veh_brand_code != "" && md_veh_brand_name != ""){
                $.ajax({
                      url    : url+"Mainapp/ajax_save_car",
                      data : { flg, md_veh_brand_code , md_veh_brand_name}, 
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
                                 alert_info("มีชนิดรถนี้แล้ว")
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
let crytype=$('#hd_ft_veh_brand_code').val();
$('#ft_veh_brand_code').val(crytype).trigger('change'); 
  });


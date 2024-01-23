let url              = $('#te_url').val(); 

//open modal add
  function modal_add(head,c,flg,doc_no){
     $('#hd_flg').val(flg);
     //หัว modal
      $("#c_md").css('background-color' , c);
      $("#h_md").html('<b><font color="#ffffff">'+head+'</font></b>');
      //------------- ----------------------------------------
      $('#doc_no').val(doc_no); 
    
      //การกำหนดตารางให้สามารถกรอกได้หรือไม่ได้
          if(flg == "A"){
            $("#doc_no").prop("disabled", false);
            $("#doc_date").prop("disabled", false);
            $("#md_veh_origin").prop("disabled", false);
            // $("#md_veh_license_plate").prop("disabled", false);
            $("#md_veh_deliver_date").prop("disabled", false);
            $("#md_veh_departure_time").prop("disabled", false);
            $("#md_veh_mileage_defore_departure").prop("disabled", false);
            $("#md_veh_travel_to").prop("disabled", false);
            $("#md_veh_load_weight").prop("disabled", false);
            $("#md_veh_transport_list").prop("disabled", false);
            $("#md_veh_arrival_time").prop("disabled", false);
            $("#md_veh_sum_reavel_time").prop("disabled", false);
            $("#md_veh_mileage_destination").prop("disabled", false);
            $("#md_veh_recipient").prop("disabled", false);
            $("#md_veh_date_posting_product").prop("disabled", false);
            $("#md_veh_odstacle").prop("disabled", false);
            $("#md_veh_note").prop("disabled", false);
            $("#md_veh_list").prop("disabled", false);
          }
          else if(flg == "E"){
            $("#doc_no").prop("disabled", false);
            $("#doc_date").prop("disabled", false);
            $("#md_veh_origin").prop("disabled", false);
            // $("#md_veh_license_plate").prop("disabled", false);
            $("#md_veh_deliver_date").prop("disabled", false);
            $("#md_veh_departure_time").prop("disabled", false);
            $("#md_veh_mileage_defore_departure").prop("disabled", false);
            $("#md_veh_travel_to").prop("disabled", false);
            $("#md_veh_load_weight").prop("disabled", false);
            $("#md_veh_transport_list").prop("disabled", false);
            $("#md_veh_arrival_time").prop("disabled", false);
            $("#md_veh_sum_reavel_time").prop("disabled", false);
            $("#md_veh_mileage_destination").prop("disabled", false);
            $("#md_veh_recipient").prop("disabled", false);
            $("#md_veh_date_posting_product").prop("disabled", false);
            $("#md_veh_odstacle").prop("disabled", false);
            $("#md_veh_note").prop("disabled", false);
            $("#md_veh_list").prop("disabled", false);

          }
          else{
            $("#doc_no").prop("disabled", true);
            $("#doc_date").prop("disabled", true);
            $("#md_veh_origin").prop("disabled", true);
            // $("#md_veh_license_plate").prop("disabled", true);
            $("#md_veh_deliver_date").prop("disabled", true);
            $("#md_veh_departure_time").prop("disabled", true);
            $("#md_veh_mileage_defore_departure").prop("disabled", true);
            $("#md_veh_travel_to").prop("disabled", true);
            $("#md_veh_load_weight").prop("disabled", true);
            $("#md_veh_transport_list").prop("disabled", true);
            $("#md_veh_arrival_time").prop("disabled", true);
            $("#md_veh_sum_reavel_time").prop("disabled", true);
            $("#md_veh_mileage_destination").prop("disabled", true);
            $("#md_veh_recipient").prop("disabled", true);
            $("#md_veh_date_posting_product").prop("disabled", true);
            $("#md_veh_odstacle").prop("disabled", true);
            $("#md_veh_note").prop("disabled", true);
            $("#md_veh_list").prop("disabled", true);

          }
          list_data_formuser(doc_no);
      $("#modal_add").modal("show");  
  }  

  function list_data_formuser(doc_no){ console.log(doc_no);
   $.ajax({
                      url    : url+"Mainapp/ajax_list_data_formuser",
                      data : { doc_no}, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){  
                              if(data){
                              $("#doc_no").val(data.DOC_NO);  
                              $("#doc_date").val(data.DO_DATE); //.trigger('change') สำหรับเลือกข้อมูลแบบ dropdown
                              $("#md_veh_origin").val(data.VEH_ORIGIN); //สำหรับเลือกข้อมูลแบบ dropdown
                              // $("#md_veh_license_plate").val(data.VEH_LICANSE_PLATE);
                              $("#md_veh_deliver_date").val(data.VEH_DELIVER_DATE);
                              $("#md_veh_departure_time").val(data.VEH_DEPARTURE_TIME);
                              $("#md_veh_mileage_defore_departure").val(data.VEH_MILEAGE_DEFORE_DEPARTURE);
                              $("#md_veh_travel_to").val(data.VEH_TRAVEL_TO);
                              $("#md_veh_load_weight").val(data.VEH_LOAD_WEIGHT);
                              $("#md_veh_transport_list").val(data.VEH_TRANSPORT_LIST);
                              $("#md_veh_arrival_time").val(data.VEH_ARRIVAL_TIME);
                              $("#md_veh_sum_reavel_time").val(data.VEH_SUM_REAVEL_TIME);
                              $("#md_veh_mileage_destination").val(data.VEH_VEH_MILEAGE_DESTINATION);
                              $("#md_veh_recipient").val(data.VEH_RECIPIENT);
                              $("#md_veh_date_posting_product").val(data.VEH_DATA_POSTING_PRODUCT);
                              $("#md_veh_odstacle").val(data.VEH_ODSTACLE);
                              $("#md_veh_note").val(data.VEH_NOTE);
                              $("#md_veh_list").val(data.VEH_LIST);
                              $("#md_veh_regis_no").val(data.VEH_REGIS_NO);
                              }
                            // else{
                            //   $("#doc_no").val(""); //.val จะลบค่าว่างออก ไม่ใส่ในdropdown
                            //   $("#doc_date").val("");
                            //   $("#md_veh_origin").val("");
                            //   // $("#md_veh_license_plate").val("");
                            //   $("#md_veh_deliver_date").val("");
                            //   $("#md_veh_departure_time").val("");
                            //   $("#md_veh_mileage_defore_departure").val("");
                            //   $("#md_veh_travel_to").val("");
                            //   $("#md_veh_load_weight").val("");
                            //   $("#md_veh_transport_list").val("");
                            //   $("#md_veh_arrival_time").val("");
                            //   $("#md_veh_sum_reavel_time").val("");
                            //   $("#md_veh_mileage_destination").val("");
                            //   $("#md_veh_recipient").val("");
                            //   $("#md_veh_date_posting_product").val("");
                            //   $("#md_veh_odstacle").val("");
                            //   $("#md_veh_note").val("");
                            //   $("#md_veh_list").val("");
                            //   $("#md_veh_regis_no").val("");
                            // }
                          },
                          error:function() {
                              alert_info('เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
                          }
                  });
  }
// //    บันทึก add
                $('#addData').on('click', function(){ 
                let flg=$("#flg").val();
                let doc_no                               = $("#doc_no").val();
                let doc_date                             = $("#doc_date").val();
                let md_veh_origin                        = $("#md_veh_origin").val().trim();
                let md_veh_deliver_date                  = $("#md_veh_deliver_date").val();
                let md_veh_departure_time                = $("#md_veh_departure_time").val();
                let md_veh_mileage_defore_departure      = $("#md_veh_mileage_defore_departure").val().trim();
                let md_veh_travel_to                     = $("#md_veh_travel_to").val().trim();
                let md_veh_load_weight                   = $("#md_veh_load_weight").val().trim();
                let md_veh_transport_list                = $("#md_veh_transport_list").val().trim();
                let md_veh_arrival_time                  = $("#md_veh_arrival_time").val().trim();
                let md_veh_sum_reavel_time               = $("#md_veh_sum_reavel_time").val().trim();
                let md_veh_mileage_destination           = $("#md_veh_mileage_destination").val().trim();
                let md_veh_recipient                     = $("#md_veh_recipient").val().trim();
                let md_veh_date_posting_product          = $("#md_veh_date_posting_product").val().trim();
                let md_veh_odstacle                      = $("#md_veh_odstacle").val().trim();
                let md_veh_note                          = $("#md_veh_note").val();
                let md_veh_list                          = $("#md_veh_list").val();
                let md_veh_regis_no                      = $("#md_veh_regis_no").val().trim();     
                   if (md_veh_origin != "" && md_veh_travel_to != "" && md_veh_transport_list != "" ){

                $.ajax({
                      url    : url+"Mainapp/ajax_save_formuser",
                      data : { flg,doc_no,doc_date,md_veh_origin,md_veh_deliver_date,md_veh_departure_time
                        ,md_veh_mileage_defore_departure,md_veh_travel_to,md_veh_load_weight,md_veh_transport_list
                        ,md_veh_arrival_time,md_veh_sum_reavel_time,md_veh_mileage_destination,md_veh_recipient,md_veh_date_posting_product
                        ,md_veh_odstacle,md_veh_note,md_veh_list,md_veh_regis_no}, 
                     

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
let doc_no=$('#hd_ft_doc_no').val();
$('#ft_doc_no').val(doc_no).trigger('change');
let regis_no=$('#hd_ft_veh_regis_no').val();
$('#ft_veh_regis_no').val(regis_no).trigger('change');
  });


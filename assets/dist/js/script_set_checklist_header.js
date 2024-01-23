 
let url              = $('#te_url').val(); 
//open modal add
  function modal_type(head,c,flg,veh_title_seq){ 
     $('#hd_flg').val(flg);
      $("#modalTable_add > tbody").empty(); 


     //หัว modal
      $("#c_md").css('background-color' , c);
      $("#h_md").html('<b><font color="#ffffff">'+head+'</font></b>');
      //------------- ----------------------------------------
      $('#md_veh_title_seq').val(veh_title_seq); 
      $('#md_veh_type_code').val("").trigger('change'); 
      //การกำหนดตารางให้สามารถกรอกได้หรือไม่ได้
          if(flg == "A"){
            $("#md_veh_title_seq").prop("disabled", false);
            $("#md_veh_title_list").prop("disabled", false);
            $("#md_veh_type_code").prop("disabled", false);
          }
          else if(flg == "E"){
            $("#md_veh_title_seq").prop("disabled", true);
            $("#md_veh_title_list").prop("disabled", false);
            $("#md_veh_type_code").prop("disabled", false);
          }

          else{
            $("#md_veh_title_seq").prop("disabled", true);
            $("#md_veh_title_list").prop("disabled", true);
            $("#md_veh_type_code").prop("disabled", true);   
          }
          list_type_tb(veh_title_seq,flg);
          $("#modal_add").modal("show");
  }  

  function list_type_tb(veh_title_seq,flg){ 
      var url  = $('#te_url').val(); 
          $.ajax({ 
                url : url+"Mainapp/ajax_list_data_check", 
                data: { veh_title_seq }, 
                type: "POST",
                dataType: "json",
                success:function(data) {  
                    if (data.arr_header) {
                         $.each(data.arr_header, function(key, value){  
                             $('#md_veh_title_list').val(value.VEH_TITLE_LIST);     
                        });                      
                    }
                    if(data.arr_list){
                        $.each(data.arr_list, function(key, value){  
                              var body    =  $("<tr class='table-light'></tr>");
                                $("<td width='20%' ><br><input type='text'  class='form-control' name='arr_prd["+value.VEH_TYPE_CODE+"][]' value='"+value.VEH_GRP_CODE+"' readonly></td>").appendTo(body);
                                $("<td width='20%' ><br><input type='text'  class='form-control chk-prd' name='arr_prd["+value.VEH_TYPE_CODE+"][]' value='"+value.VEH_TYPE_CODE+"' readonly></td>").appendTo(body);
                                $("<td width='40%' ><br><input type='text'  class='form-control'  value='"+value.VEH_TYPE_NAME+"' readonly></td>").appendTo(body);
                                $("<td class='txt-center'> "+(flg == "D" ? "" : "<button type='button' class='btn btn-danger but-del-tb' onclick='deleteRow(this)'><i class='fa fa-times'></i></button>")+"</td>").appendTo(body);
                                 $('#modalTable_add > tbody:last').append(body); 
                                                $('#modalTable_add > tbody:last').append(body); 
                        }); 
                    }
                },
                error:function(data) { 
                    alert("เกิดข้อผิดพลาด ลองใหม่อีกครั้ง");
                }
          });  
  }  

      function deleteRow(r){ // ลบ
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("modalTable_add").deleteRow(i);
      }

//เลือกข้อมูลใน Dropdowm
  $('#md_veh_type_code').on('change', function(){ 
    var name  = $('#md_veh_type_code option:selected').text(); 
    var grp_type  = $('#md_veh_type_code').val(); 
    var myarr          = name.split(" : ");
          if(grp_type){
                 //เช็คว่ามีประเภทนี้หรือยัง----------------------
                      var sta              = "Y";
                      var inputs         = $(".chk-prd");
                      var count_s = $('.chk-prd').length; 
                        for(var i = 0; i < count_s; i++) {
                              if(myarr[0] == $(inputs[i]).val()){
                                  sta     = "";
                                  break;
                              }
                        } 
                  if(sta == "Y"){

                    $.ajax({
                      url    : url+"Mainapp/ajax_list_data_checkgrub",
                      data : { grp_type }, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){ 
                                if(data){ 
                                  var grp =data.VEH_GRP_TYPE;  
                                    var body    =  $("<tr class='table-light'></tr>"); 
                                    $("<td width='20%' ><br><input type='text'  class='form-control' name='arr_prd["+myarr[0]+"][]' value='"+grp+"' readonly></td>").appendTo(body) ;
                                    $("<td width='20%' ><br><input type='text'  class='form-control chk-prd' name='arr_prd["+myarr[0]+"][]' value='"+myarr[0]+"' readonly></td>").appendTo(body);
                                    $("<td ><br><input type='text'  class='form-control'  value='"+myarr[1]+"' readonly></td>").appendTo(body);                                              
                                    $("<td width='20%'class='txt-center'><br><button type='button' class='btn btn-danger but-del-tb' onclick='deleteRow(this)'><i class='fa fa-times'></i></button></td>").appendTo(body);
                                    $('#modalTable_add > tbody:last').append(body); 
                                }

                          },
                          error:function() {
                                 alert("เกิดข้อผิดพลาด ลองใหม่อีกครั้ง");
                          }
                  });


                  }
        }
  });


  //บันทึก add
  $('#addData').on('click', function(){ 
      var flg                   = $("#hd_flg").val();
      let md_veh_title_seq      = $("#md_veh_title_seq").val(); 
      let md_veh_title_list     = $("#md_veh_title_list").val();
      var rowCount              = $('#modalTable_add tr').length;

            if(md_veh_title_seq != "" && md_veh_title_list != "" && rowCount > 0 ){
              if(flg == "A"){
                $.ajax({
                      url    : url+"Mainapp/ajax_list_data_checklist",
                      data : { md_veh_title_seq }, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){  
                                if(data){ 
                                  alert_info('หัวข้อเช็คสิสต์ซ้ำกัน');
                                }
                                else{
                                  $("#form_add").submit();   
                                }
                          },
                          error:function() {
                                 alert("เกิดข้อผิดพลาด ลองใหม่อีกครั้ง");
                          }
                  });
              }
              else{
                $("#md_veh_title_seq").prop('disabled', false);
                $("#md_veh_title_list").prop('disabled', false);
                $("#form_add").submit();   
              }
            }
            else{
              alert_info('กรอกข้อมุลให้ครบถ้วน');
             }
  });  





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



  });


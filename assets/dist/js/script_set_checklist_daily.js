 
let url              = $('#te_url').val(); 

  //ลิสห้องย่อย
  function list_subroom(flg,veh_title_seq){
    $("#table-subroom > tbody").empty(); 
      if(veh_title_seq ){
                $.ajax({
                    url    : url+"Mainapp/ajax_list_data_list_daily",    
                    data : { veh_title_seq }, 
                    type  : "POST",
                    dataType: "json",
                        success:function(data){
                            if(data){   
                              var num = parseInt($('#md_num').val());
                                $.each(data, function(key, value){ 

                                  var body    =  $("<tr></tr>"); 
                                                      $("<td width='30%'><br><input type='text' class='form-control fs-14 chk-val' name='arr_"+num+"[]' value='"+value.VEH_LIST_SEQ+"' "+(flg == "E" ? "" : "readonly")+" readonly ></td>").appendTo(body);
                                                      $("<td ><br><input type='text' class='form-control fs-14 chk-val' name='arr_"+num+"[]' value='"+value.VEH_LIST+"' "+(flg == "E" ? "" : "readonly")+"></td>").appendTo(body);
                                                      $("<td class='txt-center'><br> "+(flg == "D" ? "" : "<button type='button' class='btn btn-danger but-del-tb' onclick='deleteRow(this)'><i class='fa fa-times'></i></button>")+"</td>").appendTo(body);

                                                      //$("<td width='20%' class='txt-center'><button type='button' class='btn btn-sm btn-danger' onclick=\"deleteRow(this)\" align='left'><i class='fa fa-times'></i></button></td>").appendTo(body);
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
                                $("<td width='30px' ><br><input type='text' class='form-control fs-14 chk-val' name='arr_"+num+"[]' value='' ></td>").appendTo(body);
                                $("<td width='30px' ><br><input type='text' class='form-control fs-14 chk-val' name='arr_"+num+"[]' value='' ></td>").appendTo(body);
                                $("<td width='30px' class='txt-center'><br><button type='button' class='btn btn-sm btn-danger' onclick=\"deleteRow(this)\"><i class='fa fa-times'></i></button></td>").appendTo(body);
                                $('#table-subroom > tbody:last').append(body); 
                              num = num+1;
                              $('#md_num').val(num);
  });  //click



//open modal add
  function modal_type(head,c,flg,veh_title_seq){
     $('#hd_flg').val(flg);
     $('#md_num').val(1);

     //หัว modal
      $("#c_md").css('background-color' , c);
      $("#h_md").html('<b><font color="#ffffff">'+head+'</font></b>');
      //------------- ----------------------------------------
      $("#md_veh_title_seq").val(veh_title_seq); 
      //การกำหนดตารางให้สามารถกรอกได้หรือไม่ได้
          if(flg == "A"){
            $("#md_veh_title_seq").prop("disabled", false);  
            $("#md_veh_title_list").prop("disabled", false);           
          }
          else if(flg == "E"){
            $("#md_veh_title_seq").prop("disabled", true); 
            $("#md_veh_title_list").prop("disabled", false);           

          }

          else{
            $("#md_veh_title_seq").prop("disabled", true);
            $("#md_veh_title_list").prop("disabled", true);            
          }
          $("#modal_add").modal("show"); 
          list_data_checklist_daily(veh_title_seq);
          list_subroom(flg,veh_title_seq);
  }  



  function list_data_checklist_daily(veh_title_seq){ 
   $.ajax({
                      url    : url+"Mainapp/ajax_list_data_checklist_daily",
                      data : { veh_title_seq}, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){  
                              if(data){  
                              $("#md_veh_title_seq").val(data.VEH_TITLE_SEQ);
                              $("#md_veh_title_list").val(data.VEH_TITLE_LIST);                             
                              }
                            else{ 
                              $("#md_veh_title_seq").val("");
                              $("#md_veh_title_list").val("");

                            }
                          },
                          error:function() {
                              alert_info('เกิดข้อผิดพลาด ลองใหม่อีกครั้ง');
                          }
                  });
  }





  $('#form_add').on('submit', function(e){
    e.preventDefault();
  let flg= $("#hd_flg").val();
          let md_veh_title_seq        = $("#md_veh_title_seq").val();  
          let md_veh_title_list       = $("#md_veh_title_list").val();

          let inputs   = $(".chk-val");
          let count = inputs.length;  
          let flg_val         = "Y";
              for(let i = 0; i < count; i++) {
                    if($(inputs[i]).val() == ""){       
                        flg_val = "";
                        break;
                    }
              }

     if (md_veh_title_seq != "" && md_veh_title_list != "" && flg_val == "Y"){

            $("#md_veh_title_seq").prop("disabled", false);
            $("#md_veh_title_list").prop("disabled", false);

        $.ajax({
          url    : url+"Mainapp/ajax_save_checklist_daily",
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
                 alert_info("มีรายการเช็คลิสต์นี้แล้ว")
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

let regis=$('#hd_ft_veh_title_seq').val();
$('#ft_veh_title_seq').val(regis).trigger('change'); 



  });


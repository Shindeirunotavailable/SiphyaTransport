  let url              = $('#te_url').val(); 

$(document).ready(function(){
  $("#test").change(function(){
   let Test1=$(this).val();
    $(".Text1").addClass("d1");
    
   if (Test1=="1"){
   $(".Box1").removeClass("d1");
   }
    else if(Test1=="2"){
       $(".Box2").removeClass("d1");
    }
     else if(Test1=="3"){
        $(".Box3").removeClass("d1");
     }
     else if(Test1=="4"){
        $(".Box4").removeClass("d1");
     }
  });
});

//open modal add
  function modal_type(head,c,flg,veh_broken_no){
     $('#hd_flg').val(flg);
     //หัว modal
      $("#c_md").css('background-color' , c);
      $("#h_md").html('<b><font color="#ffffff">'+head+'</font></b>');
      //------------- ----------------------------------------
      $('#md_veh_broken_no').val(veh_broken_no); 
    
      
          if(flg == "A"){
            $("#md_veh_broken_no").prop("disabled", false);
            $("#md_veh_broken_list").prop("disabled", false);
          
          }
          else if(flg == "E"){
            $("#md_veh_broken_no").prop("disabled", true);
            $("#md_veh_broken_list").prop("disabled", false);
           
          }
          else{
            $("#md_veh_broken_no").prop("disabled", true);
            $("#md_veh_broken_list").prop("disabled", true);
       
          }
          list_data_broken(veh_broken_no);
      $("#modal_add").modal("show"); 
  }  

  function list_data_broken(veh_broken_no){
   $.ajax({
                      url    : url+"Mainapp/ajax_list_data_broken",
                      data : { veh_broken_no}, 
                      type  : "POST",
                      dataType: "json",
                          success:function(data){  console.log(data); // สำหรับดึงค่าว่าจะโชว์อะไรบ้าง
                              if(data){
                              $("#md_veh_broken_no").val(data.VEH_BROKEN_NO);
                              $("#md_veh_broken_list").val(data.VEH_BROKEN_LIST);
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
  let md_veh_broken_no     = $("#md_veh_broken_no").val().trim();
  let md_veh_broken_list     = $("#md_veh_broken_list").val().trim();
     if (md_veh_broken_no != "" && md_veh_broken_list != ""){
                $.ajax({
                      url    : url+"Mainapp/ajax_save_broken",
                      data : { flg, md_veh_broken_no , md_veh_broken_list}, 
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
let crytype=$('#hd_ft_veh_broken_no').val();
$('#ft_veh_broken_no').val(crytype).trigger('change'); 
  });



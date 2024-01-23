    function btn_save_com(r){
       $(r).prop("disabled", true);
       $(r).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> กำลังบันทึก');
    }

    function btn_save_com_r(r){
     $(r).prop("disabled", false);
     $(r).html('บันทึก');
    }

    function btn_save_com_cl_r(r){
      $(r).prop("disabled", false);
      $(r).html('ยกเลิกการลา');
     }

    function btn_src_com(r){
       $(r).prop("disabled", true);
       $(r).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> กำลังค้นหา');
    }

    function btn_src_com_r(r){
     $(r).prop("disabled", false);
     $(r).html('<i class="fa fa-search"></i> ค้นหา');
    }

    function btn_send_email(r){
       $(r).prop("disabled", true);
       $(r).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> กำลังส่ง E-Mail');
    }

    function btn_send_email_r(r){
     $(r).prop("disabled", false);
     $(r).html('<i class="fa fa fa-check"></i> ส่ง E-Mail');
    }

     function alert_info(text_alert){
      swal({
          text: text_alert,
          icon: 'info',
          button: {
            text: "ตกลง",
            value: true,
            visible: true,
            className: "btn btn-primary btn-w80"
          }
        });      
  }

  function alert_danger(text_alert){
      swal({
          text: text_alert,
          icon: 'error',
          button: {
            text: "ตกลง",
            value: true,
            visible: true,
            className: "btn btn-primary btn-w80"
          }
        });      
  }

    function alert_success(text_alert){
      swal({
          text: text_alert,
          icon: 'success',
          button: {
            text: "ตกลง",
            value: true,
            visible: true,
            className: "btn btn-primary btn-w80"
          }
        });      
  }

  $(".modal-dialog").draggable({
      handle: ".modal-header"
  });


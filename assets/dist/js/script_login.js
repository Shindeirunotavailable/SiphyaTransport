   function check_login(){
        var user   = $('#username').val().trim();
        var pass   = $('#password').val().trim();
  
        if(user != "" && pass != ""){   
          $('#alert_login').addClass('dis-none'); 
          return true;
        }
        else{
          $('#alert_login').html('<b>กรุณากรอก Username และ Password</b>')
          $('#alert_login').removeClass('dis-none');
          if(user ==""){
            $('#username').focus();
          }
          else{
            $('#password').focus();
          }
          return false;
        }
    }

    $(document).ready(function() {
      if($('#hd_alert').val()){
        $('#alert_login').html('<b>'+$('#hd_alert').val()+'</b>')
        $('#alert_login').removeClass('dis-none'); 
        $('#username').focus();
      }
      else{
        $('#alert_login').addClass('dis-none'); 
      }
    });
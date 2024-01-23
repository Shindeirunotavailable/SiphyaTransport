<?php 

   class Users_model extends CI_Model
   {

    public function __construct(){
       parent::__construct();
    }

    public function login($username,$password){
        $id      = strtolower($username);
        $pass    = $password;
        $DB1     = $this->load->database('default',TRUE);
        $db_pwd  = ""; 
          $sql   =  " SELECT * ".  
                    " FROM VTS_OPR_DAILYWORK ".   
                    " WHERE OPR_CODE = '".$id."' ". 
                    " AND CANCEL_FLG IS NULL "; 
            $query = $DB1->query($sql)->row(); 
            if($query) {
                $db_pwd = $query->OPR_PASS_W;
            }
                
            if($db_pwd == $pass) {
                return $query; 
            } 
                return false;
    }
     
   }


 ?>
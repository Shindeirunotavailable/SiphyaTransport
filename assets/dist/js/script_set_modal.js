  
let url              = $('#te_url').val(); 

//open modal add
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
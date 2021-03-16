 //for user registeration
    $(document).ready(function (){
 $("#Registration").click(function(){
 var name     = $("#name").val();
 var username = $("#username").val();
 var password = $("#password").val();
 var email    = $("#email").val(); 
var dataString ='name='+name+'&username='+username+'&password='+password+'&email='+email;
$.ajax({
  type:"POST",
    url:"userdata.php",
    data:"dataString",
  
  success:function(data){
      $("#state").html(data);
  }
});
return false;
});


});

  //for user login
    $(document).ready(function (){
 $("#userlogin").click(function(){
 
 var username = $("#username").val();
 var password = $("#password").val();
  
var dataString ='username='+username+'&password='+password;
$.ajax({
  type:"POST",
    url:"getlogin.php",
    data:"dataString",
  
  success:function(data){
      if ($.trim(data)== "emty") {
        $(".emty").show();
        $(".error").hide();
        $(".disable").hide();
      }else if ($.trim(data)== "disable") {
         $(".emty").hide();
        $(".error").hide();
        $(".disable").show();
      }else if ($.trim(data)== "error") {
      	 $(".emty").hide();
        $(".error").show();
        $(".disable").hide();

      }else{
      	window.lacation ="exam.php";
      }
  }
});
return false;
});


});
  
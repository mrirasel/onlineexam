<?php include 'inc/header.php'; ?>
<?php
Session::checkLogin();
?>

<div class="main">
	<?php
 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/Classes/User.php');
  
  $usr = new User();
 

  if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
   
    $user     =$usr->Userlogin($username,$password);
 }
?>
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">

	<form action="" method="post">
		<table class="tbl">    
			 <tr>
			   <td>Username</td>
			   <td><input type="text" name="username"id="username"required="1"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input type="password" name="password"id="password"required="1" ></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" name="userlogin"id="login" value="Login">
			   </td>
			 </tr>
			 	
       </table>
	   </form>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	   <span class="emty"style="display: none;">Feild Must not be emty</span>
	   <span class="disable" style="display: none;">User Id Disable</span>
	   <span class="eroor"style="display: none;">Username and password not match</span>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>
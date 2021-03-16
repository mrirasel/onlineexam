<?php include 'inc/header.php';
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/Classes/User.php');
  
  $usr = new User();
 ?>
<?php include 'userdata.php'; ?>
<div class="main">
<h1>Online Exam System - User Registration</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/regi.png"/>
	</div>
  <?php


  if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $name    = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email    = $_POST['email'];
   
    $user     =$usr->insertuserdata($name,$username,$password,$email);
 }
?>
 
	<div class="segment">
	<form action="" method="post">
		<table>
		<tr>
           <td>Name</td>
           <td><input type="text" name="name" id ="name"required="1"></td>
         </tr>
		<tr>
           <td>Username</td>
           <td><input name="username" type="text" id="username"required="1"></td>
         </tr>
         <tr>
           <td>Password</td>
           <td><input type="password" name="password" id ="password"required="1"></td>
         </tr>
         
         <tr>
           <td>E-mail</td>
           <td><input name="email" type="text" id="email"required="1" ></td>
         </tr>
         <tr>
           <td></td>
           <td><input type="submit" name="Registration"id="egistration"value="Signup">
           </td>
         </tr>

       </table>
	   </form>
     
	   <p>Already registered ? <a href="index.php">Login</a> Here</p>
     <span id="state"></span>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>
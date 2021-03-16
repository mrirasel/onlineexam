

<?php
 include 'inc/header.php';
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/Classes/User.php');
  
  $usr = new User();
 

  if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
   
    $user     =$usr->Userlogin($username,$password);
 }
?>
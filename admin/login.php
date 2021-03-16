<?php 
   


    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/inc/loginheader.php');
	include_once ($filepath.'/../Classes/Admin.php');
	
	$ad = new Admin();
?>


<div class="main">
<h1>Admin Login</h1>
<div class="adminlogin">
	

<?php
   /*
function test_input($data) {
     
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
 */ 
if ($_SERVER["REQUEST_METHOD"]== "POST") {
     $admindata=$ad->getadmindata($_POST);
 }
    /*
    $adminname = test_input($_POST["adminname"]);
    $pass = test_input($_POST["pass"]);
    $stmt = $conn->prepare("SELECT * FROM admin_tbl");
    $stmt->execute();
    $users = $stmt->fetchAll();
     
    foreach($users as $user) {
         
        if(($user['adminname'] == $adminname) && 
            ($user['pass'] == $pass)) {
                header("Location: index.php");
        }
        else {
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            die();
        }
    }
}
 */
?>




	
	<form action="" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="adminname"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="pass"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="Login"/></td>
			</tr>
			<tr>
				<td colspan="2">
					<?php

                    if (isset($admindata)) {
                    	echo "$admindata";
                    }
					?>
					
				</td>
				
			</tr>
		</table>
	</from>
</div>
</div>
<?php include 'inc/footer.php'; ?>
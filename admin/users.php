<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../Classes/User.php');
	$usr = new User();
?>
<?php
 if (isset($_GET['dsb'])) {
 	$dsbid= (int) $_GET['dsb'];
 	$dsbUser = $usr->DisableUser($dsbid);
 }

 if (isset($_GET['enb'])) {
 	$enbid= (int) $_GET['enb'];
 	$enbUser = $usr->EnbableUser($enbid);
 }
  if (isset($_GET['rmv'])) {
 	$rmvid= (int) $_GET['rmv'];
 	$rmvUser = $usr->RemoveUser($rmvid);
 }
?>
<div class="main">
<h1>User Manage controll panel</h1>
<?php
if (isset($dsbUser)) {
	echo "$dsbUser";
}
if (isset($enbUser)) {
	echo "$enbUser";
}
if (isset($rmvUser)) {
	echo "$rmvUser";
}
?>
<div class="manageuser">
	<table class="tblone">
		<tr>
			<th>Sl no</th>
             <th>Name</th>
             <th>Username</th>
             <th>Email</th>
             <th>Action</th>

		</tr>
		<tr>	
			<?php
           $query= "SELECT * FROM users ORDER BY id DESC";
           $result= $db->select($query);
          if ($result) {
          	       $i=0;
                  while ($manage= $result->fetch_assoc()) {
                    $i++;
          

			?>
			<td>
				<?php
				  if ($manage['status'] =='1'){
                   echo "<span class='error'>".$i."</span>";
				  }else{
				  	echo $i;
				  }
				?>
				
			</td>
			<td>
				<?php
				  if ($manage['status'] =='1'){
                   echo "<span class='error'>".$manage['name']."</span>";
				  }else{
				  	echo  $manage['name'];
				  }
				?>
				
			</td>
			<td>
				<?php
				  if ($manage['status'] =='1'){
                   echo "<span class='error'>".$manage['username']."</span>";
				  }else{
				  	echo  $manage['username'];
				  }
				?>
				
			</td>
			
			<td>
				<?php
				  if ($manage['status'] =='1'){
                   echo "<span class='error'>".$manage['email']."</span>";
				  }else{
				  	echo  $manage['email'];
				  }
				?>
				
			</td>
			<td>
				<?php
                if ($manage['status'] =='0') {?>
                	<a onclick="return confirm('Are you sure to Disable??')"href="?dsb=<?php echo $manage['id'];?>">Disable</a>
                 <?php } else { ?>
                 <a onclick="return confirm('Are you sure to Enable??')"href="?enb=<?php echo $manage['id'];?>">Enable</a>
                   <?php } ?>
				||
				<a onclick="return confirm('Are you sure to Remove??')"href="?rmv=<?php echo $manage['id'];?>">Remove</a>
           
          
			</td>
		</tr>
     <?php }} ?>
	</table>
</div>

	


	
</div>
<?php include 'inc/footer.php'; ?>
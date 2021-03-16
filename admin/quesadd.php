<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../Classes/Exam.php');
	$ad = new Exam();
?>
<?php
  // Session::checkLogin();
?>
<style >
	.addque{
		width: 480px;margin: 20px auto;padding: 10px;color: #999;border:1px solid #fff;
	}
	input[type="number"] {
  border: 1px solid #ddd;
  margin-bottom: 10px;
  padding: 5px;
  width: 140px;
}
input[type="submit"] {
  cursor: pointer;
  font-size: 15px;
  padding:  10px;
  border-radius: 15px;
  background: green;
  color: #fff;
}

</style>
<div class="main">
<h1>Admin Panel-Que Add</h1>
<?php
if (isset($adque)) {
	echo "$adque";
}
?>

<div class="addque">
	<?php
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
    	$adque=$ad->AddQuetion($_POST);
 }
 $total=$ad->gettotal();
 $nxt= $total+1;
   

	?>
	<form action="" method="post">
	<table>
		<tr>
			<td>Quetion No</td>
			<td>:</td>
			<td><input type="number" name="queNo"value="<?php 
                if(isset($nxt)){
                  echo $nxt;
                }
				?>">
				
				</td>
		</tr>
		<tr>
			<td>Quetion</td>
			<td>:</td>
			<td><input type="text" name="que"></td>
		</tr>
		<tr>
			<td>Choice One</td>
			<td>:</td>
			<td><input type="text" name="one"></td>
		</tr>
        
       <tr>
			<td>Choice Two</td>
			<td>:</td>
			<td><input type="text" name="two"></td>
		</tr>
        
        <tr>
			<td>Choice Three</td>
			<td>:</td>
			<td><input type="text" name="three"></td>
		</tr>
        
        <tr>
			<td>Choice Four</td>
			<td>:</td>
			<td><input type="text" name="four"></td>
		</tr>

		        <tr>
			<td>Correct Number</td>
			<td>:</td>
			<td><input type="number" name="rightAns"></td>
		</tr>
        <tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="submit"value="ADD QUETION"></td>
		</tr>


	</table>
    </form>
</div>

	
</div>
<?php include 'inc/footer.php'; ?>
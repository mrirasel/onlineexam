<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<?php
 Session::checkSession();
?>
<style >
	.quiz{
		width: 700px;margin: 10px auto;padding: 0px;color: #999;border:1px solid #fff;
	}
	
input[type="submit"] {
  cursor: pointer;
  font-size: 20px;
  padding:5px;
  margin-top: 7px;
  background: #f4f4f4;
  border-radius: 5px;

}
</style>
<div class="main">
	<?php
     if (isset($_GET['q'])) {
 	 $num= (int) $_GET['q'];
 }
   $quetion= $exm->getquebynumber($num);
   
   $ttl    = $exm->gettotal();
   ?> 
	<h1><?php echo $quetion['queNo'];?> OF QUETION <?php echo "$ttl"?></h1>

	<div class="quiz">
		<?php
		
         if ($_SERVER["REQUEST_METHOD"] == 'POST') {
         	$process = $exm->processAllData($_POST);
      }
		?>
<form action=""metho="post">
	<table>
		<tr>
			<td colspan="2">
				<h3>Quetion <?php echo $quetion['queNo'];?>:<?php echo $quetion['que'];?></h3>
			</td>
		</tr>
		<?php
		$ans   = $exm->getansbynumber($num);
         if ($ans) {
         	while ($result = $ans->fetch_assoc()) {
         	
		?>
		<tr>
			<td><input type="radio" name="ans"value= "<?php echo $result['id'];?>"><?php echo $result['ans'];?></td>
		</tr>
	<?php }} ?>
		<tr>
			<td><input type="submit" name="submit"value="NEXT QUESTION"></td>
			<td><input type="hidden" name="number"value="<?php echo $number;?>"></td>
		</tr>
	</table>
</form>

</div>
	
</div>
<?php include 'inc/footer.php'; ?>

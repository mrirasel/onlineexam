<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../Classes/Exam.php');
	$exam = new Exam();
?>
<div class="main">
	<?php
 if (isset($_GET['rmv'])) {
 	$queNo= (int) $_GET['rmv'];
 	$listrmv = $exam->DeleteData($queNo);
 }
 ?>
<h1>Quetion LIst here</h1>
	<?php
if (isset($listrmv)) {
	echo "$listrmv";
}
?>
<div class="list">
	<table class="tblone">
		<tr>
			<th width="10%">QUE NO</th>
             <th width="70%">Que Name</th>
             
             <th width="20%">Action</th>

		</tr>
			
			<?php
           $query= "SELECT * FROM tbl_que ORDER BY id DESC";
           $result= $db->select($query);
          if ($result) {
          	       $i=0;
                  while ($ques= $result->fetch_assoc()) {
                    $i++;
          

			?>
			<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $ques['que'];?></td>
			<td>
				
				<a onclick="return confirm('Are you sure to Remove??')"href="?rmv=<?php echo $ques['id'];?>">Remove</a>
           
          
			</td>
		</tr>
     <?php }} ?>
	</table>
</div>

	
</div>

	

<?php include 'inc/footer.php'; ?> 
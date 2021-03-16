<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	Session::checkSession();
?>
<?php
  // Session::checkLogin();
?>
<style >
	.main1 {
  background: #fff none repeat scroll 0 0;
  border: 1px solid #999;
  margin-top: 10px;
  min-height: 300px;
  padding: 15px;
  width: 828px;
}
.main1 h1 {
  background: #f4f4f4 none repeat scroll 0 0;
  box-shadow: 2px 2px 0 1px #999;
  color: #666;
  margin: 10px auto 25px;
  padding: 4px;
  text-align: center;
  width: 620px;
}
	.starttext{
		width: 700px;margin: 20px auto;padding: 10px;color: #999;border-bottom:2px solid #999999;float:left;margin-left: 20px;background: #F4F4F4;margin-bottom: 5px;
	}
	.le{
		float: left;
		width: 500px;
		padding-left: 20px;
	}
	.le h3{
		margin-top:10px;
	}
	.ri{
		float: right;
		width: 150px;
		padding-top: 40px;
	}

	.ri li{
		padding: 10px;
		margin: 5px;
		color: #fff;
		padding-left: 15px;
		background: green;
       
	}
	.ri li a{text-decoration: none;}

	.ri :hover{background:#fff;color: #999;}
</style>
<?php
$ttl= $exm->gettotal();
$ques= $exm->getque();
?>
<div class="main1">

	<div class="starttext">
	<div class="le">
	<h3>Exam Name:MCQ Exam BY Data structure(queue)</h3>
	<span><p>Total Que: <?php echo"$ttl";?></p></span>
	<span><p>Total Marks:10</p></span>
	<span><p>Time:10 minute</p></span>
 </div>
     <div class="ri">
     	<a href="test.php?q=<?php echo $ques['queNo'];?>">Start Exam</a>
     </div>
    
</div>
</div>
<?php include 'inc/footer.php'; ?>
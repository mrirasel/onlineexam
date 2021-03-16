<?php include 'inc/header.php'; ?>

<?php 

	Session::checkSession();
?>
<style>
	.starttest{padding: 10;
outline: none;
margin: 2px auto;
text-align: center;}
	.starttest p{margin-bottom: 10px;}
	.starttest a{
		font-family: "Times New Roman", Georgia, Serif;
font-size: 25px;
color: #121069;
padding: 7px;
background: red;
text-decoration: none;
margin-top: 6px;
color: #fff;
border-radius: 63px;
	}
</style>
<div class="main">
<h1>You are Done    !</h1>
	<div class="starttest">
	<p>Congratulations ! You have just Completed the test.</p>
	<p>Final Sore : 
		<?php
			if(isset($_SESSION['score'])){
				echo $_SESSION['score'];
				unset($_SESSION['score']);
			}
		?>
		<br>
	</p>
	<a href="viewans.php">View Correct Answer</a>
	<a href="starttest.php">Again Start Test!!!!</a>
	</div>
  </div>
<?php include 'inc/footer.php'; ?>
<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<?php
  // Session::checkLogin();
?>
<style >
	.Adminclass{
		width: 500px;margin: 30px auto;padding: 50px;color: #999;border:1px solid #fff;
	}

</style>
<div class="main">
<h1>Admin Panel</h1>

<div class="Adminclass">
	<h2>Wellcome to admin panel control</h2>
	<p>You can manage your control for online exam here..</p>

</div>

	
</div>
<?php include 'inc/footer.php'; ?>
<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
?>
<style>
	.segmentp {
  border: 1px solid #d3d3d3;
  border-radius: 4px;
  float: left;
  min-height: 225px;
  padding: 20px;
  width: 300px;
}
.segmentp img {
  height: 200px;
  margin-left: 60px;
  padding-top: 12px;
}
.segment1 {
  border: 1px solid #d3d3d3;
  border-radius: 4px;

  min-height: 200px;
  padding: 20px;
  width: 370px;
}
.pr tr{
	margin-bottom: 20px;
}
</style>

<div class="main">
	<h1>Online Exam System - User Login</h1>
	<div class="segmentp" style="margin-right:20px;">
		<img src="img/regi.png"/>
	</div>
	<div class="segment">

		<table >
			<tr>

				<td style="color: #888;"><strong>Name</strong></td>
				<td><strong>:</strong></td>
				<td style="color: #888;"><strong><?php echo Session::get('name'); ?></strong></td>
			</tr>
			<tr>
				<td style="color: #888;"><strong>Email</strong></td>
				<td><strong>:</strong></td>
				<td style="color: #888;"><strong><?php echo Session::get('email'); ?></strong></td>
			</tr>
			<tr>
				<td style="color: #888;"><strong>Username</strong></td>
				<td><strong>:</strong></td>
				<td style="color: #888;"><strong><?php echo Session::get('username'); ?></strong></td>
			</tr>
		</table>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>
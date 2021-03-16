<?php 
   
  $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	
	include_once ($filepath.'/../helpers/Format.php');
	
class Exam
{
	private $db;
	private $fm;
	public function __construct()
	{
	$this->db= new Database;
	$this->fm= new Format;
	}

	public function DeleteData($queNo)
	{
	 $tables =array("tbl_que","tbl_ans");
	 foreach ($tables as $table) {
	 	$query = "DELETE FROM $table WHERE queNo='$queNo' ";
	 	$dlt=$this->db->delete($query);
	 	if ($dlt) {
			$msg="<span class='success'>Succesfully Deleted</span>";
	 	     return $msg;
		} else{
	 	$msg="<span class='error'>Not Deleted</span>";
	 	return $msg;
	 }
	}
	 }

	 public function gettotal()
	 {
	 	$query= "SELECT * FROM tbl_que";
	 	$result= $this->db->select($query);
	 	$total = $result->num_rows;
	 	return $total;
	 }

	 public function AddQuetion($data)
	 {
	 	$queNo= mysqli_real_escape_string($this->db->link,$data['queNo']);
	 	$que= mysqli_real_escape_string($this->db->link,$data['que']);
	 	$ans= array();
	 	$ans[1]=$data['one'];
	 	$ans[2]=$data['two'];
	 	$ans[3]=$data['three'];
	 	$ans[4]=$data['four'];
	 	$rightAns= $data['rightAns'];
   $query = "INSERT INTO tbl_que(queNo,que) VALUES('$queNo','$que')";
   $insert_row = $this->db->insert($query);
   if ($insert_row) {
   	foreach ($ans as $key => $value) {
   		if ($value != '') {
   			if ($rightAns==$key) {
   				$rquery="INSERT INTO tbl_ans(queNo,rightAns,ans) VALUES('$queNo','1','$value')";
   			}else{
   				$rquery="INSERT INTO tbl_ans(queNo,rightAns,ans) VALUES('$queNo','0','$value')";
   			}
   			 $insetrow = $this->db->insert($rquery);
   			 if ($insetrow) {
   			 	continue;
   			 }else{
   			 	die('Eror....');
   			 }
   		}

   	}
   $msg ="<span class='success'>Quetion Insert Insert Succesfully</span>";
   return $msg;
   }
	 }
	 public function getque()
	 {
	 	$query = "SELECT * FROM tbl_que";
	 	$getresult= $this->db->select($query);
	 	$val   = $getresult->fetch_assoc();
	 	return $val;
	 }
	 public function getquebynumber($number)
	 {
	 	$query     = "SELECT * FROM tbl_que WHERE queNo= '$number'";
	 	$getresult = $this->db->select($query);
	 	$val       = $getresult->fetch_assoc();
	 	return $val;
	 }
	  public function getansbynumber($number)
	 {
	 	$query = "SELECT * FROM tbl_ans WHERE queNo= '$number'";
	 	$getresult= $this->db->select($query);
	 	return $getresult;
	 }
	public function getQueByOrder(){
		$query = "select * from tbl_que order by queNo ASC";
		$result = $this->db->select($query);
		return $result;
	}

	public function delQuestion($quesNo){
		$tables = array("tbl_que","tbl_ans");
		foreach($tables as $table){
			$delquery = "delete from $table where queNo = '$queNo'";
			$deldata = $this->db->delete($delquery);
		}
		if($deldata){
			$msg = "<span class = 'success'>Data Deleted Successfully</span>";
			return $msg;
		}else{
			$msg = "<span class = 'error'>Data Not Deleted </span>";
			return $msg;
		}
	}
}
?>
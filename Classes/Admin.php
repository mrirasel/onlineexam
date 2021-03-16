<?php 
   
  $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../helpers/Format.php');
	
class Admin
{
	private $db;
	private $fm;
	public function __construct()
	{
	$this->db= new Database;
	$this->fm= new Format;
	}

	public function getadmindata($data){

		$adminname= $this->fm->validation($data['adminname']);
		$pass= $this->fm->validation($data['pass']);
		$name= mysqli_real_escape_string($this->db->link,$adminname);
		
		$query="SELECT * FROM admin_tbl WHERE adminname= '$adminname' AND pass= '$pass'";
		
		$result =$this->db->select($query);	
     
       	
		if ($result != false) {
			$value =  $result->fetch_assoc();
			Session::init();
			Session::set("adminLogin",true);
			Session::set("adminname",$value['adminname']);
			
			Session::set("adminId",$value['adminId']);
			header("Location:index.php");
		}else{
			$msg="<span class='error'>Username and password not match...</span>";
			return $msg;
		}
		
	}
}


 ?>

     
   
         
       
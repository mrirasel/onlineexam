
   <?php
  $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../helpers/Format.php');
	
class User
{
	private $db;
	private $fm;
	public function __construct()
	{
	$this->db= new Database;
	$this->fm= new Format;
	}

	public function DisableUser($id)
	{
	 $query= "UPDATE users
      SET
      status='1'
      WHERE id= '$id'
	 ";	
	 $updated_row= $this->db->update($query);
	 if ($updated_row) {
	 	$msg="<span class='success'>Succesfully Disable</span>";
	 	return $msg;
	 }
	 else{
	 	$msg="<span class='error'>Not Disable</span>";
	 	return $msg;
	 }
	}

	public function EnbableUser($id)
	{
	 $query= "UPDATE users
      SET
      status='0'
      WHERE id= '$id'
	 ";	
	 $updated_row= $this->db->update($query);
	 if ($updated_row) {
	 	$msg="<span style='color:red;'>Succesfully Enable</span>";
	 	return $msg;
	 }
	 else{
	 	$msg="<span class='error'>Not Enable</span>";
	 	return $msg;
	 }
	}

	public function RemoveUser($id)
	{
		$query = "DELETE FROM users WHERE id='$id' "; 
		$dlt= $this->db->delete($query);
		if ($dlt) {
			$msg="<span class='success'>Succesfully Deleted</span>";
	 	     return $msg;
		} else{
	 	$msg="<span class='error'>Not Deleted</span>";
	 	return $msg;
	 }
	}

	public function insertuserdata($name,$username,$password,$email)
	{
	
		$name     = $this->fm->validation($name);
		$username = $this->fm->validation($username);
		$password = $this->fm->validation($password);
		$email    = $this->fm->validation($email);
  

      $name     = mysqli_real_escape_string($this->db->link,$name);
      $username = mysqli_real_escape_string($this->db->link,$username);
      $password    = mysqli_real_escape_string($this->db->link,MD5($email));
      $email    = mysqli_real_escape_string($this->db->link,$email);

      if ($name == ''||$username == ''||$password == ''||$email =='') {
      	echo "<span style='color:red'>Field Must not be emty</span>!!";
      	exit();
      }else if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
        echo "<span class='error'>INVALID EMAIL</span>!!";
        exit();
      }else{
      	$checkquery= "SELECT * FROM users WHERE email ='$email'";
      	$chkresult = $this->db->select($checkquery);
      	if ($chkresult != false) {
      	 echo "<span class='error'>EMAIL already Taken</span>!!";
        exit();
      	 } 
      	 else{
        $query  = "INSERT INTO users(name,username,password,email) VALUES('$name','$username','$password','$email')";
      $insert_row = $this->db->insert($query);
      if ($insert_row) {
       echo "<span class='success'>Registration Succesfully</span>!!";
        exit();
      }else{
      	 echo "<span class='error'>Error!Not Registration</span>!!";
        exit();
      	 }	
      }
      }
	}
	public function Userlogin($username,$password){

	$username = $this->fm->validation($username);
    $password = $this->fm->validation($password);
    $username = mysqli_real_escape_string($this->db->link,$username);
    $password = mysqli_real_escape_string($this->db->link,$password);
     if ($username == ''||$password == '') {
      	echo "emty";
      	exit();
      }else{
      	$query="SELECT * FROM users WHERE username= '$username' AND password= '$password'";
      	$result =$this->db->select($query);
      	if ($result != false) {
			$value =  $result->fetch_assoc();
		if ($value['status']==1) {
			echo "disable";
            	exit();
		}else{
			Session::init();
			Session::set("login",true);
			Session::set("id",$value['id']);
			Session::set("name",$value['name']);
			Session::set("email",$value['email']);
			Session::set("username",$value['username']);

			header("Location:exam.php");
		}
      }else{
      	echo "not match";
            	exit();
      }
}

}
public function getque()
{
	$query="SELECT * FROM tbl_que";
      $result =$this->db->select($query);
     return $result;
}

  public function getans()
  {
	$query="SELECT * FROM tbl_ans";
      $result =$this->db->select($query);
     return $result;
}
}

	

?>

     
   
         
       
<style>
	.warning{font-size:20px;color:red;}
	.success{font-size:20px;color:green;}
</style>

<?php

include "Database.php";
class User {

private $db;
	
	
	public function  __construct () {
		$this->db=new Database();
	}
	

	public function userRegistration($data) {
        $name=$data ['name'];
        $username=$data['username'];
        $email=$data['email'];
        $password=($data['password']); 
        $chk_email=$this->emailcheack($email);
        

        if($name=="" or $username=="" or $email=="" or $password==""){
             echo "<span class='warning'><strong>sorry!</strong> field must not be empty </span>";
        }

       else if(strlen($username )< 3){
    echo "<span class='warning'><strong>sorry!</strong>username is too short </span>";
        }

       else if(strlen($password )< 3){
    echo "<span class='warning'><strong>sorry!</strong>password is too short </span>";
        }

else if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
	echo "<span class='warning'><strong>sorry!</strong>this email address isn't valid </span>";
}

else if($chk_email == true){
	echo "<span class='warning'><strong>sorry!</strong>this email address already submited </span>";
   }

else{}
  $password=md5($data['password']); 
$sql="INSERT INTO tbl_lr (name,username,email,password) 
              VALUES(:name,:username,:email,:password)";

$query=$this->db->pdo->prepare($sql);
$query->bindValue(":name",$name);
$query->bindValue(":username",$username);
$query->bindValue(":email",$email);
$query->bindValue(":password",$password);
$result=$query->execute();
if($result){
	header("Location:Login.php");
	
} else {
	echo "<span class='warning'> <strong>Error!</strong>your registration is failed! try again </span> ";
}





}




public function emailcheack($email){
		
		$sql="SELECT email FROM tbl_lr WHERE email=  :email";
		$query=$this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->execute();
		
		if($query->rowCount()> 0 ) {
			
			return true;
			
		}else {return false;}
	   
	   }

	public function getUserData() {
		$sql=" SELECT * FROM tbl_lr ORDER BY id";
		$query=$this->db->pdo->prepare($sql);
		$query->execute();
		$result=$query->fetchAll();
		return $result;

	}




//login operation start from here

public function userLogin($data) {
    
        $email=$data['email'];
        $password=md5($data['password']); 

        if( $email=="" or $password==""){
             echo "<span class='warning'><strong>sorry!</strong> field must not be empty </span>";
        }
     else if(strlen($password )< 3){
    echo "<span class='warning'><strong>sorry!</strong>password is too short </span>";
        }

 else if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
	echo "<span class='warning'><strong>sorry!</strong>this email address isn't valid </span>";
} 
else {  }


$result=$this->getuserlogin($email,$password);
if($result){
         
         Session::init();
         Session::set("login",true);
         Session::set("id",$result->id);
         Session::set("name",$result->name);
         Session::set("username",$result->username);
         Session::set("loginmsg"," <span class='success'>you are login</span>" );
         header("Location:index.php");

    }else {
    	echo "<span class='warning'>No Data Found</span>";
    }




   } 

 public function getuserlogin($email,$password){

   $sql="SELECT * FROM tbl_lr WHERE email=:email AND password=:password LIMIT 1 ";
    $query=$this->db->pdo->prepare($sql);
    $query->bindValue(':email',$email);
    $query->bindValue(':password',$password);
	$query->execute();
	$result=$query->fetch(PDO::FETCH_OBJ);
	return $result;

}




//update operation start from here 

public function getUserByid($userid){

    $sql="SELECT * FROM tbl_lr WHERE id = :id ";
    $query=$this->db->pdo->prepare($sql);
    $query->bindValue(':id',$userid);
	$query->execute();
    $result=$query->fetch(PDO::FETCH_OBJ);
	return $result;
}



public function userUpdateData($data,$id){
   
        $name=$data ['name'];
        $username=$data['username'];
        $email=$data['email'];



        if($name=="" or $username=="" or $email==""){
             echo "<span class='warning'><strong>sorry!</strong> field must not be empty </span>";
        }

       else if(strlen($username )< 3){
    echo "<span class='warning'><strong>sorry!</strong>username is too short </span>";
        }

else if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
	echo "<span class='warning'><strong>sorry!</strong>this email address isn't valid </span>";
}else {}




  $sql="UPDATE  tbl_lr SET name=:name ,username=:username,email=:email WHERE id=:id ";
    $query=$this->db->pdo->prepare($sql);
    $query->bindValue(':name',$name);
    $query->bindValue(':username',$username);
    $query->bindValue(':email',$email);
     $query->bindValue(':id',$id);
    $result=$query->execute();
	return $result;

if($result)
{
echo "<span class='success'><strong>success!</strong>Data updated successfully.. </span>"; 
}else {
	echo "<span class='warning'><strong>sorry!</strong>Data update fail.. </span>";
}


}

/*
private function cheackPassword($id,$old_pass){
    $password=md5($old_pass);
    $sql="SELECT password FROM tbl_lr WHERE id=:id AND password=:password";
     $query=$this->db->pdo->prepare($sql);
    $query->bindValue(':id',$id);
    $query->bindValue(':password',$password);
    $query->execute();
 if($query->rowCount()>0){
    return true;
 }else {
    return false;
 }


}

*/

public function userPassword($id,$data){
     
     $old_pass=$data ['old_password'];
     $new_pass=$data['new_password'];
    

 if($old_pass=="" or $new_pass==""){
             echo "<span class='warning'><strong>sorry!</strong> field must not be empty </span>";
        }

       else if(strlen($new_pass)< 4){
    echo "<span class='warning'><strong>sorry!</strong>password is too short </span>";
        }
 

   else {

    $sql="UPDATE  tbl_lr SET password=:password WHERE id=:id ";
    $query=$this->db->pdo->prepare($sql);
    $query->bindValue(':password',md5($new_pass));
    $query->bindValue(':id',$id);
    $result=$query->execute();
    return $result;

if($result)
{
echo "<span class='success'><strong>success!</strong>password updated successfully.. </span>"; 
}else {
    echo "<span class='warning'><strong>sorry!</strong>password update fail.. </span>";
}

}


}



























	}





?>
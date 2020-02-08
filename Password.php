<?php include "Header.php";

include "lb/User.php";
		Session::cheackSession();
?>
<div class="register">

<form method="post" action="">

<?php


if(isset($_GET['id'])) {
     $userid=(int)$_GET['id'];



$user=new User();

$userdata=$user->getUserByid($userid);
}
if($userdata){

	
	
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change'])){
		$userpass=$user->userPassword($userid,$_POST);
		
	
	
	if(isset($userpass)) {
		echo $userpass;}    }


      $sesid=Session::get('id');
               if($userid != $sesid){
             header("Location:index.php");
               }
}


	
?>

<table width="100%" >

<tr>
		<td style="padding-top:10px;font-size:20px;" align="center" width="10%"></td>
		<td style="padding-top:10px;" width="30%"> </td>
	</tr>

	<tr>
		<td style="padding-top:10px;font-size:20px;" align="center" width="10%"></td>
		<td style="padding-top:10px;" width="30%"> </td>
	</tr>

<tr>
		<td style="padding-top:10px;font-size:20px;" align="center" width="10%"></td>
		<td style="padding-top:10px;" width="30%"> </td>
	</tr>
<tr>
		<td style="padding-top:10px;font-size:20px;" align="center" width="10%">Old Password:</td>
		<td style="padding-top:10px;" width="30%"><input type="password" name="old_password"  /> </td>
	</tr>


<tr>
		<td style="padding-top:10px;font-size:20px;" align="center" width="10%">New Password:</td>
		<td style="padding-top:10px;"  width="30%"><input type="password" name="new_password"  /> </td>
	</tr>


<tr>
		<td></td>
		<td style="padding-top:10px;" width="30%"><input style="width:150px;height:60px;background:#fc721e;font-size:25px;cursor:pointer;border-radius:5px;" type="submit" name="change" value="change"  /> </td>
	</tr>


</table>
 


 </form>





</div>







<?php include "Footer.php";?>
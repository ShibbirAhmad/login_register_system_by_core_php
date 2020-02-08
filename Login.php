<?php include "Header.php";
  include "lb/User.php";

Session::cheacklogin();

?>
<div class="register">

<?php 

$user=new User();


	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Login'])){
		$userlogin=$user->userlogin($_POST);
		
		
		
	
	if(isset($userlogin)) {
		echo $userlogin;}    }
	
?>

<form method="post" action="">

<table width="100%" >


<tr>
		<td style="padding-top:100px;font-size:20px;" align="center" width="10%">Email:</td>
		<td style="padding-top:100px;" width="30%"><input type="email" name="email"  /> </td>
	</tr>


<tr>
		<td style="padding-top:10px;font-size:20px;" align="center" width="10%">Password:</td>
		<td style="padding-top:10px;"  width="30%"><input type="password" name="password"  /> </td>
	</tr>


<tr>
		<td></td>
		<td style="padding-top:10px;" width="30%"><input style="width:150px;height:60px;background:#fc721e;font-size:25px;cursor:pointer;border-radius:5px;" type="submit" name="Login" value="Login"  /> </td>
	</tr>


</table>
 


 </form>





</div>







<?php include "Footer.php";?>
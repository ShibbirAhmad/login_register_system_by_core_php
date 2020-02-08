<?php include "Header.php";

include "lb/User.php";


?>
<div class="register">
<?php 

$user=new User();


	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
		$userRegi=$user->userRegistration($_POST);
		
		
		
	
	if(isset($userRegi)) {
		echo $userRegi;}    }
	
?>
<form method="post" action="">

<table width="100%" >
	<tr>
		<td style="padding-top:60px;font-size:20px;" align="center" width="10%">Name:</td>
		<td style="padding-top:60px;" width="30%"><input type="text" name="name" /></td>
	</tr>

<tr>
		<td style="padding-top:10px;font-size:20px;" align="center" width="10%">Userame:</td>
		<td style="padding-top:10px;"  width="30%"><input type="text" name="username"/> </td>
	</tr>

<tr>
		<td style="padding-top:10px;font-size:20px;" align="center" width="10%">Email:</td>
		<td style="padding-top:10px;" width="30%"><input type="email" name="email"  /> </td>
	</tr>


<tr>
		<td style="padding-top:10px;font-size:20px;" align="center" width="10%">Password:</td>
		<td style="padding-top:10px;"  width="30%"><input type="password" name="password"  /> </td>
	</tr>


<tr>
		<td></td>
		<td style="padding-top:10px;" width="30%"><input style="width:150px;height:60px;background:#fc721e;font-size:25px;cursor:pointer;border-radius:5px;" type="submit" name="register" value="Register"  /> </td>
	</tr>


</table>
 


 </form>





</div>







<?php include "Footer.php";?>
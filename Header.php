<?php 


    include "lb/Session.php";
   Session::init();

?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	
	<title>this is my login register system</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
	<div class="container">
<?php  
 
 if(isset($_GET['action'] )&& $_GET['action'] == "logout")
{
	Session::destroy();
}
?>
	<div class="header">
		<div class="sub_header">


   <h3><a href="index.php">Login Register System && PDO</a></h3>
   
	</div>
	<ul>

		<?php 
        $id=Session::get("id");
        $logcheck=Session::get("login");
   if($logcheck == true ){
?>
   	<li><a href="index.php">Home</a></li>
		<li><a href="?action=logout">Logout</a></li>
		<li><a href="profile.php?id=<?php echo $id; ?>">profile</a></li>
		<?php 
   }else{
		?>
		
		<li><a href="Login.php">Login</a></li>
		
		<li><a href="Register.php">Register</a></li>
	<?php }?>
	</ul>
	

     </div>
	
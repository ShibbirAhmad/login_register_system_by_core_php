<?php include "Header.php";
      include "lb/User.php";


     Session::cheackSession();

?>
<div class="register">

<?php  

if(isset($_GET['id'])) {
     $userid=(int)$_GET['id'];
}


$user=new User();

$userdata=$user->getUserByid($userid);

if($userdata){

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
		$userUpadte=$user->userUpdateData($_POST,$userid);
		
	
	if(isset($userUpadte)) {
		echo $userUpadte;}    }
	

?>

<form method="post" action="">


<table width="100%" >
<tr>
		<td style="padding-top:60px;font-size:20px;" align="center" width="10%">Name:</td>
		<td style="padding-top:60px;" width="30%"><input type="text" name="name" 
			value="<?php echo $userdata->name;?>" /></td>
	</tr>

<tr>
		<td style="padding-top:10px;font-size:20px;" align="center" width="10%">Userame:</td>
		<td style="padding-top:10px;"  width="30%"><input type="text" name="username" 
		value="<?php echo $userdata->username;?>" /> </td>
	</tr>

<tr>
		<td style="padding-top:10px;font-size:20px;" align="center" width="10%">Email:</td>
		<td style="padding-top:10px;" width="30%"><input type="email" name="email" 
		value="<?php echo $userdata->email;?>" /> </td>
	</tr>

    <?php 
               $sesid=Session::get('id');
               if($userid == $sesid){
		?>
<tr>
		<td style="padding-top:10px;font-size:20px;" align="center" width="10%"></td>
		<td style="padding-top:20px;" width="30%">    
        
		  <a style="text-decoration:none;background:#4e4e4e;color:#fff;font-size:20px;padding:10px;border-radius:2px; " href="Password.php"?id=<?php echo $userid;?> > change password </a>
		 </td>
	</tr>
<?php } ?>

<tr>
	<td></td>	
		<?php 
               $sesid=Session::get('id');
               if($userid == $sesid){
		?>
		<td style="padding-top:20px;" width="30%">  

			<input style="width:150px;height:60px;background:#fc721e;font-size:25px;cursor:pointer;border-radius:5px;" type="submit" name="update" value="update"  /> 

			</td> <?php } ?>
   
			
	</tr>
<?php } ?>

</table>
 


 </form>





</div>







<?php include "Footer.php";?>
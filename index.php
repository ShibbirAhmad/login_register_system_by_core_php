<?php include "Header.php";
      include "lb/User.php";
     
     Session::cheackSession();
  
?>

<div class="content">

<?php

$lgmsg=Session::get("loginmsg");
if(isset($lgmsg)){
   echo $lgmsg;
}
Session::set("loginmsg", NULL);

 ?>



<h2>user list</h2>    <h3 style="float:right"><strong>welcome!</strong><?php

                                            $nam=Session::get("name");
                                            if(isset($nam)){
                                            	echo $nam;
                                            }
                                              ?> </h3>  
                                            

<table width="100%" style="border:2px solid #fc721e; ">
	<tr>
	<th width="20%" style="border:1px solid #fc721e;background: #f6eead; " >ID</th>
	<th width="20%" style="border:1px solid #fc721e;background: #f6eead; " >Name </th>
	<th width="20%"style="border:1px solid #fc721e;background: #f6eead; " >Username</th>
	<th width="20%"style="border:1px solid #fc721e; background: #f6eead;" >Email</th>
	<th width="20%"style="border:1px solid #fc721e;background: #f6eead; " >Action</th>

	 </tr>
<?php 

$user=new User();

$getdata=$user->getUserData() ;
if($getdata){
$i=0;
foreach ($getdata as $data) {
	$i++;
 


?>

   <tr> 
   	<td align="center" style=" font-size:20px;padding-top: 5px;font-style: italic;" ><?php echo $i;?></td>
   	<td align="center" style=" font-size:20px;padding-top: 5px;font-style: italic;"><?php echo $data['name'];?></td>
   	<td align="center" style=" font-size:20px;padding-top: 5px;font-style: italic;"><?php echo $data['username'];?></td>
   	<td align="center" style=" font-size:20px;padding-top: 5px;font-style: italic;"><?php echo $data['email'];?></td>
   	<td align="center" style=" font-size:20px;padding-top: 5px;font-style: italic;"> <a style="text-decoration:none" href="Profile.php?id=<?php echo $data['id'];?>">view</a></td>
   </tr>
<?php
}
}else { ?>	

<h3>No Data Found</h3>
<?php } ?>

</table> 






</div>







<?php include "Footer.php";?>










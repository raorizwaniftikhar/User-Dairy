<?php
session_start();
include "connection.php";
$select_workspace=$_SESSION['select_workspace'];
echo @$_GET['err'];
  $post_id=$_GET['id'];
  $post_id;
  
  
  $sqlk="SELECT * FROM `posts` WHERE `post_id`='$post_id'";
  $quer=mysqli_query($con,$sqlk);
  while($ter=mysqli_fetch_assoc($quer)){
	 $title=$ter['title'];
	 $workspace_id=$ter['workspace_id'];
	  }
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

<div class="home-body">
	<div class="fields">
    <form method="POST" action="">
      	<div class="top-field">
    	Enter POST Name: <input type="text" name="post_name" value="<?php echo $title; ?>">
    	</div>
    
    		<div class="low-field">
    		<?php
    
            
	
	
	       $sel="SELECT * FROM `fields_data` WHERE `post_id`='$post_id'";
		   $que=mysqli_query($con,$sel);
		   $count=mysqli_num_rows($que);
		   $data=array();
		   while($rar=mysqli_fetch_assoc($que)){
			 $field_name=$rar['field_data'];
			 $data[]=$rar['field_data'];
			 
			 }
		   
			 ?>
             <table>
             <thead>
             <tr>
             <th>Name</th>
             <th>Value</th>
             </tr>
             </thead>
             <tbody>
             <?php
             $sqw="SELECT * FROM `fields` WHERE `workspace_id`='$workspace_id'";
			 $wer=mysqli_query($con,$sqw);
			 $f_name=array();
			 $field_id=array();
			
			while($res=mysqli_fetch_assoc($wer)){
			$f_name[]=$res['field_name'];
			$field_id[]=$res['field_id'];	
			 }
			 for($i=0;$i<$count;$i++)
			 {
			 ?>
             <tr>
             <td><?php  echo $f_name[$i]; ?> </td>
             <?php  
			 
			 
			  ?>
             <td><input type="text" name="fields[]" value="<?php echo $data[$i];?>"></td>
             <?php } ?>
             </tr>
             </tbody>
             
             </table>
             
             <input type="submit" name="btnn" value="Update">
             
             </form>
             </div>
             
    </div>         
             
</div>
</body>
</html>

<?php
if(isset($_POST['btnn'])){
	$fields=$_POST['fields'];
	$title;
	$post_title=$_POST['post_name'];
	for($i=0;$i<$count;$i++){
	$sqf="Update `posts` inner join `fields_data` on posts.post_id= fields_data.post_id set `title`='$post_title',`field_data`= '$fields[$i]' WHERE posts.post_id='$post_id' AND `field_id`='$field_id[$i]'";
	$ques=mysqli_query($con,$sqf);
	if($sqf){
		header("location:update_workspace_2.php?upd=The post have been updated successfully..");
		}
		else{
			echo "ERROR";
			}
	}
}
?>


			
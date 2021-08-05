<?php
session_start();
include "connection.php";
$select_workspace=$_SESSION['select_workspace'];
echo @$_GET['err'];
  
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
    	Enter POST Name: <input type="text" name="post_name">
    	</div>
    
    		<div class="low-field">
    		<?php
    
            $sqli="SELECT * FROM `workspace_name` WHERE `workspace_name`='$select_workspace'";
			$query=mysqli_query($con,$sqli);
			if($query){
			while($res=mysqli_fetch_assoc($query)){
				$workspace_id=$res['workspace_id']."<br>";
				}}
				else{
					echo "ERROR:". mysqli_error($con);}
			   
			$sql="SELECT count(*) AS `no_of_fields` FROM `fields` WHERE `workspace_id`='$workspace_id'";
			$que=mysqli_query($con,$sql);
			if($que){
			while($row=mysqli_fetch_assoc($que)){
				$row['no_of_fields']."<br>";
				$test=$row['no_of_fields'];
				}}
				else{
					echo "ERROR:".mysqli_error($con);
					}
					
					$sql="SELECT * FROM `fields` WHERE `workspace_id`='$workspace_id'";
			$que=mysqli_query($con,$sql);
			if($que){
			 ?>
				<table>
                
                <tr>
                <th>Name</th>
                <th>Value</th>
                </tr>
                <tbody>
                <?php while($row=mysqli_fetch_assoc($que)){?>
                <tr>
                <td><?php echo $row['field_name']; ?></td>
                <td><input type="text" name="test_txtfield[]"></td>
                </tr>
                <?php } }
				else{
					echo "ERROR:".mysqli_error($con);
					}
				?>
                </tbody>
                </table>
                <input type="submit" name="btn" value="Submit" />
                
    		</div>
    </form>
    </div>
</div>
</body>
</html>
<?php
if(isset($_POST['btn'])){
	
	$fields=$_POST['test_txtfield'];
	$title=$_POST['post_name'];
	
	$sta="SELECT * FROM `posts` WHERE `title`= '$title'";
	$qwe=mysqli_query($con,$sta);
	if(mysqli_num_rows($qwe)>0){
		header("location:insert_workspace_data2.php?err=Sorry this post title already exists..Try another one..");
		}
	else{
	
	$sql_post="INSERT INTO `posts`(`workspace_id`, `title`) VALUES ('$workspace_id', '$title')";
	$quer=mysqli_query($con,$sql_post);
	if($que){
		echo "Data has been entered!!"."<br>";
			}
			else{
			echo "ERROR:";
				}
		
		
		
		$sqlia="SELECT * FROM `fields` WHERE `workspace_id`='$workspace_id'";
		$querys= mysqli_query($con,$sqlia);
		$id=array();
		if($querys){
		while($rows= mysqli_fetch_assoc($querys)){
		$rows['field_id'];
		$id[]=$rows['field_id'];
		$field_id=$rows['field_id']."<br>";
		}
		
		//echo "Outside the while".$field_id[0];
		//print_r($id);
		//for($i=0;$i<3;$i++){
//		echo $id[$i]."<br>";
//		}
//		
				}
			else{
				echo "Didnt work".mysqli_error($con);
				}
				
				
				$sql_po="SELECT * FROM `posts` WHERE `workspace_id`='$workspace_id'";
				$que_po=mysqli_query($con,$sql_po);
				while($rowe=mysqli_fetch_assoc($que_po)){
					 $rowe['post_id'];
					 $post_id=$rowe['post_id'];
					}
				
		
	for($i=0;$i<$test;$i++){
		$field=$fields[$i];
		//$field_ids=$field_id[$i];
		$ids=$id[$i];
		$sqls="INSERT INTO `fields_data`(`field_id`, `post_id`, `field_data`) VALUES ('$ids','$post_id','$field')";
		$ques=mysqli_query($con,$sqls);
		if($ques){
			header("location:view_workspaces.php?suc=New Post to workspace have been added!!");
			}
			else{
				echo "ERROR:".mysqli_error($con);
				}
		} 
		
		
		//header("location:somewhere.php");
		
	}
	}
?>

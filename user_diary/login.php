<?php
session_start();
include 'connection.php';
@$_GET["log"];

$date=date("d-m-Y");
$today=strtotime($date);
if(isset($_POST['btn'])){
	$user_name=$_POST['username'];
	$password=$_POST['pass'];
	$sqli="SELECT * FROM `suspend` WHERE `username`='$user_name'";
	$que=mysqli_query($con,$sqli);
	if(mysqli_num_rows($que)>0) {
		while($res=mysqli_fetch_assoc($que)){
			$ex=$res["expiration_date"];
			$sus=$res["suspended_date"];}
			$expiry=strtotime($ex);
			if($today < $expiry){
		echo "You were suspended on"." ".$sus." "."due to un-accepted activities for 7 days..";
		
			}
			else{
				$sql="SELECT * FROM `login` WHERE `user_name`='$user_name' AND `password`='$password'";
	$query=mysqli_query($con, $sql);
	
	if(mysqli_num_rows($query)>0){
		while($res=mysqli_fetch_assoc($query)){
		echo $_SESSION['username']=$user_name;
		echo $_SESSION['user_id']=$res['user_id'];
		}
		header("location:home.php");
		}
		else{
			echo $inc='Your username and password combination is not valid.Please Try again';}
			

				}
		}
	
	else{
	$sql="SELECT * FROM `login` WHERE `user_name`='$user_name' AND `password`='$password'";
	$query=mysqli_query($con, $sql);
	
	if(mysqli_num_rows($query)>0){
		while($res=mysqli_fetch_assoc($query)){
		$_SESSION['username']=$user_name;
		$_SESSION['user_id']=$res['user_id'];
		$_SESSION['cell_no']=$res['cell_no'];
		$_SESSION['email']=$res['email'];
		}
		header("location:home.php");
		}
		else{
			$inc='You are not a registered user. Please register first then login...';}
			
	}
}
echo @$_GET['ali'];

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>
UserDiary Login Form
</title>
</head>

<body class="bod">
<div class="main-log-body">
	<span class="get_msg"><?php echo @$_GET['msg']; echo @$_GET['out']; echo @$_GET['log']; echo @$inc; ?></span>
    <div class="form-log">
	
    	<div class="left-form-log">
        <h2>LOG IN</h2>
        
        </div>
        
        <div class="right-form-log">
        	<form method="post">
			
            <div class="input-log">
            	<div class="img-log">
                <img src="images/user-logos.png">
                </div>
                
                <div class="field-log">
                <input type="text" name="username" placeholder="Username">
                </div>
                <div class="clear"></div>
            </div>
            
            <div class="pass-log">
            	<div class="input-log">
            		<div class="img-log">
                	<img src="images/pass-logo.png">
                	</div>
                
                	<div class="field-log">
                	<input type="password" name="pass" placeholder="Password">
                	</div>
                	<div class="clear"></div>
            	</div>

            </div>
            
            <div class="pass-log">
            	<div class="input-log">
            		
                	<div class="btn-log">
                	<input type="submit" name="btn" value="Login">
                	</div>
                	
            	</div>
					<p class="para-log">Not a user? <a href="signup.php">Register Here</a> <a href="contact.php">Contact Admin</a></p>
            </div>
            
            
		</div>
        </form>
        <div class="clear"></div>
    
    </div>
	
</div>

</body>
</html>
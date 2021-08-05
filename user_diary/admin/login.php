<?php
session_start();
include 'connection.php';
echo @$_GET["log"];
if(isset($_POST['btn'])){
	$user_name=$_POST['username'];
	$password=$_POST['pass'];
	$sql="SELECT * FROM `admin_login` WHERE `admin_name`='$user_name' AND `password`='$password'";
	$query=mysqli_query($con, $sql);
	if(mysqli_num_rows($query)>0){
		while($res=mysqli_fetch_assoc($query)){
			$_SESSION['admin_id']=$res['id'];
			$_SESSION['admin_name']=$res['admin_name'];
			$_SESSION['admin_mail']=$res['email'];
			}
			header("location:view_user.php");
		
		}
		else{
			$wro="The Username Or Password is incorrect..";
			}
	
	
	//if(mysqli_num_rows($query)>0){
	//while($res=mysqli_fetch_assoc($query)){
	
		//$_SESSION['username']=$user_name;
		 //$_SESSION['user_id']=$res['user_id'];
	//	$_SESSION['admin_id']=$res['admin_id'];
//	$_SESSION['admin_name']=$res['admin_name'];
//	$_SESSION['admin_mail']=$res['email'];
//	}
//		header("location:view_user.php");
//		}
//		else{
//			echo '<br>'.'You are not a registered user. Please register first then login...';}
	
}

?>
<html>
<head>
<meta charset="UTF-8">
<title>LogIn</title>
<link rel="stylesheet" href="css/style.css" type="text/css">

</head>
<body class="bod">
<div class="main-log-body">
	
    <div class="form-log">
     <div class="msg-url"><?php echo @$_GET["msg"]; echo @$wro;echo @$_GET["out"];?></div>
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
					<p class="para-log">Not a user? <a href="signup.php">Register Here</a></p>
            </div>
            
            
		</div>
        </form>
        <div class="clear"></div>
    
    </div>
	
</div>

</body>
</html>
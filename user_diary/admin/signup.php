<?php
include 'connection.php';
include "test_input.php";
$nerr=$cerr=$eerr=$perr=$rerr=$ferr="";
if(isset($_POST['btn'])){
	
	$nerr=$cerr=$eerr=$perr=$rerr=$ferr="";
	
	$name=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['pass'];
	$re_password=$_POST['re_pass'];
	$file_name=$_FILES['file_name']['name'];
	$temp=$_FILES['file_name']['tmp_name'];
	$path="uploads/";
	
	if(empty($name)){
		$nerr="*Name is required";
	
	}
	else{
		$name=test($name);
		if(!preg_match("/^[a-zA-Z ]*$/",$name)){
		$nerr= '*Only Letters and Whitespaces are Allowed..';
			
		}
			}
			
	if(empty($cell_no)){
		$cerr="*Contact is required";
	
	}
	else{
		$cell_no=test($cell_no);
		if(!preg_match("/^[0-9 ]*$/",$cell_no)){
			 $cerr= '*Only Numbers and Whitespaces are Allowed..';
			
		}
			}		
	
	if(empty($email)){
		 $eerr="*Email is required";
	
	}
	else{
		$email=test($email);
		if(filter_var($email,FILTER_VALIDATE_EMAIL)){
			$eerr="*Enter a valid Email";
		}
			}
	
	
	if(empty($password)){
		 $perr="*Password is required";
	
	}
	
	
	if(empty($re_password)){
		$rerr="*Password should be confirmed";
	
	}
	
	
	if(empty($file_name)){
		$ferr="*Picture is required";
	
	}
	else{
	
	move_uploaded_file($temp,$path.$file_name);
	if($password!=$re_password){
		
		echo "<script> alert(\"Your Password didn't match.Please Try again...\")</script>";
		
		}
		else{
		$sqli="SELECT * FROM `admin_login` WHERE `admin_name`='$name'";
		$que=mysqli_query($con, $sqli);
		
			if(mysqli_num_rows($que)>0){
				echo 'The admin already exists,Try another one..';
				//header("location:signup.php?error=The username already exists Please try another one..");
				}
			
			else{ 
			$sql="INSERT INTO `admin_login`(`admin_name`,`password`, `email`,`admin_pic`) VALUES ('$name','$password','$email','$file_name')";
	$query=mysqli_query($con, $sql);
	if($query){
		header("location:login.php?msg=You are Registered Successfully....");}
	
	else{
		echo "ERROR:".mysqli_error($con);}
	}
		}
	}
}
?>
<html>
<head>
<script src="script/jquery-1.3.1.min.js"></script>
<meta charset="UTF-8">
<title>SignUp</title>
<link rel="stylesheet" href="css/style.css" type="text/css">

</head>
<body class="bod-signup">
<div class="main-log">
	
    <div class="form-signup">
    	<div class="left-form-log">
        <h2>Sign Up</h2>
        
        </div>
        
        <div class="right-form-log">
        <form method="POST" enctype="multipart/form-data">
		<span class="errors" style="color:red;font-size: 14px;line-height:47px;"><?php echo $nerr; ?> </span>
        	<div class="input-log">
            	<div class="img-log">
                <img src="images/user-logos.png">
                </div>
                
                <div class="field-log">
                <input type="text" name="username" placeholder="Admin-name" value="<?php echo @$name;?>">
                </div>
                <div class="clear"></div>
            </div>
            
            
		<span class="errors" style="color:red;font-size: 14px;line-height:47px;"><?php echo $eerr; ?> </span>
			<div class="pass-log">
            	<div class="input-log">
            		<div class="img-log">
                	<img src="images/mail7-logo.png">
                	</div>
                
                	<div class="field-log">
                	<input type="email" name="email" placeholder="Email" value="<?php echo @$email;?>">
                	</div>
                	<div class="clear"></div>
            	</div>

            </div>
			
		<span class="errors" style="color:red;font-size: 14px;line-height:47px;"><?php echo $ferr; ?> </span>
			<div class="pass-log">
            	<div class="input-log">
            		<div class="img-log">
                	<img src="images/upload3.png">
                	</div>
                
                	<div class="field-log">
                	<input type="file" name="file_name">
                	</div>
                	<div class="clear"></div>
            	</div>

            </div>

			
			
		<span class="errors" style="color:red;font-size: 14px;line-height:47px;"><?php echo $perr; ?> </span>	
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
			
			
		<span class="errors" style="color:red;font-size: 14px;line-height:47px;"><?php echo $rerr; ?> </span>	
			<div class="pass-log">
            	<div class="input-log">
            		<div class="img-log">
                	<img src="images/pass-logo.png">
                	</div>
                
                	<div class="field-log">
                	<input type="password" name="re_pass" placeholder="Confirm Password">
                	</div>
                	<div class="clear"></div>
            	</div>

            </div>
			
            
            <div class="pass-log">
            	<div class="input-log">
            		
                	<div class="btn-log">
                	<input type="submit" name="btn" value="Singup">
                	</div>
                	
            	</div>
            </div>
            
            </form>
		</div>
        
        <div class="clear"></div>
    
    </div>

</div>

</body>
</html>
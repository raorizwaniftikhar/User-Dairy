<?php
include 'connection.php';
include "test_input.php";
$nerr=$cerr=$eerr=$perr=$rerr=$ferr="";
if(isset($_POST['btn'])){
	$nerr=$cerr=$eerr=$perr=$rerr=$ferr="";
	
	$name=$_POST['username'];
	$cell_no=$_POST['cell'];
	$email=$_POST['email'];
	$password=$_POST['pass'];
	$re_password=$_POST['re_pass'];
	$file_name=$_FILES['file_name']['name'];
	$temp=$_FILES['file_name']['tmp_name'];
	$dir="uploads/";
	
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
	
	if(move_uploaded_file($temp,$dir.$file_name)){}
	
	if($password!=$re_password){
		
		echo "<script> alert(\"Your Password didn't match.Please Try again...\")</script>";
		
		}
		else{
		echo $sqli="SELECT * FROM `login` WHERE `user_name`='$name'";
		$que=mysqli_query($con, $sqli);
		
			if(mysqli_num_rows($que)>0){
				echo 'The username already exists,Try another one!!';
				//header("location:signup.php?error=The username already exists Please try another one..");
				}
			
			else{ 
			$sql="INSERT INTO `login`(`user_name`, `cell_no`, `email`,`user_pic`, `password`) VALUES ('$name','$cell_no','$email','$file_name','$password')";
	$query=mysqli_query($con, $sql);
	if($query){
		header("location:login.php?msg=You are Registered Successfully....");}
	}
		}
	}
}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>
UserDiary Login Form
</title>
</head>
<body class="bod-signup">
<div class="main-log">
	
    <div class="form-signup">
    	<div class="left-form-log">
        <h2>Sign Up</h2>
        
        </div>
        
        <div class="right-form-log">
        <form method="POST" enctype="multipart/form-data" action="">
        	<span class="errors" style="color:red;font-size: 14px;line-height:47px;"><?php echo $nerr; ?> </span>
			<div class="input-log">
			
            	<div class="img-log">
                <img src="images/user-logos.png">
                </div>
                
                <div class="field-log">
                <input type="text" name="username" placeholder="Username" value="<?php echo @$name;?>">
                </div>
				
                <div class="clear"></div>
				
            </div>
			
            <span class="errors" style="color:red;font-size: 14px;line-height:47px;"><?php echo $cerr; ?> </span>
            <div class="pass-log">
            	<div class="input-log">
            		<div class="img-log">
                	<img src="images/cell-logo.png">
                	</div>
                
                	<div class="field-log">
                	<input type="text" name="cell" placeholder="Contact #" value="<?php echo @$cell_no;?>">
                	</div>
					
                	<div class="clear"></div>
            	</div>

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
                	<input type="file" name="file_name" />
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
<?php


?>
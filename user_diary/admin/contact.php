<?php
include "connection.php";
$uerr=$eerr="";
if(isset($_POST['btn'])){
	$user_name=trim($_POST["contact_name"]);
	$sender=$_POST["user_email"];
	$password=trim($_POST["user_password"]);
	$message=trim($_POST["message"]);

require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $sender;                 // SMTP username
$mail->Password = $password;                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

//$mail->From = 'mhp@example.com';
$mail->FromName = $user_name;
$mail->addAddress('sheikh_mashhood@yahoo.com');     // Add a recipient
$mail->addReplyTo($sender);
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Feedback';
$mail->Body    = $message;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Your Mail or Password combination is not right. Try again.'; 
	//$mail->ErrorInfo
} else {
    echo 'Message has been sent.We Will get back to you as soon as possible';
}
	
	
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">

<script src="script/jquery2.js"></script>

</head>

<body class="h-body">
<div class="home-header">
	<div class="main-header">
		
        <div class="logo-header">
    	<img src="images/final-logo.png" /> 
    	</div>
        
        <div class="logo-slogan">
        <p>Some Slogan here</p>
        </div>
        
        <div class="logo-search">
        	<div class="search">
    		<div class="search-bar">
        		<div class="search-img">
            	<img src="images/search.png">
            	</div>
            	<div class="search-input">
                
           		<input id="sear" autocomplete="off" type="text" 
                placeholder="Search Workspaces..." name="search" onkeyup="search(this.value)" />
            	               
                </div>
                
            	<div class="clear"></div>
                <div id="anchor">
                
                <button id="btnss" onclick="test()">Click</button>
                </div>
                <div id="list"></div>
                <script>
					function search(str){
					if(str.length ==0){
					document.getElementById("list").innerHTML="Please Enter Something";
					return;}
					xml=new XMLHttpRequest();
					xml.onreadystatechange=function(){
					if(xml.readyState==4 && xml.status==200){
					document.getElementById("list").innerHTML=xml.responseText;}
					}
	
					xml.open("GET","search.php?char="+str,true);
					xml.send();
					}
					</script>
                    
                   <script>
				   function test(){
					   var sear;
					   sear=document.getElementById("sear").value;
					  window.location.href="search_workspace.php?res="+sear;
					   }
				   </script> 
                   <script type="text/javascript">
				   document.addEventListener("DOMContentLoaded",function(){
					   $("#sear").keypress(function(e){
						   
						   if(e.which == 13){
							   $("#btnss").click();
							   return false;
							   }
						   
						   });
					   
					   });
				   </script>
                   
                   
        	</div>
    	</div>

        </div>
        
        <div class="clear"></div>
     </div>   


</div>

<div class="menu-main">
	<div class="menu-list">
    	<div class="list">
        <ul>
        <a href="home.php"><li class="home-menu">Home</li></a>
        <a href="daily_diary.php"><li class="daily">Daily Diary</li></a>
        <a href="view_posts.php"><li class="post">Posts</li></a>
        <a href="contact.php"><li class="cont">Contact Us</li></a>
        <a href="logout.php"><li class="about">Logout</li></a>
        <div class="clear"></div>
        </ul>
        </div>
    </div>
</div>

<div class="contact-body">
	<div class="contact-form">
		<form method="POST" action="">
		<div class="contact-name">
			
			<div class="con-img-name">
			<img src="images/user-logos.png">
			</div>
			
			<div class="con-name-input">
			<input type="text" name="contact_name" placeholder="Enter Your Name Here" required>
			<span class="errors" style="color:red;font-size: 14px;line-height:47px;"><?php echo $uerr; ?> </span>
			</div>
			
			<div class="clear"></div>
		</div>
		
		
		<div class="contact-name">
			
			<div class="con-img-name">
			<img src="images/mail2.png">
			</div>
			
			<div class="con-name-input">
			<input type="email" name="user_email" placeholder="Enter Your Email Here" required>
			</div>
			
			<div class="clear"></div>
		</div>
		
		
		<div class="contact-name">
			
			<div class="con-img-name">
			<img src="images/pass-logo2.png">
			</div>
			
			<div class="con-name-input">
			<input type="password" name="user_password" placeholder="Enter Your Email's Password" required>
			</div>
			
			<div class="clear"></div>
		</div>
		
		<div class="contact-name">
			
			<div class="con-img-name">
			<img src="images/message.png">
			</div>
			
			<div class="con-name-input">
			<textarea Placeholder="Enter Your Message here.." name="message" required></textarea>
			</div>
			
			<div class="clear"></div>
		</div>
		
		
		
		<div class="con-sub">
		<input type="submit" name="btn" value="Send">	
		</div>
			



	</form>
	</div>
</div>

<div class="footer">
<p>All Rights Reserved by Sheikh Mashhood Ali</p>

</div>
</body>
</html>
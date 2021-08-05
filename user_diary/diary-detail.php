<?php
include "connection.php";
if(!$_SESSION["username"]){
	
	header("location:login.php?log=Please First Login Love..");
}
$did=$_GET["did"];
$sel="SELECT * FROM `daily_diary` WHERE `diary_id`='$did'";
$que=mysqli_query($con,$sel);
while($res=mysqli_fetch_assoc($que)){
	$title=$res["title"];
	$date=$res["date"];
	$content=$res["content"];
	}
if(isset($_POST['btn'])){
	$title=$_POST["diary_title"];
	$date=$_POST["diary_date"];
	$content=$_POST["diary_content"];
	$contentss="";
	foreach($content as $cont){
		$contentss.=$cont." " ;
		}
		$contentss;

 $upd ="UPDATE `daily_diary` SET `title`='$title', `date`='$date',`content`='$contentss' WHERE `diary_id`='$did'";
$quer=mysqli_query($con,$upd);
if($quer){
	header("location:daily_diary.php?upd=The diary have been updated successfully");}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css">

<title>Untitled Document</title>
<script src="script/jquery.js"></script>
<script src="script/jquery2.js"></script>



<script>
function start(){
	if(frm.msgqw.value==''){
		alert("You Should type something");
		return false;
		}
	var uname=frm.uname.value;
	var msgs=frm.msgqw.value;
	var xml=new XMLHttpRequest();
	xml.onreadystatechange=function(){
		if(xml.readyState==4 && xml.status==200){
			document.getElementById("messages").innerHTML=xml.responseText;
			}
		}
		xml.open("GET","insert_chat.php?name="+uname+"&message="+msgs,true);
		xml.send();
		
clear();
	}
	$(document).ready(function(e){
		$.ajaxSetup({cache:false});
		setInterval(function(){$("#messages").load("logs.php");},2000);
		});

</script>


<script>
function clear(){
	$('#form').children('input:not(#name,#ac)').val('');
	}
</script>

<script>
document.addEventListener("DOMContentLoaded",function(){
$('#chatt').keypress(function(e) {
  var key = e.which;
  if (key == 13) {
      $('#ac').click();
      return false;
  }
 });
 });

</script>

<script>

$('#dc:first').keydown(function (event) {
    if (event.which === 13) {
        event.preventDefault();
        $(this).next('.dc').focus();
		return false;
    }
});

</script>

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
        <a href="#"><li class="post">Posts</li></a>
        <a href="#"><li class="cont">Contact Us</li></a>
        <a href="#"><li class="about">About</li></a>
        <div class="clear"></div>
        </ul>
        </div>
    </div>
</div>

<div class="home-body">
	<div class="show-diary">
    <p>You can also edit the diary if you want.</p>
	<form method="post">
    	<div class="left-diary">
        <input type="text" name="diary_title" style="text-transform:capitalize;" value="<?php echo $title; ?>">
        </div>
        
        <div class="right-diary">
        <input type="text" name="diary_date" value="<?php echo $date; ?>">
        </div>
        <div class="clear"></div>
        
        <div class="diary-content">
        	<div class="diary-sub">
            <div id="jq">
            <input type="text" id="dc" name="diary_content[]" maxlength="94" value="<?php $t=trim($content); echo $pre=preg_replace('/\s+/',' ',$t); ?>">
            <input type="text" id="dc" name="diary_content[]" maxlength="94">
            <input type="text" id="dc" name="diary_content[]" maxlength="94">
            <input type="text" name="diary_content[]" maxlength="94">
            <input type="text" name="diary_content[]" maxlength="94">
            <input type="text" name="diary_content[]" maxlength="94">
            <input type="text" name="diary_content[]" maxlength="94">
            <input type="text" name="diary_content[]" maxlength="94">
            </div>
            
            <input type="submit" name="btn" value="Submit">
            </div>
        </div>



	</form>
    <button id="more">Add More Lines</button>
    </div>

</div>


</body>
</html>
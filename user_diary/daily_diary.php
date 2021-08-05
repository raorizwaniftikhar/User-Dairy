<?php
session_start();
include "connection.php";

$user_id=$_SESSION["user_id"];
echo @$_GET['int'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/style.css">

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
$(document).ready(function() {
   
$("#more").click(function(){
	$("#jq").append("<input type='text' name='diary_content[]' maxlength='94'>");
	});
	});
</script>


<script>
$(document).ready(function(){
	$("#create-new").click(function(){
		$(".previous_dairy").hide("fast");
		$(".diary-main").show("slow");
		
		});
		$("#view-previous").click(function(){
		$(".diary-main").hide("fast");
		$(".previous_dairy").show("slow");
		
		});
		
	});

</script>

<script>
/*document.addEventListener("DOMContentLoaded",function(){ 
    $("#testid").on("keyup","input:text",function(e){
		if(e.which===13){
			e.stopPropagation();
			$(this).next("input:text").focus();
			return false;
			}
		
		});
});
*/
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
                   
				   <script>
				   
				  /* $(".username").keyup(function(e) {
                    if(e.keyCode== 13){
						textbox=$("input.username");
						current=textbox.index(this);
						if(textbox[current+1]!= null){
							nextbox=textbox[current+1];
							nextbox.focus();
							nextbox.select();
							}
							e.preventDefault();
							return false;
						}
                });
				   */

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

<div class="home-body">
	<span class="update-diary"><?php echo @$_GET['upd']; echo @$_GET['ded']; ?></span>
	<div class="diary-buttons">
    	<div class="diary-previous">
    	<input type="button" id="view-previous" value="View Previous Diaries">
        </div>
        <div class="diary-now">
        <input type="button" id="create-new" value="Create New One">
        </div>
        <div class="clear"></div>
    </div>
    
        
    <div class="previous_dairy">
    	<div class="main-prev">
			<?php 
			$sel="SELECT * FROM `daily_diary` WHERE `user_id`='$user_id'";
			$query=mysqli_query($con,$sel);
			if(mysqli_num_rows($query)>0){
			while($row=mysqli_fetch_assoc($query)){
				$row["date"];
				$id=$row["diary_id"];
				?>
            <div class="pre-diary">
            	<div class="pre-detail">
            	<span>Title:</span><?php echo $row['title']."<br><br>"; ?>
                <span>Date:</span><?php echo $row['date']; ?>
				<?php echo "<a href='diary-delete.php?did=$id'>Delete</a>"; ?>
                <?php echo "<a href='diary-detail.php?did=$id'>Show Details</a>" .' '; ?>
            	</div>
            </div>
			
			
						<?php } ?>
            <div class="clear"></div>    
			<?php }
			else{
				echo "There is no previous diary to show.";
				}
		
			?>
        </div>
    </div>



	<div class="diary-main">
	<form method="post" id="testid">
    	<div class="left-diary">
        <input type="text" name="diary_title" placeholder="Title here">
        </div>
        
        <div class="right-diary">
        <input type="text" name="diary_date" value="<?php $d=date("jS M,Y"); echo $d;?>">
        </div>
        <div class="clear"></div>
        
        <div class="diary-content">
        	<div class="diary-sub">
            <div id="jq">
            <input type="text" name="diary_content[]" placeholder="Enter Your Thoughts.." maxlength="94">
            <input type="text" name="diary_content[]" maxlength="94">
            <input type="text" name="diary_content[]" maxlength="94">
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

<?php

if(isset($_POST['btn'])){
	$title=$_POST["diary_title"];
	$date=$_POST["diary_date"];
	$content=$_POST["diary_content"];
	$test="";
	foreach($content as $cont){
		$test.=$cont." " ;
		}
		$test;
$ins="INSERT INTO `daily_diary`(`user_id`, `title`, `date`, `content`) VALUES ('$user_id','$title','$date','$test')";
$que=mysqli_query($con,$ins);
if($que){
	echo "<script>window.open('daily_diary.php?int=Diary Has Been Added','_SELF')</script>";
	}
	else{
		echo "ERROR:" .mysqli_error($con);}
	
	}

?>
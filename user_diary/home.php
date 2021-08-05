<?php
session_start();
if(!$_SESSION["username"]){
	
	header("location:login.php?log=Please First Login Love..");
}
include "connection.php";
$user_name=$_SESSION['username'];
$user_id=@$_SESSION['user_id'];


$cell=@$_SESSION['cell_no'];
$mail=@$_SESSION['email'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="script/jquery.bxslider.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Diary</title>
<script src="script/jquery.js"></script>
<script src="script/jquery2.js"></script>
<script src="script/jquery.bxslider.min.js"></script>

<script>
$(document).ready(function(){
	
	$(".close").click(function(){
		$(".total-chat").hide("slow");
		
	});
	$(".minimize").click(function(){
		$(".chat").hide("slow");
		$(".msg").hide("slow");
	});
	
});
</script>


<script>
$(document).ready(function(){
	
	$(".bxslider").bxSlider({
		mode: 'fade',
  auto: true,
  autoControls: false,
  pause: 4000
	});
});
</script>

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


</head>

<body class="h-body">
<div class="home-header">
	<div class="main-header">
		
        <div class="logo-header">
    	<img src="images/final-logo.png" /> 
    	</div>
        
        <div class="logo-slogan">
        <p>Save Your Day</p>
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

<div class="home-body">
	
    <div class="home-slider">
	
		<ul class="bxslider">
		<li><img src="images/notebook4.jpg"></li>
		<li><img src="images/diary.jpg"></li>
		<li><img src="images/slider-img.jpg"></li>
		<li><img src="images/slider-img2.jpg"></li>
		<li><img src="images/slider-img3.jpg"></li>
		<li><img src="images/slider-img5.jpg"></li>
		</ul>
	
	</div>
	
	
	
	<div class="picture">
    	<div class="profile-pic">
			<?php
			$sep="SELECT `user_pic` FROM `login` WHERE `user_id`='$user_id'";
			$quep=mysqli_query($con,$sep);
			while($pic=mysqli_fetch_assoc($quep)){
				$user_pic=$pic['user_pic'];
			}
		
			echo "<img alt='No Image to display' src='uploads/$user_pic'>";
			?>
		</div>
    </div>

    
	<div class="details">
    	<div class="coma-pic">
        <img src="images/invert.png" />
        </div>
        
        <div class="user-details">
        	
            <div class="left-detail">
            	<span class="name-detail">
                <p>Name</p>
                </span>
                
                <span class="value-detail">
                <?php echo $user_name; ?>
            	</span>
                
                <div class="clear"></div>
                
                <span class="name-detail">
                <p>Contact</p>
                </span>
                
                <span class="value-detail">
                <?php echo $cell; ?>
            	</span>
                
                <div class="clear"></div>
                
                
                <span class="name-detail">
                <p>Email</p>
                </span>
                
                <span class="value-detail">
                <?php echo $mail; ?>
            	</span>
                
                <div class="clear"></div>
            </div>
            
            <div class="right-detail">
            
            
            	<span class="name-detail">
                <p>Total Workspaces</p>
                </span>
                
                <span class="value-detail">
                <?php 
				$swl="SELECT count(*) AS `c` FROM `workspace_name` where `user_id`='$user_id'";
				$quw=mysqli_query($con,$swl);
				while($row=mysqli_fetch_assoc($quw)){
					echo $row['c'];
					} 
				 ?>
            	</span>
                
                <div class="clear"></div>
                
                <span class="name-detail">
                <p>Status</p>
                </span>
                
                <span class="value-detail">
                Active
            	</span>
                
                <div class="clear"></div>
                
                
                <span class="name-detail">
                <p>Email</p>
                </span>
                
                <span class="value-detail">
                <?php echo $mail; ?>
            	</span>
                
                <div class="clear"></div>
            
            </div>
            
            <div class="clear"></div>
        
        </div>
        
        <div class="coma-pic2">
        <img src="images/invert2.png" />
        </div>
        
    </div>
    
		
    <div class="clear"></div>
    
    
    
    <div class="container-home">
    	<div class="add-home">
    		<a href="add_workspace.php">
        	<div class="icon-home"><img src="images/add.png">
        	</div>   
        	<div class="link-home"><span class="add-span">Add Workspaces</span>
        	</div>
        	<div class="clear"></div>
            </a>
        	
     	</div>
    	<div class="insert-home">
    		<a href="insert_workspace_data.php">
        	<div class="icon-home"><img src="images/insert.png">
        	</div>   
        	<div class="link-home">Insert New Post In Workspace
        	</div>
        	<div class="clear"></div>
            </a>
        	
    	</div>
    
    	<div class="update-home">
    		<a href="update_workspace.php">
        	<div class="icon-home"><img src="images/update.png">
        	</div>   
        	<div class="link-home">Update A Post
    		</div>
        	<div class="clear"></div>
            </a>
        	
    	</div>
		
		<div class="daily-home">
    		<a href="daily_diary.php">
        	<div class="icon-home"><img src="images/daily2.png">
        	</div>   
        	<div class="link-home">
            <p>Daily Diary</p>
        	</div>
        	<div class="clear"></div>
            </a>
        	
    	</div>
        
		<div class="clear"></div>
	</div>
   
   
   <div class="para-home">
   <p class="url-msg"><?php echo @$_GET['msg'];echo @$_GET['ed']; ?></p>
   <p class="url-msg"><?php echo @$_GET['del'];echo @$_GET['suc'];?></p>
   
   <h2>List of Workspaces created by "<b><?php echo $user_name; ?>"</b></h2>
   </div>
   
   <div class="home">
    <div class="table">
   	<table class="home-table" method="POST">
   	<thead>
    <tr>
    <th>No.</th>
    <th>Workspace Name</th>
    <th>More Info</th>
    <th class="action">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php 
	$sql="SELECT * FROM `workspace_name` WHERE `user_id`='$user_id'";
	$query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($query);
	 $i=1;
	 if($count>0){
	 while($res=mysqli_fetch_assoc($query)){
	 //for($i=1;$i<=$count;$i++){
	 $_SESSION["w_id"]=$id=$res['workspace_id'];
	 
	 ?>
    <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $res['workspace_name']; ?></td>
    <?php $i++; ?>
    <td><?php echo "<a href='view_posts.php?id=$id'>Details</a>"; ?></td>
    <td><?php echo "<a href='delcomp.php?wid=$id'>Delete Workspace</a>"; ?> /
    <?php echo "<a href='edit.php?wid=$id'>Edit</a>"; ?></td>
   
    
    <?php } }
	else{ ?>
		<td><?php echo "Sorry...There is no Workspaces to show.."; ?> </td>
	<?php	} ?>
    </tr>
    </tbody>
    </table>
    </div>
   </div>
   
 </div>   


 <div class="total-chat">
	<div class="head-chat">
    <span class="chat-username"><?php echo $user_name;?></span><span class="close"><img src="images/cross.png"></span>
    <div class="clear"></div>
	</div>
 
	
    
	<div class="chat">
    
		<div id="messages">
    	<div class="left-load"><img src="images/load-logo.png"></div> <div class="right-load">Loading...</div>
   	 	</div>
    </div>
		<div class="msg">
    	<form id="form" name="frm">
    	<input type="hidden" value="<?php echo $user_name; ?>" name="uname" id="name">
    	<input type="text" value="" name="msgqw" placeholder="Enter your message here" id="chatt"/>
    	<a href="#" onclick="start();" name="anchor" id="ac"> Send </a>
    	</form>
    	</div>
 
	
 
 </div>




<div class="footer">
<p>All Rights Reserved by Sheikh Mashhood Ali</p>

</div>

</body>
</html>
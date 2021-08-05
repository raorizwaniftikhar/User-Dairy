<?php
include "connection.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
$(document).ready(function() {
$('#list').click(function() {
    $('#sear').val($(this).text());
    
});
});
</script>

</head>

<body>
    <input id="sear" autocomplete="off" type="text" name="search" placeholder="Seaarch here" onkeyup="search(this.value)">
   <div onclick="ali()" id="list" ></div>
    
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

</body>
</html>
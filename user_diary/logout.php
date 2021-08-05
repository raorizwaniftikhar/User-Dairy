<?php
session_start();
include "connection.php";
session_destroy();
header("location:login.php?out=You are sucessfully logged out..!");
?>